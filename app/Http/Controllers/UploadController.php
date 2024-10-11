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
        
        // Tạo tên tệp tin ngẫu nhiên
        $filename = uniqid() . '.' . $file->getClientOriginalExtension();
        
        // Đích đến là thư mục public/source/news
        $destinationPath = public_path('source/tyni');
        
        // Di chuyển tệp tin đến public/source/news
        $file->move($destinationPath, $filename);
    
        // Đường dẫn URL tới hình ảnh vừa tải lên
        $location = asset('source/tyni/' . $filename);
    
        return response()->json(['location' => $location]);
    }
    
    
}
