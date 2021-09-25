<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
        </style>
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="#">Logo</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item {{ Route::currentRouteName() == 'index' ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('index') }}">Главная</span></a>
                    </li>
                    <li class="nav-item {{ Route::currentRouteName() == 'catalog' || Route::currentRouteName() == 'article' ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('catalog') }}">Каталог статей</a>
                    </li>
                </ul>
            </div>
        </nav>
        <div class="relative items-top min-h-screen bg-gray-100 dark:bg-gray-900 py-4 sm:pt-0">
            @yield('content')
        </div>
    </body>
    @include('layouts.footer_js')
</html>
