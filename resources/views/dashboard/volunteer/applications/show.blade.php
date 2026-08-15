
@extends('dashboard.layouts.app')

@section('title', 'تفاصيل طلب التطوع')

@section('content')

<div class="volunteer-application-show-page">

    <div class="volunteer-dashboard-header">

        <div>
            <h2>تفاصيل طلب التطوع</h2>
            <p>مراجعة بيانات المتطوع وتحديث حالة الطلب</p>
        </div>

        <a href="{{ route('dashboard.volunteer.applications.index') }}"
           class="volunteer-back-btn">

            <i class="fa-solid fa-arrow-right"></i>
            العودة للطلبات

        </a>

    </div>

    @if(session('success'))

        <div class="volunteer-alert success">

            <i class="fa-solid fa-circle-check"></i>

            {{ session('success') }}

        </div>

    @endif

    <div class="volunteer-application-layout">

        <div class="volunteer-application-card">

            <div class="application-profile-icon">
                <i class="fa-solid fa-user"></i>
            </div>

            <span class="application-profile-label">
                بيانات المتطوع
            </span>

            <h3>
                {{ $volunteerApplication->name }}
            </h3>

            <div class="application-info-list">

                <div>
                    <span>الجوال</span>
                    <strong dir="ltr">
                        {{ $volunteerApplication->phone }}
                    </strong>
                </div>

                <div>
                    <span>البريد الإلكتروني</span>
                    <strong>
                        {{ $volunteerApplication->email ?: 'غير مضاف' }}
                    </strong>
                </div>

                <div>
                    <span>النوع</span>

                    <strong>

                        @if($volunteerApplication->gender === 'female')
                            أنثى
                        @else
                            ذكر
                        @endif

                    </strong>

                </div>

                <div>
                    <span>تاريخ التقديم</span>
                    <strong>
                        {{ $volunteerApplication->created_at?->format('Y-m-d H:i') }}
                    </strong>
                </div>

            </div>

        </div>

        <div class="volunteer-application-card">

            <div class="application-section-heading">

                <i class="fa-solid fa-hand-holding-heart"></i>

                <div>
                    <span>الفرصة التطوعية</span>

                    <strong>
                        {{ $volunteerApplication->opportunity?->title ?? 'غير محددة' }}
                    </strong>
                </div>

            </div>

            @if($volunteerApplication->notes)

                <div class="application-notes">

                    <span>
                        ملاحظات المتطوع
                    </span>

                    <p>
                        {{ $volunteerApplication->notes }}
                    </p>

                </div>

            @endif

            <div class="application-status-box">

                <span>
                    حالة الطلب الحالية
                </span>

                @switch($volunteerApplication->status)

                    @case('pending')
                        <strong class="pending">قيد المراجعة</strong>
                        @break

                    @case('reviewed')
                        <strong class="reviewed">تمت المراجعة</strong>
                        @break

                    @case('accepted')
                        <strong class="accepted">مقبول</strong>
                        @break

                    @case('rejected')
                        <strong class="rejected">مرفوض</strong>
                        @break

                @endswitch

            </div>

            <form action="{{ route('dashboard.volunteer.applications.update', $volunteerApplication) }}"
                  method="POST"
                  class="application-status-form">

                @csrf
                @method('PUT')

                <label>
                    تحديث حالة الطلب
                </label>

                <select name="status" required>

                    <option value="pending"
                        {{ $volunteerApplication->status === 'pending' ? 'selected' : '' }}>
                        قيد المراجعة
                    </option>

                    <option value="reviewed"
                        {{ $volunteerApplication->status === 'reviewed' ? 'selected' : '' }}>
                        تمت المراجعة
                    </option>

                    <option value="accepted"
                        {{ $volunteerApplication->status === 'accepted' ? 'selected' : '' }}>
                        مقبول
                    </option>

                    <option value="rejected"
                        {{ $volunteerApplication->status === 'rejected' ? 'selected' : '' }}>
                        مرفوض
                    </option>

                </select>

                <button type="submit">

                    <i class="fa-solid fa-check"></i>

                    حفظ الحالة

                </button>

            </form>

        </div>

    </div>

</div>

@endsection
