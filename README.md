
# 🎯 Proyecto de Gestión de Tareas

Este proyecto permite la gestión de tareas con un sistema de autenticación, indicadores de progreso y un histograma de tareas completadas por semana

---

## 📌 1. Requisitos Previos  
Antes de comenzar, asegúrate de tener instalados:  
- [PHP 8.0+](https://www.php.net/downloads)  
- [Composer](https://getcomposer.org/download/)  
- [Laravel 10+](https://laravel.com/docs/10.x/installation)  
- [SQLite](https://www.sqlite.org/download.html?)  

---

## ⚙️ 2. Instalación del Proyecto  
📌 **Clona el repositorio y accede a la carpeta:**  
```bash
git clone https://github.com/jzamora03/backend
cd backend
```
📌 **Instala las dependencias con Composer**  
```bash
composer install
```

## ⚙️ 3. Configuración
📌 **Crea el archivo .env y configura la conexión a la base de datos, en dado caso que no lo tengas**  
```bash
cp .env.example .env
```
📌 **Modifica .env con tus credenciales de base de datos**  
```bash
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=nombre_de_tu_base
DB_USERNAME=root
DB_PASSWORD=tu_contraseña
```
📌 **Generarla clave de aplicación, si este lo requiere**  
```bash
php artisan key:generate
```

## ⚙️ 4. Configuración de base de datos
📌 **Ejecuta las migraciones para crear las tablas**  
```bash
php artisan migrate
```
📌 **Si deseas datos de prueba, corre los seeders**  
```bash
php artisan db:seed
php artisan migrate:refresh --seed
```

## ⚙️ 5. Levantar el Servidor Local
📌 **Ejecuta Laravel en un servidor local**  
```bash
php artisan serve
```
📌 **Accede a la aplicación en tu navegador**  
```bash
http://127.0.0.1:8000
```


