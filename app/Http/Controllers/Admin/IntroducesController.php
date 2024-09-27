<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Introduces;
use Illuminate\Http\Request;

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
            'content' => 'required|string', 
            'description' => 'required|string', 

        ], [
            'name.required' => 'Vui lòng nhập tên.',
            'name.string' => 'Tên phải là một chuỗi.',
            'content.required' => 'Vui lòng nhập nội dung.',
            'content.string' => 'Nội dung phải là một chuỗi.', 
            'description.required' => 'Vui lòng nhập mô tả ngắn.',
            'description.string' => 'mô tả ngắn phải là một chuỗi.', 
        ]);

        $introduces = Introduces::find(1); 
        // Update other fields
        $introduces->update([
            'name' => $request->input('name'),
            'content' => $request->input('content'),
            'description' => $request->input('description'),
            
        ]);
        $introduces->save();
        return redirect()->back()->with('success', 'Đã update thành công!');
    }
}
