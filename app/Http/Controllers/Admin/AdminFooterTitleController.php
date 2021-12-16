<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FooterTitle;
use Illuminate\Http\Request;

class AdminFooterTitleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $titles = FooterTitle::all();
        return view("admin.footer.titles", compact("titles"));
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
        $title = new FooterTitle();
        $title->title = $request->title;
        $title->save();
        return redirect()->back()->with("success", "عنوان شما با موفقیت ذخیره شد");
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
        $title = FooterTitle::find($id);
        $title->title = $request->title;
        $title->save();
        return redirect()->back()->with("success", "عنوان شما با موفقیت ویرایش شد");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $title = FooterTitle::find($id);
        $title->delete();
        return redirect()->back()->with("fail", "عنوان شما با موفقیت حذف شد");
    }

    // method to make the unshow title to show topic
    public function unblock($id)
    {
        $title = FooterTitle::find($id);
        $title->status = 1;
        $title->save();
        return redirect()->back();
    }

    // method to make unshow title to show title 
    public function block($id)
    {
        $title = FooterTitle::find($id);
        $title->status = 0;
        $title->save();
        return redirect()->back();
    }
}
