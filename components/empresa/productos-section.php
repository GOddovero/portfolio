<section id="ecosistema" class="section-padding products-section">
    <!-- Effect Layers -->
    <div class="products-bg-reveal"></div>
    <div class="products-mask-reveal"></div>
    <div id="products-circle-mask"></div>

    <div class="container">
        <div style="margin-bottom: 50px;">
            <span class="text-accent" style="font-weight: 700;">NUESTRO PORTAFOLIO</span>
            <h2 style="font-size: 2.5rem; margin-top: 10px;">PRODUCTOS <br> PROPIETARIOS</h2>
        </div>
    </div>

    <div class="container">
        <div class="products-grid">

            <!-- GOH-GYM (Principal) -->
            <div class="product-card featured card-gym">
                <div class="product-visual">
                    <img src="img/logo_gym.png" alt="GOH-GYM Software para Gestión de Gimnasios - Control de Acceso Biométrico" loading="lazy">
                    <div class="badge">+800 SOCIOS</div>
                </div>
                <div class="product-info">
                    <span class="p-tag">GESTIÓN DEPORTIVA</span>
                    <h3>GOH-GYM</h3>
                    <p>La plataforma definitiva para centros de alto rendimiento. Control biométrico de acceso,
                        gestión financiera automatizada y app para socios.</p>
                    <a href="https://goh-dev.com.ar/gym/" class="link-underline" target="_blank" rel="noopener noreferrer">Ver Sistema</a>
                </div>
            </div>

            <!-- GOH-Care -->
            <div class="product-card card-care">
                <div class="product-visual">
                    <img src="img/goh-care.png" alt="GOH-Care Software Gestión Clínica y Médica - Historia Clínica Digital" loading="lazy">
                    <div class="badge">PERSONALIZADO</div>
                </div>
                <div class="product-info">
                    <span class="p-tag">GESTIÓN CLÍNICA</span>
                    <h3>GOH-Care</h3>
                    <p>Solución integral para hospitales y consultorios. Turnera inteligente, historias clínicas
                        digitales y módulos especializados para diferentes especialidades médicas.</p>
                    <a href="#contacto" class="link-underline" aria-label="Consultar sobre GOH-Care">Consultar</a>
                </div>
            </div>

            <!-- GOH-Shop (WIP) -->
            <div class="product-card wip card-shop">
                <div class="product-visual">
                    <img src="img/logo_shop.png" alt="GOH-Shop Sistema Punto de Venta - Software Retail" style="filter: grayscale(100%);" loading="lazy">
                    <div class="badge">EN DESARROLLO (WIP)</div>
                </div>
                <div class="product-info">
                    <span class="p-tag">RETAIL INTELLIGENCE</span>
                    <h3>GOH-Shop</h3>
                    <p>Sistema de Punto de Venta avanzado. Sincronización de stock en tiempo real, métricas de
                        ventas y facturación electrónica integrada.</p>
                    <span style="color: #777; font-size: 0.9rem;">Próximamente</span>
                </div>
            </div>

        </div>
    </div>

    <script>
    document.addEventListener('DOMContentLoaded', function () {
        const section = document.querySelector('.products-section');
        if (!section) return;
        
        const backgroundReveal = section.querySelector('.products-bg-reveal');
        const maskReveal = section.querySelector('.products-mask-reveal');
        const circleMaskReveal = document.getElementById('products-circle-mask');

        if (!backgroundReveal || !maskReveal || !circleMaskReveal) return;

        let mouseX = 0;
        let mouseY = 0;
        let isMouseOverSection = false;

        function updateCirclePosition() {
            if (!isMouseOverSection) return;
            
            circleMaskReveal.style.left = mouseX + 'px';
            circleMaskReveal.style.top = mouseY + 'px';

            maskReveal.style.maskImage = `radial-gradient(circle 150px at ${mouseX}px ${mouseY}px, transparent, black)`;
            maskReveal.style.webkitMaskImage = `radial-gradient(circle 150px at ${mouseX}px ${mouseY}px, transparent, black)`;

            requestAnimationFrame(updateCirclePosition);
        }

        section.addEventListener('mousemove', (e) => {
            const rect = section.getBoundingClientRect();
            mouseX = e.clientX - rect.left;
            mouseY = e.clientY - rect.top;

            if (!isMouseOverSection) {
                isMouseOverSection = true;
                backgroundReveal.style.opacity = '1';
                circleMaskReveal.style.display = 'block';
                requestAnimationFrame(updateCirclePosition);
            }
        });

        section.addEventListener('mouseleave', () => {
            isMouseOverSection = false;
            backgroundReveal.style.opacity = '0';
            circleMaskReveal.style.display = 'none';
            maskReveal.style.maskImage = 'none';
            maskReveal.style.webkitMaskImage = 'none';
        });
    });
    </script>
</section>
