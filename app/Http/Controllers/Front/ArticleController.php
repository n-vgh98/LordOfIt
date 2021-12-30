<?php

namespace App\Http\Controllers\Front;

use App\Models\Lang;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ArticleController extends Controller
{
    public function index($lang)
    {
        $languages = Lang::where([["langable_type", "App\Models\Article"], ["name", $lang]])->get();
        return view('front.articles.index', compact('languages'));
    }

    public function show($lang)
    {
        $languages = Lang::where([["langable_type", "App\Models\Article"], ["name", $lang]])->first();
        $article = $languages->langable;
        return view('front.articles.detail', compact(['article']));
    }
}
