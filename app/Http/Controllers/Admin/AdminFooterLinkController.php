<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FooterLink;
use App\Models\Image;
use Illuminate\Http\Request;

class AdminFooterLinkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $links = FooterLink::all();
        return view("admin.footer.links", compact("links"));
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
        $link = new FooterLink();
        $link->instagram_link = $request->instagram;
        $link->linkedin_link = $request->linkedin;
        $link->twitter_link = $request->twitter;
        $link->facebook_link = $request->facebook;
        if ($request->social_1 !== null) {
            $link->social_1 = $request->social_1;
        }
        if ($request->social_2 !== null) {
            $link->social_2 = $request->social_2;
        }
        $link->save();

        if ($request->social2_img !== null) {

            $image = new Image();
            $imagename = time() . "." . $request->social2_img->extension();
            $request->social2_img->move(public_path("images/footerlinks/", $imagename));
            $image->uploader_id = auth()->user()->id;
            $image->name = $request->social2_img_name;
            $image->alt = $request->social2_img_alt;
            $image->path = "images/footerlinks/" . $imagename;
            $link->social_1_icon = "images/footerlinks/" . $imagename;
            $link->save();
            $link->images()->save($image);
        }

        if ($request->social1_img !== null) {
            $image = new Image();
            $imagename = time() . "." . $request->social1_img->extension();
            $request->social1_img->move(public_path("images/footerlinks/", $imagename));
            $image->uploader_id = auth()->user()->id;
            $image->name = $request->social1_img_name;
            $image->alt = $request->social1_img_alt;
            $image->path = "images/footerlinks/" . $imagename;
            $link->social_2_icon = "images/footerlinks/" . $imagename;
            $link->save();
            $link->images()->save($image);
        }
        return redirect()->back()->with("success", "لینک های شما با موفقیت ثبت شد");
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}