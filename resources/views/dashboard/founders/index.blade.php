@extends('dashboard.layouts.app')

@section('title','إدارة المؤسسين')

@section('content')

<div class="container">

    <div class="card shadow-sm p-4">

        <div class="d-flex justify-content-between align-items-center mb-4">

            <h3>
                إدارة المؤسسين
            </h3>

            <a href="{{ route('dashboard.founders.create') }}"
            class="btn-founder-add">

                إضافة مؤسس

            </a>

        </div>


        @if(session('success'))

        <div class="alert alert-success">

            {{ session('success') }}

        </div>

        @endif



        <div class="row">


            @foreach($founders as $founder)


            <div class="col-md-4 mb-4">


             <div class="card founders-card">

                    @if($founder->image)
<img src="{{ asset('images/founders/'.$founder->image) }}">

                    @endif



                    <div class="card-body">


                        <h5 class="card-title">

                            {{ $founder->name }}

                        </h5>


                        <p>

                            {{ Str::limit($founder->description,100) }}

                        </p>


                        <p>

                            الترتيب:
                            {{ $founder->order }}

                        </p>



                        <p>

                            الحالة:

                            @if($founder->status)

                            <span class="badge bg-success">
                                ظاهر
                            </span>

                            @else

                            <span class="badge bg-danger">
                                مخفي
                            </span>

                            @endif

                        </p>



                       <div class="founders-actions">


                            <a href="{{ route('dashboard.founders.edit',$founder->id) }}"
                            class="btn btn-primary btn-sm">

                                تعديل

                            </a>



                            <form method="POST"
                            action="{{ route('dashboard.founders.destroy',$founder->id) }}">

                                @csrf

                                @method('DELETE')


                                                <button
                    type="submit"
                    class="btn btn-danger btn-sm"
                    onclick="return confirm('هل أنت متأكد من حذف هذا المؤسس؟')">

                        حذف

                    </button>


                            </form>


                        </div>


                    </div>


                </div>


            </div>


            @endforeach


        </div>


    </div>


</div>


@endsection