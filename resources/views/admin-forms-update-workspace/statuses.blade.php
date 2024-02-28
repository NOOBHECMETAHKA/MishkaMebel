@extends('layouts.admin')

@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-secondary">Изменение статуса</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="/">Главная</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('admin-page-workspace.panel.view', ['page' => 'statuses']) }}">Статусы</a></li>
                            <li class="breadcrumb-item active">Форма изменения</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <section class="content">
            <form action="{{ route('admin-page-workspace.panel.update.statuses', ['id' => $object->id]) }}" method="post">
                @csrf
                <div class="form-group">
                    <label class="text-secondary">Описание</label>
                    <textarea name="description" class="form-control" rows="3" placeholder="Описание статуса" style="height: 207px; max-height: 300px">{{ $object->description }}</textarea>
                    @error('description')
                    <span class="error text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <div class="form-check">
                        <input name="is_deleted[]" type="checkbox" class="form-check-input"  value="{{ old('is_deleted') }}">
                        <label class="form-check-label text-secondary">Заблокировать?</label>
                    </div>
                    @error('is_deleted')
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
