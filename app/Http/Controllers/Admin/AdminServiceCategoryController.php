<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Lang;
use App\Models\ServiceCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AdminServiceCategoryController extends Controller
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
        return view('admin.services.categories.index', compact('languages', 'lang'));


        // $categories = ServiceCategory::all();
        // return view('admin.services.categories.index',compact('categories'));
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
        $category = new ServiceCategory();
        $category->title  = $request->title;
        $category->slug= $request->input('slug');
        if ($request->input('slug')){
            $category->slug =make_slug( $request->input('slug'));
        }else{
            $category->slug = make_slug($request->input('title'));
        }
        $category->meta_description  = $request->meta_description;
        $category->meta_keywords  = $request->meta_keywords;
        $category->save();

        // saving language for category
        $language = new Lang();
        $language->name = $request->lang;
        $category->language()->save($language);

        Session::flash('add_servise_categroy','دسته بندی جدید با موفقیت ثبت شد');
        return redirect()->route('admin.services_categories.index',$request->lang);



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
        $category = ServiceCategory::findOrFail($id);
        $category->title  = $request->title;
        $category->slug= $request->slug;
        if ($request->input('slug')){
            $category->slug =make_slug( $request->input('slug'));
        }else{
            $category->slug = make_slug($request->input('title'));
        }
        $category->meta_description  = $request->meta_description;
        $category->meta_keywords  = $request->meta_keywords;
        $category->save();

        Session::flash('add_servise_categroy','دسته بندی  با موفقیت ویرایش شد');
        return redirect()->route('admin.services_categories.index',$request->lang);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = ServiceCategory::findOrFail($id);
        $category->language()->delete();
        $category->delete();
        Session::flash('delete_servise_categroy','دسته بندی حذف شد');
        return redirect()->back();
    }
}
