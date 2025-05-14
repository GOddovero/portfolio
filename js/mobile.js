// Funcionalidades adicionales para responsive
document.addEventListener('DOMContentLoaded', function() {
    // Detectar si es un dispositivo móvil
    const isMobile = window.innerWidth <= 767;
    
    // Cerrar el menú al hacer clic en cualquier parte de la pantalla en móvil
    if (isMobile) {
        const mainContent = document.getElementById('main-content');
        
        if (mainContent) {
            mainContent.addEventListener('click', function() {
                const menuWrapper = document.querySelector('.menu-wrapper');
                if (menuWrapper && menuWrapper.classList.contains('open')) {
                    menuWrapper.classList.remove('open');
                }
            });
        }
        
        // También ajustar comportamiento de hover en móvil para que sea con tap
        document.querySelectorAll('.menu-option').forEach(option => {
            option.addEventListener('click', function(e) {
                // Si el click fue directamente en la opción y no en el enlace interno
                if (e.target === this) {
                    const previewId = this.getAttribute('data-preview');
                    if (previewId) {
                        // Activar manualmente el "hover" que en desktop es automático
                        const event = new MouseEvent('mouseenter');
                        this.dispatchEvent(event);
                        
                        // Evitar que el enlace se active inmediatamente
                        e.preventDefault();
                    }
                }
            });
        });
    }
    
    // Función para ajustar tamaños según orientación en móvil
    function adjustForOrientation() {
        if (window.innerWidth <= 767) {
            if (window.innerWidth > window.innerHeight) {
                // Landscape
                document.body.classList.add('landscape');
            } else {
                // Portrait
                document.body.classList.remove('landscape');
            }
        }
    }
    
    // Ejecutar al cargar y al cambiar orientación
    adjustForOrientation();
    window.addEventListener('resize', adjustForOrientation);
    window.addEventListener('orientationchange', adjustForOrientation);
});
