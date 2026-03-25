@echo off
REM Bac Plus - Start Script for Windows

echo.
echo =====================================
echo   Starting Bac Plus...
echo =====================================
echo.

echo Starting Vite dev server...
start cmd /k "npm run dev"

timeout /t 3 /nobreak

echo Starting Laravel server...
start cmd /k "php artisan serve"

timeout /t 2 /nobreak

echo.
echo [OK] Both servers are running!
echo.
echo Vite dev server: http://localhost:5173
echo Laravel server: http://localhost:8000
echo.
echo Close the terminal windows to stop the servers.
echo.
pause
