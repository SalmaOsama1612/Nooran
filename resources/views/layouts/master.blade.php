<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>

<meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1.0">


<title>
جمعية نوران التعليمية
</title>


<!-- Bootstrap -->

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">


<!-- Font Awesome -->

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">


<!-- Google Font -->

<link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;600;700;800&display=swap" rel="stylesheet">


<!-- CSS -->
 <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

<link rel="stylesheet" href="{{asset('css/style.css')}}">


</head>


<body>


@include('partials.navbar')

<div id="loader">
    <div class="loader-content">
        <img src="{{ asset('images/logo.png') }}" alt="Nooran Logo">

        <div class="spinner"></div>
    </div>
</div>

<link rel="stylesheet" href="{{ asset('css/about.css') }}">
<link rel="stylesheet" href="{{ asset('css/assembly.css') }}">

@yield('content')

@include('partials.footer')



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>


<script src="{{asset('js/app.js')}}"></script>


</body>

</html>