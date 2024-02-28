@extends('layouts.app')

@section('content')
    <div class="container">
    <div class="w-100 d-flex justify-content-center">
        <div class="card w-75">
            <h3 class="card-header">Привествие</h3>
            <div class="card-body">
                <div>
                    <span class="fw-bold">Добро пожаловать в панель управления магазином детской мебели. Для начала работы авторизируйтесь!</span>
                </div>
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
            </div>
            <div class="card-footer">
                <a href="/admin/panel/charts" class="btn btn-success">Перейти к работе</a>
            </div>
        </div>
    </div>
    </div>
@endsection
