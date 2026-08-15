<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\GovernanceDocument;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GovernanceDocumentController extends Controller
{
    public function index()
    {
        $documents = GovernanceDocument::latest()->get();

        return view('dashboard.governance.index', compact('documents'));
    }

    public function create()
    {
        return view('dashboard.governance.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'file' => 'required|file|mimes:pdf|max:10240',
            'is_active' => 'nullable|boolean',
        ]);

        $filePath = $request->file('file')->store(
            'governance',
            'public'
        );

        GovernanceDocument::create([
            'title' => $validated['title'],
            'file_path' => $filePath,
            'is_active' => $request->boolean('is_active'),
        ]);

        return redirect()
            ->route('dashboard.governance.index')
            ->with('success', 'تم إضافة المستند بنجاح');
    }

    public function edit(GovernanceDocument $governance)
    {
        return view(
            'dashboard.governance.edit',
            compact('governance')
        );
    }

    public function update(
        Request $request,
        GovernanceDocument $governance
    ) {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'file' => 'nullable|file|mimes:pdf|max:10240',
            'is_active' => 'nullable|boolean',
        ]);

        $data = [
            'title' => $validated['title'],
            'is_active' => $request->boolean('is_active'),
        ];

        if ($request->hasFile('file')) {
            if ($governance->file_path) {
                Storage::disk('public')->delete(
                    $governance->file_path
                );
            }

            $data['file_path'] = $request->file('file')->store(
                'governance',
                'public'
            );
        }

        $governance->update($data);

        return redirect()
            ->route('dashboard.governance.index')
            ->with('success', 'تم تعديل المستند بنجاح');
    }

    public function destroy(GovernanceDocument $governance)
    {
        if ($governance->file_path) {
            Storage::disk('public')->delete(
                $governance->file_path
            );
        }

        $governance->delete();

        return redirect()
            ->route('dashboard.governance.index')
            ->with('success', 'تم حذف المستند بنجاح');
    }
}
