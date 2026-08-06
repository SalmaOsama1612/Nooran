@extends('layouts.master')




@section('content')

@include('sections.hero')


@if($achievement)

@include('sections.achievement')

@endif

@include('sections.founders')




@endsection