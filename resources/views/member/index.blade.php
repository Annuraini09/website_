<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Kelola Anggota - Deutsch Club</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="admin-body">
    @include('admin.partials.nav', ['active' => 'member'])

    <main class="admin-shell">
        <div class="admin-page-heading">
            <div>
                <h1>Manajemen Anggota</h1>
                <p>Data anggota dikelompokkan per angkatan di halaman informasi publik.</p>
            </div>
            <a href="{{ route('member.create') }}" class="btn btn-primary">+ Tambah anggota</a>
        </div>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <section class="admin-panel">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h2 class="admin-panel-title mb-0">Daftar anggota</h2>
                <span class="badge rounded-pill text-bg-light">{{ $dataMember->count() }} orang</span>
            </div>
            @if($dataMember->isNotEmpty())
                <div class="admin-table-wrap">
                    <table class="table admin-table">
                        <thead>
                            <tr>
                                <th>Anggota</th><th>Angkatan</th><th>Kelas &amp; jurusan</th><th>No. HP</th><th>Kegiatan</th><th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($dataMember as $item)
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center gap-2">
                                            @if($item->foto)
                                                <img src="{{ asset('images/' . $item->foto) }}" alt="" width="42" height="42" class="rounded-circle object-fit-cover">
                                            @else
                                                <span class="d-grid rounded-circle bg-light text-danger fw-bold" style="width:42px;height:42px;place-items:center">DC</span>
                                            @endif
                                            <span><strong>{{ $item->name }}</strong><br><small class="text-muted">{{ $item->jabatan ?: 'Anggota' }}</small></span>
                                        </div>
                                    </td>
                                    <td>{{ $item->angkatan ?: 'Belum ditentukan' }}</td>
                                    <td>{{ $item->kelas }} · {{ $item->jurusan }}</td>
                                    <td>{{ $item->phone }}</td>
                                    <td>{{ $item->activity?->judul ?: '—' }}</td>
                                    <td class="text-nowrap">
                                        <a href="{{ route('member.edit', $item) }}" class="btn btn-sm btn-outline-primary">Edit</a>
                                        <form action="{{ route('member.destroy', $item) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus anggota ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-outline-danger">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <div class="dc-empty-state">Data anggota belum tersedia. Tambahkan anggota untuk mulai mengisi halaman publik.</div>
            @endif
        </section>
    </main>
</body>
</html>
