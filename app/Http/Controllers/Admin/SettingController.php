<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setting;

class SettingController extends Controller
{
    public function index()
    {
        return Setting::find(1);
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'tel1' => 'required',
            'tel2' => 'required',
            'email' => 'required',
            'address' => 'required',
            'vk_link' => 'required',
            'instagram_link' => 'required',
        ]);

        $settings = Setting::find(1);

        $settings->tel1 = $request->tel1;
        $settings->tel2 = $request->tel2;
        $settings->email = $request->email;
        $settings->address = $request->address;
        $settings->vk_link = $request->vk_link;
        $settings->instagram_link = $request->instagram_link;

        $settings->save();
    }
}
