<?php

namespace App\Http\Controllers;

use App\Models\gallery;
use Illuminate\Http\Request;

class ImageGalleryController extends Controller
{
    public function index(){
        $images=gallery::all();
        return view('users.image-gallery',compact('images'));

    }
    public function upload(Request $request)
    {
        $request->validate([
            'image' => 'required',
            'title' => 'required|string|max:255',
        ]);
    
        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->getClientOriginalExtension();
            $request->image->move(public_path('img'), $imageName);
    
            gallery::create([
                'title' => $request->title,
                'image' => $imageName,
            ]);
    
            return back()->with('success', 'Image Uploaded successfully.');
        }
    
        return back()->withErrors(['image' => 'File upload failed.']);
    }
    
    public function destroy($id)

    {

    	gallery::find($id)->delete();

    	return back()

    		->with('success','Image removed successfully.');	

    } 

}

