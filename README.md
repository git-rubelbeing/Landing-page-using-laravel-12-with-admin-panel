# Laravel 12 Landing Page Template with Subscription Form

This repository now includes a **production-ready landing page template** structure for Laravel 12 with:

- Responsive Tailwind CSS UI
- Smooth reveal and floating animations
- Newsletter subscription form (validated + persisted)
- Anti-spam honeypot field
- Rate-limited subscription endpoint

## Included Files

- `routes/web.php` — Landing and subscribe routes
- `app/Http/Controllers/LandingPageController.php` — Page + form handlers
- `app/Http/Requests/StoreSubscriberRequest.php` — Validation rules and messages
- `app/Models/Subscriber.php` — Eloquent model
- `database/migrations/2026_02_05_000000_create_subscribers_table.php` — Subscribers table
- `resources/views/layouts/app.blade.php` — Shared layout and Tailwind/animation config
- `resources/views/landing.blade.php` — Full landing page and subscription form UI

## How to Use in a Laravel 12 App

1. Copy these files into your Laravel 12 project.
2. Run migrations:

```bash
php artisan migrate
```

3. Start your app:

```bash
php artisan serve
```

4. Open `http://127.0.0.1:8000`.

## Subscription Flow

- POST `/subscribe`
- Validates email format + uniqueness
- Blocks bot submissions via hidden `website` field
- Stores subscriber email + request metadata (IP, user agent, timestamp)
- Shows success/error messages in the landing page
