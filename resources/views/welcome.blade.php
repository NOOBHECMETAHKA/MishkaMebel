@extends('layouts.default')

@section('content')
    <div id="app">
    </div>
    <div class="card-body">
        <iframe
            src="{{ $map ? $map['mapYandexSRC'] : env('MAP_YANDEX_MAP_SRC') }}"
            width="100%"
            height="400"
            frameborder="0">
        </iframe>
    </div>
@endsection
