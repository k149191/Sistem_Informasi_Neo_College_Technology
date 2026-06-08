<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>{{ $department->name }}</title>
    <link rel="icon" type="image/png" href="/img/logo_nct.png">
</head>
<body class="bg-gray-50">
    <div class="max-w-[90%] mx-auto py-16 sm:py-20 px-4 sm:px-6">
        <a href="/" class="text-[#A1D233] font-bold mb-4 sm:mb-6 block text-sm sm:text-base">
            &larr; Kembali ke Beranda
        </a>

        <div class="bg-white p-6 sm:p-8 md:p-10 rounded-2xl sm:rounded-3xl shadow-sm border border-gray-100">
            <h1 class="text-2xl sm:text-3xl md:text-4xl font-bold mb-3 sm:mb-4">{{ $department->name }}</h1>
            <p class="text-gray-600 text-sm sm:text-base md:text-lg leading-relaxed mb-5 sm:mb-6">{{ $department->description }}</p>

            <div class="border-t pt-5 sm:pt-6">
                <h4 class="text-xs font-bold text-gray-400 uppercase tracking-widest">Kepala Departemen</h4>
                <p class="text-lg sm:text-xl font-bold text-gray-900 mt-2">
                    {{ $department->head ? $department->head->name : 'Belum ditentukan' }}
                </p>
            </div>
        </div>

        <div class="mt-8 sm:mt-10">
            <h3 class="text-xl sm:text-2xl font-bold mb-5 sm:mb-6 text-gray-900">Daftar Dosen</h3>

            @if($department->lecturers->count() > 0)
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 sm:gap-4">
                    @foreach($department->lecturers as $dosen)
                        <div class="flex items-center gap-3 sm:gap-4 p-4 bg-gray-50 rounded-xl sm:rounded-2xl border border-gray-100">
                            <img src="{{ asset($dosen->profil_img ?? 'img/default-avatar.png') }}"
                                 class="w-11 h-11 sm:w-12 sm:h-12 flex-shrink-0 rounded-full object-cover ring-2 ring-[#A1D233] ring-offset-2 ring-offset-white">
                            <div class="min-w-0">
                                <p class="font-bold text-gray-900 text-sm sm:text-base truncate">{{ $dosen->name }}</p>
                                <p class="text-xs text-[#A1D233] font-semibold uppercase">Dosen</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <p class="text-gray-500 italic text-sm sm:text-base">Belum ada data dosen untuk departemen ini.</p>
            @endif
        </div>
    </div>
</body>
</html>