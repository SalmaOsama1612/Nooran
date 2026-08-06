<?php

namespace App\Http\Controllers;

use App\Models\Achievement;
use App\Models\Founder;
use App\Models\Program;
use App\Models\Hero;

class HomeController extends Controller
{
    public function index()
    {
        $hero = Hero::where('status',1)->first();

        $achievement = Achievement::where('status',1)
            ->with('images')
            ->first();

        $founders = Founder::where('status',1)
            ->orderBy('order')
            ->get();

        $programs = Program::where('status',1)
            ->get();

        return view('home', compact(
            'hero',
            'achievement',
            'founders',
            'programs'
        ));
    }
}