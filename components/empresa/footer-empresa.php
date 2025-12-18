<footer class="site-footer">
    <div class="container">
        <div class="footer-content">
            <div class="footer-brand">
                <img src="img/goh1.png" alt="GOH Logo Footer">
                <p>Transformando ideas en ecosistemas digitales de alto impacto. Ingeniería de software para el futuro.</p>
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

        // Header Scroll Interaction
        window.addEventListener('scroll', () => {
            const header = document.querySelector('header');
            if (window.scrollY > 50) {
                header.style.padding = '15px 0';
                header.style.background = 'rgba(255, 255, 255, 0.98)';
            } else {
                header.style.padding = '25px 0';
                header.style.background = 'rgba(255, 255, 255, 0.9)';
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

        // Menú hamburguesa móvil
        const hamburger = document.getElementById('hamburger');
        const mainNav = document.getElementById('mainNav');

        if (hamburger && mainNav) {
            hamburger.addEventListener('click', function() {
                this.classList.toggle('active');
                mainNav.classList.toggle('active');
                
                // Prevenir scroll del body cuando el menú está abierto
                if (mainNav.classList.contains('active')) {
                    document.body.style.overflow = 'hidden';
                } else {
                    document.body.style.overflow = '';
                }
            });

            // Cerrar menú al hacer clic fuera
            document.addEventListener('click', function(e) {
                if (!hamburger.contains(e.target) && !mainNav.contains(e.target)) {
                    if (mainNav.classList.contains('active')) {
                        hamburger.classList.remove('active');
                        mainNav.classList.remove('active');
                        document.body.style.overflow = '';
                    }
                }
            });

            // Cerrar menú al redimensionar a desktop
            window.addEventListener('resize', function() {
                if (window.innerWidth > 768 && mainNav.classList.contains('active')) {
                    hamburger.classList.remove('active');
                    mainNav.classList.remove('active');
                    document.body.style.overflow = '';
                }
            });
        }
    });
</script>

</body>
</html>
