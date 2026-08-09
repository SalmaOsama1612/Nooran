<?php

namespace App\Http\Controllers;

use App\Models\AssemblyMember;

class AssemblyController extends Controller
{
    public function index()
    {
        $members = AssemblyMember::latest()->get();

        return view('pages.assembly', compact('members'));
    }
}