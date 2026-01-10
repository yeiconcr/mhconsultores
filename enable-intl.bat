@echo off
echo Habilitando extension intl en Herd Lite...
echo.

set "phpini=%USERPROFILE%\.config\herd-lite\bin\php.ini"

if not exist "%phpini%" (
    echo ERROR: No se encontro php.ini en %phpini%
    pause
    exit /b 1
)

echo Creando backup...
copy "%phpini%" "%phpini%.backup" >nul
echo Backup creado: %phpini%.backup
echo.

echo Modificando php.ini...
powershell -Command "(Get-Content '%phpini%') -replace ';extension=php_intl.dll', 'extension=php_intl.dll' -replace ';extension=intl', 'extension=intl' | Set-Content '%phpini%'"

echo.
echo *** LISTO! ***
echo.
echo IMPORTANTE: Debes reiniciar Herd Lite:
echo 1. Clic derecho en icono de Herd
echo 2. Stop All
echo 3. Start All
echo.
echo Luego ejecuta: php -m ^| findstr intl
echo.
pause
