<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Kelola Kegiatan - Deutsch Club</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="admin-body">
    @include('admin.partials.nav', ['active' => 'activity'])

    <main class="admin-shell">
        <div class="admin-page-heading">
            <div>
                <h1>Manajemen Kegiatan</h1>
                <p>Atur jadwal dan dokumentasi kegiatan yang tampil di halaman publik.</p>
            </div>
            <a href="{{ route('activity.create') }}" class="btn btn-primary">+ Tambah kegiatan</a>
        </div>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <section class="admin-panel">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h2 class="admin-panel-title mb-0">Daftar kegiatan</h2>
                <span class="badge rounded-pill text-bg-light">{{ $dataActivity->count() }} kegiatan</span>
            </div>
            @if($dataActivity->isNotEmpty())
                <div class="admin-table-wrap">
                    <table class="table admin-table">
                        <thead>
                            <tr><th>Dokumentasi</th><th>Nama kegiatan</th><th>Deskripsi</th><th>Tanggal</th><th>Aksi</th></tr>
                        </thead>
                        <tbody>
                            @foreach($dataActivity as $item)
                                <tr>
                                    <td>
                                        @if($item->foto)
                                            <img src="{{ asset('images/' . $item->foto) }}" alt="Dokumentasi {{ $item->judul }}" width="76" height="52" class="rounded object-fit-cover">
                                        @else
                                            <span class="text-muted">Belum ada foto</span>
                                        @endif
                                    </td>
                                    <td class="fw-semibold">{{ $item->judul }}</td>
                                    <td>{{ \Illuminate\Support\Str::limit($item->deskripsi, 90) }}</td>
                                    <td class="text-nowrap">{{ \Carbon\Carbon::parse($item->date)->format('d M Y') }}</td>
                                    <td class="text-nowrap">
                                        <a href="{{ route('activity.edit', $item) }}" class="btn btn-sm btn-outline-primary">Edit</a>
                                        <form action="{{ route('activity.destroy', $item) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus kegiatan ini?')">
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
                <div class="dc-empty-state">Belum ada kegiatan. Tambahkan kegiatan agar dokumentasinya tampil di situs.</div>
            @endif
        </section>
    </main>
</body>
</html>
