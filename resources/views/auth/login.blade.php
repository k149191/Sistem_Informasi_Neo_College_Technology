<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login — NCT Admin Portal</title>
    <link rel="icon" type="image/png" href="{{ asset('img/logo_nct.png') }}">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Syne:wght@600;700;800&family=DM+Sans:wght@400;500;600&display=swap" rel="stylesheet">
    <style>
        :root {
            --neon: #A1D233;
            --neon-glow: rgba(161,210,51,0.18);
            --dark: #0D0F0A;
            --panel: #141610;
            --card: #1A1D14;
            --border: rgba(161,210,51,0.15);
            --text: #E8F0D0;
            --muted: #6B7A55;
        }
        * { box-sizing: border-box; }
        body { font-family: 'DM Sans', sans-serif; background: var(--dark); color: var(--text); }
        input:-webkit-autofill,
        input:-webkit-autofill:hover,
        input:-webkit-autofill:focus {
            -webkit-box-shadow: 0 0 0px 1000px #1A1D14 inset !important;
            -webkit-text-fill-color: #E8F0D0 !important;
            caret-color: #E8F0D0;
        }
        .glow-bg {
            position: fixed;
            width: 500px; height: 500px;
            background: radial-gradient(circle, rgba(161,210,51,0.07) 0%, transparent 70%);
            top: -100px; left: -100px;
            pointer-events: none;
        }
        .glow-bg-2 {
            position: fixed;
            width: 400px; height: 400px;
            background: radial-gradient(circle, rgba(161,210,51,0.05) 0%, transparent 70%);
            bottom: -100px; right: -100px;
            pointer-events: none;
        }
    </style>
</head>
<body class="min-h-screen flex items-center justify-center px-4">
    <div class="glow-bg"></div>
    <div class="glow-bg-2"></div>

    <div class="w-full max-w-sm relative z-10">
        <!-- Logo -->
        <div class="text-center mb-8">
            <div class="w-14 h-14 rounded-2xl mx-auto mb-4 overflow-hidden flex items-center justify-center" style="background:var(--neon-glow); border:1px solid var(--border);">
                <img src="{{ asset('img/logo_nct.png') }}" class="w-full h-full object-cover">
            </div>
            <h1 class="text-2xl font-bold" style="font-family:'Syne',sans-serif; color:var(--neon);">NCT Admin Portal</h1>
            <p class="text-sm mt-1" style="color:var(--muted);">Masuk untuk mengelola konten</p>
        </div>

        <!-- Card -->
        <div class="rounded-2xl p-6 border" style="background:var(--card); border-color:var(--border);">

            <!-- Error -->
            @if($errors->any())
            <div class="mb-5 px-4 py-3 rounded-xl text-sm font-semibold" style="background:rgba(248,113,113,0.1); color:#f87171; border:1px solid rgba(248,113,113,0.2);">
                {{ $errors->first() }}
            </div>
            @endif

            <form action="{{ route('login') }}" method="POST" class="space-y-5">
                @csrf

                <!-- Email -->
                <div>
                    <label class="block text-xs font-bold uppercase tracking-wider mb-2" style="color:var(--muted);">Email</label>
                    <input type="email" name="email" value="{{ old('email') }}" required autofocus
                           class="w-full px-4 py-3 rounded-xl text-sm outline-none transition"
                           style="background:var(--panel); border:1px solid var(--border); color:var(--text);"
                           placeholder="admin@nct-portal.com"
                           onfocus="this.style.borderColor='var(--neon)'"
                           onblur="this.style.borderColor='var(--border)'">
                </div>

                <!-- Password -->
                <div>
                    <label class="block text-xs font-bold uppercase tracking-wider mb-2" style="color:var(--muted);">Password</label>
                    <div class="relative">
                        <input type="password" name="password" id="passwordInput" required
                               class="w-full px-4 py-3 rounded-xl text-sm outline-none transition pr-12"
                               style="background:var(--panel); border:1px solid var(--border); color:var(--text);"
                               placeholder="••••••••"
                               onfocus="this.style.borderColor='var(--neon)'"
                               onblur="this.style.borderColor='var(--border)'">
                        <!-- Toggle show/hide password -->
                        <button type="button" onclick="togglePassword()" class="absolute right-3 top-1/2 -translate-y-1/2 p-1" style="color:var(--muted);">
                            <svg id="eyeIcon" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                            </svg>
                        </button>
                    </div>
                </div>

                <!-- Remember -->
                <div class="flex items-center gap-2">
                    <input type="checkbox" name="remember" id="remember" class="w-4 h-4 rounded accent-[#A1D233]">
                    <label for="remember" class="text-sm" style="color:var(--muted);">Ingat saya</label>
                </div>

                <!-- Submit -->
                <button type="submit"
                        class="w-full py-3 rounded-xl font-bold text-sm transition hover:opacity-90 active:scale-[0.98]"
                        style="background:var(--neon); color:#000;">
                    Masuk ke Dashboard
                </button>
            </form>
        </div>

        <p class="text-center text-xs mt-6" style="color:var(--muted);">
            © 2026 NCT Management Portal
        </p>
    </div>

    <script>
        function togglePassword() {
            const input = document.getElementById('passwordInput');
            input.type = input.type === 'password' ? 'text' : 'password';
        }
    </script>
</body>
</html>