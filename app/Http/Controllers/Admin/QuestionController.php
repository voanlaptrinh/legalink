<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Questions;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function index(Request $request)
    {
        $query = Questions::query();
        if ($request->has('name') && $request->input('name') != '') {
            $query->where('name', 'like', '%' . $request->input('name') . '%');
        }


        $query->orderBy('id', 'desc');
        $questions = $query->paginate(10);

        return view('admin.questions.index', compact('questions'));
    }
    public function create()
    {
      
        return view('admin.questions.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            
        ], [
            'name.required' => 'Tiêu đề là bắt buộc.',
            'name.string' => 'Tiêu đề phải là chuỗi.',
            'name.max' => 'Tiêu đề không được vượt quá 255 ký tự.',
            'description.string' => 'Mô tả phải là chuỗi.',

        ]);
        Questions::create([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            
        ]);
     
        return redirect()->route('questions.admin')->with('success', 'Câu hỏi đã được thêm thành công!');
    }
    public function edit($id)
    {
      $question = Questions::find($id);
        return view('admin.questions.edit',compact('question'));
    }
    public function update(Request $request, $id)
    {  $request->validate([
        'name' => 'required|string|max:255',
        'description' => 'nullable|string',
        
    ], [
        'name.required' => 'Tiêu đề là bắt buộc.',
        'name.string' => 'Tiêu đề phải là chuỗi.',
        'name.max' => 'Tiêu đề không được vượt quá 255 ký tự.',
        'description.string' => 'Mô tả phải là chuỗi.',
       
       
    ]);

        $questions = Questions::findOrFail($id);

        

        $questions->update([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            
        ]);

        return redirect()->route('questions.admin')->with('success', 'Câu hỏi đã được cập nhật thành công!');
    }
    public function destroy($id)
    {
        $questions = Questions::findOrFail($id);

        $questions->delete();
        return redirect()->route('questions.admin')->with('success', 'Câu hỏi đã được xóa thành công!');
    }
}
