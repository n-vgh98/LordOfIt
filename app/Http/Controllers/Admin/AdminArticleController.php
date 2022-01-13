<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Image;
use App\Models\Lang;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;


class AdminArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($lang)
    {


        // $articles = $language->articles;
        $languages = Lang::where([["langable_type", "App\Models\Article"], ["name", $lang]])->get();
        // dd($languages[0]->langable);
        return view('admin.articles.index', compact('languages', 'lang'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($lang)
    {

        return view('admin.articles.create', compact('lang'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $article = new Article();
        $article->title = $request->input('title');
        $article->slug = $request->input('slug');
        if ($request->input('slug')) {
            $article->slug = make_slug($request->input('slug'));
        } else {
            $article->slug = make_slug($request->input('title'));
        }
        $article->text_1 = $request->input('text_1');
        $article->text_2 = $request->input('text_2');
        $article->text_3 = $request->input('text_3');
        $article->text_4 = $request->input('text_4');
        $article->v_link_1 = $request->input('v_link_1');
        $article->v_link_2 = $request->input('v_link_2');
        $article->v_link_3 = $request->input('v_link_3');
        $article->v_link_4 = $request->input('v_link_4');
        $article->user_id = Auth::id();
        $article->meta_description = $request->input('meta_description');
        $article->meta_keywords = $request->input('meta_keywords');
        $article->status = $request->input('status');
        $article->save();

        // saving article image
        $image = new Image();
        $image->name = $request->img_name;
        $image->alt = $request->alt;
        $image->uploader_id = auth()->user()->id;
        $imagename = time() . "." . $request->path->extension();
        $request->path->move(public_path("images/articles/"), $imagename);
        $image->path = "images/articles/" . $imagename;
        $article->image()->save($image);



        // saving language for article
        $language = new Lang();
        $language->name = $request->lang;
        $article->lang()->save($language);

        Session::flash('add_article', 'مقاله جدید با موفقیت ثبت شد');
        return redirect()->route('admin.articles.index', $request->lang);
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
        $article = Article::findOrFail($id);
        return view('admin.articles.edit', compact('article'));
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
        $article = Article::findOrFail($id);
        $article->title = $request->input('title');
        $article->slug = $request->input('slug');
        if ($request->input('slug')) {
            $article->slug = make_slug($request->input('slug'));
        } else {
            $article->slug = make_slug($request->input('title'));
        }
        $article->text_1 = $request->input('text_1');
        $article->text_2 = $request->input('text_2');
        $article->text_3 = $request->input('text_3');
        $article->text_4 = $request->input('text_4');
        $article->v_link_1 = $request->input('v_link_1');
        $article->v_link_2 = $request->input('v_link_2');
        $article->v_link_3 = $request->input('v_link_3');
        $article->v_link_4 = $request->input('v_link_4');
        $article->user_id = Auth::id();
        $article->meta_description = $request->input('meta_description');
        $article->meta_keywords = $request->input('meta_keywords');
        $article->status = $request->input('status');
        $article->save();
        Session::flash('add_article', 'مقاله با موفقیت ویرایش شد');
        return redirect()->route('admin.articles.index', $article->lang->name);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $article = Article::findOrFail($id);
        unlink($article->image->path);
        $article->lang()->delete();
        $article->delete();

        Session::flash('delete_article', 'مقاله حذف شد');
        return redirect()->back();
    }

    public function updateimage(Request $request, $id)
    {
        $image = Image::find($id);
        $image->name = $request->name;
        $image->alt = $request->alt;
        if ($request->path !== null) {
            unlink($image->path);
            $imagename = time() . "." . $request->path->extension();
            $request->path->move(public_path("images/articles/"), $imagename);
            $image->path = "images/articles/" . $imagename;
        }
        $image->save();
        return redirect()->back()->with("success", "عکس مقاله  با موفقیت ویرایش شد");
    }
}
