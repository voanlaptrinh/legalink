<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Evaluations;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
class EvaluationsController extends Controller
{
    public function index(Request $request)
    {
        $query = Evaluations::query();
        if ($request->has('name') && $request->input('name') != '') {
            $query->where('name', 'like', '%' . $request->input('name') . '%');
        }


        $query->orderBy('id', 'desc');
        $evaluations = $query->paginate(10);

        return view('admin.evaluations.index', compact('evaluations'));
    }
    public function create()
    {
      
        return view('admin.evaluations.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,sv',
        ], [
            'name.required' => 'Tiêu đề là bắt buộc.',
            'name.string' => 'Tiêu đề phải là chuỗi.',
            'name.max' => 'Tiêu đề không được vượt quá 255 ký tự.',
            'description.string' => 'Mô tả phải là chuỗi.',
            'image.image' => 'Tệp tin phải là hình ảnh.',
            'image.mimes' => 'Hình ảnh phải có định dạng jpeg, png, jpg, gif, hoặc svg.',
        ]);

    
        $imagePath = null;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            if ($image->isValid()) {
                $imageExtension = $image->getClientOriginalExtension();
                $imageName = Str::random(10) . '.' . $imageExtension;
                $imagePath = $image->storeAs('images', $imageName, 'public');
                if (!Storage::disk('public')->exists('images/' . $imageName)) {
                    return redirect()->back()->withErrors('Lỗi khi lưu ảnh.');
                }
            } else {
                return redirect()->back()->withErrors('Ảnh không hợp lệ.');
            }
        }

      Evaluations::create([
            'name' => $request->input('name'),
        
            'description' => $request->input('description'),
            
            'image' => $imagePath,
        ]);
      
        return redirect()->route('evaluations.index')->with('success', 'Đánh giá đã được thêm thành công!');
    }
    public function edit($id)
    {
      $evaluation = Evaluations::find($id);
        return view('admin.evaluations.edit',compact('evaluation'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
        ], [
            'name.required' => 'Tiêu đề là bắt buộc.',
            'name.string' => 'Tiêu đề phải là chuỗi.',
            'name.max' => 'Tiêu đề không được vượt quá 255 ký tự.',
            'description.string' => 'Mô tả phải là chuỗi.',            
            'image.image' => 'Tệp tin phải là hình ảnh.',
            'image.mimes' => 'Hình ảnh phải có định dạng jpeg, png, jpg, gif, hoặc svg.',
        ]);

        $evaluation = Evaluations::findOrFail($id);
   
        $imagePath = $evaluation->image;
        if ($request->hasFile('image')) {
            if ($evaluation->image && file_exists(storage_path('app/public/' . $evaluation->image))) {
                unlink(storage_path('app/public/' . $evaluation->image));
            }
            $image = $request->file('image');
            $imageExtension = $image->getClientOriginalExtension();
            $imageName = Str::random(10) . '.' . $imageExtension;
            $imagePath = $image->storeAs('images', $imageName, 'public');
        }

        $evaluation->update([
            'name' => $request->input('name'),
          
            'description' => $request->input('description'),
            
            'image' => $imagePath,
        ]);

        return redirect()->route('evaluations.index')->with('success', 'Đánh giá đã được cập nhật thành công!');
    }
    public function destroy($id)
    {
        $news = Evaluations::findOrFail($id);

        if ($news->image) {
            $imagePath = storage_path('app/public/' . $news->image);
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }
        $news->delete();
        return redirect()->route('evaluations.index')->with('success', 'Đánh giá đã được xóa thành công!');
    }
}
