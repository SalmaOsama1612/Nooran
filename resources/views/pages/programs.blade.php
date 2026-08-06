@extends('layouts.master')


@section('content')


<section class="programs-page">


<div class="container">


<div class="section-title text-center">

    <h2>
        البرامج والمشاريع
    </h2>

    <p>
        برامج تعليمية نوعية تسهم في بناء مجتمع معرفي متعلم وممكّن.
    </p>

</div>



<div class="row g-4">


@foreach($programs as $program)


<div class="col-lg-4 col-md-6">


<div class="program-card">


<div class="program-icon">

    <i class="bi bi-mortarboard-fill"></i>

</div>



<span class="program-tag">
    {{ $program->subtitle }}
</span>



<h3>
    {{ $program->title }}
</h3>



<p>
    {{ Str::limit($program->description,150) }}
</p>




<button 
class="program-btn"
data-bs-toggle="modal"
data-bs-target="#program{{$program->id}}">


اعرف المزيد

</button>



</div>


</div>


@endforeach


</div>


</div>


</section>





{{-- Modals --}}

@foreach($programs as $program)


<div class="modal fade"
id="program{{$program->id}}"
tabindex="-1">


<div class="modal-dialog modal-lg modal-dialog-centered">


<div class="modal-content">



<div class="modal-header">

<button class="modal-close" data-bs-dismiss="modal">
    <i class="bi bi-x-lg"></i>
</button>


<h5 class="modal-title">

{{ $program->title }}

</h5>





</div>




<div class="modal-body">



<h6>
{{ $program->subtitle }}
</h6>



<p>
{{ $program->description }}
</p>




<hr>



<h5>
أهداف البرنامج
</h5>



<p>
{!! nl2br(e($program->goals)) !!}
</p>



</div>


</div>


</div>


</div>


@endforeach

@endsection