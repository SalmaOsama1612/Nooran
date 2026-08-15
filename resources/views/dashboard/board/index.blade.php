@extends('dashboard.layouts.app')

@section('title', 'أعضاء مجلس الإدارة')

@section('content')

<div class="board-page">

    <div class="board-header">

        <div>
            <h2>أعضاء مجلس الإدارة</h2>
            <p>إدارة أعضاء مجلس الإدارة والبيانات والصور</p>
        </div>

        <a href="{{ route('dashboard.board.create') }}" class="board-add-btn">
            <i class="fa-solid fa-plus"></i>
            إضافة عضو
        </a>

    </div>

    @if(session('success'))

        <div class="board-alert">
            <i class="fa-solid fa-circle-check"></i>
            {{ session('success') }}
        </div>

    @endif

    @if($members->count())

        <div class="board-table-wrapper">

            <table class="board-table">

                <thead>

                    <tr>
                        <th>#</th>
                        <th>الصورة</th>
                        <th>الاسم</th>
                        <th>المسمى الوظيفي</th>
                        <th>الإجراءات</th>
                    </tr>

                </thead>

                <tbody>

                    @foreach($members as $index => $member)

                        <tr>

                            <td>
                                <span class="board-number">
                                    {{ $index + 1 }}
                                </span>
                            </td>

                            <td>

                                @if($member->image)

                                    <img
                                        src="{{ asset('images/board/' . $member->image) }}"
                                        alt="{{ $member->name }}"
                                        class="board-member-image"
                                    >

                                @else

                                    <div class="board-no-image">
                                        <i class="fa-solid fa-user"></i>
                                    </div>

                                @endif

                            </td>

                            <td>

                                <strong class="board-member-name">
                                    {{ $member->name }}
                                </strong>

                            </td>

                            <td>

                                <span class="board-position">
                                    {{ $member->position }}
                                </span>

                            </td>

                            <td>

                                <div class="board-actions">

                                    <a
                                        href="{{ route('dashboard.board.edit', $member) }}"
                                        class="board-edit-btn"
                                    >
                                        <i class="fa-solid fa-pen-to-square"></i>
                                        تعديل
                                    </a>

                                    <form
                                        action="{{ route('dashboard.board.destroy', $member) }}"
                                        method="POST"
                                        onsubmit="return confirm('هل أنت متأكد من حذف هذا العضو؟')"
                                    >

                                        @csrf
                                        @method('DELETE')

                                        <button
                                            type="submit"
                                            class="board-delete-btn"
                                        >
                                            <i class="fa-solid fa-trash"></i>
                                            حذف
                                        </button>

                                    </form>

                                </div>

                            </td>

                        </tr>

                    @endforeach

                </tbody>

            </table>

        </div>

    @else

        <div class="board-empty">

            <div class="board-empty-icon">
                <i class="fa-solid fa-users"></i>
            </div>

            <h3>لا يوجد أعضاء حتى الآن</h3>

            <p>ابدئي بإضافة أعضاء مجلس الإدارة.</p>

            <a
                href="{{ route('dashboard.board.create') }}"
                class="board-add-btn"
            >
                <i class="fa-solid fa-plus"></i>
                إضافة أول عضو
            </a>

        </div>

    @endif

</div>

@endsection