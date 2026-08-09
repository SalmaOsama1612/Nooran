@extends('dashboard.layouts.app')

@section('title', 'الجمعية العمومية')

@section('content')

<div class="page-header">
    <div>
        <h2>الجمعية العمومية</h2>
        <p>إدارة أعضاء الجمعية العمومية</p>
    </div>

    <a href="{{ route('dashboard.assembly.create') }}" class="btn btn-primary">
        <i class="fa-solid fa-plus"></i>
        إضافة عضو
    </a>
</div>

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<div class="card shadow-sm border-0">

    <div class="card-body">

        @if($members->count())

            <div class="table-responsive">

                <table class="table align-middle text-center">

                    <thead>
                        <tr>
                            <th>الصورة</th>
                            <th>الاسم</th>
                            <th>المسمى الوظيفي</th>
                            <th>الإجراءات</th>
                        </tr>
                    </thead>

                    <tbody>

                        @foreach($members as $member)

                            <tr>

                                <td>

                                    @if($member->image)

                                        <img
                                            src="{{ asset('storage/' . $member->image) }}"
                                            alt="{{ $member->name }}"
                                            width="70"
                                            height="70"
                                            style="object-fit: cover; border-radius: 50%;"
                                        >

                                    @else

                                        <div
                                            style="
                                                width:70px;
                                                height:70px;
                                                border-radius:50%;
                                                background:#e8f5f1;
                                                display:flex;
                                                align-items:center;
                                                justify-content:center;
                                                margin:auto;
                                            "
                                        >
                                            <i class="fa-solid fa-user"></i>
                                        </div>

                                    @endif

                                </td>

                                <td>
                                    {{ $member->name }}
                                </td>

                                <td>
                                    {{ $member->position }}
                                </td>

                                <td>

                                    <a
                                        href="{{ route('dashboard.assembly.edit', $member) }}"
                                        class="btn btn-sm btn-warning"
                                    >
                                        <i class="fa-solid fa-pen"></i>
                                        تعديل
                                    </a>

                                    <form
                                        action="{{ route('dashboard.assembly.destroy', $member) }}"
                                        method="POST"
                                        style="display:inline;"
                                        onsubmit="return confirm('هل أنت متأكد من حذف هذا العضو؟')"
                                    >

                                        @csrf
                                        @method('DELETE')

                                        <button
                                            type="submit"
                                            class="btn btn-sm btn-danger"
                                        >
                                            <i class="fa-solid fa-trash"></i>
                                            حذف
                                        </button>

                                    </form>

                                </td>

                            </tr>

                        @endforeach

                    </tbody>

                </table>

            </div>

        @else

            <div class="text-center py-5">

                <i
                    class="fa-solid fa-users"
                    style="font-size:50px;color:#34b69e;"
                ></i>

                <h5 class="mt-3">
                    لا توجد أعضاء حاليًا
                </h5>

                <p class="text-muted">
                    ابدأ بإضافة أعضاء الجمعية العمومية.
                </p>

                <a
                    href="{{ route('dashboard.assembly.create') }}"
                    class="btn btn-primary"
                >
                    إضافة أول عضو
                </a>

            </div>

        @endif

    </div>

</div>

@endsection