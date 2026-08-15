<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Executive;
use Illuminate\Http\Request;

class ExecutiveController extends Controller
{
    public function index()
    {
        $executive = Executive::first();

        return view('dashboard.executive.index', compact('executive'));
    }

    public function create()
    {
        return view('dashboard.executive.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'degree' => 'nullable|string|max:255',
            'position' => 'nullable|string|max:255',
            'phone' => 'nullable|string|max:50',
            'email' => 'nullable|email|max:255',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $imageName = time() . '_' . $request->file('image')->getClientOriginalName();

            $request->file('image')->move(
                public_path('images/executive'),
                $imageName
            );

            $validated['image'] = $imageName;
        }

        Executive::create($validated);

        return redirect()
            ->route('dashboard.executive.index')
            ->with('success', 'تم إضافة بيانات المدير التنفيذي بنجاح');
    }

    public function edit(Executive $executive)
    {
        return view('dashboard.executive.edit', compact('executive'));
    }

    public function update(Request $request, Executive $executive)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'degree' => 'nullable|string|max:255',
            'position' => 'nullable|string|max:255',
            'phone' => 'nullable|string|max:50',
            'email' => 'nullable|email|max:255',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        if ($request->hasFile('image')) {

            if ($executive->image) {
                $oldImage = public_path('images/executive/' . $executive->image);

                if (file_exists($oldImage)) {
                    unlink($oldImage);
                }
            }

            $imageName = time() . '_' . $request->file('image')->getClientOriginalName();

            $request->file('image')->move(
                public_path('images/executive'),
                $imageName
            );

            $validated['image'] = $imageName;
        }

        $executive->update($validated);

        return redirect()
            ->route('dashboard.executive.index')
            ->with('success', 'تم تحديث بيانات المدير التنفيذي بنجاح');
    }

    public function destroy(Executive $executive)
    {
        if ($executive->image) {
            $imagePath = public_path('images/executive/' . $executive->image);

            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }

        $executive->delete();

        return redirect()
            ->route('dashboard.executive.index')
            ->with('success', 'تم حذف بيانات المدير التنفيذي بنجاح');
    }
}