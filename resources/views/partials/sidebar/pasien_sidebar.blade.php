<!-- Menu -->

<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
  @include('partials.sidebar_logo')

  <div class="menu-inner-shadow"></div>

  <ul class="menu-inner py-1">
    <!-- Dashboard -->
    <li class="menu-item active">
      <a href="/" class="menu-link">
        {{-- <i class="fa-solid fa-house fa-lg"></i> --}}
        <div data-i18n="Analytics">Dashboard</div>
      </a>
    </li>

    <!-- Rekam Medis Personal -->
    <li class="menu-item">
      <a href="/rekam_medis/daftar_rekam_medis/personal" class="menu-link">
        <div data-i18n="Analytics">Rekam Medis Personal</div>
      </a>
    </li>

    <!-- Rekam Medis Tenaga Kesehatan -->
    <li class="menu-item">
      <a href="/rekam_medis/daftar_rekam_medis/tenaga_kesehatan" class="menu-link">
        <div data-i18n="Analytics">Rekam Medis Tenaga Kesehatan</div>
      </a>
    </li>
    
    <!-- Profil -->
    <li class="menu-item">
      <a href="/profil" class="menu-link">
        <div data-i18n="Analytics">Profil</div>
      </a>
    </li>

  </ul>
</aside>
<!-- / Menu -->