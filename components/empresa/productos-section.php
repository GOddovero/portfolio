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
                    <a href="https://goh-gym.com.ar/" class="link-underline" target="_blank" rel="noopener noreferrer">Ver Sistema</a>
                </div>
            </div>
            <!-- GOH-SHOP -->
            <div class="product-card card-shop">
                <div class="product-visual">
                    <img src="img/logo_shop.png" alt="GOH-Shop Sistema Punto de Venta - Software Retail" loading="lazy">
                    <div class="badge">CONTRATACIONES ABIERTAS</div>
                </div>
                <div class="product-info">
                    <span class="p-tag">RETAIL INTELLIGENCE</span>
                    <h3>GOH SHOP</h3>
                    <p>Sistema de Punto de Venta avanzado. Sincronización de stock en tiempo real, métricas de
                        ventas y facturación electrónica integrada. Conectada al servicio de desarrollo de Landing Pages de GOH</p>
                    <a href="https://goh-shop.com.ar" class="link-underline" target="_blank" rel="noopener noreferrer">Ver Sistema</a>
                </div>
            </div>

            <!-- GOH-Care -->
            <div class="product-card card-care">
                <div class="product-visual">
                    <img src="img/goh-care.png" alt="GOH-Care Software Gestión Clínica y Médica - Historia Clínica Digital" loading="lazy">
                    <div class="badge">EN BETAS CERRADAS</div>
                </div>
                <div class="product-info">
                    <span class="p-tag">GESTIÓN CLÍNICA</span>
                    <h3>GOH CARE</h3>
                    <p>Solución integral para hospitales y consultorios. Turnera inteligente, historias clínicas
                        digitales y módulos especializados para diferentes especialidades médicas.</p>
                    <a href="https://care.goh.com.ar/" class="link-underline" target="_blank" rel="noopener noreferrer">Ver Sistema</a>
                </div>
            </div>
        </div>
    </div>
</section>
        
<!-- Banner Global English FULL WIDTH DENTRO DEL PAGE-WRAPPER -->
<section class="global-english-banner" style="background: var(--goh-teal, #2ec4b6); border-top: 2px solid #22a89b; border-bottom: 2px solid #22a89b; overflow: hidden; display: flex; align-items: center; justify-content: flex-start; gap: 22px; flex-wrap: wrap; width: 100%; position: relative; z-index: 10;">
    <div class="ge-img" style="flex: 1; min-width: 300px; display: flex; justify-content: flex-start; align-items: flex-end; padding: 24px 0 0 5vw; position: relative; background: radial-gradient(circle at center, rgba(255, 255, 255, 0.18) 0%, transparent 70%); overflow: hidden;">
        <img src="img/mockup/globalenglish.png" alt="Mockup Sistema Administrativo para Academia de Ingles" style="width: min(100%, 760px); height: auto; max-height: 460px; object-fit: contain; object-position: left bottom; filter: drop-shadow(0 20px 30px rgba(0,0,0,0.45)); transform: none;" loading="lazy">
    </div>
    <div class="ge-text" style="padding: 60px 5vw 60px 0; flex: 1; min-width: 300px; max-width: 800px;">
        <span style="color: #eff7ff; font-weight: 800; letter-spacing: 2px; font-size: 0.95rem; text-transform: uppercase;">Nuestro último desarrollo</span>
        <h3 style="font-size: clamp(1.8rem, 4.8vw, 3.8rem); color: #fff; margin: 15px 0 20px; line-height: 1.1; font-family: var(--font-display); font-weight: 900;">Sistema Administrativo <br><span style="color: #0b1324;">para Academias</span></h3>
        <p style="color: #eff7ff; margin-bottom: 0; font-size: 1.1rem; line-height: 1.7; font-weight: 500;">Desarrollamos un sistema que simplifica la gestión de tus clientes. Administrá alumnos, padres y pagos de forma simple y automática. Además, conectamos tu cuenta de Mercado Pago y ARCA para que las cuotas abonadas por los padres se facturen automáticamente, ahorrándote tiempo y evitando errores.</p>
    </div>
</section>

<style>
    @media (max-width: 768px) {

        .global-english-banner {
            gap: 14px !important;
        }

        .global-english-banner .ge-img {
            padding: 20px 24px 0 24px !important;
        }

        .global-english-banner .ge-text {
            padding: 30px 24px 44px !important;
        }

        .global-english-banner .ge-text h3 {
            font-size: 2rem !important;
            line-height: 1.12;
        }
    }
</style>

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
