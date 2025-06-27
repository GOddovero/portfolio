// Función para manejar las transiciones entre páginas
function handlePageTransitions() {
    // Verificar si el navegador soporta View Transitions API
    if (!document.startViewTransition) {
        return;
    }

    // Obtener todos los enlaces que llevan a otras páginas
    document.querySelectorAll('a[href]').forEach(link => {
        // Solo manejar enlaces internos
        if (link.href.startsWith(window.location.origin)) {
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
                    
                    // Reinicializar los scripts necesarios
                    reinitializeScripts();
                } catch (error) {
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
    scriptElement.src = '/js/script.js';
    document.body.appendChild(scriptElement);
}

// Inicializar las transiciones cuando se carga la página
document.addEventListener('DOMContentLoaded', handlePageTransitions);

// Manejar la navegación con el botón de retroceso del navegador
window.addEventListener('popstate', () => {
    window.location.reload();
}); 