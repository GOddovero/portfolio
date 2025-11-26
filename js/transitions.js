// Función para manejar las transiciones entre páginas
function handlePageTransitions() {
    // Verificar si el navegador soporta View Transitions API
    if (!document.startViewTransition) {
        return;
    }

    // Obtener todos los enlaces que llevan a otras páginas
    document.querySelectorAll('a[href]').forEach(link => {
        // Solo manejar enlaces internos y que no tengan ya el event listener
        // Excluir enlaces de navegación interna (que empiecen con #)
        // Excluir enlaces de quick access y enlaces con target="_blank"
        const href = link.getAttribute('href');
        if (link.href.startsWith(window.location.origin) && 
            !href.startsWith('#') && 
            !link.hasTransitionHandler &&
            !link.classList.contains('quick-access-card') &&
            link.getAttribute('target') !== '_blank') {
            link.hasTransitionHandler = true; // Marcar que ya tiene el handler
            link.addEventListener('click', async e => {
                e.preventDefault();

                try {
                    // Iniciar la transición
                    const transition = document.startViewTransition(async () => {
                        // Cargar la nueva página
                        const response = await fetch(link.href);
                        const text = await response.text();
                        
                        // Extraer el contenido del body
                        const parser = new DOMParser();
                        const newDoc = parser.parseFromString(text, 'text/html');
                        
                        // Actualizar el título
                        document.title = newDoc.title;
                        
                        // Actualizar el contenido
                        document.body.innerHTML = newDoc.body.innerHTML;
                        
                        // Actualizar la URL
                        window.history.pushState({}, '', link.href);
                    });

                    // Esperar a que termine la transición
                    await transition.finished;
                    
                    // Reinicializar los scripts y event listeners
                    reinitializeScripts();
                    handlePageTransitions(); // Volver a inicializar los event listeners
                } catch (error) {
                    console.error('Error durante la transición:', error);
                    // Si hay un error, navegar normalmente
                    window.location.href = link.href;
                }
            });
        }
    });
}

// Función para reinicializar scripts después de la transición
function reinitializeScripts() {
    // Cargar y ejecutar script.js
    const scriptElement = document.createElement('script');
    scriptElement.src = 'js/script.js';
    document.body.appendChild(scriptElement);
}

// Inicializar las transiciones cuando se carga la página
document.addEventListener('DOMContentLoaded', handlePageTransitions);

// Manejar la navegación con el botón de retroceso del navegador
window.addEventListener('popstate', () => {
    window.location.reload();
}); 