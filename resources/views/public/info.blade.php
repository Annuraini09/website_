<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Anggota & Kegiatan - Deutsch Club</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="dc-info">
    <nav class="dc-navbar">
        <div class="dc-container dc-nav-inner">
            <a class="dc-brand" href="{{ route('home') }}">
                <img src="{{ asset('images/logo-dc.jpg') }}" alt="Logo Deutsch Club">
                <span><strong>German Club</strong><small>Lernen · Freundschaft · Kultur</small></span>
            </a>
            <div class="dc-nav-links">
                <a href="{{ route('home') }}">Beranda</a>
                <a href="{{ route('profile') }}">Profil</a>
                <a class="active" href="{{ route('info') }}">Anggota & Kegiatan</a>
                <a href="{{ route('login') }}">Login</a>
            </div>
        </div>
    </nav>

    <header class="dc-info-hero">
        <div class="dc-container">
            <p class="dc-eyebrow">Deutsch Club · SMKN 1 Garut</p>
            <h1>Anggota &amp; Kegiatan</h1>
            <p>Kenali lebih dekat anggota kami dan berbagai kegiatan seru yang telah kami lakukan.</p>
        </div>
    </header>

    <main class="dc-container dc-info-main">
        <section class="dc-section" aria-labelledby="member-heading">
            <div class="dc-section-heading">
                <div>
                    <span class="dc-section-icon" aria-hidden="true">♟</span>
                    <div>
                        <h2 id="member-heading">Informasi Anggota</h2>
                        <p>Kenali anggota Deutsch Club dari setiap angkatan.</p>
                    </div>
                </div>
            </div>

            @if($membersByGeneration->isNotEmpty())
                <nav class="dc-generation-nav" aria-label="Pilih angkatan">
                    @foreach($membersByGeneration as $generation => $members)
                        <a href="#generation-{{ $loop->index }}">
                            <span class="dc-group-icon" aria-hidden="true">♟</span>
                            <span><strong>{{ $generation }}</strong><small>{{ $members->count() }} anggota</small></span>
                            <span class="dc-generation-arrow" aria-hidden="true">›</span>
                        </a>
                    @endforeach
                </nav>

                @foreach($membersByGeneration as $generation => $members)
                    <section class="dc-generation-panel" id="generation-{{ $loop->index }}">
                        <div class="dc-generation-title">
                            <h3>{{ $generation }}</h3>
                            <span>{{ $members->count() }} orang</span>
                        </div>
                        <div class="dc-member-grid">
                            @foreach($members as $member)
                                <article class="dc-member-card">
                                    @if($member->foto)
                                        <img src="{{ asset('images/' . $member->foto) }}" alt="Foto {{ $member->name }}" loading="lazy">
                                    @else
                                        <div class="dc-member-placeholder" aria-hidden="true">DC</div>
                                    @endif
                                    <h4>{{ $member->name }}</h4>
                                    <p>{{ $member->jabatan ?: 'Anggota' }}</p>
                                    <small>{{ $member->kelas }} · {{ $member->jurusan }}</small>
                                </article>
                            @endforeach
                        </div>
                    </section>
                @endforeach
            @else
                <div class="dc-empty-state">Data anggota belum tersedia.</div>
            @endif
        </section>

        <section class="dc-section dc-activities-section" id="kegiatan" aria-labelledby="activity-heading">
            <div class="dc-section-heading dc-activity-heading">
                <div>
                    <span class="dc-section-icon" aria-hidden="true">▦</span>
                    <div>
                        <h2 id="activity-heading">Kegiatan Kami</h2>
                        <p>Dokumentasi berbagai kegiatan Deutsch Club.</p>
                    </div>
                </div>
                <span class="dc-count-badge">{{ $activities->count() }} kegiatan</span>
            </div>

            @if($activities->isNotEmpty())
                <div class="dc-activity-grid">
                    @foreach($activities as $activity)
                        <article class="dc-activity-card">
                            <img src="{{ $activity->foto ? asset('images/' . $activity->foto) : asset('images/bangunan.jpg') }}" alt="Dokumentasi {{ $activity->judul }}" loading="lazy">
                            <div class="dc-activity-content">
                                <time datetime="{{ $activity->date }}">{{ \Carbon\Carbon::parse($activity->date)->format('d M Y') }}</time>
                                <h3>{{ $activity->judul }}</h3>
                                <p>{{ $activity->deskripsi }}</p>
                            </div>
                        </article>
                    @endforeach
                </div>
            @else
                <div class="dc-empty-state">Belum ada kegiatan yang dipublikasikan.</div>
            @endif
        </section>

        <blockquote class="dc-quote">“Gemeinsam lernen, gemeinsam wachsen.”</blockquote>
    </main>

    <footer class="dc-footer">
        <div class="dc-footer-stripe" aria-hidden="true"></div>
        <div class="dc-container dc-footer-inner">
            <span>Deutsch Club © {{ date('Y') }} · SMKN 1 Garut</span>
            <a href="{{ route('home') }}">Kembali ke beranda</a>
        </div>
    </footer>
</body>
</html>
