<?php

namespace App\Http\Controllers\Front;

use App\Models\Lang;
use App\Models\Comment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Article;

class ArticleController extends Controller
{
    public function index($lang)
    {
        $languages = Lang::where([["langable_type", "App\Models\Article"], ["name", $lang]])->get();
        return view('front.articles.index', compact('languages'));
    }

    public function show($lang, $id)
    {

        $languages = Lang::where([["langable_type", "App\Models\Article"], ["name", $lang]])->first();
        $article = Article::findOrFail($id);
        $article = $languages->langable;
        $comments = Comment::where([["commentable_type", "App\Models\Article"], ["commentable_id", $id], ["parent_id", null], ["status", 1]])->get();


        return view('front.articles.detail', compact(['comments', 'article']));
    }
}
