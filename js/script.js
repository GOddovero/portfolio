// Para efectos de hover y interactividad adicional
document.querySelectorAll('.nav-item').forEach(item => {
    item.addEventListener('click', function() {
        // Actualizar pestañas activas
        document.querySelectorAll('.nav-item').forEach(navItem => {
            navItem.classList.remove('active');
        });
        this.classList.add('active');
        
        // Mostrar contenido correspondiente
        const sectionId = this.getAttribute('data-section');
        document.querySelectorAll('.characters-list').forEach(list => {
            list.classList.remove('active');
        });
        document.getElementById(`${sectionId}-content`).classList.add('active');
    });
});

// Seleccionar elementos del DOM para el menú
const openMenuButton = document.getElementById('open-menu-button');
const menuWrapper = document.querySelector('.menu-wrapper');
const closeMenuButton = document.querySelector('.close-button'); // Ya existe, se reutiliza

// Event listener para abrir/cerrar el menú con el botón principal (☰)
if (openMenuButton && menuWrapper) {
    openMenuButton.addEventListener('click', () => {
        menuWrapper.classList.toggle('open'); // Cambiado de .add a .toggle
    });
}

// Event listener para el botón de cerrar específico (×)
if (closeMenuButton && menuWrapper) {
    closeMenuButton.addEventListener('click', function() {
        menuWrapper.classList.remove('open'); // Mantiene la acción de cerrar
    });
}

// Funcionalidad para mostrar/ocultar el logo y previsualizaciones
const leftPanel = document.querySelector('.left-panel');
const logoContainer = document.querySelector('.logo-container');
const smallLogo = document.querySelector('.small-logo');
const previewPanels = document.querySelectorAll('.preview-panel');

// Manejamos hover en las opciones de menú para mostrar las previsualizaciones
document.querySelectorAll('.menu-option').forEach(option => {
    option.addEventListener('mouseenter', () => {
        const previewId = option.getAttribute('data-preview');

        // Si hay un panel de previsualización asociado, lo mostramos
        if (previewId) {
            // Iniciar la secuencia de transición
            // 1. Primero iniciamos la animación del logo grande
            if (logoContainer) logoContainer.classList.add('hide-logo');
            
            // 2. Después de un tiempo, mostramos el logo pequeño
            setTimeout(() => {
                if (smallLogo) smallLogo.src = 'img/g1.png'; // Aseguramos que sea el logo pequeño correcto
                if (leftPanel) leftPanel.classList.add('show-small-logo');
            }, 600); // Ajustado para que coincida mejor con la animación

            // 3. Mostramos el panel de previsualización
            const previewPanel = document.getElementById(previewId);
            if (previewPanels) {
                previewPanels.forEach(panel => {
                    panel.classList.remove('active');
                });
            }
            
            // 4. Activamos el modo de previsualización (cambio de fondo)
            setTimeout(() => {
                if (previewPanel) previewPanel.classList.add('active');
                if (leftPanel) leftPanel.classList.add('preview-mode');
            }, 300);
        }
    });

    option.addEventListener('mouseleave', () => {
        // No hacemos nada al salir del hover individual para mantener el estado
    });
});
  // Restaurar logo cuando el cursor sale del área de contenido
const contentContainer = document.querySelector('.content-container');
if (contentContainer) {
    contentContainer.addEventListener('mouseleave', () => {
        // Secuencia de restauración
        // 1. Ocultamos el logo pequeño
        if (leftPanel) leftPanel.classList.remove('show-small-logo');
        
        // 2. Ocultamos los paneles de previsualización
        if (previewPanels) {
            previewPanels.forEach(panel => {
                panel.classList.remove('active');
            });
        }
        
        // 3. Restauramos el fondo original
        if (leftPanel) leftPanel.classList.remove('preview-mode');
        
        // 4. Restauramos el logo grande
        setTimeout(() => {
            if (logoContainer) logoContainer.classList.remove('hide-logo');
        }, 200);
        
        // 5. Restauramos la imagen original del logo pequeño (para la próxima vez)
        setTimeout(() => {
            if (smallLogo) smallLogo.src = 'img/goh1.png';
        }, 500);
    });
}

// Navegación al hacer clic
document.querySelectorAll('.menu-option a').forEach(link => {
    link.addEventListener('click', function(e) {
        // El comportamiento de ancla (href="#section-id") se encargará del scroll.
        // El CSS 'scroll-behavior: smooth;' hará que sea suave.
        
        // Cerrar el menú al hacer clic en una opción
        if (menuWrapper && menuWrapper.classList.contains('open')) { // Solo cierra si está abierto
            menuWrapper.classList.remove('open');
        }
    });
});

// Función para controlar la flecha de scroll
document.addEventListener('DOMContentLoaded', function() {
    const scrollArrow = document.getElementById('scrollArrow');
    
    // Verificar si el elemento existe antes de usarlo
    if (scrollArrow) {
        // Comprobar posición inicial del scroll
        checkScrollPosition();
        
        // Añadir evento de scroll
        window.addEventListener('scroll', checkScrollPosition);
        
        // Hacer que la flecha actúe como botón de scroll
        scrollArrow.addEventListener('click', function() {
            if (scrollArrow.classList.contains('up')) {
                // Si está hacia arriba, ir al inicio
                window.scrollTo({
                    top: 0,
                    behavior: 'smooth'
                });
            } else {
                // Si está hacia abajo, ir al final
                window.scrollTo({
                    top: document.body.scrollHeight,
                    behavior: 'smooth'
                });
            }
        });
    }
    
    function checkScrollPosition() {
        // Verificar nuevamente si el elemento existe
        if (!scrollArrow) return;
        
        // Calcular si estamos cerca del final del documento (a 100px del final)
        const scrollPosition = window.scrollY + window.innerHeight;
        const documentHeight = document.body.scrollHeight;
        
        if (scrollPosition >= documentHeight - 100) {
            // Estamos cerca del final, rotar flecha hacia arriba
            scrollArrow.classList.add('up');
        } else {
            // No estamos cerca del final, flecha hacia abajo
            scrollArrow.classList.remove('up');
        }
    }
});

// Logo en esquina - navegación al inicio
document.addEventListener('DOMContentLoaded', function() {
    const cornerLogo = document.querySelector('.corner-logo');
    
    // Verificar si el elemento existe antes de usarlo
    if (cornerLogo) {
        cornerLogo.addEventListener('click', function() {
            // Ir al inicio de la página principal
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        });
    }
});
