<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Lang;
use App\Models\WorkSampleCategory;
use Illuminate\Http\Request;

class AdminWorkSampleCategory extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($lang)
    {
        $languages = Lang::where([["langable_type", "App\Models\WorkSampleCategory"], ["name", $lang]])->get();

        return view("admin.work_samples.category.index", compact("languages", "lang"));
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

        $category = new WorkSampleCategory();
        $category->title = $request->title;
        if ($request->text !== null) {
            $category->text = $request->text;
        }
        $category->save();

        // saving language for course
        $language = new Lang();
        $language->name = $request->lang;
        $category->language()->save($language);

        return redirect()->back()->with("success", "دسته بندی شما با موفقیت ساخته شد");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $category = WorkSampleCategory::find($id);
        return view("admin.work_samples.category.show", compact("category"));
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
        $category = WorkSampleCategory::find($id);
        $category->title = $request->title;
        if ($request->text !== null) {
            $category->text = $request->text;
        }
        $category->save();
        return redirect()->back()->with("success", "دسته بندی شما با موفقیت ویرایش شد");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = WorkSampleCategory::find($id);
        $category->delete();
        $category->language()->delete();
        return redirect()->back()->with("success", "دسته بندی شما با موفقیت حذف شد");
    }
}
