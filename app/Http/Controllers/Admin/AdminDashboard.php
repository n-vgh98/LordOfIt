<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Lang;
use Illuminate\Http\Request;

class AdminDashboard extends Controller
{
    public function index()
    {
        return view('admin.layouts.master');
    }

    public function order(Request $request, $type)
    {

        $first_item = Lang::where([["id", $request->order_1], ["langable_type", $type]])->first();
        $second_item = Lang::where([["id", $request->order_2], ["langable_type", $type]])->first();
        if ($first_item != null and $second_item != null) {
            $first_item->id = 500;
            $first_item->save();
            $second_item->id = $request->order_1;
            $second_item->save();
            $first_item->id = $request->order_2;
            $first_item->save();
            return redirect()->back()->with("success", "تغییر مکان با موفقیت انجام شد");
        } elseif ($first_item == null and $second_item != null) {
            return redirect()->back()->with("fail", " شماره $request->order_1 وجود ندارد");
        } elseif ($first_item != null and $second_item == null) {
            return redirect()->back()->with("fail", " شماره $request->order_2 وجود ندارد");
        } elseif ($first_item == null and $second_item == null) {
            return redirect()->back()->with("fail", "هیچکدام از شماره های وارد شده وجود ندارد");
        } else {
            return redirect()->back()->with("fail", "خطایی پیش آمده لطفا تیم بک اند را صدا بزنید");
        }
    }
}
