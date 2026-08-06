<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Hero;
use Illuminate\Http\Request;

class HeroController extends Controller
{
    public function index()
    {
        $hero = Hero::first();

        return view('dashboard.hero.index', compact('hero'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'nullable',
            'video' => 'nullable|mimes:mp4,mov,avi|max:50000',
            'logo' => 'nullable|image'
        ]);
        $hero = Hero::first();

        if(!$hero){

            $hero = new Hero();

        }

        $hero->title = $request->title;

        $hero->description = $request->description;

        $hero->status = $request->status ?? 0;


        if($request->hasFile('video')){

            $videoName = time().'.'.$request->video->extension();

            $request->video->move(
                public_path('videos'),
                $videoName
            );

            $hero->video = $videoName;

        }


        if($request->hasFile('logo')){

            $logoName = time().'.'.$request->logo->extension();

            $request->logo->move(
                public_path('images'),
                $logoName
            );

            $hero->logo = $logoName;

        }


        $hero->save();


        return back()->with('success','تم تحديث الهيرو بنجاح');

    }
}