<?php
$gohPage = 'about';
require __DIR__ . '/components/landing/helpers.php';
$pageSchema = [[
    '@type'=>'ProfilePage', '@id'=>gohCanonical('nosotros.php#profile'),
    'url'=>gohCanonical('nosotros.php'), 'name'=>'Gaspar Oddovero Herrera · GOH',
    'inLanguage'=>'es-AR', 'mainEntity'=>['@id'=>gohCanonical('nosotros.php#gaspar')],
], gohBreadcrumbSchema([['Inicio',gohCanonical()],['Nosotros',gohCanonical('nosotros.php')]])];
$pageImage = gohCanonical('img/gaspar-oddovero-800.webp');
require __DIR__ . '/components/landing/header.php';
?>
<main id="contenido" class="about-page">
    <section class="about-hero" id="inicio" aria-labelledby="gaspar">
        <div class="container about-hero-grid">
            <div class="about-hero-copy">
                <p class="eyebrow"><span class="status-dot"></span> NOSOTROS / DETRÁS DE GOH</p>
                <h1 id="gaspar">Gaspar<br><span>Oddovero Herrera.</span></h1>
                <p class="about-name">Licenciado en Informática · Fundador de GOH</p>
                <p class="about-role">General Levalle, Córdoba, Argentina.</p>
                <p class="about-intro">Diseño y desarrollo software para que los negocios puedan gestionar mejor, ordenar su trabajo y seguir creciendo. Desde General Levalle, Córdoba, con un trato directo de principio a fin.</p>
                <div class="about-actions">
                    <a class="button button-dark" href="#contacto">Conversemos <?= gohIcon('chat') ?></a>
                    <a class="text-link" href="#trayectoria">Conocé mi recorrido <?= gohIcon('arrow') ?></a>
                </div>
            </div>
            <div class="about-portrait">
                <span class="portrait-wordmark" aria-hidden="true"><?php require __DIR__ . '/components/landing/brand-symbol.php'; ?></span>
                <img src="<?= gohAsset('img/gaspar-oddovero-800.webp') ?>" srcset="<?= gohAsset('img/gaspar-oddovero-480.webp') ?> 480w, <?= gohAsset('img/gaspar-oddovero-800.webp') ?> 800w" sizes="(max-width:650px) 90vw, 40vw" alt="Gaspar Oddovero Herrera, fundador y desarrollador de GOH" width="800" height="1200" fetchpriority="high" decoding="async">
                <div class="portrait-caption"><span class="status-dot"></span> DESARROLLO PROPIO.<br> TRATO DIRECTO.</div>
            </div>
        </div>
        <div class="container about-hero-foot"><span>DESARROLLO DE SOFTWARE</span><span>PRODUCTOS PROPIOS</span><span>DOCENCIA & APRENDIZAJE</span></div>
    </section>

    <section class="section about-approach" aria-labelledby="approach-title">
        <div class="container about-split">
            <div><p class="eyebrow">01 / MI FORMA DE TRABAJAR</p><h2 id="approach-title">La tecnología importa.<br><span>Las personas, también.</span></h2></div>
            <div class="about-prose">
                <p>GOH es mi marca personal. Hoy soy yo quien está detrás de cada desarrollo: escuchando las necesidades, pensando la solución, escribiendo el código y acompañando su implementación.</p>
                <p>Mi experiencia en gestión comercial, atención al cliente y docencia también forma parte de ese trabajo. Me interesa entender qué pasa en tu negocio y construir una herramienta que te sirva en el día a día.</p>
                <a class="text-link" href="<?= gohUrl('#proyectos') ?>">Conocé los proyectos <?= gohIcon('arrow') ?></a>
            </div>
        </div>
    </section>

    <section class="about-ecosystem container" aria-labelledby="ecosystem-title">
        <div class="about-ecosystem-heading"><div><p class="eyebrow">UNA IDENTIDAD COMPARTIDA</p><h2 id="ecosystem-title">Lo que construyo con GOH.</h2></div><p>Productos propios, herramientas para cada actividad<br>y desarrollos que parten de una necesidad concreta.</p></div>
        <div class="about-systems">
            <a href="<?= gohUrl('#goh-shop') ?>" class="about-system about-system-shop"><img src="<?= gohAsset('img/logo_shop.png') ?>" width="120" height="120" alt="GOH SHOP" loading="lazy"><span><strong>Gestión comercial</strong><span>Ventas, stock, caja y facturación.</span></span><?= gohIcon('arrow') ?></a>
            <a href="<?= gohUrl('#goh-gym') ?>" class="about-system about-system-gym"><img src="<?= gohAsset('img/logo_gohgym.png') ?>" width="120" height="120" alt="GOH GYM" loading="lazy"><span><strong>Administración de gimnasios</strong><span>Socios, membresías y cobros.</span></span><?= gohIcon('arrow') ?></a>
            <a href="<?= gohUrl('#goh-care') ?>" class="about-system about-system-care"><img src="<?= gohAsset('img/goh-care.png') ?>" width="120" height="120" alt="GOH CARE" loading="lazy"><span><strong>Gestión médica</strong><span>Turnos, pacientes e historias clínicas.</span></span><?= gohIcon('arrow') ?></a>
        </div>
        <div class="about-modules"><p><strong>Módulos GOH</strong><span>GOH RESTO · GOH TAX · Próximamente más.</span></p><a class="text-link" href="<?= gohUrl('#modulos') ?>">Explorar módulos <?= gohIcon('arrow') ?></a></div>
    </section>

    <section class="about-degree" aria-labelledby="degree-title">
        <div class="container degree-layout">
            <figure class="degree-photo">
                <img src="<?= gohAsset('img/formacion-gaspar-goh-1280.webp') ?>" srcset="<?= gohAsset('img/formacion-gaspar-goh-640.webp') ?> 640w, <?= gohAsset('img/formacion-gaspar-goh-1280.webp') ?> 1280w" sizes="(max-width:650px) 90vw, 48vw" width="3000" height="2000" loading="lazy" decoding="async" alt="Gaspar durante la entrega de su título en la Universidad Siglo 21">
                <figcaption>Un cierre de etapa. El comienzo de muchas ideas.</figcaption>
            </figure>
            <div class="degree-copy">
                <p class="eyebrow">02 / FORMACIÓN ACADÉMICA</p>
                <h2 id="degree-title">Licenciado<br>en Informática.</h2>
                <p class="degree-university">Universidad Siglo 21 <span>2019 — 2024</span></p>
                <p>Cinco años de formación en gestión de empresas, desarrollo web y arquitectura de software. Una base para conectar la tecnología con las necesidades de cada organización.</p>
                <div class="degree-thesis"><span>PROYECTO FINAL</span><h3>Chefcito</h3><p>Una aplicación que utiliza Inteligencia Artificial para relacionar los ingredientes disponibles con recetas culinarias.</p></div>
            </div>
        </div>
    </section>

    <section class="section about-career" id="trayectoria" aria-labelledby="career-title">
        <div class="container">
            <div class="section-heading"><div><p class="eyebrow">03 / TRAYECTORIA</p><h2 id="career-title">Construir. Compartir.<br><span>Seguir aprendiendo.</span></h2></div><p>Desarrollo, docencia y experiencia comercial.<br>Un recorrido que se conecta en GOH.</p></div>
            <div class="career-list">
                <article class="career-row">
                    <div class="career-period"><span class="career-number">01</span><p>AGOSTO 2024 — ACTUALIDAD</p><span class="career-current">Mi proyecto</span></div>
                    <div class="career-content"><p class="career-company">GOH / MARCA PERSONAL</p><h3>Fundador & desarrollador Full Stack</h3><p>Desarrollo productos propios y sistemas a medida para clientes reales. Desde la primera conversación hasta la implementación y las mejoras del sistema.</p><ul><li>GOH SHOP, GOH GYM y GOH CARE: sistemas para comercios, gimnasios y gestión médica.</li><li>Córdoba Teje: expositores, cobranzas, facturación, entradas y validación QR.</li><li>Global English Academy: administración integral de la academia.</li><li>GOH RESTO y GOH TAX: módulos para gastronomía y gestión contable.</li></ul><a class="text-link" href="index.php#productos">Conocé los productos GOH <?= gohIcon('arrow') ?></a></div>
                </article>
                <article class="career-row">
                    <div class="career-period"><span class="career-number">02</span><p>MARZO 2024 — ACTUALIDAD</p></div>
                    <div class="career-content"><p class="career-company">UNIVERSIDAD POPULAR GENERAL LEVALLE</p><h3>Profesor & orador</h3><p>Comparto conocimiento y acompaño a quienes dan sus primeros pasos en programación. Enseñar también me ayuda a encontrar formas más claras de explicar y resolver problemas.</p><ul><li>Clases de Python, lógica, Git/GitHub, HTML, CSS, JavaScript y Bootstrap.</li><li>Conferencias sobre Inteligencia Artificial y sus aplicaciones cotidianas.</li><li>Desarrollo de un curso de PHP y bases de datos para 2026.</li></ul></div>
                </article>
                <article class="career-row">
                    <div class="career-period"><span class="career-number">03</span><p>2015 — 2023</p></div>
                    <div class="career-content"><p class="career-company">CORREO ARGENTINO / SIGLO 21 / ODDOVERO HERRAJES</p><h3>Experiencia en gestión y tecnología</h3><p>Distintos roles que me acercaron a la operación de un negocio, el trabajo en equipo y la atención al cliente.</p><ul><li>Operación de sistemas electorales.</li><li>Prácticas de desarrollo web colaborativo.</li><li>Gestión comercial y atención al cliente.</li></ul></div>
                </article>
            </div>
        </div>
    </section>

    <section class="section section-dark about-skills" aria-labelledby="skills-title">
        <div class="container">
            <div class="section-heading"><div><p class="eyebrow">04 / CON QUÉ TRABAJO</p><h2 id="skills-title">Herramientas distintas.<br><span>Un mismo propósito.</span></h2></div><p>Elegir la tecnología que necesita cada proyecto y convertirla en una solución útil.</p></div>
            <div class="skills-grid">
                <div><span class="skill-group-number">01 / DESARROLLO</span><h3>Lenguajes & interfaces</h3><ul class="skill-tags"><li>PHP</li><li>JavaScript</li><li>Python</li><li>Java</li><li>HTML5</li><li>CSS3</li><li>React</li></ul></div>
                <div><span class="skill-group-number">02 / DATOS & APLICACIONES</span><h3>Lo que conecta todo</h3><ul class="skill-tags"><li>MySQL</li><li>Firebase</li><li>Spring Boot</li><li>Streamlit</li></ul></div>
                <div><span class="skill-group-number">03 / PROCESO</span><h3>Organización & desarrollo</h3><ul class="skill-tags"><li>Git</li><li>VS Code</li><li>IntelliJ</li><li>Agile</li></ul></div>
            </div>
            <div class="people-skills"><div><h3>Más allá del código.</h3><p>Comunicación efectiva, trabajo en equipo, resolución de problemas, gestión del tiempo, aprendizaje continuo, pensamiento crítico y empatía.</p></div><div class="about-languages"><p><strong>Español</strong><span>Nativo</span></p><p><strong>Inglés</strong><span>Intermedio · B2</span></p><small>Lectura de documentación técnica, redacción de informes y conversaciones profesionales.</small></div></div>
        </div>
    </section>

    <section class="section about-courses" aria-labelledby="courses-title">
        <div class="container">
            <div class="section-heading"><div><p class="eyebrow">05 / FORMACIÓN CONTINUA</p><h2 id="courses-title">Siempre hay algo<br><span>nuevo por aprender.</span></h2></div><p>Cursos, certificaciones y nuevas herramientas que sumo a mi forma de trabajar.</p></div>
            <div class="courses-grid">
                <article class="course-card"><div class="course-topline"><span>Universidad de Helsinki</span><span class="course-status is-progress">En curso</span></div><h3>Full Stack Open</h3><p class="course-description">React, Node.js, GraphQL, TypeScript, React Native y procesos de integración y entrega continua.</p><div class="course-bottom"><span class="course-date">Formación iniciada en 2025</span><span class="course-status">Aprendizaje continuo</span></div></article>
                <article class="course-card"><div class="course-topline"><span>Platzi</span><span class="course-status">Completado</span></div><h3>Terminal y línea de comandos</h3><p class="course-description">Herramientas para trabajar con la terminal y organizar tareas de desarrollo.</p><div class="course-bottom"><span class="course-date">9 de diciembre de 2025</span><a href="<?= gohUrl('cursos_pdf/diploma-terminal.pdf') ?>" target="_blank" rel="noopener">Ver certificado ↗</a></div></article>
                <article class="course-card"><div class="course-topline"><span>Platzi</span><span class="course-status">Completado</span></div><h3>Fundamentos de Ingeniería de Software</h3><p class="course-description">Conceptos y fundamentos para construir y comprender sistemas de software.</p><div class="course-bottom"><span class="course-date">12 de diciembre de 2025</span><a href="<?= gohUrl('cursos_pdf/diploma-ingenieria%20(1).pdf') ?>" target="_blank" rel="noopener">Ver certificado ↗</a></div></article>
                <article class="course-card"><div class="course-topline"><span>Platzi</span><span class="course-status">Completado</span></div><h3>Redes informáticas de internet</h3><p class="course-description">Introducción a la gestión de infraestructura y a los fundamentos de las redes.</p><div class="course-bottom"><span class="course-date">15 de enero de 2026</span><a href="<?= gohUrl('cursos_pdf/diploma-redes.pdf') ?>" target="_blank" rel="noopener">Ver certificado ↗</a></div></article>
            </div>
        </div>
    </section>

    <section class="container about-blog"><span class="about-blog-mark" aria-hidden="true"><?php require __DIR__ . '/components/landing/brand-symbol.php'; ?></span><div><p class="eyebrow">COMPARTIR TAMBIÉN ES PARTE DEL TRABAJO</p><h2>Ideas que ayudan a elegir.</h2><p>En el blog de GOH comparto guías sobre software, gestión y decisiones que aparecen al digitalizar un negocio en Argentina.</p></div><a class="text-link" href="<?= gohUrl('blog/') ?>">Explorar el blog <?= gohIcon('arrow') ?></a></section>

    <section class="about-contact" id="contacto" aria-labelledby="about-contact-title">
        <div class="container about-contact-grid"><div><p class="eyebrow">TU PRÓXIMO PROYECTO</p><h2 id="about-contact-title">Hablás conmigo.<br>Lo construimos juntos.</h2><p>Contame qué necesitás. Pensemos cómo llevarlo a la práctica.</p></div><div class="about-contact-actions"><a class="button button-dark" href="<?= gohWhatsapp('Hola Gaspar, conocí tu trabajo en la web de GOH y me gustaría conversar sobre un proyecto.') ?>" target="_blank" rel="noopener noreferrer">Conversemos por WhatsApp <?= gohIcon('chat') ?></a><a class="text-link" href="mailto:contacto@goh.com.ar">contacto@goh.com.ar</a><a class="text-link" href="https://www.linkedin.com/in/goh-dev/" target="_blank" rel="noopener noreferrer">También me encontrás en LinkedIn <?= gohIcon('arrow') ?></a></div></div>
    </section>
</main>
<?php require __DIR__ . '/components/landing/footer.php'; ?>
