@extends('layouts.admin')

@section('content')
<div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-secondary">Добавление материалов</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="/">Главная</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('admin-page-content.panel.view', ['page' => 'material']) }}">Материалы</a></li>
                            <li class="breadcrumb-item active">Форма создания</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <section class="content">
            <form action="{{ route('admin.material.store') }}" method="post">
                @csrf

                <div class="form-group">
                    <label for="name" class="fw-bold text-secondary">Наименование</label>
                    <input name="name" minlength="3" maxlength="255" type="text" class="form-control" id="name" placeholder="Наименование" required>
                    @error('name')
                        <span class="error text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="appointment" class="fw-bold text-secondary">Назначение</label>
                    <select name="appointment" id="appointment" class="form-control">
                        @foreach(\App\Models\Material::$appointment as $appointment)
                            <option
                                @selected(old('appointment') == $appointment)
                            value="{{ $appointment }}">{{ $appointment }}</option>
                        @endforeach
                    </select>
                    @error('beds_bases_id')
                        <span class="error text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-success">Добавить</button>
                </div>
            </form>
        </section>
</div>
@endsection
