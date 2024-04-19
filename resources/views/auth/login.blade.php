@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row h-100 justify-content-center align-items-center">
        <div class="col-md-8 h-100">
            <div class="form-group mb-3 d-flex justify-content-center">
                <img class="w-25" src="dist/img/AdminLTELogo.png" alt="">
            </div>
            <h1 class="text-center text-secondary text-uppercase">Авторизация</h1>
            <div class="__login_form_border">
                <form action="{{ route('login') }}" method="post">
                    @csrf
{{--                    csrf защитное поле для отправки данных на сервер--}}
                    <div class="form-group mb-3">
                        <label class="text-secondary fs-4">Электронная почта</label>
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                        @error('email')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label class="text-secondary fs-4">Пароль</label>
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <small class="text-danger">{{ $message }}</small>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group mb-3 px-1">
                        <div class="form-check">
                            <input class="form-check-input fs-5 @error('password') is-invalid @enderror" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                            <label class="text-secondary fs-5" for="remember">
                                {{ __('Запомнить это устройство?') }}
                            </label>
                        </div>
                    </div>

                    <div class="form-group mb-3 d-flex justify-content-center">
                        <button type="submit" class="btn btn-secondary text-uppercase">Войти</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
