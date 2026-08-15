@extends('dashboard.layouts.app')

@section('title', 'تعديل فرصة التطوع')

@section('content')

@php
$volunteerId = request()->route('volunteer');
@endphp

<div class="volunteer-edit-page">

```
<div class="volunteer-form-header">

    <div class="volunteer-form-title">

        <div class="volunteer-form-title-icon">
            <i class="fa-solid fa-hand-holding-heart"></i>
        </div>

        <div>
            <h2>تعديل فرصة التطوع</h2>
            <p>تعديل بيانات فرصة التطوع الحالية</p>
        </div>

    </div>

    <a
        href="{{ route('dashboard.volunteer.index') }}"
        class="volunteer-back-btn"
    >
        <i class="fa-solid fa-arrow-right"></i>
        العودة
    </a>

</div>

<div class="volunteer-form-card">

    <form
        action="{{ route('dashboard.volunteer.update', ['volunteer' => $volunteerId]) }}"
        method="POST"
        enctype="multipart/form-data"
    >

        @csrf
        @method('PUT')

        <div class="volunteer-form-section">

            <h3 class="volunteer-section-title">
                <i class="fa-solid fa-building"></i>
                بيانات الجمعية
            </h3>

            <div class="volunteer-form-grid">

                <div class="volunteer-form-group">

                    <label>
                        اسم الجمعية
                        <span>*</span>
                    </label>

                    <input
                        type="text"
                        name="organization_name"
                        value="{{ old('organization_name', $volunteerOpportunity->organization_name) }}"
                        required
                    >

                    @error('organization_name')
                        <small class="volunteer-input-error">{{ $message }}</small>
                    @enderror

                </div>

                <div class="volunteer-form-group full">

                    <label>وصف الجمعية</label>

                    <textarea
                        name="organization_description"
                        rows="4"
                    >{{ old('organization_description', $volunteerOpportunity->organization_description) }}</textarea>

                    @error('organization_description')
                        <small class="volunteer-input-error">{{ $message }}</small>
                    @enderror

                </div>

            </div>

        </div>

        <div class="volunteer-form-section">

            <h3 class="volunteer-section-title">
                <i class="fa-solid fa-hand-holding-heart"></i>
                بيانات فرصة التطوع
            </h3>

            <div class="volunteer-form-grid">

                <div class="volunteer-form-group full">

                    <label>
                        اسم فرصة التطوع
                        <span>*</span>
                    </label>

                    <input
                        type="text"
                        name="title"
                        value="{{ old('title', $volunteerOpportunity->title) }}"
                        required
                    >

                    @error('title')
                        <small class="volunteer-input-error">{{ $message }}</small>
                    @enderror

                </div>

                <div class="volunteer-form-group">

                    <label>تاريخ البدء</label>

                    <input
                        type="date"
                        name="start_date"
                        value="{{ old('start_date', optional($volunteerOpportunity->start_date)->format('Y-m-d')) }}"
                    >

                    @error('start_date')
                        <small class="volunteer-input-error">{{ $message }}</small>
                    @enderror

                </div>

                <div class="volunteer-form-group">

                    <label>
                        عدد المتطوعين الحالي
                        <span>*</span>
                    </label>

                    <input
                        type="number"
                        name="current_volunteers"
                        value="{{ old('current_volunteers', $volunteerOpportunity->current_volunteers ?? 0) }}"
                        min="0"
                        required
                    >

                    @error('current_volunteers')
                        <small class="volunteer-input-error">{{ $message }}</small>
                    @enderror

                </div>

                <div class="volunteer-form-group">

                    <label>
                        العدد المستهدف
                        <span>*</span>
                    </label>

                    <input
                        type="number"
                        name="max_volunteers"
                        value="{{ old('max_volunteers', $volunteerOpportunity->max_volunteers ?? 50) }}"
                        min="1"
                        required
                    >

                    @error('max_volunteers')
                        <small class="volunteer-input-error">{{ $message }}</small>
                    @enderror

                </div>

                <div class="volunteer-form-group full">

                    <label>رابط منصة التطوع</label>

                    <input
                        type="url"
                        name="external_url"
                        value="{{ old('external_url', $volunteerOpportunity->external_url) }}"
                        placeholder="https://example.com"
                    >

                    @error('external_url')
                        <small class="volunteer-input-error">{{ $message }}</small>
                    @enderror

                    <small class="volunteer-input-help">
                        ضع رابط منصة التطوع الخارجية التي سيتم تحويل المتطوع إليها.
                    </small>

                </div>

            </div>

        </div>

        <div class="volunteer-form-section">

            <h3 class="volunteer-section-title">
                <i class="fa-solid fa-image"></i>
                شعار الفرصة
            </h3>

            <div class="volunteer-image-upload">

                <div class="volunteer-image-preview">

                    @if($volunteerOpportunity->logo)

                        <img
                            src="{{ asset('storage/' . $volunteerOpportunity->logo) }}"
                            alt="{{ $volunteerOpportunity->organization_name }}"
                        >

                    @else

                        <i class="fa-solid fa-hand-holding-heart"></i>

                    @endif

                </div>

                <div class="volunteer-image-upload-content">

                    <strong>تغيير شعار الفرصة</strong>

                    <p>
                        يمكنك رفع صورة جديدة أو الاحتفاظ بالصورة الحالية.
                        JPG, JPEG, PNG أو WEBP — الحد الأقصى 2MB
                    </p>

                    <label class="volunteer-file-btn">

                        <i class="fa-solid fa-upload"></i>
                        اختيار صورة جديدة

                        <input
                            type="file"
                            name="logo"
                            accept="image/*"
                            class="volunteer-file-input"
                        >

                    </label>

                    @error('logo')
                        <small class="volunteer-input-error">
                            {{ $message }}
                        </small>
                    @enderror

                </div>

            </div>

        </div>

        <div class="volunteer-form-section">

            <h3 class="volunteer-section-title">
                <i class="fa-solid fa-toggle-on"></i>
                حالة الفرصة
            </h3>

            <div class="volunteer-active-box">

                <div class="volunteer-active-info">

                    <strong>تفعيل فرصة التطوع</strong>

                    <span>
                        عند التفعيل ستظهر الفرصة للزوار في صفحة التطوع.
                    </span>

                </div>

                <label class="volunteer-switch">

                    <input
                        type="checkbox"
                        name="is_active"
                        value="1"
                        {{ $volunteerOpportunity->is_active ? 'checked' : '' }}
                    >

                    <span class="volunteer-switch-slider"></span>

                </label>

            </div>

        </div>

        <div class="volunteer-form-footer">

            <a
                href="{{ route('dashboard.volunteer.index') }}"
                class="volunteer-btn volunteer-cancel-btn"
            >
                <i class="fa-solid fa-xmark"></i>
                إلغاء
            </a>

            <div class="volunteer-form-footer-actions">

                <button
                    type="submit"
                    class="volunteer-btn volunteer-save-btn"
                >
                    <i class="fa-solid fa-check"></i>
                    حفظ التعديلات
                </button>

            </div>

        </div>

    </form>

</div>
```

</div>

@endsection
