# superheroes

CRUD de superhéroes con nombre real, alias, URL de fotografía e información adicional. Laravel 7 y SQLite.

## Instalación

Instalar dependencias con `composer install`, copiar `.env.example` a `.env` y configurar la ruta SQLite. Ejecutar `php artisan key:generate`, `php artisan migrate --seed` y `php artisan serve`.

El proyecto permite registrar, consultar, editar y eliminar superhéroes. Las entradas se validan en el servidor y los formularios incluyen CSRF. Los diez personajes de demostración son ficticios; sus retratos se obtienen de DiceBear Bottts (CC0).
