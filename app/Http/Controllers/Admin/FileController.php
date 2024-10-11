<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Files;
use Illuminate\Support\Facades\Storage;

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
        $filePath = null;
        $imagePath = null;

        // Xử lý file tải lên
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $fileName = time() . '_' . $file->getClientOriginalName();

            // Lưu file trong thư mục public/source/upload
            $file->move(public_path('source/upload'), $fileName);
            $filePath = 'source/upload/' . $fileName; // Đường dẫn lưu file
        }

        // Xử lý hình ảnh (nếu có)
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_image_' . $image->getClientOriginalName();

            // Lưu hình ảnh trong public/source/upload
            $image->move(public_path('source/upload'), $imageName);
            $imagePath = 'source/upload/' . $imageName; // Đường dẫn lưu hình ảnh
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
            // Xóa file cũ nếu tồn tại
            if ($fileRecord->file && file_exists(public_path($fileRecord->file))) {
                unlink(public_path($fileRecord->file));
            }
    
            $file = $request->file('file');
            $fileName = time() . '_' . $file->getClientOriginalName();
    
            // Lưu file vào thư mục public/source/upload
            $file->move(public_path('source/upload'), $fileName);
            
            // Cập nhật đường dẫn vào bản ghi
            $fileRecord->file = 'source/upload/' . $fileName;
        }
    
        // Xóa hình ảnh cũ nếu có và tải lên hình ảnh mới
        if ($request->hasFile('image')) {
            // Xóa hình ảnh cũ nếu tồn tại
            if ($fileRecord->image && file_exists(public_path($fileRecord->image))) {
                unlink(public_path($fileRecord->image));
            }
    
            $image = $request->file('image');
            $imageName = time() . '_image_' . $image->getClientOriginalName();
            
            // Lưu hình ảnh vào thư mục public/source/upload
            $image->move(public_path('source/upload'), $imageName);
            
            // Cập nhật đường dẫn vào bản ghi
            $fileRecord->image = 'source/upload/' . $imageName;
        }
    

        // Lưu thông tin cập nhật vào cơ sở dữ liệu
        $fileRecord->save();

        return redirect()->route('files.index')->with('success', 'File updated successfully!');
    }
    public function destroy($id)
    {
        // Tìm file cần xóa
        $file = Files::findOrFail($id);

        // Xóa file trên hệ thống lưu trữ (nếu tồn tại)
        if ($file->file && file_exists(public_path($file->file))) {
            unlink(public_path($file->file)); // Sử dụng unlink để xóa file
        }
    
        // Xóa hình ảnh trên hệ thống lưu trữ (nếu tồn tại)
        if ($file->image && file_exists(public_path($file->image))) {
            unlink(public_path($file->image)); // Sử dụng unlink để xóa hình ảnh
        }
        // Xóa bản ghi trong cơ sở dữ liệu
        $file->delete();

        // Điều hướng lại danh sách file với thông báo thành công
        return redirect()->route('files.index')->with('success', 'File deleted successfully!');
    }
}
