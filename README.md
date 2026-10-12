# TugasWeb-P10-BlogCRUD

## Cara pakai
```bash
composer create-project laravel/laravel TugasWeb-P10-BlogCRUD
# salin isi folder ini (routes, app, database, resources) ke project, timpa jika ditanya
cd TugasWeb-P10-BlogCRUD
# atur DB di .env (default Laravel baru: sqlite)
php artisan migrate --seed
php artisan storage:link
php artisan serve
```
Buka http://127.0.0.1:8000/posts

## Checklist
1. Route::resource('posts') + named routes -> routes/web.php
2. PostController resource (7 method) -> app/Http/Controllers/PostController.php
3. Layout master (@extends/@yield) -> resources/views/layouts/app.blade.php
4. 2 component (Alert, Card) -> resources/views/components/
5. Validasi + error per field + old input -> posts/_form.blade.php
6. Flash message sukses/gagal -> controller + <x-alert>
7. @csrf semua form + @method PUT/DELETE -> create/edit/card
8. Route Model Binding + pagination -> Post $post, paginate(6)
Bonus: pencarian, soft delete, upload gambar
