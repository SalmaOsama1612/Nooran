@extends('dashboard.layouts.app')

@section('title', 'تعديل المدير التنفيذي')

@section('content')

<div class="executive-page">

    <div class="executive-header">

        <div>
            <h2>تعديل المدير التنفيذي</h2>
            <p>تعديل بيانات المدير التنفيذي</p>
        </div>

        <a href="{{ route('dashboard.executive.index') }}" class="executive-back-btn">
            <i class="fa-solid fa-arrow-right"></i>
            العودة
        </a>

    </div>

    <div class="executive-form-card">

        <form
            action="{{ route('dashboard.executive.update', $executive) }}"
            method="POST"
            enctype="multipart/form-data"
        >

            @csrf
            @method('PUT')

            <div class="executive-form-grid">

                <div class="executive-form-group">
                    <label>الاسم</label>
                    <input
                        type="text"
                        name="name"
                        value="{{ old('name', $executive->name) }}"
                        required
                    >
                </div>

                <div class="executive-form-group">
                    <label>الدرجة العلمية</label>
                    <input
                        type="text"
                        name="degree"
                        value="{{ old('degree', $executive->degree) }}"
                    >
                </div>

                <div class="executive-form-group">
                    <label>المسمى الوظيفي</label>
                    <input
                        type="text"
                        name="position"
                        value="{{ old('position', $executive->position) }}"
                    >
                </div>

                <div class="executive-form-group">
                    <label>الجوال</label>
                    <input
                        type="text"
                        name="phone"
                        value="{{ old('phone', $executive->phone) }}"
                    >
                </div>

                <div class="executive-form-group">
                    <label>الإيميل</label>
                    <input
                        type="email"
                        name="email"
                        value="{{ old('email', $executive->email) }}"
                    >
                </div>

                <div class="executive-form-group">
                    <label>تغيير الصورة</label>
                    <input type="file" name="image" accept="image/*">

                    @if($executive->image)
                        <img
                            src="{{ asset('images/executive/' . $executive->image) }}"
                            class="executive-current-image"
                            alt="{{ $executive->name }}"
                        >
                    @endif
                </div>

            </div>

            <div class="executive-form-actions">

                <a href="{{ route('dashboard.executive.index') }}" class="executive-cancel-btn">
                    إلغاء
                </a>

                <button type="submit" class="executive-save-btn">
                    <i class="fa-solid fa-floppy-disk"></i>
                    حفظ التعديلات
                </button>

            </div>

        </form>

    </div>

</div>

@endsection