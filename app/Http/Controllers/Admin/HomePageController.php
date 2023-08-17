<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HomePage;

class HomePageController extends Controller
{
    public function index()
    {
        return HomePage::find(1);
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'text1' => 'required',
            'text1_header' => 'required',
            'text2' => 'required',
            'text2_header' => 'required',
            'text3' => 'required',
            'text3_header' => 'required',
        ]);

        $homepage = HomePage::find(1);

        $homepage->text1 = $request->text1;
        $homepage->text1_header = $request->text1_header;
        $homepage->text2 = $request->text2;
        $homepage->text2_header = $request->text2_header;
        $homepage->text3 = $request->text3;
        $homepage->text3_header = $request->text3_header;

        $homepage->save();
    }
}
