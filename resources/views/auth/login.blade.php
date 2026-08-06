<x-guest-layout>

<div class="login-page">

    <div class="login-box">

        <img src="{{ asset('images/logo.png') }}" 
             class="login-logo"
             alt="Nooran Association">


        <h2>تسجيل الدخول</h2>
        <p>لوحة تحكم جمعية نوران</p>


        <form method="POST" action="{{ route('login') }}">
            @csrf


            <div class="input-group">

                <label>
                    البريد الإلكتروني
                </label>

                <input 
                    type="email"
                    name="email"
                    value="{{ old('email') }}"
                    required
                    autofocus
                >

            </div>



            <div class="input-group">

                <label>
                    كلمة المرور
                </label>

                <input 
                    type="password"
                    name="password"
                    required
                >

            </div>



            <div class="remember">

                <input 
                    type="checkbox"
                    name="remember"
                >

                <span>
                    تذكرني
                </span>

            </div>



            <button type="submit">
                دخول
            </button>


        </form>


    </div>

</div>

</x-guest-layout>