@extends('layouts.admin')

@section('content')
<div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-secondary">Чехлы</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="/">Главная</a></li>
                            <li class="breadcrumb-item active">Чехлы от матрасов</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <section class="content">
            <div class="col-6">
                @if(count(\App\Models\FurnitureSize::all()) > 0 and count(\App\Models\FurnitureSize::all()) > 0)
                <div class="mb-3">
                    <a class="btn btn-success" href="{{ route("admin-page-content.panel.add-form", ["page" => "mattress-cover"]) }}">Добавить</a>
                </div>
                @else
                    <div class="alert alert-warning">
                        <h4 class="alert-heading">Предупреждение!</h4>
                        <span>Для создания объекта «Чехол» требуется создать запись на странице <a class="alert-link" href="{{ route('admin-page-content.panel.add-form', ['page' => 'furniture-size']) }}">«Размеры»</a> и странице <a class="alert-link" href="{{ route('admin-page-content.panel.add-form', ['page' => 'furniture-size']) }}">«Крепление матрасов»</a>.</span>
                    </div>
                @endif
            </div>
            <div id="app">
                <mattress-cover-list></mattress-cover-list>
            </div>
        </section>
    </div>
@endsection
