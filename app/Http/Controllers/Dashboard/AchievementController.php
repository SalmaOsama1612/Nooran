<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Achievement;
use App\Models\AchievementImage;
use Illuminate\Http\Request;

class AchievementController extends Controller
{
    public function index()
    {
        $achievement = Achievement::with('images')->first();

        return view('dashboard.achievement.index', compact('achievement'));
    }


    public function update(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'nullable',
            'video' => 'nullable|mimes:mp4,mov,avi|max:50000',
            'images.*' => 'nullable|image'
        ]);


        $achievement = Achievement::first();


        if(!$achievement){

            $achievement = new Achievement();

        }


        $achievement->title = $request->title;

        $achievement->description = $request->description;

        $achievement->status = $request->status ?? 0;



        if($request->hasFile('video')){

            $videoName = time().'.'.$request->video->extension();


            $request->video->move(
                public_path('videos/achievements'),
                $videoName
            );


            $achievement->video = $videoName;

        }


        $achievement->save();



        if($request->hasFile('images')){


            foreach($request->file('images') as $image){


                $imageName = time().'_'.$image->getClientOriginalName();


                $image->move(
                    public_path('images/achievements'),
                    $imageName
                );


                AchievementImage::create([

                    'achievement_id'=>$achievement->id,

                    'image'=>$imageName

                ]);

            }

        }



        return back()->with('success','تم تحديث الإنجازات بنجاح');

    }
    public function deleteImage($id)
{
    $image = AchievementImage::findOrFail($id);

    $path = public_path('images/achievements/'.$image->image);

    if(file_exists($path)){

        unlink($path);

    }

    $image->delete();

    return back()->with('success','تم حذف الصورة بنجاح');
}
}