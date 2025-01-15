<?php

namespace App\Http\Controllers;

use App\Models\aboutme;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $aboutme= aboutme::first();
        return view('users.aboutme.index',compact('aboutme'));
    }
    public function update(Request $request){

        $validated=$request->validate([
            'name'=>'required',
            'job_title'=>'required',
            'bio'=>'required',
            'skills'=>'required',
            'education'=>'required',
            'experience'=>'required',
            'achievements'=>'required',
            'hobbies'=>'required',
            'goals'=>'required',
        ]);
        $aboutme=aboutme::first();
        if (!$aboutme) {
            $aboutme=new aboutme();
        }
        $aboutme->name = $validated['name'];
        $aboutme->job_title = $validated['job_title'];
        $aboutme->bio = $validated['bio'];
        $aboutme->skills = $validated['skills'];
        $aboutme->education = $validated['education'];
        $aboutme->experience = $validated['experience'];
        $aboutme->achievements = $validated['achievements'];
        $aboutme->hobbies = $validated['hobbies'];
        $aboutme->goals = $validated['goals'];
        $aboutme->save();
        return redirect()->back()->with('success', 'About Us content updated successfully.');
    }

}
