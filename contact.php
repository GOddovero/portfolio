<?php
// Incluir las funciones de email
require_once __DIR__ . '/includes/email_functions.php';

// Verificar si el formulario fue enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = htmlspecialchars(trim($_POST['nombre']));
    $apellido = htmlspecialchars(trim($_POST['apellido']));
    $email = htmlspecialchars(trim($_POST['email']));
    $mensaje = htmlspecialchars(trim($_POST['mensaje']));
    
    // Validaciones básicas
    if (empty($nombre) || empty($apellido) || empty($email) || empty($mensaje)) {
        $error = "Por favor, completa todos los campos.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = "El formato del email no es válido.";
    } elseif (strlen($mensaje) < 10) {
        $error = "El mensaje debe tener al menos 10 caracteres.";
    } else {
        // Intentar enviar el email
        $resultado = enviarEmail($nombre, $apellido, $email, $mensaje);
        
        if ($resultado['success']) {
            // Redirigir a la página principal con mensaje de éxito
            header("Location: index.php?mensaje=enviado");
            exit();
        } else {
            $error = $resultado['message'];
        }
    }
}

include 'header.php';
?>
    <div class="container contact-page">
        <div class="contact-container">
            
            <div class="contact-section">
                <div class="form-container">
                    <h2>Envíame un mensaje</h2>
                    
                    <?php if (isset($success)): ?>
                        <div class="alert alert-success"><?php echo $success; ?></div>
                    <?php endif; ?>
                    
                    <?php if (isset($error)): ?>
                        <div class="alert alert-error"><?php echo $error; ?></div>
                    <?php endif; ?>
                    
                    <form method="POST" class="contact-form">
                        <div class="form-group">
                            <label for="nombre">Nombre:</label>
                            <input type="text" id="nombre" name="nombre" value="<?php echo isset($nombre) ? htmlspecialchars($nombre) : ''; ?>" required>
                        </div>
                        
                        <div class="form-group">
                            <label for="apellido">Apellido:</label>
                            <input type="text" id="apellido" name="apellido" value="<?php echo isset($apellido) ? htmlspecialchars($apellido) : ''; ?>" required>
                        </div>
                        
                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="email" id="email" name="email" value="<?php echo isset($email) ? htmlspecialchars($email) : ''; ?>" required>
                        </div>
                        
                        <div class="form-group">
                            <label for="mensaje">Mensaje:</label>
                            <textarea id="mensaje" name="mensaje" required placeholder="Escribe tu mensaje aquí..." minlength="10"><?php echo isset($mensaje) ? htmlspecialchars($mensaje) : ''; ?></textarea>
                        </div>
                        
                        <button type="submit" class="btn btn-submit">
                            <i class="fas fa-paper-plane"></i>
                            Enviar Mensaje
                        </button>
                    </form>
                </div>
                
                <div class="social-container">
                    <h2>Sígueme en:</h2>
                    
                    <div class="social-links">
                        <a href="https://www.instagram.com/goh.dev/" class="social-link" target="_blank">
                            <i class="fab fa-instagram"></i>
                            <span>Instagram</span>
                        </a>
                        <a href="https://x.com/goh_dev" class="social-link" target="_blank">
                            <i class="fab fa-twitter"></i>
                            <span>Twitter</span>
                        </a>
                        <a href="https://github.com/GOddovero" class="social-link" target="_blank">
                            <i class="fab fa-github"></i>
                            <span>GitHub</span>
                        </a>
                        <a href="https://www.tiktok.com/@gohdev" class="social-link">
                            <i class="fab fa-tiktok"></i>
                            <span>TikTok</span>
                        </a>
                        <a href="https://www.linkedin.com/in/goh-dev/" class="social-link">
                            <i class="fab fa-linkedin"></i>
                            <span>LinkedIn</span>
                        </a>
                    </div>
                    
                    <a href="#" class="cv-download">
                        <i class="fas fa-download"></i>
                        <span>Descargar CV</span>
                    </a>
                </div>
            </div>
        </div>
    </div>

<?php include 'footer.php'; ?>
</body>
</html>
