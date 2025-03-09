function generateRandomColors() {
    // Función para convertir HSL a HEX
    function hslToHex(h, s, l) {
        l /= 100;
        const a = s * Math.min(l, 1 - l) / 100;
        const f = n => {
            const k = (n + h / 30) % 12;
            const color = l - a * Math.max(Math.min(k - 3, 9 - k, 1), -1);
            return Math.round(255 * color).toString(16).padStart(2, '0');
        };
        return `#${f(0)}${f(8)}${f(4)}`;
    }

    // Generar color principal (color1)
    const hue = Math.floor(Math.random() * 360);
    const color1 = hslToHex(hue, 65, 45);

    // Generar color para tipografía (color2)
    // Usamos el valor de luminosidad opuesto al color1 para garantizar contraste
    const color2 = hslToHex(hue, 10, 95);

    // Generar color de acento (color3)
    // Usamos un color complementario con alta saturación
    const accentHue = (hue + 180) % 360;
    const color3 = hslToHex(accentHue, 80, 60);

    // Actualizar las variables CSS
    const root = document.documentElement;
    root.style.setProperty('--color1', color1);
    root.style.setProperty('--color2', color2);
    root.style.setProperty('--color3', color3);

    // Verificar que los colores se aplicaron correctamente
    console.log('Colores generados:', {
        color1,
        color2,
        color3
    });
    
    // Forzar un repintado
    document.body.style.display = 'none';
    document.body.offsetHeight; // Forzar un reflow
    document.body.style.display = '';
}

// Asegurarse de que se ejecute después de que el DOM esté completamente cargado
window.addEventListener('load', generateRandomColors);