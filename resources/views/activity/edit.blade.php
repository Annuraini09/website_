<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Kegiatan - Deutsch Club</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="admin-body">
    @include('admin.partials.nav', ['active' => 'activity'])
    <main class="admin-shell">
        <div class="admin-page-heading">
            <div><h1>Edit kegiatan</h1><p>Perbarui dokumentasi {{ $activity->judul }}.</p></div>
        </div>
        <section class="admin-panel admin-form">
            @if($errors->any())
                <div class="alert alert-danger">Periksa kembali data yang dimasukkan.</div>
            @endif
            <form action="{{ route('activity.update', $activity) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label class="form-label" for="judul">Judul kegiatan</label>
                    <input id="judul" type="text" name="judul" value="{{ old('judul', $activity->judul) }}" class="form-control @error('judul') is-invalid @enderror" required>
                    @error('judul')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <div class="mb-3">
                    <label class="form-label" for="deskripsi">Deskripsi</label>
                    <textarea id="deskripsi" name="deskripsi" rows="4" class="form-control @error('deskripsi') is-invalid @enderror" required>{{ old('deskripsi', $activity->deskripsi) }}</textarea>
                    @error('deskripsi')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label" for="date">Tanggal kegiatan</label>
                        <input id="date" type="date" name="date" value="{{ old('date', $activity->date) }}" class="form-control @error('date') is-invalid @enderror" required>
                        @error('date')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label" for="foto">Foto dokumentasi</label>
                        @if($activity->foto)
                            <div class="mb-2"><img src="{{ asset('images/' . $activity->foto) }}" alt="Dokumentasi {{ $activity->judul }}" width="120" height="80" class="rounded object-fit-cover"></div>
                        @endif
                        <input id="foto" type="file" name="foto" class="form-control @error('foto') is-invalid @enderror" accept=".jpg,.jpeg,.png">
                        <div class="form-text">Kosongkan jika tidak ingin mengganti foto. Maksimal 2 MB.</div>
                        @error('foto')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                </div>
                <div class="admin-form-actions">
                    <button type="submit" class="btn btn-primary">Simpan perubahan</button>
                    <a href="{{ route('activity.index') }}" class="btn btn-outline-secondary">Batal</a>
                </div>
            </form>
        </section>
    </main>
</body>
</html>