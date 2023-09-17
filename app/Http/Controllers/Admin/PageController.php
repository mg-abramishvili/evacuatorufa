<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Page;

class PageController extends Controller
{
    public function index()
    {
        return Page::orderBy('order', 'asc')->get();
    }

    public function page($id)
    {
        return Page::find($id);
    }

    public function update($id, Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'slug' => 'required',
            'price' => 'required',
            'order' => 'required',
            'meta_title' => 'required',
            'meta_description' => 'required',
            'desc1_title' => 'required',
            'desc1_text' => 'required',
            'desc2_title' => 'required',
            'desc2_text' => 'required',
        ]);

        $page = Page::find($id);

        $page->name = $request->name;
        $page->slug = $request->slug;
        $page->price = $request->price;
        $page->order = $request->order;
        $page->meta_title = $request->meta_title;
        $page->meta_description = $request->meta_description;
        $page->desc1_title = $request->desc1_title;
        $page->desc1_text = $request->desc1_text;
        $page->desc2_title = $request->desc2_title;
        $page->desc2_text = $request->desc2_text;
        $page->icon = $page->icon;

        $page->save();
    }
}
