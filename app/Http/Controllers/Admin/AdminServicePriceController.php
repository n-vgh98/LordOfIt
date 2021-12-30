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
        $service->show_in_menu = $request->show_in_menu;
        $service->attributes = $request->text;
        $service->category_id = $request->category_id;
        $service->save();
        return redirect()->route("admin.services.price.show", $request->category_id)->with("success", 'سرویس شما با موفقیت اضافه شد');
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
        $service = ServicePrice::find($id);

        return view("admin.serviceprices.edit", compact("service"));
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
        $service = ServicePrice::find($id);
        $service->name = $request->name;
        $service->time = $request->time;
        $service->price = $request->price;
        $service->attributes = $request->text;
        $service->save();
        return redirect()->route("admin.services.price.show", $service->category->id)->with("success", 'سرویس شما با موفقیت ویرایش شد');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $service = ServicePrice::find($id);
        $service->delete();
        return redirect()->back()->with("success", 'سرویس شما با موفقیت حذف شد');
    }


    public function showinenu($id)
    {
        $service = ServicePrice::find($id);
        $service->show_in_menu = 1;
        $service->save();
        return redirect()->back()->with("success", 'سرویس مورد نظر در منو نمایش داده میشود');
    }

    public function unshow($id)
    {
        $service = ServicePrice::find($id);
        $service->show_in_menu = 0;
        $service->save();
        return redirect()->back()->with("success", 'سرویس مورد نظر در منو نمایش داده نمیشود');
    }
}
