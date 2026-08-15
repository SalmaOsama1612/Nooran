@extends('layouts.master')

@section('content')

<section class="executive-section">

    <div class="executive-container">

        <div class="executive-heading">
            <span>عن الجمعية</span>
            <h1>المدير التنفيذي</h1>
            <div class="executive-line"></div>
        </div>

        @if($executive)

            <div class="executive-profile">

                <div class="executive-image-wrapper">

                    @if($executive->image)
<img class="executive-image" src="{{ asset('images/executive/' . $executive->image) }}" alt="{{ $executive->name }}">

                         @else
                        <div class="executive-image-placeholder">
                            <i class="fa-solid fa-user"></i>
                        </div>
                    @endif

                </div>

                <div class="executive-content">

                    <span class="executive-label">
                        المدير التنفيذي
                    </span>

                    <h2>
                        {{ $executive->name }}
                    </h2>

                    <div class="executive-details">

                        <div class="executive-detail">

                            <div class="executive-icon">
                                <i class="fa-solid fa-graduation-cap"></i>
                            </div>

                            <div>
                                <span>الدرجة العلمية</span>
                                <strong>{{ $executive->degree }}</strong>
                            </div>

                        </div>

                        <div class="executive-detail">

                            <div class="executive-icon">
                                <i class="fa-solid fa-briefcase"></i>
                            </div>

                            <div>
                                <span>المسمى الوظيفي</span>
                                <strong>{{ $executive->job_title }}</strong>
                            </div>

                        </div>

                        <div class="executive-detail">

                            <div class="executive-icon">
                                <i class="fa-solid fa-phone"></i>
                            </div>

                            <div>
                                <span>الجوال</span>
                                <strong dir="ltr">{{ $executive->phone }}</strong>
                            </div>

                        </div>

                        <div class="executive-detail">

                            <div class="executive-icon">
                                <i class="fa-solid fa-envelope"></i>
                            </div>

                            <div>
                                <span>البريد الإلكتروني</span>
                                <strong>{{ $executive->email }}</strong>
                            </div>

                        </div>

                    </div>

                </div>

            </div>

        @endif

    </div>

</section>

@endsection