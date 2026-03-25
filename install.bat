@echo off
REM Bac Plus - Installation Script for Windows

setlocal enabledelayedexpansion

echo.
echo =====================================
echo   Bac Plus - Installation Script
echo =====================================
echo.

REM Check if .env file exists
if not exist .env (
    echo Step 1/6: Creating .env file...
    copy .env.example .env
    echo [OK] .env file created
    echo.
) else (
    echo Step 1/6: .env file already exists
    echo.
)

REM Install PHP dependencies
echo Step 2/6: Installing PHP dependencies with Composer...
where composer >nul 2>nul
if %ERRORLEVEL% NEQ 0 (
    echo [ERROR] Composer not found. Please install Composer first.
    pause
    exit /b 1
)
composer install
echo [OK] PHP dependencies installed
echo.

REM Generate application key
echo Step 3/6: Generating application key...
php artisan key:generate
echo [OK] Application key generated
echo.

REM Install Node.js dependencies
echo Step 4/6: Installing Node.js dependencies...
where npm >nul 2>nul
if %ERRORLEVEL% NEQ 0 (
    echo [ERROR] NPM not found. Please install Node.js first.
    pause
    exit /b 1
)
npm install
echo [OK] Node.js dependencies installed
echo.

REM Run database migrations
echo Step 5/6: Running database migrations...
php artisan migrate
if %ERRORLEVEL% EQU 0 (
    echo [OK] Database migrations completed
    echo.
) else (
    echo [ERROR] Database migrations failed
    echo Make sure PostgreSQL is running and .env database credentials are correct
    echo.
)

REM Optional: Seed the database
echo Step 6/6: Database seeding (optional)
set /p seed="Do you want to seed the database with test data? (y/n): "
if /i "%seed%"=="y" (
    php artisan db:seed
    echo [OK] Database seeded
    echo.
) else (
    echo Skipping database seeding
    echo.
)

REM Summary
echo.
echo =====================================
echo Installation completed!
echo =====================================
echo.

echo Next steps:
echo 1. Update your .env file with your database credentials if needed
echo 2. Open two terminals:
echo.
echo    Terminal 1 - Start the Vite server:
echo    npm run dev
echo.
echo    Terminal 2 - Start the Laravel server:
echo    php artisan serve
echo.
echo 3. Visit: http://localhost:8000
echo.

echo Useful commands:
echo   php artisan tinker              # Interactive shell
echo   php artisan test                # Run tests
echo   php artisan cache:clear         # Clear cache
echo   php artisan migrate:refresh     # Reset migrations
echo.

pause
