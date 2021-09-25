@extends('layouts.app')

@section('content')
    <div class="container">
        <h2 class="mb-5">Главная страница</h2>
        <div class="row">
            @foreach ($articles as $article)
                <div class="col-3">
                    @include('components.preview_article', ['article' => $article])
                </div>
            @endforeach
        </div>
    </div>
@endsection