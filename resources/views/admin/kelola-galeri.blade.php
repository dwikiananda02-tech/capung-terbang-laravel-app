<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Dashboard Admin | CapungTerbang.id</title>

    <!-- Google Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link
        href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap"
        rel="stylesheet"
    >

    <!-- Font Awesome -->
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
    >

    <!-- icon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('images/capung-terbang.ico') }}">

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Konfigurasi tema CapungTerbang.id -->
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
        };
    </script>

    <style>

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        :root {
            --dark-bg: #0b0f19;
            --dark-card: #151c2c;

            --cyan: #00f2fe;
            --blue: #4facfe;

            --text: #f3f4f6;
            --muted: #9ca3af;
        }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;

            background:
                radial-gradient(
                    circle at top right,
                    rgba(0, 242, 254, 0.06),
                    transparent 30%
                ),
                var(--dark-bg);

            color: var(--text);

            min-height: 100vh;
        }

        /* ================================
           NAVBAR
        ================================= */

        .navbar {
            height: 72px;

            background: rgba(11, 15, 25, 0.85);

            backdrop-filter: blur(16px);
            -webkit-backdrop-filter: blur(16px);

            border-bottom: 1px solid rgba(255, 255, 255, 0.07);

            display: flex;
            align-items: center;
            justify-content: space-between;

            padding: 0 35px;

            position: sticky;
            top: 0;

            z-index: 100;
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .brand-logo {
            width: 42px;
            height: 42px;

            border-radius: 12px;

            display: flex;
            align-items: center;
            justify-content: center;

            color: white;

            background: linear-gradient(
                135deg,
                #00f2fe 0%,
                #4facfe 100%
            );

            box-shadow:
                0 0 20px rgba(0, 242, 254, 0.25);
        }

        .brand-name {
            font-size: 17px;
            font-weight: 800;
        }

        .brand-name span {
            background: linear-gradient(
                135deg,
                #00f2fe,
                #4facfe
            );

            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .admin-section {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .admin-info {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .admin-avatar {
            width: 38px;
            height: 38px;

            border-radius: 50%;

            background: rgba(0, 242, 254, 0.1);

            border: 1px solid rgba(0, 242, 254, 0.25);

            display: flex;
            align-items: center;
            justify-content: center;

            color: var(--cyan);
        }

        .admin-name {
            font-size: 13px;
            font-weight: 600;
        }

        .admin-role {
            font-size: 10px;
            color: #6b7280;
            margin-top: 2px;
        }

        .logout-button {
            background: rgba(220, 38, 38, 0.10);

            color: #f87171;

            border: 1px solid rgba(248, 113, 113, 0.15);

            padding: 9px 14px;

            border-radius: 10px;

            cursor: pointer;

            font-family: 'Plus Jakarta Sans', sans-serif;

            font-size: 12px;
            font-weight: 600;

            display: flex;
            align-items: center;
            gap: 7px;

            transition: 0.3s ease;
        }

        .logout-button:hover {
            background: rgba(220, 38, 38, 0.20);

            border-color: rgba(248, 113, 113, 0.30);

            transform: translateY(-1px);
        }

        /* ================================
           MAIN
        ================================= */

        .container {
            width: 100%;
            max-width: 1400px;

            margin: auto;

            padding: 35px;
        }

        .welcome {
            margin-bottom: 30px;
        }

        .welcome h1 {
            font-size: 28px;
            font-weight: 800;

            margin-bottom: 8px;
        }

        .gradient-text {
            background: linear-gradient(
                135deg,
                #00f2fe 0%,
                #4facfe 100%
            );

            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .welcome p {
            color: var(--muted);
            font-size: 13px;
        }

        /* ================================
           STAT CARDS
        ================================= */

        .stats-grid {
            display: grid;

            grid-template-columns:
                repeat(4, 1fr);

            gap: 18px;

            margin-bottom: 30px;
        }

        .stat-card {
            background: rgba(21, 28, 44, 0.75);

            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);

            border: 1px solid rgba(255, 255, 255, 0.07);

            border-radius: 18px;

            padding: 22px;

            transition: 0.3s ease;
        }

        .stat-card:hover {
            transform: translateY(-3px);

            border-color: rgba(0, 242, 254, 0.20);

            box-shadow:
                0 0 25px rgba(0, 242, 254, 0.07);
        }

        .stat-top {
            display: flex;
            align-items: center;
            justify-content: space-between;

            margin-bottom: 15px;
        }

        .stat-icon {
            width: 42px;
            height: 42px;

            border-radius: 12px;

            display: flex;
            align-items: center;
            justify-content: center;

            color: var(--cyan);

            background: rgba(0, 242, 254, 0.08);
        }

        .stat-label {
            color: #9ca3af;
            font-size: 11px;
        }

        .stat-value {
            font-size: 25px;
            font-weight: 800;
        }

        /* ================================
           CONTENT CARD
        ================================= */

        .content-card {
            background: rgba(21, 28, 44, 0.75);

            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);

            border: 1px solid rgba(255, 255, 255, 0.07);

            border-radius: 20px;

            padding: 25px;

            margin-bottom: 25px;
        }

        .card-header {
            display: flex;
            align-items: center;
            justify-content: space-between;

            margin-bottom: 25px;
        }

        .card-title {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .card-title i {
            color: var(--cyan);
        }

        .card-title h2 {
            font-size: 17px;
        }

        .btn-primary {
            padding: 10px 15px;

            border: none;
            border-radius: 10px;

            background: linear-gradient(
                135deg,
                #00f2fe,
                #4facfe
            );

            color: white;

            font-family: 'Plus Jakarta Sans', sans-serif;

            font-size: 12px;
            font-weight: 700;

            cursor: pointer;

            display: flex;
            align-items: center;
            gap: 7px;

            transition: 0.3s ease;
        }

        .btn-primary:hover {
            transform: translateY(-2px);

            box-shadow:
                0 0 25px rgba(0, 242, 254, 0.25);
        }

        /* ================================
           INFO GRID
        ================================= */

        .info-grid {
            display: grid;

            grid-template-columns:
                repeat(2, 1fr);

            gap: 20px;
        }

        .info-item {
            background: rgba(11, 15, 25, 0.45);

            border: 1px solid rgba(255, 255, 255, 0.05);

            border-radius: 14px;

            padding: 18px;
        }

        .info-label {
            color: #6b7280;

            font-size: 11px;

            margin-bottom: 7px;
        }

        .info-value {
            font-size: 14px;
            font-weight: 600;
        }

        /* ================================
           QUICK MENU
        ================================= */

        .quick-grid {
            display: grid;

            grid-template-columns:
                repeat(3, 1fr);

            gap: 15px;
        }

        .quick-card {
            text-decoration: none;

            color: white;

            background: rgba(11, 15, 25, 0.45);

            border: 1px solid rgba(255, 255, 255, 0.05);

            border-radius: 15px;

            padding: 20px;

            transition: 0.3s ease;
        }

        .quick-card:hover {
            border-color: rgba(0, 242, 254, 0.25);

            transform: translateY(-3px);

            background: rgba(0, 242, 254, 0.04);
        }

        .quick-icon {
            width: 42px;
            height: 42px;

            border-radius: 12px;

            background: rgba(0, 242, 254, 0.08);

            color: var(--cyan);

            display: flex;
            align-items: center;
            justify-content: center;

            margin-bottom: 14px;
        }

        .quick-card h3 {
            font-size: 13px;
            margin-bottom: 5px;
        }

        .quick-card p {
            color: #6b7280;
            font-size: 11px;
        }

        /* ================================
           FOOTER
        ================================= */

        .footer {
            text-align: center;

            padding: 25px 0 10px;

            color: #4b5563;

            font-size: 10px;
        }

        .footer i {
            color: var(--cyan);
        }

        /* ================================
           RESPONSIVE
        ================================= */

        @media (max-width: 1000px) {

            .stats-grid {
                grid-template-columns:
                    repeat(2, 1fr);
            }

        }

        @media (max-width: 700px) {

            .navbar {
                padding: 0 18px;
            }

            .admin-info {
                display: none;
            }

            .container {
                padding: 25px 18px;
            }

            .welcome h1 {
                font-size: 23px;
            }

            .info-grid,
            .quick-grid {
                grid-template-columns: 1fr;
            }

        }

        @media (max-width: 500px) {

            .stats-grid {
                grid-template-columns: 1fr;
            }

            .brand-name {
                font-size: 14px;
            }

            .logout-button span {
                display: none;
            }

        }

        /* Glassmorphism untuk modal upload */
        .glass-card {
            background: rgba(21, 28, 44, 0.90);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.08);
        }

        /* Animasi modal */
        #uploadModal {
            transition: opacity 0.2s ease;
        }

        #uploadModal .glass-card {
            animation: modalEnter 0.25s ease-out;
        }

        @keyframes modalEnter {
            from {
                opacity: 0;
                transform: translateY(12px) scale(0.98);
            }

            to {
                opacity: 1;
                transform: translateY(0) scale(1);
            }
        }

        /* Input file agar tetap sesuai tema gelap */
        #uploadModal input[type="file"] {
            max-width: 100%;
        }

        #uploadModal input:focus,
        #uploadModal select:focus {
            outline: none;
            border-color: #00f2fe;
            box-shadow: 0 0 0 2px rgba(0, 242, 254, 0.08);
        }

        /* Scrollbar modal */
        #uploadModal .glass-card {
            max-height: 90vh;
            overflow-y: auto;
        }

    </style>
