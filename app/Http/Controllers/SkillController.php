<?php

namespace App\Http\Controllers;

use App\Models\skill;
use Illuminate\Http\Request;

class SkillController extends Controller
{
    public function index(){
        $skills=skill::all();
        return view('users.skills.index',compact('skills'));

    }
    public function create(){
        return view('users.skills.create');
    }
    public function store(Request $request){
        $validated=$request->validate([
            'name'=>'requried',
            'proficiency'=>'required'
        ]);
        skill::create($validated);
        return redirect()->route('users.skills.index')->with('sucess','skill created sucessfully');
    }
    public function edit($id)
    {
        $skill = Skill::findOrFail($id); // Find the skill by ID
        return view('portfolio.edit_skill', compact('skill'));
    }
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required',
            'proficiency' => 'required',
        ]);
        $skill = Skill::findOrFail($id);
        $skill->update($validated);
        return redirect()->route('users.skills.index')->with('success', 'Skill updated successfully!');
    }
    public function delete($id)
    {
        $skills = Skill::findOrFail($id);
        $skills->delete();
        return redirect()->route('users.skills.index')->with('success', 'Skill deleted successfully!');
    }
}
