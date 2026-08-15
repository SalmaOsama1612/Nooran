<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Program;
use App\Models\Founder;
use App\Models\Achievement;
use App\Models\Advisor;
use App\Models\AssemblyMember;
use App\Models\BoardMember;
use App\Models\Executive;
use App\Models\OrganizationalStructure;
use App\Models\GovernanceDocument;
use App\Models\VolunteerOpportunity;
use App\Models\VolunteerApplication;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'programs' => Program::count(),
            'achievements' => Achievement::count(),
            'founders' => Founder::count(),
            'advisors' => Advisor::count(),
            'assembly_members' => AssemblyMember::count(),
            'board_members' => BoardMember::count(),
            'executives' => Executive::count(),
            'organizational_structure' => OrganizationalStructure::count(),
            'governance' => GovernanceDocument::count(),
            'volunteer_opportunities' => VolunteerOpportunity::count(),
            'volunteer_applications' => VolunteerApplication::count(),
        ];

        return view('dashboard.index', [
            'stats' => $stats
        ]);
    }
}