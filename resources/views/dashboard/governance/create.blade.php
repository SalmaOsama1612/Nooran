
@extends('dashboard.layouts.app')

@section('title', 'إضافة مستند حوكمة')

@section('content')

<div class="governance-form-page">

    <div class="governance-form-header">

        <div>
            <h2>إضافة مستند حوكمة</h2>
            <p>إضافة مستند جديد ليظهر داخل قائمة الحوكمة</p>
        </div>

        <a
            href="{{ route('dashboard.governance.index') }}"
            class="governance-back-btn"
        >
            <i class="fa-solid fa-arrow-right"></i>
            العودة
        </a>

    </div>

    <div class="governance-form-card">

        <form
            action="{{ route('dashboard.governance.store') }}"
            method="POST"
            enctype="multipart/form-data"
        >

            @csrf

            <div class="governance-form-group">

                <label>
                    اسم المستند
                </label>

                <input
                    type="text"
                    name="title"
                    value="{{ old('title') }}"
                    placeholder="مثال: اللائحة الأساسية للجمعية"
                    required
                >

                @error('title')
                    <small>{{ $message }}</small>
                @enderror

            </div>

            <div class="governance-form-group">

                <label>
                    ملف PDF
                </label>

                <input
                    type="file"
                    name="file"
                    accept="application/pdf"
                    required
                >

                <small>
                    PDF فقط — الحد الأقصى 10MB
                </small>

                @error('file')
                    <small>{{ $message }}</small>
                @enderror

            </div>

            <div class="governance-active">

                <label>
                    <input
                        type="checkbox"
                        name="is_active"
                        value="1"
                        checked
                    >

                    <span>
                        إظهار المستند في قائمة الحوكمة
                    </span>

                </label>

            </div>

            <div class="governance-form-actions">

                <a
                    href="{{ route('dashboard.governance.index') }}"
                    class="governance-cancel-btn"
                >
                    إلغاء
                </a>

                <button
                    type="submit"
                    class="governance-save-btn"
                >
                    <i class="fa-solid fa-check"></i>
                    حفظ المستند
                </button>

            </div>

        </form>

    </div>

</div>

@endsection

