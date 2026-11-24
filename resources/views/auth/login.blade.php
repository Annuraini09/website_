<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login Admin - Deutsch Club</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="admin-login">
    <main class="admin-login-card">
        <div class="admin-login-brand">
            <img src="{{ asset('images/logo-dc.jpg') }}" alt="Logo Deutsch Club">
            <h1>Selamat datang</h1>
            <p>Masuk ke panel pengelolaan Deutsch Club.</p>
        </div>

        @if($errors->any())
            <div class="alert alert-danger" role="alert">{{ $errors->first() }}</div>
        @endif

        <form action="{{ route('login.post') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label class="form-label" for="email">Email admin</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" class="form-control @error('email') is-invalid @enderror" autocomplete="username" required autofocus>
                @error('email')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div class="mb-4">
                <label class="form-label" for="password">Password</label>
                <input id="password" type="password" name="password" class="form-control" autocomplete="current-password" required>
            </div>
            <button type="submit" class="btn btn-primary w-100">Masuk ke dashboard</button>
        </form>
        <a href="{{ route('home') }}" class="d-block mt-3 text-center small text-secondary text-decoration-none">← Kembali ke situs</a>
    </main>
</body>
</html>
