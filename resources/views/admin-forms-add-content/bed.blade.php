@extends('layouts.admin')

@section('content')
<div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-secondary">Добавление кроватей</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="/">Главная</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('admin-page-content.panel.view', ['page' => 'bed']) }}">Кровати</a></li>
                            <li class="breadcrumb-item active">Форма создания</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <section class="content">
            <form action="{{ route('admin.bed.store') }}" method="post" class="m-3">
                @csrf
                <div class="form-group">
                    <label for="type-bed" class="fw-bold text-secondary">Тип кровати</label>
                    <select name="type" id="type-bed" class="form-control" >
                        @foreach(\App\Models\Bed::$typeBed as $type)
                            <option value="{{ $type }}" @selected(old('type') == $type)>{{ $type }}</option>
                        @endforeach
                    </select>
                    @error('type')
                        <span class="error text-danger">{{ str_replace('type', 'тип', $message) }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="bade-base" class="fw-bold text-secondary">Основания кроватей</label>
                    <select name="beds_bases_id" id="bade-base" class="form-control">
                        @foreach(\App\Models\BedBase::all() as $bedBases)
                            <option
                                @if(old('beds_bases_id') == $bedBases->id) selected @endif
                                value="{{ $bedBases->id }}">{{ $bedBases->name }}</option>
                        @endforeach
                    </select>
                    @error('beds_bases_id')
                        <span class="error text-danger">{{ str_replace('beds_bases_id', 'основание кровати', $message) }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="materials" class="fw-bold text-secondary">Метериалы</label>
                    <select name="beds_materials_id" id="materials" class="form-control">
                        @foreach(\App\Models\Material::all()->where('appointment', \App\Models\Material::$appointment[1]) as $materials)
                            <option
                                @if(old('beds_materials_id') == $materials->id) selected @endif
                                value="{{ $materials->id }}">{{ $materials->name }}</option>
                        @endforeach
                    </select>
                    @error('beds_materials_id')
                        <span class="error text-danger">{{ str_replace('beds_materials_id', 'материал', $message) }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="furnitureSize" class="fw-bold text-secondary">Размеры кровати</label>
                    <select name="bed_furniture_sizes_id" id="furnitureSize" class="form-control">
                        @foreach(\App\Models\FurnitureSize::all() as $furnitureSize)
                            <option
                                @if(old('bed_furniture_sizes_id') == $furnitureSize->id) selected @endif
                                value="{{ $furnitureSize->id }}">{{ round($furnitureSize->length) }} сантиметров на {{ round($furnitureSize->width) }} сантиметров</option>
                        @endforeach
                    </select>
                    @error('bed_furniture_sizes_id')
                        <span class="error text-danger">{{ str_replace('bed_furniture_sizes_id', 'размеры', $message) }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <div class="form-check">
                        <input name="have_boxes[]" type="checkbox" class="form-check-input"  value="{{ old('have_boxes') }}">
                        <label class="form-check-label text-secondary">Наличие ящиков</label>
                    </div>
                    @error('have_boxes')
                        <span class="error text-danger">{{ str_replace('have boxes', 'наличие ящиков', $message) }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-success">Добавить</button>
                </div>
            </form>
        </section>
</div>
@endsection
