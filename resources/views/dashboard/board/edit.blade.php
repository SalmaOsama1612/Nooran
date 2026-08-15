@extends('dashboard.layouts.app')

@section('title', 'تعديل عضو مجلس الإدارة')

@section('content')

<div class="board-page">

    <div class="board-header">

        <div>
            <h2>تعديل عضو مجلس الإدارة</h2>
            <p>تعديل بيانات عضو مجلس الإدارة</p>
        </div>

        <a href="{{ route('dashboard.board.index') }}" class="board-back-btn">
            <i class="fa-solid fa-arrow-right"></i>
            العودة للأعضاء
        </a>

    </div>

    <div class="board-form-card">

        <form
            action="{{ route('dashboard.board.update', $boardMember) }}"
            method="POST"
            enctype="multipart/form-data"
        >

            @csrf
            @method('PUT')

            <div class="board-form-grid">

                <div class="board-form-group">

                    <label for="name">
                        اسم العضو
                    </label>

                    <input
                        type="text"
                        id="name"
                        name="name"
                        value="{{ old('name', $boardMember->name) }}"
                        required
                    >

                    @error('name')
                        <small class="board-error">
                            {{ $message }}
                        </small>
                    @enderror

                </div>

                <div class="board-form-group">

                    <label for="position">
                        المسمى الوظيفي
                    </label>

                    <input
                        type="text"
                        id="position"
                        name="position"
                        value="{{ old('position', $boardMember->position) }}"
                        required
                    >

                    @error('position')
                        <small class="board-error">
                            {{ $message }}
                        </small>
                    @enderror

                </div>

                <div class="board-form-group board-image-field">

                    <label for="image">
                        صورة العضو
                    </label>

                    @if($boardMember->image)

                        <div class="board-current-image">

                            <img
                                src="{{ asset('images/board/' . $boardMember->image) }}"
                                alt="{{ $boardMember->name }}"
                            >

                            <span>
                                الصورة الحالية
                            </span>

                        </div>

                    @endif

                    <input
                        type="file"
                        id="image"
                        name="image"
                        accept="image/*"
                    >

                    <small>
                        اتركي الحقل فارغًا للاحتفاظ بالصورة الحالية.
                    </small>

                    @error('image')
                        <small class="board-error">
                            {{ $message }}
                        </small>
                    @enderror

                </div>

            </div>

            <div class="board-form-actions">

                <a
                    href="{{ route('dashboard.board.index') }}"
                    class="board-cancel-btn"
                >
                    إلغاء
                </a>

                <button type="submit" class="board-save-btn">
                    <i class="fa-solid fa-floppy-disk"></i>
                    حفظ التعديلات
                </button>

            </div>

        </form>

    </div>

</div>

@endsection