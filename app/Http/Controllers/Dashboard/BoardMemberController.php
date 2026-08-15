<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\BoardMember;
use Illuminate\Http\Request;

class BoardMemberController extends Controller
{
    public function index()
    {
        $members = BoardMember::latest()->get();

        return view('dashboard.board.index', compact('members'));
    }

    public function create()
    {
        return view('dashboard.board.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'position' => ['required', 'string', 'max:255'],
            'image' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
        ]);

        if ($request->hasFile('image')) {

            $imageName = time() . '_' . $request->file('image')->getClientOriginalName();

            $request->file('image')->move(
                public_path('images/board'),
                $imageName
            );

            $validated['image'] = $imageName;
        }

        BoardMember::create($validated);

        return redirect()
            ->route('dashboard.board.index')
            ->with('success', 'تم إضافة عضو مجلس الإدارة بنجاح');
    }

    public function show(BoardMember $boardMember)
    {
        return redirect()
            ->route('dashboard.board.index');
    }

    public function edit(BoardMember $boardMember)
    {
        return view('dashboard.board.edit', compact('boardMember'));
    }

    public function update(Request $request, BoardMember $boardMember)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'position' => ['required', 'string', 'max:255'],
            'image' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
        ]);

        if ($request->hasFile('image')) {

            $imageName = time() . '_' . $request->file('image')->getClientOriginalName();

            $request->file('image')->move(
                public_path('images/board'),
                $imageName
            );

            $validated['image'] = $imageName;
        }

        $boardMember->update($validated);

        return redirect()
            ->route('dashboard.board.index')
            ->with('success', 'تم تعديل عضو مجلس الإدارة بنجاح');
    }

    public function destroy(BoardMember $boardMember)
    {
        if ($boardMember->image) {

            $imagePath = public_path('images/board/' . $boardMember->image);

            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }

        $boardMember->delete();

        return redirect()
            ->route('dashboard.board.index')
            ->with('success', 'تم حذف عضو مجلس الإدارة بنجاح');
    }
}