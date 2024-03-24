@extends('layouts.admin')

@section('content')
<div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-secondary">Изменение кровати</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="/"></a>Главная</li>
                            <li class="breadcrumb-item"><a href="{{ route('admin-page-content.panel.view', ['page' => 'bed']) }}">Кровати</a></li>
                            <li class="breadcrumb-item active">Форма изменения</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <section class="content">
            <form action="{{ route('admin-page-content.panel.update.bed', ['id' => $object->id]) }}" method="post" class="m-3">
            @csrf
                <div class="form-group">
                    <label for="type-bed" class="fw-bold text-secondary">Тип кровати</label>
                    <select name="type" id="type-bed" class="form-control" >
                        @foreach(\App\Models\Bed::$typeBed as $type)
                            @if($object->type  == $type) selected @endif
                            <option value="{{ $type }}">{{ $type }}</option>
                        @endforeach
                    </select>
                    @error('type')
                        <span class="error text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="bade-base" class="fw-bold text-secondary">Основания кровати</label>
                    <select name="beds_bases_id" id="bade-base" class="form-control">
                        @foreach(\App\Models\BedBase::all() as $bedBases)
                            <option
                                @if($object->beds_bases_id == $bedBases->id) selected @endif
                            value="{{ $bedBases->id }}">{{ $bedBases->name }}</option>
                        @endforeach
                    </select>
                    @error('beds_bases_id')
                        <span class="error text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="materials" class="fw-bold text-secondary">Материал</label>
                    <select name="beds_materials_id" id="materials" class="form-control">
                        @foreach(\App\Models\Material::all()->where('appointment', \App\Models\Material::$appointment[1]) as $materials)
                            <option
                                @if($object->beds_materials_id == $materials->id) selected @endif
                            value="{{ $materials->id }}">{{ $materials->name }}</option>
                        @endforeach
                    </select>
                    @error('beds_materials_id')
                        <span class="error text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="furnitureSize" class="fw-bold text-secondary">Размеры кровати</label>
                    <select name="bed_furniture_sizes_id" id="furnitureSize" class="form-control">
                        @foreach(\App\Models\FurnitureSize::all() as $furnitureSize)
                            <option
                                @if($object->bed_furniture_sizes_id == $furnitureSize->id) selected @endif
                            value="{{ $furnitureSize->id }}">{{ round($furnitureSize->length) }} сантиметров на {{ round($furnitureSize->width) }} сантиметров</option>
                        @endforeach
                    </select>
                    @error('bed_furniture_sizes_id')
                        <span class="error text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <div class="form-check">
                        <input name="have_boxes[]" type="checkbox" class="form-check-input" @checked($object->have_boxes)>
                        <label class="form-check-label text-secondary">Наличие ящиков</label>
                    </div>
                    @error('have_boxes')
                        <span class="error text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-warning">Изменить</button>
                </div>
            </form>
        </section>
</div>
@endsection
