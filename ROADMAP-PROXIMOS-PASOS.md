# 🗺️ ROADMAP - Próximos Pasos del Proyecto

**Plan detallado para completar el sitio web**

---

## 📊 Estado Actual: 40% Completado

### ✅ Completado:
- Base de datos (12 tablas)
- Modelos y relaciones
- Diseño y paleta de colores
- Homepage funcional
- Página "Nosotros"
- Sistema de rutas básico

### ⚠️ En progreso:
- Nada actualmente

### ❌ Pendiente:
- Panel de administración
- Páginas faltantes (servicios, portfolio, blog, contacto)
- Sistema de emails
- Funcionalidades avanzadas
- Deployment

---

## 🎯 FASE 2: Panel de Administración (1 semana)

**Objetivo:** Permitir que la clienta edite el contenido sin tocar código.

### Paso 1: Instalar Filament

```bash
composer require filament/filament:"^3.2" -W
php artisan filament:install --panels
php artisan make:filament-user
```

**Datos del usuario admin:**
- Email: admin@ingenieriacalidad.com
- Password: (elegir una segura)

### Paso 2: Crear Recursos de Filament

```bash
# Servicios
php artisan make:filament-resource Service --generate

# Proyectos
php artisan make:filament-resource Project --generate

# Blog
php artisan make:filament-resource Post --generate

# Citas
php artisan make:filament-resource Appointment --generate

# Mensajes de contacto
php artisan make:filament-resource ContactMessage --generate

# Testimonios
php artisan make:filament-resource Testimonial --generate
```

### Paso 3: Configurar cada recurso

**En cada archivo generado (ej: `app/Filament/Resources/ServiceResource.php`):**

1. Definir los campos del formulario
2. Configurar la tabla de listado
3. Agregar filtros
4. Configurar permisos

### Paso 4: Personalizar el panel

- Logo de la empresa
- Colores del panel (match con el sitio)
- Navegación personalizada
- Dashboard con estadísticas

**URL del panel:** `http://localhost:8000/admin`

**Tiempo estimado:** 2-3 días

---

## 🎯 FASE 3: Páginas de Servicios (3 días)

### Página 1: Listado de Servicios (`/servicios`)

**Crear:**
1. Controller: `ServiceController.php`
2. Vista: `resources/views/pages/services/index.blade.php`

**Funcionalidades:**
- Grid de todos los servicios
- Filtro por categoría
- Búsqueda por nombre
- Ordenar por: nombre, fecha, orden
- Paginación

**Ruta:**
```php
Route::get('/servicios', [ServiceController::class, 'index'])->name('services.index');
```

### Página 2: Detalle de Servicio (`/servicios/{slug}`)

**Crear:**
1. Método en Controller: `show()`
2. Vista: `resources/views/pages/services/show.blade.php`

**Secciones:**
- Header con título y descripción corta
- Descripción completa
- Beneficios (lista)
- Entregables (lista)
- Duración y precio (si aplica)
- Proyectos relacionados
- Call-to-action (agendar consulta)
- Servicios relacionados

**Ruta:**
```php
Route::get('/servicios/{service:slug}', [ServiceController::class, 'show'])->name('services.show');
```

**Tiempo estimado:** 2-3 días

---

## 🎯 FASE 4: Portfolio (3 días)

### Crear Seeder de Proyectos

**Archivo:** `database/seeders/ProjectSeeder.php`

**Datos a incluir:**
- 3-5 proyectos de ejemplo
- Diferentes industrias
- Ubicaciones en Colombia
- Métricas cuantificables

### Página 1: Listado de Portfolio (`/portfolio`)

**Funcionalidades:**
- Grid de proyectos con imagen
- Filtros: industria, ubicación, servicio
- Vista de grid o lista
- Paginación

### Página 2: Detalle de Proyecto (`/portfolio/{slug}`)

**Secciones:**
- Header con imagen
- Cliente y empresa (si permite mostrarlo)
- Industria y ubicación
- El reto/problema
- La solución implementada
- Resultados cuantificables (métricas)
- Testimonial del cliente (si existe)
- Galería de imágenes
- Servicio relacionado
- Proyectos similares

**Tiempo estimado:** 2-3 días

---

## 🎯 FASE 5: Blog (4 días)

### Crear Seeders

**Archivo:** `database/seeders/BlogSeeder.php`

**Datos:**
- 2-3 categorías (Calidad, Lean, ISO, Six Sigma)
- 5-10 posts de ejemplo

### Páginas del Blog

1. **Listado principal** (`/blog`)
   - Posts recientes
   - Sidebar con categorías
   - Posts destacados
   - Búsqueda
   - Paginación

2. **Por categoría** (`/blog/categoria/{slug}`)
   - Posts filtrados por categoría

