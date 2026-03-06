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

    <div class="container products-full-bleed">
        <div class="products-grid">

            <!-- GOH-GYM (Principal) -->
            <div class="product-card featured card-gym">
                <div class="product-visual">
                    <img src="img/logo_gym.png" alt="GOH-GYM Software para Gestión de Gimnasios - Control de Acceso Biométrico" loading="lazy">
                    <div class="badge">+1000 SOCIOS</div>
                </div>
                <div class="product-info">
                    <span class="p-tag">GESTIÓN DEPORTIVA</span>
                    <h3>GOH-GYM</h3>
                    <p>La plataforma definitiva para centros de alto rendimiento. Control biométrico de acceso,
                        gestión financiera automatizada y app para socios.</p>
                    <a href="https://goh.com.ar/gym/" class="link-underline" target="_blank" rel="noopener noreferrer">Ver Sistema</a>
                </div>
            </div>

            <!-- GOH-Care -->
            <div class="product-card card-care">
                <div class="product-visual">
                    <img src="img/goh-care.png" alt="GOH-Care Software Gestión Clínica y Médica - Historia Clínica Digital" loading="lazy">
                    <div class="badge">PERSONALIZADO POR AREAS</div>
                </div>
                <div class="product-info">
                    <span class="p-tag">GESTIÓN CLÍNICA</span>
                    <h3>GOH-Care</h3>
                    <p>Solución integral para hospitales y consultorios. Turnera inteligente, historias clínicas
                        digitales y módulos especializados para diferentes especialidades médicas.</p>
                    <a href="#contacto" class="link-underline" aria-label="Consultar sobre GOH-Care">Consultar</a>
                </div>
            </div>

            <!-- GOH-TAX -->
            <div class="product-card card-tax">
                <div class="product-visual">
                    <img src="img/logo_tax.png" alt="GOH-TAX Software Gestión Fiscal" loading="lazy">
                    <div class="badge">EN DESARROLLO</div>
                </div>
                <div class="product-info">
                    <span class="p-tag">GESTIÓN FISCAL</span>
                    <h3>GOH-TAX</h3>
                    <p>Plataforma inteligente para liquidación y control fiscal. Pensada para estudios contables modernos que buscan acelerar y asegurar sus operaciones.</p>
                    <a href="#contacto" class="link-underline" aria-label="Consultar sobre GOH-TAX">Consultar</a>
                </div>
            </div>

            <!-- GOH-Shop (WIP) -->
            <div class="product-card wip card-shop">
                <div class="product-visual">
                    <img src="img/logo_shop.png" alt="GOH-Shop Sistema Punto de Venta - Software Retail" loading="lazy">
                    <div class="badge">EN BETAS PRIVADAS</div>
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
</section>
        
<!-- Banner Gasto Simple FULL WIDTH DENTRO DEL PAGE-WRAPPER -->
<section class="gasto-simple-banner" style="background: linear-gradient(135deg, #1a1a1a, #0a0a0a); border-top: 2px solid #333; border-bottom: 2px solid #333; overflow: hidden; display: flex; align-items: center; justify-content: space-between; flex-wrap: wrap; width: 100%; position: relative; z-index: 10;">
    <div class="gs-text" style="padding: 60px 5vw; flex: 1; min-width: 300px; max-width: 800px;">
        <span style="color: #4CAF50; font-weight: 800; letter-spacing: 2px; font-size: 0.95rem; text-transform: uppercase;">Gestiona los gastos de tus eventos</span>
        <h3 style="font-size: clamp(2.5rem, 5vw, 4rem); color: #fff; margin: 15px 0 20px; line-height: 1.1; font-family: var(--font-display); font-weight: 900;">CREADORES DE <br><span style="color: #4CAF50;">GASTO SIMPLE</span></h3>
        <p style="color: #bbb; margin-bottom: 35px; font-size: 1.15rem; line-height: 1.7; font-weight: 500;">Nuestra app nativa número uno para control de gastos personales. Un diseño limpio, moderno y con sincronización en la nube, destacada por miles de usuarios activos. Desarrollada y mantenida íntegramente por nuestro estudio.</p>
        <a href="https://gastosimple.com.ar" target="_blank" class="btn" style="background: #4CAF50; color: #fff; border: none; padding: 15px 35px; border-radius: 8px; font-weight: bold; font-size: 1.05rem;">Usa nuestra App <i class="ph-bold ph-arrow-up-right" style="margin-left: 8px;"></i></a>
    </div>
    <div class="gs-img" style="flex: 1; min-width: 300px; display: flex; justify-content: center; align-items: flex-end; padding-top: 40px; position: relative; background: radial-gradient(circle at center, rgba(76, 175, 80, 0.1) 0%, transparent 70%);">
        <img src="img/mockup/gasto_simple.png" alt="Mockup Gasto Simple App" style="max-height: 500px; width: auto; filter: drop-shadow(0 30px 40px rgba(0,0,0,0.6)); transform: translateY(20px);" loading="lazy">
    </div>
</section>

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
