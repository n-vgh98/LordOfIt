<?php

namespace App\Http\Controllers\Front;

use App\Models\Lang;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ArticleController extends Controller
{
    public function index($lang){
        $laqnguage = Lang::where([["langable_type", "App\Models\Article"], ["name", $lang]])->get();
        $articles=$laqnguage->langable;
        return view('front.articles.index',compact('articles'));
    }
}