3. **Detalle de artículo** (`/blog/{slug}`)
   - Contenido completo
   - Autor y fecha
   - Tiempo de lectura
   - Tags
   - Compartir en redes sociales
   - Artículos relacionados
   - Comentarios (opcional)

**Extras:**
- RSS feed
- Sitemap automático
- Meta tags para SEO

**Tiempo estimado:** 3-4 días

---

## 🎯 FASE 6: Contacto y Citas (3 días)

### Página de Contacto (`/contacto`)

**Formulario:**
- Nombre
- Email
- Teléfono
- Empresa (opcional)
- Asunto
- Mensaje
- Validación frontend y backend
- Protección anti-spam (honeypot o reCAPTCHA)

**Funcionalidades:**
- Guardar en base de datos
- Enviar email a la clienta
- Email de confirmación al usuario
- Mostrar ubicación en mapa
- Información de contacto

### Sistema de Citas (`/citas/agendar`)

**Formulario:**
- Datos personales
- Servicio de interés
- Fecha preferida
- Hora preferida
- Tipo: presencial/virtual
- Ciudad (si es presencial)
- Mensaje adicional

**Funcionalidades:**
- Calendario con disponibilidad
- Validación de fechas/horas
- Guardado en base de datos
- Email de confirmación
- Email a la clienta
- Estados: pendiente, confirmada, cancelada
- Integración con Google Calendar (opcional)

**Tiempo estimado:** 2-3 días

---

## 🎯 FASE 7: Sistema de Emails (2 días)

### Configurar emails

**En `.env`:**
```env
MAIL_MAILER=smtp
MAIL_HOST=smtp.gmail.com
MAIL_PORT=587
MAIL_USERNAME=tu-email@gmail.com
MAIL_PASSWORD=tu-app-password
```

### Crear Mailables

```bash
php artisan make:mail ContactFormMail
php artisan make:mail AppointmentConfirmed
php artisan make:mail NewsletterWelcome
```

### Templates de email

**Crear en:** `resources/views/emails/`

1. `contact-form.blade.php`
2. `appointment-confirmed.blade.php`
3. `newsletter-welcome.blade.php`

**Diseño:**
- Responsive
- Con los colores de la marca
- Logo de la empresa
- Footer con información

**Tiempo estimado:** 1-2 días

---

## 🎯 FASE 8: Newsletter (2 días)

### Funcionalidades

1. **Suscripción:**
   - Formulario en footer (ya existe)
   - Double opt-in (confirmar email)
   - Token único por suscriptor

2. **Gestión en Filament:**
   - Ver suscriptores
   - Exportar lista
   - Crear campañas
   - Programar envíos

3. **Integración externa (opcional):**
   - Mailchimp
   - SendGrid
   - ConvertKit

**Tiempo estimado:** 1-2 días

---

## 🎯 FASE 9: SEO y Optimización (3 días)

### SEO On-Page

1. **Meta tags dinámicos:**
   - Title único por página
   - Description
   - Keywords
   - Open Graph (Facebook)
   - Twitter Cards

2. **Sitemap.xml:**
```bash
composer require spatie/laravel-sitemap
php artisan vendor:publish --provider="Spatie\Sitemap\SitemapServiceProvider"
```

3. **Robots.txt**

4. **Schema.markup:**
   - Organization
   - LocalBusiness
   - Service
   - Article (para blog)

### Optimización de rendimiento

1. **Imágenes:**
   - Lazy loading
   - WebP format
   - Optimización automática

2. **Assets:**
   - Minificación
   - Compresión Gzip

3. **Caché:**
   - Configurar Redis/Memcached
   - Query caching

4. **CDN (opcional):**
   - Cloudflare

**Tiempo estimado:** 2-3 días

---

## 🎯 FASE 10: Testing y QA (3 días)

### Tests a realizar

1. **Funcionales:**
   - Todos los formularios funcionan
   - Emails se envían correctamente
   - Links funcionan
   - Búsquedas funcionan

2. **Responsive:**
   - Móvil (320px - 480px)
   - Tablet (768px - 1024px)
   - Desktop (1280px+)

3. **Navegadores:**
   - Chrome
   - Firefox
   - Safari
   - Edge

4. **Performance:**
   - Google PageSpeed
   - GTmetrix
   - Lighthouse

5. **Accesibilidad:**
   - WAVE
   - axe DevTools

**Tiempo estimado:** 2-3 días

---

## 🎯 FASE 11: Deployment (1 semana)

### Opción A: Hosting Compartido

**Pasos:**
1. Contratar hosting + dominio
2. Configurar base de datos MySQL
3. Subir archivos vía FTP
4. Configurar `.env` de producción
5. Ejecutar migraciones
6. Configurar SSL
7. Testing final

