<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Image;
use App\Models\OurTeam;
use Illuminate\Http\Request;

class AdminOurTeamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $members = OurTeam::all();
        return view("admin.ourteam.index", compact("members"));
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
        $member = new OurTeam();
        $member->name = $request->name;
        $member->job_title = $request->job_title;
        $member->description = $request->job_description;
        $member->save();

        // making image in image table
        $image = new Image();
        $image->name = $request->img_name;
        $image->alt = $request->alt;
        $image->uploader_id = auth()->user()->id;
        $imagename = time() . "." . $request->path->extension();
        $request->path->move(public_path("images/ourteam/members/"), $imagename);
        $image->path = "images/ourteam/members/" . $imagename;
        $member->image()->save($image);
        return redirect()->back()->with("success", "همکار جدید با موفقیت اضافه شد");
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
        $member = OurTeam::find($id);
        $member->name = $request->name;
        $member->job_title = $request->job_title;
        $member->description = $request->description;
        $member->save();
        return redirect()->back()->with("success", "مشخصات همکار  با موفقیت ویرایش شد");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $member = OurTeam::find($id);
        unlink($member->image->path);
        $member->delete();
        return redirect()->back()->with("success", "همکار مورد نظر با موفقیت حذف شد");
    }

    public function updateimage(Request $request, $id)
    {
        $image = Image::find($id);
        $image->name = $request->name;
        $image->alt = $request->alt;
        if ($request->path !== null) {
            unlink($image->path);
            $imagename = time() . "." . $request->path->extension();
            $request->path->move(public_path("images/ourteam/members/"), $imagename);
            $image->path = "images/ourteam/members/" . $imagename;
        }
        $image->save();
        return redirect()->back()->with("success", "عکس همکار  با موفقیت ویرایش شد");
    }
}
