<!-- Menu -->

<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
  @include('partials.sidebar_logo')

  <div class="menu-inner-shadow"></div>

  <ul class="menu-inner py-1">
    <!-- Dashboard -->
    <li class="menu-item {{ (url('/') == url()->current())? 'active' : '' }}">
      <a href="/" class="menu-link">
        <i class="fa-solid fa-house fa-lg"></i>
        <div data-i18n="Analytics">Dashboard</div>
      </a>
    </li>

    <!-- Akun -->
    <li class="menu-item {{ ( strpos(url()->current(),'akun') != FALSE )? 'active' : '' }}">
      <a href="/akun" class="menu-link">
        <i class="fa-solid fa-circle-user fa-lg"></i>
        <div data-i18n="Analytics">Akun</div>
      </a>
    </li>
    
    <!-- Tahun Ajaran -->
    <li class="menu-item">
      <a href="#" class="menu-link">
        <i class="fa-regular fa-calendar-days fa-lg"></i>
        <div data-i18n="Analytics">Tahun Ajaran</div>
      </a>
    </li>

    <!-- Kelas -->
    <li class="menu-item">
      <a href="#" class="menu-link">
        <i class="fa-solid fa-chalkboard-user fa-lg"></i>
        <div data-i18n="Analytics">Kelas</div>
      </a>
    </li>

    <!-- Tema Literasi -->
    <li class="menu-item">
      <a href="#" class="menu-link">
        <i class="fa-solid fa-newspaper fa-lg"></i>
        <div data-i18n="Analytics">Tema Literasi</div>
      </a>
    </li>

    <!-- Nilai -->
    <li class="menu-item">
      <a href="#" class="menu-link">
        <i class="fa-solid fa-chart-line fa-lg"></i>
        <div data-i18n="Analytics">Nilai</div>
      </a>
    </li>
    
    <!-- Angkets -->
    <li class="menu-item">
      <a href="javascript:void(0);" class="menu-link menu-toggle">
        <i class="fa-solid fa-square-poll-vertical fa-lg"></i>
        <div data-i18n="Layouts">Angket</div>
      </a>

      <ul class="menu-sub">
        <li class="menu-item">
          <a href="#" class="menu-link">
            <div data-i18n="Without menu">Kelola Angket</div>
          </a>
        </li>
        <li class="menu-item">
          <a href="#" class="menu-link">
            <div data-i18n="Without navbar">Respons Angket</div>
          </a>
        </li>
      </ul>
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
