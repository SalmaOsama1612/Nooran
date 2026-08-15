<?php

namespace App\Http\Controllers;

use App\Models\OrganizationalStructure;

class StructureController extends Controller
{
    public function index()
    {
        $structures = OrganizationalStructure::where('is_active', true)
            ->orderBy('sort_order')
            ->get();

        return view('pages.structure', compact('structures'));
    }
}