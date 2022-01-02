<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Comment;
use App\Models\Course;
use App\Models\Service;
use App\Models\WorkSampleCategory;
use Illuminate\Http\Request;

class AdminCommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comments = Comment::all();
        return view("admin.comments.index", compact("comments"));
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

        if ($request->comment == "course") {
            $course = Course::find($request->id);
            $comment = new Comment();
            $comment->writer_id = auth()->user()->id;
            $comment->text = $request->didgah;
            if ($request->parent_id !== null) {
                $comment->parent_id = $request->parent_id;
            }
            $course->comments()->save($comment);
        }
        if($request->comment == 'article'){
            $article = Article::find($request->id);
            $comment = new Comment();
            $comment->writer_id = auth()->user()->id;
            $comment->text = $request->didgah;
            if ($request->parent_id !== null) {
                $comment->parent_id = $request->parent_id;
            }
            $article->comments()->save($comment);
        }

        if($request->comment == 'services'){
            $services = Service::find($request->id);
            $comment = new Comment();
            $comment->writer_id = auth()->user()->id;
            $comment->text = $request->didgah;
            if ($request->parent_id !== null) {
                $comment->parent_id = $request->parent_id;
            }
            $services->comments()->save($comment);
        }

        if ($request->comment == "answer") {
            $course = Course::find($request->id);
            $answer = new Comment();
            $answer->parent_id = $request->parent_id;
            $answer->text = $request->text;
            $answer->status = 0;
            $answer->writer_id = auth()->user()->id;
            $course->comments()->save($answer);
            $answer->save();
        }
        return redirect()->back()->with("success", "پیام با موفقیت ارسال شد و پس از تایید ادمین نمایش داده میشود");
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
        $comment = Comment::find($id);
        $comment->delete();
        return redirect()->back()->with("success", "پیام مورد نظر حذف شد");
    }

    public function accept($id)
    {
        $comment = Comment::find($id);
        $comment->status = 1;
        $comment->save();
        return redirect()->back()->with("success", "پیام مورد نظر به حالت تایید شده تغیر کرد");
    }

    public function decline($id)
    {
        $comment = Comment::find($id);
        $comment->status = 0;
        $comment->save();
        return redirect()->back()->with("success", "پیام مورد نظر دیگر نمایش داده نمیشود");
    }
}
