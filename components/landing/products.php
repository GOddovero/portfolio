<section id="modulos" class="modules-section modules-expanded" aria-labelledby="modules-title">
    <span id="ecosistema" class="anchor-alias" aria-hidden="true"></span>
    <div class="container">
        <div class="modules-heading" data-reveal><div><p class="eyebrow">UNA MISMA BASE. NUEVAS POSIBILIDADES.</p><h2 id="modules-title">Módulos <img src="img/goh1.png" width="997" height="439" alt="GOH"></h2></div><p>La identidad de GOH, aplicada a cada actividad.<br><strong>Conocé qué incluye cada módulo.</strong></p></div>
        <div class="module-stories">
            <article class="module-story resto-story" aria-labelledby="resto-title" data-motion-group>
                <div class="module-story-top"><p class="eyebrow"><span class="module-index">01</span> GASTRONOMÍA</p><span class="module-family">MÓDULO GOH</span></div>
                <div class="module-story-brand" data-reveal><h3 id="resto-title"><img src="img/logo_resto.png" width="493" height="404" alt="GOH RESTO" loading="lazy"></h3><p>Del primer pedido<br><strong>al cierre de la mesa.</strong></p></div>
                <p class="module-description">La operación del salón, la barra y las entregas, con herramientas pensadas para el ritmo de la gastronomía.</p>
                <div class="module-workflow" aria-label="Flujo de trabajo de GOH RESTO"><span><?= gohIcon('table') ?> Mesa</span><?= gohIcon('arrow') ?><span><?= gohIcon('document') ?> Comanda</span><?= gohIcon('arrow') ?><span><?= gohIcon('check') ?> Cobro</span></div>
                <ul class="module-features">
                    <li><?= gohIcon('table') ?><div><h4>Mesas y mozos</h4><p>Registro de consumos, asignación de mozo y cierre de la venta.</p></div></li>
                    <li><?= gohIcon('document') ?><div><h4>Comandas de cocina</h4><p>Tickets para cocina y edición de los pedidos cargados.</p></div></li>
                    <li><?= gohIcon('shop') ?><div><h4>Barra y entregas</h4><p>Carga de pedidos de barra y seguimiento de entregas.</p></div></li>
                    <li><?= gohIcon('calendar') ?><div><h4>Reservas y productos</h4><p>Vista mensual de reservas y gestión de productos e ingredientes.</p></div></li>
                </ul>
                <details class="module-more"><summary>Cómo acompaña la operación <?= gohIcon('plus') ?></summary><p>Desde el consumo en una mesa hasta un pedido para entregar: el módulo organiza los pedidos, permite emitir tickets para cocina y cerrar la venta con su factura.</p></details>
                <a class="module-cta" href="<?= gohWhatsapp('Hola, quisiera conocer GOH RESTO: mesas, comandas, barra, entregas y reservas.') ?>" target="_blank" rel="noopener noreferrer">Conversemos sobre GOH RESTO <?= gohIcon('arrow') ?></a>
            </article>
            <article class="module-story tax-story" aria-labelledby="tax-title" data-motion-group>
                <div class="module-story-top"><p class="eyebrow"><span class="module-index">02</span> GESTIÓN CONTABLE</p><span class="module-family">MÓDULO GOH</span></div>
                <div class="module-story-brand" data-reveal><h3 id="tax-title"><img src="img/logo_tax.png" width="515" height="450" alt="GOH TAX" loading="lazy"></h3><p>La información fiscal,<br><strong>más cerca de cada cliente.</strong></p></div>
                <p class="module-description">Herramientas para estudios y profesionales que necesitan reunir clientes, facturación y documentación en un mismo entorno.</p>
                <div class="module-workflow" aria-label="Áreas de GOH TAX"><span><?= gohIcon('people') ?> Clientes</span><?= gohIcon('arrow') ?><span><?= gohIcon('document') ?> Información</span><?= gohIcon('arrow') ?><span><?= gohIcon('chart') ?> Seguimiento</span></div>
                <ul class="module-features">
                    <li><?= gohIcon('people') ?><div><h4>Gestión de clientes</h4><p>Datos fiscales y seguimiento de cada contribuyente.</p></div></li>
                    <li><?= gohIcon('chart') ?><div><h4>Control de facturación</h4><p>Registro manual, importación de comprobantes y consulta de totales.</p></div></li>
                    <li><?= gohIcon('document') ?><div><h4>Portal y documentos</h4><p>Un espacio por cliente para consultar información y compartir archivos.</p></div></li>
                    <li><?= gohIcon('calculator') ?><div><h4>Simulador de recategorización</h4><p>Evaluación de escenarios de monotributo y consulta de simulaciones.</p></div></li>
                </ul>
                <details class="module-more"><summary>Cómo acompaña al estudio <?= gohIcon('plus') ?></summary><p>Centraliza la información de los clientes para seguir su facturación, reunir la documentación y explorar escenarios de recategorización desde el portal.</p></details>
                <a class="module-cta" href="<?= gohWhatsapp('Hola, quisiera conocer GOH TAX: clientes, facturación, documentos y simulador de recategorización.') ?>" target="_blank" rel="noopener noreferrer">Conversemos sobre GOH TAX <?= gohIcon('arrow') ?></a>
            </article>
        </div>
        <div class="modules-next" data-reveal><span class="next-symbol" aria-hidden="true"><?php require __DIR__ . '/brand-symbol.php'; ?></span><div><p class="eyebrow">UN ECOSISTEMA EN MOVIMIENTO</p><p>Próximamente <strong>más.</strong></p></div><span>Nuevas herramientas.<br>La misma identidad GOH.</span></div>
    </div>
