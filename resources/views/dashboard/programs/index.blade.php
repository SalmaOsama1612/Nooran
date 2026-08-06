@extends('dashboard.layouts.app')

@section('title','إدارة البرامج')

@section('content')

<div class="container">

    @if(session('success'))

    <div class="alert alert-success">

        {{ session('success') }}

    </div>

    @endif

    <div class="card shadow-sm border-0 rounded-4">

        <div class="card-header bg-white d-flex justify-content-between align-items-center">

            <h3 class="mb-0">

                إدارة البرامج

            </h3>

            <a href="{{ route('dashboard.programs.create') }}"
            class="btn btn-primary">

                <i class="fa-solid fa-plus"></i>

                إضافة برنامج

            </a>

        </div>

        <div class="card-body">

            <div class="table-responsive">

                <table class="table table-hover align-middle">

                    <thead>

                        <tr>

                            <th>#</th>

                            <th>الصورة</th>

                            <th>العنوان</th>

                            <th>العنوان الفرعي</th>

                            <th>الترتيب</th>

                            <th>الحالة</th>

                            <th width="180">

                                العمليات

                            </th>

                        </tr>

                    </thead>

                    <tbody>

                        @forelse($programs as $program)

                        <tr>

                            <td>

                                {{ $program->id }}

                            </td>

                            <td>

                                @if($program->image)

                                <img
                                src="{{ asset('images/programs/'.$program->image) }}"
                                style="width:90px;height:70px;object-fit:cover;border-radius:10px;">

                                @else

                                <span class="text-muted">

                                    لا توجد صورة

                                </span>

                                @endif

                            </td>

                            <td>

                                {{ $program->title }}

                            </td>

                            <td>

                                {{ $program->subtitle }}

                            </td>

                            <td>

                                {{ $program->order }}

                            </td>

                            <td>

                                @if($program->status)

                                <span class="badge bg-success">

                                    ظاهر

                                </span>

                                @else

                                <span class="badge bg-danger">

                                    مخفي

                                </span>

                                @endif

                            </td>

                            <td>

                                <a href="{{ route('dashboard.programs.edit',$program->id) }}"
                                class="btn btn-warning btn-sm">

                                    <i class="fa-solid fa-pen"></i>

                                </a>

                                <form
                                action="{{ route('dashboard.programs.destroy',$program->id) }}"
                                method="POST"
                                class="d-inline">

                                    @csrf

                                    @method('DELETE')

                                    <button
                                    class="btn btn-danger btn-sm"
                                    onclick="return confirm('هل تريد حذف البرنامج؟')">

                                        <i class="fa-solid fa-trash"></i>

                                    </button>

                                </form>

                            </td>

                        </tr>

                        @empty

                        <tr>

                            <td colspan="7"
                            class="text-center py-5">

                                لا توجد برامج حتى الآن

                            </td>

                        </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>

    </div>

</div>

@endsection