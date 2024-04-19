@extends('layouts.admin')

@section('content')
<div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-secondary">Добавление хранилища вещей</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="/">Главная</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('admin-page-content.panel.view', ['page' => 'furniture-storage']) }}">Кровати</a></li>
                            <li class="breadcrumb-item active">Форма создания</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <section class="content">
            <form action="{{ route('admin.furniture-storage.store') }}" method="post">
                @csrf

                <div class="form-group">
                    <label for="type-mattress" class="fw-bold text-secondary">Тип хранилища</label>
                    <select name="type" id="type-mattress" class="form-control" >
                        @foreach(\App\Models\FurnitureStorage::$type as $type)
                            <option value="{{ $type }}" @selected(old('type') == $type)>{{ $type }}</option>
                        @endforeach
                    </select>
                    @error('type')
                        <span class="error text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="furniture_storages_furniture_dimensions_id" class="fw-bold text-secondary">Габариты кровати</label>
                    <select name="furniture_storages_furniture_dimensions_id" id="furniture_storages_furniture_dimensions_id" class="form-control">
                        @foreach(\App\Models\FurnitureDimensions::all() as $furnitureDimensions)
                            <option
                                @if(old('furniture_storages_furniture_dimensions_id') == $furnitureDimensions->id) selected @endif
                            value="{{ $furnitureDimensions->id }}">{{ round($furnitureDimensions->length) }} сантиметров на {{ round($furnitureDimensions->width) }} сантиметров на {{ round($furnitureDimensions->height) }} сантиметров</option>
                        @endforeach
                    </select>
                    @error('furniture_storages_furniture_dimensions_id')
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
