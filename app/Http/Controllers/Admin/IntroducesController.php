<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Introduces;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class IntroducesController extends Controller
{
    public function index(Request $request)
    {
        $introduces = Introduces::find(1);
        return view('admin.introduce.index', compact('introduces'));
    }


    public function update(Request $request)
    {

        // Validate the form data
        $request->validate([
            'name' => 'required|string', 
            'name_ceo' => 'required|string', 
            'content' => 'required|string', 
            'description' => 'required|string', 

        ], [
            'name.required' => 'Vui lòng nhập tên.',
            'name.string' => 'Tên phải là một chuỗi.',
            'name_ceo.required' => 'Vui lòng nhập tên.',
            'name_ceo.string' => 'Tên phải là một chuỗi.',
            'content.required' => 'Vui lòng nhập nội dung.',
            'content.string' => 'Nội dung phải là một chuỗi.', 
            'description.required' => 'Vui lòng nhập mô tả ngắn.',
            'description.string' => 'mô tả ngắn phải là một chuỗi.', 
        ]);

        $introduces = Introduces::find(1); 
        if ($request->hasFile('image')) {
            // Xóa logo cũ nếu có
            if ($introduces->image && file_exists(public_path($introduces->image))) {
                unlink(public_path($introduces->image));
            }
    
            // Xử lý file logo mới
            $logo = $request->file('image');
            $logoExtension = $logo->getClientOriginalExtension(); // Lấy đuôi file
            $logoName = Str::random(10) . '.' . $logoExtension; // Tạo tên ngẫu nhiên cho logo
            $logoPath = 'source/logo/' . $logoName; // Đường dẫn sẽ lưu file
    
            // Di chuyển logo vào thư mục public/source/logo
            $logo->move(public_path('source/logo'), $logoName);
    
            // Lưu đường dẫn logo mới vào cơ sở dữ liệu
            $introduces->image = $logoPath;
        }
        // Update other fields
        $introduces->update([
            'name' => $request->input('name'),
            'name_ceo' => $request->input('name_ceo'),
            'content' => $request->input('content'),
            'description' => $request->input('description'),
            
        ]);
        $introduces->save();
        return redirect()->back()->with('success', 'Đã update thành công!');
    }
}
