@extends('layouts.master')

@section('title', 'المستشار المالي')

@section('content')

<section class="advisor-section">

    <div class="advisor-container">

        <div class="advisor-heading">
            <span>عن الجمعية</span>
            <h1>المستشار المالي</h1>
            <div class="advisor-line"></div>
        </div>

        @if($advisor)

            <div class="advisor-profile">

                <div class="advisor-image-wrapper">

                    @if($advisor->image)

                        <img
                            src="{{ asset('storage/' . $advisor->image) }}"
                            alt="{{ $advisor->name }}"
                            class="advisor-image"
                        >

                    @else

                        <div class="advisor-image-placeholder">
                            <i class="fa-solid fa-user-tie"></i>
                        </div>

                    @endif

                </div>

                <div class="advisor-content">

                    <span class="advisor-label">
                        المستشار المالي
                    </span>

                    <h2>{{ $advisor->name }}</h2>

                    <div class="advisor-details">

                        @if($advisor->degree)
                            <div class="advisor-detail">
                                <div class="advisor-icon">
                                    <i class="fa-solid fa-graduation-cap"></i>
                                </div>

                                <div>
                                    <span>الدرجة العلمية</span>
                                    <strong>{{ $advisor->degree }}</strong>
                                </div>
                            </div>
                        @endif

                        @if($advisor->position)
                            <div class="advisor-detail">
                                <div class="advisor-icon">
                                    <i class="fa-solid fa-briefcase"></i>
                                </div>

                                <div>
                                    <span>المسمى الوظيفي</span>
                                    <strong>{{ $advisor->position }}</strong>
                                </div>
                            </div>
                        @endif

                        @if($advisor->phone)
                            <div class="advisor-detail">
                                <div class="advisor-icon">
                                    <i class="fa-solid fa-phone"></i>
                                </div>

                                <div>
                                    <span>الجوال</span>
                                    <strong dir="ltr">{{ $advisor->phone }}</strong>
                                </div>
                            </div>
                        @endif

                        @if($advisor->email)
                            <div class="advisor-detail">
                                <div class="advisor-icon">
                                    <i class="fa-solid fa-envelope"></i>
                                </div>

                                <div>
                                    <span>البريد الإلكتروني</span>
                                    <strong>{{ $advisor->email }}</strong>
                                </div>
                            </div>
                        @endif

                    </div>

                </div>

            </div>

        @else

            <div class="advisor-empty">
                <div class="advisor-empty-icon">
                    <i class="fa-solid fa-user-tie"></i>
                </div>

                <h2>لا توجد بيانات للمستشار المالي</h2>

                <p>سيتم عرض بيانات المستشار المالي هنا.</p>
            </div>

        @endif

    </div>

</section>

@endsection