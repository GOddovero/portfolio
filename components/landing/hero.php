<?php
$shopAreas = [
    'ventas' => ['name' => 'Ventas y caja', 'icon' => 'shop', 'title' => 'De la venta al cierre de caja.', 'description' => 'Registrá cada operación con sus productos, cliente y medios de pago. Consultá el historial y los movimientos de caja desde el mismo sistema.', 'items' => ['Punto de venta y medios de pago', 'Historial de ventas y presupuestos', 'Movimientos y control de caja']],
    'stock' => ['name' => 'Stock y compras', 'icon' => 'boxes', 'title' => 'Cada producto, en su lugar.', 'description' => 'Conectá el catálogo, los precios y las compras con tus proveedores. Una vista compartida para consultar existencias y organizar la reposición.', 'items' => ['Productos, listas de precios y etiquetas', 'Registro de compras y proveedores', 'Consulta de stock y reposición']],
    'clientes' => ['name' => 'Clientes y cobranzas', 'icon' => 'people', 'title' => 'Cuentas claras, cliente por cliente.', 'description' => 'Reuní los datos de tus clientes con sus ventas, pagos y saldos. Seguí las cuentas corrientes sin separar las cobranzas del resto de la operación.', 'items' => ['Ficha e historial de clientes', 'Cuentas corrientes y pagos parciales', 'Seguimiento de saldos y cobranzas']],
    'facturacion' => ['name' => 'Facturación y reportes', 'icon' => 'document', 'title' => 'La información también se conecta.', 'description' => 'Emití comprobantes electrónicos con integración ARCA y consultá reportes comerciales para entender el movimiento de tu negocio.', 'items' => ['Facturación electrónica integrada con ARCA', 'Comprobantes asociados a la operación', 'Reportes de ventas y rendimiento']],
];
?>
<section class="systems-hero hero-personality" id="inicio" aria-labelledby="hero-title">
    <div class="container">
        <div class="institutional-heading hero-heading" id="productos">
            <div data-reveal>
                <div class="hero-brandline"><img src="img/goh1.png" width="997" height="439" alt="GOH"><p class="eyebrow">SOFTWARE PROPIO.<br>IDENTIDAD COMPARTIDA.</p></div>
                <h1 id="hero-title">Nuestros sistemas.<br><span>Una gestión <em>conectada.</em></span></h1>
            </div>
            <div class="hero-summary" data-reveal><p>Distintas actividades. Una misma forma de acompañarlas: <strong>software propio, trato directo</strong> y herramientas que trabajan juntas.</p><nav class="system-jumps" aria-label="Explorar sistemas GOH"><a href="#goh-shop">GOH SHOP</a><a href="#goh-gym">GOH GYM</a><a href="#goh-care">GOH CARE</a></nav><a class="text-link" href="<?= gohWhatsapp('Hola, me gustaría recibir información sobre los sistemas GOH.') ?>" target="_blank" rel="noopener noreferrer">Contactar por WhatsApp <?= gohIcon('arrow') ?></a><div class="brand-palette" aria-hidden="true"><i></i><i></i><i></i></div></div>
        </div>
        <article class="shop-story" id="goh-shop" aria-labelledby="shop-title" data-motion-group>
            <div class="shop-story-main">
                <div class="shop-story-copy" data-reveal>
                    <p class="eyebrow"><span class="system-dot"></span> EL CENTRO DE TU GESTIÓN COMERCIAL</p>
                    <h2 class="product-logo-title" id="shop-title"><img src="img/logo_shop.png" width="642" height="663" alt="GOH SHOP" fetchpriority="high"></h2>
                    <p class="shop-headline">Cada parte de tu comercio.<br><span>Un mismo sistema.</span></p>
                    <p class="shop-description">Ventas, productos, clientes y facturación dejan de ser tareas aisladas. <strong>GOH SHOP las reúne</strong> para acompañar el trabajo de cada día.</p>
                    <div class="shop-attributes"><span><?= gohIcon('globe') ?> Acceso online</span><span><?= gohIcon('document') ?> Integración ARCA</span></div>
                    <div class="system-actions"><a class="button button-yellow" href="<?= gohWhatsapp('Hola, me gustaría recibir información sobre GOH SHOP y sus módulos.') ?>" target="_blank" rel="noopener noreferrer">Consultar por WhatsApp <?= gohIcon('chat') ?></a><a class="text-link" href="https://goh-shop.com.ar/" target="_blank" rel="noopener noreferrer">Visitar sitio <?= gohIcon('arrow') ?></a></div>
                </div>
                <div class="shop-stage">
                    <div class="stage-orbit orbit-one" aria-hidden="true"></div><div class="stage-orbit orbit-two" aria-hidden="true"></div>
                    <div class="stage-label"><span class="status-dot"></span> UNA MIRADA A GOH SHOP <span>01 / SISTEMAS</span></div>
                    <div class="shop-browser"><div class="browser-toolbar" aria-hidden="true"><span><i></i><i></i><i></i></span><span>GOH SHOP · Panel general</span><?= gohIcon('globe') ?></div><div class="shop-browser-screen"><img src="<?= gohAsset('img/landing/goh-shop-dashboard-1280.webp') ?>" srcset="<?= gohAsset('img/landing/goh-shop-dashboard-640.webp') ?> 640w, <?= gohAsset('img/landing/goh-shop-dashboard-1280.webp') ?> 1280w" sizes="(max-width: 760px) calc(100vw - 80px), (max-width: 1440px) 50vw, 700px" decoding="async" width="1720" height="1392" alt="Panel real de GOH SHOP con caja, ventas, cobranzas, cheques y facturación" fetchpriority="high"></div></div>
                    <div class="stage-note note-stock" aria-hidden="true"><?= gohIcon('boxes') ?><span>Productos y stock<strong>Todo conectado.</strong></span></div>
                    <div class="stage-note note-invoice" aria-hidden="true"><?= gohIcon('check') ?><span>Facturación electrónica<strong>Integrada con ARCA.</strong></span></div>
                    <div class="stage-flow" aria-hidden="true"><span>Venta</span><i></i><span>Stock</span><i></i><span>Caja</span><i></i><span>Factura</span></div>
                </div>
            </div>
            <div class="shop-explorer">
                <div class="explorer-intro"><p class="eyebrow">EXPLORÁ EL SISTEMA</p><p>Una herramienta.<br><strong>Todas las áreas conectadas.</strong></p></div>
                <div class="shop-area-nav" role="group" aria-label="Explorar funciones de GOH SHOP" hidden>
                    <?php foreach ($shopAreas as $key => $area): ?>
                    <button type="button" id="shop-control-<?= $key ?>" data-shop-area="<?= $key ?>" aria-controls="shop-area-<?= $key ?>" aria-pressed="<?= $key === 'ventas' ? 'true' : 'false' ?>"><?= gohIcon($area['icon']) ?><span><?= $area['name'] ?></span><?= gohIcon('arrow') ?></button>
                    <?php endforeach; ?>
                </div>
                <div class="shop-area-content">
                    <?php foreach ($shopAreas as $key => $area): ?>
                    <section class="shop-area-panel" id="shop-area-<?= $key ?>" aria-labelledby="shop-area-title-<?= $key ?>">
                        <h3 id="shop-area-title-<?= $key ?>"><?= $area['title'] ?></h3><p><?= $area['description'] ?></p>
                        <ul><?php foreach ($area['items'] as $item): ?><li><?= gohIcon('check') ?><?= $item ?></li><?php endforeach; ?></ul>
                    </section>
                    <?php endforeach; ?>
                </div>
                <p class="shop-scope">Las funciones disponibles se definen según el plan y la configuración de cada comercio.</p>
            </div>
            <a class="shop-modules-bridge" href="#modulos"><span><?= gohIcon('plus') ?> Y cuando tu actividad necesita algo más…</span><strong>Conocé los Módulos GOH <?= gohIcon('arrow') ?></strong></a>
        </article>
    </div>
</section>
