# 🚀 Configuración de Deploy Automático en Laravel Cloud

## ⚠️ PROBLEMA SOLUCIONADO

**Antes:** Cada vez que se hacía un deploy, la base de datos quedaba vacía (sin usuario admin, sin servicios, sin configuraciones).

**Ahora:** Con esta configuración, TODOS los datos iniciales se crearán automáticamente en cada deploy.

---

## 📋 Comandos de Deploy en Laravel Cloud

### Configuración Obligatoria

En Laravel Cloud Dashboard → Tu Proyecto → Entorno (main) → **Settings** → **Deployments**:

Coloca estos comandos en **"Deploy commands"**:

```bash
php artisan migrate --force
php artisan db:seed --force
```

### ¿Qué hace cada comando?

1. **`php artisan migrate --force`**
   - Ejecuta las migraciones sin pedir confirmación
   - Crea o actualiza las tablas de la base de datos

2. **`php artisan db:seed --force`**
   - Ejecuta `DatabaseSeeder.php` que a su vez ejecuta:
     - `AdminUserSeeder` → Crea usuario admin  
<truncated 2450 bytes>
