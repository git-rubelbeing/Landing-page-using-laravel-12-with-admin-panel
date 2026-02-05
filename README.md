# Landing Page in Laravel 12 with Admin Panel

This guide shows how to build a simple **public landing page** and a protected **admin panel** in Laravel 12.

## 1) Create Project

```bash
composer create-project laravel/laravel landing-page-admin
cd landing-page-admin
```

## 2) Configure Database

Update `.env`:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=landing_admin
DB_USERNAME=root
DB_PASSWORD=
```

Then run:

```bash
php artisan migrate
```

## 3) Install Authentication Scaffolding

Use Laravel Breeze for login/register:

```bash
composer require laravel/breeze --dev
php artisan breeze:install
npm install
npm run build
php artisan migrate
```

## 4) Add Admin Flag to Users

Create migration:

```bash
php artisan make:migration add_is_admin_to_users_table --table=users
```

Migration content:

```php
Schema::table('users', function (Blueprint $table) {
    $table->boolean('is_admin')->default(false)->after('password');
});
```

Run:

```bash
php artisan migrate
```

## 5) Create Admin Middleware

```bash
php artisan make:middleware AdminMiddleware
```

`app/Http/Middleware/AdminMiddleware.php`:

```php
public function handle(Request $request, Closure $next): Response
{
    if (!auth()->check() || !auth()->user()->is_admin) {
        abort(403, 'Unauthorized');
    }

    return $next($request);
}
```

Register middleware alias in `bootstrap/app.php` (Laravel 11/12 style):

```php
->withMiddleware(function (Middleware $middleware) {
    $middleware->alias([
        'admin' => \App\Http\Middleware\AdminMiddleware::class,
    ]);
})
```

## 6) Create Landing and Admin Routes

In `routes/web.php`:

```php
use App\Http\Controllers\LandingController;
use App\Http\Controllers\Admin\DashboardController;

Route::get('/', [LandingController::class, 'index'])->name('landing');

Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
});
```

## 7) Create Controllers

```bash
php artisan make:controller LandingController
php artisan make:controller Admin/DashboardController
```

`app/Http/Controllers/LandingController.php`:

```php
public function index()
{
    return view('landing');
}
```

`app/Http/Controllers/Admin/DashboardController.php`:

```php
public function index()
{
    return view('admin.dashboard');
}
```

## 8) Create Views

`resources/views/landing.blade.php` (public page):

```blade
<x-guest-layout>
    <section class="max-w-4xl mx-auto py-20 px-6 text-center">
        <h1 class="text-4xl font-bold mb-4">Welcome to Our Product</h1>
        <p class="text-lg text-gray-600 mb-8">Fast, modern, and built with Laravel 12.</p>
        <a href="{{ route('register') }}" class="px-6 py-3 bg-indigo-600 text-white rounded-lg">Get Started</a>
    </section>
</x-guest-layout>
```

`resources/views/admin/dashboard.blade.php`:

```blade
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Admin Dashboard</h2>
    </x-slot>

    <div class="py-10 max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="p-6 bg-white shadow rounded-lg">
            You are logged in as admin.
        </div>
    </div>
</x-app-layout>
```

## 9) Seed an Admin User

```bash
php artisan make:seeder AdminUserSeeder
```

In seeder:

```php
User::updateOrCreate(
    ['email' => 'admin@example.com'],
    [
        'name' => 'Admin',
        'password' => Hash::make('password'),
        'is_admin' => true,
    ]
);
```

Run:

```bash
php artisan db:seed --class=AdminUserSeeder
```

## 10) Run App

```bash
php artisan serve
```

- Landing page: `http://127.0.0.1:8000/`
- Admin panel: `http://127.0.0.1:8000/admin/dashboard`

## Optional Improvements

- Add role/permission package (e.g., Spatie Laravel Permission) for multiple admin roles.
- Use a dedicated admin layout and sidebar navigation.
- Add analytics/contact submissions to manage from admin dashboard.
- Protect admin area with email verification + 2FA.
