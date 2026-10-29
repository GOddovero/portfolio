<?php
require_once dirname(__DIR__) . '/components/blog/data.php';
$slug = is_string($_GET['slug'] ?? null) ? $_GET['slug'] : '';
$articles = gohArticles();
if (!isset($articles[$slug])) {
    http_response_code(404);
    $gohPage='not-found'; $pageTitle='Artículo no encontrado | Blog GOH'; $pageRobots='noindex,follow'; $pageCanonical='';
    require dirname(__DIR__) . '/components/landing/header.php';
    echo '<main id="contenido"><section class="container blog-empty blog-not-found"><p class="eyebrow">BLOG GOH / 404</p><h1>No encontramos este artículo.</h1><p>Podés explorar las guías de software y gestión disponibles en el blog.</p><a class="button button-dark" href="' . gohUrl('blog/') . '">Volver al blog</a></section>';
    require dirname(__DIR__) . '/components/landing/contact.php';
    echo '</main>';
    require dirname(__DIR__) . '/components/landing/footer.php';
    exit;
}
$article = $articles[$slug];
$requestPath = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
if ($requestPath !== gohArticleUrl($slug)) {
    header('Location: ' . gohArticleUrl($slug), true, 301);
    exit;
}
$gohPage='article';
$pageTitle=$article['seoTitle']; $pageDescription=$article['description'];
$pageCanonical=gohCanonical('blog/' . $slug . '/');
$pageImage=gohCanonical($article['logo']);
$pageSchema = [[
    '@type'=>'BlogPosting', '@id'=>$pageCanonical . '#article', 'url'=>$pageCanonical,
    'headline'=>$article['title'], 'description'=>$article['description'],
    'image'=>[$pageImage], 'inLanguage'=>'es-AR', 'articleSection'=>$article['categoryLabel'],
    'datePublished'=>$article['published'] . 'T09:00:00-03:00', 'dateModified'=>$article['updated'] . 'T09:00:00-03:00',
    'author'=>['@id'=>gohCanonical('nosotros.php#gaspar')], 'publisher'=>['@id'=>gohCanonical('#organization')],
    'mainEntityOfPage'=>['@type'=>'WebPage', '@id'=>$pageCanonical],
    'isPartOf'=>['@id'=>gohCanonical('blog/#blog')], 'wordCount'=>$article['words'],
], gohBreadcrumbSchema([['Inicio',gohCanonical()],['Blog',gohCanonical('blog/')],[$article['title'],$pageCanonical]])];
require dirname(__DIR__) . '/components/landing/header.php';
?>
<main id="contenido" class="article-page tone-<?= gohEscape($article['tone']) ?>">
    <article>
        <header class="article-header container">
            <nav class="breadcrumbs" aria-label="Ruta de navegación"><a href="<?= gohUrl() ?>">Inicio</a><span aria-hidden="true">/</span><a href="<?= gohUrl('blog/') ?>">Blog</a><span aria-hidden="true">/</span><span><?= gohEscape($article['categoryLabel']) ?></span></nav>
            <div class="article-title-grid"><div><p class="eyebrow"><?= gohEscape($article['categoryLabel']) ?> / GUÍAS GOH</p><h1><?= gohEscape($article['title']) ?></h1><div class="article-byline"><a href="<?= gohUrl('nosotros.php') ?>">Por Gaspar Oddovero Herrera · GOH</a><time datetime="<?= $article['published'] ?>"><?= gohBlogDate($article['published']) ?></time><span><?= $article['minutes'] ?> min de lectura</span></div><?php if ($article['updated'] !== $article['published']): ?><p class="article-updated">Actualizado el <time datetime="<?= $article['updated'] ?>"><?= gohBlogDate($article['updated']) ?></time></p><?php endif; ?></div><div class="article-logo"><img src="<?= gohAsset($article['logo']) ?>" alt="<?= gohEscape($article['product']) ?>" width="240" height="190" decoding="async"></div></div>
        </header>
        <div class="container article-layout">
            <aside class="article-aside"><nav class="article-toc" aria-label="Contenido del artículo"><p>En esta guía</p><ol><?php foreach ($article['sections'] as $section): ?><li><a href="#<?= gohEscape($section['id']) ?>"><?= gohEscape($section['title']) ?></a></li><?php endforeach; ?><li><a href="#preguntas">Preguntas frecuentes</a></li><li><a href="#fuentes">Fuentes y referencias</a></li></ol></nav><a class="article-back" href="<?= gohUrl('blog/') ?>">← Todas las guías</a></aside>
            <div class="article-content"><div class="article-answer"><p class="eyebrow">LA RESPUESTA, EN POCAS PALABRAS</p><p><?= gohEscape($article['answer']) ?></p></div>
                <?php foreach ($article['sections'] as $section): ?><section id="<?= gohEscape($section['id']) ?>"><h2><?= gohEscape($section['title']) ?></h2><?= $section['html'] ?></section><?php endforeach; ?>
                <section id="preguntas" class="article-faq"><h2>Preguntas frecuentes</h2><?php foreach ($article['faqs'] as $faq): ?><details><summary><?= gohEscape($faq[0]) ?><?= gohIcon('plus') ?></summary><p><?= gohEscape($faq[1]) ?></p></details><?php endforeach; ?></section>
                <section id="fuentes" class="article-sources"><h2>Fuentes y referencias</h2><p>Las funciones de los productos se consultan en su presentación oficial. El alcance, las integraciones y las condiciones se confirman al conversar sobre cada implementación.</p><ul><?php foreach ($article['sources'] as $source): ?><li><a href="<?= gohEscape($source[1]) ?>" target="_blank" rel="noopener noreferrer"><?= gohEscape($source[0]) ?> ↗</a></li><?php endforeach; ?></ul></section>
                <div class="article-product"><img src="<?= gohAsset($article['logo']) ?>" alt="" width="120" height="100" loading="lazy"><div><p class="eyebrow">CONTINUÁ EXPLORANDO</p><h2><?= $article['product'] === 'GOH' ? 'Tu proceso, tu proyecto.' : 'Conocé ' . gohEscape($article['product']) ?></h2><p>Contanos cómo trabajás y revisemos el alcance que necesitás.</p><a class="text-link" href="<?= gohEscape(gohProductUrl($article)) ?>">Ver la propuesta <?= gohIcon('arrow') ?></a><a class="text-link" href="<?= gohWhatsapp('Hola, leí la guía «' . $article['title'] . '» en el blog y quisiera consultar sobre ' . $article['product'] . '.') ?>" target="_blank" rel="noopener noreferrer">Consultar por WhatsApp <?= gohIcon('chat') ?></a></div></div>
                <div class="article-author"><img src="<?= gohAsset('img/gaspar-oddovero-480.webp') ?>" alt="Gaspar Oddovero Herrera" width="480" height="720" loading="lazy"><div><p class="eyebrow">SOBRE EL AUTOR</p><h2><a href="<?= gohUrl('nosotros.php') ?>">Gaspar Oddovero Herrera</a></h2><p>Licenciado en Informática y fundador de GOH. Sistemas de gestión y desarrollo de software desde General Levalle, Córdoba, Argentina.</p><a class="text-link" href="<?= gohUrl('nosotros.php') ?>">Formación y proyectos <?= gohIcon('arrow') ?></a></div></div>
            </div>
        </div>
    </article>
    <section class="container blog-related" aria-labelledby="related-title"><p class="eyebrow">PARA SEGUIR LEYENDO</p><h2 id="related-title">Otras guías que te pueden servir.</h2><div class="blog-grid"><?php foreach ($article['related'] as $related): if (!isset($articles[$related])) continue; $post=$articles[$related]; require dirname(__DIR__) . '/components/blog/card.php'; endforeach; ?></div></section>
    <?php require dirname(__DIR__) . '/components/landing/contact.php'; ?>
</main>
<?php require dirname(__DIR__) . '/components/landing/footer.php'; ?>
