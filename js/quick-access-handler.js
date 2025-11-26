// Manejador específico para los enlaces de Quick Access
// Este script debe cargarse ANTES que transitions.js para capturar los eventos primero

document.addEventListener('DOMContentLoaded', function() {
    // Obtener todos los enlaces de quick access
    const quickAccessLinks = document.querySelectorAll('.quick-access-card');
    
    quickAccessLinks.forEach(link => {
        // Usar capture phase (true) para interceptar el evento antes que otros listeners
        link.addEventListener('click', function(e) {
            // Detener completamente la propagación del evento
            e.preventDefault();
            e.stopPropagation();
            e.stopImmediatePropagation();
            
            // Abrir el enlace en una nueva pestaña
            window.open(this.href, '_blank', 'noopener,noreferrer');
            
            // Retornar false como medida adicional
            return false;
        }, true); // El 'true' aquí es crucial - captura en fase de captura
    });
    
    console.log('Quick Access Handler: Inicializado para', quickAccessLinks.length, 'enlaces');
});
