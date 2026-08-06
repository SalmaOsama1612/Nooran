@extends('dashboard.layouts.app')

@section('title','إدارة الهيرو')

@section('content')

<div class="container">

<h2 class="mb-4">
إدارة قسم الهيرو
</h2>

@if(session('success'))

<div class="alert alert-success">
{{session('success')}}
</div>

@endif


<form method="POST"
action="{{route('dashboard.hero.update')}}"
enctype="multipart/form-data">

@csrf


<div class="mb-3">

<label>
العنوان
</label>

<input 
type="text"
name="title"
class="form-control"
value="{{ $hero->title ?? '' }}">

</div>


<div class="mb-3">

<label>
الوصف
</label>

<textarea
name="description"
class="form-control">{{ $hero->description ?? '' }}</textarea>

</div>


<div class="mb-3">

<label>
فيديو الخلفية
</label>

<input
type="file"
name="video"
class="form-control">

</div>


<div class="mb-3">

<label>
اللوجو
</label>

<input
type="file"
name="logo"
class="form-control">

</div>


<div class="form-check mb-3">

<input
class="form-check-input"
type="checkbox"
name="status"
value="1"
@if(isset($hero) && $hero->status)
checked
@endif>

<label class="form-check-label">
إظهار السكشن
</label>

</div>


<button class="btn btn-success">
حفظ التعديلات
</button>


</form>

</div>

@endsection