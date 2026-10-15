<!DOCTYPE html>
<html lang="id" class="dark scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CapungTerbang.id - Stock Drone Footage & Aerial Photography</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- FontAwesome Icons CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Google Font - Plus Jakarta Sans -->
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <!-- icon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('images/capung-terbang.ico') }}">

    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Plus Jakarta Sans', 'sans-serif'],
                    },
                    colors: {
                        skyAccent: '#00f2fe',
                        purpleAccent: '#4facfe',
                        darkBg: '#0b0f19',
                        darkCard: '#151c2c',
                    }
                }
            }
        }
    </script>
    
    <style>
        body {
            background-color: #0b0f19;
            color: #f3f4f6;
            font-family: 'Plus Jakarta Sans', sans-serif;
            overflow-x: hidden;
        }

        .glass-card {
            background: rgba(21, 28, 44, 0.75);
            backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.08);
        }

        .glass-nav {
            background: rgba(11, 15, 25, 0.85);
            backdrop-filter: blur(16px);
            border-bottom: 1px solid rgba(255, 255, 255, 0.08);
        }

        .gradient-text {
            background: linear-gradient(135deg, #00f2fe 0%, #4facfe 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .glow-effect {
            box-shadow: 0 0 25px rgba(0, 242, 254, 0.12);
        }

        .glow-effect:hover {
            box-shadow: 0 0 35px rgba(0, 242, 254, 0.28);
        }

        /* Mencegah zoom/fullscreen bawaan browser pada elemen video */
        video::-webkit-media-controls-fullscreen-button {
            display: none !important;
        }

        /* Custom Scrollbar */
        ::-webkit-scrollbar {
            width: 8px;
        }
        ::-webkit-scrollbar-track {
            background: #0b0f19;
        }
        ::-webkit-scrollbar-thumb {
            background: #1e293b;
            border-radius: 4px;
        }
        ::-webkit-scrollbar-thumb:hover {
            background: #00f2fe;
        }
    </style>
</head>
<body class="antialiased min-h-screen flex flex-col justify-between">

    <header class="fixed top-0 left-0 right-0 z-40 glass-nav transition-all duration-300">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-20">
                
                <!-- Logo -->
                <a href="#" class="flex items-center space-x-3 group">
                    <div class="w-10 h-10 rounded-xl bg-gradient-to-tr from-cyan-500 to-blue-600 flex items-center justify-center shadow-lg group-hover:scale-105 transition-transform">
                        <i class="fa-solid fa-helicopter text-slate-950 text-xl"></i>
                    </div>
                    <span class="text-xl sm:text-2xl font-extrabold tracking-wider text-white">CapungTerbang<span class="gradient-text">.id</span></span>
                </a>

                <!-- Desktop Navigation Menu -->
                <nav class="hidden md:flex items-center space-x-8 text-sm font-medium text-gray-300">
                    <a href="#galeri" class="hover:text-cyan-400 transition-colors">Galeri Karya</a>
                    <a href="#kategori" class="hover:text-cyan-400 transition-colors">Kategori</a>
                    <a href="#cloud-storage" class="hover:text-cyan-400 transition-colors">Cloud Storage</a>
                    <a href="#tentang" class="hover:text-cyan-400 transition-colors">Kreator & Gear</a>
                    <a href="#kontak" class="hover:text-cyan-400 transition-colors">Kontak</a>
                </nav>

                <!-- Action Buttons & Search -->
                <div class="hidden md:flex items-center space-x-4">
                    <a href="https://www.tiktok.com/@capungterbang.id?_r=1&_t=ZS-9A6ELqp5A8o" target="_blank" class="w-9 h-9 rounded-full bg-slate-800 hover:bg-cyan-500 hover:text-slate-950 text-gray-300 flex items-center justify-center transition-all" title="TikTok CapungTerbang.id">
                        <i class="fa-brands fa-tiktok text-sm"></i>
                    </a>
                    <div class="relative">
                        <input type="text" id="searchInput" onkeyup="filterGallery()" placeholder="Cari lokasi/kata kunci..." class="bg-slate-900/80 border border-slate-700/60 rounded-full py-2 pl-10 pr-4 text-xs text-gray-200 focus:outline-none focus:border-cyan-500 w-44 focus:w-56 transition-all">
                        <i class="fa-solid fa-magnifying-glass absolute left-3.5 top-2.5 text-gray-400 text-xs"></i>
                    </div>
                    <!-- <button onclick="openUploadModal()" class="bg-slate-800 hover:bg-slate-700 text-cyan-400 border border-cyan-500/30 font-bold px-4 py-2 rounded-full text-xs transition-all flex items-center gap-2 shadow-sm hover:shadow-cyan-500/20">
                        <i class="fa-solid fa-cloud-arrow-up text-sm"></i>
                        <span>Unggah</span>
                    </button> -->
                    <a href="{{route('login')}}" class="bg-slate-800 hover:bg-slate-700 text-cyan-400 border border-cyan-500/30 font-bold px-4 py-2 rounded-full text-xs transition-all flex items-center gap-2 shadow-sm hover:shadow-cyan-500/20">
                        <i class="fa-solid fa-right-to-bracket"></i>
                        <span>login</span>
                    </a>
                    <a href="https://wa.me/6289646985614" target="_blank" class="bg-gradient-to-r from-cyan-500 to-blue-600 hover:from-cyan-400 hover:to-blue-500 text-slate-950 font-bold px-4 py-2 rounded-full text-xs transition-all flex items-center gap-2 shadow-md">
                        <i class="fa-brands fa-whatsapp text-sm"></i>
                        <span>WhatsApp</span>
                    </a>
                </div>

                <!-- Mobile Menu Buttons -->
                <div class="md:hidden flex items-center space-x-2">
                    <a href="https://www.tiktok.com/@capungterbang.id?_r=1&_t=ZS-9A6ELqp5A8o" target="_blank" class="text-gray-300 hover:text-cyan-400 p-2">
                        <i class="fa-brands fa-tiktok text-lg"></i>
                    </a>
                    <button onclick="openUploadModal()" class="bg-cyan-500 text-slate-950 p-2 rounded-lg text-xs font-bold flex items-center gap-1">
                        <i class="fa-solid fa-cloud-arrow-up"></i>
                        <span>Unggah</span>
                    </button>
                    <button id="mobileMenuBtn" onclick="toggleMobileMenu()" class="text-gray-300 hover:text-white p-2">
                        <i class="fa-solid fa-bars text-xl"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile Menu Dropdown -->
        <div id="mobileMenu" class="hidden md:hidden bg-slate-900 border-b border-slate-800 px-4 pt-2 pb-6 space-y-3">
            <div class="pt-2 pb-1">
                <input type="text" id="searchInputMobile" onkeyup="filterGalleryMobile()" placeholder="Cari lokasi/kata kunci..." class="w-full bg-slate-800 border border-slate-700 rounded-lg py-2 pl-9 pr-4 text-sm text-gray-200 focus:outline-none focus:border-cyan-500">
            </div>
            <a href="#galeri" onclick="toggleMobileMenu()" class="block text-gray-300 hover:text-cyan-400 text-base font-medium py-1">Galeri Karya</a>
            <a href="#kategori" onclick="toggleMobileMenu()" class="block text-gray-300 hover:text-cyan-400 text-base font-medium py-1">Kategori</a>
            <a href="#cloud-storage" onclick="toggleMobileMenu()" class="block text-gray-300 hover:text-cyan-400 text-base font-medium py-1">Cloud Storage</a>
            <a href="#tentang" onclick="toggleMobileMenu()" class="block text-gray-300 hover:text-cyan-400 text-base font-medium py-1">Kreator & Gear</a>
            <a href="#kontak" onclick="toggleMobileMenu()" class="block text-gray-300 hover:text-cyan-400 text-base font-medium py-1">Kontak</a>
        </div>
    </header>

    <section class="relative pt-32 pb-20 md:pt-40 md:pb-32 overflow-hidden flex items-center min-h-[85vh]">
        <div class="absolute inset-0 z-0">
            <img src="https://images.unsplash.com/photo-1508614589041-895b88991e3e?q=80&w=2000&auto=format&fit=crop" alt="Aerial Background" class="w-full h-full object-cover opacity-25 scale-105">
            <div class="absolute inset-0 bg-gradient-to-b from-darkBg/60 via-darkBg/80 to-darkBg"></div>
        </div>

        <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full glass-card border-cyan-500/30 text-cyan-400 text-xs font-semibold uppercase tracking-wider mb-6 animate-pulse">
                <i class="fa-solid fa-circle text-[8px]"></i> Official Drone Marketplace & Portfolio
            </div>
            
            <h1 class="text-4xl sm:text-6xl lg:text-7xl font-extrabold text-white tracking-tight leading-tight mb-6">
                Koleksi Visual Sinematik <br class="hidden sm:inline">
                <span class="gradient-text">CapungTerbang.id</span>
            </h1>

            <p class="max-w-2xl mx-auto text-base sm:text-lg text-gray-400 mb-10 leading-relaxed">
                Stok video 4K UHD dan foto resolusi tinggi berlisensi resmi. Diabadikan langsung oleh Dwiki Ananda menggunakan drone canggih untuk kebutuhan kreatif dan komersial Anda.
            </p>

            <div class="flex flex-col sm:flex-row items-center justify-center gap-4">
                <a href="#galeri" class="w-full sm:w-auto px-8 py-4 rounded-full bg-gradient-to-r from-cyan-500 to-blue-600 hover:from-cyan-400 hover:to-blue-500 text-slate-950 font-bold text-base shadow-lg hover:shadow-cyan-500/25 transition-all transform hover:-translate-y-1 text-center">
                    Jelajahi Galeri
                </a>
                <button onclick="openUploadModal()" class="w-full sm:w-auto px-8 py-4 rounded-full glass-card hover:bg-slate-800 text-white font-semibold text-base border border-slate-700/80 transition-all text-center flex items-center justify-center gap-2">
                    <i class="fa-solid fa-cloud-arrow-up text-cyan-400 text-lg"></i> Unggah Karya
                </button>
            </div>

            <!-- Stats Bar -->
            <div class="grid grid-cols-2 md:grid-cols-4 gap-6 max-w-4xl mx-auto mt-16 pt-8 border-t border-slate-800/80">
                <div>
                    <h3 class="text-3xl font-extrabold text-white">4K UHD</h3>
                    <p class="text-xs text-gray-400 mt-1">Video Sinematik 60fps</p>
                </div>
                <div>
                    <h3 class="text-3xl font-extrabold text-cyan-400">48 MP</h3>
                    <p class="text-xs text-gray-400 mt-1">Foto RAW High-Res</p>
                </div>
                <div>
                    <h3 class="text-3xl font-extrabold text-white">100%</h3>
                    <p class="text-xs text-gray-400 mt-1">Lisensi Resmi Aman</p>
                </div>
                <div>
                    <h3 class="text-3xl font-extrabold text-cyan-400">DJI Lito X1</h3>
                    <p class="text-xs text-gray-400 mt-1">Perangkat Utama</p>
                </div>
            </div>
        </div>
    </section>

    <section id="galeri" class="py-16 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col md:flex-row md:items-end justify-between mb-10 gap-6">
            <div>
                <h2 class="text-3xl font-bold text-white tracking-wide">Galeri Aerial Terkini</h2>
                <p class="text-sm text-gray-400 mt-2">Unggah dan jelajahi hasil tangkapan foto & video udara profesional.</p>
            </div>

            <!-- Category Filter Tabs -->
            <div id="kategori"
                class="flex flex-wrap gap-2 glass-card p-1.5 rounded-xl border border-slate-800">

                <button
                    type="button"
                    onclick="setFilter('all')"
                    data-filter="all"
                    class="filter-btn active px-4 py-2 rounded-lg text-xs font-semibold transition-all bg-cyan-500 text-slate-950">
                    Semua
                </button>

                <button
                    type="button"
                    onclick="setFilter('type:video')"
                    data-filter="type:video"
                    class="filter-btn px-4 py-2 rounded-lg text-xs font-semibold text-gray-400 hover:text-white transition-all">
                    Video
                </button>

                <button
                    type="button"
                    onclick="setFilter('type:photo')"
                    data-filter="type:photo"
                    class="filter-btn px-4 py-2 rounded-lg text-xs font-semibold text-gray-400 hover:text-white transition-all">
                    Foto
                </button>

                @foreach ($kategori as $itemKategori)
                    <button
                        type="button"
                        onclick="setFilter('category:{{ $itemKategori->id }}')"
                        data-filter="category:{{ $itemKategori->id }}"
                        class="filter-btn px-4 py-2 rounded-lg text-xs font-semibold text-gray-400 hover:text-white transition-all">
                        {{ $itemKategori->nama_kategori }}
                    </button>
                @endforeach

            </div>
        </div>

        <!-- Gallery Grid Dynamic Container -->
        <div id="galleryGrid" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- Dynamic JavaScript content will render here -->
        </div>
    </section>

    <section id="cloud-storage" class="py-16 bg-slate-950/80 border-y border-slate-800/80 relative overflow-hidden">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="glass-card rounded-3xl p-8 md:p-12 border border-cyan-500/20 relative">
                <div class="absolute -right-10 -bottom-10 w-72 h-72 bg-cyan-500/10 rounded-full blur-3xl pointer-events-none"></div>
                
                <div class="grid grid-cols-1 md:grid-cols-12 gap-8 items-center">
                    <div class="md:col-span-7 space-y-4">
                        <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-cyan-500/10 text-cyan-400 text-xs font-semibold border border-cyan-500/20">
                            <i class="fa-solid fa-cloud"></i> High-Speed Central Cloud Storage
                        </div>
                        <h2 class="text-2xl sm:text-3xl font-bold text-white">Akses Penyimpanan Berkas RAW & Video Mentah 4K</h2>
                        <p class="text-gray-400 text-sm leading-relaxed">
                            Seluruh hasil rekaman asli dan foto kualitas penuh disimpan terpusat di Cloud Storage resmi kami. Pengiriman link unduhan instan langsung diberikan setelah transaksi terkonfirmasi.
                        </p>
                        <div class="pt-2">
                            <div class="inline-flex items-center gap-3 bg-slate-900/90 border border-slate-700/80 px-4 py-3 rounded-xl">
                                <i class="fa-solid fa-envelope text-cyan-400 text-lg"></i>
                                <div class="text-left">
                                    <p class="text-[10px] text-gray-400 uppercase tracking-wider">Dedicated Cloud Account</p>
                                    <p class="text-sm font-mono font-bold text-white">dwikirahadian24@gmail.com</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="md:col-span-5 bg-slate-900/60 p-6 rounded-2xl border border-slate-800 space-y-3 text-xs text-gray-300">
                        <div class="flex items-center gap-3">
                            <i class="fa-solid fa-circle-check text-cyan-400 text-base"></i>
                            <span>Akses unduhan cepat via Google Drive Dedicated Storage</span>
                        </div>
                        <div class="flex items-center gap-3">
                            <i class="fa-solid fa-circle-check text-cyan-400 text-base"></i>
                            <span>Format File Asli: DNG RAW, 10-Bit D-Log M, MP4 4K</span>
                        </div>
                        <div class="flex items-center gap-3">
                            <i class="fa-solid fa-circle-check text-cyan-400 text-base"></i>
                            <span>Tanpa Kompresi Kualitas Gambar & Frame Rate</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="tentang" class="py-20 bg-slate-950/40">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
                
                <!-- Creator & Drone Profile Card -->
                <div class="lg:col-span-5 relative">
                    <div class="relative rounded-3xl overflow-hidden glass-card p-3 border-slate-700/50">
                        <!-- Gambar Drone DJI Lito X1 -->
                        <img src="https://images.unsplash.com/photo-1527977966376-1c8408f9f108?q=80&w=800&auto=format&fit=crop" alt="DJI Lito X1 Drone - Dwiki Ananda" class="w-full h-96 object-cover rounded-2xl">
                        <div class="absolute bottom-6 left-6 right-6 glass-card p-4 rounded-xl border border-slate-700/80">
                            <div class="flex items-center justify-between">
                                <div>
                                    <h4 class="text-white font-bold text-lg">Dwiki Ananda</h4>
                                    <p class="text-xs text-cyan-400">Drone Pilot & Aerial Creator CapungTerbang.id</p>
                                </div>
                                <a href="https://www.tiktok.com/@capungterbang.id?_r=1&_t=ZS-9A6ELqp5A8o" target="_blank" class="bg-slate-800 hover:bg-cyan-500 hover:text-slate-950 text-white p-2.5 rounded-lg text-xs font-bold transition-all" title="TikTok Profile">
                                    <i class="fa-brands fa-tiktok"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Creator Info & Drone Specs -->
                <div class="lg:col-span-7 space-y-6">
                    <div class="inline-block px-3 py-1 rounded-full bg-cyan-500/10 text-cyan-400 text-xs font-semibold border border-cyan-500/20">
                        Tentang Kreator & Peralatan
                    </div>
                    <h2 class="text-3xl sm:text-4xl font-bold text-white">Menghadirkan Keindahan Aerial dengan Presisi DJI Lito X1</h2>
                    <p class="text-gray-400 text-sm leading-relaxed">
                        Selamat datang di CapungTerbang.id! Dikelola langsung oleh Dwiki Ananda, platform ini didedikasikan untuk menyajikan karya fotografi dan videografi udara terbaik. Menggunakan drone generasi terbaru untuk memastikan setiap sudut visual terabadikan dengan tajam, jernih, dan sinematik.
                    </p>

                    <!-- Drone Kit Specifications -->
                    <div class="pt-4">
                        <h3 class="text-sm font-bold text-white uppercase tracking-wider mb-4 text-cyan-400 flex items-center gap-2">
                            <i class="fa-solid fa-helicopter"></i> Drone Kit Spesifikasi Utama:
                        </h3>
                        <div class="glass-card p-6 rounded-2xl border-slate-800">
                            <div class="flex items-center justify-between mb-4 pb-3 border-b border-slate-800">
                                <div>
                                    <h4 class="text-lg font-bold text-white">DJI Lito X1</h4>
                                    <p class="text-xs text-cyan-400">Compact Ultra-Lightweight Flagship Drone</p>
                                </div>
                                <span class="bg-cyan-500/20 text-cyan-400 text-[11px] px-3 py-1 rounded-full font-semibold border border-cyan-500/30">&lt; 249 Gram</span>
                            </div>

                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 text-xs">
                                <div class="space-y-1">
                                    <p class="text-gray-400">Sensor Kamera:</p>
                                    <p class="text-white font-semibold">1/1.3-inch CMOS 48 MP</p>
                                </div>
                                <div class="space-y-1">
                                    <p class="text-gray-400">Perekaman Video:</p>
                                    <p class="text-white font-semibold">4K/60fps HDR & 4K/100fps Slow-mo</p>
                                </div>
                                <div class="space-y-1">
                                    <p class="text-gray-400">Sistem Transmisi Video:</p>
                                    <p class="text-white font-semibold">DJI O4 Transmission (Hingga 15 KM)</p>
                                </div>
                                <div class="space-y-1">
                                    <p class="text-gray-400">Sistem Keamanan Flight:</p>
                                    <p class="text-white font-semibold">Omnidirectional Sensing + LiDAR Sensor</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

                <!-- Creator Info & Drone Specs -->
                <div class="lg:col-span-7 space-y-6">
                    <div class="inline-block px-3 py-1 rounded-full bg-cyan-500/10 text-cyan-400 text-xs font-semibold border border-cyan-500/20">
                        Tentang Kreator & Peralatan
                    </div>
                    <h2 class="text-3xl sm:text-4xl font-bold text-white">Menghadirkan Keindahan Aerial dengan Presisi DJI Lito X1</h2>
                    <p class="text-gray-400 text-sm leading-relaxed">
                        Selamat datang di CapungTerbang.id! Dikelola langsung oleh Dwiki Ananda, platform ini didedikasikan untuk menyajikan karya fotografi dan videografi udara terbaik. Menggunakan drone generasi terbaru untuk memastikan setiap sudut visual terabadikan dengan tajam, jernih, dan sinematik.
                    </p>

                    <!-- Drone Kit Specifications -->
                    <div class="pt-4">
                        <h3 class="text-sm font-bold text-white uppercase tracking-wider mb-4 text-cyan-400 flex items-center gap-2">
                            <i class="fa-solid fa-helicopter"></i> Drone Kit Spesifikasi Utama:
                        </h3>
                        <div class="glass-card p-6 rounded-2xl border-slate-800">
                            <div class="flex items-center justify-between mb-4 pb-3 border-b border-slate-800">
                                <div>
                                    <h4 class="text-lg font-bold text-white">DJI Lito X1</h4>
                                    <p class="text-xs text-cyan-400">Compact Ultra-Lightweight Flagship Drone</p>
                                </div>
                                <span class="bg-cyan-500/20 text-cyan-400 text-[11px] px-3 py-1 rounded-full font-semibold border border-cyan-500/30">&lt; 249 Gram</span>
                            </div>

                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 text-xs">
                                <div class="space-y-1">
                                    <p class="text-gray-400">Sensor Kamera:</p>
                                    <p class="text-white font-semibold">1/1.3-inch CMOS 48 MP</p>
                                </div>
                                <div class="space-y-1">
                                    <p class="text-gray-400">Perekaman Video:</p>
                                    <p class="text-white font-semibold">4K/60fps HDR & 4K/100fps Slow-mo</p>
                                </div>
                                <div class="space-y-1">
                                    <p class="text-gray-400">Sistem Transmisi Video:</p>
                                    <p class="text-white font-semibold">DJI O4 Transmission (Hingga 15 KM)</p>
                                </div>
                                <div class="space-y-1">
                                    <p class="text-gray-400">Sistem Keamanan Flight:</p>
                                    <p class="text-white font-semibold">Omnidirectional Sensing + LiDAR Sensor</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- Detail Preview Modal -->
    <div id="previewModal" class="fixed inset-0 z-50 hidden flex items-center justify-center p-4 bg-slate-950/80 backdrop-blur-md">
        <div class="glass-card bg-slate-900 border border-slate-700/80 rounded-3xl max-w-4xl w-full max-h-[90vh] overflow-y-auto shadow-2xl relative">
            <button onclick="closePreviewModal()" class="absolute top-4 right-4 z-10 bg-slate-800/80 hover:bg-slate-700 text-gray-300 hover:text-white w-10 h-10 rounded-full flex items-center justify-center transition-colors">
                <i class="fa-solid fa-xmark text-lg"></i>
            </button>

            <div class="grid grid-cols-1 md:grid-cols-12 gap-0">
                <!-- Preview Container -->
                <div id="modalMediaContainer" class="md:col-span-7 bg-black flex items-center justify-center relative min-h-[250px] md:min-h-[400px]">
                    <span id="modalTypeBadge" class="absolute top-4 left-4 z-10 bg-slate-900/80 border border-slate-700 text-cyan-400 text-xs px-3 py-1 rounded-full font-bold"></span>
                </div>

                <!-- Detail & Pricing Options -->
                <div class="md:col-span-5 p-6 flex flex-col justify-between">
                    <div>
                        <span id="modalCategory" class="text-xs text-cyan-400 font-semibold uppercase tracking-wider"></span>
                        <h3 id="modalTitle" class="text-2xl font-bold text-white mt-1"></h3>
                        <p id="modalLocation" class="text-xs text-gray-400 mt-1 flex items-center gap-1">
                            <i class="fa-solid fa-location-dot text-cyan-400"></i> <span></span>
                        </p>

                        <!-- Specifications List -->
                        <div class="mt-6 space-y-2 border-t border-b border-slate-800 py-4 text-xs">
                            <div class="flex justify-between"><span class="text-gray-400">Resolusi:</span><span id="modalRes" class="text-white font-semibold"></span></div>
                            <div class="flex justify-between"><span class="text-gray-400">Drone Kit:</span><span id="modalDrone" class="text-white font-semibold">DJI Lito X1</span></div>
                            <div class="flex justify-between"><span class="text-gray-400">Format File:</span><span id="modalFormat" class="text-white font-semibold">MP4 / DNG RAW</span></div>
                            <div class="flex justify-between"><span class="text-gray-400">Cloud Storage:</span><span class="text-cyan-400 font-semibold">Google Drive Link</span></div>
                        </div>

                        <!-- License Selection Option -->
                        <div class="mt-4">
                            <label class="text-xs text-gray-300 font-semibold mb-2 block">Pilih Opsi Lisensi Penggunaan:</label>
                            <select id="licenseSelect" onchange="updateModalPrice()" class="w-full bg-slate-800 border border-slate-700 rounded-xl px-3 py-2.5 text-xs text-white focus:outline-none focus:border-cyan-500">
                                <option value="personal">Lisensi Personal / Medsos (Rp <span class="base-price"></span>)</option>
                                <option value="commercial">Lisensi Komersial / Iklan (Rp <span class="comm-price"></span>)</option>
                            </select>
                        </div>
                    </div>

                    <div class="mt-8 pt-4 border-t border-slate-800 flex items-center justify-between">
                        <div>
                            <p class="text-[10px] text-gray-400">Total Harga</p>
                            <h4 id="modalTotalPrice" class="text-xl font-extrabold text-cyan-400"></h4>
                        </div>
                        <a id="modalWaBtn" href="#" target="_blank" class="bg-gradient-to-r from-green-500 to-emerald-600 hover:from-green-400 hover:to-emerald-500 text-slate-950 font-bold px-5 py-3 rounded-full text-xs transition-all flex items-center gap-2 shadow-lg">
                            <i class="fa-solid fa-cart-shopping"></i> Beli via WA
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Local File Upload Modal -->
    <div id="uploadModal" class="fixed inset-0 z-50 hidden flex items-center justify-center p-4 bg-slate-950/80 backdrop-blur-md">
        <div class="glass-card bg-slate-900 border border-slate-700/80 rounded-3xl max-w-lg w-full p-6 shadow-2xl relative">
            <button onclick="closeUploadModal()" class="absolute top-4 right-4 text-gray-400 hover:text-white text-lg">
                <i class="fa-solid fa-xmark"></i>
            </button>

            <h3 class="text-xl font-bold text-white mb-1">Unggah Karya Aerial Baru</h3>
            <p class="text-xs text-gray-400 mb-6">Pilih foto/video langsung dari HP atau Laptop Anda.</p>

            <form id="uploadForm" onsubmit="handleUpload(event)" class="space-y-4 text-xs">
                <div>
                    <label class="block text-gray-300 font-semibold mb-1">Judul Karya</label>
                    <input type="text" id="upTitle" required placeholder="Contoh: Sunset Pantai Anyer Aerial" class="w-full bg-slate-800 border border-slate-700 rounded-xl p-3 text-white focus:outline-none focus:border-cyan-500">
                </div>

                <div>
                    <label class="block text-gray-300 font-semibold mb-1">Pilih Dokumen Foto / Video (HP / Laptop)</label>
                    <input type="file" id="upFile" accept="image/*,video/*" required class="w-full bg-slate-800 border border-slate-700 rounded-xl p-2.5 text-xs text-gray-300 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-xs file:font-semibold file:bg-cyan-500 file:text-slate-950 hover:file:bg-cyan-400 cursor-pointer">
                    <p class="text-[10px] text-gray-400 mt-1">Format didukung: MP4, MOV, JPG, PNG, WEBP, DNG, dll.</p>
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-gray-300 font-semibold mb-1">Kategori Utama</label>
                        <select id="upCategory" class="w-full bg-slate-800 border border-slate-700 rounded-xl p-3 text-white focus:outline-none focus:border-cyan-500">
                            <option value="landsekap">Landsekap</option>
                            <option value="cityscape">Perkotaan</option>
                            <option value="nature">Alam / Nature</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-gray-300 font-semibold mb-1">Harga Lisensi Dasar (Rp)</label>
                        <input type="number" id="upPrice" required placeholder="150000" class="w-full bg-slate-800 border border-slate-700 rounded-xl p-3 text-white focus:outline-none focus:border-cyan-500">
                    </div>
                </div>

                <div>
                    <label class="block text-gray-300 font-semibold mb-1">Lokasi Pengambilan</label>
                    <input type="text" id="upLocation" required placeholder="Contoh: Banten, Indonesia" class="w-full bg-slate-800 border border-slate-700 rounded-xl p-3 text-white focus:outline-none focus:border-cyan-500">
                </div>

                <div class="pt-4 flex justify-end gap-3">
                    <button type="button" onclick="closeUploadModal()" class="px-5 py-2.5 rounded-full bg-slate-800 text-gray-300 hover:bg-slate-700 font-semibold">Batal</button>
                    <button type="submit" id="submitBtn" class="px-6 py-2.5 rounded-full bg-cyan-500 hover:bg-cyan-400 text-slate-950 font-bold shadow-md flex items-center gap-2">
                        <i class="fa-solid fa-file-arrow-up"></i>
                        <span>Unggah Berkas</span>
                    </button>
                </div>
            </form>
        </div>
    </div>

    <footer id="kontak" class="bg-slate-950 border-t border-slate-800/80 pt-16 pb-12 mt-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8 mb-12">
                <div class="space-y-4 md:col-span-1">
                    <a href="#" class="flex items-center space-x-3">
                        <div class="w-8 h-8 rounded-lg bg-gradient-to-tr from-cyan-500 to-blue-600 flex items-center justify-center">
                            <i class="fa-solid fa-helicopter text-slate-950 text-sm"></i>
                        </div>
                        <span class="text-xl font-extrabold text-white">CapungTerbang<span class="gradient-text">.id</span></span>
                    </a>
                    <p class="text-xs text-gray-400 leading-relaxed">
                        Platform penyedia stok video & foto udara berkualitas sinematik berlisensi resmi oleh Dwiki Ananda.
                    </p>
                </div>

                <div>
                    <h4 class="text-sm font-bold text-white mb-4">Navigasi</h4>
                    <ul class="space-y-2 text-xs text-gray-400">
                        <li><a href="#galeri" class="hover:text-cyan-400 transition-colors">Galeri Stok Aerial</a></li>
                        <li><a href="#kategori" class="hover:text-cyan-400 transition-colors">Pilihan Kategori</a></li>
                        <li><a href="#cloud-storage" class="hover:text-cyan-400 transition-colors">Cloud Storage System</a></li>
                        <li><a href="#tentang" class="hover:text-cyan-400 transition-colors">Kreator & DJI Lito X1</a></li>
                    </ul>
                </div>

                <div>
                    <h4 class="text-sm font-bold text-white mb-4">Penyimpanan & Lisensi</h4>
                    <ul class="space-y-2 text-xs text-gray-400">
                        <li><a href="#" class="hover:text-cyan-400 transition-colors">Lisensi Personal Media</a></li>
                        <li><a href="#" class="hover:text-cyan-400 transition-colors">Lisensi Iklan Komersial</a></li>
                        <li><span class="text-gray-500">Cloud Storage: dwikirahadian24@gmail.com</span></li>
                    </ul>
                </div>

                <div>
                    <h4 class="text-sm font-bold text-white mb-4">Kontak Dwiki Ananda</h4>
                    <div class="space-y-3 text-xs text-gray-400">
                        <a href="https://wa.me/6289646985614" target="_blank" class="flex items-center gap-2 hover:text-cyan-400 transition-colors">
                            <i class="fa-brands fa-whatsapp text-cyan-400 text-sm"></i> +62 896-4698-5614
                        </a>
                        <a href="https://www.tiktok.com/@capungterbang.id?_r=1&_t=ZS-9A6ELqp5A8o" target="_blank" class="flex items-center gap-2 hover:text-cyan-400 transition-colors">
                            <i class="fa-brands fa-tiktok text-cyan-400 text-sm"></i> @capungterbang.id
                        </a>
                        <p class="flex items-center gap-2"><i class="fa-solid fa-envelope text-cyan-400"></i> dwikirahadian24@gmail.com</p>
                    </div>
                </div>
            </div>

            <div class="pt-8 border-t border-slate-900 flex flex-col sm:flex-row justify-between items-center text-xs text-gray-500 gap-4">
                <p>&copy; 2026 CapungTerbang.id (Dwiki Ananda). All Rights Reserved.</p>
                <div class="flex space-x-4 text-base text-gray-400">
                    <a href="https://www.tiktok.com/@capungterbang.id?_r=1&_t=ZS-9A6ELqp5A8o" target="_blank" class="hover:text-cyan-400 transition-colors" title="TikTok"><i class="fa-brands fa-tiktok"></i></a>
                    <a href="https://wa.me/6289646985614" target="_blank" class="hover:text-cyan-400 transition-colors" title="WhatsApp"><i class="fa-brands fa-whatsapp"></i></a>
                </div>
            </div>
        </div>
    </footer>

    <script>
        let items = @json($galeri).map(item => ({
            ...item,
            mediaUrl: item.url,
            type: item.tipe_file,
            category: item.nama_kategori,
            title: item.judul_karya,
            location: item.lokasi_pengambilan,
            price: Number(item.harga),
            resolution: item.tipe_file === 'video' ? 'Video' : 'Foto',
            drone: 'DJI Lito X1'
        }));
        let activeFilter = 'all';
        let selectedItem = null;
        const myPhoneNumber = "6289646985614";

        // IndexedDB untuk Penyimpanan Permanen
        const DB_NAME = 'CapungTerbangDB';
        const DB_VERSION = 1;
        const STORE_NAME = 'galleryItems';
        let db;

        function initDB() {
            return new Promise((resolve, reject) => {
                const request = indexedDB.open(DB_NAME, DB_VERSION);
                request.onupgradeneeded = function(e) {
                    db = e.target.result;
                    if (!db.objectStoreNames.contains(STORE_NAME)) {
                        db.createObjectStore(STORE_NAME, { keyPath: 'id' });
                    }
                };
                request.onsuccess = function(e) {
                    db = e.target.result;
                    resolve(db);
                };
                request.onerror = function(e) {
                    reject(e);
                };
            });
        }

        async function loadItemsFromDB() {
            if (!db) await initDB();
            return new Promise((resolve) => {
                const tx = db.transaction(STORE_NAME, 'readonly');
                const store = tx.objectStore(STORE_NAME);
                const req = store.getAll();
                req.onsuccess = function() {
                    items = req.result || [];
                    items.sort((a, b) => b.id - a.id);
                    items.forEach(item => {
                        if (item.fileBlob) {
                            item.mediaUrl = URL.createObjectURL(item.fileBlob);
                        }
                    });
                    resolve(items);
                };
            });
        }

        async function saveItemToDB(item) {
            if (!db) await initDB();
            return new Promise((resolve) => {
                const tx = db.transaction(STORE_NAME, 'readwrite');
                const store = tx.objectStore(STORE_NAME);
                const itemToSave = { ...item };
                delete itemToSave.mediaUrl;
                store.put(itemToSave);
                tx.oncomplete = () => resolve();
            });
        }

        async function deleteItemFromDB(id) {
            if (!db) await initDB();
            return new Promise((resolve) => {
                const tx = db.transaction(STORE_NAME, 'readwrite');
                const store = tx.objectStore(STORE_NAME);
                store.delete(id);
                tx.oncomplete = () => resolve();
            });
        }

        // Watermark Generator Foto
        function applyWatermarkToImage(file) {
            return new Promise((resolve) => {
                const img = new Image();
                const reader = new FileReader();

                reader.onload = function(e) {
                    img.onload = function() {
                        const canvas = document.createElement('canvas');
                        canvas.width = img.width;
                        canvas.height = img.height;
                        const ctx = canvas.getContext('2d');

                        ctx.drawImage(img, 0, 0);

                        const fontSize = Math.max(16, Math.round(canvas.width / 25));
                        ctx.font = `bold ${fontSize}px "Plus Jakarta Sans", sans-serif`;
                        const watermarkText = "CapungTerbang.id";

                        const padding = fontSize * 0.8;
                        const textMetrics = ctx.measureText(watermarkText);
                        const x = canvas.width - textMetrics.width - padding;
                        const y = canvas.height - padding;

                        ctx.shadowColor = "rgba(0, 0, 0, 0.85)";
                        ctx.shadowOffsetX = 3;
                        ctx.shadowOffsetY = 3;
                        ctx.shadowBlur = 6;

                        ctx.fillStyle = "#00f2fe";
                        ctx.fillText(watermarkText, x, y);

                        canvas.toBlob((blob) => {
                            resolve(blob);
                        }, file.type || 'image/jpeg', 0.92);
                    };
                    img.src = e.target.result;
                };
                reader.readAsDataURL(file);
            });
        }
        
        function escapeHtml(value) {
            return String(value ?? '').replace(/[&<>"']/g, char => ({
                '&': '&amp;',
                '<': '&lt;',
                '>': '&gt;',
                '"': '&quot;',
                "'": '&#039;'
            })[char]);
        }

        function renderGallery() {
            const grid = document.getElementById('galleryGrid');
            if (!grid) return;

            const searchInput =
                document.getElementById('searchInput') ||
                document.getElementById('searchInputMobile');

            const searchVal = (searchInput?.value || '').toLowerCase().trim();

            const filteredItems = items.filter(item => {
                let matchFilter = true;

                if (activeFilter === 'type:video') {
                    matchFilter = item.type === 'video';
                } else if (activeFilter === 'type:photo') {
                    matchFilter = item.type === 'photo';
                } else if (activeFilter.startsWith('category:')) {
                    const categoryId = Number(activeFilter.split(':')[1]);
                    matchFilter = Number(item.kategori_id) === categoryId;
                }

                const matchSearch =
                    String(item.title || '').toLowerCase().includes(searchVal) ||
                    String(item.location || '').toLowerCase().includes(searchVal) ||
                    String(item.category || '').toLowerCase().includes(searchVal);

                return matchFilter && matchSearch;
            });

            grid.innerHTML = '';

            if (filteredItems.length === 0) {
                grid.innerHTML = `
                    <div class="col-span-full py-20 text-center
                                text-gray-400 glass-card rounded-3xl
                                border border-dashed border-slate-800">
                        <i class="fa-solid fa-cloud-arrow-up text-5xl
                                text-cyan-500/50 mb-4"></i>
                        <p class="text-lg font-bold text-white">
                            Belum Ada Karya Aerial
                        </p>
                        <p class="text-xs text-gray-400 mt-2">
                            Belum ada foto atau video pada kategori ini.
                        </p>
                    </div>
                `;
                return;
            }

            filteredItems.forEach(item => {
                const card = document.createElement('div');

                card.className =
                    'glass-card rounded-2xl overflow-hidden border border-slate-800 ' +
                    'hover:border-cyan-500/50 transition-all duration-300 group ' +
                    'flex flex-col justify-between relative';

                const title = escapeHtml(item.title);
                const category = escapeHtml(item.category);
                const location = escapeHtml(item.location);
                const mediaUrl = escapeHtml(item.mediaUrl);
                const type = item.type === 'video' ? 'video' : 'photo';

                const mediaElement = type === 'video'
                    ? `
                        <video
                            src="${mediaUrl}"
                            controls
                            preload="metadata"
                            controlsList="nodownload"
                            class="w-full h-full object-contain bg-black">
                            Browser kamu tidak mendukung video.
                        </video>
                    `
                    : `
                        <img
                            src="${mediaUrl}"
                            alt="${title}"
                            loading="lazy"
                            class="w-full h-full object-cover
                                group-hover:scale-105 transition-transform duration-500"
                            onerror="this.style.display='none'">
                    `;

                const price = Number(item.price || 0).toLocaleString('id-ID');

                card.innerHTML = `
                    <div>
                        <div class="relative h-56 overflow-hidden bg-slate-950
                                    flex items-center justify-center">
                            ${mediaElement}

                            <div class="absolute top-3 left-3 z-10 pointer-events-none">
                                <span class="bg-slate-950/80 backdrop-blur-md
                                            border border-slate-700/60 text-cyan-400
                                            text-[10px] font-bold px-2.5 py-1 rounded-md">
                                    <i class="fa-solid ${type === 'video'
                                        ? 'fa-video' : 'fa-camera'} mr-1"></i>
                                    ${type === 'video' ? 'VIDEO' : 'FOTO'}
                                </span>
                            </div>
                        </div>

                        <div class="p-5">
                            <p class="text-[11px] text-cyan-400 font-semibold
                                    uppercase tracking-wider mb-1">
                                ${category}
                            </p>

                            <h3 class="text-lg font-bold text-white
                                    group-hover:text-cyan-300 transition-colors">
                                ${title}
                            </h3>

                            <p class="text-xs text-gray-400 mt-2
                                    flex items-center gap-1.5">
                                <i class="fa-solid fa-location-dot text-slate-500"></i>
                                ${location}
                            </p>
                        </div>
                    </div>

                    <div class="px-5 pb-5 pt-3 border-t border-slate-800/60
                                flex items-center justify-between gap-3">
                        <div>
                            <span class="text-[10px] text-gray-400 block">Mulai Dari</span>
                            <span class="text-base font-extrabold text-white">
                                Rp ${price}
                            </span>
                        </div>

                        <div class="flex items-center gap-2">
                            <button
                                type="button"
                                class="preview-btn bg-slate-800 hover:bg-slate-700
                                    text-cyan-400 p-2.5 rounded-xl text-xs
                                    transition-colors flex items-center gap-1 font-semibold">
                                <i class="fa-solid fa-expand"></i> Detail
                            </button>

                            <a
                                href="${getWaUrl(item, 'personal')}"
                                target="_blank"
                                rel="noopener noreferrer"
                                class="bg-cyan-500 hover:bg-cyan-400 text-slate-950
                                    font-bold px-3.5 py-2 rounded-xl text-xs
                                    transition-colors flex items-center gap-1">
                                <i class="fa-solid fa-cart-shopping"></i> Beli
                            </a>
                        </div>
                    </div>
                `;

                card.querySelector('.preview-btn').addEventListener('click', () => {
                    openPreviewModal(item.id);
                });

                grid.appendChild(card);
            });
        }

        async function deleteGalleryItem(id) {
            const confirmed = confirm("Apakah Anda yakin ingin menghapus karya ini secara permanen?");
            if (!confirmed) return;

            const targetIndex = items.findIndex(i => i.id === id);
            if (targetIndex !== -1) {
                if (items[targetIndex].mediaUrl) {
                    URL.revokeObjectURL(items[targetIndex].mediaUrl);
                }
                items.splice(targetIndex, 1);
                await deleteItemFromDB(id);
                renderGallery();
            }
        }

        function setFilter(filterCategory) {
            activeFilter = filterCategory;

            document.querySelectorAll('.filter-btn').forEach(btn => {
                const isActive = btn.dataset.filter === filterCategory;

                btn.className = isActive
                    ? 'filter-btn active px-4 py-2 rounded-lg text-xs font-semibold ' +
                    'transition-all bg-cyan-500 text-slate-950'
                    : 'filter-btn px-4 py-2 rounded-lg text-xs font-semibold ' +
                    'text-gray-400 hover:text-white transition-all';
            });

            renderGallery();
        }

        function filterGallery() {
            renderGallery();
        }

        function filterGalleryMobile() {
            renderGallery();
        }

        function getWaUrl(item, licenseType) {
            const finalPrice = licenseType === 'commercial' ? item.price * 2 : item.price;
            const text = `Halo CapungTerbang.id (Dwiki Ananda), saya ingin membeli lisensi (${licenseType.toUpperCase()}) karya drone berikut:\n\n` +
                         `*Judul Karya:* ${item.title}\n` +
                         `*Tipe File:* ${item.type.toUpperCase()}\n` +
                         `*Lokasi:* ${item.location}\n` +
                         `*Drone:* ${item.drone}\n` +
                         `*Harga Lisensi:* Rp ${finalPrice.toLocaleString('id-ID')}\n\n` +
                         `Mohon informasi pembayaran dan link unduhan Cloud Storage. Terima kasih!`;
            return `https://wa.me/${myPhoneNumber}?text=${encodeURIComponent(text)}`;
        }

        function openPreviewModal(id) {
            selectedItem = items.find(i => i.id === id);
            if (!selectedItem) return;

            const container = document.getElementById('modalMediaContainer');
            container.innerHTML = `<span id="modalTypeBadge" class="absolute top-4 left-4 z-10 bg-slate-900/80 border border-slate-700 text-cyan-400 text-xs px-3 py-1 rounded-full font-bold"></span>`;

            if (selectedItem.type === 'video') {
                const videoElement = document.createElement('video');
                videoElement.src = selectedItem.mediaUrl;
                videoElement.controls = true;
                // Penambahan pembatasan kontrol fullscreen pada modal preview
                videoElement.setAttribute('controlsList', 'nofullscreen nodownload');
                videoElement.setAttribute('disablepictureinpicture', 'true');
                videoElement.ondblclick = () => false;
                videoElement.autoplay = true;
                videoElement.className = 'w-full h-full max-h-[450px] object-contain bg-black';
                container.appendChild(videoElement);
            } else {
                const imgElement = document.createElement('img');
                imgElement.src = selectedItem.mediaUrl;
                imgElement.alt = selectedItem.title;
                imgElement.className = 'w-full h-full max-h-[450px] object-cover';
                container.appendChild(imgElement);
            }

            document.getElementById('modalTypeBadge').innerText = selectedItem.type.toUpperCase();
            document.getElementById('modalCategory').innerText = selectedItem.category;
            document.getElementById('modalTitle').innerText = selectedItem.title;
            document.getElementById('modalLocation').querySelector('span').innerText = selectedItem.location;
            document.getElementById('modalRes').innerText = selectedItem.resolution;
            document.getElementById('modalDrone').innerText = selectedItem.drone;

            const licenseSelect = document.getElementById('licenseSelect');
            licenseSelect.value = 'personal';

            updateModalPrice();
            document.getElementById('previewModal').classList.remove('hidden');
        }

        function updateModalPrice() {
            if (!selectedItem) return;
            const licenseType = document.getElementById('licenseSelect').value;
            const commPrice = selectedItem.price * 2;

            document.querySelector('.base-price').innerText = selectedItem.price.toLocaleString('id-ID');
            document.querySelector('.comm-price').innerText = commPrice.toLocaleString('id-ID');

            const currentPrice = licenseType === 'commercial' ? commPrice : selectedItem.price;
            document.getElementById('modalTotalPrice').innerText = `Rp ${currentPrice.toLocaleString('id-ID')}`;

            document.getElementById('modalWaBtn').href = getWaUrl(selectedItem, licenseType);
        }

        function closePreviewModal() {
            const container = document.getElementById('modalMediaContainer');
            const video = container.querySelector('video');
            if (video) {
                video.pause();
            }
            document.getElementById('previewModal').classList.add('hidden');
        }

        function openUploadModal() {
            document.getElementById('uploadModal').classList.remove('hidden');
        }

        function closeUploadModal() {
            document.getElementById('uploadModal').classList.add('hidden');
        }

        async function handleUpload(e) {
            e.preventDefault();
            
            const fileInput = document.getElementById('upFile');
            const originalFile = fileInput.files[0];

            if (!originalFile) {
                alert("Silakan pilih dokumen foto atau video terlebih dahulu.");
                return;
            }

            const submitBtn = document.getElementById('submitBtn');
            submitBtn.disabled = true;
            submitBtn.innerHTML = `<i class="fa-solid fa-spinner animate-spin"></i> Memproses...`;

            try {
                const isVideo = originalFile.type.startsWith('video/');
                const mediaType = isVideo ? 'video' : 'foto';
                const defaultResolution = isVideo ? '4K UHD (60 FPS)' : '48 Megapixel RAW';

                let finalFileBlob = originalFile;

                if (!isVideo) {
                    finalFileBlob = await applyWatermarkToImage(originalFile);
                }

                const localMediaUrl = URL.createObjectURL(finalFileBlob);

                const newItem = {
                    id: Date.now(),
                    title: document.getElementById('upTitle').value,
                    type: mediaType,
                    category: document.getElementById('upCategory').value,
                    resolution: defaultResolution,
                    location: document.getElementById('upLocation').value,
                    price: parseInt(document.getElementById('upPrice').value) || 150000,
                    drone: 'DJI Lito X1',
                    mediaUrl: localMediaUrl,
                    fileBlob: finalFileBlob
                };

                await saveItemToDB(newItem);
                
                items.unshift(newItem);
                renderGallery();
                closeUploadModal();
                document.getElementById('uploadForm').reset();
                
                document.getElementById('galeri').scrollIntoView({ behavior: 'smooth' });
            } catch (err) {
                console.error("Gagal mengunggah berkas:", err);
                alert("Terjadi kesalahan saat memproses berkas.");
            } finally {
                submitBtn.disabled = false;
                submitBtn.innerHTML = `<i class="fa-solid fa-file-arrow-up"></i><span>Unggah Berkas</span>`;
            }
        }

        function toggleMobileMenu() {
            const menu = document.getElementById('mobileMenu');
            menu.classList.toggle('hidden');
        }

        window.onclick = function(event) {
            const previewModal = document.getElementById('previewModal');
            const uploadModal = document.getElementById('uploadModal');
            if (event.target === previewModal) closePreviewModal();
            if (event.target === uploadModal) closeUploadModal();
        }

        document.addEventListener('DOMContentLoaded', function () {
            renderGallery();
        });
    </script>
</body>
</html>