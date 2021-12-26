<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Lang;
use App\Models\ServicePriceCategory;
use Illuminate\Http\Request;

class AdminServicePriceCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($lang)
    {
        $languages = Lang::where([["langable_type", "App\Models\ServicePriceCategory"], ["name", $lang]])->get();
        return view("admin.serviceprices.categories.index", compact("languages", "lang"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($lang)
    {
        return view("admin.serviceprices.categories.create", compact("lang"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $category = new ServicePriceCategory();
        $category->title = $request->title;
        if ($request->text !== null) {
            $category->text = $request->text;
        }
        $category->save();

        // saving language for course
        $language = new Lang();
        $language->name = $request->lang;
        $category->language()->save($language);

        return redirect()->route("admin.services.price.category.index", $request->lang)->with("success", 'دسته بندی شما با موفقیت اضافه شد');
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
        $category = ServicePriceCategory::find($id);
        return view("admin.serviceprices.categories.edit", compact("category"));
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
        $category = ServicePriceCategory::find($id);
        $category->title = $request->title;
        if ($request->text !== null) {
            $category->text = $request->text;
        }
        $category->save();
        return redirect()->route("admin.services.price.category.index")->with("success", 'دسته بندی شما با موفقیت اضافه شد');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = ServicePriceCategory::find($id);
        $category->delete();
        $category->language()->delete();
        return redirect()->back()->with("success", 'دسته بندی شما با موفقیت حذف شد');
    }
}
