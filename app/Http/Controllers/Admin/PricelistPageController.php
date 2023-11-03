<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PricelistPage;

class PricelistPageController extends Controller
{
    public function index()
    {
        return PricelistPage::find(1);
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'description' => 'required',
        ]);

        $pricelistPage = PricelistPage::find(1);

        $pricelistPage->description = $request->description;

        $pricelistPage->save();
    }
}
