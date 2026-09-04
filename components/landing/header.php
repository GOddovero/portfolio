<?php
$isAboutPage = ($gohPage ?? 'home') === 'about';
$homePrefix = $isAboutPage ? 'index.php' : '';
$pageTitle = $isAboutPage
    ? 'Nosotros | Gaspar Oddovero Herrera · GOH'
    : 'GOH | Gestioná, Ordená, Hacé crecer tu negocio. · GOH GYM & GOH SHOP';
$pageDescription = $isAboutPage
    ? 'Conocé a Gaspar Oddovero Herrera, fundador de GOH y Licenciado en Informática. Desarrollo de software, formación y una forma cercana de trabajar con tu negocio.'
    : 'Conocé GOH GYM y GOH SHOP: software para gestionar gimnasios y comercios. Desarrollamos sistemas a medida para eventos, academias y empresas en Argentina.';
$pageCanonical = 'https://goh.com.ar/' . ($isAboutPage ? 'nosotros.php' : '');
?>
<!DOCTYPE html>
<html lang="es-AR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($pageTitle, ENT_QUOTES, 'UTF-8') ?></title>
    <meta name="description" content="<?= htmlspecialchars($pageDescription, ENT_QUOTES, 'UTF-8') ?>">
    <meta name="theme-color" content="#3b2f2f">
    <meta name="author" content="Gaspar Oddovero Herrera · GOH">
    <link rel="canonical" href="<?= $pageCanonical ?>">
    <link rel="icon" type="image/png" href="img/png1.png">
    <meta property="og:type" content="website">
    <meta property="og:locale" content="es_AR">
    <meta property="og:site_name" content="GOH">
    <meta property="og:title" content="<?= htmlspecialchars($pageTitle, ENT_QUOTES, 'UTF-8') ?>">
    <meta property="og:description" content="<?= htmlspecialchars($pageDescription, ENT_QUOTES, 'UTF-8') ?>">
    <meta property="og:url" content="<?= $pageCanonical ?>">
    <meta property="og:image" content="https://goh.com.ar/img/goh1.png">
    <meta name="twitter:card" content="summary">
    <meta name="twitter:title" content="<?= htmlspecialchars($pageTitle, ENT_QUOTES, 'UTF-8') ?>">
    <meta name="twitter:description" content="<?= htmlspecialchars($pageDescription, ENT_QUOTES, 'UTF-8') ?>">
    <meta name="twitter:image" content="https://goh.com.ar/img/goh1.png">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@500;600;700;800&family=Montserrat:wght@500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?= gohAsset('css/landing.css') ?>">
    <?php if ($isAboutPage): ?>
    <link rel="stylesheet" href="<?= gohAsset('css/nosotros.css') ?>">
    <?php endif; ?>
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-PWYCK0SF3P"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());
        gtag('config', 'G-PWYCK0SF3P');
    </script>
    <script type="application/ld+json">
    {"@context":"https://schema.org","@type":"Organization","name":"GOH","url":"https://goh.com.ar/","logo":"https://goh.com.ar/img/goh1.png","description":"Desarrollo de software para gimnasios, comercios y empresas. GOH GYM, GOH SHOP y sistemas a medida.","email":"contacto@goh.com.ar","telephone":"+543385405049","address":{"@type":"PostalAddress","addressLocality":"General Levalle","addressRegion":"Córdoba","addressCountry":"AR"},"founder":{"@type":"Person","name":"Gaspar Oddovero Herrera"},"sameAs":["https://www.linkedin.com/in/goh-dev/","https://www.instagram.com/goh.dev/","https://github.com/GOddovero"]}
    </script>
</head>
<body>
<a class="skip-link" href="#contenido">Saltar al contenido</a>
<header class="site-header">
    <div class="container header-inner">
        <a class="brand" href="<?= $homePrefix ?>#inicio" aria-label="GOH, inicio">
            <img src="img/goh1.png" width="997" height="439" alt="GOH">
            <span>Software &<br> desarrollo digital</span>
        </a>
        <nav id="main-nav" class="main-nav" aria-label="Navegación principal">
            <a href="<?= $homePrefix ?>#productos">Productos</a>
            <a href="<?= $homePrefix ?>#proyectos">Proyectos</a>
            <a href="nosotros.php"<?= $isAboutPage ? ' aria-current="page"' : '' ?>>Nosotros</a>
            <a class="nav-contact" href="#contacto">Hablemos <?= gohIcon('arrow') ?></a>
        </nav>
        <button class="menu-toggle" type="button" aria-label="Abrir menú" aria-expanded="false" aria-controls="main-nav"><span></span><span></span></button>
    </div>
</header>
