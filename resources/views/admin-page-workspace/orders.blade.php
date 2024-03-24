@extends('layouts.admin')

@section('content')
<div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-secondary">Заказы</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="/">Главная</a></li>
                            <li class="breadcrumb-item active">Заказы</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <section class="content">
            <div id="app-additional">
                <order-data-table-component></order-data-table-component>
            </div>
        </section>
</div>
@endsection
