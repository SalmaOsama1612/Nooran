
@extends('dashboard.layouts.app')

@section('title', 'إدارة الحوكمة')

@section('content')

<div class="governance-dashboard">

    <div class="governance-header">

        <div>
            <h2>إدارة الحوكمة</h2>
            <p>إدارة مستندات ولوائح الحوكمة الخاصة بالجمعية</p>
        </div>

        <a
            href="{{ route('dashboard.governance.create') }}"
            class="governance-add-btn"
        >
            <i class="fa-solid fa-plus"></i>
            إضافة مستند
        </a>

    </div>

    @if(session('success'))

        <div class="governance-alert">
            <i class="fa-solid fa-circle-check"></i>
            {{ session('success') }}
        </div>

    @endif

    <div class="governance-card">

        @if($documents->count())

            <div class="governance-table-wrapper">

                <table class="governance-table">

                    <thead>
                        <tr>
                            <th>#</th>
                            <th>اسم المستند</th>
                            <th>الحالة</th>
                            <th>الملف</th>
                            <th>الإجراءات</th>
                        </tr>
                    </thead>

                    <tbody>

                        @foreach($documents as $document)

                            <tr>

                                <td>
                                    {{ $loop->iteration }}
                                </td>

                                <td>
                                    <strong>
                                        {{ $document->title }}
                                    </strong>
                                </td>

                                <td>

                                    @if($document->is_active)

                                        <span class="governance-active">
                                            مفعل
                                        </span>

                                    @else

                                        <span class="governance-inactive">
                                            غير مفعل
                                        </span>

                                    @endif

                                </td>

                                <td>

                                    <a
                                        href="{{ asset('storage/' . $document->file_path) }}"
                                        target="_blank"
                                        class="governance-view-btn"
                                    >
                                        <i class="fa-solid fa-file-pdf"></i>
                                        عرض PDF
                                    </a>

                                </td>

                                <td>

                                    <div class="governance-actions">

                                        <a
                                            href="{{ route('dashboard.governance.edit', $document) }}"
                                            class="governance-edit-btn"
                                        >
                                            <i class="fa-solid fa-pen"></i>
                                        </a>

                                        <form
                                            action="{{ route('dashboard.governance.destroy', $document) }}"
                                            method="POST"
                                            onsubmit="return confirm('هل أنت متأكد من حذف المستند؟')"
                                        >

                                            @csrf
                                            @method('DELETE')

                                            <button
                                                type="submit"
                                                class="governance-delete-btn"
                                            >
                                                <i class="fa-solid fa-trash"></i>
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

            <div class="governance-empty">

                <i class="fa-solid fa-file-pdf"></i>

                <h3>لا توجد مستندات</h3>

                <p>
                    لم تتم إضافة أي مستندات للحوكمة حتى الآن.
                </p>

                <a
                    href="{{ route('dashboard.governance.create') }}"
                    class="governance-add-btn"
                >
                    <i class="fa-solid fa-plus"></i>
                    إضافة أول مستند
                </a>

            </div>

        @endif

    </div>

</div>

@endsection

