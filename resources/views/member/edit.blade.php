<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Anggota - Deutsch Club</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="admin-body">
    @include('admin.partials.nav', ['active' => 'member'])
    <main class="admin-shell">
        <div class="admin-page-heading">
            <div><h1>Edit anggota</h1><p>Perbarui informasi {{ $member->name }}.</p></div>
        </div>
        <section class="admin-panel admin-form">
            @if($errors->any())
                <div class="alert alert-danger">Periksa kembali data yang dimasukkan.</div>
            @endif
            <form action="{{ route('member.update', $member) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label class="form-label" for="name">Nama lengkap</label>
                    <input id="name" type="text" name="name" value="{{ old('name', $member->name) }}" class="form-control @error('name') is-invalid @enderror" required>
                    @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label" for="jabatan">Jabatan</label>
                        <input id="jabatan" type="text" name="jabatan" value="{{ old('jabatan', $member->jabatan) }}" class="form-control @error('jabatan') is-invalid @enderror" required>
                        @error('jabatan')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label" for="angkatan">Angkatan</label>
                        <input id="angkatan" type="text" name="angkatan" value="{{ old('angkatan', $member->angkatan) }}" class="form-control @error('angkatan') is-invalid @enderror" required>
                        @error('angkatan')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label" for="kelas">Kelas</label>
                        <input id="kelas" type="text" name="kelas" value="{{ old('kelas', $member->kelas) }}" class="form-control @error('kelas') is-invalid @enderror" required>
                        @error('kelas')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label" for="jurusan">Jurusan</label>
                        <input id="jurusan" type="text" name="jurusan" value="{{ old('jurusan', $member->jurusan) }}" class="form-control @error('jurusan') is-invalid @enderror" required>
                        @error('jurusan')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label" for="phone">Nomor HP</label>
                        <input id="phone" type="tel" name="phone" value="{{ old('phone', $member->phone) }}" class="form-control @error('phone') is-invalid @enderror" required>
                        @error('phone')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label" for="foto">Foto anggota</label>
                        @if($member->foto)
                            <div class="mb-2"><img src="{{ asset('images/' . $member->foto) }}" alt="Foto {{ $member->name }}" width="72" height="72" class="rounded-circle object-fit-cover"></div>
                        @endif
                        <input id="foto" type="file" name="foto" class="form-control @error('foto') is-invalid @enderror" accept=".jpg,.jpeg,.png">
                        <div class="form-text">Kosongkan jika tidak ingin mengubah foto. Maksimal 2 MB.</div>
                        @error('foto')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    <div class="col-12 mb-3">
                        <label class="form-label" for="activity_id">Kegiatan (opsional)</label>
                        <select id="activity_id" name="activity_id" class="form-select @error('activity_id') is-invalid @enderror">
                            <option value="">Belum memilih kegiatan</option>
                            @foreach($dataActivity as $activity)
                                <option value="{{ $activity->id }}" @selected(old('activity_id', $member->activity_id) == $activity->id)>{{ $activity->judul }}</option>
                            @endforeach
                        </select>
                        @error('activity_id')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                </div>
                <div class="admin-form-actions">
                    <button type="submit" class="btn btn-primary">Simpan perubahan</button>
                    <a href="{{ route('member.index') }}" class="btn btn-outline-secondary">Batal</a>
                </div>
            </form>
        </section>
    </main>
</body>
</html>