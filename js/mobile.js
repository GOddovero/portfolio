// Funcionalidades adicionales para responsive
document.addEventListener('DOMContentLoaded', function() {
    // Detectar si es un dispositivo móvil
    const isMobile = () => window.innerWidth <= 767;
    
    // Prevenir zoom en inputs en dispositivos iOS
    if (/iPhone|iPad|iPod/i.test(navigator.userAgent)) {
        const viewportMeta = document.querySelector('meta[name="viewport"]');
        if (viewportMeta) {
            viewportMeta.content = 'width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no';
        }
    }
    
    // Mejorar scroll suave en móviles
    if (isMobile()) {
        // Ajustar scroll para compensar altura de navegación en móvil
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                const href = this.getAttribute('href');
                if (href !== '#' && href.length > 1) {
                    e.preventDefault();
                    const target = document.querySelector(href);
                    if (target) {
                        const offset = 20; // Espacio adicional en móvil
                        const targetPosition = target.offsetTop - offset;
                        window.scrollTo({
                            top: targetPosition,
                            behavior: 'smooth'
                        });
                    }
                }
            });
        });
        
        // Mejorar interacción con las cards en móvil
        document.querySelectorAll('.nav-card, .quick-access-card').forEach(card => {
            card.addEventListener('touchstart', function() {
                this.style.transform = 'translateY(-4px)';
            }, { passive: true });
            
            card.addEventListener('touchend', function() {
                setTimeout(() => {
                    this.style.transform = '';
                }, 200);
            }, { passive: true });
        });
    }
    
    // Cerrar el menú al hacer clic en cualquier parte de la pantalla en móvil
    if (isMobile()) {
        const mainContent = document.getElementById('main-content');
        
        if (mainContent) {
            mainContent.addEventListener('click', function() {
                const menuWrapper = document.querySelector('.menu-wrapper');
                if (menuWrapper && menuWrapper.classList.contains('open')) {
                    menuWrapper.classList.remove('open');
                }
            });
        }
        
        // También ajustar comportamiento de hover en móvil para que sea con tap
        document.querySelectorAll('.menu-option').forEach(option => {
            option.addEventListener('click', function(e) {
                // Si el click fue directamente en la opción y no en el enlace interno
                if (e.target === this) {
                    const previewId = this.getAttribute('data-preview');
                    if (previewId) {
                        // Activar manualmente el "hover" que en desktop es automático
                        const event = new MouseEvent('mouseenter');
                        this.dispatchEvent(event);
                        
                        // Evitar que el enlace se active inmediatamente
                        e.preventDefault();
                    }
                }
            });
        });
    }
    
    // Función para ajustar tamaños según orientación en móvil
    function adjustForOrientation() {
        if (isMobile()) {
            if (window.innerWidth > window.innerHeight) {
                // Landscape
                document.body.classList.add('landscape');
                document.body.classList.remove('portrait');
            } else {
                // Portrait
                document.body.classList.add('portrait');
                document.body.classList.remove('landscape');
            }
        } else {
            document.body.classList.remove('landscape', 'portrait');
        }
    }
    
    // Optimizar rendimiento en móviles
    let resizeTimer;
    function handleResize() {
        clearTimeout(resizeTimer);
        resizeTimer = setTimeout(function() {
            adjustForOrientation();
        }, 250);
    }
    
    // Ejecutar al cargar y al cambiar orientación
    adjustForOrientation();
    window.addEventListener('resize', handleResize);
    window.addEventListener('orientationchange', function() {
        setTimeout(adjustForOrientation, 100);
    });
    
    // Mejorar el indicador de scroll en móvil
    const scrollIndicator = document.querySelector('.scroll-indicator');
    if (scrollIndicator && isMobile()) {
        let lastScroll = 0;
        window.addEventListener('scroll', function() {
            const currentScroll = window.pageYOffset;
            if (currentScroll > 100) {
                scrollIndicator.style.opacity = '0';
            } else {
                scrollIndicator.style.opacity = '0.7';
            }
            lastScroll = currentScroll;
        }, { passive: true });
    }
    
    // Mejorar carga de imágenes en móviles (lazy loading manual si es necesario)
    if ('IntersectionObserver' in window && isMobile()) {
        const imageObserver = new IntersectionObserver((entries, observer) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const img = entry.target;
                    if (img.dataset.src) {
                        img.src = img.dataset.src;
                        img.removeAttribute('data-src');
                        observer.unobserve(img);
                    }
                }
            });
        }, {
            rootMargin: '50px 0px',
            threshold: 0.01
        });
        
        document.querySelectorAll('img[data-src]').forEach(img => {
            imageObserver.observe(img);
        });
    }
    
    // Prevenir comportamientos no deseados en formularios móviles
    if (isMobile()) {
        const formInputs = document.querySelectorAll('input, textarea');
        formInputs.forEach(input => {
            // Evitar zoom automático en iOS cuando se enfoca un input
            input.addEventListener('focus', function() {
                if (parseFloat(getComputedStyle(this).fontSize) < 16) {
                    this.style.fontSize = '16px';
                }
            });
        });
    }
});
