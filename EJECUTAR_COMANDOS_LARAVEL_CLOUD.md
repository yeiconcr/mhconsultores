# Guía: Ejecutar Comandos Artisan en Laravel Cloud

## 🎯 Objetivo
Crear el usuario admin en la base de datos de producción de Laravel Cloud ejecutando el comando artisan.

## 📍 Métodos para Ejecutar Comandos

### Método 1: Dashboard de Laravel Cloud (Recomendado)

1. **Acceder al Dashboard**
   - Ve a: https://cloud.laravel.com
   - Inicia sesión si es necesario

2. **Seleccionar tu Proyecto**
   - Busca tu proyecto: `mhconsultores`
   - Click en el proyecto

3. **Encontrar la Consola/Terminal**
   Busca una de estas opciones en el menú lateral:
   - 🔍 "Console" o "Terminal"
   - 🔍 "Commands" o "Artisan"
   - 🔍 "SSH Access"

4. **Ejecutar el Comando**
   Una vez en la consola, ejecuta:
   ```bash
   php artisan admin:reset-password admin@mhconsultores.com --password="MHConsultores2026!"
   ```

---

### Método 2: SSH (Alternativa)

Si Laravel Cloud proporciona acceso SSH:

1. **Obtener Credenciales SSH**
   - En el dashboard, busca "SSH Access" o "SSH Keys"
   - Copia el comando SSH proporcionado

2. **Conectar desde tu Terminal**
   ```bash
   # El comando se verá similar a:
   ssh usuario@mhconsultores-main-ipslny.laravel.cloud
   ```

3. **Ejecutar Comandos**
   ```bash
   php artisan admin:reset-password admin@mhconsultores.com --password="MHConsultores2026!"
   ```

---

### Método 3: Ejecutar Seeder (Si hay interfaz para seeders)

Si Laravel Cloud tiene una interfaz para ejecutar seeders:

1. Busca sección "Database" o "Seeders"
2. Ejecuta: `AdminUserSeeder`

---

## ✅ Verificación

Después de ejecutar el comando deberías ver:
```
✓ Contraseña actualizada exitosamente para: admin@mhconsultores.com
  Nombre: Administrador MH

Puedes iniciar sesión en:
  URL: https://mhconsultores-main-ipslny.laravel.cloud/admin/login
  Email: admin@mhconsultores.com
```

Luego podrás iniciar sesión normalmente.

---

## 📞 Soporte

Si no encuentras cómo ejecutar comandos:
- 📧 Contacta al soporte de Laravel Cloud
- 📚 Consulta: https://cloud.laravel.com/docs
- 💬 O comparte una captura del dashboard para ayudarte a encontrarlo
