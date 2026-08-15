@extends('layouts.master')

@section('content')

<section class="board-section">

    <div class="board-container">

        <div class="board-heading">

            <span class="board-label">
                جمعية نوران التعليمية
            </span>

            <h1>
                أعضاء مجلس الإدارة
            </h1>

            <p>
                تعرف على أعضاء مجلس إدارة جمعية نوران التعليمية ودورهم في دعم رسالة الجمعية وتحقيق أهدافها.
            </p>

        </div>

        <div class="board-members-grid">

            @foreach($members as $member)

                <div class="board-card">

                    <div class="board-card-image">

                        @if($member->image)

                            <img
                                src="{{ asset('images/board/' . $member->image) }}"
                                alt="{{ $member->name }}"
                            >

                        @else

                            <div class="board-placeholder">
                                <i class="fa-solid fa-user"></i>
                            </div>

                        @endif

                    </div>

                    <div class="board-card-content">

                        <h3>
                            {{ $member->name }}
                        </h3>

                        <span>
                            {{ $member->position }}
                        </span>

                    </div>

                </div>

            @endforeach

        </div>

    </div>

</section>

@endsection