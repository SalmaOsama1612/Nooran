@extends('dashboard.layouts.app')

@section('title', 'إضافة عنصر للهيكل التنظيمي')

@section('content')

<div class="org-dashboard-page">

    <div class="org-dashboard-header">

        <div>
            <h2>إضافة عنصر</h2>
            <p>إضافة منصب أو إدارة جديدة إلى الهيكل التنظيمي</p>
        </div>

        <a href="{{ route('dashboard.organizational-structure.index') }}" class="org-back-btn">
            <i class="fa-solid fa-arrow-right"></i>
            العودة للهيكل
        </a>

    </div>

    <div class="org-form-card">

        <form
            action="{{ route('dashboard.organizational-structure.store') }}"
            method="POST"
            enctype="multipart/form-data"
        >

            @csrf

            <div class="org-form-grid">

                <div class="org-form-group">

                    <label for="name">
                        اسم الشخص
                    </label>

                    <input
                        type="text"
                        id="name"
                        name="name"
                        value="{{ old('name') }}"
                        placeholder="اختياري"
                    >

                    @error('name')
                        <small class="org-error">{{ $message }}</small>
                    @enderror

                </div>

                <div class="org-form-group">

                    <label for="position">
                        المسمى الوظيفي
                    </label>

                    <input
                        type="text"
                        id="position"
                        name="position"
                        value="{{ old('position') }}"
                        placeholder="مثال: المدير التنفيذي"
                        required
                    >

                    @error('position')
                        <small class="org-error">{{ $message }}</small>
                    @enderror

                </div>

                <div class="org-form-group">

                    <label for="type">
                        نوع العنصر
                    </label>

                    <select id="type" name="type" required>

                        <option value="">اختر النوع</option>

                        <option value="قيادة" {{ old('type') == 'قيادة' ? 'selected' : '' }}>
                            قيادة
                        </option>

                        <option value="منصب" {{ old('type') == 'منصب' ? 'selected' : '' }}>
                            منصب
                        </option>

                        <option value="إدارة" {{ old('type') == 'إدارة' ? 'selected' : '' }}>
                            إدارة
                        </option>

                        <option value="قسم" {{ old('type') == 'قسم' ? 'selected' : '' }}>
                            قسم
                        </option>

                    </select>

                    @error('type')
                        <small class="org-error">{{ $message }}</small>
                    @enderror

                </div>

                <div class="org-form-group">

                    <label for="parent_id">
                        تابع لـ
                    </label>

                    <select id="parent_id" name="parent_id">

                        <option value="">
                            عنصر رئيسي
                        </option>

                        @foreach($parents as $parent)

                            <option
                                value="{{ $parent->id }}"
                                {{ old('parent_id') == $parent->id ? 'selected' : '' }}
                            >
                                {{ $parent->position }}
                            </option>

                        @endforeach

                    </select>

                    @error('parent_id')
                        <small class="org-error">{{ $message }}</small>
                    @enderror

                </div>

                <div class="org-form-group">

                    <label for="sort_order">
                        الترتيب
                    </label>

                    <input
                        type="number"
                        id="sort_order"
                        name="sort_order"
                        value="{{ old('sort_order', 0) }}"
                        min="0"
                    >

                    @error('sort_order')
                        <small class="org-error">{{ $message }}</small>
                    @enderror

                </div>

                <div class="org-form-group">

                    <label for="image">
                        الصورة
                    </label>

                    <input
                        type="file"
                        id="image"
                        name="image"
                        accept="image/png,image/jpeg,image/webp"
                    >

                    <small>
                        اختياري — JPG / PNG / WEBP — بحد أقصى 5MB
                    </small>

                    @error('image')
                        <small class="org-error">{{ $message }}</small>
                    @enderror

                </div>

                <div class="org-form-group org-full">

                    <label class="org-checkbox">

                        <input
                            type="checkbox"
                            name="is_active"
                            value="1"
                            {{ old('is_active', true) ? 'checked' : '' }}
                        >

                        <span>
                            إظهار العنصر في الموقع
                        </span>

                    </label>

                </div>

            </div>

            <div class="org-form-actions">

                <button type="submit" class="org-save-btn">
                    <i class="fa-solid fa-floppy-disk"></i>
                    حفظ البيانات
                </button>

                <a
                    href="{{ route('dashboard.organizational-structure.index') }}"
                    class="org-cancel-btn"
                >
                    إلغاء
                </a>

            </div>

        </form>

    </div>

</div>

@endsection