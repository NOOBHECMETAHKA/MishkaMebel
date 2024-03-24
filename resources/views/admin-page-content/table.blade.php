@extends('layouts.admin')

@section('content')
<div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-secondary">Столы</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="/">Главная</a></li>
                            <li class="breadcrumb-item active">Столы</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <section class="content">
            <div class="col-6">
                @if(count(\App\Models\FurnitureSize::all()) > 0 and count(\App\Models\Material::all()->where('appointment', \App\Models\Material::$appointment[1])) > 0)
                    <div class="mb-3">
                        <a class="btn btn-success" href="{{ route("admin-page-content.panel.add-form", ["page" => "table"]) }}">Добавить</a>
                    </div>
                @else
                    <div class="alert alert-warning">
                        <h4 class="alert-heading">Предупреждение!</h4>
                        <span>Для создания объекта «Стол» требуется создать запись на странице <a class="alert-link" href="{{ route('admin-page-content.panel.add-form', ['page' => 'furniture-dimensions']) }}">«Габариты»</a> и <a class="alert-link" href="{{ route('admin-page-content.panel.add-form', ['page' => 'material']) }}">«Материалы»</a> с назначением «Материал».</span>
                    </div>
              @endif
        </div>
        <div id="app">
            <table-list></table-list>
        </div>
</section>
</div>
@endsection
