<?php
// Alias público del programa para emprendedores de GOH-Shop.
$requestPath = parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH);
if (rtrim($requestPath, '/') === '/emprende') {
    header('Location: https://goh-shop.com.ar/emprendedores', true, 301);
    exit;
}

require __DIR__ . '/components/landing/helpers.php';
require __DIR__ . '/components/landing/header.php';
?>
<main id="contenido">
<?php
require __DIR__ . '/components/landing/hero.php';
require __DIR__ . '/components/landing/products.php';
require __DIR__ . '/components/landing/projects.php';
require __DIR__ . '/components/landing/studio.php';
require __DIR__ . '/components/landing/contact.php';
?>
</main>
<?php require __DIR__ . '/components/landing/footer.php'; ?>

