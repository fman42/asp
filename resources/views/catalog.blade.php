@extends('layouts.app')

@section('content')
    <div class="container">
        <h2 class="mb-5">Каталог</h2>
        <div class="row">
            @foreach ($articles as $article)
                @include('components.preview_article', ['article' => $article])
            @endforeach
        </div>
        {{ $articles->links('components.pagination') }}
    </div>
@endsection