@echo off
:: Step 1: Install dependencies using Composer
echo Installing dependencies using Composer...
composer install

:: Step 2: Run Yii application
echo Running Yii application...
php yii serve

pause
