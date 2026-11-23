<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Anggota</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">
    <h2>Form Pendaftaran Anggota Baru</h2>
    
    <!-- Tambahkan enctype="multipart/form-data" di sini -->
    <form action="{{ route('member.store') }}" method="POST" enctype="multipart/form-data" class="mt-3">
        @csrf
        <div class="mb-3">
            <label>Nama</label>
            <input type="text" name="name" class="form-control" required>
        </div>

        <!-- Kolom Jabatan Baru -->
        <div class="mb-3">
            <label>Jabatan (Contoh: Ketua, Sekretaris, Anggota)</label>
            <input type="text" name="jabatan" class="form-control" required>
        </div>

        <!-- Kolom Angkatan Baru -->
        <div class="mb-3">
            <label>Angkatan (Contoh: Angkatan 6, 2024/2025)</label>
            <input type="text" name="angkatan" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Kelas</label>
            <input type="text" name="kelas" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Jurusan</label>
            <input type="text" name="jurusan" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>No. HP</label>
            <input type="text" name="phone" class="form-control" required>
        </div>

        <!-- Kolom Upload Foto Baru -->
        <div class="mb-3">
            <label>Foto Anggota</label>
            <input type="file" name="foto" class="form-control" accept="image/*">
            <div class="form-text">Format: JPG, JPEG, PNG (Maks. 2MB)</div>
        </div>

        <div class="mb-3">
            <label>Pilih Kegiatan (Opsional)</label>
            <select name="activity_id" class="form-control">
                <option value="">-- Pilih Kegiatan --</option>
                @foreach($dataActivity as $act)
                    <option value="{{ $act->id }}">{{ $act->judul }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-success">Simpan Data</button>
        <a href="{{ route('member.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</body>
</html>