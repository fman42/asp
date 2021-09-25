<div class="mb-5">
    <img src="https://via.placeholder.com/150">
    <h2>{{ $article->subject }}</h2>
    <article>
        <p>{{ substr($article->content, 0, 100) }}...</p>
    </article>
    <a href="{{ route('article', ['article_id' => $article->id]) }}">Перейти</a>
</div>