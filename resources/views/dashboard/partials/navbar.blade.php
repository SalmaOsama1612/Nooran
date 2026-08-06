<nav class="dashboard-navbar">

    <div class="navbar-title">

        <h5>
            لوحة التحكم
        </h5>

    </div>


    <div class="navbar-user">

        <div class="user-info">

            <i class="fa-solid fa-user"></i>

            <span>
                {{ Auth::user()->name }}
            </span>

        </div>


        <form method="POST" action="{{ route('logout') }}">

            @csrf

            <button type="submit" class="logout-navbar">

                <i class="fa-solid fa-right-from-bracket"></i>

                خروج

            </button>

        </form>


    </div>

</nav>