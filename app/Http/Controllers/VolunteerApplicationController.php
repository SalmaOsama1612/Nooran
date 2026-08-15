<?php

namespace App\Http\Controllers;

use App\Models\VolunteerApplication;
use App\Models\VolunteerOpportunity;
use Illuminate\Http\Request;

class VolunteerApplicationController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'volunteer_opportunity_id' => 'required|exists:volunteer_opportunities,id',
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:255',
            'email' => 'nullable|email|max:255',
            'gender' => 'required|in:female,male',
            'notes' => 'nullable|string',
        ]);

        if ($validated['gender'] !== 'female') {
            return back()
                ->withErrors([
                    'gender' => 'هذه الفرصة التطوعية مخصصة للنساء فقط.'
                ])
                ->withInput();
        }

        $opportunity = VolunteerOpportunity::findOrFail(
            $validated['volunteer_opportunity_id']
        );

        if (!$opportunity->is_active) {
            return back()
                ->withErrors([
                    'volunteer' => 'هذه الفرصة التطوعية غير متاحة حاليًا.'
                ])
                ->withInput();
        }

        if ($opportunity->current_volunteers >= $opportunity->max_volunteers) {
            return back()
                ->withErrors([
                    'volunteer' => 'اكتمل العدد المطلوب لهذه الفرصة التطوعية.'
                ])
                ->withInput();
        }

        VolunteerApplication::create([
            'volunteer_opportunity_id' => $opportunity->id,
            'name' => $validated['name'],
            'phone' => $validated['phone'],
            'email' => $validated['email'] ?? null,
            'gender' => 'female',
            'notes' => $validated['notes'] ?? null,
            'status' => 'pending',
        ]);

        $opportunity->increment('current_volunteers');

        return back()->with(
            'success',
            'تم إرسال طلب التطوع بنجاح، وسيتم مراجعة طلبك.'
        );
    }
}

