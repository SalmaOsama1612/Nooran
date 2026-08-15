<?php

namespace App\Http\Controllers;

use App\Models\BoardMember;

class BoardController extends Controller
{
    public function index()
    {
        $members = BoardMember::orderBy('id')->get();

        return view('pages.board', compact('members'));
    }
}