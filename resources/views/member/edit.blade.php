<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Anggota</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">
    <h2>Edit Data Anggota</h2>
    
    <!-- Tambahkan enctype="multipart/form-data" agar file foto dapat terkirim -->
    <form action="{{ route('member.update', $member->id) }}" method="POST" enctype="multipart/form-data" class="mt-3">
        @csrf
        @method('PUT')
        
        <div class="mb-3">
            <label>Nama</label>
            <input type="text" name="name" value="{{ $member->name }}" class="form-control" required>
        </div>

        <!-- Input Jabatan -->
        <div class="mb-3">
            <label>Jabatan</label>
            <input type="text" name="jabatan" value="{{ $member->jabatan }}" class="form-control" required>
        </div>

        <!-- Input Angkatan -->
        <div class="mb-3">
            <label>Angkatan</label>
            <input type="text" name="angkatan" value="{{ $member->angkatan }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Kelas</label>
            <input type="text" name="kelas" value="{{ $member->kelas }}" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Jurusan</label>
            <input type="text" name="jurusan" value="{{ $member->jurusan }}" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>No. HP</label>
            <input type="text" name="phone" value="{{ $member->phone }}" class="form-control" required>
        </div>

        <!-- Input Foto & Preview Foto Lama -->
        <div class="mb-3">
            <label>Foto Anggota</label>
            @if($member->foto)
                <div class="mb-2">
                    <img src="{{ asset('images/' . $member->foto) }}" alt="Foto Anggota" width="100" class="rounded border">
                </div>
            @endif
            <input type="file" name="foto" class="form-control" accept="image/*">
            <div class="form-text">Biarkan kosong jika tidak ingin mengubah foto.</div>
        </div>

        <div class="mb-3">
            <label>Pilih Kegiatan</label>
            <select name="activity_id" class="form-control">
                <option value="">-- Pilih Kegiatan --</option>
                @foreach($dataActivity as $act)
                    <option value="{{ $act->id }}" {{ $member->activity_id == $act->id ? 'selected' : '' }}>
                        {{ $act->judul }}
                    </option>
                @endforeach
            </select>
        </div>
        
        <button type="submit" class="btn btn-primary">Update Data</button>
        <a href="{{ route('member.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</body>
</html>