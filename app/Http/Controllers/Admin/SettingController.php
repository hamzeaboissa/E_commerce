<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index()
    {
        $setting = Setting::first();
        return view("admin.setting.index", compact("setting"));
    }
    public function store(Request $request)
    {
        $setting = Setting::first();
        if ($setting) {
            //update Data
            $setting->update([
                'Website_name' => $request->Website_name,
                'Website_url' => $request->Website_url,
                'page_title' => $request->page_title,
                'meta_keywords' => $request->meta_keywords,
                'meta_Description' => $request->meta_Description,
                'Address' => $request->Address,
                'Phone1' => $request->Phone1,
                'Email_ID' => $request->Email_ID,
                'Facebook' => $request->Facebook,
                'Instagram' => $request->Instagram,
                'Twitter' => $request->Twitter,
                'YouTube' => $request->YouTube
            ]);
            return redirect()->back()->with('message', 'setting Updated');
        } else {
            //create Data
            Setting::create([
                'Website_name' => $request->Website_name,
                'Website_url' => $request->Website_url,
                'page_title' => $request->page_title,
                'meta_keywords' => $request->meta_keywords,
                'meta_Description' => $request->meta_Description,
                'Address' => $request->Address,
                'Phone1' => $request->Phone1,
                'Email_ID' => $request->Email_ID,
                'Facebook' => $request->Facebook,
                'Instagram' => $request->Instagram,
                'Twitter' => $request->Twitter,
                'YouTube' => $request->YouTube
            ]);
            return redirect()->back()->with('message', 'setting created');
        }
    }
}
