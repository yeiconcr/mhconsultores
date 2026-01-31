# Gestión de Credenciales - MH Consultores

## 🔑 Credenciales Actuales

### Panel de Administración (Filament)
- **URL:** https://mhconsultores-main-ipslny.laravel.cloud/admin/login
- **Email:** `admin@mhconsultores.com`
- **Contraseña:** `MHConsultores2026!`

> [!WARNING]
> **¡GUARDA ESTAS CREDENCIALES DE FORMA SEGURA!**
> Anota estas credenciales en un gestor de contraseñas como 1Password, LastPass, o Bitwarden.

---

## 🔧 Cómo Resetear la Contraseña

### Método 1: Desde la Interfaz Web (Recomendado)

1. Ve a: https://mhconsultores-main-ipslny.laravel.cloud/admin/login
2. Haz clic en **"¿Olvidaste tu contraseña?"**
3. Ingresa tu email: `admin@mhconsultores.com`
4. Revisa tu correo electrónico
5. Sigue el enlace para restablecer la contraseña

> [!NOTE]
> Este método requiere que el servicio de email esté configurado en producción.

### Método 2: Usando Comando Artisan (Para Emergencias)

Si no tienes acceso al email o necesitas resetear urgentemente:

```bash
# Conectarse al servidor Laravel Cloud via SSH
# Luego ejecutar:

php artisan admin:reset-password
```

El comando te pedirá la nueva contraseña de forma interactiva.

**Opciones del comando:**

```bash
# Resetear contraseña de un email específico
php artisan admin:reset-password usuario@ejemplo.com

# Especificar la contraseña directamente (útil para scripts)
php artisan admin:reset-password --password="NuevaContraseñaSegura123!"

# Resetear para el admin predeterminado
php artisan admin:reset-password admin@mhconsultores.com
```

---

## 🚀 Para Nuevos Deploys en Laravel Cloud

### Antes del Deploy

1. **Verifica tus credenciales actuales** en este documento
2. **Anota cualquier cambio** que planees hacer
3. **Actualiza las variables de entorno** en Laravel Cloud si es necesario

### Después del Deploy

1. Verifica que puedes acceder al panel de admin
2. Si no recuerdas la contraseña:
   - Usa el **Método 1** (recuperación por email)
   - O usa el **Método 2** (comando artisan via SSH)

### Variables de Entorno Importantes

En la configuración de Laravel Cloud, asegúrate de tener:

```env
APP_NAME="Ingeniería y Calidad Industrial"
APP_URL=https://mhconsultores-main-ipslny.laravel.cloud
MAIL_MAILER=smtp
MAIL_HOST=smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=tu_usuario_mailtrap
MAIL_PASSWORD=tu_password_mailtrap
MAIL_FROM_ADDRESS=contacto@ingenieriacalidad.com
```

---

## 👤 Gestión de Usuarios Adicionales

### Crear Nuevo Usuario Admin

```bash
php artisan admin:reset-password nuevo@email.com
```

Esto creará el usuario si no existe, solicitando:
- Nombre del usuario
- Contraseña

### Cambiar Contraseña desde el Panel

Una vez autenticado:
1. Haz clic en tu avatar (esquina superior derecha)
2. Selecciona **"Perfil"**
3. Actualiza tu contraseña
4. Guarda los cambios

---

## 📧 Configuración de Email

### Para Desarrollo Local

Usa **Mailtrap** (gratis):
1. Crea cuenta en [mailtrap.io](https://mailtrap.io)
2. Obtén credenciales SMTP
3. Actualiza `.env` con las credenciales

### Para Producción (Laravel Cloud)

Opciones recomendadas:
- **SendGrid** (100 emails/día gratis)
- **Mailgun** (5,000 emails/mes gratis)
- **Amazon SES** (62,000 emails/mes gratis el primer año)

Configura las variables de entorno en el dashboard de Laravel Cloud.

---

## 🆘 Solución de Problemas

### "No recibo el email de recuperación"

1. Verifica configuración de email en `.env`
2. Revisa la carpeta de spam
3. Usa el comando artisan como alternativa

### "Olvidé mi contraseña y no tengo acceso SSH"

Contacta al soporte de Laravel Cloud para obtener acceso a la consola.

### "¿Cómo cambio las credenciales del seeder?"

Edita el archivo [`database/seeders/AdminUserSeeder.php`](file:///Users/yeiconcr/Desktop/mhconsultores/database/seeders/AdminUserSeeder.php):

```php
User::create([
    'name' => 'Tu Nombre',
    'email' => 'tu@email.com',
    'password' => Hash::make('TuNuevaContraseña'),
]);
```

Luego ejecuta:
```bash
php artisan db:seed --class=AdminUserSeeder
```

---

## 📝 Notas Adicionales

- **Nunca compartas** tus credenciales en Git o código público
- **Cambia la contraseña** regularmente (cada 3-6 meses)
- **Usa contraseñas fuertes** con mayúsculas, minúsculas, números y símbolos
- **Mantén este documento actualizado** cuando cambies credenciales
