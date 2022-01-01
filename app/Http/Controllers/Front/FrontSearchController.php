<?php

namespace App\Http\Controllers\Front;

use App\Models\Lang;
// use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Course;
use App\Models\Service;

Illuminate\Support\Facades\Input::class;
use Illuminate\Support\Facades\Request;


class FrontSearchController extends Controller
{
    public function searchTitle(Request $request,$lang)
    {
        $query = Request::get('title');
        $articles = Article::where('title','like',"%" .$query. "%")
        ->where('status','1')
        ->orderBy('created_at','desc')
        ->paginate(3);

        $services = Service::with('category')
        ->where('title','like',"%" .$query. "%")
        ->orderBy('created_at','desc')
        ->paginate(3);

        $cources = Course::where('name','like',"%" .$query. "%")
        ->orderBy('created_at','desc')
        ->paginate(3);
        return view('front.search', compact(['articles','query','services','cources']));
    }
}
