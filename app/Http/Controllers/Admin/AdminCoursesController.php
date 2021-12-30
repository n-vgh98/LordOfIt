<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Image;
use App\Models\Lang;
use Illuminate\Http\Request;

class AdminCoursesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($lang)
    {

        $languages = Lang::where([["name", $lang], ["langable_type", "App\Models\Course"]])->get();
        return view("admin.courses.index", compact("languages", "lang"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($lang)
    {
        return view("admin.courses.create", compact("lang"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $course = new Course();
        $course->name = $request->name;
        $course->type = $request->type;
        $course->level = $request->level;
        $course->section = $request->section;
        $course->pre_need = $request->pre_need;
        $course->price = $request->price;
        $course->lang = $request->language;
        $course->description = $request->description;
        $course->meta_description = $request->meta_description;
        $course->meta_keywords = $request->meta_keywords;
        $course->topic_list = $request->topic_list;
        $course->save();

        // saving course image
        $image = new Image();
        $image->name = $request->img_name;
        $image->alt = $request->alt;
        $image->uploader_id = auth()->user()->id;
        $imagename = time() . "." . $request->path->extension();
        $request->path->move(public_path("images/courses/section/"), $imagename);
        $image->path = "images/courses/section/" . $imagename;
        $course->image()->save($image);

        // saving language for course
        $language = new Lang();
        $language->name = $request->lang;
        $course->language()->save($language);
        return redirect()->route("admin.courses.index", $request->lang)->with("success", "دوره شما با موفقیت ثبت شد");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $course = Course::find($id);
        return view("admin.courses.edit", compact("course"));
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
        $course = Course::find($id);
        $course->name = $request->name;
        $course->type = $request->type;
        $course->level = $request->level;
        $course->section = $request->section;
        $course->pre_need = $request->pre_need;
        $course->price = $request->price;
        $course->lang = $request->lang;
        $course->description = $request->description;
        $course->topic_list = $request->topic_list;
        $course->meta_keywords = $request->meta_keywords;
        $course->topic_list = $request->topic_list;
        $course->save();
        return redirect()->route("admin.courses.index", $course->language->name)->with("success", "دوره شما با موفقیت ثبت شد");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $courses = Course::find($id);
        unlink($courses->image->path);
        $courses->language()->delete();
        $courses->delete();
        return redirect()->back()->with("success", "دوره مورد نظر با موفقیت حذف شد");
    }

    public function updateimage(Request $request, $id)
    {
        $image = Image::find($id);
        $image->name = $request->name;
        $image->alt = $request->alt;
        if ($request->path !== null) {
            unlink($image->path);
            $imagename = time() . "." . $request->path->extension();
            $request->path->move(public_path("images/courses/section/"), $imagename);
            $image->path = "images/courses/section/" . $imagename;
        }
        $image->save();
        return redirect()->back()->with("success", "عکس دوره  با موفقیت ویرایش شد");
    }
}
