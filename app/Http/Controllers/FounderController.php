<?php

namespace App\Http\Controllers;

use App\Models\Founder;

class FounderController extends Controller
{
    public function index()
    {
        $founders = Founder::where('status',true)
            ->orderBy('order')
            ->get();

        return view('home',compact('founders'));
    }
}