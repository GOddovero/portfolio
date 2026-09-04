<section id="productos" class="section products-section" aria-labelledby="products-title">
    <span id="ecosistema" class="anchor-alias" aria-hidden="true"></span>
    <div class="container">
        <div class="section-heading products-heading">
            <div>
                <p class="eyebrow">01 / NUESTROS PRODUCTOS</p>
                <h2 id="products-title">Potenciá la forma<br> <span>de gestionar.</span></h2>
            </div>
            <div class="products-intro">
                <p>Tu gimnasio. Tu comercio. Tu próximo nivel.<br> Dos productos GOH para poner tu negocio en movimiento.</p>
            </div>
        </div>
        <div class="product-grid">
            <article class="product-card product-gym" id="goh-gym">
                <div class="product-topline"><span class="product-category"><?= gohIcon('gym') ?> GESTIÓN PARA GIMNASIOS</span><span class="product-number">01 / GYM</span></div>
                <div class="product-title"><h3>GOH GYM</h3><img src="img/logo_gym.png" alt="" width="80" height="80" loading="lazy"></div>
                <p class="product-promise">Tu gimnasio al día.<br> Tus socios, más cerca.</p>
                <div class="product-gallery">
                    <div class="product-screenshot gym-screen"><img id="gym-preview" src="<?= gohAsset('img/landing/goh-gym-dashboard.png') ?>" width="1720" height="1392" alt="Panel general de GOH GYM con membresías, cobros y asistencias" loading="lazy" decoding="async"></div>
                    <div class="screenshot-switcher" role="group" aria-label="Vistas de GOH GYM" hidden>
                        <button type="button" data-preview="<?= gohAsset('img/landing/goh-gym-dashboard.png') ?>" data-preview-alt="Panel general de GOH GYM con membresías, cobros y asistencias" aria-pressed="true" class="is-active">Panel general</button>
                        <button type="button" data-preview="<?= gohAsset('img/landing/goh-gym-socios.png') ?>" data-preview-alt="Gestión de socios de GOH GYM con membresías, vencimientos y filtros" aria-pressed="false">Gestión de socios</button>
                    </div>
                </div>
                <p class="product-description">Menos tiempo administrando. Más tiempo para tu comunidad. Conectá la gestión de tu gimnasio con la experiencia de tus socios.</p>
                <ul class="feature-list">
                    <li><?= gohIcon('check') ?> Socios y membresías</li>
                    <li><?= gohIcon('check') ?> Accesos y asistencias</li>
                    <li><?= gohIcon('check') ?> Caja y cobranzas</li>
                    <li><?= gohIcon('check') ?> App y planes de entrenamiento</li>
                </ul>
                <div class="product-actions">
                    <a class="button button-dark" href="https://goh-gym.com.ar/" target="_blank" rel="noopener noreferrer">Conocé GOH GYM <?= gohIcon('arrow') ?></a>
                    <a class="product-demo" href="<?= gohWhatsapp('Hola, quiero conocer GOH GYM y coordinar una demo para mi gimnasio.') ?>" target="_blank" rel="noopener noreferrer">Solicitar demo <?= gohIcon('arrow') ?></a>
                </div>
            </article>
            <article class="product-card product-shop" id="goh-shop">
                <div class="product-topline"><span class="product-category"><?= gohIcon('shop') ?> GESTIÓN PARA COMERCIOS</span><span class="product-number">02 / SHOP</span></div>
                <div class="product-title"><h3>GOH SHOP</h3><img src="img/logo_shop.png" alt="" width="80" height="80" loading="lazy"></div>
                <p class="product-promise">Cada venta cuenta.<br> Tené todo bajo control.</p>
                <div class="product-gallery">
                    <div class="product-screenshot shop-screen"><img src="<?= gohAsset('img/landing/goh-shop-dashboard.png') ?>" width="1720" height="1392" alt="Panel de GOH SHOP con caja, ventas, cobranzas, cheques y facturación ARCA" loading="lazy" decoding="async"></div>
                    <p class="screenshot-label"><span class="status-dot"></span> TU NEGOCIO, EN UNA SOLA VISTA</p>
                </div>
                <p class="product-description">De la primera venta al cierre de caja. Conectá cada operación con tu stock, tus clientes y tu facturación.</p>
                <ul class="feature-list">
                    <li><?= gohIcon('check') ?> Ventas y punto de venta</li>
                    <li><?= gohIcon('check') ?> Stock y proveedores</li>
                    <li><?= gohIcon('check') ?> Cuentas corrientes y cobranzas</li>
                    <li><?= gohIcon('check') ?> Facturación con ARCA</li>
                </ul>
                <div class="product-actions">
                    <a class="button button-yellow" href="https://goh-shop.com.ar/" target="_blank" rel="noopener noreferrer">Conocé GOH SHOP <?= gohIcon('arrow') ?></a>
                    <a class="product-demo" href="<?= gohWhatsapp('Hola, quiero conocer GOH SHOP y coordinar una demo para mi negocio.') ?>" target="_blank" rel="noopener noreferrer">Solicitar demo <?= gohIcon('arrow') ?></a>
                </div>
            </article>
        </div>
        <div class="product-help"><p>¿Tu negocio necesita algo diferente?</p><a class="text-link" href="#proyectos">También lo construimos a medida <?= gohIcon('arrow') ?></a></div>
    </div>
</section>
