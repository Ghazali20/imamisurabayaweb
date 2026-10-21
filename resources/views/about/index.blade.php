<!DOCTYPE html>
<html lang="id" class="scroll-smooth" x-data="{
    darkMode: localStorage.getItem('darkMode') === 'true',
    mobileMenuOpen: false
}" x-init="$watch('darkMode', val => localStorage.setItem('darkMode', val))" :class="{ 'dark': darkMode }">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tentang Kami - IMAMI Surabaya</title>
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
    <header class="bg-white/90 dark:bg-[#1E293B]/90 backdrop-blur-md border-b border-slate-100 dark:border-slate-800 sticky top-0 z-50 transition-colors duration-300">
        <div class="max-w-[1440px] mx-auto px-4 sm:px-6 h-20 flex items-center justify-between gap-4">

            <!-- Logo & Title -->
            <div class="flex items-center space-x-3 shrink-0">
                <a href="/" class="flex items-center space-x-3">
                    <img src="/images/logo-imami.png" alt="Logo IMAMI Surabaya" class="h-10 w-auto object-contain">
                    <div class="border-l border-slate-200 dark:border-slate-700 pl-3">
                        <h1 class="font-extrabold text-slate-900 dark:text-white tracking-tight leading-none text-xs sm:text-sm">IMAMI SURABAYA</h1>
                        <p class="text-[8px] sm:text-[9px] text-slate-500 dark:text-slate-400 font-bold tracking-wider uppercase mt-0.5">IKATAN MAHASISWA MINANG SURABAYA</p>
                    </div>
                </a>
            </div>

            <!-- Desktop Navigation Links -->
            <nav class="hidden lg:flex items-center space-x-4 xl:space-x-6 text-xs font-semibold text-slate-600 dark:text-slate-300 shrink-0">
                <a href="/" class="hover:text-[#B91C1C] dark:hover:text-red-400 transition">Beranda</a>
                <a href="{{ route('about.index') }}" class="text-[#B91C1C] dark:text-red-400 font-bold border-b-2 border-[#B91C1C] pb-1">Tentang Kami</a>
                <a href="{{ route('programs.index') }}" class="hover:text-[#B91C1C] dark:hover:text-red-400 transition">Program Kerja</a>
                <a href="{{ route('blog.index') }}" class="hover:text-[#B91C1C] dark:hover:text-red-400 transition">Kabar Komunitas</a>
                <a href="{{ route('gallery.index') }}" class="hover:text-[#B91C1C] dark:hover:text-red-400 transition">Galeri</a>
                <a href="/#kontak" class="hover:text-[#B91C1C] dark:hover:text-red-400 transition">Kontak</a>
            </nav>

            <!-- Actions / Buttons -->
            <div class="flex items-center space-x-2 sm:space-x-3 shrink-0">
                <!-- Tombol Toggle Dark/Light Mode -->
                <button @click="darkMode = !darkMode" class="w-9 h-9 rounded-full bg-slate-100 dark:bg-slate-800 text-slate-600 dark:text-yellow-400 flex items-center justify-center hover:bg-slate-200 dark:hover:bg-slate-700 transition shadow-sm border border-slate-200 dark:border-slate-700 shrink-0" title="Ganti Mode Tampilan">
                    <svg x-show="!darkMode" class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z"></path></svg>
                    <svg x-show="darkMode" class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" style="display: none;"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                </button>

                <a href="{{ route('blog.create') }}" class="hidden sm:inline-flex bg-red-50 dark:bg-red-950/50 text-[#B91C1C] dark:text-red-400 hover:bg-red-100 font-bold text-xs px-3.5 py-2 rounded-full transition border border-red-200 dark:border-red-900/50 whitespace-nowrap">
                    + Tulis Kabar
                </a>

                @auth
                    <a href="/admin" class="hidden sm:inline-flex bg-slate-900 dark:bg-slate-700 text-white hover:bg-slate-800 font-bold text-xs px-4 py-2 rounded-full transition shadow-sm whitespace-nowrap">
                        ⚙️ Admin
                    </a>
                @else
                    <a href="https://chat.whatsapp.com/BjBsWoH8iqRKb34Xaqq9Ky?s=cl&p=a&mlu=4&ilr=4" target="_blank" class="hidden sm:inline-flex bg-[#B91C1C] hover:bg-red-800 text-white font-bold text-xs px-4 py-2 rounded-full transition items-center space-x-1.5 shadow-md shadow-red-200/50 dark:shadow-none whitespace-nowrap">
                        <span>Gabung IMAMI</span>
                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                    </a>
                @endauth

                <!-- Hamburger Button khusus Mobile -->
                <button @click="mobileMenuOpen = !mobileMenuOpen" class="lg:hidden w-9 h-9 rounded-full bg-slate-100 dark:bg-slate-800 text-slate-700 dark:text-slate-200 flex items-center justify-center hover:bg-slate-200 dark:hover:bg-slate-700 transition border border-slate-200 dark:border-slate-700" title="Menu Navigasi">
                    <svg x-show="!mobileMenuOpen" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg>
                    <svg x-show="mobileMenuOpen" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" style="display: none;"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                </button>
            </div>
        </div>

        <!-- Mobile Menu Dropdown -->
        <div x-show="mobileMenuOpen"
             x-transition:enter="transition ease-out duration-200"
             x-transition:enter-start="opacity-0 -translate-y-2"
             x-transition:enter-end="opacity-100 translate-y-0"
             x-transition:leave="transition ease-in duration-150"
             x-transition:leave-start="opacity-100 translate-y-0"
             x-transition:leave-end="opacity-0 -translate-y-2"
             class="lg:hidden bg-white dark:bg-[#1E293B] border-b border-slate-100 dark:border-slate-800 px-6 py-5 space-y-4 shadow-xl" style="display: none;">
            <nav class="flex flex-col space-y-3 text-xs font-bold text-slate-700 dark:text-slate-200">
                <a href="/" class="hover:text-[#B91C1C] dark:hover:text-red-400 py-1">Beranda</a>
                <a href="{{ route('about.index') }}" class="text-[#B91C1C] dark:text-red-400 py-1">Tentang Kami</a>
                <a href="{{ route('programs.index') }}" class="hover:text-[#B91C1C] dark:hover:text-red-400 py-1 transition">Program Kerja</a>
                <a href="{{ route('blog.index') }}" class="hover:text-[#B91C1C] dark:hover:text-red-400 py-1 transition">Kabar Komunitas</a>
                <a href="{{ route('gallery.index') }}" class="hover:text-[#B91C1C] dark:hover:text-red-400 py-1 transition">Galeri</a>
                <a href="/#kontak" class="hover:text-[#B91C1C] dark:hover:text-red-400 py-1 transition">Kontak</a>
            </nav>
            <div class="pt-3 border-t border-slate-100 dark:border-slate-800 flex flex-col gap-2.5">
                <a href="{{ route('blog.create') }}" class="sm:hidden bg-red-50 dark:bg-red-950/50 text-[#B91C1C] dark:text-red-400 font-bold text-xs py-2.5 px-4 rounded-xl text-center border border-red-200 dark:border-red-900/50">+ Tulis Kabar</a>
                @auth
                    <a href="/admin" class="bg-slate-900 dark:bg-slate-700 text-white font-bold text-xs py-2.5 px-4 rounded-xl text-center shadow-sm">⚙️ Admin Panel</a>
                @else
                    <a href="https://chat.whatsapp.com/BjBsWoH8iqRKb34Xaqq9Ky?s=cl&p=a&mlu=4&ilr=4" target="_blank" class="bg-[#B91C1C] text-white font-bold text-xs py-2.5 px-4 rounded-xl text-center shadow-md">Gabung IMAMI</a>
                @endauth
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <main class="flex-grow max-w-[1200px] mx-auto px-4 sm:px-8 py-12 space-y-12 w-full">

        <!-- Hero Section dengan Logo Asli Organisasi -->
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-center bg-white dark:bg-[#1E293B] p-6 sm:p-12 rounded-[32px] border border-slate-100 dark:border-slate-800 shadow-sm">
            <div class="lg:col-span-8 space-y-5">
                <span class="inline-block bg-red-50 dark:bg-red-950/60 border border-red-100 dark:border-red-900/50 text-red-700 dark:text-red-400 text-xs font-bold px-3.5 py-1.5 rounded-full">
                    Profil Resmi Organisasi
                </span>
                <h1 class="text-3xl sm:text-5xl font-black text-slate-900 dark:text-white tracking-tight leading-tight">
                    Ikatan Mahasiswa Minang Surabaya
                </h1>
                <p class="text-xs sm:text-sm text-slate-600 dark:text-slate-300 leading-relaxed font-medium">
                    Organisasi kemahasiswaan daerah ekstra kampus sebagai organisasi non-struktural Gebu Minang Jawa Timur yang menaungi segenap kelengkapan organisasi IMAMI Surabaya. Wadah pemersatu mahasiswa Minang di perantauan sejak 2006.
                </p>
                <div class="pt-2 text-xs font-bold text-slate-500 dark:text-slate-400">
                    <span class="text-slate-900 dark:text-white">Sekretariat:</span> Rumah Gadang Surabaya, Jalan Gayung Kebonsari No. 64, Jawa Timur
                </div>
            </div>
            <div class="lg:col-span-4 flex justify-center">
                <div class="w-44 h-44 sm:w-52 sm:h-52 rounded-3xl bg-slate-50 dark:bg-slate-800/80 border border-slate-100 dark:border-slate-700 p-6 flex items-center justify-center shadow-inner">
                    <img src="{{ asset('images/logo-imami.png') }}" alt="Logo IMAMI Surabaya" class="max-h-full max-w-full object-contain drop-shadow-sm">
                </div>
            </div>
        </div>

        <!-- Section: Sejarah & Sekretariat -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="bg-white dark:bg-[#1E293B] p-8 rounded-[28px] border border-slate-100 dark:border-slate-800 shadow-sm space-y-3">
                <span class="text-[11px] font-black uppercase tracking-widest text-[#B91C1C] dark:text-red-400">Sejarah</span>
                <h2 class="text-xl font-black text-slate-900 dark:text-white">Awal Berdiri</h2>
                <p class="text-xs sm:text-sm text-slate-600 dark:text-slate-300 leading-relaxed font-medium">
                    Ikatan Mahasiswa Minang Surabaya didirikan pada tanggal 25 Mei 2006 di Institut Teknologi Sepuluh Nopember (ITS).
                </p>
            </div>

            <div class="bg-white dark:bg-[#1E293B] p-8 rounded-[28px] border border-slate-100 dark:border-slate-800 shadow-sm space-y-3">
                <span class="text-[11px] font-black uppercase tracking-widest text-[#B91C1C] dark:text-red-400">Lokasi</span>
                <h2 class="text-xl font-black text-slate-900 dark:text-white">Rumah Gadang</h2>
                <p class="text-xs sm:text-sm text-slate-600 dark:text-slate-300 leading-relaxed font-medium">
                    IMAMI Surabaya bertempat di Rumah Gadang Surabaya Jalan Gayung Kebonsari No. 64, Jawa Timur.
                </p>
            </div>
        </div>

        <!-- Section: Identitas, Asas, Prinsip, & Sifat -->
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
            <div class="bg-white dark:bg-[#1E293B] p-7 rounded-[28px] border border-slate-100 dark:border-slate-800 shadow-sm space-y-2">
                <span class="text-[10px] font-black tracking-widest text-[#B91C1C] dark:text-red-400 uppercase">Definisi</span>
                <h3 class="text-base font-black text-slate-900 dark:text-white">Non-Struktural</h3>
                <p class="text-xs text-slate-600 dark:text-slate-300 leading-relaxed font-medium">
                    Organisasi kemahasiswaan daerah ekstra kampus non-struktural Gebu Minang Jawa Timur.
                </p>
            </div>

            <div class="bg-white dark:bg-[#1E293B] p-7 rounded-[28px] border border-slate-100 dark:border-slate-800 shadow-sm space-y-2">
                <span class="text-[10px] font-black tracking-widest text-[#B91C1C] dark:text-red-400 uppercase">Asas</span>
                <h3 class="text-base font-black text-slate-900 dark:text-white">Pancasila & UUD 1945</h3>
                <p class="text-xs text-slate-600 dark:text-slate-300 leading-relaxed font-medium">
                    IMAMI Surabaya berasaskan UUD 1945 dan Pancasila.
                </p>
            </div>

            <div class="bg-white dark:bg-[#1E293B] p-7 rounded-[28px] border border-slate-100 dark:border-slate-800 shadow-sm space-y-2">
                <span class="text-[10px] font-black tracking-widest text-[#B91C1C] dark:text-red-400 uppercase">Prinsip</span>
                <h3 class="text-base font-black text-slate-900 dark:text-white">Kekeluargaan</h3>
                <p class="text-xs text-slate-600 dark:text-slate-300 leading-relaxed font-medium">
                    Prinsip dasar organisasi ini adalah mengutamakan rasa kekeluargaan yang erat.
                </p>
            </div>

            <div class="bg-white dark:bg-[#1E293B] p-7 rounded-[28px] border border-slate-100 dark:border-slate-800 shadow-sm space-y-2">
                <span class="text-[10px] font-black tracking-widest text-[#B91C1C] dark:text-red-400 uppercase">Sifat</span>
                <h3 class="text-base font-black text-slate-900 dark:text-white">Independen</h3>
                <p class="text-xs text-slate-600 dark:text-slate-300 leading-relaxed font-medium">
                    Bersifat independent, otonom, dan tidak bercampur dengan unsur kegiatan politik praktis.
                </p>
            </div>
        </div>

        <!-- Section: Tujuan Organisasi -->
        <div class="bg-white dark:bg-[#1E293B] p-8 sm:p-12 rounded-[32px] border border-slate-100 dark:border-slate-800 shadow-sm space-y-8">
            <div class="max-w-xl space-y-2">
                <span class="text-[11px] font-black tracking-widest text-[#B91C1C] dark:text-red-400 uppercase">Komitmen & Arah</span>
                <h2 class="text-2xl font-black text-slate-900 dark:text-white tracking-tight">Tujuan Organisasi</h2>
                <p class="text-xs sm:text-sm text-slate-600 dark:text-slate-300 font-medium">
                    Ikatan Mahasiswa Minang Surabaya memiliki tiga tujuan utama dalam menjalankan perannya:
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="bg-slate-50 dark:bg-slate-800/60 p-6 sm:p-8 rounded-2xl border border-slate-100 dark:border-slate-700/50 space-y-3 flex flex-col justify-between">
                    <span class="text-xs font-black text-[#B91C1C] dark:text-red-400 tracking-wider">TUJUAN A</span>
                    <p class="text-xs sm:text-sm text-slate-700 dark:text-slate-200 font-medium leading-relaxed">
                        Membangun dan meningkatkan rasa kekeluargaan sesama mahasiswa Minang di Surabaya.
                    </p>
                </div>
                <div class="bg-slate-50 dark:bg-slate-800/60 p-6 sm:p-8 rounded-2xl border border-slate-100 dark:border-slate-700/50 space-y-3 flex flex-col justify-between">
                    <span class="text-xs font-black text-[#B91C1C] dark:text-red-400 tracking-wider">TUJUAN B</span>
                    <p class="text-xs sm:text-sm text-slate-700 dark:text-slate-200 font-medium leading-relaxed">
                        Melestarikan nilai nilai budaya Minangkabau di perantauan.
                    </p>
                </div>
                <div class="bg-slate-50 dark:bg-slate-800/60 p-6 sm:p-8 rounded-2xl border border-slate-100 dark:border-slate-700/50 space-y-3 flex flex-col justify-between">
                    <span class="text-xs font-black text-[#B91C1C] dark:text-red-400 tracking-wider">TUJUAN C</span>
                    <p class="text-xs sm:text-sm text-slate-700 dark:text-slate-200 font-medium leading-relaxed">
                        Sebagai wadah pengembangan kompetensi anggota.
                    </p>
                </div>
            </div>
        </div>

    </main>

    <!-- Footer Konsisten -->
    <footer class="bg-[#121212] text-white mt-12 py-10 border-t border-zinc-800 text-xs transition-colors duration-300">
        <div class="max-w-[1440px] mx-auto px-4 sm:px-8 grid grid-cols-1 md:grid-cols-3 gap-8 items-center">
            <div class="flex items-center space-x-3">
                <img src="/images/logo-imami.png" class="h-10 w-auto invert" alt="Logo IMAMI">
                <div class="border-l border-zinc-700 pl-3">
                    <p class="font-extrabold text-white text-sm">IMAMI SURABAYA</p>
                    <p class="text-[10px] text-zinc-400">IKATAN MAHASISWA MINANG SURABAYA</p>
                </div>
            </div>
            <div class="space-y-1 text-zinc-300">
                <p class="font-bold text-white text-xs uppercase tracking-wider flex items-center gap-1.5"><span>📍</span> Alamat Kami</p>
                <a href="https://maps.app.goo.gl/awKLamDftXsYt4Fi9" target="_blank" class="hover:text-red-400 transition block text-[11px] leading-relaxed">
                    Jl. Gayung Kebonsari No.64, Gayungan, Surabaya <span class="text-red-400 font-bold underline block mt-0.5">Buka di Google Maps ➔</span>
                </a>
            </div>
            <div class="space-y-1 text-zinc-300 md:text-right">
                <p class="font-bold text-white text-xs uppercase tracking-wider flex items-center md:justify-end gap-1.5"><span>📞</span> Kontak & Media</p>
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