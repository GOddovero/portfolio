<?php
/**
 * GOH Enterprise - Página de Trabajo
 * Página dedicada a oportunidades laborales en la empresa
 * 
 * @author Gaspar Oddovero Herrera
 * @version 1.0
 */
include 'components/empresa/header-empresa.php';
?>

<!-- Hero Section Custom for Trabajo -->
<section class="hero hero-trabajo-reveal" style="padding: 120px 0 80px 0; background: #3b2f2f; max-height: 70dvh; position: relative; overflow: hidden;">
    <!-- Effect Layers -->
    <div class="hero-bg-reveal"></div>
    <div class="hero-mask-reveal"></div>
    <div id="hero-circle-mask"></div>

    <div class="hero-content" style="position: relative; z-index: 10;">
        <span class="label-corp" data-aos="fade-down" style="color: white !important; background: #e5ca10;">NUESTRO PORTAFOLIO</span>
        <h1 data-aos="fade-up" data-aos-delay="100" style="font-size: 3.5rem; color: white !important;">
            CASOS DE <br>
            <span>ÉXITO</span>
        </h1>
        <p data-aos="fade-up" data-aos-delay="200" style="max-width: 600px; margin: 0 auto; color: white !important;">
            Descubre cómo hemos transformado la presencia digital de nuestros clientes con Landing Pages de alto impacto y sistemas a medida.
        </p>
    </div>

    <script>
    document.addEventListener('DOMContentLoaded', function () {
        const section = document.querySelector('.hero-trabajo-reveal');
        if (!section) return;
        
        const backgroundReveal = section.querySelector('.hero-bg-reveal');
        const maskReveal = section.querySelector('.hero-mask-reveal');
        const circleMaskReveal = document.getElementById('hero-circle-mask');

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

<!-- Beneficios Section -->
<style>
    .timeline-container {
        position: relative;
        max-width: 1000px;
        margin: 0 auto;
    }
    .timeline-container::before {
        content: '';
        position: absolute;
        top: 0; bottom: 0; left: 50%;
        width: 2px;
        background: rgba(0,0,0,0.1);
        transform: translateX(-50%);
    }
    .timeline-row {
        display: grid;
        grid-template-columns: 1fr 80px 1fr;
        align-items: center;
        margin-bottom: 50px;
    }
    .timeline-marker {
        width: 60px; height: 60px;
        background: var(--goh-dark);
        color: var(--goh-yellow);
        border-radius: 50%;
        display: flex;
        justify-content: center;
        align-items: center;
        font-weight: 800;
        font-size: 1.5rem;
        margin: 0 auto;
        position: relative;
        z-index: 2;
        box-shadow: 0 0 0 5px #fff;
    }
    .timeline-content {
        padding: 20px;
    }
    .timeline-content h3 {
        font-size: 1.5rem;
        margin-bottom: 10px;
        color: var(--goh-dark);
    }
    .timeline-content p {
        font-size: 0.95rem;
        margin: 0;
    }
    
    /* Odd: Left */
    .timeline-row.odd .timeline-content {
        text-align: right;
        grid-column: 1;
    }
    .timeline-row.odd .timeline-marker {
        grid-column: 2;
    }
    
    /* Even: Right */
    .timeline-row.even .timeline-content {
        text-align: left;
        grid-column: 3;
    }
    .timeline-row.even .timeline-marker {
        grid-column: 2;
    }

    @media (max-width: 768px) {
        .timeline-container::before { left: 30px; }
        .timeline-row { grid-template-columns: 60px 1fr; gap: 20px; }
        .timeline-marker { grid-column: 1 !important; margin: 0; }
        .timeline-content { grid-column: 2 !important; text-align: left !important; }
        .timeline-row.odd .timeline-content { grid-column: 2; }
    }

    /* Portfolio Horizontal Styles */
    .portfolio-horizontal-container {
        margin: 0 10vw;
        display: flex;
        flex-direction: column;
        gap: 60px;
    }
    
    .portfolio-card {
        display: flex;
        background: #222;
        border: 1px solid #333;
        min-height: 450px;
        transition: 0.5s;
        width: 100%;
    }
    
    .portfolio-card:hover {
        border-color: var(--goh-yellow);
        transform: translateY(-5px);
    }
    
    .portfolio-visual {
        width: 50%;
        position: relative;
        overflow: hidden;
    }
    
    .portfolio-visual img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: 0.5s;
    }
    
    .portfolio-card:hover .portfolio-visual img {
        transform: scale(1.05);
    }
    
    .portfolio-info {
        width: 50%;
        padding: 60px;
        display: flex;
        flex-direction: column;
        /* justify-content: center; Eliminado para permitir distribución personalizada */
    }

    .portfolio-info h3 {
        font-size: 2rem;
        margin-bottom: 20px;
        color: white;
        margin-top: 0;
    }

    .portfolio-info p {
        font-size: 1.1rem;
        color: #ccc;
        margin-bottom: 30px;
    }

    .portfolio-info .service-badge {
        margin-top: auto;
        align-self: flex-start;
    }
    
    /* Alternating layout */
    .portfolio-card:nth-child(even) {
        flex-direction: row-reverse;
    }
    
    /* Mobile responsiveness */
    @media (max-width: 992px) {
        .portfolio-horizontal-container {
            margin: 0 20px;
        }
        
        .portfolio-card, .portfolio-card:nth-child(even) {
            flex-direction: column;
        }
        
        .portfolio-visual, .portfolio-info {
            width: 100%;
        }
        
        .portfolio-visual {
            height: 300px;
        }
        
        .portfolio-info {
            padding: 30px;
        }
    }
</style>

<section class="section-padding" style="position: relative; overflow: hidden;">
    <img src="img/png1.png" alt="Fondo" class="hero-bg-img" style="opacity: 0.1 !important; top: 50%; right: -10%; position: absolute; transform: translateY(-50%) rotate(-10deg); height: 120vh; width: auto; pointer-events: none; z-index: 0;">
    <div class="container" style="position: relative; z-index: 1;">
        <div style="margin-bottom: 80px; text-align: center;" data-aos="fade-up">
            <h2 style="font-size: 2.5rem;">5 BENEFICIOS DE UNA <span class="text-accent">LANDING PAGE</span></h2>
            <p>Por qué tu negocio necesita una presencia digital optimizada.</p>
        </div>

        <div class="timeline-container">
            <!-- 01 -->
            <div class="timeline-row odd" data-aos="fade-right">
                <div class="timeline-content">
                    <h3>Mayor Conversión</h3>
                    <p>Diseñadas con un único objetivo: convertir visitantes en leads o clientes. Eliminamos distracciones para enfocar al usuario en la acción.</p>
                </div>
                <div class="timeline-marker">01</div>
            </div>

            <!-- 02 -->
            <div class="timeline-row even" data-aos="fade-left">
                <div class="timeline-marker">02</div>
                <div class="timeline-content">
                    <h3>Segmentación</h3>
                    <p>Permite crear mensajes específicos para audiencias concretas, aumentando la relevancia y la efectividad de tus campañas publicitarias.</p>
                </div>
            </div>

            <!-- 03 -->
            <div class="timeline-row odd" data-aos="fade-right">
                <div class="timeline-content">
                    <h3>Medición Real</h3>
                    <p>Facilita el seguimiento de métricas clave (ROI, tasa de conversión) para optimizar tus estrategias de marketing en tiempo real.</p>
                </div>
                <div class="timeline-marker">03</div>
            </div>

            <!-- 04 -->
            <div class="timeline-row even" data-aos="fade-left">
                <div class="timeline-marker">04</div>
                <div class="timeline-content">
                    <h3>Costo-Efectividad</h3>
                    <p>Más económicas y rápidas de desarrollar que un sitio web completo, ofreciendo un retorno de inversión superior a corto plazo.</p>
                </div>
            </div>

            <!-- 05 -->
            <div class="timeline-row odd" data-aos="fade-right">
                <div class="timeline-content">
                    <h3>Imagen Profesional</h3>
                    <p>Refuerza tu marca con un diseño moderno y profesional que genera confianza inmediata en tus visitantes.</p>
                </div>
                <div class="timeline-marker">05</div>
            </div>
        </div>
    </div>
</section>

<!-- Portfolio Section -->
<section class="section-padding products-section">
    <div class="container" style="margin-bottom: 60px;">
        <h2 data-aos="fade-up" style="font-size: 2.5rem;">TRABAJOS <span class="text-accent">REALIZADOS</span></h2>
    </div>
    
    <div class="portfolio-horizontal-container">
        <!-- Proyecto 1 -->
        <div class="portfolio-card" data-aos="fade-up">
            <div class="portfolio-visual">
                <img src="img/mockup/paideia.png" alt="Proyecto 1 Mockup">
            </div>
            <div class="portfolio-info">
                <h3>Landing Page Editorial</h3>
                <p>
                    Se desarrollo una landing page para una editorial independiente, enfocada en la promocion de servicios ofrecidos. En el desarrollo se priorizo el diseño y
                    la experiencia de usuario para maximizar conversiones.
                    La misma cuenta con efectos graficos realizados en conjunto con <a href="https://www.linkedin.com/in/diego-sebastian-markiewicz/?originalSubdomain=ar" target="_blank" rel="noopener noreferrer" class="a-ref-diego">Diego S. Markiewicz</a>.
                </p>
                <span class="service-badge" style="position: relative; top: auto; right: auto; display: inline-block;"><a href="https://paideiaeditorial.net/" target="_blank" rel="noopener noreferrer">VISITAR PAGINA</a></span>
            </div>
        </div>

        <!-- Proyecto 2 -->
        <div class="portfolio-card" data-aos="fade-up" data-aos-delay="100">
            <div class="portfolio-visual">
                <img src="img/mockup/muni_levalle.png" alt="Proyecto 2 Mockup">
            </div>
            <div class="portfolio-info">
                <h3>LANDING PAGE INSTITUCIONAL</h3>
                <p>
                    Desarrollo de una landing page institucional para la Municipalidad de Levalle, con el objetivo de informar a los ciudadanos sobre servicios y áreas.
                    Se priorizó la accesibilidad y facilidad de navegación para todo tipo de usuarios. Se agrego el sistema de Pago Digital. La misma fue desarrollada en conjunto con <a href="https://www.linkedin.com/in/diego-sebastian-markiewicz/?originalSubdomain=ar" target="_blank" rel="noopener noreferrer" class="a-ref-diego">Diego S. Markiewicz</a>.
                </p>
                <span class="service-badge" style="position: relative; top: auto; right: auto; display: inline-block;"><a href="https://www.generallevalle.gob.ar/" target="_blank" rel="noopener noreferrer">VISITAR PAGINA</a></span>
            </div>
        </div>
        <!-- Proyecto 3 -->
        <div class="portfolio-card" data-aos="fade-up" data-aos-delay="200">
            <div class="portfolio-visual">
                <img src="img/mockup/oddoherrajes.png" alt="Proyecto 3 Mockup">
            </div>
            <div class="portfolio-info">
                <h3>LANDING PAGE EMPRESARIAL</h3>
                <p>
                    Desarrollo de una landing page para Oddovero Herrajes, una empresa dedicada a la venta minorista en el pueblo de General Levalle. Con el desarrollo se busco captar los principales productos de ventas y redirigirlos a la tienda oficial para su posterior compra.
                    La landing page destaca sus productos, historia y valores, con un diseño moderno y funcional que facilita la navegación y el contacto con potenciales clientes.
                </p>
                <span class="service-badge" style="position: relative; top: auto; right: auto; display: inline-block;"><a href="https://goh-dev.com.ar/oddovero_herrajes/a" target="_blank" rel="noopener noreferrer">VISITAR PAGINA</a></span>
            </div>
    </div>
</section>

<?php
include 'components/empresa/cta-section.php';
include 'components/empresa/whatsapp-float.php';
include 'components/empresa/footer-empresa.php';
?>
