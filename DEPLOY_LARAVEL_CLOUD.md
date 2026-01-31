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

## 🔒 Comportamiento Idempotente (SEGURO)

**Importante:** Los seeders usan `firstOrCreate`, NO `updateOrCreate`.

### ¿Qué significa esto?

✅ **SI el dato NO existe** → Lo crea  
✅ **SI el dato YA existe** → **NO hace nada** (respeta tus cambios)

### Ejemplo práctico:

```php
// ServiceSeeder.php usa:
Service::firstOrCreate(
    ['slug' => 'implementacion-iso-9001'],  // ← Busca por slug
    [/* datos por defecto */]                // ← Solo usa estos si NO existe
);

// NO usa updateOrCreate porque eso SOBRESCRIBIRÍA tus datos editados
```

### 📊 Garantías:

| Escenario | Comportamiento |
|---|---|
| **Primera vez (BD vacía)** | ✅ Crea todos los datos iniciales |
| **Ya tienes datos** | ✅ NO los modifica, respeta tus cambios |
| **Editaste un servicio** | ✅ Permanece editado, no se sobrescribe |
| **Agregaste nuevos servicios** | ✅ Se conservan, solo agrega los que falten |
| **Borraste un servicio del seeder** | ⚠️ Permanece en tu BD (seeders no borran) |

**Conclusión:** Es 100% seguro ejecutar `php artisan db:seed` en cada deploy. Nunca perderás datos.

### ¿Qué hace cada comando?

1. **`php artisan migrate --force`**
   - Ejecuta las migraciones sin pedir confirmación
   - Crea o actualiza las tablas de la base de datos

2. **`php artisan db:seed --force`**
   - Ejecuta `DatabaseSeeder.php` que a su vez ejecuta:
     - `AdminUserSeeder` → Crea usuario admin
