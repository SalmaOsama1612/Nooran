<?php

namespace App\Http\Controllers;

use App\Models\Advisor;

class AdvisorController extends Controller
{
    public function index()
    {
        $advisor = Advisor::first();

        return view('pages.advisor', compact('advisor'));
    }
}