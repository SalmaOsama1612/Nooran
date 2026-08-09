@extends('layouts.master')

@section('title', 'الجمعية العمومية')


@section('content')

<section class="assembly-page">

    <div class="assembly-hero">
        <div class="container">
            <div class="assembly-hero-content">
                <span>جمعية نوران التعليمية</span>
                <h1>الجمعية العمومية</h1>
                <p>أعضاء الجمعية العمومية</p>
            </div>
        </div>
    </div>

    <section class="assembly-members-section">

        <div class="container">

            <div class="section-heading">
                <span>أعضاء الجمعية</span>
                <h2>الجمعية العمومية</h2>
                <p>أعضاء الجمعية العمومية لجمعية نوران التعليمية</p>
            </div>

            @if($members->count())

                <div class="assembly-members-grid">

                    @foreach($members as $member)

                        <div class="assembly-member-card">

                            <div class="assembly-member-image">

                                @if($member->image)

                                    <img
                                        src="{{ asset('storage/' . $member->image) }}"
                                        alt="{{ $member->name }}"
                                    >

                                @else

                                    <div class="member-placeholder">
                                        <i class="fa-solid fa-user"></i>
                                    </div>

                                @endif

                            </div>

                            <div class="assembly-member-info">

                                <h3>{{ $member->name }}</h3>

                                <span>{{ $member->position }}</span>

                            </div>

                        </div>

                    @endforeach

                </div>

            @else

                <div class="empty-members">

                    <i class="fa-solid fa-users"></i>

                    <p>لا توجد بيانات حاليا</p>

                </div>

            @endif

        </div>

    </section>

</section>

@endsection