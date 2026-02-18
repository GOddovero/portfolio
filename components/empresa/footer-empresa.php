<footer class="site-footer">
    <div class="container">
        <div class="footer-content">
            <div class="footer-brand">
                <img src="img/goh1.png" alt="GOH Logo Footer">
                <p>Transformando ideas en ecosistemas digitales de alto impacto. Especialistas en <strong>SaaS Personalizado</strong> y <strong>Landing Pages</strong> de alta conversión.</p>
            </div>
            
            <div class="footer-links">
                <h4>Navegación</h4>
                <ul>
                    <li><a href="#soluciones">Soluciones</a></li>
                    <li><a href="#ecosistema">Ecosistema</a></li>
                    <li><a href="#empresa">Trabajos</a></li>
                    <li><a href="#contacto">Contacto</a></li>
                </ul>
            </div>
            
            <div class="footer-social">
                <h4>Conecta</h4>
                <div class="social-icons">
                    <a href="https://www.linkedin.com/in/goh-dev/" target="_blank" rel="noopener noreferrer" class="social-icon" aria-label="LinkedIn GOH-DEV">
                        <i class="ph-fill ph-linkedin-logo"></i>
                    </a>
                    <a href="https://www.instagram.com/goh.dev/" target="_blank" rel="noopener noreferrer" class="social-icon" aria-label="Instagram GOH-DEV">
                        <i class="ph-fill ph-instagram-logo"></i>
                    </a>
                    <a href="https://github.com/GOddovero" target="_blank" rel="noopener noreferrer" class="social-icon" aria-label="GitHub GOH-DEV">
                        <i class="ph-fill ph-github-logo"></i>
                    </a>
                    <a href="https://x.com/goh_dev" target="_blank" rel="noopener noreferrer" class="social-icon" aria-label="Twitter/X GOH-DEV">
                        <i class="ph-fill ph-twitter-logo"></i>
                    </a>
                </div>
            </div>
        </div>
        
        <div class="footer-bottom">
            <p>&copy; <?php echo date('Y'); ?> GOH Enterprise. Todos los derechos reservados.</p>
        </div>
    </div>
</footer>

<!-- AOS Animation Library -->
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js" defer></script>

<!-- Performance Optimizations -->
<script src="js/performance.js?v=<?php echo filemtime('js/performance.js'); ?>" defer></script>

<!-- Mobile Optimization Script -->
<script src="js/mobile.js?v=<?php echo filemtime('js/mobile.js'); ?>" defer></script>

<!-- Scroll Handler Script -->
<script src="js/scroll-handler.js?v=<?php echo filemtime('js/scroll-handler.js'); ?>" defer></script>

<script>
    // Init Animations when DOM is ready
    document.addEventListener('DOMContentLoaded', function() {
        // Initialize AOS
        if (typeof AOS !== 'undefined') {
            AOS.init({ 
                duration: 1000, 
                once: true,
                offset: 100
            });
        }

        // Card Nav Scroll Interaction
        const cardNav = document.querySelector('.card-nav');
        window.addEventListener('scroll', () => {
            if (!cardNav) return;
            if (window.scrollY > 50) {
                cardNav.classList.add('card-nav-scrolled');
            } else {
                cardNav.classList.remove('card-nav-scrolled');
            }
        });

        // Smooth scroll for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                const href = this.getAttribute('href');
                if (href !== '#' && href.length > 1) {
                    e.preventDefault();
                    const target = document.querySelector(href);
                    if (target) {
                        target.scrollIntoView({
                            behavior: 'smooth',
                            block: 'start'
                        });
                        // Cerrar menú móvil si está abierto
                        if (window.innerWidth <= 768) {
                            const hamburger = document.getElementById('hamburger');
                            const mainNav = document.getElementById('mainNav');
                            if (hamburger && mainNav && mainNav.classList.contains('active')) {
                                hamburger.classList.remove('active');
                                mainNav.classList.remove('active');
                                document.body.style.overflow = '';
                            }
                        }
                    }
                }
            });
        });

        // Card Nav hamburguesa & animación de altura
        (function initCardNav() {
            const nav = document.querySelector('.card-nav');
            const content = nav ? nav.querySelector('.card-nav-content') : null;
            const hamburger = nav ? nav.querySelector('.hamburger-menu') : null;
            const icon = hamburger ? hamburger.querySelector('.hamburger-icon') : null;
            if (!nav || !content || !hamburger || !icon) return;

            const TOP_BAR = 60;
            const MOBILE_QUERY = window.matchMedia('(max-width: 768px)');
            let isExpanded = false;

            const calculateHeight = () => {
                const isMobile = MOBILE_QUERY.matches;
                if (!isMobile) {
                    return 260;
                }

                const prev = {
                    visibility: content.style.visibility,
                    pointerEvents: content.style.pointerEvents,
                    position: content.style.position,
                    height: content.style.height
                };

                content.style.visibility = 'visible';
                content.style.pointerEvents = 'auto';
                content.style.position = 'static';
                content.style.height = 'auto';

                const contentHeight = content.scrollHeight;

                content.style.visibility = prev.visibility;
                content.style.pointerEvents = prev.pointerEvents;
                content.style.position = prev.position;
                content.style.height = prev.height;

                const padding = 16;
                return TOP_BAR + contentHeight + padding;
            };

            const openNav = () => {
                isExpanded = true;
                nav.classList.add('open');
                hamburger.classList.add('open');
                nav.style.height = calculateHeight() + 'px';
                icon.classList.remove('fa-bars');
                icon.classList.add('fa-xmark');
            };

            const closeNav = () => {
                isExpanded = false;
                nav.classList.remove('open');
                hamburger.classList.remove('open');
                nav.style.height = TOP_BAR + 'px';
                icon.classList.remove('fa-xmark');
                icon.classList.add('fa-bars');
            };

            hamburger.addEventListener('click', () => {
                if (isExpanded) {
                    closeNav();
                } else {
                    openNav();
                }
            });

            window.addEventListener('resize', () => {
                if (!isExpanded) return;
                nav.style.height = calculateHeight() + 'px';
            });

            // Inicial
            nav.style.height = TOP_BAR + 'px';
        })();
    });
</script>

</body>
</html>
