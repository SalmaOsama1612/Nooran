@extends('dashboard.layouts.app')

@section('title', 'الرئيسية')

@section('content')

<div class="dashboard-home">

    <div class="dashboard-welcome">

        <div>
            <span class="dashboard-welcome-label">
                لوحة التحكم
            </span>

            <h2>
                مرحبًا بك في لوحة تحكم جمعية نوران
            </h2>

            <p>
                من هنا يمكنك متابعة وإدارة محتوى الموقع بالكامل
            </p>
        </div>

        <div class="dashboard-welcome-icon">
            <i class="fa-solid fa-chart-pie"></i>
        </div>

    </div>


    <div class="stats-container">

        <div class="stat-card">

            <div class="stat-icon">
                <i class="fa-solid fa-book-open"></i>
            </div>

            <div class="stat-content">
                <span>البرامج</span>
                <h3>{{ $stats['programs'] }}</h3>
            </div>

        </div>


        <div class="stat-card">

            <div class="stat-icon">
                <i class="fa-solid fa-trophy"></i>
            </div>

            <div class="stat-content">
                <span>الإنجازات</span>
                <h3>{{ $stats['achievements'] }}</h3>
            </div>

        </div>


        <div class="stat-card">

            <div class="stat-icon">
                <i class="fa-solid fa-user-tie"></i>
            </div>

            <div class="stat-content">
                <span>المؤسسون</span>
                <h3>{{ $stats['founders'] }}</h3>
            </div>

        </div>


        <div class="stat-card">

            <div class="stat-icon">
                <i class="fa-solid fa-user-group"></i>
            </div>

            <div class="stat-content">
                <span>المستشارون</span>
                <h3>{{ $stats['advisors'] }}</h3>
            </div>

        </div>


        <div class="stat-card">

            <div class="stat-icon">
                <i class="fa-solid fa-people-group"></i>
            </div>

            <div class="stat-content">
                <span>أعضاء الجمعية</span>
                <h3>{{ $stats['assembly_members'] }}</h3>
            </div>

        </div>


        <div class="stat-card">

            <div class="stat-icon">
                <i class="fa-solid fa-building-columns"></i>
            </div>

            <div class="stat-content">
                <span>مجلس الإدارة</span>
                <h3>{{ $stats['board_members'] }}</h3>
            </div>

        </div>


        <div class="stat-card">

            <div class="stat-icon">
                <i class="fa-solid fa-user-shield"></i>
            </div>

            <div class="stat-content">
                <span>التنفيذيون</span>
                <h3>{{ $stats['executives'] }}</h3>
            </div>

        </div>


        <div class="stat-card">

            <div class="stat-icon">
                <i class="fa-solid fa-sitemap"></i>
            </div>

            <div class="stat-content">
                <span>الهيكل التنظيمي</span>
                <h3>{{ $stats['organizational_structure'] }}</h3>
            </div>

        </div>


        <div class="stat-card">

            <div class="stat-icon">
                <i class="fa-solid fa-file-shield"></i>
            </div>

            <div class="stat-content">
                <span>وثائق الحوكمة</span>
                <h3>{{ $stats['governance'] }}</h3>
            </div>

        </div>


        <div class="stat-card">

            <div class="stat-icon">
                <i class="fa-solid fa-hand-holding-heart"></i>
            </div>

            <div class="stat-content">
                <span>فرص التطوع</span>
                <h3>{{ $stats['volunteer_opportunities'] }}</h3>
            </div>

        </div>


        <div class="stat-card">

            <div class="stat-icon">
                <i class="fa-solid fa-file-signature"></i>
            </div>

            <div class="stat-content">
                <span>طلبات التطوع</span>
                <h3>{{ $stats['volunteer_applications'] }}</h3>
            </div>

        </div>

    </div>


    <div class="dashboard-summary">

        <div class="summary-card">

            <div class="summary-icon">
                <i class="fa-solid fa-layer-group"></i>
            </div>

            <div>
                <span>إجمالي المحتوى</span>

                <strong>
                    {{ array_sum($stats) }}
                </strong>

                <p>
                    إجمالي العناصر المسجلة في لوحة التحكم
                </p>
            </div>

        </div>


        <div class="summary-card">

            <div class="summary-icon">
                <i class="fa-solid fa-handshake-angle"></i>
            </div>

            <div>
                <span>النشاط التطوعي</span>

                <strong>
                    {{ $stats['volunteer_opportunities'] + $stats['volunteer_applications'] }}
                </strong>

                <p>
                    فرص التطوع وطلبات الانضمام
                </p>
            </div>

        </div>


        <div class="summary-card">

            <div class="summary-icon">
                <i class="fa-solid fa-users"></i>
            </div>

            <div>
                <span>الهيكل البشري</span>

                <strong>
                    {{ $stats['founders'] + $stats['advisors'] + $stats['assembly_members'] + $stats['board_members'] + $stats['executives'] }}
                </strong>

                <p>
                    إجمالي أعضاء الكيانات الإدارية
                </p>
            </div>

        </div>

    </div>

</div>

@endsection