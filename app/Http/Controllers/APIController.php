<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCommentRequest;
use App\Http\Requests\IncrementFieldRequest;
use App\Services\ArticleStatStorage\{LikeStorage, ViewStorage};
use App\Jobs\{MakeCommentArticle, SyncLikesArticle, SyncViewersArticle};

class APIController extends Controller
{
    public function incrementLike(IncrementFieldRequest $request)
    {
        $request->validated();
        $storage = new LikeStorage($request->article_id);
        $storage->incrementField();

        dispatch(new SyncLikesArticle());
        return response()->json(['count' => $storage->fetchElements()]);
    }

    public function incrementView(IncrementFieldRequest $request)
    {
        $request->validated();
        $storage = new ViewStorage($request->article_id);
        $storage->incrementField();

        dispatch(new SyncViewersArticle());
        return response()->json(['count' => $storage->fetchElements()]);
    }

    public function makeComment(CreateCommentRequest $request)
    {
        $request->validated();
        dispatch(new MakeCommentArticle($request->article_id, $request->subject, $request->body));

        return $this->sendSuccessResponse([]);
    }
}
