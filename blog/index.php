<?php
require_once dirname(__DIR__) . '/components/blog/data.php';
$gohPage = 'blog';
$pageTitle = 'Blog GOH | Guías de software y gestión en Argentina';
$pageDescription = 'Guías de GOH para comercios, gimnasios, consultorios y estudios contables en Argentina. Sistemas de gestión y desarrollo de software con Gaspar Oddovero Herrera.';
$pageCanonical = gohCanonical('blog/');
$articles = gohArticles();
$categories = gohBlogCategories();
$query = is_string($_GET['q'] ?? null) ? trim($_GET['q']) : '';
$query = function_exists('mb_substr') ? mb_substr($query, 0, 80, 'UTF-8') : substr($query, 0, 80);
$category = is_string($_GET['categoria'] ?? null) && isset($categories[$_GET['categoria']]) ? $_GET['categoria'] : '';
if (parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH) === gohUrl('blog/index.php')) {
    $parameters = http_build_query(array_filter(['q'=>$query, 'categoria'=>$category]));
    header('Location: ' . gohUrl('blog/') . ($parameters ? '?' . $parameters : ''), true, 301);
    exit;
}
$filtered = $query !== '' || $category !== '';
if ($filtered) $pageRobots = 'noindex,follow';
$results = array_filter($articles, function ($post) use ($query, $category) {
    if ($category !== '' && $category !== $post['category']) return false;
    $haystack = gohSearchText($post['title'] . ' ' . $post['description'] . ' ' . $post['product'] . ' ' . $post['categoryLabel'] . ' ' . $post['answer']);
    foreach (preg_split('/\s+/u', gohSearchText($query), -1, PREG_SPLIT_NO_EMPTY) as $term) {
        if (strpos($haystack, $term) === false) return false;
    }
    return true;
});
$featured = $articles['elegir-sistema-gestion-comercios-argentina'] ?? reset($articles);
$pageSchema = [[
    '@type'=>'Blog', '@id'=>gohCanonical('blog/#blog'), 'url'=>$pageCanonical,
    'name'=>'Blog GOH', 'description'=>$pageDescription, 'inLanguage'=>'es-AR',
    'publisher'=>['@id'=>gohCanonical('#organization')],
], gohBreadcrumbSchema([['Inicio', gohCanonical()], ['Blog', $pageCanonical]])];
require dirname(__DIR__) . '/components/landing/header.php';
?>
<main id="contenido" class="blog-page">
    <section class="blog-intro container" aria-labelledby="blog-title">
        <div class="blog-intro-top"><p class="eyebrow"><span class="status-dot"></span> BLOG GOH / CONOCIMIENTO COMPARTIDO</p><span>Desde Córdoba, Argentina</span></div>
        <div class="blog-intro-grid"><h1 id="blog-title">Software y gestión.<br><span>Ideas claras.</span></h1><div><p>Guías de software y gestión para <strong>negocios y organizaciones de Argentina.</strong> Preguntas concretas, criterios para elegir y herramientas para trabajar mejor.</p><a class="text-link" href="<?= gohUrl('nosotros.php') ?>">Conocé a Gaspar, detrás de GOH <?= gohIcon('arrow') ?></a></div></div>
    </section>
    <?php if (!$filtered && $featured): ?>
    <section class="container blog-feature-section" aria-label="Lectura destacada">
        <article class="blog-feature tone-shop">
            <a class="blog-feature-art" href="<?= gohArticleUrl($featured['slug']) ?>" aria-label="<?= gohEscape($featured['title']) ?>"><div class="feature-brand"><img src="<?= gohAsset($featured['logo']) ?>" width="130" height="130" alt="GOH SHOP"><span>COMERCIO<br>EN CONEXIÓN.</span></div><img class="feature-screen" src="<?= gohAsset('img/landing/goh-shop-dashboard-1280.webp') ?>" srcset="<?= gohAsset('img/landing/goh-shop-dashboard-640.webp') ?> 640w, <?= gohAsset('img/landing/goh-shop-dashboard-1280.webp') ?> 1280w" sizes="(max-width:760px) 90vw, 50vw" width="1720" height="1392" decoding="async" fetchpriority="high" alt="Panel de gestión de GOH SHOP"></a>
            <div class="blog-feature-copy"><p class="eyebrow">PARA EMPEZAR / COMERCIOS</p><h2><a href="<?= gohArticleUrl($featured['slug']) ?>"><?= gohEscape($featured['title']) ?></a></h2><p><?= gohEscape($featured['description']) ?></p><div class="blog-feature-bottom"><a class="text-link" href="<?= gohArticleUrl($featured['slug']) ?>">Leer la guía <?= gohIcon('arrow') ?></a><span><?= $featured['minutes'] ?> min de lectura</span></div></div>
        </article>
    </section>
    <?php endif; ?>
    <section class="container blog-library" id="articulos" aria-labelledby="library-title">
        <div class="blog-library-heading"><div><p class="eyebrow">EXPLORÁ POR ACTIVIDAD</p><h2 id="library-title"><?= $filtered ? 'Resultados de tu búsqueda' : 'Una guía para cada necesidad.' ?></h2></div><form class="blog-search" action="<?= gohUrl('blog/') ?>#articulos" method="get" role="search"><label class="sr-only" for="blog-search">Buscar en el blog</label><input id="blog-search" type="search" name="q" value="<?= gohEscape($query) ?>" placeholder="Buscá un tema o sistema" maxlength="80"><?php if ($category): ?><input type="hidden" name="categoria" value="<?= gohEscape($category) ?>"><?php endif; ?><button type="submit" aria-label="Buscar artículos"><?= gohIcon('search') ?></button></form></div>
        <nav class="blog-filters" aria-label="Filtrar artículos por actividad"><a href="<?= gohUrl('blog/') ?>#articulos"<?= !$filtered ? ' aria-current="page"' : '' ?>>Todas las guías</a><?php foreach ($categories as $key=>$label): ?><a href="<?= gohEscape(gohUrl('blog/?' . http_build_query(array_filter(['categoria'=>$key, 'q'=>$query])))) ?>#articulos"<?= $category === $key ? ' aria-current="page"' : '' ?>><?= gohEscape($label) ?></a><?php endforeach; ?></nav>
        <?php if ($filtered): ?><p class="blog-results"><?= count($results) ?> <?= count($results) === 1 ? 'guía encontrada' : 'guías encontradas' ?><?= $query !== '' ? ' para «' . gohEscape($query) . '»' : '' ?>. <a href="<?= gohUrl('blog/') ?>#articulos">Quitar filtros</a></p><?php endif; ?>
        <div class="blog-grid"><?php foreach ($results as $post): if (!$filtered && $featured && $post['slug'] === $featured['slug']) continue; require dirname(__DIR__) . '/components/blog/card.php'; endforeach; ?></div>
        <?php if (!$results): ?><div class="blog-empty"><h3>No encontramos una guía con esos términos.</h3><p>Probá con “stock”, “turnos”, “gimnasio” o el nombre de un sistema GOH.</p><a class="text-link" href="<?= gohUrl('blog/') ?>#articulos">Ver todas las guías <?= gohIcon('arrow') ?></a></div><?php endif; ?>
    </section>
    <section class="blog-author-strip container"><img src="<?= gohAsset('img/gaspar-oddovero-480.webp') ?>" alt="Gaspar Oddovero Herrera" width="480" height="720" loading="lazy" decoding="async"><div><p class="eyebrow">QUIÉN ESTÁ DETRÁS DE GOH</p><h2>Gaspar Oddovero Herrera</h2><p>Licenciado en Informática. Desarrollo de software, productos propios y soluciones a medida desde General Levalle, Córdoba.</p></div><a class="text-link" href="<?= gohUrl('nosotros.php') ?>">Conocé mi recorrido <?= gohIcon('arrow') ?></a></section>
    <?php require dirname(__DIR__) . '/components/landing/contact.php'; ?>
</main>
<?php require dirname(__DIR__) . '/components/landing/footer.php'; ?>
