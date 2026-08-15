@extends('dashboard.layouts.app')

@section('title', 'إدارة التطوع')

@section('content')

<div class="volunteer-dashboard-page">

    <div class="volunteer-dashboard-header">
        <div>
            <h2>إدارة التطوع</h2>
            <p>إدارة فرص التطوع والبيانات الخاصة بها</p>
        </div>

        @if(!$opportunity)
            <a href="{{ route('dashboard.volunteer.create') }}" class="volunteer-add-btn">
                <i class="fa-solid fa-plus"></i>
                إضافة فرصة تطوع
            </a>
        @endif
    </div>

    @if(session('success'))
        <div class="volunteer-alert success">
            <i class="fa-solid fa-circle-check"></i>
            {{ session('success') }}
        </div>
    @endif

    @if($opportunity)

        <div class="volunteer-dashboard-card">

            <div class="volunteer-card-top">

                <div class="volunteer-logo-box">
                    @if($opportunity->logo)
                        <img
                            src="{{ asset('storage/' . $opportunity->logo) }}"
                            alt="{{ $opportunity->organization_name }}"
                        >
                    @else
                        <div class="volunteer-logo-placeholder">
                            <i class="fa-solid fa-hand-holding-heart"></i>
                        </div>
                    @endif
                </div>

                <div class="volunteer-card-heading">
                    <span>فرصة تطوعية</span>
                    <h3>{{ $opportunity->title }}</h3>
                    <p>{{ $opportunity->organization_name }}</p>
                </div>

                <div class="volunteer-status">
                    @if($opportunity->is_active)
                        <span class="active">
                            <i class="fa-solid fa-circle"></i>
                            مفعلة
                        </span>
                    @else
                        <span class="inactive">
                            <i class="fa-solid fa-circle"></i>
                            غير مفعلة
                        </span>
                    @endif
                </div>

            </div>

            <div class="volunteer-card-divider"></div>

            <div class="volunteer-info-grid">

                <div class="volunteer-info-item">
                    <div class="volunteer-info-icon">
                        <i class="fa-solid fa-calendar-days"></i>
                    </div>

                    <div>
                        <span>تاريخ البداية</span>
                        <strong>
                            {{ $opportunity->start_date?->format('d/m/Y') ?? 'غير محدد' }}
                        </strong>
                    </div>
                </div>

                <div class="volunteer-info-item">
                    <div class="volunteer-info-icon">
                        <i class="fa-solid fa-users"></i>
                    </div>

                    <div>
                        <span>المتطوعون</span>
                        <strong>
                            {{ $opportunity->current_volunteers }}
                            من
                            {{ $opportunity->max_volunteers }}
                        </strong>
                    </div>
                </div>

                <div class="volunteer-info-item">
                    <div class="volunteer-info-icon">
                        <i class="fa-solid fa-link"></i>
                    </div>

                    <div>
                        <span>منصة التطوع</span>

                        @if($opportunity->external_url)
                            <a
                                href="{{ $opportunity->external_url }}"
                                target="_blank"
                                rel="noopener noreferrer"
                                class="volunteer-link"
                            >
                                فتح الرابط
                                <i class="fa-solid fa-arrow-up-right-from-square"></i>
                            </a>
                        @else
                            <strong>غير مضاف</strong>
                        @endif
                    </div>
                </div>

            </div>

            @if($opportunity->organization_description)
                <div class="volunteer-description">
                    <span>وصف الجمعية</span>
                    <p>{{ $opportunity->organization_description }}</p>
                </div>
            @endif

            @php
                $percentage = $opportunity->max_volunteers > 0
                    ? min(
                        100,
                        ($opportunity->current_volunteers / $opportunity->max_volunteers) * 100
                    )
                    : 0;
            @endphp

            <div class="volunteer-progress-section">

                <div class="volunteer-progress-header">
                    <span>نسبة التسجيل</span>
                    <strong>{{ round($percentage) }}%</strong>
                </div>

                <div class="volunteer-progress">
                    <div
                        class="volunteer-progress-bar"
                        style="width: {{ $percentage }}%"
                    ></div>
                </div>

            </div>

            <div class="volunteer-card-actions">

                <a
                    href="{{ route('dashboard.volunteer.edit', $opportunity) }}"
                    class="volunteer-edit-btn"
                >
                    <i class="fa-solid fa-pen"></i>
                    تعديل
                </a>

                <a
                    href="{{ route('dashboard.volunteer.applications.index') }}"
                    class="volunteer-applications-btn"
                >
                    <i class="fa-solid fa-users"></i>
                    طلبات التطوع
                </a>

                <form
                    action="{{ route('dashboard.volunteer.destroy', $opportunity) }}"
                    method="POST"
                    onsubmit="return confirm('هل أنت متأكد من حذف فرصة التطوع؟')"
                >
                    @csrf
                    @method('DELETE')

                    <button type="submit" class="volunteer-delete-btn">
                        <i class="fa-solid fa-trash"></i>
                        حذف
                    </button>
                </form>

            </div>

        </div>

    @else

        <div class="volunteer-empty">

            <div class="volunteer-empty-icon">
                <i class="fa-solid fa-hand-holding-heart"></i>
            </div>

            <h3>لا توجد فرصة تطوعية</h3>

            <p>لم تتم إضافة أي فرصة تطوعية حتى الآن.</p>

            <a
                href="{{ route('dashboard.volunteer.create') }}"
                class="volunteer-add-btn"
            >
                <i class="fa-solid fa-plus"></i>
                إضافة فرصة تطوع
            </a>

        </div>

    @endif

</div>

@endsection