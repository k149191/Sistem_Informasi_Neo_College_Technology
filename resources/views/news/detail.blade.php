<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>{{ $news->title }}</title>
    <link rel="icon" type="image/png" href="{{ asset('img/logo_nct.png') }}">
</head>
<body class="bg-gray-50">
    <div class="max-w-[90%] mx-auto py-16 sm:py-20 px-4 sm:px-6">
        <a href="{{ url()->previous() }}" class="text-[#A1D233] font-bold mb-4 sm:mb-6 block text-sm sm:text-base">
            &larr; Kembali ke Beranda
        </a>

        <div class="bg-white p-6 sm:p-8 md:p-10 rounded-2xl sm:rounded-3xl shadow-sm border border-gray-100">
            <h1 class="text-2xl sm:text-3xl md:text-4xl font-bold mb-3 sm:mb-4 text-gray-900 leading-snug">
                {{ $news->title }}
            </h1>

            <div class="flex flex-wrap items-center gap-2 text-xs sm:text-sm text-gray-500 mb-5 sm:mb-6">
                <span>Oleh: <strong>{{ $news->author_name ?? 'Admin NCT' }}</strong></span>
                <span>&bull;</span>
                <span>{{ \Carbon\Carbon::parse($news->published_at)->format('d M Y') }}</span>
            </div>

            <div class="mb-6 sm:mb-8">
                <img src="{{ asset($news->image) }}"
                     class="w-full h-52 sm:h-64 md:h-80 object-cover rounded-xl sm:rounded-2xl"
                     alt="News Image">
            </div>

            <div class="text-gray-600 text-sm sm:text-base md:text-lg leading-relaxed">
                {!! nl2br(e($news->content)) !!}
            </div>
        </div>
    </div>
</body>
</html>