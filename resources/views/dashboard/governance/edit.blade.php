x@extends('dashboard.layouts.app')

@section('title', 'تعديل مستند الحوكمة')

@section('content')

<div class="governance-form-page">

    <div class="governance-form-header">

        <div>
            <h2>تعديل مستند الحوكمة</h2>
            <p>تعديل بيانات المستند أو استبدال ملف PDF</p>
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
            action="{{ route('dashboard.governance.update', ['governance' => $governance->id]) }}"
            method="POST"
            enctype="multipart/form-data"
        >

            @csrf
            @method('PUT')

            <div class="governance-form-group">

                <label>
                    اسم المستند
                </label>

                <input
                    type="text"
                    name="title"
                    value="{{ old('title', $governance->title) }}"
                    required
                >

                @error('title')
                    <small>{{ $message }}</small>
                @enderror

            </div>

            <div class="governance-current-file">

                <i class="fa-solid fa-file-pdf"></i>

                <div>
                    <strong>الملف الحالي</strong>

                    <a
                        href="{{ asset('storage/' . $governance->file_path) }}"
                        target="_blank"
                    >
                        فتح المستند
                    </a>
                </div>

            </div>

            <div class="governance-form-group">

                <label>
                    استبدال ملف PDF
                </label>

                <input
                    type="file"
                    name="file"
                    accept="application/pdf"
                >

                <small>
                    اترك الحقل فارغًا للاحتفاظ بالملف الحالي
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
                        {{ $governance->is_active ? 'checked' : '' }}
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
                    حفظ التعديلات
                </button>

            </div>

        </form>

    </div>

</div>

@endsection

