# 🐾 API de Personas y Mascotas - Laravel 12

Este proyecto es una API RESTful construida con Laravel 12 que permite gestionar personas y sus mascotas, con autenticación JWT y consulta de datos desde una API externa como TheDogAPI.

## 🚀 Características

- ✅ Registro e inicio de sesión con JWT
- 🔒 Middleware para proteger rutas privadas
- 👤 CRUD de Personas
- 🐶 CRUD de Mascotas
- 📦 Relación Persona 1:N Mascotas
- 🔍 Consulta avanzada: Persona con sus mascotas
- 🌐 Integración con API externa para obtener información de razas e imágenes
- 🧪 Migraciones, seeders y factories incluidos
- 📘 Validaciones con Form Requests
- 🧩 Laravel API Resources para respuestas camelCase
- ⚠️ Manejo de errores global con mensajes claros

---
# Ejecutar Docker para la base de datos
docker compose up -d 

## 📦 Instalación

# Instalar dependencias
composer install

# Copiar archivo de entorno
cp .env.example .env


# Configurar base de datos en .env  si se utiliza docker
- DB_CONNECTION = mysql
- DB_HOST=127.0.0.1
- DB_PORT=3306
- DB_DATABASE=pets
- DB_USERNAME=root
- DB_PASSWORD=secret

# Correr migraciones y seeders
php artisan migrate --seed
