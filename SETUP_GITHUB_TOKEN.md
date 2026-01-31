# Guía Rápida: Configurar Token de GitHub

## 🎯 Objetivo
Configurar la autenticación de Git con GitHub usando un Personal Access Token (PAT) para poder hacer push de cambios.

## ✅ Pasos

### 1. Crear el Token en GitHub
1. Ir a: https://github.com/settings/tokens/new
2. Iniciar sesión si es necesario
3. Llenar el formulario:
   - **Note:** `mhconsultores-deploy`
   - **Expiration:** `90 días` (o lo que prefieras)
   - **Select scopes:** Marcar solo ✅ **repo**
4. Click en **"Generate token"**
5. **¡COPIAR EL TOKEN INMEDIATAMENTE!** (no se puede ver después)

### 2. Configurar Git (automático)

Una vez que tengas el token, ejecuta:

```bash
bash setup-git-auth.sh
```

O manualmente:

```bash
# Reemplaza YOUR_TOKEN con tu token real
git remote set-url origin https://YOUR_TOKEN@github.com/yeiconcr/mhconsultores.git
git config --global credential.helper store
git push origin main
```

## 📝 Nota

Esto solo se hace **UNA VEZ**. Después Git recordará el token automáticamente y nunca más tendrás problemas de autenticación.
