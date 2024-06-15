<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Image;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;


class ImagesController extends Controller{

  public function store(Request $request){

  
    $user_in_session = Auth::user();


    if ($user_in_session->image) {

      // Delete the old image file from storage
       Storage::disk('public')->delete($user_in_session->image->url);

      $user_in_session->image->delete();
    }

    $validatedData = $request->validate([
         'url' => 'required|image',
         'imageable_type' => 'required',
         'imageable_id' => 'required',
     ]);

     $imagePath = $request->file('url')->store('images', 'public');




     $image = Image::create([
         'url' => $imagePath,
         'imageable_type' => $validatedData['imageable_type'],
         'imageable_id' => $validatedData['imageable_id'],
     ]);

     // Associate the new image with the user
     $user_in_session->image()->save($image);

     return redirect()->back()->with('success', 'Image uploaded successfully');
   }
}
