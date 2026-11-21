<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Daftar Anggota - Deutsch Club</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">
    <h2 class="mb-3">Daftar Anggota Deutsch Club</h2>
    
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <a href="{{ route('member.create') }}" class="btn btn-primary mb-3">+ Daftar Anggota Baru</a>
    <a href="{{ route('activity.index') }}" class="btn btn-secondary mb-3">Kelola Kegiatan</a>

    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Kelas</th>
                <th>Jurusan</th>
                <th>No. HP</th>
                <th>Kegiatan yang Diikuti</th> <!-- Kolom Relasi Eloquent -->
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($dataMember as $index => $item)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $item->name }}</td>
                <td>{{ $item->kelas }}</td>
                <td>{{ $item->jurusan }}</td>
                <td>{{ $item->phone }}</td>
                <td>
                    {{-- Menampilkan judul kegiatan melalui relasi Eloquent --}}
                    @if($item->activity)
                        <span class="badge bg-info text-dark">{{ $item->activity->judul }}</span>
                    @else
                        <span class="text-muted">Belum mengikuti kegiatan</span>
                    @endif
                </td>
                <td>
                    <a href="{{ route('member.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('member.destroy', $item->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>