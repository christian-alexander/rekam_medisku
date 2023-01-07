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

    <!-- Rekam Medis Pribadi -->
    <li class="menu-item">
      <a href="#" class="menu-link">
        <div data-i18n="Analytics">Rekam Medis Pribadi</div>
      </a>
    </li>

    <!-- Rekam Medis Pelayan Kesehatan -->
    <li class="menu-item">
      <a href="#" class="menu-link">
        <div data-i18n="Analytics">Rekam Medis Pelayan Kesehatan</div>
      </a>
    </li>
    
  </ul>
</aside>
<!-- / Menu -->