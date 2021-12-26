<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FooterLink;
use App\Models\Lang;
use Illuminate\Http\Request;

class AdminFooterLinkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($lang)
    {
        $languages = Lang::where([["langable_type", "App\Models\FooterLink"], ["name", $lang]])->get();
        return view("admin.footer.links", compact("languages","lang"));
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
            if ($request->social_1_icon !== null) {
                $link->social_1_icon = $request->social_1_icon;
            }
        }
        if ($request->social_2 !== null) {
            $link->social_2 = $request->social_2;
            if ($request->social_2_icon !== null) {
                $link->social_2_icon = $request->social_2_icon;
            }
        }
        $link->save();
        // saving language for article
        $language = new Lang();
        $language->name = $request->lang;
        $link->language()->save($language);

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
        $link = FooterLink::find($id);

        // check if for is for instagram link
        if ($request->instagram_link !== null) {
            $link->instagram_link = $request->instagram_link;
        }

        // check if for is for twitter link
        if ($request->twitter_link !== null) {
            $link->twitter_link = $request->twitter_link;
        }

        // check if for is for facebook link
        if ($request->facebook_link !== null) {
            $link->facebook_link = $request->facebook_link;
        }

        // check if for is for linkedin link
        if ($request->linkedin_link !== null) {
            $link->linkedin_link = $request->linkedin_link;
        }

        // check if for is for social_1 link
        if ($request->social_1 !== null) {
            $link->social_1 = $request->social_1;
        }

        // check if for is for social_2 link
        if ($request->social_2 !== null) {
            $link->social_2 = $request->social_2;
        }

        // check if for is for social_1 icon
        if ($request->social_1_icon !== null) {
            $link->social_1_icon = $request->social_1_icon;
        }

        // check if for is for social_2 icon
        if ($request->social_2_icon !== null) {
            $link->social_2_icon = $request->social_2_icon;
        }
        $link->save();
        return redirect()->back()->with("success", "تغیرات شما با موفقیت ثبت شد");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $link = FooterLink::find($id);
        $link->delete();
        $link->language()->delete();

        return redirect()->back()->with("fail", "لینک های شما با موفقیت حذف شد");
    }
}
