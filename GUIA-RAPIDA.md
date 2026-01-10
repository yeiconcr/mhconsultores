# ⚡ GUÍA RÁPIDA - Ingeniería y Calidad Industrial

**Documento de referencia rápida para uso diario**

---

## 🚀 Comandos Esenciales

### Iniciar el proyecto:
```bash
# 1. Abrir CMD y navegar a la carpeta
cd C:\Users\YEISON CONSTAIN\Desktop\ingenieria-calidad

# 2. Iniciar servidor Laravel
php artisan serve

# 3. Abrir navegador en:
http://localhost:8000
```

### Si haces cambios en CSS:
```bash
npm run build
```

### Si quieres resetear la base de datos:
```bash
php artisan migrate:fresh --seed
```

---

## 📁 Archivos Importantes

### Para editar textos de la página:
- **Homepage:** `resources/views/pages/home/index.blade.php`
- **Navbar/Footer:** `resources/views/layouts/app.blade.php`

### Para editar estilos:
- **CSS principal:** `resources/css/app.css`
- **Colores:** `tailwind.config.js`

### Para editar servicios (código):
- **Datos:** `database/seeders/ServiceSeeder.php`
- **Modelo:** `app/Models/Service.php`

### Configuración:
- **Base de datos, WhatsApp, etc.:** `.env`

---

## 🎨 Colores del Proyecto

```
Azul Primario:  #1E40AF  (Botones, navbar, enlaces)
Verde Éxito:    #059669  (Checks, estados positivos)
Naranja Acento: #EA580C  (CTAs importantes)
```

---

## 🗂️ URLs Disponibles

- `/` → Página de inicio
- `/nosotros` → About / Nosotros
- `/servicios` → Listado de servicios (pendiente)
- `/portfolio` → Portfolio (pendiente)
- `/blog` → Blog (pendiente)
- `/contacto` → Contacto (pendiente)

---

## 🔧 Solución Rápida de Problemas

### El sitio no carga:
```bash
php artisan serve
```

### Cambios en CSS no se ven:
```bash
npm run build
# Luego Ctrl+F5 en el navegador
```

### Error de base de datos:
```bash
# Verificar que MySQL esté corriendo en XAMPP
# Luego:
php artisan migrate:fresh --seed
```

### Limpiar todo:
```bash
php artisan optimize:clear
```

---

## 📊 Estado Actual

✅ **Funcionando:**
- Homepage
- Página "Nosotros"
- Base de datos (12 tablas)
- 6 servicios cargados
- Diseño responsive

⚠️ **Pendiente:**
- Panel de administración
- Páginas de servicios, portfolio, blog
- Formulario de contacto
- Sistema de citas

---

## 📞 Información de Contacto (Modificar en .env)

```env
WHATSAPP_NUMBER="+573001234567"
```

**Para cambiar el número de WhatsApp:**
1. Editar `.env`
2. Cambiar `WHATSAPP_NUMBER`
3. Reiniciar servidor

---

## 💾 Backup Rápido

**Antes de hacer cambios importantes:**

```bash
# Exportar base de datos desde phpMyAdmin
# O copiar toda la carpeta del proyecto
```

---

## 📚 Documentación Completa

Ver: `DOCUMENTACION-COMPLETA.md` para información detallada.

---

**Última actualización:** Enero 9, 2026
