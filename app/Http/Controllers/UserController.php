<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function uploadAvatar(Request $request)
    {
        if ($request->hasFile('image')) {
            $filename = $request->image->getClientOriginalName();
            $this->deleteOldImage();
            $request->image->storeAs('images', $filename, 'public');
            auth()->user()->update(['avatar'=>$filename]);
            return redirect()->back()->with('message', 'Image Uploaded !');
        }
        return redirect()->back()->with('error', 'Image not Uploaded !');
    }

    protected function deleteOldImage()
    {
        if (auth()->user()->avatar) {
            Storage::delete('public/images/'.auth()->user()->avatar);
        }
    }
}
