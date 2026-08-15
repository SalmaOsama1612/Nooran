@extends('dashboard.layouts.app')

@section('title', 'إضافة عضو مجلس إدارة')

@section('content')

<div class="board-page">

    <div class="board-header">

        <div>
            <h2>إضافة عضو مجلس الإدارة</h2>
            <p>إضافة بيانات عضو جديد إلى مجلس الإدارة</p>
        </div>

        <a href="{{ route('dashboard.board.index') }}" class="board-back-btn">
            <i class="fa-solid fa-arrow-right"></i>
            العودة للأعضاء
        </a>

    </div>

    <div class="board-form-card">

        <form
            action="{{ route('dashboard.board.store') }}"
            method="POST"
            enctype="multipart/form-data"
        >

            @csrf

            <div class="board-form-grid">

                <div class="board-form-group">

                    <label for="name">
                        اسم العضو
                    </label>

                    <input
                        type="text"
                        id="name"
                        name="name"
                        value="{{ old('name') }}"
                        placeholder="اكتب اسم العضو"
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
                        value="{{ old('position') }}"
                        placeholder="مثال: رئيس مجلس الإدارة"
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

                    <input
                        type="file"
                        id="image"
                        name="image"
                        accept="image/*"
                    >

                    <small>
                        يفضل استخدام صورة واضحة للعضو.
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
                    حفظ العضو
                </button>

            </div>

        </form>

    </div>

</div>

@endsection