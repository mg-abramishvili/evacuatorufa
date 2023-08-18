<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lead;
use App\Mail\LeadMail;
use Illuminate\Support\Facades\Mail;

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

        Mail::to('2661184@mail.ru')->send(new LeadMail($lead));
    }
}
