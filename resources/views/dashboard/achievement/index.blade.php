@extends('dashboard.layouts.app')

@section('title','إدارة الإنجازات')

@section('content')

<div class="container">

    <div class="card shadow-sm p-4">

        <h3 class="mb-4">
            إدارة الإنجازات
        </h3>

        @if(session('success'))

        <div class="alert alert-success">
            {{ session('success') }}
        </div>

        @endif

        <form method="POST"
        action="{{ route('dashboard.achievement.update') }}"
        enctype="multipart/form-data">

        @csrf

        <div class="mb-3">

            <label class="form-label">
                عنوان السكشن
            </label>

            <input type="text"
            name="title"
            class="form-control"
            value="{{ $achievement->title ?? '' }}">

        </div>

        <div class="mb-3">

            <label class="form-label">
                الوصف
            </label>

            <textarea name="description"
            class="form-control"
            rows="5">{{ $achievement->description ?? '' }}</textarea>

        </div>

        @if($achievement && $achievement->video)

        <div class="mb-4">

            <label class="form-label">
                الفيديو الحالي
            </label>

            <video width="300" controls>

                <source src="{{ asset('videos/achievements/'.$achievement->video) }}">

            </video>

        </div>

        @endif

        <div class="mb-3">

            <label class="form-label">
                تغيير الفيديو
            </label>

            <input type="file"
            name="video"
            class="form-control">

        </div>

        <div class="mb-3">

            <label class="form-label">
                إضافة صور جديدة
            </label>

            <input type="file"
            name="images[]"
            multiple
            class="form-control">

        </div>

        <div class="form-check mb-4">

            <input type="checkbox"
            name="status"
            value="1"
            class="form-check-input"

            @if($achievement && $achievement->status)
            checked
            @endif>

            <label class="form-check-label">

                إظهار السكشن

            </label>

        </div>

        <button class="btn btn-success px-5">

            حفظ التعديلات

        </button>

        </form>

    </div>


    @if($achievement && $achievement->images->count())


    <div class="card shadow-sm p-4 mt-4">

        <h4 class="mb-4">
            الصور الحالية
        </h4>


        <div class="row">


            @foreach($achievement->images as $image)


            <div class="col-md-3 mb-3">


                <div class="card">


                    <img src="{{ asset('images/achievements/'.$image->image) }}"
                    class="card-img-top"
                    style="height:180px;object-fit:cover;">


                    <div class="card-body text-center">


                        <form method="POST"
                        action="{{ route('dashboard.achievement.image.delete',$image->id) }}">


                            @csrf

                            @method('DELETE')


                            <button type="submit"
                            class="btn btn-danger btn-sm">

                                حذف

                            </button>


                        </form>


                    </div>


                </div>


            </div>


            @endforeach


        </div>


    </div>


    @endif


</div>

@endsection