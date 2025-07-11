<div class="container contact-page">
    <div class="contact-container">
        <div class="contact-section">
            <div class="form-container">
            <h2>Envíame un mensaje</h2>
            
            <?php if (isset($_GET['mensaje']) && $_GET['mensaje'] === 'enviado'): ?>
                <div class="alert alert-success">¡Mensaje enviado exitosamente! Te responderé pronto.</div>
            <?php endif; ?>
            
            <form method="POST" action="contact.php" class="contact-form">
                    <div class="form-group">
                        <label for="nombre">Nombre:</label>
                        <input type="text" id="nombre" name="nombre" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="apellido">Apellido:</label>
                        <input type="text" id="apellido" name="apellido" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" id="email" name="email" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="mensaje">Mensaje:</label>
                        <textarea id="mensaje" name="mensaje" required placeholder="Escribe tu mensaje aquí..." minlength="10"></textarea>
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
