<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Profil Eskul - Deutsch Club SMKN 1 Garut</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    @vite('resources/css/app.css')
    <style>
        /* Mengatur latar belakang SELURUH HALAMAN (body) dengan foto bangunan Jerman dan efek blur/gelap */
        body {
            background: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)), url('{{ asset("images/bangunan.jpg") }}');
            background-size: cover;
            background-position: center;
            background-attachment: fixed; /* Agar background tetap diam saat halaman di-scroll */
            color: white; /* Mengubah warna teks default agar tetap terbaca di latar belakang gelap */
        }

        /* Gaya khusus untuk foto pembina agar berbentuk bulat dan rapi */
        .foto-pembina {
            width: 120px;
            height: 120px;
            object-fit: cover;
            border-radius: 50%;
            border: 3px solid #dc3500;
            margin-bottom: 15px;
        }

        /* Warna teks merah marun/bata untuk judul */
        .text-custom-red {
            color: #b22222; 
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="{{ route('home') }}">Deutsch Club SMKN 1 Garut</a>
            <div>
                <a href="{{ route('home') }}" class="nav-link text-white d-inline mx-2">Beranda</a>
                <a href="{{ route('profile') }}" class="nav-link text-white d-inline mx-2">Profil Eskul</a>
                <a href="{{ route('info') }}" class="nav-link text-white d-inline mx-2">Anggota & Kegiatan</a>
                <a href="{{ route('login') }}" class="btn btn-outline-light btn-sm ms-3">Login Admin</a>
            </div>
        </div>
    </nav>

    <div class="container my-5">
        <!-- Judul Halaman Profil -->
        <div class="text-center mb-5">
            <h1 class="fw-bold mb-2 text-white">Profil Deutsch Club SMKN 1 Garut</h1>
            <p class="lead fst-italic text-light">"Wadah pengembangan potensi, bahasa, dan budaya Jerman"</p>
        </div>
        
        <div class="row align-items-center mb-5">
            <!-- Kita beri background semi-transparan putih atau tetap card bersih agar teks mudah dibaca di atas background foto -->
            <div class="col-md-6 bg-white text-dark p-4 rounded shadow">
                <h3 class="text-custom-red fw-bold">Tentang Kami</h3>
                <p>Deutsch Club SMKN 1 Garut adalah wadah bagi siswa-siswi yang memiliki ketertarikan tinggi terhadap bahasa, budaya, dan kesempatan studi/karier yang berhubungan dengan Negara Jerman. Di sini kita belajar percakapan dasar (*Sprechabend*), pemutaran film, hingga persiapan kebudayaan.</p>
                <ul>
                    <li><strong>Berdiri Sejak:</strong> Tahun 2021</li>
                    <li><strong>Jadwal Latihan:</strong> Setiap Hari Selasa & Kamis (15.30 - 17.00 WIB)</li>
                    <li><strong>Lokasi:</strong> Ruang Bahasa SMKN 1 Garut</li>
                </ul>
            </div>
            
            <!-- Bagian Card Pembina dengan Foto -->
            <div class="col-md-6 text-center">
                <div class="card bg-white text-dark p-4 shadow-sm">
                    <div>
                        <img src="{{ asset('images/foto-pembinadc.jpeg') }}" alt="Foto Pembina Deutsch Club" class="foto-pembina">
                    </div>
                    <h5>Pembina Ekstrakurikuler</h5>
                    <p class="text-muted mb-1">Guru Bahasa Jerman / Pembina</p>
                    <h4 class="text-danger fw-bold">Alfia Tawaffiani Muslima, S.Pd.,M.Hum</h4>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 mb-3">
                <div class="card bg-white text-dark p-4 shadow-sm h-100 border-danger">
                    <h3 class="text-danger">Visi</h3>
                    <p class="mb-0">Menjadikan anggota Deutsch Club SMKN 1 Garut yang unggul, aktif, berwawasan global, serta siap bersaing di kancah internasional melalui penguasaan bahasa Jerman.</p>
                </div>
            </div>
            <div class="col-md-6 mb-3">
                <div class="card bg-white text-dark p-4 shadow-sm h-100 border-warning">
                    <h3 class="text-warning text-dark">Misi</h3>
                    <ul>
                        <li>Mengadakan kegiatan belajar bahasa Jerman yang interaktif dan menyenangkan.</li>
                        <li>Memperkenalkan budaya Jerman secara kreatif.</li>
                        <li>Membangun relasi dan rasa percaya diri antar anggota.</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <footer class="bg-dark text-white text-center py-3 mt-5">
        <p>&copy; 2026 Deutsch Club SMKN 1 Garut. All Rights Reserved.</p>
    </footer>
</body>
</html>