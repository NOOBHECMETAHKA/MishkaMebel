@extends('layouts.admin')

@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-secondary">Панель статитики</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item">Панель статистики</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <section class="content">
            <div class="row">
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>{{ count(\App\Models\Order::all()) }}</h3>
                            <p>Количество заказов</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-bag"></i>
                        </div>
                        <a href="{{ route('admin-page-workspace.panel.view', ['page' => 'orders']) }}" class="small-box-footer">Посмотреть подробнее <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3>{{ round(\App\Models\Discount::getSumDiscount()) }}</h3>
                            <p>Общая сумма скидки</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-stats-bars"></i>
                        </div>
                        <a href="{{ route('admin-page-workspace.panel.view', ['page' => 'discounts']) }}" class="small-box-footer">Посмотреть подробнее <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3>{{ count(\App\Models\User::all()) }}</h3>
                            <p>Зарегистрированные пользователи</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person-add"></i>
                        </div>
                        <a href="{{ route('admin-page-workspace.panel.view', ['page' => 'personal-information']) }}" class="small-box-footer">Посмотреть подробнее <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
            </div>
            <div>
                <div id="app-additional">
                    <type-product-count-chart-statistic obj-data="{{ json_encode($statisticCountProducts) }}"></type-product-count-chart-statistic>
                </div>
            </div>
        </section>
    </div>
@endsection
