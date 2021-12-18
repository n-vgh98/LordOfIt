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
            if ($request->social1_img !== null) {
                $link->social_1_icon = $request->social1_img;
            }
        }
        if ($request->social_2 !== null) {
            $link->social_2 = $request->social_2;
            if ($request->social2_img !== null) {
                $link->social_2_icon = $request->social2_img;
            }
        }
        $link->save();


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
