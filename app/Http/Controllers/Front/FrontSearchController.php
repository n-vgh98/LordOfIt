<?php

namespace App\Http\Controllers\Front;

use App\Models\Lang;
// use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Article;

Illuminate\Support\Facades\Input::class;
use Illuminate\Support\Facades\Request;


class FrontSearchController extends Controller
{
    public function searchTitle(Request $request,$lang)
    {
        $query = Request::get('title');
        // $languages = Lang::where([["langable_type", "App\Models\Article"], ["name", $lang]])->first();
        $articles = Article::where('title','like',"%" .$query. "%")
        ->where('status','1')
        ->orderBy('created_at','desc')
        ->paginate(3);
        // $article->increment('views');
        return view('front.search', compact(['articles','query']));
    }
}
