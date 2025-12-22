<?php
/**
 * GOH Enterprise - Sobre Nosotros / Biografía
 * Página de perfil profesional y biografía - Rediseño v4
 * 
 * @author Gaspar Oddovero Herrera
 * @version 4.0
 */

include 'components/empresa/header-empresa.php';
?>

<style>
    /* --- ESTILOS ESPECÍFICOS NOSOTROS V4 --- */
    
    /* 1. HERO SECTION */
    .hero-bio {
        min-height: 90vh;
        background: linear-gradient(135deg, var(--goh-dark) 0%, #1a1a1a 100%);
        position: relative;
        display: flex;
        align-items: center;
        overflow: hidden;
        padding-top: 100px;
    }

    .hero-bio::before {
        content: '';
        position: absolute;
        top: 0;
        right: 0;
        width: 55%;
        height: 100%;
        background: var(--goh-yellow);
        clip-path: polygon(15% 0, 100% 0, 100% 100%, 0% 100%);
        z-index: 0;
        opacity: 0.95;
    }

    .hero-content-wrapper {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 4rem;
        align-items: center;
        position: relative;
        z-index: 2;
    }

    .hero-text h1 {
        font-size: 4.5rem;
        color: white;
        line-height: 0.95;
        margin-bottom: 1.5rem;
        text-shadow: 2px 2px 10px rgba(0,0,0,0.3);
    }

    .hero-text .subtitle {
        font-family: var(--font-body);
        font-size: 1.2rem;
        color: var(--goh-teal);
        font-weight: 700;
        margin-bottom: 1.5rem;
        display: block;
        text-transform: uppercase;
        letter-spacing: 3px;
    }

    .hero-text p {
        color: #e0e0e0;
        font-size: 1.15rem;
        max-width: 500px;
        margin-bottom: 2.5rem;
        line-height: 1.7;
    }

    .hero-img-wrapper {
        position: relative;
        height: 85vh;
        display: flex;
        align-items: flex-end;
        justify-content: center;
    }

    .hero-main-img {
        max-height: 100%;
        width: auto;
        object-fit: contain;
        filter: drop-shadow(15px 15px 30px rgba(0,0,0,0.4));
        z-index: 2;
        transition: transform 0.5s ease;
    }
    
    .hero-main-img:hover {
        transform: scale(1.01);
    }

    /* 2. TÍTULO UNIVERSITARIO */
    .degree-section {
        padding: 120px 0;
        background: white;
        position: relative;
    }

    .degree-container {
        display: grid;
        grid-template-columns: 1.2fr 0.8fr;
        background: white;
        border-radius: 30px;
        overflow: hidden;
        box-shadow: 0 30px 60px rgba(0,0,0,0.08);
    }

    .degree-image {
        position: relative;
        min-height: 400px;
    }

    .degree-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        position: absolute;
        top: 0;
        left: 0;
    }

    .degree-image::after {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, rgba(0,0,0,0) 0%, rgba(0,0,0,0.6) 100%);
    }

    .degree-content {
        padding: 60px;
        display: flex;
        flex-direction: column;
        justify-content: center;
        background: var(--goh-gray);
        position: relative;
    }
    
    .degree-content::before {
        content: '';
        position: absolute;
        left: 0;
        top: 50%;
        transform: translateY(-50%);
        width: 5px;
        height: 60%;
        background: var(--goh-yellow);
    }

    .degree-badge {
        background: var(--goh-teal);
        color: white;
        padding: 8px 16px;
        border-radius: 50px;
        font-size: 0.8rem;
        font-weight: 700;
        text-transform: uppercase;
        align-self: flex-start;
        margin-bottom: 20px;
    }

    /* 3. TRAYECTORIA PROFESIONAL */
    .experience-section {
        padding: 100px 0;
        background: #fcfcfc;
        position: relative;
    }
    
    .experience-section::before {
        content: '';
        position: absolute;
        top: 150px;
        bottom: 150px;
        left: 50%;
        width: 2px;
        background: #e0e0e0;
        transform: translateX(-50%);
    }

    .exp-item {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 60px;
        margin-bottom: 100px;
        position: relative;
        align-items: center;
    }

    .exp-item:last-child {
        margin-bottom: 0;
    }

    .exp-item::after {
        content: '';
        position: absolute;
        left: 50%;
        top: 50%;
        transform: translate(-50%, -50%);
        width: 20px;
        height: 20px;
        background: var(--goh-yellow);
        border: 4px solid white;
        border-radius: 50%;
        box-shadow: 0 0 0 1px #e0e0e0;
        z-index: 1;
    }

    .exp-visual {
        position: relative;
        border-radius: 20px;
        overflow: hidden;
        box-shadow: 0 20px 40px rgba(0,0,0,0.1);
        height: 350px;
        transition: transform 0.4s ease;
    }

    .exp-visual:hover {
        transform: translateY(-10px);
    }

    .exp-visual img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .exp-info {
        padding: 40px;
        background: white;
        border-radius: 20px;
        box-shadow: 0 10px 30px rgba(0,0,0,0.03);
        position: relative;
    }
    
    .exp-info::before {
        content: '';
        position: absolute;
        top: 50%;
        width: 20px;
        height: 20px;
        background: white;
        transform: translateY(-50%) rotate(45deg);
    }

    .exp-item:nth-child(odd) .exp-visual { order: 1; }
    .exp-item:nth-child(odd) .exp-info { order: 2; }
    .exp-item:nth-child(odd) .exp-info::before { left: -10px; }

    .exp-item:nth-child(even) .exp-visual { order: 2; }
    .exp-item:nth-child(even) .exp-info { order: 1; text-align: right; }
    .exp-item:nth-child(even) .exp-info::before { right: -10px; }
    .exp-item:nth-child(even) .exp-list li { justify-content: flex-end; }

    .exp-date {
        color: var(--goh-teal);
        font-weight: 700;
        font-size: 0.9rem;
        text-transform: uppercase;
        letter-spacing: 1px;
        margin-bottom: 10px;
        display: block;
    }

    .exp-info h3 {
        font-size: 1.8rem;
        margin-bottom: 5px;
        color: var(--goh-dark);
    }

    .exp-info h4 {
        font-size: 1rem;
        color: #888;
        font-weight: 500;
        margin-bottom: 20px;
    }

    .exp-list {
        list-style: none;
        margin-top: 20px;
    }

    .exp-list li {
        margin-bottom: 10px;
        position: relative;
        display: flex;
        align-items: center;
        color: #555;
    }

    /* 4. STACK TECNOLÓGICO (Slider Compacto) */
    .tech-section {
        padding: 80px 0;
        background: white;
        border-bottom: 1px solid #f0f0f0;
    }

    .tech-slider-container {
        position: relative;
        padding: 0 50px; /* Espacio para flechas */
        max-width: 1000px;
        margin: 0 auto;
    }

    .tech-track {
        display: flex;
        gap: 20px;
        overflow-x: auto;
        padding: 20px 5px;
        scroll-behavior: smooth;
        scrollbar-width: none; /* Firefox */
        -ms-overflow-style: none;  /* IE and Edge */
    }
    
    .tech-track::-webkit-scrollbar {
        display: none; /* Chrome/Safari */
    }

    .tech-item {
        flex: 0 0 110px; /* Ancho fijo */
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        padding: 20px 10px;
        background: white;
        border-radius: 12px;
        box-shadow: 0 5px 15px rgba(0,0,0,0.03);
        border: 1px solid #f5f5f5;
        transition: all 0.3s ease;
        cursor: default;
    }

    .tech-item:hover {
        transform: translateY(-5px);
        border-color: var(--goh-teal);
        box-shadow: 0 10px 25px rgba(0,0,0,0.08);
    }

    .tech-item i {
        font-size: 2.5rem;
        margin-bottom: 12px;
        color: #888;
        transition: color 0.3s;
    }
    
    .tech-item:hover i {
        color: var(--goh-teal);
    }

    .tech-item span {
        font-size: 0.8rem;
        font-weight: 600;
        color: #555;
        text-align: center;
    }

    .tech-nav-btn {
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        width: 40px;
        height: 40px;
        border-radius: 50%;
        background: white;
        box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        border: 1px solid #eee;
        cursor: pointer;
        z-index: 10;
        display: flex;
        align-items: center;
        justify-content: center;
        color: var(--goh-dark);
        transition: all 0.3s;
    }

    .tech-nav-btn:hover {
        background: var(--goh-teal);
        color: white;
        border-color: var(--goh-teal);
    }

    .tech-prev { left: 0; }
    .tech-next { right: 0; }

    /* 5. HABILIDADES BLANDAS & IDIOMAS */
    .soft-skills-section {
        padding: 100px 0;
        background: white;
    }

    .skills-split {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 80px;
    }

    .soft-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
        gap: 20px;
    }

    .soft-card {
        background: #f9f9f9;
        padding: 20px;
        border-radius: 12px;
        display: flex;
        align-items: center;
        gap: 15px;
        transition: 0.3s;
    }

    .soft-card:hover {
        box-shadow: 0 10px 20px rgba(0,0,0,0.05);
        background: white;
    }

    .soft-icon {
        width: 40px;
        height: 40px;
        background: var(--goh-yellow);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: var(--goh-dark);
        font-size: 1.2rem;
        flex-shrink: 0;
    }

    .lang-item {
        margin-bottom: 30px;
    }

    .lang-header {
        display: flex;
        justify-content: space-between;
        margin-bottom: 10px;
        font-weight: 700;
        color: var(--goh-dark);
    }

    .lang-bar {
        height: 10px;
        background: #eee;
        border-radius: 5px;
        overflow: hidden;
    }

    .lang-progress {
        height: 100%;
        background: var(--goh-teal);
        border-radius: 5px;
        width: 0;
        transition: width 1.5s ease-out;
    }

    /* 6. CURSOS SLIDER - REDISEÑO MODERNO */
    .courses-section {
        padding: 100px 0;
        background: #f8f9fa;
        overflow: hidden;
    }

    .slider-container {
        display: flex;
        gap: 30px;
        overflow-x: auto;
        padding: 40px 20px;
        scroll-snap-type: x mandatory;
        -webkit-overflow-scrolling: touch;
        scrollbar-width: none; /* Firefox */
    }
    
    .slider-container::-webkit-scrollbar {
        display: none; /* Chrome/Safari */
    }

    .course-slide {
        flex: 0 0 360px;
        scroll-snap-align: center;
        background: white;
        border-radius: 16px;
        overflow: hidden;
        box-shadow: 0 10px 30px rgba(0,0,0,0.06);
        transition: all 0.3s ease;
        position: relative;
        border: 1px solid rgba(0,0,0,0.04);
        display: flex;
        flex-direction: column;
    }

    .course-slide:hover {
        transform: translateY(-10px);
        box-shadow: 0 20px 40px rgba(0,0,0,0.12);
    }

    .course-header {
        height: 275px;
        background: var(--goh-gray);
        position: relative;
        overflow: hidden;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .course-header-icon {
        font-size: 4rem;
        color: var(--goh-teal);
        opacity: 0.8;
        z-index: 1;
        transition: transform 0.3s;
    }
    
    .course-slide:hover .course-header-icon {
        transform: scale(1.1);
    }
    
    /* Estilo para cuando es PDF preview */
    .course-pdf-preview {
        width: 100%;
        height: 100%;
        object-fit: cover;
        border: none;
        overflow: hidden;
        pointer-events: none;
    }
    
    /* Overlay para el PDF para que parezca imagen y sea clickeable todo el header */
    .course-overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0,0,0,0.02);
        z-index: 2;
        cursor: pointer;
        transition: background 0.3s;
    }
    
    .course-slide:hover .course-overlay {
        background: rgba(0,0,0,0.05);
    }
    
    .course-type-badge {
        position: absolute;
        top: 15px;
        right: 15px;
        background: rgba(255,255,255,0.95);
        padding: 6px 14px;
        border-radius: 30px;
        font-size: 0.75rem;
        font-weight: 700;
        color: var(--goh-dark);
        z-index: 3;
        box-shadow: 0 4px 10px rgba(0,0,0,0.1);
        backdrop-filter: blur(5px);
    }

    .course-content {
        padding: 20px;
        flex-grow: 1;
        display: flex;
        flex-direction: column;
    }

    .course-content h4 {
        font-size: 1.25rem;
        margin-bottom: 8px;
        color: var(--goh-dark);
        font-weight: 700;
        line-height: 1.4;
    }

    .course-meta {
        font-size: 0.85rem;
        color: #888;
        margin-bottom: 15px;
        display: flex;
        align-items: center;
        gap: 8px;
    }
    
    .course-desc {
        font-size: 0.95rem;
        color: #555;
        margin-bottom: 15px;
        line-height: 1.6;
        flex-grow: 1;
    }

    .course-footer {
        margin-top: auto;
        padding-top: 20px;
        border-top: 1px solid #f5f5f5;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .status-badge {
        font-size: 0.75rem;
        font-weight: 700;
        padding: 6px 12px;
        border-radius: 6px;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        display: flex;
        align-items: center;
        gap: 6px;
    }
    
    .status-completed { background: #e8f5e9; color: #2e7d32; }
    .status-progress { background: #e3f2fd; color: #1565c0; }

    .btn-cert {
        font-size: 0.9rem;
        color: var(--goh-teal);
        font-weight: 600;
        text-decoration: none;
        display: flex;
        align-items: center;
        gap: 6px;
        transition: all 0.2s;
        padding: 6px 12px;
        border-radius: 6px;
    }
    
    .btn-cert:hover {
        background: rgba(var(--goh-teal-rgb), 0.1); /* Asumiendo que existe o fallback */
        background: #f0fcfc;
        transform: translateX(3px);
    }

    .slider-controls {
        display: flex;
        justify-content: center;
        gap: 20px;
        margin-top: 30px;
    }

    .slider-btn {
        width: 50px;
        height: 50px;
        border-radius: 50%;
        background: white;
        border: none;
        box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        transition: 0.3s;
        font-size: 1.2rem;
        color: var(--goh-dark);
    }

    .slider-btn:hover {
        background: var(--goh-teal);
        color: white;
        transform: scale(1.1);
    }

    /* Responsive */
    @media (max-width: 992px) {
        .hero-bio { flex-direction: column; padding-top: 120px; text-align: center; }
        .hero-bio::before { width: 100%; height: 40%; top: auto; bottom: 0; clip-path: none; }
        .hero-content-wrapper { grid-template-columns: 1fr; }
        .hero-img-wrapper { height: 50vh; width: 100%; }
        
        .degree-container { grid-template-columns: 1fr; }
        .degree-image { min-height: 250px; }
        
        .experience-section::before { display: none; }
        .exp-item { grid-template-columns: 1fr; gap: 30px; margin-bottom: 60px; }
        .exp-item::after { display: none; }
        .exp-item:nth-child(odd) .exp-visual, .exp-item:nth-child(even) .exp-visual { order: 1; }
        .exp-item:nth-child(odd) .exp-info, .exp-item:nth-child(even) .exp-info { order: 2; text-align: left; }
        .exp-info::before { display: none; }
        .exp-item:nth-child(even) .exp-list li { justify-content: flex-start; }

        .skills-split { grid-template-columns: 1fr; gap: 50px; }
        .course-slide { flex: 0 0 300px; }
    }
</style>

<main>
    <!-- 1. HERO SECTION -->
    <section class="hero-bio">
        <div class="container">
            <div class="hero-content-wrapper">
                <div class="hero-text" data-aos="fade-right">
                    <span class="subtitle">Portfolio Profesional</span>
                    <h1>Gaspar<br>Oddovero<br><span style="color: var(--goh-yellow);">Herrera</span></h1>
                    <p>
                        Desarrollador de Software apasionado por la innovación tecnológica. 
                        Transformo ideas complejas en soluciones digitales robustas, desde aplicaciones web hasta sistemas de gestión empresarial.
                    </p>
                    <div style="display: flex; gap: 15px; flex-wrap: wrap;">
                        <a href="#contacto" class="btn btn-primary">Contactar</a>
                        <a href="https://www.linkedin.com/in/goh-dev/" target="_blank" class="btn btn-outline" style="color: white; border-color: white;">LinkedIn</a>
                    </div>
                </div>
                
                <div class="hero-img-wrapper" data-aos="fade-left">
                    <img src="img/contacto_goh_sf.webp" alt="Gaspar Oddovero Herrera" class="hero-main-img">
                </div>
            </div>
        </div>
    </section>

    <!-- 2. TÍTULO UNIVERSITARIO DESTACADO -->
    <section class="degree-section">
        <div class="container">
            <div class="degree-container" data-aos="fade-up">
                <div class="degree-image">
                    <img src="img/mosaico-portfolio-1.jpeg" alt="Licenciatura en Informática">
                </div>
                <div class="degree-content">
                    <span class="degree-badge">Formación Académica</span>
                    <h2 style="font-size: 2.5rem; margin-bottom: 10px; color: var(--goh-dark);">Licenciado en Informática</h2>
                    <p style="color: #666; font-weight: 700; margin-bottom: 20px; font-size: 1.1rem;">Universidad Siglo 21 | 2019 - 2024</p>
                    <p style="line-height: 1.8; color: #555;">
                        Formación integral de 5 años en gestión de empresas, desarrollo web y arquitectura de software. 
                        Graduado con el proyecto final <strong>"Chefcito"</strong>, una aplicación innovadora que utiliza Inteligencia Artificial para relacionar ingredientes con recetas culinarias.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- 3. TRAYECTORIA PROFESIONAL -->
    <section class="experience-section">
        <div class="container">
            <div style="text-align: center; margin-bottom: 80px;">
                <h2 style="color: var(--goh-dark); font-size: 3rem;">Trayectoria <span style="color: var(--goh-teal);">Profesional</span></h2>
                <p style="color: #666;">Un recorrido por mi experiencia en desarrollo, docencia y gestión.</p>
            </div>

            <!-- Item 1 -->
            <div class="exp-item" data-aos="fade-up">
                <div class="exp-visual">
                    <img src="img/mosaico-portfolio-4.jpeg" alt="GOH DEV">
                </div>
                <div class="exp-info">
                    <span class="exp-date">Agosto 2024 - Actualidad</span>
                    <h3>Fundador & Full Stack Dev</h3>
                    <h4>GOH dev - Marca Personal</h4>
                    <p>Lidero el desarrollo de soluciones tecnológicas a medida para clientes reales.</p>
                    <ul class="exp-list">
                        <li><i class="fas fa-check" style="color: var(--goh-teal); margin-right: 10px;"></i> GOH-GYM: Sistema integral para gimnasios.</li>
                        <li><i class="fas fa-check" style="color: var(--goh-teal); margin-right: 10px;"></i> GOH-Shop: Software de gestión comercial.</li>
                        <li><i class="fas fa-check" style="color: var(--goh-teal); margin-right: 10px;"></i> GOH-Care: Plataforma hospitalaria.</li>
                        <li><i class="fas fa-check" style="color: var(--goh-teal); margin-right: 10px;"></i>Multiples Landing Pages</li>
                    </ul>
                </div>
            </div>

            <!-- Item 2 -->
            <div class="exp-item" data-aos="fade-up">
                <div class="exp-visual">
                    <img src="img/mosaico-portfolio-2.jpeg" alt="Docencia">
                </div>
                <div class="exp-info">
                    <span class="exp-date">Marzo 2024 - Actualidad</span>
                    <h3>Profesor & Orador</h3>
                    <h4>Universidad Popular General Levalle</h4>
                    <p>Comparto conocimiento y formo a futuros desarrolladores.</p>
                    <ul class="exp-list">
                        <li><i class="fas fa-check" style="color: var(--goh-teal); margin-right: 10px;"></i> Profesor de Programación por más de 2 años consecutivos.</li>
                        <li><i class="fas fa-check" style="color: var(--goh-teal); margin-right: 10px;"></i> Dictado de clases: Python, Lógica, Git/GitHub, HTML, CSS, JavaScript y Bootstrap.</li>
                        <li><i class="fas fa-check" style="color: var(--goh-teal); margin-right: 10px;"></i> Conferencias sobre IA y su aplicación en la vida cotidiana.</li>
                        <li><i class="fas fa-check" style="color: var(--goh-teal); margin-right: 10px;"></i> Desarrollo de curso PHP y Bases de Datos para 2026.</li>
                    </ul>
                </div>
            </div>

            <!-- Item 3 -->
            <div class="exp-item" data-aos="fade-up">
                <div class="exp-visual">
                    <img src="img/mosaico-portfolio-3.jpeg" alt="Experiencia Corporativa">
                </div>
                <div class="exp-info">
                    <span class="exp-date">2015 - 2023</span>
                    <h3>Experiencia Corporativa</h3>
                    <h4>Correo Argentino / Siglo 21 / Oddovero Herrajes</h4>
                    <p>Roles que forjaron mi disciplina laboral y gestión.</p>
                    <ul class="exp-list">
                        <li><i class="fas fa-check" style="color: var(--goh-teal); margin-right: 10px;"></i> Operador de sistemas electorales.</li>
                        <li><i class="fas fa-check" style="color: var(--goh-teal); margin-right: 10px;"></i> Desarrollo web colaborativo.(Practicas)</li>
                        <li><i class="fas fa-check" style="color: var(--goh-teal); margin-right: 10px;"></i> Gestión comercial y atención al cliente.</li>
                    </ul>
                </div>
            </div>

        </div>
    </section>

    <!-- 4. STACK TECNOLÓGICO (SLIDER COMPACTO) -->
    <section class="tech-section">
        <div class="container">
            <div style="text-align: center; margin-bottom: 40px;">
                <h2 style="color: var(--goh-dark); font-size: 2.2rem;">Stack <span style="color: var(--goh-teal);">Tecnológico</span></h2>
                <p style="color: #888; font-size: 0.95rem;">Herramientas que potencian mis desarrollos.</p>
            </div>

            <div class="tech-slider-container" data-aos="fade-up">
                <button class="tech-nav-btn tech-prev" onclick="scrollTech(-1)"><i class="fas fa-chevron-left"></i></button>
                
                <div class="tech-track" id="techTrack">
                    <!-- Lenguajes -->
                    <div class="tech-item"><i class="fab fa-python"></i><span>Python</span></div>
                    <div class="tech-item"><i class="fab fa-java"></i><span>Java</span></div>
                    <div class="tech-item"><i class="fab fa-js"></i><span>JavaScript</span></div>
                    <div class="tech-item"><i class="fab fa-php"></i><span>PHP</span></div>
                    <div class="tech-item"><i class="fab fa-html5"></i><span>HTML5</span></div>
                    <div class="tech-item"><i class="fab fa-css3-alt"></i><span>CSS3</span></div>
                    
                    <!-- Frameworks -->
                    <div class="tech-item"><i class="fab fa-react"></i><span>React</span></div>
                    <div class="tech-item"><i class="fas fa-leaf"></i><span>Spring Boot</span></div>
                    <div class="tech-item"><i class="fas fa-stream"></i><span>Streamlit</span></div>
                    
                    <!-- DB -->
                    <div class="tech-item"><i class="fas fa-database"></i><span>MySQL</span></div>
                    <div class="tech-item"><i class="fas fa-fire"></i><span>Firebase</span></div>
                    
                    <!-- Tools -->
                    <div class="tech-item"><i class="fab fa-git-alt"></i><span>Git</span></div>
                    <div class="tech-item"><i class="fas fa-code"></i><span>VS Code</span></div>
                    <div class="tech-item"><i class="fas fa-laptop-code"></i><span>IntelliJ</span></div>
                    <div class="tech-item"><i class="fas fa-sync"></i><span>Agile</span></div>
                </div>

                <button class="tech-nav-btn tech-next" onclick="scrollTech(1)"><i class="fas fa-chevron-right"></i></button>
            </div>
        </div>
    </section>

    <!-- 5. HABILIDADES BLANDAS & IDIOMAS -->
    <section class="soft-skills-section">
        <div class="container">
            <div class="skills-split">
                
                <!-- Habilidades Blandas -->
                <div data-aos="fade-right">
                    <h2 style="margin-bottom: 30px; color: var(--goh-dark);">Habilidades Blandas</h2>
                    <div class="soft-grid">
                        <div class="soft-card">
                            <div class="soft-icon"><i class="fas fa-comments"></i></div>
                            <span>Comunicación Efectiva</span>
                        </div>
                        <div class="soft-card">
                            <div class="soft-icon"><i class="fas fa-users"></i></div>
                            <span>Trabajo en Equipo</span>
                        </div>
                        <div class="soft-card">
                            <div class="soft-icon"><i class="fas fa-brain"></i></div>
                            <span>Resolución de Problemas</span>
                        </div>
                        <div class="soft-card">
                            <div class="soft-icon"><i class="fas fa-clock"></i></div>
                            <span>Gestión del Tiempo</span>
                        </div>
                        <div class="soft-card">
                            <div class="soft-icon"><i class="fas fa-book-reader"></i></div>
                            <span>Aprendizaje Continuo</span>
                        </div>
                        <div class="soft-card">
                            <div class="soft-icon"><i class="fas fa-lightbulb"></i></div>
                            <span>Pensamiento Crítico</span>
                        </div>
                        <div class="soft-card">
                            <div class="soft-icon"><i class="fas fa-heart"></i></div>
                            <span>Empatía y Atención</span>
                        </div>
                    </div>
                </div>

                <!-- Idiomas -->
                <div data-aos="fade-left">
                    <h2 style="margin-bottom: 30px; color: var(--goh-dark);">Idiomas</h2>
                    
                    <div class="lang-item">
                        <div class="lang-header">
                            <span>Español</span>
                            <span>Nativo</span>
                        </div>
                        <div class="lang-bar">
                            <div class="lang-progress" style="width: 100%;"></div>
                        </div>
                    </div>

                    <div class="lang-item">
                        <div class="lang-header">
                            <span>Inglés</span>
                            <span>Intermedio (B2)</span>
                        </div>
                        <div class="lang-bar">
                            <div class="lang-progress" style="width: 60%;"></div>
                        </div>
                    </div>

                    <div style="margin-top: 40px; padding: 20px; background: #f0f8ff; border-left: 4px solid var(--goh-teal); border-radius: 4px;">
                        <p style="font-size: 0.9rem; color: #555;">
                            <i class="fas fa-info-circle" style="color: var(--goh-teal); margin-right: 5px;"></i>
                            Capacidad para leer documentación técnica, redactar informes y mantener conversaciones profesionales en inglés.
                        </p>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- 6. CURSOS & CERTIFICADOS (SLIDER) -->
    <section class="courses-section">
        <div class="container">
            <div style="text-align: center; margin-bottom: 50px;">
                <h2 style="color: var(--goh-dark); font-size: 2.5rem;">Certificaciones y Cursos</h2>
                <p>Formación continua para mantenerme a la vanguardia.</p>
            </div>

            <div class="slider-container" id="coursesSlider">
                <!-- Los cursos se cargarán dinámicamente desde js/cursos-data.js y js/cursos-render.js -->
            </div>

            <div class="slider-controls">
                <button class="slider-btn" onclick="slideLeft()"><i class="fas fa-chevron-left"></i></button>
                <button class="slider-btn" onclick="slideRight()"><i class="fas fa-chevron-right"></i></button>
            </div>
        </div>
    </section>

    <!-- Call to Action Final -->
    <section style="padding: 100px 0; text-align: center; background: white;">
        <div class="container">
            <h2 style="margin-bottom: 20px; font-size: 2.5rem;">¿Listo para trabajar juntos?</h2>
            <p style="margin-bottom: 40px; max-width: 600px; margin-left: auto; margin-right: auto; color: #666;">
                Combino experiencia técnica con visión de negocio para llevar tus proyectos al siguiente nivel.
            </p>
            <a href="index.php#contacto" class="btn btn-primary">Iniciar Conversación</a>
        </div>
    </section>

</main>

<!-- Scripts para cargar cursos dinámicamente -->
<script src="js/cursos-data.js"></script>
<script src="js/cursos-render.js"></script>

<script>
    function scrollTech(direction) {
        const track = document.getElementById('techTrack');
        const scrollAmount = 300; // Scroll por click
        track.scrollBy({ left: direction * scrollAmount, behavior: 'smooth' });
    }

    function slideLeft() {
        const slider = document.getElementById('coursesSlider');
        slider.scrollBy({ left: -350, behavior: 'smooth' });
    }

    function slideRight() {
        const slider = document.getElementById('coursesSlider');
        slider.scrollBy({ left: 350, behavior: 'smooth' });
    }
</script>

<?php
include 'components/empresa/whatsapp-float.php';
include 'components/empresa/footer-empresa.php';
?>
