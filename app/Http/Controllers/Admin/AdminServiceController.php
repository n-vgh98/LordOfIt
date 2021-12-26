<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\ServiceCategory;
use App\Models\Image;
use App\Models\Lang;
use Illuminate\Support\Facades\Session;
use PhpParser\Node\Stmt\Foreach_;

class AdminServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($lang)
    {
        $languages = Lang::where([["langable_type", "App\Models\Service"], ["name", $lang]])->get();
        return view('admin.services.index', compact('languages', 'lang'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($lang)
    {
        $languages = Lang::where([["langable_type", "App\Models\ServiceCategory"], ["name", $lang]])->get();
        $categories = array();
        foreach ($languages as $language) {
            array_push($categories, $language->langable);
        }
        return view('admin.services.create', compact(['lang', 'languages', 'categories']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $services = new Service();
        $services->title = $request->input('title');
        $services->text_1 = $request->input('text_1');
        $services->text_2 = $request->input('text_2');
        $services->text_3 = $request->input('text_3');
        $services->text_4 = $request->input('text_4');
        $services->v_link_1 = $request->input('v_link_1');
        $services->v_link_1 = $request->input('v_link_2');
        $services->v_link_3 = $request->input('v_link_3');
        $services->v_link_4 = $request->input('v_link_4');
        $services->category_id = $request->category;
        $services->meta_description = $request->input('meta_description');
        $services->meta_keywords = $request->input('meta_keywords');
        $services->save();

        // saving service image
        $image = new Image();
        $image->name = $request->img_name;
        $image->alt = $request->alt;
        $image->uploader_id = auth()->user()->id;
        $imagename = time() . "." . $request->path->extension();
        $request->path->move(public_path("images/services/category/"), $imagename);
        $image->path = "images/services/category/" . $imagename;
        $services->image()->save($image);

        // saving language for services
        $language = new Lang();
        $language->name = $request->lang;
        $services->language()->save($language);

        Session::flash('add_service', 'خدمات جدید با موفقیت ثبت شد');
        return redirect()->route('admin.services.index', $request->lang);
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
        $languages = Lang::where([["langable_type", "App\Models\ServiceCategory"]])->get();
        $categories = array();
        foreach ($languages as $language) {
            array_push($categories, $language->langable);
        }
        $service = Service::with('category')->where('id', $id)->first();
        return view('admin.services.edit', compact(['service', 'categories', 'languages']));
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
        $service = Service::findOrFail($id);
        $service->title = $request->input('title');
        $service->text_1 = $request->input('text_1');
        $service->text_2 = $request->input('text_2');
        $service->text_3 = $request->input('text_3');
        $service->text_4 = $request->input('text_4');
        $service->v_link_1 = $request->input('v_link_1');
        $service->v_link_1 = $request->input('v_link_2');
        $service->v_link_3 = $request->input('v_link_3');
        $service->v_link_4 = $request->input('v_link_4');
        $service->category_id = $request->input('category');
        $service->meta_description = $request->input('meta_description');
        $service->meta_keywords = $request->input('meta_keywords');
        $service->save();
        Session::flash('add_service', 'خدمات با موفقیت ویرایش شد');
        return redirect()->route('admin.services.index',$request->lang);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $service = Service::findOrFail($id);
        unlink($service->image->path);
        $service->language()->delete();
        $service->delete();
        Session::flash('delete_service', 'خدمات حذف شد');
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
            $request->path->move(public_path("images/services/category/"), $imagename);
            $image->path = "images/services/category/" . $imagename;
        }
        $image->save();
        return redirect()->back()->with("success", "عکس خدمات  با موفقیت ویرایش شد");
    }
}
