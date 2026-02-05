@extends('layouts.app')

@section('title', 'LaunchPro — Landing Page Template')

@section('content')
    <header class="sticky top-0 z-40 backdrop-blur border-b border-white/10 bg-slate-950/80">
        <div class="mx-auto max-w-7xl px-6 py-4 flex items-center justify-between">
            <a href="#" class="text-lg font-bold tracking-tight">Launch<span class="text-indigo-400">Pro</span></a>
            <a href="#subscribe" class="hidden sm:inline-flex rounded-full bg-indigo-500 px-5 py-2 text-sm font-semibold text-white hover:bg-indigo-400 transition">Join Waitlist</a>
        </div>
    </header>

    <main>
        <section class="relative overflow-hidden">
            <div class="absolute -top-24 -left-20 h-80 w-80 rounded-full bg-indigo-600/20 blur-3xl"></div>
            <div class="absolute -bottom-20 -right-10 h-72 w-72 rounded-full bg-cyan-500/20 blur-3xl"></div>

            <div class="mx-auto max-w-7xl px-6 py-24 lg:py-32 grid gap-12 lg:grid-cols-2 items-center">
                <div class="space-y-8 reveal">
                    <span class="inline-flex items-center gap-2 rounded-full border border-indigo-400/40 bg-indigo-400/10 px-4 py-1.5 text-xs font-semibold uppercase tracking-wider text-indigo-300">Laravel 12 Template</span>
                    <h1 class="text-4xl sm:text-5xl lg:text-6xl font-extrabold leading-tight">Build, launch, and scale your product faster.</h1>
                    <p class="max-w-xl text-base sm:text-lg text-slate-300">A responsive, conversion-focused landing page starter with smooth animation and a working newsletter subscription flow powered by Laravel.</p>
                    <div class="flex flex-wrap gap-4">
                        <a href="#subscribe" class="rounded-full bg-indigo-500 px-6 py-3 font-semibold text-white hover:bg-indigo-400 transition animate-pulseGlow">Start Free</a>
                        <a href="#features" class="rounded-full border border-white/20 px-6 py-3 font-semibold text-slate-200 hover:border-white/40 transition">See Features</a>
                    </div>
                    <div class="flex items-center gap-8 text-sm text-slate-400">
                        <p>⚡ Fast setup</p>
                        <p>🔒 Secure form</p>
                        <p>📱 Mobile first</p>
                    </div>
                </div>

                <div class="relative reveal lg:justify-self-end">
                    <div class="animate-float rounded-3xl border border-white/10 bg-white/5 p-6 shadow-2xl shadow-indigo-900/30 max-w-md">
                        <p class="text-sm text-indigo-300">Weekly Growth Snapshot</p>
                        <h3 class="mt-2 text-2xl font-bold">+184% subscriber growth</h3>
                        <p class="mt-3 text-slate-300">Teams using LaunchPro templates launch marketing pages in days, not weeks.</p>
                        <div class="mt-6 grid grid-cols-2 gap-3 text-sm">
                            <div class="rounded-xl bg-slate-900/70 p-4 border border-white/10">
                                <p class="text-slate-400">Conversion</p>
                                <p class="mt-1 text-xl font-bold text-emerald-300">12.4%</p>
                            </div>
                            <div class="rounded-xl bg-slate-900/70 p-4 border border-white/10">
                                <p class="text-slate-400">Avg. Load</p>
                                <p class="mt-1 text-xl font-bold text-cyan-300">0.8s</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="features" class="mx-auto max-w-7xl px-6 py-16">
            <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
                @foreach ([
                    ['title' => 'Responsive Design', 'copy' => 'Pixel-perfect experience across desktop, tablet, and mobile devices.'],
                    ['title' => 'Tailwind CSS', 'copy' => 'Utility-first styling for rapid customization and maintainable UI.'],
                    ['title' => 'Animated UI', 'copy' => 'Subtle micro-interactions and reveal effects for better engagement.'],
                ] as $feature)
                    <article class="reveal rounded-2xl border border-white/10 bg-white/5 p-6">
                        <h3 class="text-xl font-semibold">{{ $feature['title'] }}</h3>
                        <p class="mt-2 text-slate-300">{{ $feature['copy'] }}</p>
                    </article>
                @endforeach
            </div>
        </section>

        <section id="subscribe" class="mx-auto max-w-3xl px-6 pb-24 reveal">
            <div class="rounded-3xl border border-white/10 bg-gradient-to-br from-indigo-600/20 to-cyan-500/10 p-8 sm:p-10">
                <h2 class="text-3xl font-bold">Get launch updates</h2>
                <p class="mt-2 text-slate-300">Join our email list for roadmap news, feature drops, and growth playbooks.</p>

                @if (session('success'))
                    <div class="mt-6 rounded-xl border border-emerald-300/40 bg-emerald-400/10 p-4 text-emerald-200">
                        {{ session('success') }}
                    </div>
                @endif

                @if ($errors->any())
                    <div class="mt-6 rounded-xl border border-rose-300/40 bg-rose-400/10 p-4 text-rose-100">
                        <ul class="list-disc list-inside space-y-1">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="POST" action="{{ route('landing.subscribe') }}" class="mt-6 flex flex-col sm:flex-row gap-3">
                    @csrf
                    <label for="email" class="sr-only">Email address</label>
                    <input id="email" name="email" type="email" required autocomplete="email" value="{{ old('email') }}"
                           class="w-full rounded-xl border border-white/20 bg-slate-900/70 px-4 py-3 text-slate-100 placeholder:text-slate-400 focus:border-indigo-400 focus:outline-none focus:ring-2 focus:ring-indigo-500"
                           placeholder="you@company.com">
                    <input type="text" name="website" class="hidden" tabindex="-1" autocomplete="off" aria-hidden="true">
                    <button type="submit" class="rounded-xl bg-white px-5 py-3 font-semibold text-slate-900 hover:bg-slate-200 transition">
                        Subscribe
                    </button>
                </form>
            </div>
        </section>
    </main>

    <footer class="border-t border-white/10 py-8">
        <div class="mx-auto max-w-7xl px-6 text-sm text-slate-400 flex flex-col sm:flex-row justify-between gap-2">
            <p>© {{ now()->year }} LaunchPro. All rights reserved.</p>
            <p>Built with Laravel 12 + Tailwind CSS.</p>
        </div>
    </footer>
@endsection

@section('scripts')
    <script>
        const observer = new IntersectionObserver((entries) => {
            entries.forEach((entry) => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('show');
                }
            });
        }, { threshold: 0.15 });

        document.querySelectorAll('.reveal').forEach((element) => observer.observe(element));
    </script>
@endsection
