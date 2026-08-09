<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\AboutPage;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function edit()
    {
        $about = AboutPage::first();

        return view('dashboard.about.edit', compact('about'));
    }

    public function update(Request $request)
    {
        $about = AboutPage::first();

        if (!$about) {
            $about = new AboutPage();
        }

        $about->intro = $request->intro;
        $about->vision = $request->vision;
        $about->mission = $request->mission;
        $about->values = $request->values;
        $about->strategic_axes = $request->strategic_axes;
        $about->strategic_goals = $request->strategic_goals;

        $about->save();

        return redirect()
            ->route('dashboard.about.edit')
            ->with('success', 'تم تحديث صفحة من نحن بنجاح');
    }
}