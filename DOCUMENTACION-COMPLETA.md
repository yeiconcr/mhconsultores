# 📚 DOCUMENTACIÓN COMPLETA - Sitio Web Ingeniería y Calidad Industrial

**Proyecto:** Sitio web profesional para consultoría en ingeniería industrial y calidad  
**Tecnología:** Laravel 11 + Tailwind CSS  
**Fecha de creación:** Enero 9, 2026  
**Estado:** ✅ Funcionando

---

## 📋 ÍNDICE

1. [¿Qué es este proyecto?](#qué-es-este-proyecto)
2. [Lo que se ha creado](#lo-que-se-ha-creado)
3. [Estructura del proyecto](#estructura-del-proyecto)
4. [Archivos creados/modificados](#archivos-creados-modificados)
5. [Base de datos](#base-de-datos)
6. [Diseño y colores](#diseño-y-colores)
7. [Cómo funciona](#cómo-funciona)
8. [Comandos importantes](#comandos-importantes)
9. [Próximos pasos](#próximos-pasos)
10. [Solución de problemas](#solución-de-problemas)

---

## 🎯 ¿Qué es este proyecto?

Un sitio web profesional para una ingeniera industrial especializada en:
- Consultoría en sistemas de gestión de calidad (ISO 9001)
- Implementación de Lean Manufacturing
- Proyectos Six Sigma
- Auditorías de calidad
- Capacitación empresarial

**Público objetivo:** Empresas en Colombia (especialmente Valle del Cauca: Palmira, Cali)

---

## ✅ Lo que se ha creado

### Funcionalidades Actuales:

1. **✅ Página de Inicio (Homepage)**
   - Hero section impactante con gradiente azul
   - Estadísticas (10+ años, 50+ empresas, 100+ proyectos)
   - 3 servicios destacados
   - Sección "Nosotros" con certificaciones
   - Call-to-action para agendar consulta

2. **✅ Página "Nosotros"**
   - Biografía profesional
   - Certificaciones (Six Sigma, ISO 9001, Lean, PMP)
   - Timeline de experiencia laboral
   - Estadísticas de carrera

3. **✅ Sistema de Base de Datos**
   - 12 tablas creadas y funcionando
   - 6 servicios pre-cargados con datos reales
   - 2 categorías de servicios (Consultoría y Capacitación)

4. **✅ Diseño Profesional**
   - Navbar sticky con menú responsive
   - Footer completo con links y contacto
   - Botón flotante de WhatsApp
   - Newsletter integrado
   - Paleta de colores personalizada

5. **✅ Responsive Design**
   - Se adapta a móvil, tablet y desktop
   - Menú hamburguesa en móvil
   - Diseño mobile-first

---

## 📂 Estructura del proyecto

```
ingenieria-calidad/
│
├── app/
│   ├── Http/Controllers/
│   │   └── HomeController.php          ← Controla home y about
│   │
│   └── Models/
│       ├── Service.php                 ← Modelo de servicios
│       ├── ServiceCategory.php         ← Categorías de servicios
│       ├── Project.php                 ← Portfolio/casos de éxito
│       ├── Post.php                    ← Blog
│       ├── PostCategory.php            ← Categorías del blog
│       ├── Appointment.php             ← Citas
│       └── Testimonial.php             ← Testimonios
│
├── database/
│   ├── migrations/                     ← 12 archivos (tablas)
│   │   ├── 2024_01_01_000001_create_service_categories_table.php
│   │   ├── 2024_01_01_000002_create_services_table.php
│   │   ├── 2024_01_01_000003_create_projects_table.php
│   │   ├── 2024_01_01_000004_create_post_categories_table.php
│   │   ├── 2024_01_01_000005_create_posts_table.php
│   │   ├── 2024_01_01_000006_create_testimonials_table.php
│   │   ├── 2024_01_01_000007_create_appointments_table.php
│   │   ├── 2024_01_01_000008_create_contact_messages_table.php
│   │   ├── 2024_01_01_000009_create_newsletter_subscribers_table.php
│   │   ├── 2024_01_01_000010_create_newsletter_campaigns_table.php
│   │   ├── 2024_01_01_000011_create_social_links_table.php
│   │   └── 2024_01_01_000012_create_site_settings_table.php
│   │
│   └── seeders/
│       ├── DatabaseSeeder.php          ← Orquestador principal
│       └── ServiceSeeder.php           ← 6 servicios + 2 categorías
│
├── resources/
│   ├── views/
│   │   ├── layouts/
│   │   │   └── app.blade.php          ← Layout principal (navbar, footer)
│   │   │
│   │   └── pages/
│   │       └── home/
│   │           └── index.blade.php    ← Página de inicio
│   │
│   └── css/
│       └── app.css                    ← Estilos personalizados
│
├── routes/
│   └── web.php                        ← Rutas del sitio
│
├── .env                               ← Configuración (base de datos, etc.)
├── tailwind.config.js                ← Colores personalizados
├── package.json                       ← Dependencias de Node.js
├── postcss.config.js                 ← Configuración de PostCSS
└── vite.config.js                    ← Configuración de Vite
```

---

## 📝 Archivos creados/modificados

### Archivos NUEVOS creados (no existían):

1. **Migrations (12 archivos)** - `database/migrations/`
2. **Models (7 archivos)** - `app/Models/`
   - Service.php
   - ServiceCategory.php
   - Project.php
   - Post.php
   - PostCategory.php
   - Appointment.php
   - Testimonial.php
3. **Controller** - `app/Http/Controllers/HomeController.php`
4. **Seeders (1 archivo)** - `database/seeders/ServiceSeeder.php`
5. **Vistas (2 archivos)**
   - `resources/views/layouts/app.blade.php`
   - `resources/views/pages/home/index.blade.php`
6. **Configuración** - `postcss.config.js`

### Archivos MODIFICADOS (ya existían):

1. **`.env`** - Agregamos configuración de WhatsApp, Google Calendar, Mailchimp
2. **`routes/web.php`** - Agregamos las rutas del sitio
3. **`tailwind.config.js`** - Agregamos colores personalizados
4. **`package.json`** - Agregamos dependencias de Tailwind
5. **`vite.config.js`** - Corregimos configuración
6. **`resources/css/app.css`** - Agregamos estilos personalizados
7. **`database/seeders/DatabaseSeeder.php`** - Agregamos llamada a ServiceSeeder

---

## 🗄️ Base de Datos

### Tablas creadas (12 en total):

| # | Tabla | Descripción | Estado |
|---|-------|-------------|--------|
| 1 | `service_categories` | Categorías de servicios | ✅ Con datos |
| 2 | `services` | Servicios ofrecidos | ✅ Con 6 servicios |
| 3 | `projects` | Portfolio/casos de éxito | ⚪ Vacía |
| 4 | `post_categories` | Categorías del blog | ⚪ Vacía |
| 5 | `posts` | Artículos del blog | ⚪ Vacía |
| 6 | `testimonials` | Testimonios de clientes | ⚪ Vacía |
| 7 | `appointments` | Sistema de citas | ⚪ Vacía |
| 8 | `contact_messages` | Mensajes de contacto | ⚪ Vacía |
| 9 | `newsletter_subscribers` | Suscriptores newsletter | ⚪ Vacía |
| 10 | `newsletter_campaigns` | Campañas de email | ⚪ Vacía |
| 11 | `social_links` | Enlaces redes sociales | ⚪ Vacía |
| 12 | `site_settings` | Configuración general | ⚪ Vacía |

### Datos pre-cargados:

**2 Categorías de Servicios:**
1. Consultoría
2. Capacitación

**6 Servicios:**
1. ✅ Implementación ISO 9001 (Destacado)
2. ✅ Lean Manufacturing (Destacado)
3. ✅ Six Sigma & DMAIC (Destacado)
4. ⚪ Auditorías de Calidad
5. ⚪ Capacitación en Herramientas de Calidad
6. ⚪ Gestión de Proyectos de Mejora

---

## 🎨 Diseño y Colores

### Paleta de Colores (Opción 1 - Implementada):

**Primario (Azul Corporativo):**
- Color: `#1E40AF`
- Uso: Navbar, botones principales, enlaces, gradientes
- Representa: Confianza, profesionalismo, estabilidad

**Secundario (Verde Éxito):**
- Color: `#059669`
- Uso: Checks, estados positivos, iconos de éxito
- Representa: Crecimiento, resultados, calidad

**Acento (Naranja Energía):**
- Color: `#EA580C`
- Uso: CTAs importantes, elementos destacados
- Representa: Acción, dinamismo, urgencia

**Neutrales:**
- Grises: `#1F2937`, `#6B7280`, `#F3F4F6`
- Uso: Textos, fondos, bordes

### Tipografía:

- **Headings:** Poppins (600, 700, 800) - Títulos impactantes
- **Body:** Inter (300-700) - Lectura cómoda

### Componentes de diseño:

- ✅ Cards con hover effects
- ✅ Botones con animaciones
- ✅ Gradientes suaves
- ✅ Sombras profesionales
- ✅ Transiciones smooth
- ✅ Iconos Font Awesome 6.4

---

## ⚙️ Cómo funciona

### Flujo de una página:

1. **Usuario visita:** `http://localhost:8000`

2. **Laravel procesa:**
   - Lee la ruta en `routes/web.php`
   - Encuentra: `Route::get('/', [HomeController::class, 'index'])`

3. **Controller ejecuta:**
   - `HomeController.php` → método `index()`
   - Consulta la base de datos:
     - 3 servicios destacados
     - 3 proyectos destacados (cuando existan)
     - 3 testimonios (cuando existan)
     - 3 posts recientes (cuando existan)

4. **Vista renderiza:**
   - Usa el layout: `layouts/app.blade.php`
   - Renderiza contenido: `pages/home/index.blade.php`
   - Aplica estilos: `app.css` + Tailwind

5. **Navegador muestra:**
   - HTML con estilos aplicados
   - JavaScript para menú móvil
   - Botón de WhatsApp funcional

### Ejemplo de cómo funcionan los Modelos:

```php
// En HomeController.php

// Esto trae los 3 servicios destacados:
$featuredServices = Service::active()     // Solo activos
    ->featured()                           // Solo destacados
    ->ordered()                            // Ordenados por 'order'
    ->limit(3)                             // Máximo 3
    ->get();                               // Ejecuta la consulta

// Luego se pasan a la vista:
return view('pages.home.index', compact('featuredServices'));
```

### Cómo funciona Blade (las vistas):

```php
<!-- En la vista -->
@forelse($featuredServices as $service)
    <h3>{{ $service->title }}</h3>
    <p>{{ $service->short_description }}</p>
@empty
    <p>No hay servicios disponibles</p>
@endforelse
```

---

## 🔧 Comandos Importantes

### Desarrollo diario:

```bash
# Iniciar el servidor (SIEMPRE necesario para ver el sitio)
php artisan serve

# Si haces cambios en CSS/JS
npm run build

# Si haces cambios en archivos .blade.php
# No necesitas hacer nada, solo refresca el navegador
```

### Base de datos:

```bash
# Ver el estado de las migraciones
php artisan migrate:status

# Ejecutar migraciones nuevas
php artisan migrate

# Resetear TODO y volver a crear (CUIDADO: borra datos)
php artisan migrate:fresh --seed

# Solo ejecutar seeders (agregar datos)
php artisan db:seed

# Ejecutar un seeder específico
php artisan db:seed --class=ServiceSeeder
```

### Explorar la base de datos:

```bash
# Abrir consola interactiva
php artisan tinker

# Luego puedes ejecutar:
>>> Service::all();              # Ver todos los servicios
>>> Service::count();            # Contar servicios
>>> Service::first();            # Ver el primer servicio
>>> Service::find(1);            # Ver servicio con ID 1
>>> exit                         # Salir
```

### Caché (si las cosas no se actualizan):

```bash
# Limpiar TODA la caché
php artisan optimize:clear

# O uno por uno:
php artisan cache:clear
php artisan config:clear
php artisan route:clear
php artisan view:clear
```

### Crear nuevos archivos:

```bash
# Crear un nuevo modelo
php artisan make:model NombreModelo

# Crear modelo + migration + seeder + factory
php artisan make:model NombreModelo -mfs

# Crear controller
php artisan make:controller NombreController

# Crear migration
php artisan make:migration create_nombre_table

# Crear seeder
php artisan make:seeder NombreSeeder
```

---

## 🚀 Próximos Pasos

### FASE 2: Panel de Administración

**Objetivo:** Que la clienta pueda editar el sitio sin código.

**Instalar Filament:**
```bash
composer require filament/filament:"^3.2" -W
php artisan filament:install --panels
php artisan make:filament-user
```

**Recursos a crear:**
- ServiceResource (CRUD de servicios)
- ProjectResource (CRUD de portfolio)
- PostResource (CRUD de blog)
- AppointmentResource (Ver/gestionar citas)
- ContactMessageResource (Ver mensajes)
- NewsletterSubscriberResource (Ver suscriptores)

**URL del panel:** `http://localhost:8000/admin`

---

### FASE 3: Páginas Faltantes

**Servicios:**
- [ ] Listado de todos los servicios (`/servicios`)
- [ ] Detalle individual de cada servicio (`/servicios/lean-manufacturing`)

**Portfolio:**
- [ ] Listado de proyectos con filtros (`/portfolio`)
- [ ] Detalle de caso de éxito (`/portfolio/proyecto-xyz`)

**Blog:**
- [ ] Listado de artículos (`/blog`)
- [ ] Detalle de artículo (`/blog/como-implementar-iso-9001`)
- [ ] Filtro por categoría (`/blog/categoria/lean-manufacturing`)

**Contacto:**
- [ ] Formulario de contacto (`/contacto`)
- [ ] Envío de emails
- [ ] Guardado en base de datos

**Citas:**
- [ ] Formulario de agendar cita (`/citas/agendar`)
- [ ] Calendario de disponibilidad
- [ ] Confirmación por email
- [ ] Integración con Google Calendar

---

### FASE 4: Funcionalidades Avanzadas

**Newsletter:**
- [ ] Sistema de confirmación (double opt-in)
- [ ] Envío de campañas
- [ ] Integración con Mailchimp/SendGrid
- [ ] Estadísticas de apertura

**WhatsApp:**
- [ ] Configurar número real
- [ ] Mensajes personalizados por sección
- [ ] Integración con WhatsApp Business API

**SEO:**
- [ ] Meta tags dinámicos por página
- [ ] Sitemap.xml automático
- [ ] Schema markup (datos estructurados)
- [ ] Open Graph para redes sociales

**Analytics:**
- [ ] Google Analytics
- [ ] Facebook Pixel
- [ ] Heatmaps (Hotjar)

---

### FASE 5: Deployment (Subir a Internet)

**Opciones de hosting:**

**A) Hosting Compartido** (Más barato: $3-10/mes)
- Hostinger
- Hostgator
- Bluehost

**B) VPS** (Más control: $5-20/mes)
- DigitalOcean
- Linode
- Vultr

**C) Hosting Laravel Especializado** (Más fácil: $12-25/mes)
- Laravel Forge + DigitalOcean
- Ploi
- Cloudways

**Pasos generales:**
1. Contratar dominio (ejemplo: `ingenieriacalidad.com.co`)
2. Configurar servidor
3. Subir archivos
4. Configurar base de datos en producción
5. Configurar SSL (https)
6. Configurar emails
7. Testing final

---

## 🐛 Solución de Problemas

### Error: "Could not open input file: artisan"

**Problema:** No estás en la carpeta correcta.

**Solución:**
```bash
cd C:\Users\YEISON CONSTAIN\Desktop\ingenieria-calidad
```

---

### Error: "npm no se reconoce"

**Problema:** Node.js no está instalado o no está en el PATH.

**Solución:**
1. Instalar Node.js desde https://nodejs.org/
2. Reiniciar el CMD/PowerShell
3. Verificar: `node --version`

---

### Error: "php no se reconoce"

**Problema:** PHP no está instalado o no está en el PATH.

**Solución:**
1. Instalar XAMPP desde https://www.apachefriends.org/
2. Agregar PHP al PATH o usar desde XAMPP

---

### Error: "SQLSTATE[HY000] [1049] Unknown database"

**Problema:** La base de datos no existe.

**Solución:**
1. Abrir phpMyAdmin: http://localhost/phpmyadmin
2. Crear base de datos: `ingenieria_calidad`
3. Ejecutar: `php artisan migrate`

---

### Error: "SQLSTATE[HY000] [2002] No connection"

**Problema:** MySQL no está corriendo.

**Solución:**
1. Abrir XAMPP Control Panel
2. Click en START en "MySQL"
3. Intentar de nuevo

---

### La página no carga estilos (se ve sin diseño)

**Problema:** Los assets no se compilaron o Vite no está corriendo.

**Solución:**
```bash
# Compilar assets
npm run build

# O correr en modo desarrollo
npm run dev
```

---

### Los cambios en CSS no se reflejan

**Problema:** Caché o necesitas recompilar.

**Solución:**
```bash
npm run build
# Luego refresca el navegador con Ctrl+F5
```

---

### Error: "419 Page Expired" en formularios

**Problema:** Token CSRF inválido.

**Solución:**
1. Verifica que el formulario tenga `@csrf`
2. Limpia caché: `php artisan cache:clear`
3. Refresca la página

---

## 📞 Contacto y Soporte

**Desarrollador:** Claude (Anthropic AI)  
**Cliente:** Yeison Constain  
**Proyecto:** Ingeniería y Calidad Industrial  

**Para ayuda adicional:**
- Documentación Laravel: https://laravel.com/docs
- Documentación Tailwind: https://tailwindcss.com/docs
- Stack Overflow: https://stackoverflow.com/questions/tagged/laravel

---

## 📊 Resumen del Estado Actual

| Componente | Estado | Porcentaje |
|------------|--------|------------|
| Base de datos | ✅ Completo | 100% |
| Modelos | ✅ Completo | 100% |
| Diseño base | ✅ Completo | 100% |
| Homepage | ✅ Completo | 100% |
| About | ✅ Completo | 100% |
| Servicios | ⚠️ Parcial | 50% |
| Portfolio | ❌ Pendiente | 0% |
| Blog | ❌ Pendiente | 0% |
| Contacto | ❌ Pendiente | 0% |
| Citas | ❌ Pendiente | 0% |
| Panel Admin | ❌ Pendiente | 0% |

**Progreso general:** ~40% completado

---

## 🎯 Conclusión

Has creado exitosamente la **base sólida** de un sitio web profesional para consultoría en ingeniería y calidad industrial. 

**Lo que tienes:**
- ✅ Diseño profesional y moderno
- ✅ Estructura de base de datos completa
- ✅ Sistema funcionando localmente
- ✅ Datos de ejemplo cargados
- ✅ Responsive design
- ✅ Paleta de colores corporativa

**Lo que falta:**
- ⚠️ Páginas de servicios, portfolio, blog, contacto
- ⚠️ Panel de administración
- ⚠️ Sistema de emails
- ⚠️ Subir a Internet

**Tiempo estimado para completar:** 3-4 semanas de trabajo adicional.

---

## 📝 Notas Finales

- Este es un proyecto REAL y FUNCIONAL
- La arquitectura está bien diseñada para escalar
- Los colores y diseño son profesionales
- El código sigue las mejores prácticas de Laravel
- Está listo para mostrar a la clienta

**¡Felicitaciones por llegar hasta aquí!** 🎉

---

**Última actualización:** Enero 10, 2026  
**Versión del documento:** 1.1

---

## 11. 🧠 Arquitectura del Sistema de Configuraciones (Site Settings)

> **Explicación técnica detallada del diseño implementado para gestionar textos, imágenes y datos de contacto.**

### El Problema
Los paneles de administración tradicionales suelen mezclar "contenido" (artículos, servicios) con "configuración" (logo, teléfono, títulos). Esto confunde al usuario final y puede romper el sitio si se borra una clave técnica importante.

### La Solución: Modelo Híbrido "Key-Value"
Hemos implementado un sistema robusto donde la base de datos guarda pares de `clave` y `valor`, pero el panel de administración se comporta de manejo guiado y seguro.

#### 1. Estructura de Base de Datos (`site_settings`)
Cada configuración es un registro con:
- `key`: Identificador único (ej: `hero.title`). **Intocable por el usuario.**
- `value`: El contenido real. **Editable.**
- `type`: Define cómo se muestra el input (`text`, `textarea`, `number`, `image`).
- `group`: Agrupación lógica (`hero`, `contact`, `stats`) para las pestañas.
- `label`: Nombre amigable para el humano (ej: "Título Principal").
- `description`: Ayuda contextual.

#### 2. Seguridad y UX (Experiencia de Usuario)
Para evitar errores catastróficos, hemos aplicado estas reglas de negocio en el panel (`SiteSettingResource`):

- **❌ Prohibido Crear:** No se pueden crear configuraciones manualmente desde el panel. ¿Por qué? Porque una configuración sin código que la use en el frontend es inútil ("dato fantasma"). La creación se hace vía programación (Seeder).
- **❌ Prohibido Eliminar:** No se pueden borrar configuraciones. Esto evita que el sitio muestre errores o espacios en blanco porque falta una clave.
- **🔒 Campos Técnicos Ocultos:** El usuario NO ve `key`, `group` ni `type`. Solo ve "Qué es" y "Su Contenido".
- **💾 Mapeo de Tipos:** Internamente, el formulario carga el valor en el campo correcto (`value_text`, `value_image`) para evitar conflictos de componentes.

#### 3. Ciclo de Vida de una Nueva Configuración
Si en el futuro se necesita agregar, por ejemplo, un "Link de Instagram":

1.  **Desarrollador:** Agrega el código en el Blade:
    ```html
    <a href="{{ site_setting('social.instagram') }}">...</a>
    ```
2.  **Desarrollador:** Crea la entrada en la base de datos (vía Seeder o comando):
    ```php
    SiteSetting::create(['key' => 'social.instagram', 'type' => 'text', ...]);
    ```
3.  **Usuario Final:** Inmediatamente ve el nuevo campo en el panel admin y puede editar el link.

#### 4. Rendimiento (Caché)
Para no consultar la base de datos cada vez que alguien entra al sitio:
- El helper `site_setting()` usa caché por defecto.
- El modelo `SiteSetting` tiene un "disparador" (`boot`) que borra automáticamente la caché de ese registro cuando se edita en el panel admin.
- Resultado: **Velocidad máxima + Actualización inmediata.**
