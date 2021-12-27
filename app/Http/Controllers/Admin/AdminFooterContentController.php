<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FooterContent;
use App\Models\FooterTitle;
use App\Models\Lang;
use Illuminate\Http\Request;

class AdminFooterContentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($lang)
    {
        $titles = array();
        $contents = array();
        $languages = Lang::where([["langable_type", "App\Models\FooterContent"], ["name", $lang]])->get();
        $titless = Lang::where([["langable_type", "App\Models\FooterTitle"], ["name", $lang]])->get();
        foreach ($titless as $titlesz) {
            array_push($titles, $titlesz->langable);
        }

        $contentss = Lang::where([["langable_type", "App\Models\FooterContent"], ["name", $lang]])->get();
        foreach ($contentss as $contentsz) {
            array_push($contents, $contentsz->langable);
        }
        return view("admin.footer.content", compact("contents", "titles", "languages", "lang"));
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
        $content = new FooterContent();
        $content->title_id = $request->title_id;
        $content->text = $request->text;
        if ($request->text_link !== null) {
            $content->text_link = $request->text_link;
        }
        $content->save();
        // saving language for article
        $language = new Lang();
        $language->name = $request->lang;
        $content->language()->save($language);
        return redirect()->back()->with("success", "متن شما با موفقیت ذخیره شد");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, $lang)
    {
        $contents = FooterContent::where("title_id", $id)->get();
        $titles = FooterTitle::all();
        return view("admin.footer.content", compact("contents", "titles", "lang"));
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
        $content = FooterContent::find($id);
        $content->text = $request->text;
        if ($request->text_link !== null) {
            $content->text_link = $request->text_link;
        }
        $content->save();
        return redirect()->back()->with("success", "متن شما با موفقیت ویرایش شد");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $content = FooterContent::find($id);
        $content->delete();
        $content->language()->delete();

        return redirect()->back()->with("fail", "متن شما با موفقیت حذف شد");
    }
}
