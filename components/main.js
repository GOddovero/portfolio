function setupScrollAnimation(buttonId, contentId) {
    document.getElementById(buttonId).addEventListener("click", function() {
        const contentElement = document.getElementById(contentId);
        const targetPosition = contentElement.offsetTop; // Posición del div destino
        const startPosition = window.pageYOffset; // Posición inicial
        const distance = targetPosition - startPosition; // Distancia a recorrer
        const duration = 1000; // Duración en milisegundos (1 segundo)
        let startTime = null;

        function animation(currentTime) {
            if (startTime === null) startTime = currentTime;
            const timeElapsed = currentTime - startTime;
            const run = ease(timeElapsed, startPosition, distance, duration);
            window.scrollTo(0, run);
            if (timeElapsed < duration) requestAnimationFrame(animation);
        }

        function ease(t, b, c, d) {
            t /= d / 2;
            if (t < 1) return c / 2 * t * t + b;
            t--;
            return -c / 2 * (t * (t - 2) - 1) + b;
        }

        // Iniciar la animación de scroll
        requestAnimationFrame(animation);

        // Aplicar los estilos al div
        contentElement.style.borderStyle = "solid";
        contentElement.style.borderColor = "#eaff00";
        contentElement.style.backgroundColor = "#daff2022";

        // Después de 1 segundo, volver a los estilos originales
        setTimeout(function(){
            contentElement.style.borderStyle = "none";
            contentElement.style.backgroundColor = "#39393922";
        }, 1000); // Cambia 1000 por el tiempo que desees en milisegundos
    });
}
setupScrollAnimation("btn_experiencia_laboral", "contenido_laboral");
setupScrollAnimation("btn_proyectos", "contenido_proyectos");
//setupScrollAnimation("btn_educacion", "contenido_educacion");
//setupScrollAnimation("btn_sobre_mi", "contenido_mas_sobre_mi");
setupScrollAnimation("contacto_menubar", "contenido_contacto");
setupScrollAnimation("btn_ir_contacto", "contenido_contacto");

document.getElementById("btn_modo_oscuro").addEventListener("click", function() {
    document.body.classList.toggle("modo-oscuro")
    if (document.body.classList.contains("modo-oscuro")) {
        this.textContent = "Modo Claro";
    } else {
        this.textContent = "Modo Oscuro";
    }
});

