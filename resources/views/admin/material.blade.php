@extends('layouts.admin')

@section('content')
<div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-secondary">Материалы</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="/">Главная</a></li>
                            <li class="breadcrumb-item active">Материалы</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <section class="content">
            <div id="app">
                <material-list></material-list>
            </div>
        </section>
    </div>
@endsection
