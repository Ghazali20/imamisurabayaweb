<!DOCTYPE html>
<html lang="id" class="scroll-smooth" x-data="{
    darkMode: localStorage.getItem('darkMode') === 'true',
    mobileMenuOpen: false
}" x-init="$watch('darkMode', val => localStorage.setItem('darkMode', val))" :class="{ 'dark': darkMode }">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IMAMI Surabaya - Ikatan Mahasiswa Minang Surabaya</title>
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
        <div class="max-w-[1440px] mx-auto px-4 sm:px-6 h-20 flex items-center justify-between gap-4">

            <!-- Logo & Title -->
            <div class="flex items-center space-x-3 shrink-0">
                <img src="/images/logo-imami.png" alt="Logo IMAMI Surabaya" class="h-10 w-auto object-contain">
                <div class="border-l border-slate-200 dark:border-slate-700 pl-3">
                    <h1 class="font-extrabold text-slate-900 dark:text-white tracking-tight leading-none text-xs sm:text-sm">IMAMI SURABAYA</h1>
                    <p class="text-[8px] sm:text-[9px] text-slate-500 dark:text-slate-400 font-bold tracking-wider uppercase mt-0.5">IKATAN MAHASISWA MINANG SURABAYA</p>
                </div>
            </div>

            <!-- Desktop Navigation Links -->
            <nav class="hidden lg:flex items-center space-x-4 xl:space-x-6 text-xs font-semibold text-slate-600 dark:text-slate-300 shrink-0">
                <a href="#" class="text-[#B91C1C] dark:text-red-400 font-bold border-b-2 border-[#B91C1C] pb-1">Beranda</a>
                <a href="{{ route('about.index') }}" class="hover:text-[#B91C1C] dark:hover:text-red-400 transition">Tentang Kami</a>
                <a href="{{ route('programs.index') }}" class="hover:text-[#B91C1C] dark:hover:text-red-400 transition">Program Kerja</a>
                <a href="{{ route('blog.index') }}" class="hover:text-[#B91C1C] dark:hover:text-red-400 transition">Kabar Komunitas</a>
                <a href="{{ route('gallery.index') }}" class="hover:text-[#B91C1C] dark:hover:text-red-400 transition">Galeri</a>
                <a href="#kontak" class="hover:text-[#B91C1C] dark:hover:text-red-400 transition">Kontak</a>
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
                <a href="#" class="text-[#B91C1C] dark:text-red-400 py-1">Beranda</a>
                <a href="{{ route('about.index') }}" class="hover:text-[#B91C1C] dark:hover:text-red-400 py-1 transition">Tentang Kami</a>
                <a href="{{ route('programs.index') }}" class="hover:text-[#B91C1C] dark:hover:text-red-400 py-1 transition">Program Kerja</a>
                <a href="{{ route('blog.index') }}" class="hover:text-[#B91C1C] dark:hover:text-red-400 py-1 transition">Kabar Komunitas</a>
                <a href="{{ route('gallery.index') }}" class="hover:text-[#B91C1C] dark:hover:text-red-400 py-1 transition">Galeri</a>
                <a href="#kontak" class="hover:text-[#B91C1C] dark:hover:text-red-400 py-1 transition">Kontak</a>
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
    <main class="flex-grow max-w-[1440px] mx-auto px-4 sm:px-8 py-6 space-y-8 w-full">

        <!-- Hero Section dengan Slider Dinamis dari Admin -->
        @php
            $sliders = \App\Models\HeroSlider::where('is_active', true)->latest()->get();
        @endphp

        <section class="relative bg-white dark:bg-[#1E293B] rounded-3xl border border-slate-100 dark:border-slate-800 shadow-sm overflow-hidden min-h-[440px] flex items-center transition-colors duration-300"
                 x-data="{
                    activeSlide: 0,
                    slides: {{ json_encode($sliders->map(function($s) {
                        return [
                            'title' => $s->title,
                            'highlight' => $s->highlight_title,
                            'subtitle' => $s->subtitle,
                            'image' => str_starts_with($s->image, 'http') ? $s->image : asset('storage/'.$s->image)
                        ];
                    })) }}
                 }"
                 x-init="if (slides.length > 1) setInterval(() => activeSlide = (activeSlide + 1) % slides.length, 6000)">

            @if($sliders->count() > 0)
                <template x-for="(slide, index) in slides" :key="index">
                    <div x-show="activeSlide === index"
                         x-transition:enter="transition ease-out duration-700"
                         x-transition:enter-start="opacity-0"
                         x-transition:enter-end="opacity-100"
                         class="absolute inset-0 z-0 flex items-center">
                        <img :src="slide.image" class="w-full h-full object-cover object-right" alt="Banner IMAMI">
                        <div class="absolute inset-0 bg-gradient-to-r from-white dark:from-[#1E293B] via-white/80 dark:via-[#1E293B]/90 via-55% to-transparent"></div>
                    </div>
                </template>
            @else
                <div class="absolute inset-0 z-0 opacity-90 dark:opacity-40">
                    <img src="/images/hero-rumah-gadang.jpg" class="w-full h-full object-cover object-right" alt="Rumah Gadang IMAMI">
                    <div class="absolute inset-0 bg-gradient-to-r from-white dark:from-[#1E293B] via-white/80 dark:via-[#1E293B]/90 via-55% to-transparent"></div>
                </div>
            @endif

            <div class="relative z-10 p-8 sm:p-14 max-w-2xl space-y-6">
                <div class="inline-flex items-center space-x-2 bg-red-50 dark:bg-red-950/60 border border-red-100 dark:border-red-900/50 text-red-700 dark:text-red-400 text-xs font-bold px-3 py-1 rounded-full">
                    <span class="w-2 h-2 rounded-full bg-red-600 dark:bg-red-500 animate-pulse"></span>
                    <span>Selamat Datang di IMAMI Surabaya</span>
                </div>

                <h1 class="text-3xl sm:text-5xl font-black text-slate-900 dark:text-white leading-tight tracking-tight">
                    <span x-text="slides.length > 0 ? slides[activeSlide].title : ''"></span>
                    <template x-if="slides.length > 0 && slides[activeSlide].highlight">
                        <span>
                            <br>
                            <span class="text-[#B91C1C] dark:text-red-400" x-text="slides[activeSlide].highlight"></span>
                        </span>
                    </template>
                </h1>

                <p class="text-slate-600 dark:text-slate-300 text-xs sm:text-sm leading-relaxed"
                   x-text="slides.length > 0 ? slides[activeSlide].subtitle : ''">
                </p>

                <div class="flex flex-wrap gap-3 pt-2">
                    <a href="{{ route('programs.index') }}" class="bg-[#B91C1C] hover:bg-red-800 text-white font-bold text-xs sm:text-sm px-6 py-3 rounded-full transition shadow-md flex items-center space-x-2">
                        <span>Jelajahi Program Kami</span>
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                    </a>
                    <a href="{{ route('blog.create') }}" class="bg-white dark:bg-slate-800 hover:bg-slate-50 dark:hover:bg-slate-700 text-slate-700 dark:text-slate-200 border border-slate-300 dark:border-slate-700 font-bold text-xs sm:text-sm px-6 py-3 rounded-full transition flex items-center space-x-2">
                        <span>Kirim Kabar / Artikel</span>
                    </a>
                </div>
            </div>

            <template x-if="slides.length > 1">
                <div class="absolute bottom-4 right-8 z-20 flex space-x-1.5 bg-black/30 backdrop-blur-md px-3 py-1.5 rounded-full">
                    <template x-for="(slide, index) in slides" :key="index">
                        <button @click="activeSlide = index"
                                :class="activeSlide === index ? 'bg-white w-5' : 'bg-white/40 w-1.5'"
                                class="h-1.5 rounded-full transition-all duration-300"></button>
                    </template>
                </div>
            </template>
        </section>

        <!-- 5 Pilar Program Section -->
        <section id="program" class="grid grid-cols-2 md:grid-cols-5 gap-4">
            <div class="bg-white dark:bg-[#1E293B] p-4 rounded-2xl border border-slate-100 dark:border-slate-800 shadow-sm flex items-center space-x-3 transition-colors duration-300">
                <div class="w-10 h-10 bg-red-50 dark:bg-red-950/50 text-red-700 dark:text-red-400 rounded-xl flex items-center justify-center shrink-0">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                </div>
                <div>
                    <h3 class="font-bold text-xs text-slate-900 dark:text-white leading-snug">Pengembangan Minat & Bakat</h3>
                    <p class="text-[10px] text-slate-400">Ruang berkreasi</p>
                </div>
            </div>

            <div class="bg-white dark:bg-[#1E293B] p-4 rounded-2xl border border-slate-100 dark:border-slate-800 shadow-sm flex items-center space-x-3 transition-colors duration-300">
                <div class="w-10 h-10 bg-red-50 dark:bg-red-950/50 text-red-700 dark:text-red-400 rounded-xl flex items-center justify-center shrink-0">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                </div>
                <div>
                    <h3 class="font-bold text-xs text-slate-900 dark:text-white leading-snug">Kegiatan Rutin</h3>
                    <p class="text-[10px] text-slate-400">Silaturahmi & berdampak</p>
                </div>
            </div>

            <div class="bg-white dark:bg-[#1E293B] p-4 rounded-2xl border border-slate-100 dark:border-slate-800 shadow-sm flex items-center space-x-3 transition-colors duration-300">
                <div class="w-10 h-10 bg-red-50 dark:bg-red-950/50 text-red-700 dark:text-red-400 rounded-xl flex items-center justify-center shrink-0">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1"></path></svg>
                </div>
                <div>
                    <h3 class="font-bold text-xs text-slate-900 dark:text-white leading-snug">Jaringan & Kolaborasi</h3>
                    <p class="text-[10px] text-slate-400">Bersama lebih kuat</p>
                </div>
            </div>

            <div class="bg-white dark:bg-[#1E293B] p-4 rounded-2xl border border-slate-100 dark:border-slate-800 shadow-sm flex items-center space-x-3 transition-colors duration-300">
                <div class="w-10 h-10 bg-red-50 dark:bg-red-950/50 text-red-700 dark:text-red-400 rounded-xl flex items-center justify-center shrink-0">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                </div>
                <div>
                    <h3 class="font-bold text-xs text-slate-900 dark:text-white leading-snug">Pelestarian Budaya</h3>
                    <p class="text-[10px] text-slate-400">Jaga warisan Minang</p>
                </div>
            </div>

            <div class="bg-white dark:bg-[#1E293B] p-4 rounded-2xl border border-slate-100 dark:border-slate-800 shadow-sm flex items-center space-x-3 col-span-2 md:col-span-1 transition-colors duration-300">
                <div class="w-10 h-10 bg-red-50 dark:bg-red-950/50 text-red-700 dark:text-red-400 rounded-xl flex items-center justify-center shrink-0">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0112 20.055a11.952 11.952 0 01-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z"></path></svg>
                </div>
                <div>
                    <h3 class="font-bold text-xs text-slate-900 dark:text-white leading-snug">Dukungan Akademik</h3>
                    <p class="text-[10px] text-slate-400">Tumbuh bersama</p>
                </div>
            </div>
        </section>

        <!-- Dynamic Grid Section -->
        <section class="grid grid-cols-1 lg:grid-cols-12 gap-6">

            <!-- Left: Carousel Slider Kegiatan Unggulan -->
            @php
                $sliderPosts = \App\Models\Post::where('is_published', true)->latest()->take(5)->get();
            @endphp

            <div class="lg:col-span-4 bg-[#800000] dark:bg-[#581C87] text-white rounded-3xl shadow-sm overflow-hidden min-h-[380px] relative group transition-colors duration-300"
                 x-data="{
                    activeSlide: 0,
                    slides: {{ json_encode($sliderPosts->map(function($p) {
                        $targetUrl = !empty($p->link_url) ? $p->link_url : route('blog.show', $p->slug);
                        return [
                            'title' => $p->title,
                            'image' => $p->thumbnail ? (str_starts_with($p->thumbnail, 'http') ? $p->thumbnail : asset('storage/'.$p->thumbnail)) : 'https://images.unsplash.com/photo-1522071820081-009f0129c71c?q=80&w=800&auto=format&fit=crop',
                            'url' => $targetUrl,
                            'isExternal' => !empty($p->link_url)
                        ];
                    })) }},
                    next() { if (this.slides.length > 0) this.activeSlide = (this.activeSlide + 1) % this.slides.length },
                    prev() { if (this.slides.length > 0) this.activeSlide = (this.activeSlide - 1 + this.slides.length) % this.slides.length }
                 }"
                 x-init="if (slides.length > 0) setInterval(() => next(), 5000)">

                <template x-for="(slide, index) in slides" :key="index">
                    <div x-show="activeSlide === index"
                         x-transition:enter="transition ease-out duration-500"
                         x-transition:enter-start="opacity-0 scale-95"
                         x-transition:enter-end="opacity-100 scale-100"
                         x-transition:leave="transition ease-in duration-300"
                         x-transition:leave-start="opacity-100 scale-100"
                         x-transition:leave-end="opacity-0 scale-95"
                         class="absolute inset-0 p-6 flex flex-col justify-between z-10">

                        <div class="absolute inset-0 z-0">
                            <img :src="slide.image" class="w-full h-full object-cover" alt="Gambar Kegiatan">
                            <div class="absolute inset-0 bg-gradient-to-t from-[#800000] dark:from-[#581C87] via-[#800000]/80 dark:via-[#581C87]/80 to-[#800000]/50 dark:to-[#581C87]/50"></div>
                        </div>

                        <div class="space-y-3 relative z-10">
                            <div class="flex items-center justify-between">
                                <span class="inline-block bg-white/20 backdrop-blur-md text-white text-[10px] font-bold px-3 py-1 rounded-full uppercase tracking-wider border border-white/20">
                                    Kegiatan Unggulan
                                </span>
                                <div class="flex items-center space-x-1.5 bg-black/30 backdrop-blur-md p-1 rounded-full border border-white/10">
                                    <button @click="prev()" class="w-6 h-6 rounded-full bg-white/10 hover:bg-white/30 flex items-center justify-center text-white text-xs transition">❮</button>
                                    <span class="text-[10px] font-bold px-1" x-text="(activeSlide + 1) + '/' + slides.length"></span>
                                    <button @click="next()" class="w-6 h-6 rounded-full bg-white/10 hover:bg-white/30 flex items-center justify-center text-white text-xs transition">❯</button>
                                </div>
                            </div>

                            <h2 class="text-xl sm:text-2xl font-black leading-tight drop-shadow-sm line-clamp-3" x-text="slide.title"></h2>
                        </div>

                        <!-- Tombol INFO interaktif -->
                        <div class="my-4 relative z-10 flex items-center justify-between bg-black/30 p-4 rounded-2xl backdrop-blur-md border border-white/10">
                            <div>
                                <p class="text-[10px] text-white/80">Ikuti perkembangan terbaru kami!</p>
                                <p class="text-xs font-bold text-white mt-0.5">IMAMI Surabaya</p>
                            </div>
                            <a :href="slide.url" :target="slide.isExternal ? '_blank' : '_self'" class="w-12 h-12 bg-white/15 hover:bg-white/30 rounded-full border border-white/30 flex items-center justify-center text-center p-1 shrink-0 transition cursor-pointer" title="Buka Detail/Link Postingan">
                                <span class="text-[8px] font-black leading-tight text-white uppercase">INFO</span>
                            </a>
                        </div>

                        <div class="pt-2 relative z-10">
                            <a :href="slide.url" :target="slide.isExternal ? '_blank' : '_self'" class="bg-white text-red-900 hover:bg-slate-100 font-bold text-xs px-5 py-2.5 rounded-full transition inline-flex items-center space-x-2 shadow-md">
                                <span>Lihat Selengkapnya</span>
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                            </a>
                        </div>
                    </div>
                </template>

                <div class="absolute bottom-3 left-1/2 -translate-x-1/2 z-20 flex space-x-1.5">
                    <template x-for="(slide, index) in slides" :key="index">
                        <button @click="activeSlide = index"
                                :class="activeSlide === index ? 'bg-white w-5' : 'bg-white/40 w-1.5'"
                                class="h-1.5 rounded-full transition-all duration-300"></button>
                    </template>
                </div>
            </div>

            <!-- Middle: Kabar & Artikel Komunitas -->
            <div id="blog" class="lg:col-span-5 bg-white dark:bg-[#1E293B] p-5 rounded-3xl border border-slate-100 dark:border-slate-800 shadow-sm space-y-4 transition-colors duration-300">
                <div class="flex items-center justify-between border-b border-slate-100 dark:border-slate-800 pb-3">
                    <h2 class="font-extrabold text-slate-900 dark:text-white text-sm flex items-center gap-2">
                        <svg class="w-4 h-4 text-red-700 dark:text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"></path></svg>
                        <span>Kabar & Artikel Komunitas</span>
                    </h2>
                    <a href="{{ route('blog.index') }}" class="text-xs font-bold text-red-700 dark:text-red-400 hover:underline">Lihat Semua ➔</a>
                </div>

                <div class="space-y-3">
                    @forelse(\App\Models\Post::where('is_published', true)->latest()->take(4)->get() as $post)
                        <div class="flex items-center justify-between p-2 rounded-2xl hover:bg-slate-50 dark:hover:bg-slate-800/60 transition border border-transparent hover:border-slate-100 dark:hover:border-slate-700">
                            <div class="flex items-center space-x-3">
                                <img src="{{ $post->thumbnail ? (str_starts_with($post->thumbnail, 'http') ? $post->thumbnail : asset('storage/'.$post->thumbnail)) : 'https://images.unsplash.com/photo-1522071820081-009f0129c71c?q=80&w=200&auto=format&fit=crop' }}" class="w-12 h-12 object-cover rounded-xl shrink-0" alt="Post">
                                <div>
                                    <h3 class="font-bold text-xs text-slate-800 dark:text-slate-200 line-clamp-1 hover:text-red-700 dark:hover:text-red-400 transition">
                                        <a href="{{ route('blog.show', $post->slug) }}">{{ $post->title }}</a>
                                    </h3>
                                    <p class="text-[10px] text-slate-400 mt-0.5">📅 {{ $post->created_at->format('d M Y') }} Oleh {{ $post->author_name ?? 'Komunitas IMAMI' }}</p>
                                </div>
                            </div>
                            <a href="{{ route('blog.show', $post->slug) }}" class="text-[10px] font-bold px-2.5 py-1 rounded-full bg-red-50 dark:bg-red-950/60 text-red-700 dark:text-red-400 hover:bg-red-700 hover:text-white transition shrink-0 ml-2">
                                Baca ➔
                            </a>
                        </div>
                    @empty
                        <div class="p-4 text-center text-xs text-slate-400">Belum ada berita komunitas. Jadilah yang pertama menulis kabar!</div>
                    @endforelse
                </div>
            </div>

            <!-- Right: Agenda Kegiatan Mendatang -->
            <div class="lg:col-span-3">
                <div id="kegiatan" class="bg-white dark:bg-[#1E293B] p-5 rounded-3xl border border-slate-100 dark:border-slate-800 shadow-sm space-y-4 h-full flex flex-col justify-between transition-colors duration-300">
                    <div class="space-y-3">
                        <div class="flex items-center justify-between border-b border-slate-100 dark:border-slate-800 pb-2">
                            <h2 class="font-extrabold text-slate-900 dark:text-white text-xs flex items-center gap-1.5">
                                <svg class="w-4 h-4 text-red-700 dark:text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                <span>Kegiatan Mendatang</span>
                            </h2>
                            @auth
                                <a href="/admin" class="text-[10px] font-bold text-red-700 dark:text-red-400 hover:underline">+ Tambah</a>
                            @endauth
                        </div>

                        <div class="space-y-3">
                            @forelse(\App\Models\Event::where('event_date', '>=', now()->startOfDay())->orderBy('event_date', 'asc')->take(5)->get() as $event)
                                <a href="{{ $event->link_url ?? '#' }}" @if($event->link_url) target="_blank" @endif class="flex items-center space-x-3 p-2 rounded-2xl hover:bg-slate-50 dark:hover:bg-slate-800/60 transition border border-slate-50 dark:border-slate-800 group block">
                                    <div class="bg-red-700 text-white text-center p-2 rounded-xl shrink-0 min-w-[42px] shadow-sm">
                                        <p class="text-[9px] font-bold uppercase leading-none">{{ \Carbon\Carbon::parse($event->event_date)->translatedFormat('M') }}</p>
                                        <p class="text-base font-black leading-tight mt-0.5">{{ \Carbon\Carbon::parse($event->event_date)->format('d') }}</p>
                                    </div>
                                    <div class="overflow-hidden">
                                        <div class="flex items-center space-x-1">
                                            <span class="text-[8px] font-bold px-1.5 py-0.5 rounded bg-red-50 dark:bg-red-950/60 text-red-700 dark:text-red-400 uppercase">{{ $event->category ?? 'Rutin' }}</span>
                                        </div>
                                        <h3 class="font-bold text-xs text-slate-800 dark:text-slate-200 line-clamp-1 group-hover:text-red-700 dark:group-hover:text-red-400 transition mt-0.5">{{ $event->title }}</h3>
                                        <p class="text-[10px] text-slate-400 truncate mt-0.5">📍 {{ $event->location }}</p>
                                    </div>
                                </a>
                            @empty
                                <div class="p-6 text-center text-xs text-slate-400">
                                    Belum ada agenda kegiatan mendatang.
                                </div>
                            @endforelse
                        </div>
                    </div>

                    <div class="pt-2 border-t border-slate-100 dark:border-slate-800 text-center">
                        <span class="text-[10px] text-slate-400 font-medium">IMAMI Surabaya Agenda</span>
                    </div>
                </div>
            </div>

        </section>

        <!-- Galeri Kegiatan Internal -->
        <section id="galeri" class="bg-white dark:bg-[#1E293B] p-6 rounded-3xl border border-slate-100 dark:border-slate-800 shadow-sm space-y-4 transition-colors duration-300">
            <div class="flex items-center justify-between border-b border-slate-100 dark:border-slate-800 pb-3">
                <h2 class="font-extrabold text-slate-900 dark:text-white text-sm flex items-center gap-2">
                    <svg class="w-4 h-4 text-red-700 dark:text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                    <span>Galeri Kegiatan IMAMI Surabaya</span>
                </h2>
                <a href="{{ route('gallery.index') }}" class="text-xs font-bold text-red-700 dark:text-red-400 hover:underline">Lihat Semua Galeri ➔</a>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
                @forelse(\App\Models\Gallery::latest()->take(6)->get() as $item)
                    <div class="group relative bg-slate-50 dark:bg-slate-800/60 border border-slate-100 dark:border-slate-700 rounded-2xl overflow-hidden hover:shadow-md transition">
                        <div class="h-40 overflow-hidden relative">
                            <img src="{{ str_starts_with($item->image, 'http') ? $item->image : asset('storage/'.$item->image) }}" class="w-full h-full object-cover group-hover:scale-105 transition duration-300" alt="Galeri Foto">
                            <div class="absolute top-2 right-2 bg-black/50 text-white text-[9px] font-bold px-2 py-0.5 rounded-full backdrop-blur-sm">
                                {{ $item->event_date ? \Carbon\Carbon::parse($item->event_date)->format('d M Y') : 'IMAMI' }}
                            </div>
                        </div>
                        <div class="p-3 space-y-1">
                            <h3 class="font-bold text-xs text-slate-800 dark:text-slate-200 line-clamp-1">{{ $item->title }}</h3>
                            <p class="text-[10px] text-slate-500 dark:text-slate-400 line-clamp-2 leading-relaxed">{{ $item->description ?? 'Dokumentasi kegiatan resmi IMAMI Surabaya.' }}</p>
                        </div>
                    </div>
                @empty
                    <div class="col-span-3 p-6 text-center text-xs text-slate-400">Belum ada galeri foto kegiatan. Silakan tambahkan lewat Admin Panel!</div>
                @endforelse
            </div>
        </section>

        <!-- Social Media Widget -->
        <section id="kontak" class="bg-gradient-to-r from-red-50 dark:from-red-950/40 via-red-50/60 dark:via-slate-900 to-white dark:to-slate-900 border border-red-100/80 dark:border-red-900/30 p-6 rounded-3xl flex flex-col md:flex-row items-center justify-between gap-4 transition-colors duration-300">
            <div class="flex items-center space-x-4">
                <div class="w-12 h-12 bg-[#B91C1C] dark:bg-red-700 text-white rounded-2xl flex items-center justify-center shrink-0 shadow-md shadow-red-200 dark:shadow-none">
                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg>
                </div>
                <div>
                    <h3 class="font-extrabold text-sm text-slate-900 dark:text-white">Ikuti Instagram Official @imami_sby</h3>
                    <p class="text-xs text-slate-500 dark:text-slate-400 mt-0.5">Dapatkan update informasi kegiatan, dokumentasi, dan pengumuman terbaru setiap hari.</p>
                </div>
            </div>

            <a href="https://www.instagram.com/imami_sby/?hl=en" target="_blank" class="bg-[#B91C1C] hover:bg-red-800 text-white font-bold text-xs sm:text-sm px-6 py-3 rounded-full transition shadow-md shrink-0 flex items-center space-x-2">
                <span>Follow @imami_sby</span>
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path></svg>
            </a>
        </section>

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