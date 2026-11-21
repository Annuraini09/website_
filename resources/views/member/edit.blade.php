<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Anggota</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">
    <h2>Edit Data Anggota</h2>
    <form action="{{ route('member.update', $member->id) }}" method="POST" class="mt-3">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label>Nama</label>
            <input type="text" name="name" value="{{ $member->name }}" class="form-control" required>
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