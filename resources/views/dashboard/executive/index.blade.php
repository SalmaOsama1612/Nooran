@extends('dashboard.layouts.app')

@section('title', 'المدير التنفيذي')

@section('content')

<div class="executive-page">

    <div class="executive-header">

        <div>
            <h2>المدير التنفيذي</h2>
            <p>إدارة بيانات المدير التنفيذي لجمعية نوران التعليمية</p>
        </div>

        @if(!$executive)
            <a href="{{ route('dashboard.executive.create') }}" class="executive-add-btn">
                <i class="fa-solid fa-plus"></i>
                إضافة البيانات
            </a>
        @endif

    </div>

    @if(session('success'))
        <div class="executive-success">
            <i class="fa-solid fa-circle-check"></i>
            {{ session('success') }}
        </div>
    @endif

    @if($executive)

        <div class="executive-card">

            <div class="executive-image">

                @if($executive->image)

                    <img
                        src="{{ asset('images/executive/' . $executive->image) }}"
                        alt="{{ $executive->name }}"
                    >

                @else

                    <div class="executive-placeholder">
                        <i class="fa-solid fa-user"></i>
                    </div>

                @endif

            </div>

            <div class="executive-info">

                <h3>{{ $executive->name }}</h3>

                <div class="executive-data">
                    <span>الدرجة العلمية</span>
                    <strong>{{ $executive->degree }}</strong>
                </div>

                <div class="executive-data">
                    <span>المسمى الوظيفي</span>
                    <strong>{{ $executive->position }}</strong>
                </div>

                <div class="executive-data">
                    <span>الجوال</span>
                    <strong>{{ $executive->phone }}</strong>
                </div>

                <div class="executive-data">
                    <span>الإيميل</span>
                    <strong>{{ $executive->email }}</strong>
                </div>

                <div class="executive-actions">

                    <a
                        href="{{ route('dashboard.executive.edit', $executive) }}"
                        class="executive-edit-btn"
                    >
                        <i class="fa-solid fa-pen"></i>
                        تعديل
                    </a>

                    <form
                        action="{{ route('dashboard.executive.destroy', $executive) }}"
                        method="POST"
                        onsubmit="return confirm('هل أنت متأكد من حذف بيانات المدير التنفيذي؟')"
                    >
                        @csrf
                        @method('DELETE')

                        <button type="submit" class="executive-delete-btn">
                            <i class="fa-solid fa-trash"></i>
                            حذف
                        </button>
                    </form>

                </div>

            </div>

        </div>

    @else

        <div class="executive-empty">

            <i class="fa-solid fa-user-tie"></i>

            <h3>لا توجد بيانات</h3>

            <p>لم تتم إضافة بيانات المدير التنفيذي حتى الآن.</p>

            <a href="{{ route('dashboard.executive.create') }}" class="executive-add-btn">
                <i class="fa-solid fa-plus"></i>
                إضافة البيانات
            </a>

        </div>

    @endif

</div>

@endsection