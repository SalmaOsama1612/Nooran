@extends('layouts.master')

@section('content')

<section class="programs-section">

    <div class="programs-container">

        <div class="programs-image-side">

            <div class="programs-image-box">
                <img src="{{ asset('images/smallLogo.png') }}" alt="جمعية نوران التعليمية">
            </div>

            <div class="programs-heading">
                <span>NOORAN ASSOCIATION</span>
                <h2>برامجنا ومشاريعنا</h2>
                <p>
                    مجموعة من البرامج والمشاريع التعليمية التي تهدف إلى
                    بناء مجتمع معرفي متعلم ومتمكن.
                </p>
            </div>

        </div>

        <div class="programs-content">

            <div class="programs-list">

                @foreach($programs as $index => $program)

                    <div class="program-strip"
                         data-bs-toggle="modal"
                         data-bs-target="#program{{ $program->id }}">

                        <div class="program-strip-number">
                            {{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}
                        </div>

                        <div class="program-strip-text">

                            <span>{{ $program->subtitle }}</span>

                            <h3>{{ $program->title }}</h3>

                        </div>

                        <div class="program-strip-arrow">
                            <i class="bi bi-arrow-left"></i>
                        </div>

                    </div>

                @endforeach

            </div>

        </div>

    </div>

</section>

@foreach($programs as $program)

<div class="modal fade program-modal"
     id="program{{ $program->id }}"
     tabindex="-1"
     aria-hidden="true">

    <div class="modal-dialog modal-lg modal-dialog-centered">

        <div class="modal-content">

            <div class="modal-header">

                <h5 class="modal-title">
                    {{ $program->title }}
                </h5>

                <button type="button"
                        class="modal-close"
                        data-bs-dismiss="modal"
                        aria-label="Close">

                    <i class="bi bi-x-lg"></i>

                </button>

            </div>

            <div class="modal-body">

                <span class="program-modal-subtitle">
                    {{ $program->subtitle }}
                </span>

                <p>
                    {{ $program->description }}
                </p>

                <div class="program-modal-divider"></div>

                <h5>
                    أهداف البرنامج
                </h5>

                <p>
                    {!! nl2br(e($program->goals)) !!}
                </p>

            </div>

        </div>

    </div>

</div>

@endforeach

@endsection