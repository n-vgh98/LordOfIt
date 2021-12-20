<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ServicePrice;
use App\Models\ServicePriceCategory;

class AdminServicePriceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $category = ServicePriceCategory::find($id);
        return view("admin.serviceprices.create", compact("category"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $service = new ServicePrice();
        $service->name = $request->name;
        $service->time = $request->time;
        $service->price = $request->price;
        $service->attributes = $request->text;
        $service->category_id = $request->category_id;
        $service->save();
        return redirect()->route("admin.services.price.show", $request->category_id)->with("success", 'دسته بندی شما با موفقیت اضافه شد');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $category = ServicePriceCategory::find($id);
        return view("admin.serviceprices.show", compact("category"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $subcategory = ServicePriceCategory::find($id);
        return view("admin.serviceprices.subcategories.edit", compact("subcategory"));
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
        $subcategory = ServicePriceCategory::find($id);
        $subcategory->title = $request->title;

        $subcategory->save();
        return redirect()->route("admin.services.price.show", $subcategory->category->id)->with("success", 'دسته بندی شما با موفقیت ویرایش شد');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $subcategory = ServicePriceCategory::find($id);
        $subcategory->delete();
        return redirect()->back()->with("success", 'دسته بندی شما با موفقیت حذف شد');
    }
}
