<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class Userscontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user=User::all();
        return view('users.manageusers.index',compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('users.manageusers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'email'=>'required',
            'role'=>'required'
        ]);
        User::create($request->all());
        return redirect()->route('users.manageusers.index')->with('sucess');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user=User::findorfail($id);
        return view('users.manageusers.edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name'=>'required',
            'email'=>'required',
            'role'=>'required'
        ]);
        $user = User::findOrFail($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->role = $request->role;
        $user->save();
        return redirect()->route('users.manageusers.index')->with('SUCESS');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(string $id)
    {
        $user= User::findorfail($id);
        $user->delete();
        return redirect()->route('users.manageusers.index')->with('sucsessfully updated');
    }
}
