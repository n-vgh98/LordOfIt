<?php

namespace App\Http\Controllers\Front;

use App\Models\Lang;
use App\Models\AboutUs;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AboutUsController extends Controller
{
    public function index($lang){

        $languages = Lang::where([["langable_type", "App\Models\AboutUs"], ["name", $lang]])->get();
        return view('front.about_us',compact('languages'));
    }
}
