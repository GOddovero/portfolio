<?php
require_once __DIR__ . '/components/blog/data.php';
header('Content-Type: application/xml; charset=UTF-8');
$entries = [
    [gohCanonical(), date('Y-m-d', max(filemtime(__DIR__ . '/index.php'), filemtime(__DIR__ . '/components/landing/hero.php')))],
    [gohCanonical('nosotros.php'), date('Y-m-d', filemtime(__DIR__ . '/nosotros.php'))],
];
$articles = gohArticles();
$blogModified = date('Y-m-d', filemtime(__DIR__ . '/blog/index.php'));
foreach ($articles as $post) {
    $blogModified = max($blogModified, $post['updated']);
    $entries[] = [gohCanonical('blog/' . $post['slug'] . '/'), $post['updated']];
}
$entries[] = [gohCanonical('blog/'), $blogModified];
echo '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
echo '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">' . "\n";
foreach ($entries as [$url, $modified]) {
    echo '  <url><loc>' . htmlspecialchars($url, ENT_XML1, 'UTF-8') . '</loc><lastmod>' . $modified . '</lastmod></url>' . "\n";
}
echo '</urlset>';
