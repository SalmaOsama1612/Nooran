<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\OrganizationalStructure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class OrganizationalStructureController extends Controller
{
    public function index()
    {
        $structures = OrganizationalStructure::with('parent')
            ->orderBy('sort_order')
            ->orderBy('id')
            ->get();

        return view('dashboard.organizational-structure.index', compact('structures'));
    }

    public function create()
    {
        $parents = OrganizationalStructure::orderBy('sort_order')
            ->orderBy('id')
            ->get();

        return view('dashboard.organizational-structure.create', compact('parents'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'nullable|string|max:255',
            'position' => 'required|string|max:255',
            'type' => 'required|string|max:255',
            'parent_id' => 'nullable|exists:organizational_structures,id',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:5120',
            'sort_order' => 'nullable|integer|min:0',
            'is_active' => 'nullable|boolean',
        ]);

        $data['is_active'] = $request->boolean('is_active');

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')
                ->store('organizational-structure', 'public');
        }

        OrganizationalStructure::create($data);

        return redirect()
            ->route('dashboard.organizational-structure.index')
            ->with('success', 'تم إضافة العنصر إلى الهيكل التنظيمي بنجاح');
    }

    public function edit(OrganizationalStructure $organizationalStructure)
    {
        $parents = OrganizationalStructure::where(
            'id',
            '!=',
            $organizationalStructure->id
        )
            ->orderBy('sort_order')
            ->orderBy('id')
            ->get();

        return view(
            'dashboard.organizational-structure.edit',
            compact('organizationalStructure', 'parents')
        );
    }

    public function update(
        Request $request,
        OrganizationalStructure $organizationalStructure
    ) {
        $data = $request->validate([
            'name' => 'nullable|string|max:255',
            'position' => 'required|string|max:255',
            'type' => 'required|string|max:255',
            'parent_id' => [
                'nullable',
                'exists:organizational_structures,id',
                function ($attribute, $value, $fail) use ($organizationalStructure) {
                    if ($value == $organizationalStructure->id) {
                        $fail('لا يمكن أن يكون العنصر تابعًا لنفسه.');
                    }
                },
            ],
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:5120',
            'sort_order' => 'nullable|integer|min:0',
            'is_active' => 'nullable|boolean',
        ]);

        $data['is_active'] = $request->boolean('is_active');

        if ($request->hasFile('image')) {
            if ($organizationalStructure->image) {
                Storage::disk('public')->delete(
                    $organizationalStructure->image
                );
            }

            $data['image'] = $request->file('image')
                ->store('organizational-structure', 'public');
        }

        $organizationalStructure->update($data);

        return redirect()
            ->route('dashboard.organizational-structure.index')
            ->with('success', 'تم تعديل بيانات الهيكل التنظيمي بنجاح');
    }

    public function destroy(
        OrganizationalStructure $organizationalStructure
    ) {
        if ($organizationalStructure->image) {
            Storage::disk('public')->delete(
                $organizationalStructure->image
            );
        }

        $organizationalStructure->delete();

        return redirect()
            ->route('dashboard.organizational-structure.index')
            ->with('success', 'تم حذف العنصر من الهيكل التنظيمي بنجاح');
    }
}