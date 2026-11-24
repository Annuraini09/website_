<header class="admin-nav">
    <div class="admin-nav-inner">
        <a class="admin-brand" href="{{ route('dashboard') }}">Deutsch Club <span class="fw-normal">Admin</span></a>
        <nav class="admin-nav-links" aria-label="Navigasi admin">
            <a class="{{ $active === 'dashboard' ? 'active' : '' }}" href="{{ route('dashboard') }}">Dashboard</a>
            <a class="{{ $active === 'member' ? 'active' : '' }}" href="{{ route('member.index') }}">Anggota</a>
            <a class="{{ $active === 'activity' ? 'active' : '' }}" href="{{ route('activity.index') }}">Kegiatan</a>
            <a href="{{ route('info') }}">Lihat situs</a>
            <span class="admin-user">{{ auth()->user()->name }}</span>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-sm btn-outline-light">Keluar</button>
            </form>
        </nav>
    </div>
</header>