</head>

<body>

<!-- ================================
     NAVBAR
================================= -->

<nav class="navbar">

    <div class="brand">

        <div class="brand-logo">
            <i class="fas fa-helicopter"></i>
        </div>

        <div class="brand-name">
            CapungTerbang<span>.id</span>
        </div>

    </div>

    <div class="admin-section">

        <div class="admin-info">

            <div class="admin-avatar">
                <i class="fas fa-user"></i>
            </div>

            <div>

                <div class="admin-name">
                    {{ auth()->user()->name }}
                </div>

                <div class="admin-role">
                    Administrator
                </div>

            </div>

        </div>

        <form action="{{ route('logout') }}" method="POST">

            @csrf

            <button type="submit" class="logout-button">

                <i class="fas fa-right-from-bracket"></i>

                <span>Logout</span>

            </button>

        </form>

    </div>

</nav>


<!-- ================================
     MAIN CONTENT
================================= -->

<div class="container">
    @if (session('success'))
        <div class="mb-5 rounded-xl border border-cyan-500/30
                    bg-cyan-500/10 p-4 text-sm text-cyan-300">
            <i class="fas fa-circle-check mr-2"></i>
            {{ session('success') }}
        </div>
    @endif

    @if (session('error'))
        <div class="mb-5 rounded-xl border border-red-500/30
                    bg-red-500/10 p-4 text-sm text-red-300">
            <i class="fas fa-circle-exclamation mr-2"></i>
            {{ session('error') }}
        </div>
    @endif

    @if ($errors->any())
        <div class="mb-5 rounded-xl border border-red-500/30
                    bg-red-500/10 p-4 text-sm text-red-300">
            <p class="font-bold mb-2">Upload belum berhasil:</p>

            <ul class="list-disc pl-5 space-y-1">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Welcome -->
    <div class="welcome">

        <h1>
            Kelola Galeri
        </h1>

        <p>
            Kelola semua konten yang kamu mau.
        </p>

    </div>


    <!-- ================================
         STATISTICS
    ================================= -->

    <div class="stats-grid">

        <div class="stat-card">

            <div class="stat-top">

                <div>
                    <div class="stat-label">
                        Total Foto
                    </div>

                    <div class="stat-value">
                        {{ $totalFoto }}
                    </div>
                </div>

                <div class="stat-icon">
                    <i class="fas fa-image"></i>
                </div>

            </div>

        </div>


        <div class="stat-card">

            <div class="stat-top">

                <div>
                    <div class="stat-label">
                        Total Video
                    </div>

                    <div class="stat-value">
                        {{ $totalVideo }}
                    </div>
                </div>

                <div class="stat-icon">
                    <i class="fas fa-video"></i>
                </div>

            </div>

        </div>


        <div class="stat-card">

            <div class="stat-top">

                <div>
                    <div class="stat-label">
                        Total Konten
                    </div>

                    <div class="stat-value">
                        {{ $totalKonten }}
                    </div>
                </div>

                <div class="stat-icon">
                    <i class="fas fa-layer-group"></i>
                </div>

            </div>

        </div>


        <div class="stat-card">

            <div class="stat-top">

                <div>
                    <div class="stat-label">
                        Status Admin
                    </div>

                    <div class="stat-value"
                         style="font-size: 18px;">
                        Aktif
                    </div>
                </div>

                <div class="stat-icon">
                    <i class="fas fa-circle-check"></i>
                </div>

            </div>

        </div>

    </div>


    <!-- ================================
         Kelola Galeri
    ================================= -->

    <div class="content-card">

        <div class="card-header">

            <div class="card-title">

                <i class="fa-solid fa-gears"></i>

                <h2>
                    Kelola Galeri
                </h2>

            </div>

        </div>

        <!-- Daftar konten galeri -->
        <div class="mt-6">
            <div class="flex flex-col gap-4 mb-5 sm:flex-row sm:items-center sm:justify-between">
                <div>
                    <h3 class="text-lg font-bold text-white">Koleksi Konten</h3>
                    <p class="text-xs text-gray-400 mt-1">
                        Preview, filter, edit, dan hapus konten yang telah diunggah.
                    </p>
                </div>

                <button
                    type="button"
                    onclick="openCreateModal()"
                    class="btn-primary"
                >
                    <i class="fa-solid fa-plus"></i>
                    Upload Konten
                </button>
            </div>

            <!-- Filter kategori -->
            <div id="kategori"
                class="flex flex-wrap gap-2 glass-card p-2 rounded-xl border border-slate-800 mb-4">

                <button type="button" onclick="setFilter('all')"
                    data-filter="all"
                    class="filter-btn active px-4 py-2 rounded-lg text-xs font-semibold bg-cyan-500 text-slate-950">
                    Semua
                </button>

                <button type="button" onclick="setFilter('type:video')"
                    data-filter="type:video"
                    class="filter-btn px-4 py-2 rounded-lg text-xs font-semibold text-gray-400">
                    Video
                </button>

                <button type="button" onclick="setFilter('type:photo')"
                    data-filter="type:photo"
                    class="filter-btn px-4 py-2 rounded-lg text-xs font-semibold text-gray-400">
                    Foto
                </button>

                @foreach ($masterKategori as $itemKategori)
                    <button
                        type="button"
                        onclick="setFilter('category:{{ $itemKategori->id }}')"
                        data-filter="category:{{ $itemKategori->id }}"
                        class="filter-btn px-4 py-2 rounded-lg text-xs font-semibold text-gray-400"
                    >
                        {{ $itemKategori->nama_kategori }}
                    </button>
                @endforeach
            </div>

            <!-- Pencarian dan jumlah per halaman -->
            <div class="flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between mb-4">
                <input
                    id="gallerySearch"
                    type="search"
                    placeholder="Cari judul, lokasi, kategori..."
                    oninput="applyGalleryFilters()"
                    class="w-full sm:max-w-sm bg-slate-900 border border-slate-700 rounded-xl p-3 text-sm text-white"
                >

                <div class="flex items-center gap-2 text-xs text-gray-400">
                    <label for="pageSize">Tampilkan</label>
                    <select id="pageSize" onchange="changePageSize()"
                        class="bg-slate-900 border border-slate-700 rounded-lg p-2 text-white">
                        <option value="6">6</option>
                        <option value="9" selected>9</option>
                        <option value="12">12</option>
                        <option value="24">24</option>
                        <option value="all">Semua</option>
                    </select>
                    <span>konten</span>
                </div>
            </div>

            <!-- Area scroll galeri -->
            <div id="galleryScrollArea"
                class="max-h-[760px] overflow-y-auto overflow-x-hidden pr-1">

                <div id="galleryGrid"
                    class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-3 gap-5">
                </div>
            </div>

            <!-- Pagination -->
            <div class="flex flex-col sm:flex-row items-center justify-between gap-3 mt-5">
                <p id="galleryInfo" class="text-xs text-gray-400"></p>

                <div class="flex gap-2">
                    <button type="button" id="prevPage" onclick="changePage(-1)"
                        class="px-4 py-2 rounded-lg bg-slate-800 text-white text-xs disabled:opacity-30">
                        <i class="fa-solid fa-chevron-left"></i> Sebelumnya
                    </button>
                    <span id="pageInfo" class="px-3 py-2 text-xs text-cyan-300"></span>
                    <button type="button" id="nextPage" onclick="changePage(1)"
                        class="px-4 py-2 rounded-lg bg-slate-800 text-white text-xs disabled:opacity-30">
                        Berikutnya <i class="fa-solid fa-chevron-right"></i>
                    </button>
                </div>
            </div>
        </div>

    </div>


    <!-- ================================
         QUICK MENU
    ================================= -->

    <div class="content-card">

        <div class="card-header">

            <div class="card-title">

                <i class="fas fa-bolt"></i>

                <h2>
                    Menu Cepat
                </h2>

            </div>

        </div>


        <div class="quick-grid">

            <a
                href="{{ route('admin.dashboard') }}"
                class="quick-card"
            >
                <div class="quick-icon">
                   <i class="fa-solid fa-chart-line"></i>
                </div>

                <h3>Dashboard</h3>

                <p>Cek perkembangan bisnis kamu.</p>
            </a>

            <a href="{{ route('admin.kelola-galeri') }}" class="quick-card">

                <div class="quick-icon">
                    <i class="fas fa-images"></i>
                </div>

                <h3>
                    Kelola Gallery
                </h3>

                <p>
                    Lihat dan kelola koleksi konten.
                </p>

            </a>
        </div>

    </div>

    <!-- Modal Upload Konten -->
        <div
            id="uploadModal"
            class="fixed inset-0 z-50 hidden items-start justify-center overflow-y-auto p-4 pt-8 sm:pt-10 bg-slate-950/80 backdrop-blur-md"
            onclick="if (event.target === this) closeUploadModal()"
        >
            <div class="glass-card bg-slate-900 border border-slate-700/80 rounded-3xl max-w-lg w-full p-6 shadow-2xl relative my-auto">

                <!-- Tombol Tutup -->
                <button
                    type="button"
                    onclick="closeUploadModal()"
                    aria-label="Tutup modal"
                    class="absolute top-4 right-4 text-gray-400 hover:text-white text-lg"
                >
                    <i class="fa-solid fa-xmark"></i>
                </button>

                <!-- Judul -->
                <h3 id="uploadModalTitle" class="text-xl font-bold text-white mb-1 pr-8">
                    Unggah Karya Aerial Baru
                </h3>

                <p class="text-xs text-gray-400 mb-6">
                    Pilih foto atau video langsung dari HP atau laptop Anda.
                </p>

                <!-- Form Upload -->
                <form
                    id="uploadForm"
                    action="{{ route('admin.upload') }}"
                    method="POST"
                    enctype="multipart/form-data"
                    class="space-y-4 text-xs"
                >

                    @csrf

                    <input
                        type="hidden"
                        name="_method"
                        id="methodField"
                        value="PUT"
                        disabled
                    >

                    <!-- Tipe File -->
                    <div>
                        <label for="upTitle" class="block text-gray-300 font-semibold mb-1">
                            Tipe File <span style="color: red;">*</span>
                        </label>

                        <select name="tipeFile" id="tipe-file" class="w-full bg-slate-800 border border-slate-700 rounded-xl p-3 text-white focus:outline-none focus:border-cyan-500" required>
                            <option value="" selected hidden>Pilih Tipe</option>
                            <option value="video">Video</option>
                            <option value="photo">Foto</option>
                        </select>
                    </div>

                    <!-- Judul Karya -->
                    <div>
                        <label for="upTitle" class="block text-gray-300 font-semibold mb-1">
                            Judul Karya <span style="color: red;">*</span>
                        </label>

                        <input
                            type="text"
                            id="upTitle"
                            name="judul"
                            required
                            placeholder="Contoh: Sunset Pantai Anyer Aerial" maxlength="255"
                            class="w-full bg-slate-800 border border-slate-700 rounded-xl p-3 text-white focus:outline-none focus:border-cyan-500"
                        >
                    </div>

                    <!-- File -->
                    <div>
                        <label for="upFile" class="block text-gray-300 font-semibold mb-1">
                            Pilih Foto / Video
                        </label>

                        <input
                            type="file"
                            id="upFile"
                            name="file"
                            accept="image/*,video/*"
                            class="w-full bg-slate-800 border border-slate-700 rounded-xl p-2.5 text-xs text-gray-300 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-xs file:font-semibold file:bg-cyan-500 file:text-slate-950 hover:file:bg-cyan-400 cursor-pointer"
                        >
                        <p id="fileHelp" class="text-[10px] text-gray-400 mt-1">
                            Maksimal 200 MB. Saat edit, kosongkan pilihan file jika ingin
                            mempertahankan file yang sekarang.
                        </p>
                    </div>

                    <!-- Kategori dan Harga -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">

                        <div>
                            <label for="upCategory" class="block text-gray-300 font-semibold mb-1">
                                Kategori Utama <span style="color: red;">*</span>
                            </label>

                            <select
                                id="upCategory"
                                name="kategori_id"
                                required
                                class="w-full bg-slate-800 border border-slate-700 rounded-xl p-3 text-white focus:outline-none focus:border-cyan-500"
                            >
                                <option value="">-- Pilih Kategori --</option>

                                @foreach ($masterKategori as $kategori)
                                    <option value="{{ $kategori->id }}">
                                        {{ $kategori->nama_kategori }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div>
                            <label for="upPrice" class="block text-gray-300 font-semibold mb-1">
                                Harga Lisensi Dasar (Rp) <span style="color: red;">*</span>
                            </label>

                            <input
                                type="number"
                                id="upPrice"
                                name="harga"
                                min="0"
                                required
                                placeholder="150000"
                                class="w-full bg-slate-800 border border-slate-700 rounded-xl p-3 text-white focus:outline-none focus:border-cyan-500"
                            >
                        </div>

                    </div>

                    <!-- Lokasi -->
                    <div>
                        <label for="upLocation" class="block text-gray-300 font-semibold mb-1">
                            Lokasi Pengambilan <span style="color: red;">*</span>
                        </label>

                        <input
                            type="text"
                            id="upLocation"
                            name="lokasi"
                            required maxlength="255"
                            placeholder="Contoh: Banten, Indonesia"
                            class="w-full bg-slate-800 border border-slate-700 rounded-xl p-3 text-white focus:outline-none focus:border-cyan-500"
                        >
                    </div>

                    <!-- Tombol -->
                    <div class="pt-4 flex justify-end gap-3">

                        <button
                            type="button"
                            onclick="closeUploadModal()"
                            class="px-5 py-2.5 rounded-full bg-slate-800 text-gray-300 hover:bg-slate-700 font-semibold"
                        >
                            Batal
                        </button>

                        <button
                            type="submit"
                            id="submitBtn"
                            class="px-6 py-2.5 rounded-full bg-cyan-500 hover:bg-cyan-400 text-slate-950 font-bold shadow-md flex items-center gap-2"
                        >
                            <i id="submitIcon" class="fa-solid fa-file-arrow-up"></i>
                            <span id="submitText">Unggah Berkas</span>
                        </button>

                    </div>

                </form>

            </div>
        </div>

    <!-- Footer -->

    <div class="footer">

        <i class="fas fa-helicopter"></i>

        CapungTerbang.id Admin Panel

        © {{ date('Y') }}

    </div>

</div>

<script>
    const uploadModal = document.getElementById('uploadModal');

    // Membuka modal
    function openUploadModal() {
        uploadModal.classList.remove('hidden');
        uploadModal.classList.add('flex');

        document.body.style.overflow = 'hidden';

        // Fokus ke input judul
        setTimeout(() => {
            document.getElementById('upTitle').focus();
        }, 100);
    }

    // Menutup modal
    function closeUploadModal() {
        uploadModal.classList.add('hidden');
        uploadModal.classList.remove('flex');

        document.body.style.overflow = '';
    }

    // Menutup modal dengan tombol Escape
    document.addEventListener('keydown', function (event) {
        if (event.key === 'Escape' &&
            !uploadModal.classList.contains('hidden')) {
            closeUploadModal();
        }
    });

    
    const galleryItems = @json($galeri);
    const galleryCsrf = @json(csrf_token());

    let activeFilter = 'all';
    let currentPage = 1;
    let selectedEditItem = null;

    function escapeHtml(value) {
        return String(value ?? '').replace(/[&<>"']/g, char => ({
            '&': '&amp;',
            '<': '&lt;',
            '>': '&gt;',
            '"': '&quot;',
            "'": '&#039;'
        })[char]);
    }

    function rupiah(value) {
        return Number(value || 0).toLocaleString('id-ID');
    }

    function filteredGalleryItems() {
        const search = (
            document.getElementById('gallerySearch')?.value || ''
        ).toLowerCase().trim();

        return galleryItems.filter(item => {
            let matchFilter = true;

            if (activeFilter === 'type:video') {
                matchFilter = item.tipe_file === 'video';
            } else if (activeFilter === 'type:photo') {
                matchFilter = item.tipe_file === 'photo';
            } else if (activeFilter.startsWith('category:')) {
                const categoryId = Number(activeFilter.split(':')[1]);
                matchFilter = Number(item.kategori_id) === categoryId;
            }

            const matchSearch = [
                item.judul_karya,
                item.nama_kategori,
                item.lokasi_pengambilan
            ].some(value => String(value ?? '').toLowerCase().includes(search));

            return matchFilter && matchSearch;
        });
    }

    function renderGallery() {
        const grid = document.getElementById('galleryGrid');
        if (!grid) return;

        const filtered = filteredGalleryItems();
        const sizeValue = document.getElementById('pageSize').value;
        const pageSize = sizeValue === 'all'
            ? Math.max(filtered.length, 1)
            : Number(sizeValue);

        const totalPages = Math.max(1, Math.ceil(filtered.length / pageSize));
        currentPage = Math.min(currentPage, totalPages);

        const start = (currentPage - 1) * pageSize;
        const visibleItems = filtered.slice(start, start + pageSize);

        grid.innerHTML = '';

        if (!visibleItems.length) {
            grid.innerHTML = `
                <div class="col-span-full glass-card rounded-2xl p-10 text-center">
                    <i class="fa-solid fa-images text-4xl text-cyan-500 mb-3"></i>
                    <p class="text-white font-bold">Konten tidak ditemukan</p>
                    <p class="text-gray-400 text-xs mt-2">
                        Coba filter atau kata pencarian yang lain.
                    </p>
                </div>`;
        }

        visibleItems.forEach(item => {
            const card = document.createElement('article');
            card.className =
                'glass-card rounded-2xl overflow-hidden border border-slate-800 ' +
                'flex flex-col min-w-0';

            const url = escapeHtml(item.url);
            const title = escapeHtml(item.judul_karya);
            const category = escapeHtml(item.nama_kategori);
            const location = escapeHtml(item.lokasi_pengambilan);

            const media = item.tipe_file === 'video'
                ? `<video src="${url}" controls preload="metadata"
                        class="w-full h-full object-contain bg-black"></video>`
                : `<img src="${url}" alt="${title}" loading="lazy"
                        class="w-full h-full object-cover"
                        onerror="this.style.display='none'">`;

            card.innerHTML = `
                <div class="h-52 bg-slate-950 flex items-center justify-center overflow-hidden">
                    ${media}
                </div>

                <div class="p-4 flex flex-col flex-1">
                    <div class="flex justify-between items-start gap-2 mb-2">
                        <span class="text-[10px] uppercase tracking-wide text-cyan-300">
                            ${category}
                        </span>
                        <span class="text-[10px] rounded-md bg-slate-800 px-2 py-1 text-gray-300">
                            ${item.tipe_file === 'video' ? 'VIDEO' : 'FOTO'}
                        </span>
                    </div>

                    <h4 class="font-bold text-sm text-white break-words">${title}</h4>
                    <p class="text-xs text-gray-400 mt-2 break-words">
                        <i class="fa-solid fa-location-dot mr-1"></i>${location}
                    </p>

                    <p class="text-sm font-bold text-white mt-3">
                        Rp ${rupiah(item.harga)}
                    </p>

                    <div class="grid grid-cols-2 gap-2 mt-auto pt-4">
                        <button type="button" data-edit="${item.id}"
                            class="rounded-lg px-3 py-2 text-xs font-bold bg-cyan-500 text-slate-950 hover:bg-cyan-400">
                            <i class="fa-solid fa-pen-to-square mr-1"></i>Edit
                        </button>

                        <button type="button" data-delete="${item.id}"
                            class="rounded-lg px-3 py-2 text-xs font-bold bg-red-500/10 text-red-300 border border-red-500/20 hover:bg-red-500/20">
                            <i class="fa-solid fa-trash mr-1"></i>Hapus
                        </button>
                    </div>
                </div>`;

            card.querySelector('[data-edit]').addEventListener('click', () => {
                openEditModal(item.id);
            });

            card.querySelector('[data-delete]').addEventListener('click', () => {
                deleteGalleryItem(item.id);
            });

            grid.appendChild(card);
        });

        document.getElementById('galleryInfo').textContent =
            filtered.length
                ? `Menampilkan ${start + 1}–${Math.min(start + visibleItems.length, filtered.length)} dari ${filtered.length} konten`
                : 'Tidak ada konten';

        document.getElementById('pageInfo').textContent =
            `Halaman ${currentPage} / ${totalPages}`;

        document.getElementById('prevPage').disabled = currentPage <= 1;
        document.getElementById('nextPage').disabled = currentPage >= totalPages;
    }

    function setFilter(filter) {
        activeFilter = filter;
        currentPage = 1;

        document.querySelectorAll('.filter-btn').forEach(button => {
            const active = button.dataset.filter === filter;

            button.className = active
                ? 'filter-btn active px-4 py-2 rounded-lg text-xs font-semibold bg-cyan-500 text-slate-950'
                : 'filter-btn px-4 py-2 rounded-lg text-xs font-semibold text-gray-400 hover:text-white';
        });

        renderGallery();
    }

    function applyGalleryFilters() {
        currentPage = 1;
        renderGallery();
    }

    function changePage(direction) {
        currentPage += direction;
        renderGallery();

        document.getElementById('galleryScrollArea')
            .scrollTo({ top: 0, behavior: 'smooth' });
    }

    function changePageSize() {
        currentPage = 1;
        renderGallery();
    }

    function openCreateModal() {
        selectedEditItem = null;

        const form = document.getElementById('uploadForm');
        form.reset();
        form.action = @json(route('admin.upload'));

        document.getElementById('methodField').disabled = true;
        document.getElementById('uploadModalTitle').textContent =
            'Unggah Karya Aerial Baru';
        document.getElementById('submitText').textContent = 'Unggah Berkas';
        document.getElementById('submitIcon').className =
            'fa-solid fa-file-arrow-up';
        document.getElementById('upFile').required = true;
        document.getElementById('fileHelp').textContent =
            'Pilih foto atau video. Maksimal 200 MB.';

        openUploadModal();
    }

    function openEditModal(id) {
        const item = galleryItems.find(row => Number(row.id) === Number(id));
        if (!item) return;

        selectedEditItem = item;

        const form = document.getElementById('uploadForm');
        form.reset();
        form.action = @json(url('/admin/kelola-galeri')) + '/' + item.id;

        document.getElementById('methodField').disabled = false;
        document.getElementById('upTitle').value = item.judul_karya;
        document.getElementById('tipe-file').value = item.tipe_file;
        document.getElementById('upCategory').value = item.kategori_id;
        document.getElementById('upPrice').value = item.harga;
        document.getElementById('upLocation').value = item.lokasi_pengambilan;
        document.getElementById('upFile').required = false;

        document.getElementById('uploadModalTitle').textContent =
            'Edit Konten Galeri';
        document.getElementById('submitText').textContent =
            'Simpan Perubahan';
        document.getElementById('submitIcon').className =
            'fa-solid fa-floppy-disk';
        document.getElementById('fileHelp').textContent =
            'File opsional. Kosongkan jika tidak ingin mengganti file lama.';

        openUploadModal();
    }

    function deleteGalleryItem(id) {
        const item = galleryItems.find(row => Number(row.id) === Number(id));
        if (!item) return;

        if (!confirm(
            `Hapus "${item.judul_karya}" secara permanen?\n` +
            'File dan data database juga akan dihapus.'
        )) return;

        const form = document.createElement('form');
        form.method = 'POST';
        form.action = @json(url('/admin/kelola-galeri')) + '/' + id;

        form.innerHTML = `
            <input type="hidden" name="_token" value="${galleryCsrf}">
            <input type="hidden" name="_method" value="DELETE">
        `;

        document.body.appendChild(form);
        form.submit();
    }

    document.addEventListener('DOMContentLoaded', renderGallery);
</script>

</body>

</html>