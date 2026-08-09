<aside class="sidebar">
    <div class="sidebar-brand">
        <div class="logo-wrapper">
            <img
                src="{{ asset('images/logo.png') }}"
                alt="جمعية نوران"
                class="sidebar-logo"
            >
        </div>
    </div>
    <ul class="sidebar-menu">
        <li>
            <a href="{{ route('dashboard') }}"
               class="{{ request()->routeIs('dashboard') ? 'active' : '' }}">
                <span class="menu-icon">
                    <i class="fa-solid fa-house"></i>
                </span>
                <span class="menu-text">
                    الرئيسية
                </span>
            </a>
        </li>
        <li class="menu-title">
            إدارة الموقع
        </li>
        <li>
            <a href="{{ route('dashboard.hero') }}"
               class="{{ request()->routeIs('dashboard.hero') ? 'active' : '' }}">
                <span class="menu-icon">
                    <i class="fa-solid fa-video"></i>
                </span>
                <span class="menu-text">
                    الافتتاحية
                </span>
            </a>
        </li>
        <li>
            <a href="{{ route('dashboard.founders.index') }}"
               class="{{ request()->routeIs('dashboard.founders.*') ? 'active' : '' }}">
                <span class="menu-icon">
                    <i class="fa-solid fa-users"></i>
                </span>
                <span class="menu-text">
                    المؤسسون
                </span>
            </a>
        </li>
        <li>
            <a href="{{ route('dashboard.programs.index') }}"
               class="{{ request()->routeIs('dashboard.programs.*') ? 'active' : '' }}">
                <span class="menu-icon">
                    <i class="fa-solid fa-book-open"></i>
                </span>
                <span class="menu-text">
                    البرامج
                </span>
            </a>
        </li>
        <li>
            <a href="{{ route('dashboard.achievement') }}"
               class="{{ request()->routeIs('dashboard.achievement') ? 'active' : '' }}">
                <span class="menu-icon">
                    <i class="fa-solid fa-trophy"></i>
                </span>
                <span class="menu-text">
                    الإنجازات
                </span>
            </a>
        </li>
        <li>
            <a href="#">
                <span class="menu-icon">
                    <i class="fa-solid fa-id-card"></i>
                </span>
                <span class="menu-text">
                    العضويات
                </span>
            </a>
        </li>
        <li>
            <a href="#">
                <span class="menu-icon">
                    <i class="fa-solid fa-handshake-angle"></i>
                </span>
                <span class="menu-text">
                    التطوع
                </span>
            </a>
        </li>
        <li class="menu-title">
            النظام
        </li>
        <li>
            <a href="#">
                <span class="menu-icon">
                    <i class="fa-solid fa-gear"></i>
                </span>
                <span class="menu-text">
                    الإعدادات
                </span>
            </a>
        </li>
    </ul>
    <div class="sidebar-footer">
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="logout-btn">
                <span class="menu-icon">
                    <i class="fa-solid fa-right-from-bracket"></i>
                </span>
                <span class="menu-text">
                    تسجيل الخروج
                </span>
            </button>
        </form>
    </div>
</aside>

