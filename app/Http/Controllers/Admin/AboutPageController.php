<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AboutPage;

class AboutPageController extends Controller
{
    public function index()
    {
        return AboutPage::find(1);
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'description' => 'required',
        ]);

        $aboutPage = AboutPage::find(1);

        $aboutPage->description = $request->description;

        $aboutPage->save();
    }
}
