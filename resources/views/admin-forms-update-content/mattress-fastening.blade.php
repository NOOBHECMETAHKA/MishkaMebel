@extends('layouts.admin')

@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-secondary">Изменение крепления</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/">Главная</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin-page-content.panel.view', ['page' => 'mattress-fastening']) }}">Крепления</a></li>
                        <li class="breadcrumb-item active">Форма изменения</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <section class="content">
        <form action="{{ route('admin-page-content.panel.update.mattress-fastening', ['id' => $object->id]) }}" method="post">
            @csrf
            <div class="d-flex flex-column gap-2 w-75">
                <label for="name" class="text-secondary">Наименование крепления</label>
                <input id="name" name="name" minlength="3" maxlength="255" class="form-control" value="{{ $object->name }}"/>
                @error('name')
                    <small id="name-help">
                        <span class="text-danger">{{ $message }}</span>
                    </small>
                @enderror
            </div>
            <div class="mt-3">
                <div class="form-group">
                    <button class="btn btn-warning" type="submit">Изменить</button>
                </div>
            </div>
        </form>
    </section>
</div>
@endsection
