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
            </div>
            <div class="card-footer">
                @if(\Illuminate\Support\Facades\Auth::check())
                    @if(\Illuminate\Support\Facades\Auth::user()->role != 'user')
                        <a href="/admin/panel/charts" class="btn btn-success">Перейти к работе</a>
                    @else
                        <small class="text-danger">У вас нету доступа к панели управления. Дождитесь пока администраторы изменят вам роль!</small>
                    @endif
                @else
                    <small class="text-danger">Вам следует авторизоваться!</small>
                @endif
            </div>
        </div>
    </div>
    </div>
@endsection
