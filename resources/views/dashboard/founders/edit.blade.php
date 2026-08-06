@extends('dashboard.layouts.app')

@section('title','تعديل بيانات المؤسس')

@section('content')

<div class="container">

    <div class="card shadow-sm border-0 rounded-4">

        <div class="card-header bg-white border-0 d-flex justify-content-between align-items-center py-4 px-4">

            <h3 class="mb-0">

                تعديل بيانات المؤسس

            </h3>

            <a href="{{ route('dashboard.founders.index') }}"
            class="btn btn-outline-secondary">

                رجوع

            </a>

        </div>

        <div class="card-body p-4">

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
            action="{{ route('dashboard.founders.update',$founder->id) }}"
            enctype="multipart/form-data">

                @csrf

                @method('PUT')

                <div class="row">

                    <div class="col-lg-4">

                        <div class="text-center">

                            <h5 class="mb-3">

                                الصورة الحالية

                            </h5>

                            @if($founder->image)

                            <img
                            id="previewImage"
                            src="{{ asset('images/founders/'.$founder->image) }}"
                            class="img-fluid rounded-circle shadow"
                            style="width:220px;height:220px;object-fit:cover;">

                            @else

                            <img
                            id="previewImage"
                            src="https://placehold.co/220x220?text=No+Image"
                            class="img-fluid rounded-circle shadow">

                            @endif

                        </div>

                        <div class="mt-4">

                            <label class="form-label">

                                تغيير الصورة

                            </label>

                            <input
                            type="file"
                            class="form-control"
                            name="image"
                            id="imageInput">

                        </div>

                    </div>

                    <div class="col-lg-8">

                        <div class="mb-3">

                            <label class="form-label">

                                اسم المؤسس

                            </label>

                            <input
                            type="text"
                            class="form-control"
                            name="name"
                            value="{{ old('name',$founder->name) }}"
                            required>

                        </div>

                        <div class="mb-3">

                            <label class="form-label">

                                الاقتباس

                            </label>

                            <textarea
                            class="form-control"
                            rows="3"
                            name="quote">{{ old('quote',$founder->quote) }}</textarea>

                        </div>

                        <div class="mb-3">

                            <label class="form-label">

                                الوصف

                            </label>

                            <textarea
                            class="form-control"
                            rows="6"
                            name="description">{{ old('description',$founder->description) }}</textarea>

                        </div>

                        <div class="row">

                            <div class="col-md-6 mb-3">

                                <label class="form-label">

                                    الترتيب

                                </label>

                                <input
                                type="number"
                                class="form-control"
                                name="order"
                                value="{{ old('order',$founder->order) }}">

                            </div>

                            <div class="col-md-6 d-flex align-items-end">

                                <div class="form-check">

                                    <input
                                    class="form-check-input"
                                    type="checkbox"
                                    name="status"
                                    value="1"

                                    @checked(old('status',$founder->status))

                                    >

                                    <label class="form-check-label">

                                        إظهار في الموقع

                                    </label>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

                <hr class="my-4">

                <button
                type="submit"
                class="btn btn-success px-5">

                    حفظ التعديلات

                </button>

            </form>

        </div>

    </div>

</div>

<script>

document.getElementById('imageInput').addEventListener('change',function(e){

    if(e.target.files.length){

        let reader=new FileReader();

        reader.onload=function(event){

            document.getElementById('previewImage').src=event.target.result;

        }

        reader.readAsDataURL(e.target.files[0]);

    }

});

</script>

@endsection