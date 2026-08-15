
@extends('dashboard.layouts.app')

@section('title', 'طلبات التطوع')

@section('content')

<div class="volunteer-applications-page">

    <div class="volunteer-dashboard-header">

        <div>
            <h2>طلبات التطوع</h2>
            <p>متابعة وإدارة طلبات المتطوعين</p>
        </div>

        <a href="{{ route('dashboard.volunteer.index') }}"
           class="volunteer-back-btn">
            <i class="fa-solid fa-arrow-right"></i>
            العودة لفرصة التطوع
        </a>

    </div>

    @if(session('success'))
        <div class="volunteer-alert success">
            <i class="fa-solid fa-circle-check"></i>
            {{ session('success') }}
        </div>
    @endif

    <div class="volunteer-applications-card">

        @if($applications->count())

            <div class="volunteer-table-wrapper">

                <table class="volunteer-applications-table">

                    <thead>
                        <tr>
                            <th>#</th>
                            <th>الاسم</th>
                            <th>الجوال</th>
                            <th>البريد الإلكتروني</th>
                            <th>النوع</th>
                            <th>الحالة</th>
                            <th>التاريخ</th>
                            <th>الإجراءات</th>
                        </tr>
                    </thead>

                    <tbody>

                        @foreach($applications as $application)

                            <tr>

                                <td>
                                    {{ $loop->iteration }}
                                </td>

                                <td>
                                    <strong>
                                        {{ $application->name }}
                                    </strong>
                                </td>

                                <td dir="ltr">
                                    {{ $application->phone }}
                                </td>

                                <td>
                                    {{ $application->email ?: '—' }}
                                </td>

                                <td>

                                    @if($application->gender === 'female')
                                        <span class="gender-badge female">
                                            <i class="fa-solid fa-venus"></i>
                                            أنثى
                                        </span>
                                    @else
                                        <span class="gender-badge male">
                                            <i class="fa-solid fa-mars"></i>
                                            ذكر
                                        </span>
                                    @endif

                                </td>

                                <td>

                                    @switch($application->status)

                                        @case('pending')
                                            <span class="application-status pending">
                                                قيد المراجعة
                                            </span>
                                            @break

                                        @case('reviewed')
                                            <span class="application-status reviewed">
                                                تمت المراجعة
                                            </span>
                                            @break

                                        @case('accepted')
                                            <span class="application-status accepted">
                                                مقبول
                                            </span>
                                            @break

                                        @case('rejected')
                                            <span class="application-status rejected">
                                                مرفوض
                                            </span>
                                            @break

                                        @default
                                            <span class="application-status">
                                                غير محدد
                                            </span>

                                    @endswitch

                                </td>

                                <td>
                                    {{ $application->created_at?->format('Y-m-d') }}
                                </td>

                                <td>

                                    <div class="application-actions">

                                        <a href="{{ route('dashboard.volunteer.applications.show', $application) }}"
                                           class="application-view-btn"
                                           title="عرض الطلب">

                                            <i class="fa-solid fa-eye"></i>

                                        </a>

                                        <form action="{{ route('dashboard.volunteer.applications.destroy', $application) }}"
                                              method="POST"
                                              onsubmit="return confirm('هل أنت متأكد من حذف هذا الطلب؟')">

                                            @csrf
                                            @method('DELETE')

                                            <button type="submit"
                                                    class="application-delete-btn"
                                                    title="حذف">

                                                <i class="fa-solid fa-trash"></i>

                                            </button>

                                        </form>

                                    </div>

                                </td>

                            </tr>

                        @endforeach

                    </tbody>

                </table>

            </div>

        @else

            <div class="volunteer-empty">

                <div class="volunteer-empty-icon">
                    <i class="fa-solid fa-users"></i>
                </div>

                <h3>لا توجد طلبات تطوع</h3>

                <p>
                    ستظهر طلبات المتطوعين هنا عند إرسالها.
                </p>

            </div>

        @endif

    </div>

</div>

@endsection
