<?php
$gohPage = 'about';
require __DIR__ . '/components/landing/helpers.php';
require __DIR__ . '/components/landing/header.php';
?>
<main id="contenido" class="about-page">
    <section class="about-hero section-dark" id="inicio" aria-labelledby="about-title">
        <div class="container about-hero-grid">
            <div class="about-hero-copy">
                <p class="eyebrow">NOSOTROS / UNA MARCA, UNA PERSONA</p>
                <h1 id="about-title">Detrás de GOH,<br><span>estoy yo.</span></h1>
                <p class="about-name">Gaspar Oddovero Herrera</p>
                <p class="about-role">Licenciado en Informática · Fundador de GOH</p>
                <p class="about-intro">Diseño y desarrollo software para que los negocios puedan gestionar mejor, ordenar su trabajo y seguir creciendo. Desde General Levalle, Córdoba, con un trato directo de principio a fin.</p>
                <div class="about-actions">
                    <a class="button button-yellow" href="#contacto">Hablemos de tu proyecto</a>
                    <a class="text-link" href="#trayectoria">Conocé mi recorrido <?= gohIcon('arrow') ?></a>
                </div>
            </div>
            <div class="about-portrait">
                <span class="portrait-wordmark" aria-hidden="true">GOH</span>
                <img src="<?= gohAsset('img/contacto_goh_sf.webp') ?>" alt="Gaspar Oddovero Herrera, fundador y desarrollador de GOH" width="2000" height="3000" fetchpriority="high">
                <div class="portrait-caption"><span class="status-dot"></span> EL QUE ESCUCHA TU IDEA.<br> EL QUE LA DESARROLLA.</div>
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
                <a class="text-link" href="index.php#proyectos">Mirá algunos de mis trabajos <?= gohIcon('arrow') ?></a>
            </div>
        </div>
    </section>

    <section class="about-degree" aria-labelledby="degree-title">
        <div class="container degree-layout">
            <figure class="degree-photo">
                <img src="<?= gohAsset('img/mosaico-portfolio-1.jpeg') ?>" width="3000" height="2000" loading="lazy" alt="Gaspar durante la entrega de su título en la Universidad Siglo 21">
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
                    <div class="career-content"><p class="career-company">GOH / MARCA PERSONAL</p><h3>Fundador & desarrollador Full Stack</h3><p>Desarrollo productos propios y sistemas a medida para clientes reales. Desde la primera conversación hasta la implementación y las mejoras del sistema.</p><ul><li>GOH GYM y GOH SHOP: gestión para gimnasios y comercios.</li><li>Córdoba Teje: expositores, cobranzas, facturación, entradas y validación QR.</li><li>Global English Academy: administración integral de la academia.</li><li>GOH CARE, plataforma hospitalaria, y desarrollo de sitios web y landing pages.</li></ul><a class="text-link" href="index.php#productos">Conocé los productos GOH <?= gohIcon('arrow') ?></a></div>
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
            <div id="coursesSlider" class="courses-grid"></div>
            <noscript><p>Certificaciones de Platzi: <a href="cursos_pdf/diploma-terminal.pdf">Terminal y línea de comandos</a>, <a href="cursos_pdf/diploma-ingenieria%20(1).pdf">Fundamentos de Ingeniería de Software</a> y <a href="cursos_pdf/diploma-redes.pdf">Redes informáticas de internet</a>. Full Stack Open, Universidad de Helsinki: en curso.</p></noscript>
        </div>
    </section>

    <section class="about-contact" id="contacto" aria-labelledby="about-contact-title">
        <div class="container about-contact-grid"><div><p class="eyebrow">TU PRÓXIMO PROYECTO</p><h2 id="about-contact-title">Hablás conmigo.<br>Lo construimos juntos.</h2><p>Contame qué necesitás. Pensemos cómo llevarlo a la práctica.</p></div><div class="about-contact-actions"><a class="button button-dark" href="<?= gohWhatsapp('Hola Gaspar, conocí tu trabajo en la web de GOH y me gustaría conversar sobre un proyecto.') ?>" target="_blank" rel="noopener noreferrer">Conversemos por WhatsApp <?= gohIcon('chat') ?></a><a class="text-link" href="mailto:contacto@goh.com.ar">contacto@goh.com.ar</a><a class="text-link" href="https://www.linkedin.com/in/goh-dev/" target="_blank" rel="noopener noreferrer">También me encontrás en LinkedIn <?= gohIcon('arrow') ?></a></div></div>
    </section>
</main>
<script src="<?= gohAsset('js/cursos-data.js') ?>" defer></script>
<script src="<?= gohAsset('js/cursos-render.js') ?>" defer></script>
<?php require __DIR__ . '/components/landing/footer.php'; ?>
