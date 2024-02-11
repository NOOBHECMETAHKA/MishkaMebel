@extends('layouts.admin')

@section('content')
<div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-secondary">Добавление чехлов</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="/">Главная</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('admin-page.panel.view', ['page' => 'mattress-cover']) }}">Чехлы</a></li>
                            <li class="breadcrumb-item active">Форма создания</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <section class="content">

            <form action="{{ route('admin.mattress-cover.store') }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="function" class="fw-bold text-secondary">Функция</label>
                    <input name="function" type="text" class="form-control" id="function" placeholder="Функция" required>
                    @error('function')
                        <span class="error text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="mattress_fastenings_id" class="fw-bold text-secondary">Крепление</label>
                    <select name="mattress_fastenings_id" id="mattress_fastenings_id" class="form-control">
                        @foreach(\App\Models\MattressFastening::all() as $mattressFastening)
                            <option
                                @if(old('mattress_fastenings_id') == $mattressFastening->id) selected @endif
                            value="{{ $mattressFastening->id }}">{{ $mattressFastening->name }}</option>
                        @endforeach
                    </select>
                    @error('mattress_covers_furniture_sizes_id')
                        <span class="error text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="mattress_covers_furniture_sizes_id" class="fw-bold text-secondary">Размеры кровати</label>
                    <select name="mattress_covers_furniture_sizes_id" id="mattress_covers_furniture_sizes_id" class="form-control">
                        @foreach(\App\Models\FurnitureSize::all() as $furnitureSize)
                            <option
                                @if(old('bed_furniture_sizes_id') == $furnitureSize->id) selected @endif
                            value="{{ $furnitureSize->id }}">{{ round($furnitureSize->length) }} сантиметров на {{ round($furnitureSize->width) }} сантиметров</option>
                        @endforeach
                    </select>
                    @error('mattress_covers_furniture_sizes_id')
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
