<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Founder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class FounderController extends Controller
{
    public function index()
    {
        $founders=Founder::orderBy('order')->get();
        return view('dashboard.founders.index',compact('founders'));
    }

    public function create()
    {
        return view('dashboard.founders.create');
    }

    public function store(Request $request)
    {
        $data=$request->validate([
            'name'=>'required|max:255',
            'image'=>'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'quote'=>'nullable',
            'description'=>'nullable',
            'order'=>'required|integer|min:0',
        ]);

        if($request->hasFile('image')){
            $image=time().'.'.$request->image->extension();
            $request->image->move(
                public_path('images/founders'),
                $image
            );
            $data['image']=$image;
        }

        $data['status']=$request->has('status');

        Founder::create($data);

        return redirect()
        ->route('dashboard.founders.index')
        ->with('success','تم إضافة المؤسس بنجاح');
    }

    public function edit(Founder $founder)
    {
        return view('dashboard.founders.edit',compact('founder'));
    }

    public function update(Request $request, Founder $founder)
    {
        $data=$request->validate([
            'name'=>'required|max:255',
            'image'=>'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'quote'=>'nullable',
            'description'=>'nullable',
            'order'=>'required|integer|min:0',
        ]);

        if($request->hasFile('image')){
            if($founder->image && File::exists(public_path('images/founders/'.$founder->image))){
                File::delete(public_path('images/founders/'.$founder->image));
            }

            $image=time().'.'.$request->image->extension();

            $request->image->move(
                public_path('images/founders'),
                $image
            );

            $data['image']=$image;
        }

        $data['status']=$request->has('status');

        $founder->update($data);

        return redirect()
        ->route('dashboard.founders.index')
        ->with('success','تم تعديل بيانات المؤسس بنجاح');
    }

    public function destroy(Founder $founder)
    {
        if($founder->image && File::exists(public_path('images/founders/'.$founder->image))){
            File::delete(public_path('images/founders/'.$founder->image));
        }

        $founder->delete();

        return redirect()
        ->route('dashboard.founders.index')
        ->with('success','تم حذف المؤسس بنجاح');
    }
}