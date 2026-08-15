<?php

namespace App\Http\Controllers;

use App\Models\Executive;

class ExecutiveController extends Controller
{
    public function index()
    {
        $executive = Executive::first();

        return view('pages.executive', compact('executive'));
    }
}