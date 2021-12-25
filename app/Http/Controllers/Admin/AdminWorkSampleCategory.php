<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\WorkSampleCategory;
use Illuminate\Http\Request;

class AdminWorkSampleCategory extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = WorkSampleCategory::all();
        return view("admin.work_samples.category.index", compact("categories"));
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
        return redirect()->back()->with("success", "دسته بندی شما با موفقیت حذف شد");
    }
}
