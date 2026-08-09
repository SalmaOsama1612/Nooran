@extends('layouts.master')
@push('styles')
<link rel="stylesheet" href="{{ asset('css/about.css') }}">
@endpush

@section('content')

<section class="about-page" dir="rtl">

    {{-- Page Hero --}}
    <div class="about-hero">
        <div class="container">
            <div class="about-hero-content">
                <span>جمعية نوران التعليمية</span>
                <h1>من نحن</h1>
                <p>نبني المعرفة، ونمكّن الإنسان، ونصنع أثرًا مستدامًا.</p>
            </div>
        </div>
    </div>


    {{-- About Introduction --}}
    <section class="about-intro">
        <div class="container">

            <div class="about-section-heading">
                <span>تعرف علينا</span>
                <h2>من نحن</h2>
            </div>

            <div class="about-intro-card">

                <div class="about-intro-icon">
                    <i class="fa-solid fa-building-columns"></i>
                </div>

                <div class="about-intro-text">
                    <p>{{ $about->intro }}</p>
                </div>

            </div>

        </div>
    </section>


    {{-- Vision & Mission --}}
    <section class="about-vision-mission">
        <div class="container">

            <div class="about-section-heading">
                <span>رؤيتنا ورسالتنا</span>
                <h2>نحو أثر تعليمي مستدام</h2>
            </div>

            <div class="row g-4">

                <div class="col-lg-6">

                    <div class="about-info-card vision-card">

                        <div class="about-info-icon">
                            <i class="fa-solid fa-eye"></i>
                        </div>

                        <div>
                            <h3>الرؤية</h3>
                            <p>{{ $about->vision }}</p>
                        </div>

                    </div>

                </div>


                <div class="col-lg-6">

                    <div class="about-info-card mission-card">

                        <div class="about-info-icon">
                            <i class="fa-solid fa-bullseye"></i>
                        </div>

                        <div>
                            <h3>الرسالة</h3>
                            <p>{{ $about->mission }}</p>
                        </div>

                    </div>

                </div>

            </div>

        </div>
    </section>


    {{-- Values --}}
    <section class="about-values">

        <div class="container">

            <div class="about-section-heading">
                <span>ما نؤمن به</span>
                <h2>قيمنا</h2>
            </div>


            <div class="values-grid">

                @foreach(preg_split('/\r\n|\r|\n/', $about->values) as $value)

                    @if(trim($value))

                        <div class="value-card">

                            <div class="value-icon">
                                <i class="fa-solid fa-check"></i>
                            </div>

                            <h3>{{ trim($value) }}</h3>

                        </div>

                    @endif

                @endforeach

            </div>

        </div>

    </section>


    {{-- Strategic Axes --}}
    <section class="about-axes">

        <div class="container">

            <div class="about-section-heading">
                <span>مسارات العمل</span>
                <h2>المحاور الإستراتيجية</h2>
            </div>


            <div class="axes-grid">

                @foreach(preg_split('/\r\n|\r|\n/', $about->strategic_axes) as $index => $axis)

                    @if(trim($axis))

                        <div class="axis-card">

                            <div class="axis-number">
                                {{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}
                            </div>

                            <div class="axis-content">
                                <h3>{{ trim($axis) }}</h3>
                            </div>

                        </div>

                    @endif

                @endforeach

            </div>

        </div>

    </section>


    {{-- Strategic Goals --}}
    <section class="about-goals">

        <div class="container">

            <div class="about-section-heading">
                <span>نحو المستقبل</span>
                <h2>الأهداف الاستراتيجية</h2>
            </div>


            <div class="goals-list">

                @foreach(preg_split('/\r\n|\r|\n/', $about->strategic_goals) as $index => $goal)

                    @if(trim($goal))

                        <div class="goal-item">

                            <div class="goal-number">
                                {{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}
                            </div>

                            <div class="goal-text">
                                <p>{{ trim($goal) }}</p>
                            </div>

                        </div>

                    @endif

                @endforeach

            </div>

        </div>

    </section>

</section>

@endsection