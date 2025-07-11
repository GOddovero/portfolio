// Script para manejar las cards de navegación
document.addEventListener('DOMContentLoaded', function() {
    
    // Función para hacer scroll suave a una sección
    function smoothScrollToSection(targetId) {
        const targetElement = document.getElementById(targetId);
        if (targetElement) {
            targetElement.scrollIntoView({
                behavior: 'smooth',
                block: 'start'
            });
            return true;
        }
        return false;
    }

    // Obtener todas las cards de navegación
    const navCards = document.querySelectorAll('.nav-card');
    
    navCards.forEach(card => {
        card.addEventListener('click', function(e) {
            e.preventDefault(); // Prevenir el comportamiento por defecto del enlace
            
            const href = this.getAttribute('href');
            const title = this.getAttribute('title');
            
            // Si el href tiene un hash (#), intentar hacer scroll a esa sección
            if (href && href.startsWith('#') && href.length > 1) {
                const targetId = href.substring(1); // Remover el #
                
                // Si no encuentra la sección específica, scroll a about-section como fallback
                if (!smoothScrollToSection(targetId)) {
                    console.log(`Sección ${targetId} no encontrada, dirigiendo a about-section`);
                    smoothScrollToSection('cont-about-me');
                }
            } else {
                // Para cards sin destino específico, ir a about-section
                console.log('Card clicked:', title);
                smoothScrollToSection('cont-about-me');
            }
            
            // Agregar efecto visual de clic
            this.style.transform = 'scale(0.95)';
            setTimeout(() => {
                this.style.transform = 'scale(1)';
            }, 150);
        });

        // Agregar efecto hover mejorado
        card.addEventListener('mouseenter', function() {
            this.style.transition = 'transform 0.3s ease, box-shadow 0.3s ease';
        });

        card.addEventListener('mouseleave', function() {
            this.style.transition = 'transform 0.3s ease, box-shadow 0.3s ease';
        });
    });
});
