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
            'description' => 'required|string|max:255',
            'parent_id' => 'nullable|exists:menus_services,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,sv',
        ], [
            'title.required' => 'Tên danh mục không được để trống',
            'title.string' => 'Tên danh mục phải là một chuỗi',
            'title.max' => 'Tên danh mục không quá 255 ký tự',
            'description.required' => 'Mô tả không được để trống',
            'description.string' => 'Mô tả danh mục phải là một chuỗi',
            'description.max' => 'Mô tả danh mục không quá 255 ký tự',
            'parent_id.exists' => 'Danh mục cha không hợp lệ',
            'image.image' => 'Tệp tin phải là hình ảnh.',
            'image.mimes' => 'Hình ảnh phải có định dạng jpeg, png, jpg, gif, hoặc svg.',
        ]);
        $imagePath = null;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            if ($image->isValid()) {
                
                $imageExtension = $image->getClientOriginalExtension();
                $imageName = Str::random(10) . '.' . $imageExtension;
                $destinationPath = public_path('source/news');
        
                $image->move($destinationPath, $imageName);
        
                $imagePath = 'source/news/' . $imageName;
        
                if (!file_exists(public_path($imagePath))) {
                    return redirect()->back()->withErrors('Lỗi khi lưu ảnh.');
                }
            } else {
                return redirect()->back()->withErrors('Ảnh không hợp lệ.');
            }
        }
        // Tạo mới danh mục
        $category = MenusServices::create([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'parent_id' => $request->input(key: 'parent_id'),
            'image' => $imagePath,
        ]);
        // Tạo alias với id sau khi bản ghi đã được lưu
        $alias = Str::slug($request->input('title'), '-') . '-' . $category->id;

        // Cập nhật alias cho danh mục
        $category->update(['alias' => $alias]);

        return redirect()->route('menuservice.index')->with('success', 'Danh mục đã được thêm thành công!');
    }
    public function edit($alias, Request $request)
    {
        // Find category by alias
        $category = MenusServices::where('alias', $alias)->firstOrFail();
    
        // Get all categories except the current one
        $categories = MenusServices::where('id', '!=', $category->id)->get();
    
       
    
        // Return edit view with category and parent categories
        return view('admin.menuservice.edit', [
            'category' => $category,
            'categories' => $categories,
       
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


        $imagePath = $category->image;

        if ($request->hasFile('image')) {
            // Delete the old image from public/source/category if it exists
            if ($category->image && file_exists(public_path($category->image))) {
                unlink(public_path($category->image));
            }
        
            // Upload the new image
            $image = $request->file('image');
            $imageExtension = $image->getClientOriginalExtension();
            $imageName = Str::random(10) . '.' . $imageExtension;
        
            // Move the new image to public/source/news
            $destinationPath = public_path('source/news');
            $image->move($destinationPath, $imageName);
        
            // Store the new image path
            $imagePath = 'source/news/' . $imageName;
        }
        // Cập nhật danh mục
        $category->update([
            'title' => $request->input('title'),
            'alias' => $alias,
            'description' => $request->input('description'),
            'parent_id' => $request->input('parent_id'), // Cập nhật danh mục cha
           'image' => $imagePath,
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
