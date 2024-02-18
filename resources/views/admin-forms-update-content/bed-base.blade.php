@extends('layouts.admin')

@section('content')
<div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-secondary">Изменение основания кровати</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="/">Главная</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('admin-page-content.panel.view', ['page' => 'bed-base']) }}">Основания кроватей</a></li>
                            <li class="breadcrumb-item active">Форма изменения</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <section class="content">
            <form action="{{ route('admin-page-content.panel.update.bed-base', ['id' => $object->id]) }}" method="post">
                @csrf
                <div class="form-group">
                    <div class="form-group">
                        <label for="name" class="fw-bold text-secondary">Наименование</label>
                        <input name="name" minlength="3" maxlength="255" type="text" class="form-control" id="name" placeholder="Наименование" value="{{ $object->name }}" required>
                        @error('name')
                        <span class="error text-danger">{{ str_replace('name', 'наименование', $message) }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-warning">Изменить</button>
                    </div>
                </div>
            </form>
        </section>
</div>
@endsection
