@extends('dashboard.layouts.app')

@section('title', 'المستشار المالي')

@section('content')

<div class="advisor-dashboard-page">

    <div class="advisor-dashboard-header">

        <div>
            <h2>المستشار المالي</h2>
            <p>إدارة بيانات المستشار المالي للجمعية</p>
        </div>

        @if(!$advisor)
            <a href="{{ route('dashboard.advisor.create') }}" class="advisor-add-btn">
                <i class="fa-solid fa-plus"></i>
                إضافة المستشار المالي
            </a>
        @endif

    </div>

    @if(session('success'))
        <div class="advisor-alert">
            <i class="fa-solid fa-circle-check"></i>
            {{ session('success') }}
        </div>
    @endif

    @if($advisor)

        <div class="advisor-dashboard-card">

            <div class="advisor-dashboard-image">

                @if($advisor->image)

                    <img src="{{ asset('storage/' . $advisor->image) }}" alt="{{ $advisor->name }}">

                @else

                    <div class="advisor-dashboard-placeholder">
                        <i class="fa-solid fa-user-tie"></i>
                    </div>

                @endif

            </div>

            <div class="advisor-dashboard-info">

                <span class="advisor-dashboard-label">
                    المستشار المالي
                </span>

                <h3>{{ $advisor->name }}</h3>

                <div class="advisor-dashboard-details">

                    <div>
                        <span>الدرجة العلمية</span>
                        <strong>{{ $advisor->degree ?: 'غير محدد' }}</strong>
                    </div>

                    <div>
                        <span>المسمى الوظيفي</span>
                        <strong>{{ $advisor->position ?: 'غير محدد' }}</strong>
                    </div>

                    <div>
                        <span>الجوال</span>
                        <strong dir="ltr">{{ $advisor->phone ?: 'غير محدد' }}</strong>
                    </div>

                    <div>
                        <span>البريد الإلكتروني</span>
                        <strong>{{ $advisor->email ?: 'غير محدد' }}</strong>
                    </div>

                </div>

                <div class="advisor-dashboard-actions">

                    <a href="{{ route('dashboard.advisor.edit', $advisor->id) }}"
                       class="advisor-edit-btn">
                        <i class="fa-solid fa-pen"></i>
                        تعديل
                    </a>

                    <form action="{{ route('dashboard.advisor.destroy', $advisor->id) }}"
                          method="POST"
                          onsubmit="return confirm('هل أنت متأكد من حذف بيانات المستشار المالي؟')">

                        @csrf
                        @method('DELETE')

                        <button type="submit" class="advisor-delete-btn">
                            <i class="fa-solid fa-trash"></i>
                            حذف
                        </button>

                    </form>

                </div>

            </div>

        </div>

    @else

        <div class="advisor-empty">

            <div class="advisor-empty-icon">
                <i class="fa-solid fa-user-tie"></i>
            </div>

            <h3>لا توجد بيانات للمستشار المالي</h3>

            <p>قم بإضافة بيانات المستشار المالي لعرضها في الموقع.</p>

            <a href="{{ route('dashboard.advisor.create') }}"
               class="advisor-add-btn">
                <i class="fa-solid fa-plus"></i>
                إضافة البيانات
            </a>

        </div>

    @endif

</div>

@endsection