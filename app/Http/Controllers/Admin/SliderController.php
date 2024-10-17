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
            'description' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,sv',
        ], [
            'title.required' => 'Tiêu đề là bắt buộc.',
            'title.string' => 'Tiêu đề phải là chuỗi.',
            'title.max' => 'Tiêu đề không được vượt quá 255 ký tự.',
            'description.string' => 'Mô tả phải là chuỗi.',
            'description.max' => 'Mô tả không quá 255 kí tự.',
            'image.image' => 'Tệp tin phải là hình ảnh.',
            'image.mimes' => 'Hình ảnh phải có định dạng jpeg, png, jpg, gif, hoặc svg.',
        ]);


        $imagePath = null;

        // Kiểm tra nếu có file hình ảnh được upload
        if ($request->hasFile('image')) {
            $image = $request->file('image');

            // Kiểm tra tính hợp lệ của file hình ảnh
            if ($image->isValid()) {
                $imageExtension = $image->getClientOriginalExtension(); // Lấy đuôi file
                $imageName = Str::random(10) . '.' . $imageExtension; // Tạo tên ngẫu nhiên cho hình ảnh
                $imagePath = 'source/slider/' . $imageName; // Đường dẫn sẽ lưu file

                // Lưu hình ảnh vào thư mục public/source/slider
                $image->move(public_path('source/slider'), $imageName);

                // Kiểm tra xem file đã được lưu thành công
                if (!file_exists(public_path($imagePath))) {
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
            'description' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
        ], [
            'title.required' => 'Tiêu đề là bắt buộc.',
            'title.string' => 'Tiêu đề phải là chuỗi.',
            'title.max' => 'Tiêu đề không được vượt quá 255 ký tự.',
            'description.string' => 'Mô tả phải là chuỗi.',
            'description.max' => 'Mô tả không quá 255 kí tự.',
            'image.image' => 'Tệp tin phải là hình ảnh.',
            'image.mimes' => 'Hình ảnh phải có định dạng jpeg, png, jpg, gif, hoặc svg.',
        ]);

        $slider = Sliders::findOrFail($id);

        $imagePath = $slider->image;

        // Kiểm tra nếu có file hình ảnh được upload
        if ($request->hasFile('image')) {
            // Xóa ảnh cũ nếu có
            if ($slider->image && file_exists(public_path($slider->image))) {
                unlink(public_path($slider->image));
            }

            // Xử lý file hình ảnh mới
            $image = $request->file('image');
            $imageExtension = $image->getClientOriginalExtension(); // Lấy đuôi file
            $imageName = Str::random(10) . '.' . $imageExtension; // Tạo tên ngẫu nhiên cho hình ảnh
            $imagePath = 'source/slider/' . $imageName; // Đường dẫn sẽ lưu file

            // Di chuyển hình ảnh vào thư mục public/source/upload
            $image->move(public_path('source/slider'), $imageName);
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
            // Construct the path for the existing image in the public directory
            $imagePath = public_path($slider->image);
            
            // Check if the file exists and delete it
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }
        $slider->delete();
        return redirect()->route('sliders.index')->with('success', 'Sliders đã được xóa thành công!');
    }
}
