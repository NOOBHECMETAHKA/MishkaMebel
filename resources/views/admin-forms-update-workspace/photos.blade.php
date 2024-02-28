@extends('layouts.admin')

@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-secondary">Установка фотографий товару</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="/">Главная</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('admin-page-workspace.panel.view', ['page' => 'photos']) }}">Галерея изображений</a></li>
                            <li class="breadcrumb-item active">Форма изменения</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <section class="content">
            <form action="{{ route('admin-page-workspace.panel.update.photos', ['id' => $object->id]) }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label class="form-label text-secondary">Товар</label>
                    <table class="table table-bordered w-75">
                        <tbody>
                        <tr>
                            <td>Наименование</td>
                            <td>{{ $object->name }}</td>
                        </tr>
                        <tr>
                            <td>Описание</td>
                            <td>{{ $object->description }}</td>
                        </tr>
                        <tr>
                            <td>Гарантия</td>
                            <td>{{ $object->guarantee }}</td>
                        </tr>
                        <tr>
                            <td>Цена</td>
                            <td>{{ $object->price }} рублей</td>
                        </tr>
                        <tr>
                            <td>Категория</td>
                            <td>{{ \App\Models\Product::$category[$object->category] }}</td>
                        </tr>
                        </tbody>
                    </table>
                </div>

                <div class="form-group">
                    <label for="imagesInput" class="form-label text-secondary">Загрузите изображения</label>
                    <div class="mt-1">
                        <input type="file" name="image[]" accept="image/*" multiple>
                    </div>
                    @error('image')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-success">Добавить</button>
                </div>
            </form>
        </section>
    </div>
@endsection
