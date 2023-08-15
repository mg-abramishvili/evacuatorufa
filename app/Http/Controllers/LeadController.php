<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lead;

class LeadController extends Controller
{
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:15',
            'tel' => 'required|max:15',
        ]);

        $lead = new Lead();

        $lead->name = $request->name;
        $lead->tel = $request->tel;
        $lead->text = $request->text;

        $lead->save();

        // Mail::to('mail@mail.ru')->send(new LeadMail($lead));
    }
}
