@echo off
echo Habilitando extension zip en XAMPP...
echo.

set "phpini=C:\xampp\php\php.ini"

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
powershell -Command "(Get-Content '%phpini%') -replace ';extension=zip', 'extension=zip' | Set-Content '%phpini%'"

echo.
echo *** LISTO! Extension zip habilitada ***
echo.
pause
