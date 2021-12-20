<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AboutUs;
use Illuminate\Http\Request;
use App\Models\Image;
use Illuminate\Support\Facades\Session;

class AdminAboutUsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $about_us = AboutUs::all();
        return view('admin.about_us.index',compact('about_us'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.about_us.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $about_us = new AboutUs();
        $about_us->title = $request->input('title');
        $about_us->text_1 = $request->input('text_1');
        $about_us->text_2 = $request->input('text_2');
        $about_us->text_3 = $request->input('text_3');
        $about_us->text_4 = $request->input('text_4');
        $about_us->v_link_1 = $request->input('v_link_1');
        $about_us->v_link_1 = $request->input('v_link_2');
        $about_us->v_link_3 = $request->input('v_link_3');
        $about_us->v_link_4 = $request->input('v_link_4');
        $about_us->meta_description = $request->input('meta_description');
        $about_us->meta_keywords = $request->input('meta_keywords');
        $about_us->save();

        // saving about_us image
        $image = new Image();
        $image->name = $request->img_name;
        $image->alt = $request->alt;
        $image->uploader_id = auth()->user()->id;
        $imagename = time() . "." . $request->path->extension();
        $request->path->move(public_path("images/about_us/"), $imagename);
        $image->path = "images/about_us/" . $imagename;
        $about_us->image()->save($image);

        Session::flash('add_about_us','درباره ما با موفقیت ثبت شد');
        return redirect('admin/about_us');
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
        $about_us = AboutUs::findOrFail($id);
        return view('admin.about_us.edit',compact('about_us'));
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
        $about_us = AboutUs::findOrFail($id);
        $about_us->title = $request->input('title');
        $about_us->text_1 = $request->input('text_1');
        $about_us->text_2 = $request->input('text_2');
        $about_us->text_3 = $request->input('text_3');
        $about_us->text_4 = $request->input('text_4');
        $about_us->v_link_1 = $request->input('v_link_1');
        $about_us->v_link_1 = $request->input('v_link_2');
        $about_us->v_link_3 = $request->input('v_link_3');
        $about_us->v_link_4 = $request->input('v_link_4');
        $about_us->meta_description = $request->input('meta_description');
        $about_us->meta_keywords = $request->input('meta_keywords');
        $about_us->save();

        Session::flash('add_about_us','درباره ما با موفقیت ویرایش شد');
        return redirect('admin/about_us');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $about_us = AboutUs::findOrFail($id);
        unlink($about_us->image->path);
        $about_us->delete();
        Session::flash('delete_about_us','درباره ما حذف شد.');
        return redirect('admin/about_us');
    }

    public function updateimage(Request $request, $id)
    {
        $image = Image::find($id);
        $image->name = $request->name;
        $image->alt = $request->alt;
        if ($request->path !== null) {
            unlink($image->path);
            $imagename = time() . "." . $request->path->extension();
            $request->path->move(public_path("images/about_us/"), $imagename);
            $image->path = "images/about_us/" . $imagename;
        }
        $image->save();
        return redirect()->back()->with("success", "عکس درباره ما  با موفقیت ویرایش شد");
    }
}
