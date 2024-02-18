@extends('layouts.admin')

@section('content')
<div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-secondary">Изменение матраса</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="/">Главная</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('admin-page-content.panel.view', ['page' => 'mattress']) }}">Матрасы</a></li>
                            <li class="breadcrumb-item active">Форма изменения</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <section class="content">
            <form action="{{ route('admin-page-content.panel.update.mattress', ['id' => $object->id]) }}" method="post" class="m-3">
                @csrf
                <div class="form-group">
                    <label for="type-mattress" class="fw-bold text-secondary">Тип матраса</label>
                    <select name="type" id="type-mattress" class="form-control" >
                        @foreach(\App\Models\Mattress::$mattressType as $type)
                            <option value="{{ $type }}" @selected($object->type == $type)>{{ $type }}</option>
                        @endforeach
                    </select>
                    @error('type')
                        <span class="error text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="age_category" class="fw-bold text-secondary">Возростная категория</label>
                    <select name="age_category" id="age_category" class="form-control" >
                        @foreach(\App\Models\Mattress::$ageСategory as $ageCategory)
                            <option value="{{ $ageCategory }}" @selected($object->age_category == $ageCategory)>{{ $ageCategory }}</option>
                        @endforeach
                    </select>
                    @error('age_category')
                        <span class="error text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="hardness" class="fw-bold text-secondary">Жёсткость</label>
                    <select name="hardness" id="hardness" class="form-control" >
                        @foreach(\App\Models\Mattress::$hardness as $hardness)
                            <option value="{{ $hardness }}" @selected($object->hardness == $hardness)>{{ $hardness }}</option>
                        @endforeach
                    </select>
                    @error('hardness')
                    <span class="error text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="mattresses_materials_id" class="fw-bold text-secondary">Метериалы</label>
                    <select name="mattresses_materials_id" id="mattresses_materials_id" class="form-control">
                        @foreach(\App\Models\Material::all()->where('appointment', \App\Models\Material::$appointment[0]) as $materials)
                            <option
                                @selected($object->mattresses_materials_id == $materials->id)
                            value="{{ $materials->id }}">{{ $materials->name }}</option>
                        @endforeach
                    </select>
                    @error('mattresses_materials_id')
                        <span class="error text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="mattresses_furniture_sizes_id" class="fw-bold text-secondary">Размеры матраса</label>
                    <select name="mattresses_furniture_sizes_id" id="mattresses_furniture_sizes_id" class="form-control">
                        @foreach(\App\Models\FurnitureSize::all() as $furnitureSize)
                            <option
                                @selected($object->mattresses_furniture_sizes_id == $furnitureSize->id)
                            value="{{ $furnitureSize->id }}">{{ round($furnitureSize->length) }} сантиметров на {{ round($furnitureSize->width) }} сантиметров</option>
                        @endforeach
                    </select>
                    @error('mattresses_furniture_sizes_id')
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
