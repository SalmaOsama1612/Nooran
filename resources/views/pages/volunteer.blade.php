@extends('layouts.master')

@section('content')

<section class="volunteer-section">

    <div class="volunteer-container">

        @if($opportunity)

            <div class="volunteer-card">

                <div class="volunteer-brand">

                    @if($opportunity->logo)
                        <img
                            src="{{ asset('storage/' . $opportunity->logo) }}"
                            alt="{{ $opportunity->organization_name }}"
                            class="volunteer-logo"
                        >
                    @else
                        <div class="volunteer-logo-placeholder">
                            <i class="fa-solid fa-hands-holding-circle"></i>
                        </div>
                    @endif

                    <h2>
                        {{ $opportunity->organization_name }}
                    </h2>

                    @if($opportunity->organization_description)
                        <p>
                            {{ $opportunity->organization_description }}
                        </p>
                    @endif

                </div>

                <div class="volunteer-content">

                    <h1>
                        {{ $opportunity->title }}
                    </h1>

                    @if($opportunity->start_date)
                        <div class="volunteer-date">
                            <i class="fa-regular fa-calendar"></i>

                            <span>
                                البدء،
                                {{ \Carbon\Carbon::parse($opportunity->start_date)->translatedFormat('d F Y') }}
                            </span>
                        </div>
                    @endif

                    @php
                        $current = (int) $opportunity->current_volunteers;
                        $max = (int) $opportunity->max_volunteers;

                        $percentage = $max > 0
                            ? min(100, round(($current / $max) * 100))
                            : 0;
                    @endphp

                    <div class="volunteer-progress-box">

                        <div class="volunteer-progress-info">

                            <span>
                                إجمالي المتطوعين
                            </span>

                            <strong>
                                {{ $current }} من {{ $max }}
                            </strong>

                        </div>

                        <div class="volunteer-progress">

                            <div
                                class="volunteer-progress-bar"
                                style="width: {{ $percentage }}%;"
                            ></div>

                        </div>

                        <span class="volunteer-progress-percent">
                            {{ $percentage }}%
                        </span>

                    </div>

                    <div class="volunteer-actions">

                        @if($opportunity->external_url)

                            <a
                                href="{{ $opportunity->external_url }}"
                                target="_blank"
                                rel="noopener noreferrer"
                                class="volunteer-main-btn"
                            >
                                <i class="fa-solid fa-hand-holding-heart"></i>
                                تطوع الآن
                            </a>

                        @endif

                        <button
                            type="button"
                            class="volunteer-women-btn"
                            onclick="openWomenVolunteerModal()"
                        >
                            <i class="fa-solid fa-person-dress"></i>
                            تطوع للنساء فقط
                        </button>

                        <div class="volunteer-info-icon">
                            <i class="fa-solid fa-info"></i>
                        </div>

                    </div>

                </div>

            </div>

        @else

            <div class="volunteer-empty">

                <div class="volunteer-empty-icon">
                    <i class="fa-solid fa-hands-helping"></i>
                </div>

                <h2>
                    لا توجد فرصة تطوعية حالياً
                </h2>

                <p>
                    سيتم الإعلان عن الفرص التطوعية الجديدة قريباً.
                </p>

            </div>

        @endif

    </div>

</section>


@if($opportunity)

<div
    class="women-volunteer-modal"
    id="womenVolunteerModal"
>

    <div class="women-volunteer-overlay"
         onclick="closeWomenVolunteerModal()">
    </div>

    <div class="women-volunteer-box">

        <button
            type="button"
            class="women-volunteer-close"
            onclick="closeWomenVolunteerModal()"
        >
            <i class="fa-solid fa-xmark"></i>
        </button>

        <div class="women-volunteer-header">

            <div class="women-volunteer-icon">
                <i class="fa-solid fa-person-dress"></i>
            </div>

            <h2>
                تطوع للنساء فقط
            </h2>

            <p>
                يرجى تعبئة البيانات التالية للتقديم على الفرصة التطوعية.
            </p>

        </div>

        <form
            action="{{ route('volunteer.apply') }}"
            method="POST"
            class="women-volunteer-form"
            id="womenVolunteerForm"
        >

            @csrf

            <input
                type="hidden"
                name="volunteer_opportunity_id"
                value="{{ $opportunity->id }}"
            >

            <div class="women-form-group">

                <label>
                    الاسم الكامل
                </label>

                <input
                    type="text"
                    name="name"
                    required
                    placeholder="اكتبي الاسم الكامل"
                >

            </div>

            <div class="women-form-row">

                <div class="women-form-group">

                    <label>
                        رقم الجوال
                    </label>

                    <input
                        type="text"
                        name="phone"
                        required
                        placeholder="05xxxxxxxx"
                    >

                </div>

                <div class="women-form-group">

                    <label>
                        البريد الإلكتروني
                    </label>

                    <input
                        type="email"
                        name="email"
                        placeholder="example@email.com"
                    >

                </div>

            </div>

            <div class="women-form-group">

                <label>
                    النوع
                </label>

                <select
                    name="gender"
                    id="womenGender"
                    required
                >

                    <option value="">
                        اختاري النوع
                    </option>

                    <option value="female">
                        أنثى
                    </option>

                    <option value="male">
                        ذكر
                    </option>

                </select>

                <small
                    class="women-gender-error"
                    id="womenGenderError"
                >
                    هذه الفرصة التطوعية مخصصة للنساء فقط.
                </small>

            </div>

            <div class="women-form-group">

                <label>
                    ملاحظات
                </label>

                <textarea
                    name="notes"
                    rows="4"
                    placeholder="أي ملاحظات إضافية"
                ></textarea>

            </div>

            <button
                type="submit"
                class="women-submit-btn"
                id="womenSubmitBtn"
            >
                <i class="fa-solid fa-paper-plane"></i>
                إرسال طلب التطوع
            </button>

        </form>

    </div>

</div>

@endif


<script>

function openWomenVolunteerModal() {
    const modal = document.getElementById('womenVolunteerModal');

    if (!modal) {
        return;
    }

    modal.classList.add('active');

    document.body.classList.add('modal-open');
}

function closeWomenVolunteerModal() {
    const modal = document.getElementById('womenVolunteerModal');

    if (!modal) {
        return;
    }

    modal.classList.remove('active');

    document.body.classList.remove('modal-open');
}

document.addEventListener('DOMContentLoaded', function () {

    const form = document.getElementById('womenVolunteerForm');
    const gender = document.getElementById('womenGender');
    const error = document.getElementById('womenGenderError');
    const submit = document.getElementById('womenSubmitBtn');

    if (!form || !gender) {
        return;
    }

    gender.addEventListener('change', function () {

        if (gender.value === 'male') {

            error.classList.add('show');
            submit.disabled = true;

        } else {

            error.classList.remove('show');
            submit.disabled = false;

        }

    });

    form.addEventListener('submit', function (event) {

        if (gender.value !== 'female') {

            event.preventDefault();

            error.classList.add('show');

            gender.focus();

        }

    });

});

</script>

@endsection

