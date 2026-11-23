<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Deutsch Club SMKN 1 Garut</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .hero-section {
            /* Nuansa bendera Jerman: Hitam, Merah, Emas */
            background: linear-gradient(to bottom, #111 33%, #dd0000 33%, #dd0000 66%, #ffcc00 66%);
            min-height: 70vh;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            text-align: center;
        }
        /* Style tambahan untuk ukuran logo agar rapi di navbar */
        .navbar-logo {
            height: 40px;
            width: auto;
            object-fit: contain;
            margin-right: 8px;
        }
    </style>
</head>
<body>

    <!-- Navbar Sesuai Sketsa Buku (Logo di Kiri, Menu di Kanan) -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm py-3">
        <div class="container">
            <!-- Bagian Kiri: Logo DC & Logo SMKN 1 Garut -->
            <a class="navbar-brand d-flex align-items-center" href="{{ route('home') }}">
                <!-- Menggunakan helper asset() untuk memanggil gambar dari folder public/images/ -->
                <img src="{{ asset('images/logo-dc.jpg') }}" alt="Logo Deutsch Club" class="navbar-logo">
                <img src="{{ asset('images/logo-smk.jpg') }}" alt="Logo SMKN 1 Garut" class="navbar-logo">
                <span class="fw-bold ms-2 fs-6">Deutsch Club</span>
            </a>

            <!-- Bagian Kanan: Menu Navigasi (Beranda | Profil | Informasi | Login) -->
            <div>
                <ul class="navbar-nav d-flex flex-row align-items-center mb-0">
                    <li class="nav-item me-3"><a class="nav-link fw-bold text-danger" href="{{ route('home') }}">Beranda</a></li>
                    <li class="nav-item me-3"><a class="nav-link" href="{{ route('profile') }}">Profil</a></li>
                    <li class="nav-item me-3"><a class="nav-link" href="{{ route('info') }}">Informasi</a></li>
                    <li class="nav-item"><a class="btn btn-outline-dark btn-sm px-3" href="{{ route('login') }}">Login</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero / Banner Sambutan Sesuai Sketsa Buku -->
    <div class="hero-section">
        <div class="container bg-dark bg-opacity-75 p-5 rounded shadow">
            <h1 class="display-4 fw-bold mb-3">Selamat Datang di<br>Deutsch Club<br>SMKN 1 Garut</h1>
            <hr class="w-25 mx-auto border-warning border-3">
            <p class="lead mt-3 fst-italic">"Begeistert für immer, wir können es schaffen!"</p>
            <a href="{{ route('profile') }}" class="btn btn-warning btn-lg mt-3 fw-bold px-4">Kenali Kami Lebih Dekat</a>
        </div>
    </div>

    <!-- Bagian Bawah: Info Media Sosial Sesuai Sketsa Buku -->
    <footer class="bg-dark text-white py-4 mt-auto">
        <div class="container text-center">
            <p class="mb-2 fw-semibold">Media Sosial Resmi:</p>
            
            <!-- Instagram Deutsch Club dengan Tautan (Target blank agar membuka tab baru) -->
            <p class="mb-1">
                📸 Instagram DC: 
                <a href="https://www.instagram.com/deutschc.smkn1garut?lqvp=aDM3aDEzb2lzeHh0" target="_blank" class="text-light text-decoration-none fw-semibold">
                    @deutschc.smkn1garut
                </a>
            </p>
            
            <!-- Instagram SMKN 1 Garut dengan Tautan -->
            <p class="mb-3">
                📸 Instagram SMKN 1 GARUT: 
                <a href="https://www.instagram.com/smkn1garut_official?gwpx=cXU4OTF5bDV5aGVr" target="_blank" class="text-light text-decoration-none fw-semibold">
                    @smkn1garut_official
                </a>
            </p>

            <hr class="border-secondary w-50 mx-auto">
            <small class="text-muted">&copy; 2026 Deutsch Club SMKN 1 Garut. All Rights Reserved.</small>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>