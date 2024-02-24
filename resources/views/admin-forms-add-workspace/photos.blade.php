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
{{--            <form action="{{ route('') }}" method="post" class="m-3">--}}
{{--                @csrf--}}

{{--                <div class="form-group">--}}
{{--                    <button type="submit" class="btn btn-success">Добавить</button>--}}
{{--                </div>--}}
{{--            </form>--}}
        </section>
</div>
@endsection
