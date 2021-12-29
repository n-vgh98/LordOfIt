<?php

namespace App\Http\Controllers\Front;

use App\Models\Lang;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Course;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $lang = substr($request->getPathInfo(), 1, 2);
        $languages = Lang::where([["langable_type", "App\Models\Course"], ["name", $lang]])->get();
        $languagesarticles = Lang::where([["langable_type", "App\Models\Article"], ["name", $lang]])->get();
        $sliderlanguages = Lang::where([["langable_type", "App\Models\CourseSlider"], ["name", $lang]])->get();
        return view("front.amoozesh.all", compact("languages", "sliderlanguages", "languagesarticles"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($lang, $id)
    {
        $course = Course::find($id);
        $languages = Lang::where([["langable_type", "App\Models\Course"], ["name", $lang]])->get();
        $comments = Comment::where([["commentable_type", "App\Models\Course"], ["commentable_id", $id], ["parent_id", null], ["status", 1]])->get();
        return view("front.amoozesh.index", compact("course", "languages", "comments"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
