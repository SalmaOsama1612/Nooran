
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
                <span class="menu-text">الرئيسية</span>
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
                <span class="menu-text">الافتتاحية</span>
            </a>
        </li>

        <li>
            <a href="{{ route('dashboard.about.edit') }}"
               class="{{ request()->routeIs('dashboard.about.*') ? 'active' : '' }}">
                <span class="menu-icon">
                    <i class="fa-solid fa-circle-info"></i>
                </span>
                <span class="menu-text">عن الجمعية</span>
            </a>
        </li>

        <li>
            <a href="{{ route('dashboard.achievement') }}"
               class="{{ request()->routeIs('dashboard.achievement*') ? 'active' : '' }}">
                <span class="menu-icon">
                    <i class="fa-solid fa-trophy"></i>
                </span>
                <span class="menu-text">الإنجازات</span>
            </a>
        </li>

        <li>
            <a href="{{ route('dashboard.founders.index') }}"
               class="{{ request()->routeIs('dashboard.founders.*') ? 'active' : '' }}">
                <span class="menu-icon">
                    <i class="fa-solid fa-users"></i>
                </span>
                <span class="menu-text">المؤسسون</span>
            </a>
        </li>

        <li>
            <a href="{{ route('dashboard.programs.index') }}"
               class="{{ request()->routeIs('dashboard.programs.*') ? 'active' : '' }}">
                <span class="menu-icon">
                    <i class="fa-solid fa-book-open"></i>
                </span>
                <span class="menu-text">البرامج</span>
            </a>
        </li>

<li>
    <a
        href="{{ route('dashboard.governance.index') }}"
        class="{{ request()->routeIs('dashboard.governance.*') ? 'active' : '' }}"
    >
        <span class="menu-icon">
            <i class="fa-solid fa-scale-balanced"></i>
        </span>

        <span class="menu-text">
            الحوكمة
        </span>
    </a>
</li>


        <li>
            <a href="{{ route('dashboard.assembly.index') }}"
               class="{{ request()->routeIs('dashboard.assembly.*') ? 'active' : '' }}">
                <span class="menu-icon">
                    <i class="fa-solid fa-people-group"></i>
                </span>
                <span class="menu-text">الجمعية العمومية</span>
            </a>
        </li>

        <li>
            <a href="{{ route('dashboard.board.index') }}"
               class="{{ request()->routeIs('dashboard.board.*') ? 'active' : '' }}">
                <span class="menu-icon">
                    <i class="fa-solid fa-building-columns"></i>
                </span>
                <span class="menu-text">مجلس الإدارة</span>
            </a>
        </li>

        <li>
            <a href="{{ route('dashboard.advisor') }}"
               class="{{ request()->routeIs('dashboard.advisor*') ? 'active' : '' }}">
                <span class="menu-icon">
                    <i class="fa-solid fa-user-tie"></i>
                </span>
                <span class="menu-text">المستشار المالي</span>
            </a>
        </li>

        <li>
            <a href="{{ route('dashboard.organizational-structure.index') }}"
               class="{{ request()->routeIs('dashboard.organizational-structure.*') ? 'active' : '' }}">
                <span class="menu-icon">
                    <i class="fa-solid fa-sitemap"></i>
                </span>
                <span class="menu-text">الهيكل التنظيمي</span>
            </a>
        </li>

        <li class="menu-title">
            الخدمات والمجتمع
        </li>

        <li>
            <a href="{{ route('dashboard.programs.index') }}"
               class="{{ request()->routeIs('dashboard.programs.*') ? 'active' : '' }}">
                <span class="menu-icon">
                    <i class="fa-solid fa-layer-group"></i>
                </span>
                <span class="menu-text">برامج الجمعية</span>
            </a>
        </li>

        <li>
            <a href="{{ route('dashboard.volunteer.index') }}"
               class="{{ request()->routeIs('dashboard.volunteer.*') ? 'active' : '' }}">
                <span class="menu-icon">
                    <i class="fa-solid fa-handshake-angle"></i>
                </span>
                <span class="menu-text">فرص التطوع</span>
            </a>
        </li>

        <li>
            <a href="{{ route('dashboard.volunteer.applications.index') }}"
               class="{{ request()->routeIs('dashboard.volunteer.applications.*') ? 'active' : '' }}">
                <span class="menu-icon">
                    <i class="fa-solid fa-file-signature"></i>
                </span>
                <span class="menu-text">طلبات التطوع</span>
            </a>
        </li>

        <li>
            <a href="{{ route('contact') }}">
                <span class="menu-icon">
                    <i class="fa-solid fa-envelope"></i>
                </span>
                <span class="menu-text">تواصل معنا</span>
            </a>
        </li>

        <li class="menu-title">
            النظام
        </li>

        <li>
            <a href="{{ route('profile.edit') }}"
               class="{{ request()->routeIs('profile.*') ? 'active' : '' }}">
                <span class="menu-icon">
                    <i class="fa-solid fa-user-gear"></i>
                </span>
                <span class="menu-text">الملف الشخصي</span>
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