**Recomendados:**
- Hostinger
- SiteGround
- A2 Hosting

**Costo:** $3-10/mes

### Opción B: VPS (Recomendado)

**Pasos:**
1. Contratar VPS (DigitalOcean, Linode)
2. Configurar servidor (Ubuntu 22.04)
3. Instalar: Nginx, PHP 8.2, MySQL, Redis
4. Configurar dominio y DNS
5. Configurar SSL (Let's Encrypt)
6. Configurar deployment automático (Git)
7. Configurar backups automáticos
8. Configurar monitoreo

**Herramientas útiles:**
- Laravel Forge (simplifica todo)
- Ploi
- ServerPilot

**Costo:** $12-25/mes (VPS + Forge)

### Configuraciones de producción

**`.env` en producción:**
```env
APP_ENV=production
APP_DEBUG=false
APP_URL=https://www.ingenieriacalidad.com.co

# Configurar correctamente:
DB_DATABASE=...
DB_USERNAME=...
DB_PASSWORD=...

MAIL_...
```

**Optimizaciones:**
```bash
composer install --optimize-autoloader --no-dev
php artisan config:cache
php artisan route:cache
php artisan view:cache
```

**Tiempo estimado:** 3-5 días

---

## 🎯 FASE 12: Capacitación (1 día)

### Para la clienta

**Documentos a crear:**
1. Manual de usuario del panel admin (PDF)
2. Videos tutoriales:
   - Cómo agregar un servicio
   - Cómo crear un post en el blog
   - Cómo agregar un proyecto
   - Cómo ver mensajes/citas

**Sesión de capacitación:**
- 1-2 horas vía Zoom/presencial
- Mostrar cada función del panel
- Resolver dudas
- Entregar credenciales

**Tiempo estimado:** 1 día

---

## 📅 TIMELINE TOTAL

| Fase | Duración | Acumulado |
|------|----------|-----------|
| Panel Admin | 1 semana | 1 semana |
| Servicios | 3 días | 10 días |
| Portfolio | 3 días | 13 días |
| Blog | 4 días | 17 días |
| Contacto/Citas | 3 días | 20 días |
| Emails | 2 días | 22 días |
| Newsletter | 2 días | 24 días |
| SEO | 3 días | 27 días |
| Testing | 3 días | 30 días |
| Deployment | 5 días | 35 días |
| Capacitación | 1 día | 36 días |

**Total: ~5-6 semanas de trabajo**

(Asumiendo 6-8 horas diarias de desarrollo)

---

## 💰 Presupuesto Estimado

### Costos de desarrollo:
- Si lo haces tú: $0 (solo tiempo)
- Si contratas: $800-2000 USD

### Costos recurrentes:
- Dominio: $10-15/año
- Hosting compartido: $3-10/mes
- VPS + Forge: $17-30/mes
- Email marketing: $0-50/mes (según lista)

### Costos opcionales:
- Tema premium: $0 (hecho a medida)
- Plugins: $0 (todo incluido)
- Mantenimiento: $50-200/mes

**Total primer año:** $200-600 USD

---

## ✅ Checklist de Completitud

### Funcionalidades básicas:
- [ ] Panel de administración funcional
- [ ] CRUD de todos los modelos
- [ ] Todas las páginas creadas
- [ ] Formularios funcionando
- [ ] Emails configurados
- [ ] SEO básico implementado
- [ ] Sitio responsive
- [ ] Testing completo
- [ ] Documentación entregada

### Extras opcionales:
- [ ] Google Analytics
- [ ] Facebook Pixel
- [ ] Chat en vivo
- [ ] Sistema de tickets
- [ ] Multi-idioma (inglés)
- [ ] Blog con comentarios
- [ ] Testimonios verificados
- [ ] Integración con CRM

---

## 🎯 Prioridades Sugeridas

**Alta prioridad (hacer primero):**
1. Panel de administración
2. Páginas de servicios
3. Formulario de contacto
4. Sistema de citas

**Media prioridad:**
5. Portfolio
6. Blog
7. Emails
8. SEO

**Baja prioridad (puede esperar):**
9. Newsletter avanzado
10. Extras opcionales

---

## 📞 Siguiente Paso Inmediato

**Lo que deberías hacer AHORA:**

1. ✅ Revisar que todo funcione correctamente
2. ✅ Mostrar el sitio a la clienta
3. ✅ Obtener feedback inicial
4. ⚠️ Decidir si continuar con el panel admin o con las páginas

**Recomendación:** Instalar el panel de administración primero, así la clienta puede empezar a agregar contenido real mientras tú desarrollas las otras páginas.

---

**Última actualización:** Enero 9, 2026  
**Próxima revisión:** Cuando completes una fase
