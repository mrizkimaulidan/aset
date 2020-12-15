<aside id="sidebar-wrapper">
  <div class="sidebar-brand">
    <a href="index.html">{{ config('app.name') }}</a>
  </div>
  <div class="sidebar-brand sidebar-brand-sm">
    <a href="index.html">{{ substr(config('app.name'), 0, 2) }}</a>
  </div>
  <ul class="sidebar-menu">
    <li class="menu-header">Dashboard</li>
    <li class="nav-item dropdown{{ request()->is('dashboard') ? ' active' : '' }}">
      <a href="{{ route('dashboard') }}" class="nav-link"><i class="fas fa-fire"></i><span>Dashboard</span></a>
    </li>
    <li class="menu-header">Halaman</li>
    @if(auth()->user()->role_id === 1)
    <li class="{{ request()->routeIs('admin.pengguna.*') ? 'active' : '' }}"><a class="nav-link"
        href="{{ route('admin.pengguna.index') }}"><i class="fas fa-users"></i> <span>Data Pengguna</span></a></li>
    <li class="{{ request()->routeIs('admin.jenis-aset.*') ? 'active' : '' }}"><a class="nav-link"
        href="{{ route('admin.jenis-aset.index') }}"><i class="fas fa-th-large"></i> <span>Jenis Aset</span></a></li>
    <li class="{{ request()->routeIs('admin.ruangan.*') ? 'active' : '' }}"><a class="nav-link"
        href="{{ route('admin.ruangan.index') }}"><i class="fas fa-map-marker-alt"></i> <span>Ruangan</span></a></li>
    <li class="{{ request()->routeIs('admin.aset.*') ? 'active' : '' }}"><a class="nav-link"
        href="{{ route('admin.aset.index') }}"><i class="fas fa-boxes"></i> <span>Data Aset</span></a></li>
    @endif

    @if(auth()->user()->role_id === 1 || auth()->user()->role_id === 3)
    <li class="{{ request()->routeIs('admin.laporan.*') ? 'active' : '' }}"><a class="nav-link"
        href="{{ route('admin.laporan.index') }}"><i class="fas fa-table"></i> <span>Laporan</span></a></li>
    @endif

    @if(auth()->user()->role_id === 2)
    <li class="{{ request()->routeIs('admin.ubah-aset.*') ? 'active' : '' }}"><a class="nav-link"
        href="{{ route('admin.ubah-aset.index') }}"><i class="fas fa-edit"></i> <span>Ubah Aset</span></a></li>
    </li>
    @endif
  </ul>
</aside>