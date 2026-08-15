@extends('dashboard.layouts.app')

@section('title', 'إضافة فرصة تطوع')

@section('content')

<div class="volunteer-create-page">

    <div class="volunteer-form-header">

        <div class="volunteer-form-title">

            <div class="volunteer-form-title-icon">
                <i class="fa-solid fa-hand-holding-heart"></i>
            </div>

            <div>
                <h2>إضافة فرصة تطوع</h2>
                <p>أضف بيانات فرصة التطوع التي ستظهر في الموقع</p>
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
            action="{{ route('dashboard.volunteer.store') }}"
            method="POST"
            enctype="multipart/form-data"
        >

            @csrf

            <div class="volunteer-form-section">

                <h3 class="volunteer-section-title">
                    <i class="fa-solid fa-building"></i>
                    بيانات الجمعية
                </h3>

                <div class="volunteer-form-grid">

                    <div class="volunteer-form-group">

                        <label>اسم الجمعية</label>

                        <input
                            type="text"
                            name="organization_name"
                            value="{{ old('organization_name', 'جمعية نوران التعليمية') }}"
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
                            placeholder="اكتب نبذة مختصرة عن الجمعية..."
                        >{{ old('organization_description') }}</textarea>

                        @error('organization_description')
                            <small class="volunteer-input-error">{{ $message }}</small>
                        @enderror

                    </div>

                </div>

            </div>

            <div class="volunteer-form-section">

                <h3 class="volunteer-section-title">
                    <i class="fa-solid fa-hand-holding-heart"></i>
                    بيانات الفرصة
                </h3>

                <div class="volunteer-form-grid">

                    <div class="volunteer-form-group full">

                        <label>اسم فرصة التطوع</label>

                        <input
                            type="text"
                            name="title"
                            value="{{ old('title') }}"
                            placeholder="مثال: تطوع جمعية نوران - حج 1447هـ"
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
                            value="{{ old('start_date') }}"
                        >

                        @error('start_date')
                            <small class="volunteer-input-error">{{ $message }}</small>
                        @enderror

                    </div>

                    <div class="volunteer-form-group">

                        <label>عدد المتطوعين الحالي</label>

                        <input
                            type="number"
                            name="current_volunteers"
                            value="{{ old('current_volunteers', 0) }}"
                            min="0"
                            required
                        >

                        @error('current_volunteers')
                            <small class="volunteer-input-error">{{ $message }}</small>
                        @enderror

                    </div>

                    <div class="volunteer-form-group">

                        <label>العدد المستهدف</label>

                        <input
                            type="number"
                            name="max_volunteers"
                            value="{{ old('max_volunteers', 50) }}"
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
                            value="{{ old('external_url') }}"
                            placeholder="https://..."
                        >

                        @error('external_url')
                            <small class="volunteer-input-error">{{ $message }}</small>
                        @enderror

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
                        <i class="fa-solid fa-image"></i>
                    </div>

                    <div class="volunteer-image-upload-content">

                        <strong>إضافة شعار الجمعية</strong>

                        <p>
                            JPG, JPEG, PNG أو WEBP — الحد الأقصى 2MB
                        </p>

                        <label class="volunteer-file-btn">

                            <i class="fa-solid fa-upload"></i>
                            اختيار صورة

                            <input
                                type="file"
                                name="logo"
                                accept="image/*"
                                class="volunteer-file-input"
                            >

                        </label>

                        @error('logo')
                            <small class="volunteer-input-error">{{ $message }}</small>
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
                            عند التفعيل ستظهر الفرصة للزوار في الموقع
                        </span>

                    </div>

                    <label class="volunteer-switch">

                        <input
                            type="checkbox"
                            name="is_active"
                            value="1"
                            checked
                        >

                        <span class="volunteer-switch-slider"></span>

                    </label>

                </div>

            </div>

            <div class="volunteer-form-footer">

                <div></div>

                <div class="volunteer-form-footer-actions">

                    <a
                        href="{{ route('dashboard.volunteer.index') }}"
                        class="volunteer-btn volunteer-btn-secondary volunteer-cancel-btn"
                    >
                        إلغاء
                    </a>

                    <button
                        type="submit"
                        class="volunteer-btn volunteer-save-btn"
                    >
                        <i class="fa-solid fa-check"></i>
                        حفظ فرصة التطوع
                    </button>

                </div>

            </div>

        </form>

    </div>

</div>

@endsection