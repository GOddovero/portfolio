# GOH Enterprise - Landing Page Empresarial

## 🚀 Descripción

Landing page corporativa moderna para GOH Enterprise Solutions, especializada en desarrollo de software empresarial a medida. Diseño agresivo enfocado en conversión con arquitectura modular PHP.

## 📁 Estructura del Proyecto

```
portfolio/
├── components/
│   ├── empresa/              # Componentes de la landing empresarial
│   │   ├── header-empresa.php
│   │   ├── hero-empresa.php
│   │   ├── marquee-section.php
│   │   ├── servicios-section.php
│   │   ├── productos-section.php
│   │   ├── estadisticas-section.php
│   │   ├── cta-section.php
│   │   ├── footer-empresa.php
│   │   └── whatsapp-float.php
│   │
│   └── legacy/               # Componentes del portfolio personal anterior
│       ├── header.php
│       ├── hero-section.php
│       ├── about-section.php
│       ├── contact-form.php
│       ├── footer.php
│       └── quick-access.php
│
├── css/
│   ├── empresa.css           # Estilos de la landing empresarial
│   └── styles.css            # Estilos del portfolio legacy
│
├── js/
│   ├── performance.js        # Optimizaciones de rendimiento
│   ├── mobile.js            # Optimizaciones móviles
│   ├── scroll-handler.js    # Manejo de scroll
│   └── ...
│
├── img/                      # Recursos de imagen
├── config/                   # Configuraciones
├── includes/                 # Funciones auxiliares
├── index.php                 # Página principal (Landing empresarial)
├── contact.php              # Formulario de contacto
├── sitemap.xml              # Mapa del sitio
└── robots.txt               # Directivas para crawlers
```

## ✨ Características Principales

### 🎨 Diseño y UI
- **Diseño Corporativo Moderno**: Paleta de colores GOH (Amarillo #e5ca10, Dark #3b2f2f, Teal #2ec4b6)
- **Animaciones AOS**: Animaciones on-scroll fluidas y profesionales
- **Responsive Design**: Optimizado para desktop, tablet y móviles
- **Glassmorphism**: Efectos de vidrio esmerilado en header
- **Marquee Infinito**: Cinta animada con tecnologías y productos

### 🔧 Funcionalidades
- **9 Componentes PHP Modulares**: Arquitectura escalable y mantenible
- **3 Servicios Destacados**: SaaS, Landing Pages, Apps Móviles
- **3 Productos Propietarios**: GOH-GYM, GOH-Care, GOH-Shop
- **CTAs Estratégicos**: Múltiples puntos de conversión
- **Integración WhatsApp**: Botón flotante y enlaces directos

### 🚀 Optimización SEO

#### Meta Tags Avanzados
- ✅ Title y Description optimizados
- ✅ Open Graph completo (Facebook)
- ✅ Twitter Cards
- ✅ Canonical URLs
- ✅ Geo Tags para localización

#### Datos Estructurados (Schema.org)
- ✅ Organization Schema
- ✅ WebSite Schema con SearchAction
- ✅ Información de contacto y redes sociales
- ✅ Founder y área de servicio

#### Optimizaciones Técnicas
- ✅ Sitemap.xml actualizado con imágenes
- ✅ Robots.txt optimizado
- ✅ Preconnect para recursos externos
- ✅ Preload de CSS crítico
- ✅ Lazy loading de imágenes

### ⚡ Performance

#### Optimizaciones de Carga
- **Preconnect**: Google Fonts, unpkg CDN
- **Preload**: CSS crítico, fuentes principales
- **Lazy Loading**: Imágenes de productos y secciones inferiores
- **Defer Scripts**: Carga diferida de JS no crítico
- **will-change**: Optimización GPU para animaciones

#### Script performance.js
- 📊 Lazy loading con IntersectionObserver
- 🎬 Pausar animaciones fuera de viewport
- ♿ Respeto a prefers-reduced-motion
- 🔗 Prefetch de enlaces importantes
- 📡 Detección de conexión lenta
- 📈 Analytics y tracking de eventos

#### Métricas Objetivo
- **First Contentful Paint**: < 1.5s
- **Largest Contentful Paint**: < 2.5s
- **Time to Interactive**: < 3.5s
- **Cumulative Layout Shift**: < 0.1

## 🛠️ Tecnologías Utilizadas

### Frontend
- **HTML5 Semántico**
- **CSS3** con Custom Properties (Variables CSS)
- **JavaScript Vanilla** (Sin frameworks pesados)
- **AOS** (Animate On Scroll) v2.3.1
- **Phosphor Icons** (Iconos vectoriales)

### Tipografías
- **Display**: Jost (500, 700, 900)
- **Body**: Montserrat (400, 500, 700)

### Backend
- **PHP 7.4+**
- **PHPMailer** para formularios de contacto
- **Arquitectura MVC** simplificada

## 📞 Información de Contacto

- **WhatsApp**: +54 3385 405049
- **Email**: contacto@goh.com.ar
- **Ubicación**: General Levalle, Córdoba, Argentina

### Redes Sociales
- 🔗 LinkedIn: [goh-dev](https://www.linkedin.com/in/goh-dev/)
- 📸 Instagram: [@goh.dev](https://www.instagram.com/goh.dev/)
- 💻 GitHub: [GOddovero](https://github.com/GOddovero)
- 🐦 Twitter/X: [@goh_dev](https://x.com/goh_dev)

## 🔒 Seguridad

### Consideraciones Implementadas
- ✅ Bloqueo de directorios sensibles en robots.txt
- ✅ rel="noopener noreferrer" en enlaces externos
- ✅ Validación de formularios (cliente y servidor)
- ⚠️ **Pendiente**: Migrar credenciales SMTP a .env

### Recomendaciones
1. Crear archivo `.env` para credenciales
2. Implementar HTTPS obligatorio
3. Configurar CORS headers
4. Añadir Content Security Policy

## 📈 Analytics y Tracking

El archivo `performance.js` incluye tracking de:
- **Scroll Depth**: 0%, 25%, 50%, 75%, 100%
- **CTA Clicks**: Todos los botones principales
- **Errores de Carga**: Imágenes y recursos externos

Para activar Google Analytics, agregar el código de medición en `header-empresa.php`.

## 🚧 Roadmap

### Próximas Mejoras
- [ ] Service Worker para PWA
- [ ] Modo oscuro (dark mode)
- [ ] Multiidioma (ES/EN)
- [ ] Blog de artículos técnicos
- [ ] Dashboard de productos
- [ ] Sistema de tickets de soporte

## 📝 Changelog

### v2.0 (17 de diciembre de 2025)
- ✨ Nueva landing empresarial completa
- 🎨 Diseño corporativo moderno
- 🔧 9 componentes PHP modulares
- 📊 SEO optimizado con Schema.org
- ⚡ Performance optimizations
- 📱 Responsive design mejorado
- 🗂️ Migración de archivos legacy a /components/legacy/

### v1.0 (11 de enero de 2025)
- 🎉 Portfolio personal inicial
- 📧 Formulario de contacto con PHPMailer
- 🎯 SEO básico

## 👨‍💻 Autor

**Gaspar Oddovero Herrera**  
Desarrollador Full Stack & Fundador de GOH Enterprise

---

© 2025 GOH Enterprise Solutions. Todos los derechos reservados.
