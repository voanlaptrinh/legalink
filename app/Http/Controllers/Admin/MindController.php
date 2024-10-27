<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DetailMind;
use Illuminate\Http\Request;

class MindController extends Controller
{
    public function index(Request $request)
    {
        $query = DetailMind::query();
        if ($request->has('name') && $request->input('name') != '') {
            $query->where('name', 'like', '%' . $request->input('name') . '%');
        }


        $query->orderBy('id', 'desc');
        $minds = $query->paginate(10);

        return view('admin.minds.index', compact('minds'));
    }
    public function create()
    {
      
        return view('admin.minds.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string|max:255',
            
        ], [
            'name.required' => 'Tiêu đề là bắt buộc.',
            'name.string' => 'Tiêu đề phải là chuỗi.',
            'name.max' => 'Tiêu đề không được vượt quá 255 ký tự.',
            'description.string' => 'Mô tả phải là chuỗi.',
            'description.max' => 'nội dung không được vượt quá 255 ký tự.',
           
        ]);
        DetailMind::create([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            
        ]);
     
        return redirect()->route('minds.index')->with('success', 'Dữ liệu đã được thêm thành công!');
    }
    public function edit($id)
    {
      $mind = DetailMind::find($id);
        return view( 'admin.minds.edit',compact('mind'));
    }
    public function update(Request $request, $id)
    {  $request->validate([
        'name' => 'required|string|max:255',
        'description' => 'nullable|string|max:255',
        
    ], [
        'name.required' => 'Tiêu đề là bắt buộc.',
        'name.string' => 'Tiêu đề phải là chuỗi.',
        'name.max' => 'Tiêu đề không được vượt quá 255 ký tự.',
        'description.string' => 'Mô tả phải là chuỗi.',
        'description.max' => 'nội dung không được vượt quá 255 ký tự.',
       
    ]);

        $questions = DetailMind::findOrFail($id);

        

        $questions->update([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            
        ]);

        return redirect()->route('minds.index')->with('success', 'Dữ liệu đã được cập nhật thành công!');
    }
    public function destroy($id)
    {
        $questions = DetailMind::findOrFail($id);

        $questions->delete();
        return redirect()->route('minds.index')->with('success', 'Dữ liệu đã được xóa thành công!');
    }
}
