# Fundamentos de PHP 8.5, Arquitectura Web y Laravel 13

Repositorio práctico de aprendizaje progresivo de **PHP moderno (v8.5)** y **Laravel (v13)**. Su objetivo es documentar la transición desde los fundamentos del lenguaje hasta la construcción de APIs RESTful aplicando estándares profesionales (**tipado estricto, PSR-4, POO moderna, PDO con SQLite y Eloquent ORM**), prescindiendo de entornos heredados como XAMPP en favor de herramientas nativas de línea de comandos (**Laravel Herd**, **Composer** y el servidor CLI de PHP).

---

## Inicio rápido

1. **Verificar requisitos del entorno** (PHP 8.4+ / 8.5 y Composer 2+):
   ```bash
   php -v
   composer -V
   ```
2. **Ejecutar scripts de fundamentos y POO** (carpetas `01` a `07`):
   ```bash
   php 06-oop-basics/ExampleModern.php
   ```
3. **Levantar la API REST en PHP puro con SQLite** (`09-api-products`):
   ```bash
   cd 09-api-products
   composer dump-autoload
   php -S localhost:8000 -t public
   ```
4. **Levantar la API de catálogo en Laravel 13** (`10-laravel-catalog-api`):
   ```bash
   cd 10-laravel-catalog-api
   composer install
   php artisan migrate
   php artisan serve
   ```

---

## Estructura del repositorio

| Módulo | Enfoque principal | Conceptos y herramientas clave |
| :--- | :--- | :--- |
| `01-basic-sintax` | Sintaxis base y tipado | `declare(strict_types=1)`, variables, constantes, tipos escalares y coerción. |
| `02-flow-control` | Control de flujo | Condicionales (`if`, `switch`, `match`), igualdad estricta (`===`) y bucles (`for`, `while`, `foreach`). |
| `03-arrays-basics` | Estructuras de datos | Arrays indexados y asociativos, desestructuración `clave => valor`, `usort` (`<=>`), `array_column` y `array_find`. |
| `04-error-handling-basics` | Manejo de errores | Bloques `try / catch / finally`, jerarquía `Throwable` / `Exception` y validación con `InvalidArgumentException`. |
| `05-functions-basics` | Funciones | Tipado de parámetros y retornos, *named arguments*, *arrow functions* (`fn() =>`) y alcance de variables. |
| `06-oop-basics` | Programación Orientada a Objetos | Clases, visibilidad, *Constructor Property Promotion*, `readonly`, *Property Hooks* (PHP 8.4+), herencia, clases abstractas e interfaces. |
| `07-composer` | Gestión de dependencias | Configuración de `composer.json`, instalación desde Packagist y carga automática de clases bajo el estándar **PSR-4**. |
| `08-api-basics` | Protocolo HTTP en PHP | Superglobales (`$_SERVER`, `$_GET`), lectura de cuerpo JSON (`php://input`), cabeceras HTTP y banderas de `json_encode`. |
| `09-api-products` | API REST en PHP puro | Arquitectura *Front Controller* (`public/index.php`), ruteo limpio sin `.htaccess`, patrón *Active Record* y persistencia con **PDO + SQLite**. |
| `10-laravel-catalog-api` | Framework Laravel 13 | Migraciones, modelos **Eloquent**, `Route::apiResource`, *Implicit Route Model Binding* y validación de peticiones (`Request`). |

---

## Decisiones de arquitectura y stack

| Área | Decisión adoptada | Justificación técnica |
| :--- | :--- | :--- |
| **Entorno de ejecución** | **Laravel Herd + PHP CLI** en lugar de XAMPP | Desacopla el código fuente de carpetas globales (`htdocs`) y permite ejecutar cada módulo directamente desde la terminal. |
| **Tipado** | `declare(strict_types=1)` en todos los módulos | Previene la coerción silenciosa de tipos en llamadas a funciones y métodos, garantizando contratos predecibles. |
| **Encapsulamiento POO** | *Property Hooks* (`set`) y propiedades `readonly` | Reemplaza métodos *getters/setters* repetitivos por validaciones de dominio integradas directamente en las propiedades del modelo. |
| **Seguridad Web (`09` y `10`)** | Aislamiento del *Document Root* en `public/` | Expone únicamente `public/index.php` al servidor HTTP, manteniendo la lógica (`src/` o `app/`), configuración y base de datos SQLite fuera del alcance público. |
| **Acceso a datos** | Consultas preparadas (**PDO** / **Eloquent**) | Uso estricto de *Prepared Statements* (`prepare` + `execute`) para mitigar vulnerabilidades de inyección SQL. |

---

## Lista de verificación

- [x] Entorno configurado con PHP 8.5, Composer 2 y Laravel Installer.
- [x] Módulos de fundamentos y POO moderna (`01` a `06`) verificados por CLI.
- [x] Autoloading PSR-4 operativo con Composer (`07` y `09`).
- [x] CRUD REST completo en PHP nativo con PDO y SQLite (`09-api-products`).
- [x] CRUD REST completo en Laravel 13 con Eloquent y migraciones (`10-laravel-catalog-api`).
