<!-- Menu -->

<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
  @include('partials.sidebar_logo')

  <div class="menu-inner-shadow"></div>

  <ul class="menu-inner py-1">
    <!-- Dashboard -->
    <li class="menu-item {{ (url('/') == url()->current())? 'active' : '' }}">
      <a href="/" class="menu-link">
        {{-- <i class="fa-solid fa-house fa-lg"></i> --}}
        <div data-i18n="Analytics">Dashboard</div>
      </a>
    </li>

    <!-- Permintaan Pasien -->
    <li class="menu-item {{ ( strpos(url()->current(),'permintaan_menghubungkan') != FALSE )? 'active' : '' }}">
      <a href="/permintaan_menghubungkan" class="menu-link">
        <div data-i18n="Analytics">Permintaan Menghubungkan</div>
      </a>
    </li>

    <!-- Pasien -->
    <li class="menu-item {{ ( strpos(url()->current(),'pasien') != FALSE )? 'active' : '' }}">
      <a href="#" class="menu-link">
        <div data-i18n="Analytics">Pasien</div>
      </a>
    </li>

    <!-- Profil -->
    <li class="menu-item {{ ( strpos(url()->current(),'profil') != FALSE )? 'active' : '' }}">
      <a href="/profil" class="menu-link">
        <div data-i18n="Analytics">Profil</div>
      </a>
    </li>

  </ul>
</aside>
<!-- / Menu -->