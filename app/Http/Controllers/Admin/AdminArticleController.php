<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Article;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;


class AdminArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Article::all();
        return view('admin.articles.index',compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.articles.create');   
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
        $article->slug= $request->input('slug');
        if ($request->input('slug')){
            $article->slug =make_slug( $request->input('slug'));
        }else{
            $article->slug = make_slug($request->input('title'));
        }
        $article->text_1 = $request->input('text_1');
        $article->text_2 = $request->input('text_2');
        $article->text_3 = $request->input('text_3');
        $article->text_4 = $request->input('text_4');
        $article->v_link_1 = $request->input('v_link_1');
        $article->v_link_1 = $request->input('v_link_2');
        $article->v_link_3 = $request->input('v_link_3');
        $article->v_link_4 = $request->input('v_link_4');
        $article->user_id = Auth::id();
        $article->meta_description = $request->input('meta_description');
        $article->meta_keywords = $request->input('meta_keywords');
        $article->status = $request->input('status');
        $article->save();

        Session::flash('add_article','مقاله جدید با موفقیت ثبت شد');
        return redirect('admin/articles');
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
        $article->slug= $request->input('slug');
        if ($request->input('slug')){
            $article->slug =make_slug( $request->input('slug'));
        }else{
            $article->slug = make_slug($request->input('title'));
        }
        $article->text_1 = $request->input('text_1');
        $article->text_2 = $request->input('text_2');
        $article->text_3 = $request->input('text_3');
        $article->text_4 = $request->input('text_4');
        $article->v_link_1 = $request->input('v_link_1');
        $article->v_link_1 = $request->input('v_link_2');
        $article->v_link_3 = $request->input('v_link_3');
        $article->v_link_4 = $request->input('v_link_4');
        $article->user_id = Auth::id();
        $article->meta_description = $request->input('meta_description');
        $article->meta_keywords = $request->input('meta_keywords');
        $article->status = $request->input('status');
        $article->save();

        Session::flash('add_article','مقاله با موفقیت ویرایش شد');
        return redirect('admin/articles');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $articles = Article::findOrFail($id);
        $articles->delete();
        Session::flash('delete_article','مقاله حذف شد');
        return redirect('admin/articles');
    }
}
