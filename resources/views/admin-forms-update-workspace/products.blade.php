@extends('layouts.admin')

@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-secondary">Изменение товара</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="/">Главная</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('admin-page-workspace.panel.view', ['page' => 'products']) }}">Товары</a></li>
                            <li class="breadcrumb-item active">Форма изменения</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <section class="content">
            <div id="app-additional">
                <product-modal-redactor-update
                    obj-product="{{ json_encode($object, JSON_UNESCAPED_UNICODE) }}"
                    obj-categories="{{ json_encode(\App\Models\Product::$category, JSON_UNESCAPED_UNICODE) }}"
                    obj-guarantee="{{ json_encode(\App\Models\Product::$guarantee, JSON_UNESCAPED_UNICODE) }}"></product-modal-redactor-update>
            </div>
        </section>
    </div>
@endsection
