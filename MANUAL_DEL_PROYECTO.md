# 📘 MANUAL DEL PROYECTO: Ingeniería y Calidad Industrial

**Versión:** 2.0 (Enero 2026)  
**Estado:** 🚀 En Producción (Railway)

---

## 🔗 Enlaces Rápidos

- **Sitio Web Público:** [https://web-production-f272e.up.railway.app](https://web-production-f272e.up.railway.app)
- **Panel de Administración:** [https://web-production-f272e.up.railway.app/admin](https://web-production-f272e.up.railway.app/admin)
- **Repositorio:** [https://github.com/yeiconcr/mhconsultores](https://github.com/yeiconcr/mhconsultores)

---

## 👤 Acceso Administrativo

Credenciales para acceder al panel de administración (`/admin`):

- **Usuario:** `admin@mhconsultores.com`
- **Contraseña:** `Admin2026MH!`

> ⚠️ **Importante:** Se recomienda cambiar esta contraseña después del primer inicio de sesión por seguridad.

---

## 🛠️ Tecnologías Utilizadas

Este proyecto utiliza un stack moderno y robusto:

- **Backend:** Laravel 11 (PHP 8.4)
- **Base de Datos:** MySQL 8.0
- **Panel Admin:** FilamentPHP v3
- **Frontend:** Blade + TailwindCSS
- **Infraestructura:** Railway (Nixpacks + Docker)

---

## 🚀 Guía de Despliegue (Railway)

El sitio está configurado para **Despliegue Continuo**. Cada vez que haces un `git push` a la rama `main`, Railway detecta los cambios y actualiza el sitio automáticamente.

### Variables de Entorno (Producción)

Estas variables deben configurarse en el panel de Railway:

```ini
APP_NAME="Ingeniería de Calidad"
APP_ENV=production
APP_URL=https://web-production-f272e.up.railway.app
APP_KEY=base64:... (Generada por Laravel)
DB_CONNECTION=mysql
DB_HOST=${{MySQL.RAILWAY_PRIVATE_DOMAIN}}
DB_PORT=3306
DB_DATABASE=railway
DB_USERNAME=root
DB_PASSWORD=${{MySQL.MYSQL_ROOT_PASSWORD}}
CACHE_DRIVER=file
SESSION_DRIVER=file
```

### Comandos de Diagnóstico

Si necesitas interactuar con la base de datos de producción desde tu PC local:

**1. Obtener Datos de Conexión:**
Ve a Railway → MySQL → Pestaña "Connect" → Copia Host, Puerto, Usuario y Password.

**2. Conectar desde Terminal (Ejemplo):**
```bash
mysql -h HOST_RAILWAY -P PUERTO -u root -p railway
```

---

## 💻 Guía de Desarrollo Local

Si deseas hacer cambios en el código desde tu computadora:

### 1. Requisitos
- **Laragon** (o XAMPP/Docker) con PHP 8.2+
- **Composer**
- **Node.js** & NPM
- **Git**

### 2. Instalación
```bash
# clonar repositorio
git clone https://github.com/yeiconcr/mhconsultores.git

# instalar dependencias PHP
composer install

# instalar dependencias JS/CSS
npm install

# copiar archivo de entorno
cp .env.example .env
# (Configura tu base de datos local en .env)

# generar llave de aplicación
php artisan key:generate

# ejecutar migraciones y seeders
php artisan migrate --seed
```

### 3. Ejecutar Proyecto
```bash
# Terminal 1: Servidor Laravel
php artisan serve

# Terminal 2: Compilación de Assets (CSS/JS)
npm run dev
```

---

## ⚙️ Gestión de Contenidos

El sitio cuenta con un sistema de **Configuraciones Dinámicas** que permite editar textos e imágenes sin tocar el código.

### ¿Qué se puede editar?

1.  **Información de Contacto:**
    - WhatsApp, Teléfono, Email, Dirección.
    - Al cambiarlo aquí, se actualiza en el Header, Footer y Página de Contacto.

2.  **Sección Hero (Inicio):**
    - Título principal, Subtítulo, Descripción, Texto del botón.

3.  **Estadísticas:**
    - Años de experiencia, Proyectos, Clientes, Satisfacción.

4.  **Sección Nosotros:**
    - Título, Descripción, Imagen del equipo.

### ¿Cómo editar?
1. Entra al panel `/admin`.
2. Ve a la sección **"Site Settings"** (Configuraciones).
3. Busca el valor que quieres cambiar y dale al botón de **Editar** (lápiz).
4. Guarda los cambios. ¡Se reflejarán instantáneamente en la web!

---

## 📂 Estructura del Proyecto

Archivos y carpetas clave que debes conocer:

```
/app
  /Models
    User.php           # Usuario administrador
    SiteSetting.php    # Modelo de configuraciones
  /Filament
    /Resources         # Controladores del panel admin

/database
  /migrations          # Estructura de la base de datos
  /seeders             # Datos iniciales (Configuraciones, Admin)

/resources
  /views
    /layouts           # Plantilla base (Navbar, Footer)
    /pages             # Vistas de cada página (Home, About, Contact)
```

---

## ❓ Solución de Problemas Comunes

### Error 403 en `/admin`
- **Causa:** El usuario no tiene permisos.
- **Solución:** Asegúrate de que el modelo `User` implemente `FilamentUser` (ya corregido en v2.0).

### Los cambios en CSS no se ven
- **Causa:** Caché del navegador o falta compilar.
- **Solución:** Ejecuta `npm run build` antes de subir cambios.

### Error de Base de Datos en Railway
- **Causa:** Variables de entorno incorrectas.
- **Solución:** Verifica que `DB_HOST` apunte a `${{MySQL.RAILWAY_PRIVATE_DOMAIN}}` y no a `localhost`.

---

**Desarrollado con ❤️ para Ingeniería y Calidad Industrial.**
