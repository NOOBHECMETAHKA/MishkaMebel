@extends('layouts.admin')

@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-secondary">Консоль разработчика</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="/">Главная</a></li>
                            <li class="breadcrumb-item active">Консоль разработчика</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <section class="content">
            <form class="form-group" action="{{ route('admin-page.view.developer-console.destroy') }}" method="post">
                @csrf
                <button class="btn btn-danger" type="submit">Отчистить историю</button>
            </form>
            <div class="card w-75">
                <h5 class="card-header text-secondary">История</h5>
                <div class="card-body">
                    <pre class="p-0 m-0 fs-4" style="max-height: 300px; overflow-x: hidden; overflow-y: scroll;">{{ str_replace('local.INFO', 'информирование', $logs) }}</pre>
                </div>
            </div>
        </section>
    </div>
@endsection
