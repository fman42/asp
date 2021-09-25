@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>{{ $article->subject }}</h2>
        <img src="https://via.placeholder.com/300">
        <p>{{ $article->content }}</p>
        <p>Тэги:</p>
        @foreach ($article->tags as $tag)
            <button class="btn">{{ $tag->tag }}</button>
        @endforeach
        <p class="mt-3">Лайки: <button class="btn" id="like">Лайк</button><button class="btn btn-danger ml-2" id="like_count">{{ $article->stats->likes_count }}</button></p>
        <p>Просмотры: <b id="viewers_count">{{ $article->stats->viewers_count }}</b></p>
        <p>Оставить комментарий</p>
        <form id="comment_container">
            <input text="" class="form-control" id="subject" placeholder="Тема сообщения"><br>
            <textarea id="content" class="form-control" placeholder="Текст сообщения"></textarea>
            <button id="send_comment" class="btn btn-success mt-2" type="button">Оставить отзыв</button>
        </form>
        <input type="hidden" id="article_id" value="{{ $article->id }}"><br>
    </div>
@endsection