@extends('dashboard.layouts.app')

@section('title', 'إضافة عضو')

@section('content')

<div class="page-header">
    <div>
        <h2>إضافة عضو</h2>
        <p>إضافة عضو جديد إلى الجمعية العمومية</p>
    </div>

    <a href="{{ route('dashboard.assembly.index') }}" class="btn btn-secondary">
        <i class="fa-solid fa-arrow-right"></i>
        رجوع
    </a>
</div>

@if($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="card shadow-sm border-0">

    <div class="card-body">

        <form
            action="{{ route('dashboard.assembly.store') }}"
            method="POST"
            enctype="multipart/form-data"
        >

            @csrf

            <div class="mb-4">

                <label for="name" class="form-label">
                    اسم العضو
                </label>

                <input
                    type="text"
                    id="name"
                    name="name"
                    class="form-control"
                    value="{{ old('name') }}"
                    placeholder="اكتب اسم العضو"
                    required
                >

            </div>


            <div class="mb-4">

                <label for="position" class="form-label">
                    المسمى الوظيفي
                </label>

                <input
                    type="text"
                    id="position"
                    name="position"
                    class="form-control"
                    value="{{ old('position') }}"
                    placeholder="مثال: رئيس مجلس الإدارة"
                    required
                >

            </div>


            <div class="mb-4">

                <label for="image" class="form-label">
                    صورة العضو
                </label>

                <input
                    type="file"
                    id="image"
                    name="image"
                    class="form-control"
                    accept="image/png,image/jpeg,image/webp"
                >

                <small class="text-muted">
                    الصيغ المسموحة: JPG, JPEG, PNG, WEBP — الحد الأقصى 2MB
                </small>

            </div>


            <div class="d-flex gap-2">

                <button type="submit" class="btn btn-primary">
                    <i class="fa-solid fa-save"></i>
                    حفظ العضو
                </button>

                <a
                    href="{{ route('dashboard.assembly.index') }}"
                    class="btn btn-light"
                >
                    إلغاء
                </a>

            </div>

        </form>

    </div>

</div>

@endsection