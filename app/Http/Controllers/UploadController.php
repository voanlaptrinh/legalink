<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UploadController extends Controller
{
    public function uploadImage(Request $request)
    {
        // Xác thực yêu cầu
        $request->validate([
            'file' => 'required|image|mimes:jpeg,png,jpg,gif',
        ]);
    
        $file = $request->file('file');
        
        $filename = uniqid() . '.' . $file->getClientOriginalExtension();
        
        $path = $file->storeAs('public/images', $filename);
    
        $location = Storage::url($path);
    
        return response()->json(['location' => $location]);
    }
    
}
