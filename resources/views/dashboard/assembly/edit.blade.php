@extends('dashboard.layouts.app')

@section('title', 'تعديل عضو الجمعية العمومية')

@section('content')

<div class="container-fluid">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="fw-bold mb-1">تعديل عضو الجمعية العمومية</h2>
            <p class="text-muted mb-0">تعديل بيانات وصورة العضو</p>
        </div>

        <a href="{{ route('dashboard.assembly.index') }}" class="btn btn-secondary">
            <i class="fa-solid fa-arrow-right"></i>
            العودة
        </a>
    </div>

    <div class="card border-0 shadow-sm">

        <div class="card-body p-4">

            <form
                action="{{ route('dashboard.assembly.update', $member->id) }}"
                method="POST"
                enctype="multipart/form-data"
            >

                @csrf
                @method('PUT')

                <div class="mb-4">
                    <label class="form-label fw-bold">
                        اسم العضو
                    </label>

                    <input
                        type="text"
                        name="name"
                        class="form-control"
                        value="{{ old('name', $member->name) }}"
                        required
                    >

                    @error('name')
                        <div class="text-danger mt-1">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label class="form-label fw-bold">
                        المسمى الوظيفي
                    </label>

                    <input
                        type="text"
                        name="position"
                        class="form-control"
                        value="{{ old('position', $member->position) }}"
                        required
                    >

                    @error('position')
                        <div class="text-danger mt-1">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-4">

                    <label class="form-label fw-bold">
                        الصورة
                    </label>

                    @if($member->image)

                        <div class="mb-3">
                            <img
                                src="{{ asset('storage/' . $member->image) }}"
                                alt="{{ $member->name }}"
                                style="width:120px;height:120px;object-fit:cover;border-radius:50%;"
                            >
                        </div>

                    @endif

                    <input
                        type="file"
                        name="image"
                        class="form-control"
                        accept="image/*"
                    >

                    <small class="text-muted">
                        اتركي الحقل فارغًا للاحتفاظ بالصورة الحالية.
                    </small>

                    @error('image')
                        <div class="text-danger mt-1">
                            {{ $message }}
                        </div>
                    @enderror

                </div>

                <div class="d-flex gap-2">

                    <button type="submit" class="btn btn-primary">
                        <i class="fa-solid fa-save"></i>
                        حفظ التعديلات
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

</div>

@endsection
