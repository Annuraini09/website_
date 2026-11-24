<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard Admin - Deutsch Club</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="admin-body">
    @include('admin.partials.nav', ['active' => 'dashboard'])

    <main class="admin-shell">
        <div class="admin-page-heading">
            <div>
                <h1>Selamat datang, {{ auth()->user()->name }}</h1>
                <p>Kelola informasi anggota dan dokumentasi Deutsch Club dari sini.</p>
            </div>
        </div>

        <div class="row g-3 mb-4">
            <div class="col-sm-6">
                <a class="text-decoration-none" href="{{ route('member.index') }}">
                    <section class="admin-stat-card">
                        <div class="admin-stat-label">Total anggota</div>
                        <div class="admin-stat-value">{{ $memberCount }}</div>
                        <span class="small text-muted">Buka manajemen anggota →</span>
                    </section>
                </a>
            </div>
            <div class="col-sm-6">
                <a class="text-decoration-none" href="{{ route('activity.index') }}">
                    <section class="admin-stat-card">
                        <div class="admin-stat-label">Total kegiatan</div>
                        <div class="admin-stat-value">{{ $activityCount }}</div>
                        <span class="small text-muted">Buka manajemen kegiatan →</span>
                    </section>
                </a>
            </div>
        </div>

        <section class="admin-panel">
            <div class="d-flex flex-wrap justify-content-between align-items-center gap-2 mb-3">
                <h2 class="admin-panel-title mb-0">Kegiatan terbaru</h2>
                <a href="{{ route('activity.create') }}" class="btn btn-sm btn-primary">+ Tambah kegiatan</a>
            </div>
            @if($latestActivities->isNotEmpty())
                <div class="admin-table-wrap">
                    <table class="table admin-table">
                        <thead>
                            <tr><th>Nama kegiatan</th><th>Tanggal</th><th></th></tr>
                        </thead>
                        <tbody>
                            @foreach($latestActivities as $activity)
                                <tr>
                                    <td class="fw-semibold">{{ $activity->judul }}</td>
                                    <td>{{ \Carbon\Carbon::parse($activity->date)->format('d M Y') }}</td>
                                    <td class="text-end"><a href="{{ route('activity.edit', $activity) }}" class="btn btn-sm btn-outline-secondary">Edit</a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <p class="text-muted mb-0">Belum ada kegiatan. Tambahkan kegiatan pertama untuk ditampilkan di situs.</p>
            @endif
        </section>
    </main>
</body>
</html>
