// Script para forzar la recarga de archivos CSS sin caché
document.addEventListener('DOMContentLoaded', function() {
    // Función para agregar un parámetro de tiempo a las URLs de CSS
    function bustCache() {
        const timestamp = new Date().getTime();
        const links = document.querySelectorAll('link[rel="stylesheet"]');
        
        links.forEach(link => {
            // Extraer la URL actual
            let currentHref = link.getAttribute('href');
            
            // Eliminar cualquier parámetro de consulta existente
            currentHref = currentHref.split('?')[0];
            
            // Agregar el timestamp como parámetro de consulta
            link.setAttribute('href', `${currentHref}?v=${timestamp}`);
        });
        
        console.log('Cache busted for CSS files at:', new Date().toLocaleTimeString());
    }
    
    // Ejecutar al cargar la página
    bustCache();
    
    // También aplicar después de un pequeño retraso para asegurar que todos los estilos se carguen correctamente
    setTimeout(bustCache, 500);
    
    // Forzar actualización cuando se cambia la orientación del dispositivo
    window.addEventListener('orientationchange', function() {
        setTimeout(bustCache, 200);
    });
});
