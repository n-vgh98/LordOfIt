<?php

namespace App\Http\Controllers\Front;

use App\Models\Lang;
use App\Models\AboutUs;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AboutUsController extends Controller
{
    public function index($lang){

        $laqnguage = Lang::where([["langable_type", "App\Models\AboutUs"], ["name", $lang]])->first();
        $about_us=$laqnguage->langable;
        return view('front.about_us',compact('about_us'));
    }
}
