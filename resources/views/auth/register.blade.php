@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row h-100 justify-content-center align-items-center">
        <div class="col-md-8 h-100 p-5" style="border: 5px #F39326 dashed; border-radius: 20px">
            <h1 class="text-center text-uppercase" style="color: #F39326">Регистрация</h1>
            <div class="__login_form_border">
                <form action="{{ route('register') }}" method="post">
                    @csrf
                    <div class="form-group mb-3">
                        <label for="email" class="text-secondary fs-4">Электронная почта</label>
                        <input id="email" name="email" type="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" required autocomplete="email" autofocus>
                        @error('email')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label for="password" class="text-secondary fs-4">Пароль</label>
                        <input id="password" name="password" type="password" class="form-control @error('password') is-invalid @enderror" required autocomplete="new-password">
                        @error('password')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label for="password-confirm" class="text-secondary fs-4">Повтор пароля</label>
                        <input id="password-confirm" type="password" class="form-control @error('password') is-invalid @enderror" name="password_confirmation" required autocomplete="new-password">
                    </div>

                    <div class="form-group mb-3 d-flex justify-content-center">
                        <button type="submit" class="btn btn-secondary text-uppercase">Зарегистрироваться</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
