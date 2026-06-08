<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login — NCT Admin Portal</title>
    <link rel="icon" type="image/png" href="{{ asset('img/logo_nct.png') }}">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        :root {
            --accent: #A1D233;
            --accent-soft: rgba(161, 210, 51, 0.14);
            --bg: #F7F9F3;
            --bg-2: #EEF4E1;
            --card: #FFFFFF;
            --panel: #F4F7EF;
            --border: rgba(13, 15, 10, 0.08);
            --text: #111827;
            --muted: #6B7280;
        }

        * { box-sizing: border-box; }

        body {
            font-family: 'Inter', sans-serif;
            background:
                radial-gradient(circle at top left, rgba(161, 210, 51, 0.16) 0%, transparent 35%),
                radial-gradient(circle at bottom right, rgba(161, 210, 51, 0.10) 0%, transparent 30%),
                var(--bg);
            color: var(--text);
        }

        input:-webkit-autofill,
        input:-webkit-autofill:hover,
        input:-webkit-autofill:focus {
            -webkit-box-shadow: 0 0 0px 1000px #F4F7EF inset !important;
            -webkit-text-fill-color: #111827 !important;
            caret-color: #111827;
        }

        .soft-glow {
            position: fixed;
            width: 520px;
            height: 520px;
            background: radial-gradient(circle, rgba(161, 210, 51, 0.12) 0%, transparent 70%);
            top: -140px;
            left: -140px;
            pointer-events: none;
            filter: blur(4px);
        }

        .soft-glow-2 {
            position: fixed;
            width: 420px;
            height: 420px;
            background: radial-gradient(circle, rgba(161, 210, 51, 0.08) 0%, transparent 70%);
            bottom: -120px;
            right: -120px;
            pointer-events: none;
            filter: blur(4px);
        }

        .card-shadow {
            box-shadow: 0 18px 50px rgba(17, 24, 39, 0.08);
        }
    </style>
</head>
<body class="min-h-screen flex items-center justify-center px-4">
    <div class="soft-glow"></div>
    <div class="soft-glow-2"></div>

    <div class="w-full max-w-sm relative z-10">
        <div class="text-center mb-8">
            <div class="w-14 h-14 rounded-2xl mx-auto mb-4 overflow-hidden flex items-center justify-center border"
                 style="background:var(--accent-soft); border-color:var(--border);">
                <img src="{{ asset('img/logo_nct.png') }}" class="w-full h-full object-cover" alt="NCT Logo">
            </div>
            <h1 class="text-2xl font-extrabold tracking-tight" style="font-family:'Inter',sans-serif; color:var(--text);">
                NCT Admin Portal
            </h1>
            <p class="text-sm mt-1" style="color:var(--muted);">
                Masuk untuk mengelola konten
            </p>
        </div>

        <div class="rounded-2xl p-6 border card-shadow" style="background:var(--card); border-color:var(--border);">

            @if($errors->any())
            <div class="mb-5 px-4 py-3 rounded-xl text-sm font-semibold"
                 style="background:rgba(248,113,113,0.10); color:#dc2626; border:1px solid rgba(248,113,113,0.18);">
                {{ $errors->first() }}
            </div>
            @endif

            <form action="{{ route('login') }}" method="POST" class="space-y-5">
                @csrf

                <div>
                    <label class="block text-xs font-bold uppercase tracking-wider mb-2" style="color:var(--muted);">
                        Email
                    </label>
                    <input type="email" name="email" value="{{ old('email') }}" required autofocus
                           class="w-full px-4 py-3 rounded-xl text-sm outline-none transition"
                           style="background:var(--panel); border:1px solid var(--border); color:var(--text);"
                           placeholder="admin@nct-portal.com"
                           onfocus="this.style.borderColor='var(--accent)'"
                           onblur="this.style.borderColor='var(--border)'">
                </div>

                <div>
                    <label class="block text-xs font-bold uppercase tracking-wider mb-2" style="color:var(--muted);">
                        Password
                    </label>
                    <div class="relative">
                        <input type="password" name="password" id="passwordInput" required
                               class="w-full px-4 py-3 rounded-xl text-sm outline-none transition pr-12"
                               style="background:var(--panel); border:1px solid var(--border); color:var(--text);"
                               placeholder="••••••••"
                               onfocus="this.style.borderColor='var(--accent)'"
                               onblur="this.style.borderColor='var(--border)'">
                        <button type="button" onclick="togglePassword()"
                                class="absolute right-3 top-1/2 -translate-y-1/2 p-1"
                                style="color:var(--muted);">
                            <svg id="eyeIcon" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                            </svg>
                        </button>
                    </div>
                </div>

                <button type="submit"
                        class="w-full py-3 rounded-xl font-bold text-sm transition hover:opacity-90 active:scale-[0.98]"
                        style="background:var(--accent); color:#111827;">
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