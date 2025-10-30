<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>BK2025 — Login</title>
    @vite(['resources/css/app.css','resources/js/app.js'])
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@500;700&family=Rubik:wght@400;500&display=swap" rel="stylesheet">
    <link rel="icon" type="image/png" href="{{ asset('images/favicon.png') }}">
    <style>
        .font-display { font-family: 'Orbitron', sans-serif; }
        .font-body    { font-family: 'Rubik', sans-serif; }
    </style>
</head>
<body class="font-body min-h-dvh text-slate-100 antialiased relative">
    <div class="fixed inset-0 bg-[radial-gradient(65%_70%_at_20%_0%,rgba(168,85,247,0.25),transparent_60%),radial-gradient(70%_60%_at_100%_10%,rgba(147,51,234,0.2),transparent_60%),linear-gradient(180deg,#0a0211,40%,#0e0319,75%,#06010d)]"></div>
    <div class="fixed inset-0 bg-black/40 backdrop-blur-[2px]"></div>
    <div class="relative flex flex-col md:flex-row min-h-dvh">
        <div class="flex flex-col justify-center items-center text-center px-6 py-10 md:w-1/2 md:px-10 lg:px-16">
            <div class="max-w-md mx-auto">
                <img src="{{ asset('images/logo.png') }}" alt="BK2025" class="w-52 sm:w-64 md:w-72 drop-shadow-[0_0_35px_rgba(251,191,36,.5)] mx-auto"/>
                <h1 class="font-display text-3xl sm:text-4xl md:text-5xl font-bold text-white tracking-tight mt-8">BK2025</h1>
                <p class="mt-4 text-base sm:text-lg md:text-xl text-slate-300 leading-relaxed">High-stakes. High energy.</p>
                <p class="text-amber-300 text-base sm:text-lg md:text-xl font-semibold mt-1">All in, every round.</p>
                <p class="mt-6 text-[12px] sm:text-sm text-slate-500 max-w-sm mx-auto">Secure login. Encrypted sessions. Anti-cheat systems active.</p>
                <div class="hidden md:block mt-8 rounded-2xl border border-white/10 bg-white/5 backdrop-blur-xl shadow-[0_30px_80px_rgba(0,0,0,.7)] p-4">
                    <p class="text-[12px] leading-relaxed text-slate-300">“BK2025 Arena” is for authorized players only. By continuing, you agree to monitoring and fair play enforcement.</p>
                </div>
            </div>
        </div>
        <div class="flex flex-col justify-center px-4 py-10 md:w-1/2 md:px-8 lg:px-12">
            <div class="w-full max-w-md mx-auto">
                <div class="mb-6 text-center md:hidden">
                    <p class="text-sm text-slate-400">Welcome back — sign in to continue</p>
                </div>
                @if (session('status'))
                    <div class="mb-4 rounded-xl border border-amber-400/30 bg-black/40 px-4 py-3 text-sm text-amber-200">{{ session('status') }}</div>
                @endif
                @error('login')
                    <div class="mb-4 rounded-xl border border-rose-500/40 bg-rose-900/30 px-4 py-3 text-sm text-rose-200">{{ $message }}</div>
                @enderror
                @if ($errors->any() && !$errors->has('login'))
                    <div class="mb-4 rounded-xl border border-rose-500/40 bg-rose-900/30 px-4 py-3 text-sm text-rose-200">
                        <ul class="list-disc pl-5 space-y-1">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="rounded-2xl border border-white/10 bg-white/5 backdrop-blur-xl shadow-[0_20px_50px_rgba(0,0,0,.45)]">
                    <form method="POST" action="{{ route('login') }}" class="p-6 space-y-4">
                        @csrf
                        <div>
                            <label for="username" class="block text-xs font-semibold text-slate-300 mb-1">Username</label>
                            <input id="username" name="username" type="text" value="{{ old('username') }}" autocomplete="username" required autofocus class="w-full rounded-xl bg-black/40 border border-white/10 px-3 py-2.5 text-slate-100 placeholder:text-slate-500 focus:outline-none focus:ring-2 focus:ring-amber-400" placeholder="Username"/>
                        </div>
                        <div x-data="{ show:false }">
                            <label for="password" class="block text-xs font-semibold text-slate-300 mb-1">Password</label>
                            <div class="relative">
                                <input :type="show ? 'text' : 'password'" id="password" name="password" autocomplete="current-password" required class="w-full rounded-xl bg-black/40 border border-white/10 px-3 py-2.5 pr-10 text-slate-100 placeholder:text-slate-500 focus:outline-none focus:ring-2 focus:ring-amber-400" placeholder="••••••••"/>
                                <button type="button" class="absolute inset-y-0 right-0 px-3 text-slate-400 hover:text-slate-200" @click="show = !show" aria-label="Toggle password visibility">
                                    <i class="fa-regular" :class="show ? 'fa-eye-slash' : 'fa-eye'"></i>
                                </button>
                            </div>
                        </div>
                        <div class="flex items-center justify-between pt-1">
                            <label class="inline-flex items-center gap-2 select-none">
                                <input type="checkbox" name="remember" class="h-4 w-4 rounded border-slate-600 text-amber-500 focus:ring-amber-400"/>
                                <span class="text-xs text-slate-300">Stay signed in</span>
                            </label>
                        </div>
                        <button type="submit" class="mt-2 inline-flex w-full items-center justify-center rounded-xl bg-gradient-to-r from-amber-400 to-orange-500 text-black px-4 py-2.5 text-sm font-extrabold shadow-[0_0_30px_rgba(251,191,36,.35)] hover:brightness-110 focus:outline-none focus:ring-2 focus:ring-amber-400/70">Sign In</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @include('components.notifications')

</body>
</html>
