<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Files;
class FileController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');

        $files = Files::when($search, function ($query, $search) {
            return $query->where('name', 'like', "%{$search}%");
        })->paginate(20);
        return view('admin.files.index', compact('files', 'search'));
    }
    public function create()
    {
        return view('admin.files.create');
    }

    // Lưu file lên server và lưu thông tin vào cơ sở dữ liệu
    public function store(Request $request)
    {
        // Validate các trường nhập
        $request->validate([
            'name' => 'required|string|max:255',
            'file' => 'required|file|mimes:jpg,jpeg,png,pdf,docx,txt', // Giới hạn loại và kích thước file
            'price' => 'required|integer|min:0',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif', // Ảnh tùy chọn
        ]);

        // Xử lý file tải lên
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $filePath = $file->storeAs('uploads', $fileName, 'public'); // Lưu file trong thư mục public/uploads
        }

        // Xử lý hình ảnh (nếu có)
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_image_' . $image->getClientOriginalName();
            $imagePath = $image->storeAs('uploads/images', $imageName, 'public'); // Lưu hình ảnh trong public/uploads/images
        }

        // Lưu thông tin file vào cơ sở dữ liệu
        Files::create([
            'name' => $request->name,
            'file' => $filePath, // Đường dẫn file đã lưu
            'price' => $request->price,
            'image' => $imagePath ?? null, // Đường dẫn ảnh (nếu có)
        ]);

        return redirect()->route('files.index')->with('success', 'File uploaded successfully!');
    }


    public function edit($id)
    {
        $file = Files::findOrFail($id);
        return view('admin.files.edit', compact('file'));
    }

    // Lưu cập nhật thông tin file
    public function update(Request $request, $id)
    {
        // Validate các trường nhập
        $request->validate([
            'name' => 'required|string|max:255',
            'file' => 'nullable|file|mimes:jpg,jpeg,png,pdf,docx,txt', // File có thể không bắt buộc
            'price' => 'required|integer|min:0',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif', // Ảnh tùy chọn
        ]);

        // Tìm file cần cập nhật
        $fileRecord = Files::findOrFail($id);

        // Cập nhật tên và giá
        $fileRecord->name = $request->name;
        $fileRecord->price = $request->price;

        // Nếu có file mới, xử lý upload file và cập nhật đường dẫn
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $filePath = $file->storeAs('uploads', $fileName, 'public');
            $fileRecord->file = $filePath;
        }

        // Nếu có ảnh mới, xử lý upload hình ảnh
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_image_' . $image->getClientOriginalName();
            $imagePath = $image->storeAs('uploads/images', $imageName, 'public');
            $fileRecord->image = $imagePath;
        }

        // Lưu thông tin cập nhật vào cơ sở dữ liệu
        $fileRecord->save();

        return redirect()->route('files.index')->with('success', 'File updated successfully!');
    }
}
