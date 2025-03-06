document.addEventListener('DOMContentLoaded', () => {
    const titles = document.querySelectorAll('.typewriter');
    const typingDelay = 3000; // Duración de cada animación

    titles.forEach((title, index) => {
        setTimeout(() => {
            title.classList.add('typing');
            
            // Removemos la clase typing cuando termine la animación
            setTimeout(() => {
                title.style.borderRight = 'none';
            }, typingDelay);
            
        }, index * typingDelay);
    });
});