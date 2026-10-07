# superheroes

CRUD de superhéroes en Laravel 7 con nombre real, alias, fotografía e información adicional.

## Actividad 10

Las fotografías se cargan como JPG, PNG o WebP de hasta 4 MB. Se guarda su ruta relativa en `photo_path`, dentro del disco `public`, que usa `storage/app/public/superheroes`. El formulario ya no acepta URLs externas. La columna `photo_url` permanece vacía únicamente por compatibilidad con la migración inicial.

El modelo implementa SoftDeletes. El índice muestra registros activos; la papelera muestra solo eliminados y permite restaurarlos. `deleted_at` distingue ambos estados. No hay borrado físico de registros ni de archivos, incluso cuando se reemplaza una fotografía.

## Instalación

```powershell
composer install
Copy-Item .env.example .env
New-Item database/database.sqlite -ItemType File
php artisan key:generate
php artisan migrate --seed
php artisan storage:link
php artisan serve
```

Configurar `DB_CONNECTION=sqlite` y `DB_DATABASE` con la ruta absoluta al archivo. Para una base existente de Actividad 8, ejecutar `php artisan migrate` y `php artisan photos:import` para los diez retratos de demostración antes de abrir el índice. El importador utiliza archivos incluidos y conserva los registros.

Diez personajes ficticios y retratos DiceBear Bottts CC0 se incluyen como datos de prueba. Las pruebas de `php artisan test` verifican altas, cambios, validación de imágenes, eliminación lógica, restauración y conservación de archivos. No publicar `.env`, la base local ni archivos subidos por usuarios.
