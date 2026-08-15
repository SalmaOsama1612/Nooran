<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Advisor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdvisorController extends Controller
{
    public function index()
    {
        $advisor = Advisor::first();

        return view('dashboard.advisor.index', compact('advisor'));
    }

    public function create()
    {
        return view('dashboard.advisor.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'degree' => 'nullable|string|max:255',
            'position' => 'nullable|string|max:255',
            'phone' => 'nullable|string|max:255',
            'email' => 'nullable|email|max:255',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:5120',
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('advisors', 'public');
        }

        Advisor::create($data);

        return redirect()
            ->route('dashboard.advisor')
            ->with('success', 'تم إضافة بيانات المستشار المالي بنجاح');
    }

    public function edit(Advisor $advisor)
    {
        return view('dashboard.advisor.edit', compact('advisor'));
    }

    public function update(Request $request, Advisor $advisor)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'degree' => 'nullable|string|max:255',
            'position' => 'nullable|string|max:255',
            'phone' => 'nullable|string|max:255',
            'email' => 'nullable|email|max:255',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:5120',
        ]);

        if ($request->hasFile('image')) {

            if ($advisor->image) {
                Storage::disk('public')->delete($advisor->image);
            }

            $data['image'] = $request->file('image')->store('advisors', 'public');
        }

        $advisor->update($data);

        return redirect()
            ->route('dashboard.advisor')
            ->with('success', 'تم تعديل بيانات المستشار المالي بنجاح');
    }

    public function destroy(Advisor $advisor)
    {
        if ($advisor->image) {
            Storage::disk('public')->delete($advisor->image);
        }

        $advisor->delete();

        return redirect()
            ->route('dashboard.advisor')
            ->with('success', 'تم حذف بيانات المستشار المالي بنجاح');
    }
}