<!-- Menu -->

<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
  @include('partials.sidebar_logo')

  <div class="menu-inner-shadow"></div>

  <ul class="menu-inner py-1">
    <!-- Dashboard -->
    <li class="menu-item active">
      <a href="/" class="menu-link">
        <i class="fa-solid fa-house fa-lg"></i>
        <div data-i18n="Analytics">Dashboard</div>
      </a>
    </li>

    <!-- Materi -->
    <li class="menu-item">
      <a href="#" class="menu-link">
        <i class="fa-solid fa-book-open fa-lg"></i>
        <div data-i18n="Analytics">Materi</div>
      </a>
    </li>
    
    <!-- simulasi -->
    <li class="menu-item">
      <a href="javascript:void(0);" class="menu-link menu-toggle">
        <i class="fa-solid fa-list-ul fa-lg"></i>
        <div data-i18n="Layouts">Simulasi</div>
      </a>

      <ul class="menu-sub">
        <li class="menu-item">
          <a href="#" class="menu-link">
            <div data-i18n="Without menu">Simulasi</div>
          </a>
        </li>
        <li class="menu-item">
          <a href="#" class="menu-link">
            <div data-i18n="Without navbar">Histori Simulasi</div>
          </a>
        </li>
      </ul>
    </li>

    <!-- Nilai -->
    <li class="menu-item">
      <a href="#" class="menu-link">
        <i class="fa-solid fa-chart-line fa-lg"></i>
        <div data-i18n="Analytics">Nilai</div>
      </a>
    </li>

    <!-- Bantuan -->
    <li class="menu-item">
      <a href="#" class="menu-link">
        <i class="fa-regular fa-circle-question fa-lg"></i>
        <div data-i18n="Analytics">Bantuan</div>
      </a>
    </li>

  </ul>
</aside>
<!-- / Menu -->