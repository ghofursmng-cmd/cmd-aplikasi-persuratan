<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Laravel') }} - Aplikasi Persuratan</title>
    <!-- Google Fonts: Inter -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            min-height: 100vh;
        }
        .glass {
            background: rgba(255, 255, 255, 0.7);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.3);
            box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.07);
        }
    </style>
</head>
<body class="p-4 md:p-8">
    <div class="max-w-6xl mx-auto">
        <header class="flex flex-col md:flex-row justify-between items-center mb-8 bg-white/50 p-6 rounded-2xl glass gap-4">
            <div>
                <h1 class="text-2xl font-bold text-gray-800">Aplikasi Persuratan</h1>
                <p class="text-gray-500 text-sm">Manajemen surat masuk & keluar kantor</p>
            </div>
            
            <nav class="flex items-center gap-2 bg-gray-100/50 p-1 rounded-xl">
                <a href="{{ route('surat.index') }}" class="{{ request()->routeIs('surat.*') ? 'bg-white shadow-sm' : 'text-gray-500 hover:text-gray-700' }} px-4 py-2 rounded-lg font-medium transition-all text-sm">
                    Surat Masuk
                </a>
                <a href="{{ route('surat-keluar.index') }}" class="{{ request()->routeIs('surat-keluar.*') ? 'bg-white shadow-sm' : 'text-gray-500 hover:text-gray-700' }} px-4 py-2 rounded-lg font-medium transition-all text-sm">
                    Surat Keluar
                </a>
            </nav>

            <a href="{{ request()->routeIs('surat-keluar.*') ? route('surat-keluar.create') : route('surat.create') }}" class="bg-indigo-600 hover:bg-indigo-700 text-white px-6 py-2.5 rounded-xl font-medium transition-all shadow-lg shadow-indigo-200 flex items-center gap-2 text-sm">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd" />
                </svg>
                Tambah {{ request()->routeIs('surat-keluar.*') ? 'Surat Keluar' : 'Surat Masuk' }}
            </a>
        </header>

        @if(session('success'))
            <div class="mb-6 p-4 bg-green-100 border border-green-200 text-green-700 rounded-xl glass flex items-center gap-3">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                </svg>
                {{ session('success') }}
            </div>
        @endif

        <main>
            @yield('content')
        </main>
        
        <footer class="mt-12 text-center text-gray-500 text-sm">
            &copy; {{ date('Y') }} Aplikasi Persuratan. Built with Laravel and Antigravity.
        </footer>
    </div>
</body>
</html>
