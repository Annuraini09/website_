<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Admin - Deutsch Club</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Dashboard Admin Deutsch Club</h2>
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-danger">Logout</button>
        </form>
    </div>

    <div class="row">
        <div class="col-md-6 mb-3">
            <div class="card p-3 bg-primary text-white">
                <h4>Manajemen Member</h4>
                <p>Kelola data pendaftaran anggota Deutsch Club.</p>
                <a href="{{ route('member.index') }}" class="btn btn-light">Kelola Member</a>
            </div>
        </div>
        <div class="col-md-6 mb-3">
            <div class="card p-3 bg-success text-white">
                <h4>Manajemen Kegiatan</h4>
                <p>Kelola jadwal dan agenda kegiatan club.</p>
                <a href="{{ route('activity.index') }}" class="btn btn-light">Kelola Kegiatan</a>
            </div>
        </div>
    </div>
</body>
</html>