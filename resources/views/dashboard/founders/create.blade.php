@extends('dashboard.layouts.app')

@section('title','إضافة مؤسس')

@section('content')

<div class="container">

    <div class="card shadow-sm p-4">

        <div class="d-flex justify-content-between align-items-center mb-4">

            <h3>

                إضافة مؤسس جديد

            </h3>

            <a href="{{ route('dashboard.founders.index') }}"
            class="btn btn-secondary">

                رجوع

            </a>

        </div>

        @if($errors->any())

        <div class="alert alert-danger">

            <ul class="mb-0">

                @foreach($errors->all() as $error)

                <li>

                    {{ $error }}

                </li>

                @endforeach

            </ul>

        </div>

        @endif

        <form method="POST"
        action="{{ route('dashboard.founders.store') }}"
        enctype="multipart/form-data">

            @csrf

            <div class="row">

                <div class="col-md-6 mb-3">

                    <label class="form-label">

                        اسم المؤسس

                    </label>

                    <input type="text"
                    name="name"
                    class="form-control"
                    value="{{ old('name') }}"
                    required>

                </div>

                <div class="col-md-6 mb-3">

                    <label class="form-label">

                        الترتيب

                    </label>

                    <input type="number"
                    name="order"
                    class="form-control"
                    value="{{ old('order',0) }}"
                    required>

                </div>

            </div>

            <div class="mb-3">

                <label class="form-label">

                    الاقتباس

                </label>

                <textarea
                name="quote"
                rows="3"
                class="form-control">{{ old('quote') }}</textarea>

            </div>

            <div class="mb-3">

                <label class="form-label">

                    الوصف

                </label>

                <textarea
                name="description"
                rows="5"
                class="form-control">{{ old('description') }}</textarea>

            </div>

            <div class="mb-3">

                <label class="form-label">

                    صورة المؤسس

                </label>

                <input type="file"
                name="image"
                class="form-control"
                id="imageInput">

            </div>

            <div class="mb-4 text-center">

                <img id="previewImage"
                src=""
                style="display:none;width:220px;height:220px;object-fit:cover;border-radius:20px;">

            </div>

            <div class="form-check mb-4">

                <input
                type="checkbox"
                class="form-check-input"
                name="status"
                value="1"
                checked>

                <label class="form-check-label">

                    إظهار في الموقع

                </label>

            </div>

            <button class="btn btn-success px-5">

                حفظ

            </button>

        </form>

    </div>

</div>

<script>

document.getElementById('imageInput').addEventListener('change',function(e){

    let reader=new FileReader();

    reader.onload=function(){

        let img=document.getElementById('previewImage');

        img.src=reader.result;

        img.style.display='block';

    }

    reader.readAsDataURL(e.target.files[0]);

});

</script>

@endsection