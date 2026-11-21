<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Kegiatan - Deutsch Club</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">
    <h2>Form Tambah Kegiatan Baru</h2>
    <form action="{{ route('activity.store') }}" method="POST" class="mt-3">
        @csrf
        <div class="mb-3">
            <label>Judul Kegiatan</label>
            <input type="text" name="judul" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Deskripsi</label>
            <textarea name="deskripsi" class="form-control" rows="3" required></textarea>
        </div>
        <div class="mb-3">
            <label>Tanggal</label>
            <input type="date" name="date" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-success">Simpan Data</button>
        <a href="{{ route('activity.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</body>
</html>