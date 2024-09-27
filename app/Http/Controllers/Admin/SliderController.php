<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Sliders;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class SliderController extends Controller
{
    public function index(Request $request)
    {
        $sliders = Sliders::orderBy('id', 'asc')->get();
        return view('admin.sliders.index', compact('sliders'));
    }
    public function create()
    {
      
        return view('admin.sliders.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,sv',
        ], [
            'title.required' => 'Tiêu đề là bắt buộc.',
            'title.string' => 'Tiêu đề phải là chuỗi.',
            'title.max' => 'Tiêu đề không được vượt quá 255 ký tự.',
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

        Sliders::create([
            'title' => $request->input('title'),
            // 'alias' => $alias,
            'description' => $request->input('description'),
         
            'image' => $imagePath,
        ]);
        return redirect()->route('sliders.index')->with('success', 'Sliders đã được thêm thành công!');
    }
    public function edit($id)
    {
        $slider = Sliders::where('id', $id)->firstOrFail();
        return view('admin.sliders.edit', compact('slider'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
        ], [
            'title.required' => 'Tiêu đề là bắt buộc.',
            'title.string' => 'Tiêu đề phải là chuỗi.',
            'title.max' => 'Tiêu đề không được vượt quá 255 ký tự.',
            'description.string' => 'Mô tả phải là chuỗi.',
            'image.image' => 'Tệp tin phải là hình ảnh.',
            'image.mimes' => 'Hình ảnh phải có định dạng jpeg, png, jpg, gif, hoặc svg.',
        ]);

        $slider = Sliders::findOrFail($id);

        $imagePath = $slider->image;
        if ($request->hasFile('image')) {
            if ($slider->image && file_exists(storage_path('app/public/' . $slider->image))) {
                unlink(storage_path('app/public/' . $slider->image));
            }
            $image = $request->file('image');
            $imageExtension = $image->getClientOriginalExtension();
            $imageName = Str::random(10) . '.' . $imageExtension;
            $imagePath = $image->storeAs('images', $imageName, 'public');
        }

        $slider->update([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'image' => $imagePath,
        ]);

        return redirect()->route('sliders.index')->with('success', 'Sliders đã được cập nhật thành công!');
    }

    public function destroy($id)
    {
        $slider = Sliders::findOrFail($id);

        if ($slider->image) {
            $imagePath = storage_path('app/public/' . $slider->image);
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }
        $slider->delete();
        return redirect()->route('sliders.index')->with('success', 'Sliders đã được xóa thành công!');
    }

}
