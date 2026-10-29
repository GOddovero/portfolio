<?php
$gohPage = $gohPage ?? 'home';
$isHomePage = $gohPage === 'home';
$isAboutPage = $gohPage === 'about';
$isBlogPage = in_array($gohPage, ['blog', 'article', 'not-found'], true);
$homePrefix = $isHomePage ? '' : gohUrl();
$pageTitle = $pageTitle ?? ($isAboutPage
    ? 'Gaspar Oddovero Herrera | Desarrollo de software · GOH'
    : 'GOH | Sistemas de gestión y software en Argentina');
$pageDescription = $pageDescription ?? ($isAboutPage
    ? 'Conocé a Gaspar Oddovero Herrera, fundador de GOH y Licenciado en Informática. Desarrollo de software, formación y una forma cercana de trabajar con tu negocio.'
    : 'Sistemas GOH: GOH SHOP, GOH GYM y GOH CARE. Módulos GOH RESTO y GOH TAX. Software de gestión y desarrollos a medida desde Córdoba, Argentina.');
$pageCanonical = $pageCanonical ?? gohCanonical($isAboutPage ? 'nosotros.php' : '');
$pageImage = $pageImage ?? gohCanonical('img/goh1.png');
$pageRobots = $pageRobots ?? 'index,follow,max-image-preview:large';
$schemaGraph = [gohOrganizationSchema(), gohPersonSchema(), [
    '@type' => 'WebSite', '@id' => gohCanonical('#website'), 'url' => gohCanonical(),
    'name' => 'GOH', 'inLanguage' => 'es-AR', 'publisher' => ['@id' => gohCanonical('#organization')],
]];
foreach ($pageSchema ?? [] as $schemaItem) $schemaGraph[] = $schemaItem;
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
    <meta name="robots" content="<?= gohEscape($pageRobots) ?>">
    <?php if ($pageCanonical): ?><link rel="canonical" href="<?= gohEscape($pageCanonical) ?>"><?php endif; ?>
    <link rel="icon" type="image/svg+xml" href="<?= gohAsset('img/goh-corporativo.svg') ?>">
    <?php if ($isHomePage): ?><link rel="preload" as="image" href="<?= gohAsset('img/png1.png') ?>"><?php endif; ?>
    <meta property="og:type" content="<?= $gohPage === 'article' ? 'article' : 'website' ?>">
    <meta property="og:locale" content="es_AR">
    <meta property="og:site_name" content="GOH">
    <meta property="og:title" content="<?= htmlspecialchars($pageTitle, ENT_QUOTES, 'UTF-8') ?>">
    <meta property="og:description" content="<?= htmlspecialchars($pageDescription, ENT_QUOTES, 'UTF-8') ?>">
    <meta property="og:url" content="<?= gohEscape($pageCanonical) ?>">
    <meta property="og:image" content="<?= gohEscape($pageImage) ?>">
    <meta name="twitter:card" content="summary">
    <meta name="twitter:title" content="<?= htmlspecialchars($pageTitle, ENT_QUOTES, 'UTF-8') ?>">
    <meta name="twitter:description" content="<?= htmlspecialchars($pageDescription, ENT_QUOTES, 'UTF-8') ?>">
    <meta name="twitter:image" content="<?= gohEscape($pageImage) ?>">
    <?php if (isset($article)): ?>
    <meta property="article:published_time" content="<?= gohEscape($article['published']) ?>T09:00:00-03:00">
    <meta property="article:modified_time" content="<?= gohEscape($article['updated']) ?>T09:00:00-03:00">
    <?php endif; ?>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@500;600;700;800&family=Montserrat:wght@500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?= gohAsset('css/landing.css') ?>">
    <link rel="stylesheet" href="<?= gohAsset('css/institutional.css') ?>">
    <?php if ($isHomePage): ?>
    <script src="<?= gohAsset('js/intro.js') ?>"></script>
    <?php endif; ?>
    <?php if ($isBlogPage): ?><link rel="stylesheet" href="<?= gohAsset('css/blog.css') ?>"><?php endif; ?>
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
    <?= json_encode(['@context' => 'https://schema.org', '@graph' => $schemaGraph], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_HEX_TAG | JSON_HEX_AMP) ?>
    </script>
</head>
<body class="institutional-site <?= $isHomePage ? 'institutional-home' : ($isAboutPage ? 'about-layout' : 'blog-layout') ?>">
<?php if ($isHomePage) require __DIR__ . '/intro.php'; ?>
<a class="skip-link" href="#contenido">Saltar al contenido</a>
<header class="site-header">
    <div class="container header-inner">
        <a class="brand" href="<?= $homePrefix ?>#inicio" aria-label="GOH, inicio">
            <span class="brand-symbol" aria-hidden="true"><?php require __DIR__ . '/brand-symbol.php'; ?></span>
            <span class="brand-name"><img class="brand-wordmark" src="<?= gohAsset('img/goh1.png') ?>" width="997" height="439" alt="GOH"><small>Sistemas & desarrollo</small></span>
        </a>
        <nav id="main-nav" class="main-nav" aria-label="Navegación principal">
            <a href="<?= $homePrefix ?>#productos">Sistemas</a>
            <a href="<?= $homePrefix ?>#modulos">Módulos GOH</a>
            <a href="<?= $homePrefix ?>#proyectos">Casos de éxito</a>
            <a href="<?= gohUrl('nosotros.php') ?>"<?= $isAboutPage ? ' aria-current="page"' : '' ?>>Nosotros</a>
            <a href="<?= gohUrl('blog/') ?>"<?= $isBlogPage ? ' aria-current="page"' : '' ?>>Blog</a>
            <a class="nav-contact" href="#contacto">Contacto <?= gohIcon('arrow') ?></a>
        </nav>
        <button class="menu-toggle" type="button" aria-label="Abrir menú" aria-expanded="false" aria-controls="main-nav"><span></span><span></span></button>
    </div>
</header>
