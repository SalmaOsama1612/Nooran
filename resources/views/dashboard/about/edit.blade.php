@extends('dashboard.layouts.app')

@section('title', 'من نحن')

@section('content')

<div class="container-fluid">

    <h2 class="mb-4">من نحن</h2>

    <form action="{{ route('dashboard.about.update') }}" method="POST">

        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">نبذة عن الجمعية</label>

            <textarea name="intro" class="form-control" rows="8">{{ old('intro', $about->intro ?? '') }}</textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">الرؤية</label>

            <textarea name="vision" class="form-control" rows="4">{{ old('vision', $about->vision ?? '') }}</textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">الرسالة</label>

            <textarea name="mission" class="form-control" rows="4">{{ old('mission', $about->mission ?? '') }}</textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">القيم</label>

            <textarea name="values" class="form-control" rows="6">{{ old('values', $about->values ?? '') }}</textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">المحاور الإستراتيجية</label>

            <textarea name="strategic_axes" class="form-control" rows="6">{{ old('strategic_axes', $about->strategic_axes ?? '') }}</textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">الأهداف الاستراتيجية</label>

            <textarea name="strategic_goals" class="form-control" rows="8">{{ old('strategic_goals', $about->strategic_goals ?? '') }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">
            حفظ التعديلات
        </button>

    </form>

</div>

@endsection