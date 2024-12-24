@echo off
:: Step 1: 使用 MySQL 执行 build.sql 以创建数据库
echo 正在使用 MySQL 执行 build.sql...
mysql -u admin -p test_db < run.sql

:: Step 2: 使用 Composer 安装本项目的依赖项
echo 正在安装依赖项...
composer install

:: Step 3: 使用 PHP 运行 Yii 框架应用
echo 正在启动 Yii 框架应用...
php yii serve

pause