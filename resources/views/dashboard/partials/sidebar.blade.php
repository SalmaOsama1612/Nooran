<div class="sidebar-header">
    <img src="{{ asset('images/logo.png') }}" alt="جمعية نوران" class="sidebar-logo">
    <h4>جمعية نوران</h4>
    <p>لوحة التحكم</p>
</div>

<ul class="sidebar-menu">

    <li>
        <a href="{{ route('dashboard') }}" class="{{ request()->routeIs('dashboard') ? 'active' : '' }}">
            <i class="fa-solid fa-house"></i>
            <span>الرئيسية</span>
        </a>
    </li>

    <li class="menu-title">
        إدارة الموقع
    </li>

    <li>
        <a href="{{ route('dashboard.hero') }}" class="{{ request()->routeIs('dashboard.hero') ? 'active' : '' }}">
            <i class="fa-solid fa-video"></i>
            <span>الهيرو</span>
        </a>
    </li>

    <li>
        <a href="{{ route('dashboard.achievement') }}" class="{{ request()->routeIs('dashboard.achievement') ? 'active' : '' }}">
            <i class="fa-solid fa-trophy"></i>
            <span>الإنجازات</span>
        </a>
    </li>

    <li>
        <a href="{{ route('dashboard.founders.index') }}" class="{{ request()->routeIs('dashboard.founders.*') ? 'active' : '' }}">
            <i class="fa-solid fa-users"></i>
            <span>المؤسسون</span>
        </a>
    </li>

    <li>
        <a href="{{ route('dashboard.programs.index') }}" class="{{ request()->routeIs('dashboard.programs.*') ? 'active' : '' }}">
            <i class="fa-solid fa-book-open"></i>
            <span>البرامج</span>
        </a>
    </li>

    <li>
        <a href="#">
            <i class="fa-solid fa-id-card"></i>
            <span>العضويات</span>
            <small class="coming-soon">قريباً</small>
        </a>
    </li>

    <li>
        <a href="#">
            <i class="fa-solid fa-handshake-angle"></i>
            <span>التطوع</span>
            <small class="coming-soon">قريباً</small>
        </a>
    </li>

    <li class="menu-title">
        النظام
    </li>

    <li>
        <a href="#">
            <i class="fa-solid fa-gear"></i>
            <span>الإعدادات</span>
            <small class="coming-soon">قريباً</small>
        </a>
    </li>

    <li>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="logout-btn">
                <i class="fa-solid fa-right-from-bracket"></i>
                <span>تسجيل الخروج</span>
            </button>
        </form>
    </li>

</ul>