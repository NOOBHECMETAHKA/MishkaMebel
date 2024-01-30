<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=alatsi:400" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body>
    <div class="container-md">
        <div class="w-100 d-flex flex-column">
            <div class="mt-3 w-100 d-flex justify-content-between align-items-center">
                <img style="width: 60px;" src="{{ asset('image/svg/Bear.svg') }}" alt="">
                <div class="d-flex flex-row gap-3">
                    <h1 class="p-0 m-0">Мишка мебель</h1>
                </div>
                <span class="text-center">Личный кабинет</span>
            </div>
            <div class="mt-3 d-flex flex-row justify-content-between align-items-center">
                <div>
                    <h4 class="fw-bold fs-1">8 929 578-70-08</h4>
                </div>
                <div class="input-group w-50">
                    <input type="text" class="form-control" placeholder="Поиск по сайту">
                    <button type="submit" class="btn btn-primary">Найти</button>
                </div>
                <div class="d-flex flex-row gap-3 m-0">
                    <div class="position-relative">
                        <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="currentColor" class="bi bi-heart-fill" viewBox="0 0 16 16" color="#485159">
                            <path fill-rule="evenodd" d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314"/>
                        </svg>
                        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                            99+
                            <span class="visually-hidden">unread messages</span>
                        </span>
                    </div>
                    <div class="position-relative">
                        <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="currentColor" class="bi bi-basket-fill" viewBox="0 0 16 16" color="#485159">
                            <path d="M5.071 1.243a.5.5 0 0 1 .858.514L3.383 6h9.234L10.07 1.757a.5.5 0 1 1 .858-.514L13.783 6H15.5a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-.5.5H15v5a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V9H.5a.5.5 0 0 1-.5-.5v-2A.5.5 0 0 1 .5 6h1.717zM3.5 10.5a.5.5 0 1 0-1 0v3a.5.5 0 0 0 1 0zm2.5 0a.5.5 0 1 0-1 0v3a.5.5 0 0 0 1 0zm2.5 0a.5.5 0 1 0-1 0v3a.5.5 0 0 0 1 0zm2.5 0a.5.5 0 1 0-1 0v3a.5.5 0 0 0 1 0zm2.5 0a.5.5 0 1 0-1 0v3a.5.5 0 0 0 1 0z"/>
                        </svg>
                        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                            99+
                            <span class="visually-hidden">unread messages</span>
                        </span>
                    </div>
                </div>
            </div>
            <nav class="navbar navbar-expand-lg bg-body-tertiary w-100">
                <ul class="mt-3 navbar-nav d-flex justify-content-between w-100">
                    <li class="nav-item"><a class="fs-3 nav-link" href="">Матрасы</a></li>
                    <li class="nav-item"><a class="fs-3 nav-link" href="">Столы</a></li>
                    <li class="nav-item"><a class="fs-3 nav-link" href="">Кровати</a></li>
                    <li class="nav-item"><a class="fs-3 nav-link" href="">Чехлы</a></li>
                    <li class="nav-item"><a class="fs-3 nav-link" href="">Шкафы</a></li>
                    <li class="nav-item"><a class="fs-3 nav-link" href="">Тумбочки</a></li>
                </ul>
            </nav>
        </div>
    </div>
    <hr>
    <main class="py-4">
        @yield('content')
    </main>
</body>
</html>

