<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MenusServices;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class MenuServiceController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');

        // Tìm kiếm và phân trang
        $categories = MenusServices::when($search, function ($query, $search) {
            return $query->where('title', 'like', "%{$search}%");
        })->paginate(20);

        // Trả về view với dữ liệu phân trang và từ khóa tìm kiếm
        return view('admin.menuservice.index', [
            'categories' => $categories,
            'search' => $search,
        ]);
    }
    public function create()
    {
        // Fetch all categories to allow selection of a parent category
        $categories = MenusServices::all();

        return view('admin.menuservice.create', compact('categories'));
    }
    public function store(Request $request)
    {
        // Xác thực dữ liệu
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string|max:255',
            'parent_id' => 'nullable|exists:menus_services,id',
        ], [
            'title.required' => 'Tên danh mục không được để trống',
            'title.string' => 'Tên danh mục phải là một chuỗi',
            'title.max' => 'Tên danh mục không quá 255 ký tự',
            'description.string' => 'Mô tả danh mục phải là một chuỗi',
            'description.max' => 'Mô tả danh mục không quá 255 ký tự',
            'parent_id.exists' => 'Danh mục cha không hợp lệ',
           
        ]);
       
        // Tạo mới danh mục
        $category = MenusServices::create([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'parent_id' => $request->input(key: 'parent_id'),
        ]);
        // Tạo alias với id sau khi bản ghi đã được lưu
        $alias = Str::slug($request->input('title'), '-') . '-' . $category->id;

        // Cập nhật alias cho danh mục
        $category->update(['alias' => $alias]);

        return redirect()->route('menuservice.index')->with('success', 'Danh mục đã được thêm thành công!');
    }
    public function edit($alias)
    {
        // Tìm danh mục theo alias
        $category = MenusServices::where('alias', $alias)->firstOrFail();

        // Lấy tất cả các danh mục để chọn danh mục cha (ngoại trừ chính danh mục đó)
        $categories = MenusServices::where('id', '!=', $category->id)->get();

        // Trả về view chỉnh sửa với danh mục và danh sách danh mục cha
        return view('admin.menuservice.edit', [
            'category' => $category,
            'categories' => $categories
        ]);
    }

    public function update(Request $request, $id)
    {
        // Xác thực dữ liệu
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string|max:255',
            'parent_id' => 'nullable|exists:menus_services,id', // Validate parent_id
           
        ], [
            'title.required' => 'Tên danh mục không được để trống',
            'title.string' => 'Tên danh mục phải là một chuỗi',
            'title.max' => 'Tên danh mục không quá 255 ký tự',
            'description.string' => 'Mô tả danh mục phải là một chuỗi',
            'description.max' => 'Mô tả danh mục không quá 255 ký tự',
            'parent_id.exists' => 'Danh mục cha không hợp lệ',
           
        ]);

        // Tìm danh mục theo ID
        $category = MenusServices::findOrFail($id);
       
        // Kiểm tra alias mới có trùng hay không
        $alias = Str::slug($request->input('title'), '-') . '-' . $id;
        // Cập nhật danh mục
        $category->update([
            'title' => $request->input('title'),
            'alias' => $alias,
            'description' => $request->input('description'),
            'parent_id' => $request->input('parent_id'), // Cập nhật danh mục cha
           
        ]);

        return redirect()->route('menuservice.index')->with('success', 'Danh mục đã được cập nhật thành công!');
    }

    public function destroy($id)
    {
        // Tìm danh mục theo ID và xóa
        $category = MenusServices::findOrFail($id);
      
        $category->delete();

        return redirect()->route('menuservice.index')->with('success', 'Danh mục đã được xóa thành công!');
    }
}
