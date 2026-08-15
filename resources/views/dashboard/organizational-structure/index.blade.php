@extends('dashboard.layouts.app')

@section('title', 'الهيكل التنظيمي')

@section('content')

<div class="org-dashboard-page">

    <div class="org-dashboard-header">

        <div>
            <h2>الهيكل التنظيمي</h2>
            <p>إدارة جميع المناصب والإدارات والعلاقات التنظيمية للجمعية</p>
        </div>

        <a href="{{ route('dashboard.organizational-structure.create') }}" class="org-add-btn">
            <i class="fa-solid fa-plus"></i>
            إضافة عنصر
        </a>

    </div>

    @if(session('success'))

        <div class="org-alert">
            <i class="fa-solid fa-circle-check"></i>
            <span>{{ session('success') }}</span>
        </div>

    @endif

    @if($structures->count())

        <div class="org-table-card">

            <div class="org-table-wrapper">

                <table class="org-table">

                    <thead>

                        <tr>
                            <th>#</th>
                            <th>العنصر</th>
                            <th>المسمى الوظيفي</th>
                            <th>نوع العنصر</th>
                            <th>تابع لـ</th>
                            <th>الترتيب</th>
                            <th>الحالة</th>
                            <th>الإجراءات</th>
                        </tr>

                    </thead>

                    <tbody>

                        @foreach($structures as $structure)

                            <tr>

                                <td>
                                    <span class="org-number">
                                        {{ $loop->iteration }}
                                    </span>
                                </td>

                                <td>

                                    <div class="org-member">

                                        @if($structure->image)

                                            <img
                                                src="{{ asset('storage/' . $structure->image) }}"
                                                alt="{{ $structure->name ?: $structure->position }}"
                                                class="org-member-image"
                                            >

                                        @else

                                            <div class="org-member-placeholder">
                                                <i class="fa-solid fa-sitemap"></i>
                                            </div>

                                        @endif

                                        <div>

                                            @if($structure->name)
                                                <strong>{{ $structure->name }}</strong>
                                            @else
                                                <strong>{{ $structure->position }}</strong>
                                            @endif

                                        </div>

                                    </div>

                                </td>

                                <td>
                                    <span class="org-position">
                                        {{ $structure->position }}
                                    </span>
                                </td>

                                <td>

                                    <span class="org-type">
                                        {{ $structure->type }}
                                    </span>

                                </td>

                                <td>

                                    @if($structure->parent)

                                        <span class="org-parent">
                                            {{ $structure->parent->position }}
                                        </span>

                                    @else

                                        <span class="org-root">
                                            رئيسي
                                        </span>

                                    @endif

                                </td>

                                <td>
                                    <span class="org-order">
                                        {{ $structure->sort_order }}
                                    </span>
                                </td>

                                <td>

                                    @if($structure->is_active)

                                        <span class="org-status active">
                                            <i class="fa-solid fa-circle-check"></i>
                                            ظاهر
                                        </span>

                                    @else

                                        <span class="org-status inactive">
                                            <i class="fa-solid fa-circle-xmark"></i>
                                            مخفي
                                        </span>

                                    @endif

                                </td>

                                <td>

                                    <div class="org-actions">

                                        <a
                                            href="{{ route('dashboard.organizational-structure.edit', $structure) }}"
                                            class="org-edit-btn"
                                        >
                                            <i class="fa-solid fa-pen"></i>
                                            تعديل
                                        </a>

                                        <form
                                            action="{{ route('dashboard.organizational-structure.destroy', $structure) }}"
                                            method="POST"
                                            onsubmit="return confirm('هل أنت متأكد من حذف هذا العنصر؟')"
                                        >

                                            @csrf
                                            @method('DELETE')

                                            <button type="submit" class="org-delete-btn">
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

        </div>

    @else

        <div class="org-empty">

            <div class="org-empty-icon">
                <i class="fa-solid fa-sitemap"></i>
            </div>

            <h3>لا يوجد هيكل تنظيمي</h3>

            <p>ابدئي بإضافة أول عنصر إلى الهيكل التنظيمي.</p>

            <a href="{{ route('dashboard.organizational-structure.create') }}" class="org-add-btn">
                <i class="fa-solid fa-plus"></i>
                إضافة أول عنصر
            </a>

        </div>

    @endif

</div>

@endsection