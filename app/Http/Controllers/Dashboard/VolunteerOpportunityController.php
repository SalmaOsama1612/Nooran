<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\VolunteerOpportunity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class VolunteerOpportunityController extends Controller
{
    public function index()
    {
        $opportunity = VolunteerOpportunity::latest()->first();

        return view('dashboard.volunteer.index', compact('opportunity'));
    }

    public function create()
    {
        return view('dashboard.volunteer.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'organization_name' => 'required|string|max:255',
            'organization_description' => 'nullable|string',
            'title' => 'required|string|max:255',
            'start_date' => 'nullable|date',
            'current_volunteers' => 'required|integer|min:0',
            'max_volunteers' => 'required|integer|min:1',
            'external_url' => 'nullable|url|max:255',
            'logo' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'is_active' => 'nullable|boolean',
        ]);

        if ($request->hasFile('logo')) {
            $validated['logo'] = $request->file('logo')->store(
                'volunteer',
                'public'
            );
        }

        $validated['is_active'] = $request->boolean('is_active');

        VolunteerOpportunity::create($validated);

        return redirect()
            ->route('dashboard.volunteer.index')
            ->with('success', 'تم إضافة فرصة التطوع بنجاح');
    }

    public function show(VolunteerOpportunity $volunteer)
    {
        return redirect()->route(
            'dashboard.volunteer.index'
        );
    }

    public function edit(VolunteerOpportunity $volunteer)
    {
        $volunteerOpportunity = $volunteer;

        return view(
            'dashboard.volunteer.edit',
            compact('volunteerOpportunity')
        );
    }

    public function update(
        Request $request,
        VolunteerOpportunity $volunteer
    ) {
        $validated = $request->validate([
            'organization_name' => 'required|string|max:255',
            'organization_description' => 'nullable|string',
            'title' => 'required|string|max:255',
            'start_date' => 'nullable|date',
            'current_volunteers' => 'required|integer|min:0',
            'max_volunteers' => 'required|integer|min:1',
            'external_url' => 'nullable|url|max:255',
            'logo' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'is_active' => 'nullable|boolean',
        ]);

        if ($request->hasFile('logo')) {
            if ($volunteer->logo) {
                Storage::disk('public')->delete($volunteer->logo);
            }

            $validated['logo'] = $request->file('logo')->store(
                'volunteer',
                'public'
            );
        }

        $validated['is_active'] = $request->boolean('is_active');

        $volunteer->update($validated);

        return redirect()
            ->route('dashboard.volunteer.index')
            ->with('success', 'تم تعديل فرصة التطوع بنجاح');
    }

    public function destroy(VolunteerOpportunity $volunteer)
    {
        if ($volunteer->logo) {
            Storage::disk('public')->delete($volunteer->logo);
        }

        $volunteer->delete();

        return redirect()
            ->route('dashboard.volunteer.index')
            ->with('success', 'تم حذف فرصة التطوع بنجاح');
    }
}

