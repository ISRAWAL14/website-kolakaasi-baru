<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $photo->caption }} - Galeri Kelurahan Kolakaasi</title>
    @vite('resources/css/app.css')
    <style>
        body {
            /* [FIXED] Tanda kutip berlebih sudah dihapus dari baris ini */
            background-image: url('{{ asset('storage/' . $photo->image_url) }}');
            background-size: cover;
            background-position: center;
            overflow: hidden; /* Mencegah halaman bisa di-scroll */
        }
        .backdrop-blur-xl {
            /* Efek blur yang kuat */
            -webkit-backdrop-filter: blur(24px);
            backdrop-filter: blur(24px);
        }
    </style>
</head>
<body class="w-full h-screen">

    <div class="w-full h-full bg-black bg-opacity-70 backdrop-blur-xl flex items-center justify-center p-4">

        <a href="{{ url('/galeri') }}" 
           class="absolute top-5 left-5 text-white bg-black bg-opacity-50 px-4 py-2 rounded-full hover:bg-opacity-75 z-20 flex items-center text-sm transition-transform duration-200 hover:scale-105">
           <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" /></svg>
            Kembali
        </a>

        <div class="relative text-center animate-fade-in">
            <div class="bg-white p-2 rounded-lg shadow-2xl inline-block">
                <img src="{{ asset('storage/' . $photo->image_url) }}" alt="{{ $photo->caption }}" class="max-w-full max-h-[85vh] object-contain rounded-md">
            </div>
            
            @if($photo->caption)
                <p class="text-white mt-4 text-lg font-semibold drop-shadow-md">{{ $photo->caption }}</p>
            @endif
        </div>

    </div>

    <style>
        @keyframes fadeIn {
            from { opacity: 0; transform: scale(0.95); }
            to { opacity: 1; transform: scale(1); }
        }
        .animate-fade-in {
            animation: fadeIn 0.4s ease-out forwards;
        }
    </style>
</body>
</html>