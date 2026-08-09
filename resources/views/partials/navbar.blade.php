<nav class="navbar navbar-expand-lg nooran-navbar">

    <div class="container-fluid">

        <a class="navbar-brand nooran-logo" href="{{route('home')}}">
            <img src="{{asset('images/logo.png')}}" alt="جمعية نوران">
        </a>

        <button class="navbar-toggler"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#nooranNav">

            <span class="navbar-toggler-icon"></span>

        </button>


        <div class="collapse navbar-collapse" id="nooranNav">

            <ul class="navbar-nav mx-auto align-items-lg-center">


                <!-- الرئيسية -->

                <li class="nav-item">

                    <a class="nav-link {{request()->routeIs('home') ? 'active' : ''}}"
                       href="{{route('home')}}">

                        الرئيسية

                    </a>

                </li>


                <!-- عن الجمعية -->

                <li class="nav-item dropdown">

                    <a class="nav-link dropdown-toggle 
                    {{request()->routeIs(['about','assembly','board','executive','advisor','structure']) ? 'active' : ''}}"
                       href="#"
                       data-bs-toggle="dropdown">

                        عن الجمعية

                    </a>


                    <ul class="dropdown-menu">

                        <li>
                            <a class="dropdown-item {{request()->routeIs('about') ? 'active' : ''}}"
                               href="{{route('about')}}">

                                من نحن

                            </a>
                        </li>


                        <li>
                            <a class="dropdown-item {{request()->routeIs('assembly') ? 'active' : ''}}"
                               href="{{route('assembly')}}">

                                الجمعية العمومية

                            </a>
                        </li>


                        <li>
                            <a class="dropdown-item {{request()->routeIs('board') ? 'active' : ''}}"
                               href="{{route('board')}}">

                                أعضاء مجلس الإدارة

                            </a>
                        </li>


                        <li>
                            <a class="dropdown-item {{request()->routeIs('executive') ? 'active' : ''}}"
                               href="{{route('executive')}}">

                                المدير التنفيذي

                            </a>
                        </li>


                        <li>
                            <a class="dropdown-item {{request()->routeIs('advisor') ? 'active' : ''}}"
                               href="{{route('advisor')}}">

                                المستشار المالي

                            </a>
                        </li>


                        <li>
                            <a class="dropdown-item {{request()->routeIs('structure') ? 'active' : ''}}"
                               href="{{route('structure')}}">

                                الهيكل التنظيمي

                            </a>
                        </li>

                    </ul>

                </li>


                <!-- البرامج -->

                <li class="nav-item">

                    <a class="nav-link {{request()->routeIs('programs') ? 'active' : ''}}"
                       href="{{route('programs')}}">

                        البرامج

                    </a>

                </li>


                <!-- التطوع -->

                <li class="nav-item">

                    <a class="nav-link {{request()->routeIs('volunteer') ? 'active' : ''}}"
                       href="{{route('volunteer')}}">

                        تطوع

                    </a>

                </li>


                <!-- الحوكمة -->

                <li class="nav-item">

                    <a class="nav-link {{request()->routeIs('governance') ? 'active' : ''}}"
                       href="{{route('governance')}}">

                        الحوكمة

                    </a>

                </li>


            </ul>


            <div class="nav-buttons">

   <a href="{{ route('login') }}" class="login-btn">
    <i class="bi bi-person-fill"></i>
    تسجيل الدخول
</a>


                <a href="#"
                   class="donate-btn">

                    <i class="bi bi-gift-fill"></i>

                    تبرع الآن

                </a>

            </div>


        </div>

    </div>

</nav>