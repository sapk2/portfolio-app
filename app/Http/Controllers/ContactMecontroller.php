<?php

namespace App\Http\Controllers;

use App\Models\contactme;
use Illuminate\Http\Request;

class ContactMecontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       return view('contact');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);
        contactme::create($request->all());
        return redirect()->route('index')->with('success', 'Your message has been sent successfully!');
    }
    

    /**
     * Display the specified resource.
     */
    public function show()
    {
        $contact=contactme::latest();
        return view('users.contacts.index',compact('contact'));
    }

    
}
