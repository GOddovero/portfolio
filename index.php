<?php
/**
 * GOH Enterprise - Landing Page Empresarial
 * Página principal con diseño corporativo moderno
 * 
 * @author Gaspar Oddovero Herrera
 * @version 2.0
 */

// Incluir componentes empresariales
include 'components/empresa/header-empresa.php';
?>

<div class="page-wrapper">
<?php
include 'components/empresa/hero-empresa.php';
include 'components/empresa/marquee-section.php';

include 'components/empresa/servicios-section.php';
include 'components/empresa/productos-section.php';
include 'components/empresa/estadisticas-section.php';

include 'components/empresa/cta-section.php';
include 'components/empresa/whatsapp-float.php';
include 'components/empresa/footer-empresa.php';
?>
</div>

?>
