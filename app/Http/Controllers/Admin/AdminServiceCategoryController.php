<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
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
    public function index()
    {
        $categories = ServiceCategory::all();
        return view('admin.services.categories.index',compact('categories'));
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

        Session::flash('add_servise_categroy','دسته بندی جدید با موفقیت ثبت شد');
        return redirect('admin/services_categories');


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
        $category->slug= $request->input('slug');
        if ($request->input('slug')){
            $category->slug =make_slug( $request->input('slug'));
        }else{
            $category->slug = make_slug($request->input('title'));
        }
        $category->meta_description  = $request->meta_description;
        $category->meta_keywords  = $request->meta_keywords;
        $category->save();

        Session::flash('add_servise_categroy','دسته بندی  با موفقیت ویرایش شد');
        return redirect('admin/services_categories');
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
        $category->delete();
        Session::flash('delete_servise_categroy','دسته بندی حذف شد');
        return redirect('admin/services_categories');
    }
}
