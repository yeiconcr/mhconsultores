@echo off
echo Cambiando a PHP de XAMPP...
echo.

REM Agregar XAMPP PHP al PATH de esta sesion
set "PATH=C:\xampp\php;%PATH%"

REM Verificar version
echo Verificando PHP...
php -v
echo.

echo Verificando extension intl...
php -m | findstr intl
echo.

echo.
echo *** PHP de XAMPP configurado correctamente! ***
echo.
echo Ahora puedes ejecutar:
echo   composer install
echo.
pause
