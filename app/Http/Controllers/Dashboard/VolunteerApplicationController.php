<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\VolunteerApplication;
use Illuminate\Http\Request;

class VolunteerApplicationController extends Controller
{
    public function index()
    {
        $applications = VolunteerApplication::with('opportunity')
            ->latest()
            ->get();

        return view(
            'dashboard.volunteer.applications.index',
            compact('applications')
        );
    }

    public function show(VolunteerApplication $volunteerApplication)
    {
        return view(
            'dashboard.volunteer.applications.show',
            compact('volunteerApplication')
        );
    }

    public function update(
        Request $request,
        VolunteerApplication $volunteerApplication
    ) {
        $data = $request->validate([
            'status' => 'required|in:pending,reviewed,accepted,rejected',
        ]);

        $volunteerApplication->update($data);

        return redirect()
            ->route('dashboard.volunteer.applications.index')
            ->with('success', 'تم تحديث حالة الطلب بنجاح');
    }

    public function destroy(
        VolunteerApplication $volunteerApplication
    ) {
        $volunteerApplication->delete();

        return redirect()
            ->route('dashboard.volunteer.applications.index')
            ->with('success', 'تم حذف الطلب بنجاح');
    }
}