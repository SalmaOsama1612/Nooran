<?php

namespace App\Http\Controllers;

use App\Models\Program;

class ProgramController extends Controller
{
    public function index()
    {
        $programs=Program::where('status',1)
            ->orderBy('order')
            ->get();

        return view('pages.programs',compact('programs'));
    }
}