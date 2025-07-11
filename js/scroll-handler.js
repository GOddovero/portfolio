// Script para manejar el scroll suave
document.addEventListener('DOMContentLoaded', function() {
    const scrollIndicator = document.querySelector('.scroll-indicator');
    const quickAccessSection = document.querySelector('.quick-access-section');
    
    // Función para hacer scroll suave a la siguiente sección
    function scrollToNextSection() {
        if (quickAccessSection) {
            quickAccessSection.scrollIntoView({ 
                behavior: 'smooth',
                block: 'start'
            });
        }
    }
    
    // Agregar evento click al indicador de scroll
    if (scrollIndicator) {
        scrollIndicator.addEventListener('click', scrollToNextSection);
    }
    
    // Ocultar el indicador cuando el usuario hace scroll
    let lastScrollY = window.scrollY;
    
    window.addEventListener('scroll', function() {
        const currentScrollY = window.scrollY;
        
        if (scrollIndicator) {
            if (currentScrollY > 100) {
                scrollIndicator.style.opacity = '0';
                scrollIndicator.style.transform = 'translateX(-50%) translateY(20px)';
            } else {
                scrollIndicator.style.opacity = '0.7';
                scrollIndicator.style.transform = 'translateX(-50%) translateY(0)';
            }
        }
        
        lastScrollY = currentScrollY;
    });
});
