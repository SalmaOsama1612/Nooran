@extends('dashboard.layouts.app')

@section('title','تعديل برنامج')

@section('content')

<div class="container">

<div class="card shadow-sm border-0 rounded-4">

<div class="card-header bg-white">

<h3>
تعديل البرنامج
</h3>

</div>

<div class="card-body">

<form method="POST"
action="{{route('dashboard.programs.update',$program->id)}}">

@csrf

@method('PUT')

<div class="mb-3">

<label class="form-label">
العنوان
</label>

<input type="text"
name="title"
class="form-control"
value="{{$program->title}}">

</div>

<div class="mb-3">

<label class="form-label">
العنوان الفرعي
</label>

<input type="text"
name="subtitle"
class="form-control"
value="{{$program->subtitle}}">

</div>

<div class="mb-3">

<label class="form-label">
الوصف
</label>

<textarea
name="description"
class="form-control"
rows="5">{{$program->description}}</textarea>

</div>

<div class="mb-3">

<label class="form-label">
الأهداف
</label>

<textarea
name="goals"
class="form-control"
rows="5">{{$program->goals}}</textarea>

</div>

<div class="mb-3">

<label class="form-label">
الترتيب
</label>

<input type="number"
name="order"
class="form-control"
value="{{$program->order}}">

</div>

<div class="form-check mb-3">

<input type="checkbox"
name="status"
value="1"
class="form-check-input"
@if($program->status)
checked
@endif>

<label class="form-check-label">
إظهار البرنامج
</label>

</div>

<button class="btn btn-success px-5">

حفظ التعديلات

</button>

</form>

</div>

</div>

</div>

@endsection