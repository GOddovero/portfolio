/**
 * GOH Enterprise - Performance Optimizations
 * Optimizaciones de rendimiento para la landing empresarial
 * 
 * @author Gaspar Oddovero Herrera
 * @version 1.0
 */

(function() {
    'use strict';

    // === LAZY LOADING DE IMÁGENES ===
    if ('IntersectionObserver' in window) {
        const imageObserver = new IntersectionObserver((entries, observer) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const img = entry.target;
                    if (img.dataset.src) {
                        img.src = img.dataset.src;
                        img.removeAttribute('data-src');
                    }
                    img.classList.add('loaded');
                    observer.unobserve(img);
                }
            });
        }, {
            rootMargin: '50px 0px',
            threshold: 0.01
        });

        // Observar todas las imágenes con loading="lazy"
        document.addEventListener('DOMContentLoaded', () => {
            const lazyImages = document.querySelectorAll('img[loading="lazy"]');
            lazyImages.forEach(img => imageObserver.observe(img));
        });
    }

    // === OPTIMIZACIÓN DE ANIMACIONES ===
    // Pausar animaciones cuando no están visibles
    const marqueeObserver = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            const marqueeContent = entry.target.querySelector('.marquee-content');
            if (marqueeContent) {
                if (entry.isIntersecting) {
                    marqueeContent.style.animationPlayState = 'running';
                } else {
                    marqueeContent.style.animationPlayState = 'paused';
                }
            }
        });
    }, { threshold: 0 });

    document.addEventListener('DOMContentLoaded', () => {
        const marquee = document.querySelector('.marquee');
        if (marquee) {
            marqueeObserver.observe(marquee);
        }
    });

    // === REDUCIR MOTION PARA ACCESIBILIDAD ===
    if (window.matchMedia('(prefers-reduced-motion: reduce)').matches) {
        document.addEventListener('DOMContentLoaded', () => {
            // Deshabilitar animaciones AOS
            if (typeof AOS !== 'undefined') {
                AOS.init({ disable: true });
            }
            
            // Deshabilitar animación de marquee
            const marqueeContent = document.querySelector('.marquee-content');
            if (marqueeContent) {
                marqueeContent.style.animation = 'none';
            }
        });
    }

    // === PREFETCH DE ENLACES IMPORTANTES ===
    const prefetchLinks = () => {
        const importantLinks = [
            'https://goh-dev.com.ar/gym/',
            'https://goh-dev.com.ar/care/'
        ];

        importantLinks.forEach(url => {
            const link = document.createElement('link');
            link.rel = 'prefetch';
            link.href = url;
            link.as = 'document';
            document.head.appendChild(link);
        });
    };

    // Prefetch después de que la página cargue completamente
    if (window.requestIdleCallback) {
        window.requestIdleCallback(prefetchLinks);
    } else {
        setTimeout(prefetchLinks, 2000);
    }

    // === OPTIMIZACIÓN DE SCROLL ===
    let ticking = false;
    let lastScrollY = window.scrollY;

    const updateScroll = () => {
        lastScrollY = window.scrollY;
        ticking = false;
        
        // Aquí puedes agregar lógica adicional de scroll si es necesario
    };

    window.addEventListener('scroll', () => {
        if (!ticking) {
            window.requestAnimationFrame(updateScroll);
            ticking = true;
        }
    }, { passive: true });

    // === DETECCIÓN DE CONEXIÓN LENTA ===
    if ('connection' in navigator) {
        const connection = navigator.connection || navigator.mozConnection || navigator.webkitConnection;
        
        if (connection && connection.effectiveType) {
            // Si la conexión es lenta (2g o slow-2g), reducir calidad
            if (connection.effectiveType === '2g' || connection.effectiveType === 'slow-2g') {
                console.log('Conexión lenta detectada - Optimizando...');
                
                // Deshabilitar animaciones pesadas
                document.documentElement.classList.add('slow-connection');
                
                // Reducir imágenes de alta resolución si es necesario
                document.querySelectorAll('img').forEach(img => {
                    img.loading = 'lazy';
                });
            }
        }
    }

    // === CACHE DE RECURSOS ===
    // Service Worker registration para PWA (opcional - descomentar si se necesita)
    /*
    if ('serviceWorker' in navigator) {
        window.addEventListener('load', () => {
            navigator.serviceWorker.register('/sw.js')
                .then(registration => {
                    console.log('ServiceWorker registrado:', registration);
                })
                .catch(err => {
                    console.log('ServiceWorker falló:', err);
                });
        });
    }
    */

    // === ANALYTICS Y TRACKING (sin bloquear el render) ===
    const initAnalytics = () => {
        // Track de scroll depth
        let maxScroll = 0;
        window.addEventListener('scroll', () => {
            const scrollPercent = (window.scrollY / (document.documentElement.scrollHeight - window.innerHeight)) * 100;
            if (scrollPercent > maxScroll) {
                maxScroll = Math.round(scrollPercent / 25) * 25; // Tracks: 0%, 25%, 50%, 75%, 100%
                
                // Aquí puedes enviar a Google Analytics si está configurado
                if (typeof gtag !== 'undefined') {
                    gtag('event', 'scroll_depth', {
                        'depth': maxScroll,
                        'event_category': 'engagement'
                    });
                }
            }
        }, { passive: true });

        // Track de clicks en CTAs
        document.querySelectorAll('.btn-primary, .service-link, .link-underline').forEach(cta => {
            cta.addEventListener('click', (e) => {
                const ctaText = e.target.textContent.trim();
                if (typeof gtag !== 'undefined') {
                    gtag('event', 'cta_click', {
                        'cta_text': ctaText,
                        'event_category': 'conversion'
                    });
                }
            });
        });
    };

    // Inicializar analytics de forma diferida
    if (window.requestIdleCallback) {
        window.requestIdleCallback(initAnalytics);
    } else {
        setTimeout(initAnalytics, 3000);
    }

    // === OPTIMIZACIÓN DE FONTS ===
    // Forzar font-display: swap via JS si no está en CSS
    document.fonts.ready.then(() => {
        document.documentElement.classList.add('fonts-loaded');
    });

    // === ERROR HANDLING PARA RECURSOS EXTERNOS ===
    window.addEventListener('error', (e) => {
        if (e.target.tagName === 'IMG') {
            console.warn('Imagen no cargada:', e.target.src);
            // Opcional: poner imagen placeholder
            e.target.src = 'data:image/svg+xml,%3Csvg xmlns="http://www.w3.org/2000/svg" width="100" height="100"%3E%3Crect fill="%23ddd" width="100" height="100"/%3E%3C/svg%3E';
        }
    }, true);

    console.log('✅ GOH Performance Optimizations loaded');

})();
