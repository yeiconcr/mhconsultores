# MH Consultores - Ingeniería y Calidad Industrial

> Sitio web profesional para consultoría en sistemas de gestión de calidad, mejora continua y optimización de procesos industriales.

[![Laravel](https://img.shields.io/badge/Laravel-12.x-FF2D20?style=flat&logo=laravel&logoColor=white)](https://laravel.com)
[![Filament](https://img.shields.io/badge/Filament-3.x-FDAE4B?style=flat&logo=laravel&logoColor=white)](https://filamentphp.com)
[![MySQL](https://img.shields.io/badge/MySQL-8.0-4479A1?style=flat&logo=mysql&logoColor=white)](https://www.mysql.com)

## 🚀 Instalación Rápida

### Requisitos

- PHP 8.4 o superior
- Composer
- Node.js & npm
- MySQL 5.7+ o MariaDB 10.4+

### Pasos

1. **Clonar el repositorio**
   ```bash
   git clone https://github.com/tuusuario/mhconsultores.git
   cd mhconsultores
   ```

2. **Configurar MySQL**
   ```bash
   # Crear base de datos
   mysql -u root -p -e "CREATE DATABASE ingenieria_calidad CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;"
   ```

3. **Configurar archivo .env**
   ```bash
   # El script setup lo crea automáticamente, pero puedes ajustar:
   # DB_DATABASE=ingenieria_calidad
   # DB_USERNAME=root
   # DB_PASSWORD=tu_password
   ```

4. **Ejecutar instalación automática** ✨
   ```bash
   composer setup
   ```

5. **Iniciar el servidor**
   ```bash
   php artisan serve
   ```

6. **Abrir en el navegador**
   - Homepage: http://localhost:8000
   - Panel Admin: http://localhost:8000/admin

---

## 📋 ¿Qué hace `composer setup`?

El comando ejecuta automáticamente:

1. ✅ Instala dependencias de Composer
2. ✅ Crea archivo `.env` desde `.env.example`
3. ✅ Genera la clave de aplicación (`APP_KEY`)
4. ✅ Ejecuta migraciones de la base de datos
5. ✅ Carga datos iniciales (seeders):
   - Usuario administrador
   - 6 servicios precargados
   - 15 configuraciones del sitio
   - Mensajes de contacto de ejemplo
6. ✅ Instala dependencias de Node.js
7. ✅ Compila assets CSS/JS con Vite
8. ✅ Limpia cachés de Laravel

**Resultado:** Proyecto completamente funcional en ~2 minutos.

---

## 🔑 Credenciales de Acceso

**Panel de Administración:** http://localhost:8000/admin

- **Email:** admin@mhconsultores.com
- **Password:** `MHConsultores2026!`

> ⚠️ **Importante:** Cambia la contraseña después del primer login.

---

## 🎯 Funcionalidades

### Público
- ✅ Homepage con hero section dinámico
- ✅ Sección "Nosotros"
- ✅ Listado de servicios
- ✅ Formulario de contacto
- ✅ Newsletter subscription
- ✅ Botón flotante de WhatsApp

### Panel de Administración (Filament)
- ✅ **Servicios:** CRUD completo con categorías
- ✅ **Configuraciones del Sitio:** Edición de textos, estadísticas, contacto
- ✅ **Mensajes de Contacto:** Gestión de consultas
- ✅ **Suscriptores:** Gestión de newsletter

---

## 🛠️ Desarrollo

### Modo desarrollo
```bash
npm run dev        # Vite en modo watch
php artisan serve  # Servidor Laravel
```

### Compilar para producción
```bash
npm run build
```

### Resetear base de datos
```bash
php artisan migrate:fresh --seed
```

### Limpiar cachés
```bash
php artisan optimize:clear
```

---

## 📦 Stack Tecnológico

- **Backend:** Laravel 12
- **Frontend:** Tailwind CSS + Alpine.js
- **Panel Admin:** Filament 3
- **Base de datos:** MySQL / MariaDB
- **Build:** Vite 5

---

## 📚 Documentación Adicional

- [Guía Rápida](GUIA-RAPIDA.md) - Comandos esenciales
- [Documentación Completa](DOCUMENTACION-COMPLETA.md) - Arquitectura detallada
- [Roadmap](ROADMAP-PROXIMOS-PASOS.md) - Próximas funcionalidades

---

## 🤝 Soporte

Para preguntas o soporte, contacta a:
- Email: contacto@mhconsultores.com
- WhatsApp: +57 300 123 4567

---

## 📄 Licencia

Este proyecto es privado y confidencial.

---

**Última actualización:** Enero 11, 2026
