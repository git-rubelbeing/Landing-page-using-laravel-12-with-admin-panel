<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'LaunchPro — Grow Faster')</title>
    <meta name="description" content="A modern Laravel 12 landing page template with a production-ready subscription flow.">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Inter', 'ui-sans-serif', 'system-ui'],
                    },
                    keyframes: {
                        float: {
                            '0%, 100%': { transform: 'translateY(0)' },
                            '50%': { transform: 'translateY(-8px)' },
                        },
                        pulseGlow: {
                            '0%, 100%': { boxShadow: '0 0 0 0 rgba(99,102,241,0.6)' },
                            '70%': { boxShadow: '0 0 0 15px rgba(99,102,241,0)' },
                        },
                    },
                    animation: {
                        float: 'float 6s ease-in-out infinite',
                        pulseGlow: 'pulseGlow 2.4s infinite',
                    },
                },
            },
        }
    </script>
    <style>
        .reveal {
            opacity: 0;
            transform: translateY(18px);
            transition: opacity .7s ease, transform .7s ease;
        }

        .reveal.show {
            opacity: 1;
            transform: translateY(0);
        }
    </style>
</head>
<body class="bg-slate-950 text-slate-100 antialiased">
    @yield('content')
    @yield('scripts')
</body>
</html>
