<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Lead;

class LeadController extends Controller
{
    public function index()
    {
        return Lead::orderBy('id', 'desc')->get();
    }

    public function delete($id)
    {
        $lead = Lead::find($id);

        $lead->delete();
    }
}
