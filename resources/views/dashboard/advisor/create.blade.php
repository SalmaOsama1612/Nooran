@extends('dashboard.layouts.app')

@section('title', 'إضافة المستشار المالي')

@section('content')

<div class="advisor-dashboard-page">

    <div class="advisor-dashboard-header">

        <div>
            <h2>إضافة المستشار المالي</h2>
            <p>إضافة بيانات المستشار المالي للجمعية</p>
        </div>

        <a href="{{ route('dashboard.advisor') }}" class="advisor-back-btn">
            <i class="fa-solid fa-arrow-right"></i>
            العودة
        </a>

    </div>

    <div class="advisor-form-card">

        <form action="{{ route('dashboard.advisor.store') }}"
              method="POST"
              enctype="multipart/form-data">

            @csrf

            <div class="advisor-form-grid">

                <div class="advisor-form-group">

                    <label>الاسم</label>

                    <input type="text"
                           name="name"
                           value="{{ old('name') }}"
                           required>

                    @error('name')
                        <small class="advisor-error">{{ $message }}</small>
                    @enderror

                </div>

                <div class="advisor-form-group">

                    <label>الدرجة العلمية</label>

                    <input type="text"
                           name="degree"
                           value="{{ old('degree') }}">

                </div>

                <div class="advisor-form-group">

                    <label>المسمى الوظيفي</label>

                    <input type="text"
                           name="position"
                           value="{{ old('position') }}">

                </div>

                <div class="advisor-form-group">

                    <label>الجوال</label>

                    <input type="text"
                           name="phone"
                           value="{{ old('phone') }}"
                           dir="ltr">

                </div>

                <div class="advisor-form-group">

                    <label>البريد الإلكتروني</label>

                    <input type="email"
                           name="email"
                           value="{{ old('email') }}">

                </div>

                <div class="advisor-form-group advisor-image-field">

                    <label>الصورة</label>

                    <input type="file"
                           name="image"
                           accept="image/*">

                    <small>
                        الصيغ المسموحة: JPG, JPEG, PNG
                    </small>

                </div>

            </div>

            <div class="advisor-form-actions">

                <button type="submit" class="advisor-save-btn">
                    <i class="fa-solid fa-check"></i>
                    حفظ البيانات
                </button>

                <a href="{{ route('dashboard.advisor') }}"
                   class="advisor-cancel-btn">
                    إلغاء
                </a>

            </div>

        </form>

    </div>

</div>

@endsection