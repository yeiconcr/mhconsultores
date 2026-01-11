# 🚂 Guía de Despliegue en Railway

Esta guía te llevará paso a paso para desplegar tu aplicación **Ingeniería de Calidad** en Railway.app de forma gratuita.

---

## 📋 Prerequisitos

- ✅ Cuenta en GitHub (para subir tu código)
- ✅ Cuenta en Railway.app (gratis)

---

## 🚀 Paso 1: Preparar el Repositorio en GitHub

### 1.1 Crear repositorio en GitHub
1. Ve a https://github.com y haz clic en **"New repository"**
2. Nombre del repositorio: `ingenieria-calidad` (o el que prefieras)
3. Visibilidad: **Private** o **Public** (como prefieras)
4. **NO** marques ninguna opción de inicializar (README, .gitignore, license)
5. Haz clic en **"Create repository"**

### 1.2 Subir tu código
Abre la terminal en tu proyecto y ejecuta:

```bash
# Si aún no has inicializado git (ya lo tienes, pero por si acaso):
git remote -v

# Si no tienes remote, agrega el de GitHub:
git remote add origin https://github.com/TU-USUARIO/ingenieria-calidad.git

# Agrega todos los archivos nuevos
git add .

# Haz commit
git commit -m "Preparando deploy para Railway"

# Sube a GitHub
git push -u origin main
```

**⚠️ Importante:** Si te pide usuario/contraseña, usa un **Personal Access Token** en vez de la contraseña.

---

## 🎯 Paso 2: Crear Cuenta en Railway

1. Ve a https://railway.app
2. Haz clic en **"Start a New Project"** o **"Login"**
3. Inicia sesión con **GitHub** (recomendado)
4. Autoriza Railway a acceder a tus repositorios

---

## 🔧 Paso 3: Crear el Proyecto en Railway

### 3.1 Nuevo Proyecto
1. En el dashboard de Railway, haz clic en **"New Project"**
2. Selecciona **"Deploy from GitHub repo"**
3. Busca y selecciona el repositorio `ingenieria-calidad`
4. Haz clic en **"Deploy Now"**

### 3.2 Agregar Base de Datos MySQL
1. En tu proyecto de Railway, haz clic en **"+ New"**
2. Selecciona **"Database"** → **"Add MySQL"**
3. Railway creará automáticamente la base de datos
4. Espera unos segundos a que se provisione

---

## ⚙️ Paso 4: Configurar Variables de Entorno

### 4.1 Acceder a Variables
1. En Railway, haz clic en el servicio de tu aplicación (el que tiene tu código)
2. Ve a la pestaña **"Variables"**
3. Agrega las siguientes variables:

### 4.2 Variables Requeridas

```bash
# Aplicación
APP_NAME=Ingeniería de Calidad
APP_ENV=production
APP_DEBUG=false
APP_URL=${{RAILWAY_PUBLIC_DOMAIN}}

# Generar APP_KEY
# En tu terminal local ejecuta: php artisan key:generate --show
# Copia el resultado y pégalo aquí:
APP_KEY=base64:TU_KEY_AQUI

# Configuración Regional
APP_LOCALE=es
APP_FALLBACK_LOCALE=es
APP_FAKER_LOCALE=es_CO

# Base de Datos (Railway las autocompletará)
DB_CONNECTION=mysql
DB_HOST=${{MYSQL_HOST}}
DB_PORT=${{MYSQL_PORT}}
DB_DATABASE=${{MYSQL_DATABASE}}
DB_USERNAME=${{MYSQL_USER}}
DB_PASSWORD=${{MYSQL_PASSWORD}}

# Session & Cache
SESSION_DRIVER=file
CACHE_DRIVER=file
QUEUE_CONNECTION=sync

# Logs
LOG_CHANNEL=stack
LOG_LEVEL=error
```

**💡 Tip:** Railway tiene variables especiales como `${{MYSQL_HOST}}` que se llenan automáticamente.

### 4.3 Generar APP_KEY
En tu computadora local, ejecuta:
```bash
php artisan key:generate --show
```
Copia el resultado (será algo como `base64:abc123...`) y pégalo en la variable `APP_KEY`

---

## 🌐 Paso 5: Configurar Dominio Público

1. En el servicio de tu aplicación, ve a **"Settings"**
2. Busca la sección **"Networking"** o **"Domains"**
3. Haz clic en **"Generate Domain"**
4. Railway te dará una URL como: `tu-app.up.railway.app`
5. ✅ ¡Este es tu dominio gratuito con HTTPS automático!

