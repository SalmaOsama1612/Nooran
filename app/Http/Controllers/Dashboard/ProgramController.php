<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Program;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ProgramController extends Controller
{
    public function index()
    {
        $programs = Program::orderBy('order')->get();

        return view('dashboard.programs.index', compact('programs'));
    }

    public function create()
    {
        return view('dashboard.programs.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|max:255',
            'subtitle' => 'nullable|max:255',
            'description' => 'required',
            'goals' => 'required',
            'order' => 'required|integer|min:1',
        ]);

     

        $data['status'] = $request->has('status');

        Program::create($data);

        return redirect()
            ->route('dashboard.programs.index')
            ->with('success', 'تم إضافة البرنامج بنجاح');
    }

    public function edit(Program $program)
    {
        return view('dashboard.programs.edit', compact('program'));
    }

    public function update(Request $request, Program $program)
    {
        $data = $request->validate([
            'title' => 'required|max:255',
            'subtitle' => 'nullable|max:255',
            'description' => 'required',
            'goals' => 'required',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'order' => 'required|integer|min:1',
        ]);

        if ($request->hasFile('image')) {

            if ($program->image && File::exists(public_path('images/programs/' . $program->image))) {

                File::delete(public_path('images/programs/' . $program->image));
            }

            $image = time() . '.' . $request->image->extension();

            $request->image->move(
                public_path('images/programs'),
                $image
            );

            $data['image'] = $image;
        }

        $data['status'] = $request->has('status');

        $program->update($data);

        return redirect()
            ->route('dashboard.programs.index')
            ->with('success', 'تم تعديل البرنامج بنجاح');
    }

    public function destroy(Program $program)
    {
        if ($program->image && File::exists(public_path('images/programs/' . $program->image))) {

            File::delete(public_path('images/programs/' . $program->image));
        }

        $program->delete();

        return redirect()
            ->route('dashboard.programs.index')
            ->with('success', 'تم حذف البرنامج بنجاح');
    }
}