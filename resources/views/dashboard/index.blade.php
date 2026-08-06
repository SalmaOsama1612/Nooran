@extends('dashboard.layouts.app')

@section('title','الرئيسية')

@section('content')

<div class="dashboard-home">

    <h2>
        مرحبًا بك في لوحة تحكم جمعية نوران
    </h2>

    <p>
        من هنا يمكنك إدارة محتوى الموقع بالكامل
    </p>

    <div class="stats-container">

        <div class="stat-card">

            <div class="icon">
                <i class="fa-solid fa-book-open"></i>
            </div>

            <div>
                <h3>0</h3>
                <span>البرامج</span>
            </div>

        </div>


        <div class="stat-card">

            <div class="icon">
                <i class="fa-solid fa-trophy"></i>
            </div>

            <div>
                <h3>0</h3>
                <span>الإنجازات</span>
            </div>

        </div>


        <div class="stat-card">

            <div class="icon">
                <i class="fa-solid fa-users"></i>
            </div>

            <div>
                <h3>0</h3>
                <span>المؤسسون</span>
            </div>

        </div>


        <div class="stat-card">

            <div class="icon">
                <i class="fa-solid fa-handshake-angle"></i>
            </div>

            <div>
                <h3>0</h3>
                <span>المتطوعون</span>
            </div>

        </div>

    </div>

</div>

@endsection