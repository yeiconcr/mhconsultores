# 🚀 Despliegue en Railway

Esta guía explica cómo desplegar **Ingeniería de Calidad** en Railway.app usando tu repositorio de GitHub.

## 1. Preparación en Railway

1.  Crea una cuenta en [Railway.app](https://railway.app).
2.  Haz clic en **"New Project"** → **"Deploy from GitHub repo"**.
3.  Selecciona el repositorio **`ingenieria-calidad`**.
4.  Haz clic en **"Add Variable"**.

## 2. Variables de Entorno (Environment Variables)

Configura estas variables en la pestaña **Variables** de tu proyecto en Railway:

```ini
APP_NAME="Ingeniería de Calidad"
APP_ENV=production
APP_KEY=base64:... (Copia el de tu .env local o genera uno nuevo)
APP_DEBUG=false
APP_URL=https://... (Railway te dará un dominio, ponlo aquí)
APP_LOCALE=es

# Base de Datos (Ver paso 3)
DB_CONNECTION=mysql
DB_HOST=${MYSQLHOST}
DB_PORT=${MYSQLPORT}
DB_DATABASE=${MYSQLDATABASE}
DB_USERNAME=${MYSQLUSER}
DB_PASSWORD=${MYSQLPASSWORD}
```

## 3. Base de Datos MySQL

1.  En la vista del proyecto ("Canvas"), haz clic en **New** → **Database** → **MySQL**.
2.  Automáticamente, Railway creará las variables de entorno (`MYSQLHOST`, `MYSQLPASSWORD`, etc.) y tu aplicación las leerá gracias a la configuración de arriba `${...}`.

## 4. Configuración de Construcción (Build)

Railway detectará que es un proyecto PHP. Asegúrate de que en **Settings** → **Build** esté todo en orden (generalmente NIXPACKS lo detecta solo).
Hemos creado un archivo `Procfile` que le dice a Railway cómo iniciar el servidor web.

## 5. Migraciones y Usuario Admin

Una vez desplegado (verás el check verde ✅), necesitas correr las migraciones y crear el usuario.

1.  Ve a la pestaña **Settings** → **Deploy** y agrega en "Start Command" (opcional, para automatizar):
    `php artisan migrate --force && vendor/bin/heroku-php-apache2 public/`
    
    *O mejor aún, hazlo manual en la consola la primera vez:*
    
2.  Ve a la pestaña **Terminal** de tu servicio (App), no de la base de datos.
3.  Ejecuta:
    ```bash
    php artisan migrate --force
    php artisan db:seed --class=SiteSettingsSeeder --force
    php artisan make:filament-user
    ```
    (Sigue los pasos para crear tu usuario).

¡Listo! Abre la URL pública que Railway te asignó.
