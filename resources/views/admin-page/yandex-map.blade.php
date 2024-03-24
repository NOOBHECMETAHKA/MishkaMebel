@extends('layouts.admin')

@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-secondary">Управление картами</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item">Управление картами</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <section class="content">
            <div class="card w-75">
                <div class="card-header">
                    <h5 class="text-secondary">Текущее местоположение</h5>
                    <span class="text-secondary">Для создания собственной карты перейдите по следующей ссылке: <a href="https://yandex.ru/map-constructor">конструктор карт Яндекса</a></span>
                </div>
                <div class="card-body">
                    <iframe
                        src="{{ $map ? $map['mapYandexSRC'] : env('MAP_YANDEX_MAP_SRC') }}"
                        width="100%"
                        height="400"
                        frameborder="0">
                    </iframe>
                </div>
                <div class="card-footer">
                    <form action="{{ route('admin-page.view.map-yandex-settings.store') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label class="text-secondary">Ссылка на карты</label>
                            <textarea
                                name="mapYandexSRC"
                                style="min-height: 50px; max-height: 150px"
                                class="form-control @error('mapYandexSRC') is-invalid @enderror"
                                rows="3"
                                placeholder="https://yandex.ru/map-widget/v1/?um=constructor%3A7b353c58d75f9ab6a991ba16baf2643bdded2acf4eb7bbced135e2f5a338aad8&amp;source=constructor"></textarea>
                            @error('mapYandexSRC')
                                <small class="text-danger">{{ str_replace('mapYandexSRC', 'ссылка на карты', $message) }}</small>
                            @enderror
                        </div>
                        <div>
                            <button type="submit" class="btn btn-warning">Сохранить</button>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </div>
@endsection
