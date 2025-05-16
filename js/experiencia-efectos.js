// Efectos avanzados para el grid de experiencia laboral
document.addEventListener('DOMContentLoaded', function() {
    // Referencia a todas las tarjetas de experiencia
    const tarjetas = document.querySelectorAll('.experiencia-item');
    
    // Efecto de movimiento 3D al pasar el ratón por encima (solo en dispositivos no táctiles)
    if (window.matchMedia("(hover: hover)").matches) {
        tarjetas.forEach(tarjeta => {
            tarjeta.addEventListener('mousemove', function(e) {
                // Solo aplicar el efecto en pantallas lo suficientemente grandes
                if (window.innerWidth >= 992) {
                    const rect = this.getBoundingClientRect();
                    const x = e.clientX - rect.left; // Posición X del ratón relativa a la tarjeta
                    const y = e.clientY - rect.top;  // Posición Y del ratón relativa a la tarjeta
                    
                    // Calcular la rotación basada en la posición del ratón
                    const xRotation = ((y - rect.height / 2) / rect.height) * 8;  // Máximo ±8 grados
                    const yRotation = ((rect.width / 2 - x) / rect.width) * 8;    // Máximo ±8 grados
                    
                    // Aplicar la transformación a la tarjeta
                    this.style.transform = `perspective(1000px) rotateX(${xRotation}deg) rotateY(${yRotation}deg) scale3d(1.02, 1.02, 1.02)`;
                      // Mover el brillo para seguir al ratón - efecto más destacado para glassmorphism
                    const shine = this.querySelector('.shine');
                    if (shine) {
                        shine.style.background = `radial-gradient(circle at ${x}px ${y}px, rgba(255,255,255,0.4) 0%, rgba(255,255,255,0.2) 30%, rgba(255,255,255,0) 70%)`;
                        shine.style.opacity = '0.7';
                    }
                }
            });
            
            // Restablecer la transformación al salir del elemento
            tarjeta.addEventListener('mouseleave', function() {
                this.style.transform = 'perspective(1000px) rotateX(0) rotateY(0) scale3d(1, 1, 1)';
                
                // Resetear el brillo
                const shine = this.querySelector('.shine');
                if (shine) {
                    shine.style.background = '';
                }
            });
        });
    }
    
    // Función para animar la entrada de las tarjetas cuando entran en el viewport
    function animarTarjetasVisibles() {
        tarjetas.forEach(tarjeta => {
            const rect = tarjeta.getBoundingClientRect();
            // Si la tarjeta está dentro del viewport
            if (
                rect.top <= (window.innerHeight || document.documentElement.clientHeight) &&
                rect.bottom >= 0
            ) {
                tarjeta.classList.add('visible');
            }
        });
    }
    
    // Iniciar la animación al cargar la página
    animarTarjetasVisibles();
    
    // Ejecutar la animación al hacer scroll
    window.addEventListener('scroll', animarTarjetasVisibles);
});
