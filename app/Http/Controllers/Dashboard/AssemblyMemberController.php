<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\AssemblyMember;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AssemblyMemberController extends Controller
{
    public function index()
    {
        $members = AssemblyMember::latest()->get();

        return view('dashboard.assembly.index', compact('members'));
    }

    public function create()
    {
        return view('dashboard.assembly.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('assembly-members', 'public');
        }

        AssemblyMember::create($validated);

        return redirect()
            ->route('dashboard.assembly.index')
            ->with('success', 'تم إضافة العضو بنجاح');
    }

    public function edit(AssemblyMember $assembly_member)
    {
        return view('dashboard.assembly.edit', [
            'member' => $assembly_member
        ]);
    }

    public function update(Request $request, AssemblyMember $assembly_member)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        if ($request->hasFile('image')) {
            if ($assembly_member->image) {
                Storage::disk('public')->delete($assembly_member->image);
            }

            $validated['image'] = $request->file('image')->store('assembly-members', 'public');
        }

        $assembly_member->update($validated);

        return redirect()
            ->route('dashboard.assembly.index')
            ->with('success', 'تم تحديث بيانات العضو بنجاح');
    }

    public function destroy(AssemblyMember $assembly_member)
    {
        if ($assembly_member->image) {
            Storage::disk('public')->delete($assembly_member->image);
        }

        $assembly_member->delete();

        return redirect()
            ->route('dashboard.assembly.index')
            ->with('success', 'تم حذف العضو بنجاح');
    }
}