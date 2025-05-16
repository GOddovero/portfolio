// Animaciones específicas para la sección de experiencia laboral
document.addEventListener('DOMContentLoaded', function() {
    // Función para verificar si un elemento está en la pantalla
    function isInViewport(element) {
        const rect = element.getBoundingClientRect();
        return (
            rect.top >= 0 &&
            rect.left >= 0 &&
            rect.bottom <= (window.innerHeight || document.documentElement.clientHeight) &&
            rect.right <= (window.innerWidth || document.documentElement.clientWidth)
        );
    }
    
    // Función para mejorar la navegación suave entre secciones
    function smoothScrollToSection(sectionId) {
        const section = document.querySelector(sectionId);
        if (!section) return;
        
        // Primero cerramos el menú si está abierto
        document.querySelector('.menu-wrapper').classList.remove('open');
        
        // Pequeño retardo para la transición
        setTimeout(() => {
            // Aplicamos un efecto de resaltado al llegar a la sección
            section.classList.add('highlight-section');
            
            // Desplazamiento suave a la sección
            section.scrollIntoView({ 
                behavior: 'smooth',
                block: 'start'
            });
            
            // Quitamos el resaltado después de un momento
            setTimeout(() => {
                section.classList.remove('highlight-section');
            }, 1500);
        }, 300);
    }
    
    // Aplicar a todos los enlaces de navegación dentro de .menu-option
    document.querySelectorAll('.menu-option a').forEach(link => {
        link.addEventListener('click', function(event) {
            event.preventDefault();
            const targetSection = this.getAttribute('href');
            smoothScrollToSection(targetSection);
        });
    });

    // Función para animar las tarjetas cuando estén en la pantalla
    function animateExperienceItems() {
        const experienceItems = document.querySelectorAll('.experiencia-item');
        
        experienceItems.forEach(item => {
            if (isInViewport(item) && !item.classList.contains('animated')) {
                item.classList.add('animated');
                item.style.animationPlayState = 'running';
            }
        });
    }

    // Agregar efecto de tarjeta 3D al hacer hover
    const experienceItems = document.querySelectorAll('.experiencia-item');
    
    experienceItems.forEach(item => {
        item.addEventListener('mousemove', function(e) {
            const rect = this.getBoundingClientRect();
            const mouseX = e.clientX - rect.left;
            const mouseY = e.clientY - rect.top;
            
            // Calcular rotación basada en la posición del cursor
            const rotateY = ((mouseX / rect.width) - 0.5) * 10;
            const rotateX = ((mouseY / rect.height) - 0.5) * -10;
            
            // Aplicar transformación 3D
            this.style.transform = `perspective(1000px) rotateX(${rotateX}deg) rotateY(${rotateY}deg) scale3d(1.02, 1.02, 1.02)`;
            
            // Efecto de iluminación
            const shine = this.querySelector('.shine');
            if (!shine) {
                const shineElement = document.createElement('div');
                shineElement.classList.add('shine');
                this.appendChild(shineElement);
            }
        });
        
        // Restablecer al salir
        item.addEventListener('mouseleave', function() {
            this.style.transform = 'none';
            const shine = this.querySelector('.shine');
            if (shine) {
                shine.remove();
            }
        });
    });

    // Activar animaciones en el scroll
    window.addEventListener('scroll', animateExperienceItems);
    window.addEventListener('resize', animateExperienceItems);
    
    // Iniciar verificación después de cargar la página
    animateExperienceItems();
    
    // Manejar el enlace específico para experiencia
    document.querySelector('.nav-item[data-section="experiencia"]').addEventListener('click', function() {
        // Agregar clase para animar el panel de previsualización de experiencia
        document.getElementById('experiencia-preview').classList.add('active', 'highlight');
        
        // Remover después de la animación
        setTimeout(() => {
            document.getElementById('experiencia-preview').classList.remove('highlight');
        }, 2000);
    });
});
