<!DOCTYPE html>
<html lang="id" class="scroll-smooth" x-data="{
    darkMode: localStorage.getItem('darkMode') === 'true'
}" x-init="$watch('darkMode', val => localStorage.setItem('darkMode', val))" :class="{ 'dark': darkMode }">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kirim Kabar & Artikel - IMAMI Surabaya</title>
    <!-- Favicon Logo IMAMI -->
    <link rel="icon" type="image/png" href="{{ asset('images/logo-imami.png') }}">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            darkMode: 'class',
        }
    </script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
    </style>
</head>
<body class="bg-[#F8FAFC] dark:bg-[#0F172A] text-slate-800 dark:text-slate-100 flex flex-col min-h-screen antialiased transition-colors duration-300">

    <!-- Header Navigation -->
    <header class="bg-white dark:bg-[#1E293B] border-b border-slate-100 dark:border-slate-800 sticky top-0 z-50 transition-colors duration-300">
        <div class="max-w-[1440px] mx-auto px-4 sm:px-8 h-20 flex items-center justify-between">
            <a href="/" class="flex items-center space-x-3 shrink-0">
                <img src="/images/logo-imami.png" alt="Logo IMAMI Surabaya" class="h-11 w-auto object-contain">
                <div class="border-l border-slate-200 dark:border-slate-700 pl-3">
                    <h1 class="font-extrabold text-slate-900 dark:text-white tracking-tight leading-none text-sm sm:text-base">IMAMI SURABAYA</h1>
                    <p class="text-[9px] sm:text-[10px] text-slate-500 dark:text-slate-400 font-bold tracking-wider uppercase mt-0.5">IKATAN MAHASISWA MINANG SURABAYA</p>
                </div>
            </a>

            <div class="flex items-center space-x-3">
                <!-- Tombol Toggle Dark/Light Mode -->
                <button @click="darkMode = !darkMode" class="w-9 h-9 rounded-full bg-slate-100 dark:bg-slate-800 text-slate-600 dark:text-yellow-400 flex items-center justify-center hover:bg-slate-200 dark:hover:bg-slate-700 transition shadow-sm border border-slate-200 dark:border-slate-700 shrink-0" title="Ganti Mode Tampilan">
                    <svg x-show="!darkMode" class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z"></path></svg>
                    <svg x-show="darkMode" class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" style="display: none;"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                </button>

                <a href="/" class="text-xs sm:text-sm font-bold text-slate-600 dark:text-slate-300 hover:text-[#B91C1C] dark:hover:text-red-400 transition">
                    ← Kembali ke Beranda
                </a>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <main class="flex-grow max-w-2xl mx-auto px-4 py-10 w-full space-y-6">

        <div class="space-y-2 text-center">
            <span class="inline-block bg-red-50 dark:bg-red-950/60 text-[#B91C1C] dark:text-red-400 text-xs font-bold px-3 py-1 rounded-full border border-red-100 dark:border-red-900/50">
                Kontribusi Publik & Anggota
            </span>
            <h1 class="text-2xl sm:text-3xl font-black text-slate-900 dark:text-white">Kirim Kabar atau Artikel</h1>
            <p class="text-xs sm:text-sm text-slate-500 dark:text-slate-400">
                Punya informasi kegiatan, prestasi, atau cerita seputar mahasiswa Minang di Surabaya? Kirimkan di sini! Tulisan akan ditinjau admin sebelum tayang.
            </p>
        </div>

        @if(session('success'))
            <div class="bg-emerald-50 dark:bg-emerald-950/50 border border-emerald-200 dark:border-emerald-800 text-emerald-800 dark:text-emerald-300 p-4 rounded-2xl text-xs sm:text-sm font-medium">
                ✅ {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('blog.store') }}" method="POST" enctype="multipart/form-data" class="bg-white dark:bg-[#1E293B] p-6 sm:p-8 rounded-3xl border border-slate-100 dark:border-slate-800 shadow-sm space-y-4 transition-colors duration-300">
            @csrf

            <div>
                <label class="block text-xs font-bold text-slate-700 dark:text-slate-300 mb-1">Judul Berita / Artikel <span class="text-red-600">*</span></label>
                <input type="text" name="title" value="{{ old('title') }}" required placeholder="Contoh: Mahasiswa Minang Surabaya Gelar Pelatihan Futsal" class="w-full text-xs sm:text-sm border border-slate-200 dark:border-slate-700 dark:bg-slate-900 dark:text-white rounded-xl px-4 py-3 focus:outline-none focus:border-red-700">
                @error('title') <span class="text-[10px] text-red-600 mt-1 block">{{ $message }}</span> @enderror
            </div>

            <div>
                <label class="block text-xs font-bold text-slate-700 dark:text-slate-300 mb-1">Nama Lengkap / Pengirim <span class="text-red-600">*</span></label>
                <input type="text" name="author_name" value="{{ old('author_name') }}" required placeholder="Contoh: Muhammad Jefri" class="w-full text-xs sm:text-sm border border-slate-200 dark:border-slate-700 dark:bg-slate-900 dark:text-white rounded-xl px-4 py-3 focus:outline-none focus:border-red-700">
                @error('author_name') <span class="text-[10px] text-red-600 mt-1 block">{{ $message }}</span> @enderror
            </div>

            <div>
                <label class="block text-xs font-bold text-slate-700 dark:text-slate-300 mb-1">Foto Sampul / Dokumentasi (Opsional)</label>
                <input type="file" name="thumbnail" accept="image/*" class="w-full text-xs text-slate-500 dark:text-slate-400 file:mr-4 file:py-2 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-bold file:bg-red-50 dark:file:bg-red-950/60 file:text-red-700 dark:file:text-red-400 hover:file:bg-red-100">
                @error('thumbnail') <span class="text-[10px] text-red-600 mt-1 block">{{ $message }}</span> @enderror
            </div>

            <div>
                <label class="block text-xs font-bold text-slate-700 dark:text-slate-300 mb-1">Isi Berita / Artikel <span class="text-red-600">*</span></label>
                <textarea name="content" rows="6" required placeholder="Tuliskan isi berita selengkapnya di sini..." class="w-full text-xs sm:text-sm border border-slate-200 dark:border-slate-700 dark:bg-slate-900 dark:text-white rounded-xl px-4 py-3 focus:outline-none focus:border-red-700">{{ old('content') }}</textarea>
                @error('content') <span class="text-[10px] text-red-600 mt-1 block">{{ $message }}</span> @enderror
            </div>

            <div class="pt-4">
                <button type="submit" class="w-full bg-[#B91C1C] hover:bg-red-800 text-white font-bold text-xs sm:text-sm py-3.5 rounded-xl transition shadow-md shadow-red-200 dark:shadow-none">
                    Kirim Berita Sekarang ➔
                </button>
            </div>
        </form>

    </main>

    <!-- Footer Konsisten -->
    <footer class="bg-[#121212] text-white mt-12 py-10 border-t border-zinc-800 text-xs transition-colors duration-300">
        <div class="max-w-[1440px] mx-auto px-4 sm:px-8 grid grid-cols-1 md:grid-cols-3 gap-8 items-center">

            <!-- Logo & Identitas -->
            <div class="flex items-center space-x-3">
                <img src="/images/logo-imami.png" class="h-10 w-auto invert" alt="Logo IMAMI">
                <div class="border-l border-zinc-700 pl-3">
                    <p class="font-extrabold text-white text-sm">IMAMI SURABAYA</p>
                    <p class="text-[10px] text-zinc-400">IKATAN MAHASISWA MINANG SURABAYA</p>
                </div>
            </div>

            <!-- Alamat Sekretariat -->
            <div class="space-y-1 text-zinc-300">
                <p class="font-bold text-white text-xs uppercase tracking-wider flex items-center gap-1.5">
                    <span>📍</span> Alamat Kami
                </p>
                <a href="https://maps.app.goo.gl/awKLamDftXsYt4Fi9" target="_blank" class="hover:text-red-400 transition block text-[11px] leading-relaxed">
                    Jl. Gayung Kebonsari No.64, Gayungan, Surabaya <span class="text-red-400 font-bold underline block mt-0.5">Buka di Google Maps ➔</span>
                </a>
            </div>

            <!-- Kontak & Sosmed -->
            <div class="space-y-1 text-zinc-300 md:text-right">
                <p class="font-bold text-white text-xs uppercase tracking-wider flex items-center md:justify-end gap-1.5">
                    <span>📞</span> Kontak & Media
                </p>
                <p class="text-[11px]">085113504191 | imamisurabaya@gmail.com</p>
                <p class="text-[11px]">Instagram: <a href="https://www.instagram.com/imami_sby/?hl=en" target="_blank" class="text-red-400 hover:underline font-bold">@imami_sby</a></p>
            </div>

        </div>

        <div class="max-w-[1440px] mx-auto px-4 sm:px-8 pt-6 mt-8 border-t border-zinc-800/80 text-center text-zinc-500 text-[10px]">
            <p>© {{ date('Y') }} IMAMI Surabaya. Ikatan Mahasiswa Minang Surabaya.</p>
        </div>
    </footer>

</body>
</html>