@extends('dashboard.layouts.app')

@section('title', 'إضافة المدير التنفيذي')

@section('content')

<div class="executive-page">

    <div class="executive-header">

        <div>
            <h2>إضافة المدير التنفيذي</h2>
            <p>إضافة بيانات المدير التنفيذي</p>
        </div>

        <a href="{{ route('dashboard.executive.index') }}" class="executive-back-btn">
            <i class="fa-solid fa-arrow-right"></i>
            العودة
        </a>

    </div>

    <div class="executive-form-card">

        <form
            action="{{ route('dashboard.executive.store') }}"
            method="POST"
            enctype="multipart/form-data"
        >

            @csrf

            <div class="executive-form-grid">

                <div class="executive-form-group">
                    <label>الاسم</label>
                    <input type="text" name="name" value="{{ old('name') }}" required>
                    @error('name')
                        <small>{{ $message }}</small>
                    @enderror
                </div>

                <div class="executive-form-group">
                    <label>الدرجة العلمية</label>
                    <input type="text" name="degree" value="{{ old('degree') }}">
                </div>

                <div class="executive-form-group">
                    <label>المسمى الوظيفي</label>
                    <input type="text" name="position" value="{{ old('position') }}">
                </div>

                <div class="executive-form-group">
                    <label>الجوال</label>
                    <input type="text" name="phone" value="{{ old('phone') }}">
                </div>

                <div class="executive-form-group">
                    <label>الإيميل</label>
                    <input type="email" name="email" value="{{ old('email') }}">
                </div>

                <div class="executive-form-group">
                    <label>الصورة</label>
                    <input type="file" name="image" accept="image/*">
                </div>

            </div>

            <div class="executive-form-actions">

                <a href="{{ route('dashboard.executive.index') }}" class="executive-cancel-btn">
                    إلغاء
                </a>

                <button type="submit" class="executive-save-btn">
                    <i class="fa-solid fa-floppy-disk"></i>
                    حفظ
                </button>

            </div>

        </form>

    </div>

</div>

@endsection