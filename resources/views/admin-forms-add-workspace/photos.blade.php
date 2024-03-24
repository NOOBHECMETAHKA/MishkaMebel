@extends('layouts.admin')

@section('content')
<div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-secondary">Добавление фотографии</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="/">Главная</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('admin-page-content.panel.view', ['page' => 'photos']) }}">Фотографии</a></li>
                            <li class="breadcrumb-item active">Форма создания</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <section class="content">
            <form action="{{ route('admin.photos.store') }}" method="post" enctype="multipart/form-data">
                @csrf

                @if(count(\App\Models\Product::all()) > 0)
                <div class="form-group">
                    <label for="imagesInput" class="form-label text-secondary">Товар</label>
                    <select name="product_photo_id" class="form-control">
                        @foreach(\App\Models\Product::all() as $product)
                            <option value="{{ $product->id }}">{{ $product->name }}</option>
                        @endforeach
                    </select>
                </div>
                @else
                    <div class="alert alert-warning">
                        <h5 class="alert-heading">Предупреждение!</h5>
                        <span>Товары в ассортименте отсуствуют!</span>
                    </div>
                @endif

                <div class="form-group">
                    <label for="imagesInput" class="form-label text-secondary">Выберите изображения</label>
                    <div class="mt-1">
                        <input type="file" name="image[]" accept="image/*" multiple>
                    </div>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-success">Добавить</button>
                </div>
            </form>
        </section>
</div>
@endsection
