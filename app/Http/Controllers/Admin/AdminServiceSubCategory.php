<?php

namespace App\Http\Controllers\Admin;

use App\Models\Lang;
use Illuminate\Http\Request;
use App\Models\ServiceCategory;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class AdminServiceSubCategory extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($lang)
    {
        $languages = Lang::where([["langable_type", "App\Models\ServiceCategory"], ["name", $lang]])->get();
        // dd($languages[0]->langable);
        $categories = array();
        foreach ($languages as $language) {
            array_push($categories, $language->langable);
        }
        return view('admin.services.sub_categories.index', compact('languages', 'lang','categories'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $subcategory = new ServiceCategory();
        $subcategory->title  = $request->title;
        $subcategory->slug= $request->input('slug');
        if ($request->input('slug')){
            $subcategory->slug =make_slug( $request->input('slug'));
        }else{
            $subcategory->slug = make_slug($request->input('title'));
        }
        $subcategory->meta_description  = $request->meta_description;
        $subcategory->meta_keywords  = $request->meta_keywords;
        $subcategory->parent_id = $request->category;
        $subcategory->save();

        // saving language for category
        $language = new Lang();
        $language->name = $request->lang;
        $subcategory->language()->save($language);

        Session::flash('add_servise_categroy','دسته بندی جدید با موفقیت ثبت شد');
        return redirect()->route('admin.services_sub_categories.index',$request->lang);
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
        $subcategory = ServiceCategory::findOrFail($id);
        $subcategory->title  = $request->title;
        $subcategory->slug= $request->input('slug');
        if ($request->input('slug')){
            $subcategory->slug =make_slug( $request->input('slug'));
        }else{
            $subcategory->slug = make_slug($request->input('title'));
        }
        $subcategory->meta_description  = $request->meta_description;
        $subcategory->meta_keywords  = $request->meta_keywords;
        $subcategory->parent_id = $request->category;
        $subcategory->save();

        Session::flash('add_servise_categroy','دسته بندی جدید با موفقیت ثبت شد');
        return redirect()->route('admin.services_sub_categories.index',$request->lang);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $subcategory = ServiceCategory::findOrFail($id);
        $subcategory->language()->delete();
        $subcategory->delete();
        Session::flash('delete_servise_categroy','دسته بندی حذف شد');
        return redirect()->back();
    }
}