---

## 🔄 Paso 6: Ejecutar Migraciones

Después del primer deploy, necesitas ejecutar las migraciones de la base de datos.

### 6.1 Abrir Terminal en Railway
1. En tu servicio de aplicación, haz clic en la pestaña **"Deployments"**
2. Selecciona el deployment activo (el que tiene el punto verde)
3. En la parte superior derecha, haz clic en los **3 puntos** → **"Shell"** o busca el ícono de terminal

### 6.2 Ejecutar Comandos
```bash
# Ejecutar migraciones
php artisan migrate --force

# Crear usuario administrador
php artisan make:filament-user
```

Sigue las instrucciones para crear tu usuario admin:
- Nombre: Tu nombre
- Email: tu@email.com
- Password: Una contraseña segura

---

## ✅ Paso 7: ¡Listo! Acceder a tu Aplicación

1. Abre tu navegador
2. Ve a: `https://tu-app.up.railway.app`
3. Para el panel de administración: `https://tu-app.up.railway.app/admin`
4. Inicia sesión con el usuario que creaste

---

## 🔄 Despliegues Futuros (Auto Deploy)

Cada vez que hagas `git push` a GitHub, Railway automáticamente:
1. ✅ Detectará el cambio
2. ✅ Descargará el código nuevo
3. ✅ Instalará dependencias
4. ✅ Compilará assets
5. ✅ Desplegará la nueva versión

**No necesitas hacer nada más.** El deploy es automático.

---

## 📊 Monitoreo y Logs

### Ver Logs en Tiempo Real
1. En tu servicio, ve a la pestaña **"Deployments"**
2. Haz clic en el deployment activo
3. Verás los logs en vivo
4. Útil para debugging

### Métricas
1. Ve a la pestaña **"Metrics"**
2. Verás uso de CPU, RAM, red, etc.

---

## 💰 Créditos y Límites

### Plan Gratuito
- **$5 USD de créditos mensuales**
- Suficiente para:
  - ✅ 1 aplicación web pequeña-mediana
  - ✅ 1 base de datos MySQL
  - ✅ Tráfico moderado
  - ✅ ~500 horas de CPU al mes

### Si te Quedas Sin Créditos
1. La app se pausará automáticamente
2. Puedes agregar tarjeta para más créditos (solo pagas lo que uses)
3. O esperar al siguiente mes (se resetean los $5)

---

## 🔧 Comandos Útiles (Railway Shell)

```bash
# Ver versión de PHP
php -v

# Limpiar caches
php artisan cache:clear
php artisan config:clear
php artisan route:clear
php artisan view:clear

# Ver estado de la base de datos
php artisan migrate:status

# Ejecutar migraciones nuevas
php artisan migrate --force

# Crear nuevo usuario admin
php artisan make:filament-user

# Ver logs
tail -f storage/logs/laravel.log
```

---

## 🐛 Troubleshooting

### Error 500 al acceder
1. Ve a los logs en Railway
2. Verifica que `APP_KEY` esté configurado
3. Verifica que las migraciones se ejecutaron
4. Revisa las variables de base de datos

### La base de datos no conecta
1. Verifica que usaste las variables de Railway: `${{MYSQL_HOST}}`
2. Asegúrate que el servicio MySQL esté corriendo (punto verde)
3. Reinicia el servicio de la aplicación

### Los assets no cargan (CSS/JS)
1. Verifica que `npm run build` se ejecutó en los logs
2. Asegúrate que `APP_URL` apunte a tu dominio de Railway
3. Revisa que la carpeta `public/build` no esté en .gitignore

### "Too Many Redirects"
1. Agrega esta variable de entorno:
   ```
   FORCE_HTTPS=true
   ```
2. O agrega en `config/app.php`: force HTTPS

---

## 🎉 ¡Felicidades!

Tu aplicación está en producción con:
- ✅ Dominio HTTPS gratuito
- ✅ Base de datos MySQL
- ✅ Deploy automático desde Git
- ✅ Panel de administración Filament
- ✅ Monitoreo y logs en vivo

**URL Admin:** `https://tu-app.up.railway.app/admin`

---

## 📚 Recursos Adicionales

- [Documentación de Railway](https://docs.railway.app)
- [Railway Discord](https://discord.gg/railway)
- [Laravel Deployment Docs](https://laravel.com/docs/deployment)
- [Filament Docs](https://filamentphp.com/docs)

---

¿Problemas? Revisa los logs en Railway o consulta la documentación oficial.
