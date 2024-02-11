@extends('layouts.admin')

@section('content')
<div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-secondary">Добавление столов</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="/">Главная</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('admin-page.panel.view', ['page' => 'table']) }}">Столы</a></li>
                            <li class="breadcrumb-item active">Форма создания</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <section class="content">
            <form action="{{ route('admin.table.store') }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="tables_materials_id" class="fw-bold text-secondary">Материал</label>
                    <select name="tables_materials_id" id="tables_materials_id" class="form-control">
                        @foreach(\App\Models\Material::all()->where('appointment', \App\Models\Material::$appointment[1]) as $materials)
                            <option
                                @if(old('tables_materials_id') == $materials->id) selected @endif
                            value="{{ $materials->id }}">{{ $materials->name }}</option>
                        @endforeach
                    </select>
                    @error('tables_materials_id')
                        <span class="error text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="tables_furniture_dimensions_id" class="fw-bold text-secondary">Габариты кровати</label>
                    <select name="tables_furniture_dimensions_id" id="tables_furniture_dimensions_id" class="form-control">
                        @foreach(\App\Models\FurnitureDimensions::all() as $furnitureDimensions)
                            <option
                                @if(old('tables_furniture_dimensions_id') == $furnitureDimensions->id) selected @endif
                            value="{{ $furnitureDimensions->id }}">{{ round($furnitureDimensions->length) }} сантиметров на {{ round($furnitureDimensions->width) }} сантиметров на {{ round($furnitureDimensions->height) }}</option>
                        @endforeach
                    </select>
                    @error('tables_furniture_dimensions_id')
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
