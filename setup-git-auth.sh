#!/bin/bash
# Script para configurar Git con el Personal Access Token

echo "🔧 Configurando autenticación de Git con GitHub..."
echo ""
echo "Por favor, pega tu Personal Access Token de GitHub:"
read -s TOKEN

if [ -z "$TOKEN" ]; then
    echo "❌ Error: No se proporcionó ningún token"
    exit 1
fi

# Configurar el remote con el token
git remote set-url origin https://${TOKEN}@github.com/yeiconcr/mhconsultores.git

# Guardar credenciales para futuros push
git config --global credential.helper store

# Hacer un push de prueba
echo ""
echo "📤 Haciendo push de los cambios..."
git push origin main

if [ $? -eq 0 ]; then
    echo ""
    echo "✅ ¡Éxito! Git está configurado correctamente."
    echo "   Los cambios se subieron a GitHub."
    echo ""
    echo "   Las credenciales se guardaron automáticamente."
    echo "   No necesitarás volver a ingresar el token."
else
    echo ""
    echo "❌ Error al hacer push. Verifica el token."
fi
