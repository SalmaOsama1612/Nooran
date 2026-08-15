@extends('dashboard.layouts.app')

@section('title', 'تعديل المستشار المالي')

@section('content')

<div class="advisor-dashboard-page">

    <div class="advisor-dashboard-header">

        <div>
            <h2>تعديل المستشار المالي</h2>
            <p>تعديل بيانات المستشار المالي للجمعية</p>
        </div>

        <a href="{{ route('dashboard.advisor') }}" class="advisor-back-btn">
            <i class="fa-solid fa-arrow-right"></i>
            العودة
        </a>

    </div>

    <div class="advisor-form-card">

        <form action="{{ route('dashboard.advisor.update', $advisor->id) }}"
              method="POST"
              enctype="multipart/form-data">

            @csrf
            @method('PUT')

            <div class="advisor-form-grid">

                <div class="advisor-form-group">

                    <label>الاسم</label>

                    <input type="text"
                           name="name"
                           value="{{ old('name', $advisor->name) }}"
                           required>

                    @error('name')
                        <small class="advisor-error">{{ $message }}</small>
                    @enderror

                </div>

                <div class="advisor-form-group">

                    <label>الدرجة العلمية</label>

                    <input type="text"
                           name="degree"
                           value="{{ old('degree', $advisor->degree) }}">

                </div>

                <div class="advisor-form-group">

                    <label>المسمى الوظيفي</label>

                    <input type="text"
                           name="position"
                           value="{{ old('position', $advisor->position) }}">

                </div>

                <div class="advisor-form-group">

                    <label>الجوال</label>

                    <input type="text"
                           name="phone"
                           value="{{ old('phone', $advisor->phone) }}"
                           dir="ltr">

                </div>

                <div class="advisor-form-group">

                    <label>البريد الإلكتروني</label>

                    <input type="email"
                           name="email"
                           value="{{ old('email', $advisor->email) }}">

                </div>

                <div class="advisor-form-group advisor-image-field">

                    <label>الصورة الحالية</label>

                    @if($advisor->image)

                        <div class="advisor-current-image">

                            <img src="{{ asset('storage/' . $advisor->image) }}"
                                 alt="{{ $advisor->name }}">

                            <span>الصورة الحالية</span>

                        </div>

                    @endif

                    <label>تغيير الصورة</label>

                    <input type="file"
                           name="image"
                           accept="image/*">

                </div>

            </div>

            <div class="advisor-form-actions">

                <button type="submit" class="advisor-save-btn">
                    <i class="fa-solid fa-floppy-disk"></i>
                    حفظ التعديلات
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