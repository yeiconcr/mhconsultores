# 🚀 Guía de Despliegue en Laravel Cloud

Esta guía detalla los pasos para llevar tu aplicación **Ingeniería de Calidad** a producción.

## 1. Requisitos Previos

- Tener una cuenta activa en [Laravel Cloud](https://cloud.laravel.com) (o tu proveedor PaaS preferido).
- Acceso al repositorio Git (GitHub/GitLab) donde está el código.
- Tener configurado el archivo `cloud.yaml` (ya creado en la raíz del proyecto).

## 2. Variables de Entorno (Production)

En el panel de control de tu hosting/nube, debes configurar las siguientes **Environment Variables**. No subas el archivo `.env` al repositorio.

```ini
APP_NAME="Ingeniería de Calidad"
APP_ENV=production
APP_KEY=base64:... (Copia esto de tu .env local o genera uno nuevo)
APP_DEBUG=false
APP_URL=https://tu-dominio.com

# Base de Datos (Cloud Provider te dará estos datos)
DB_CONNECTION=mysql
DB_HOST=...
DB_PORT=3306
DB_DATABASE=...
DB_USERNAME=...
DB_PASSWORD=...

# Configuración Regional
APP_LOCALE=es
APP_FALLBACK_LOCALE=es
APP_FAKER_LOCALE=es_CO
```

## 3. Base de Datos

Tu aplicación usa **MySQL**. Asegúrate de crear una base de datos vacía en tu proveedor.
El sistema ejecutará automáticamente las migraciones (`php artisan migrate --force`) gracias a la configuración en `cloud.yaml`.

## 4. Primer Despliegue (Pasos)

1.  **Subir Código:** Haz commit y push de todos los cambios recientes, incluyendo `cloud.yaml`.
    ```bash
    git add .
    git commit -m "Preparando despliegue a producción"
    git push origin main
    ```

2.  **Conectar Repositorio:** En Laravel Cloud, conecta tu repositorio y selecciona la rama `main`.

3.  **Detectar Configuración:** El sistema detectará automáticamente el archivo `cloud.yaml`.

4.  **Desplegar:** Inicia el despliegue. El proceso instalará dependencias, compilará los assets de Vite y migrará la base de datos.

## 5. Post-Despliegue

Una vez en línea, necesitarás crear tu primer usuario administrador para entrar al panel.

1.  Accede a la **Consola / Terminal** de tu servidor en la nube.
2.  Ejecuta el comando para crear un usuario:
    ```bash
    php artisan make:filament-user
    ```
3.  Sigue las instrucciones (Nombre, Email, Password).

¡Listo! Ahora puedes ingresar a `https://tu-dominio.com/admin` y empezar a gestionar tu sitio.
