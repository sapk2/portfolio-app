<?php

namespace App\Http\Controllers;

use App\Models\resume;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;


class Resumecontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $resume = resume::all();
        return view('users.resumes.index', compact('resume'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('users.resumes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'pdf_path' => 'required'

        ]);
        if ($request->hasFile('pdf_path')) {

            $file = $request->file('pdf_path');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $filePath = $file->storeAs('', $fileName);
        }
        $data['pdf_path'] = str_replace('public/', 'storage/', $filePath);
        resume::create($data);
        return redirect()->route('users.resumes.index')->with('sucess', 'Data saved successfully!');
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
        $resume = resume::findorfail($id);
        return view('users.resumes.edit', compact('resume'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $resume = Resume::findOrFail($id);
    
        $data = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'pdf_path' => 'nullable|array', 
            'pdf_path.*' => 'file|mimes:pdf|max:2048', // Validate each file in the array
        ]);
    
        if ($request->hasFile('pdf_path')) {
            $filePaths = []; // To store paths of uploaded files
            foreach ($request->file('pdf_path') as $file) {
                $fileName = time() . '_' . $file->getClientOriginalName();
                $filePath = $file->storeAs('', $fileName); // Store in the 'public/uploads' directory
                $filePaths[] = str_replace('public/', 'storage/', $filePath);
            }
            // If you only need the last uploaded file:
            $resume->pdf_path = end($filePaths);
        }
    
        $resume->update($request->except('pdf_path') + ['pdf_path' => $resume->pdf_path ?? $resume->pdf_path]);
    
        return redirect()
            ->route('users.resumes.index')
            ->with('success', 'Notice updated successfully');
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function delete(string $id)
    {
        try {
            $resume = resume::findorfail($id);
            if ($resume->pdf_path) {

                $filePath = str_replace('storage/', 'public', $resume->pdf_path);
                Storage::delete($filePath);
            }
            $resume->delete();
            return redirect()->back()->with('success', 'Resume deleted successfully!');
        } catch (ModelNotFoundException $e) {
            return redirect()->back()->with('error', 'Resume not found!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred while deleting the resume.');
        }
    }
}
