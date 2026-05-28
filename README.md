# 📅 Sistema de Gestión de Citas Inteligente

¡Bienvenido! Este es un sistema completo de reserva y gestión de citas diseñado con un enfoque profesional, implementando una arquitectura robusta, separación de responsabilidades y las mejores prácticas en el desarrollo web moderno.

La aplicación permite a los usuarios registrarse, iniciar sesión de forma segura, explorar un catálogo de servicios dinámicos alimentados por base de datos, agendar citas en tiempo real y gestionar su propio historial de reservas desde un panel privado.

---

## 🚀 Características Clave

- **Arquitectura MVC Estricta:** Aislamiento total de la lógica de negocio en controladores dedicados, manteniendo las rutas limpias y legibles.
- **Autenticación Completa y Segura:** Flujo de sesiones (Registro, Login, Perfil) implementado mediante **Laravel Breeze**, protegido rigurosamente con *Middlewares* para asegurar que los usuarios solo accedan a su información.
- **Persistencia Relacional Avanzada:** Uso intensivo de **Eloquent ORM** para modelar relaciones e interactuar con la base de datos de manera eficiente.
- **Interfaz Moderna y Responsiva:** Diseño minimalista y adaptativo (Mobile-First) construido con **Tailwind CSS** y renderizado dinámico mediante el motor de plantillas **Blade**.
- **Seguridad Web Estándar:** Protección nativa contra vulnerabilidades comunes, incluyendo ataques CSRF mediante tokens de validación obligatorios en formularios.

---

## 🛠️ Stack Tecnológico

- **Backend:** Laravel 12 (PHP)
- **Frontend:** Blade Templates, Tailwind CSS, Vite
- **Autenticación:** Laravel Breeze
- **Base de Datos:** SQLite / Eloquent ORM

---

## 📂 Arquitectura y Modelado de Datos

El sistema implementa un diseño relacional donde la tabla de citas actúa como un puente asociativo intermedio, resolviendo indirectamente una relación de **Muchos a Muchos** entre Clientes y Servicios mediante relaciones de pertenencia invertidas (`belongsTo`).

- **User:** Un usuario tiene muchas citas (`hasMany`).
- **Service:** Un servicio puede estar asociado a múltiples citas (`hasMany`).
- **Appointment:** Cada registro actúa como la entidad de unión, almacenando el `user_id`, `service_id`, y meta-datos críticos del negocio como la fecha, hora y el estado de la reserva (`status`).

---

## 💿 Instalación y Configuración Local

Sigue estos pasos para levantar el entorno de desarrollo en tu máquina local:

1. **Clonar el repositorio:**
   ```bash
   git clone [https://github.com/TU_USUARIO/TU_REPOSITORIO.git](https://github.com/TU_USUARIO/TU_REPOSITORIO.git)
   cd nombre-del-proyecto

2. **Instalar dependencias de PHP (Composer):**
    ```bash
    composer install

3. **Instalar dependencias de Frontend (NPM):**
    ```bash
    npm install

4. **Configurar el entorno:**
    ```bash
    composer install

5. **Instalar dependencias de Frontend (NPM):**
    npm install

6. **Configurar el entorno:**
    ```bash
    Copia el archivo de ejemplo y genera la clave de la aplicación:
    cp .env.example .env
    php artisan key:generate

7. **Preparar la Base de Datos:**
    ```bash
    Crea el archivo de SQLite (si usas la configuración por defecto de Laravel 12), ejecuta las migraciones para crear las tablas y corre los seeders para poblar el catálogo de servicios:
    php artisan migrate --seed

8. **Inicia los servidores de desarrollo:**
    ```bash
    Crea el archivo de SQLite (si usas la configuración por defecto de Laravel 11), ejecuta las migraciones para crear las tablas y corre los seeders para poblar el catálogo de servicios:
    php artisan migrate --seed

9. **Inicia los servidores de desarrollo:**
     ```bash
    En una terminal ejecuta el servidor de Laravel: php artisan serve
    En otra terminal de fondo, ejecuta Vite para compilar los assets y estilos en tiempo real:: npm run dev

10. **Abre tu navegador en http://localhost:8000 ¡y listo!**
    
