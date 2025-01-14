<?php

namespace App\Http\Controllers;

use App\Models\project;
use Illuminate\Http\Request;

class Projectcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $project =project::all();
        return view('users.projects.index',compact('project'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       return view('users.projects.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data=$request->validate([
            'title'=>'required',
            'description'=>'required',
            'github_link'=>'nullable|url',
            'completion_date'=>'required',
        ]);
        project::create($data);
        return redirect()->route('users.projects.index')->with('sucess','project created sucessfully');

    }

    /**
     * Display the specified resource.
     */


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
       $project=project::findorfail($id);
       return view('users.projects.edit',compact('project'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data=$request->validate([
            'title'=>'required',
            'description'=>'required',
            'github_link'=>'nullable|url',
            'completion_date'=>'required',
        ]);
        $project = project::findOrFail($id);
        $project->update($data);
        return redirect()->route('users.projects.index')->with('sucess','sucessfully update');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(string $id)
    {
        try {
            $project = project::findOrFail($id);
            $project->delete();
            return redirect()->route('users.projects.index')->with('success', 'Project deleted successfully');
        } catch (\Exception $e) {
            return redirect()->route('users.projects.index')->with('error', 'Error deleting project');
        }
    }
}