</section>

<section class="gym-section" id="goh-gym" aria-labelledby="gym-title">
    <div class="container gym-showcase">
        <div class="gym-preview"><div class="preview-caption"><span>GOH GYM / VISTA DEL SISTEMA</span></div><div class="gym-window"><img id="gym-preview" src="<?= gohAsset('img/landing/goh-gym-dashboard-1280.webp') ?>" srcset="<?= gohAsset('img/landing/goh-gym-dashboard-640.webp') ?> 640w, <?= gohAsset('img/landing/goh-gym-dashboard-1280.webp') ?> 1280w" sizes="(max-width: 760px) calc(100vw - 80px), (max-width: 1440px) 50vw, 700px" decoding="async" width="1720" height="1392" alt="Panel de GOH GYM con membresías, cobros y asistencias" loading="lazy"></div><div class="screenshot-switcher" role="group" aria-label="Vistas de GOH GYM" hidden><button type="button" data-preview="<?= gohAsset('img/landing/goh-gym-dashboard-1280.webp') ?>" data-preview-srcset="<?= gohAsset('img/landing/goh-gym-dashboard-640.webp') ?> 640w, <?= gohAsset('img/landing/goh-gym-dashboard-1280.webp') ?> 1280w" data-preview-alt="Panel general de GOH GYM con membresías, cobros y asistencias" aria-pressed="true" class="is-active">Panel general</button><button type="button" data-preview="<?= gohAsset('img/landing/goh-gym-socios-1280.webp') ?>" data-preview-srcset="<?= gohAsset('img/landing/goh-gym-socios-640.webp') ?> 640w, <?= gohAsset('img/landing/goh-gym-socios-1280.webp') ?> 1280w" data-preview-alt="Gestión de socios de GOH GYM con membresías y vencimientos" aria-pressed="false">Gestión de socios</button></div></div>
        <div class="gym-copy"><p class="eyebrow">SISTEMA PARA GIMNASIOS</p><h2 id="gym-title">GOH GYM</h2><p class="system-lead">Administración y comunidad.</p><p>Un sistema que reúne la gestión del gimnasio y la experiencia de sus socios: membresías, asistencias, cobros y planes de entrenamiento.</p><ul class="system-capabilities"><li>Socios y membresías</li><li>Accesos y asistencias</li><li>Caja y cobranzas</li><li>App para socios</li></ul><div class="system-actions"><a class="button button-dark" href="<?= gohWhatsapp('Hola, me gustaría recibir información sobre GOH GYM.') ?>" target="_blank" rel="noopener noreferrer">Consultar por WhatsApp <?= gohIcon('chat') ?></a><a class="text-link" href="https://goh-gym.com.ar/" target="_blank" rel="noopener noreferrer">Visitar sitio <?= gohIcon('arrow') ?></a></div></div>
    </div>
</section>
