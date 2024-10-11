<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;


class NewsController extends Controller
{
     public function index(Request $request)
    {
        $query = News::query();
        if ($request->has('name') && $request->input('name') != '') {
            $query->where('title', 'like', '%' . $request->input('name') . '%');
        }


        $query->orderBy('id', 'desc');
        $news = $query->paginate(10);

        return view('admin.news.index', compact('news'));
    }

    public function create()
    {
      
        return view('admin.news.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'content' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,sv',
        ], [
            'title.required' => 'Tiêu đề là bắt buộc.',
            'title.string' => 'Tiêu đề phải là chuỗi.',
            'title.max' => 'Tiêu đề không được vượt quá 255 ký tự.',
            'description.string' => 'Mô tả phải là chuỗi.',
            'content.string' => 'Nội dung phải là chuỗi.',
            'image.image' => 'Tệp tin phải là hình ảnh.',
            'image.mimes' => 'Hình ảnh phải có định dạng jpeg, png, jpg, gif, hoặc svg.',
        ]);

        $alias = Str::slug($request->input('title'));
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
        

        $news = News::create([
            'title' => $request->input('title'),
            // 'alias' => $alias,
            'description' => $request->input('description'),
            'content' => $request->input('content'),
            'image' => $imagePath,
        ]);
        $alias = Str::slug($request->input('title'), '-') . '-' . $news->id;
        $news->update(['alias' => $alias]);
        dd($news);
        return redirect()->route('news.index')->with('success', 'Tin tức đã được thêm thành công!');
    }
    public function edit($alias)
    {
        $news = News::where('alias', $alias)->firstOrFail();
        return view('admin.news.edit', compact('news'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'content' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
        ], [
            'title.required' => 'Tiêu đề là bắt buộc.',
            'title.string' => 'Tiêu đề phải là chuỗi.',
            'title.max' => 'Tiêu đề không được vượt quá 255 ký tự.',
            'description.string' => 'Mô tả phải là chuỗi.',
            'content.string' => 'Nội dung phải là chuỗi.',
            
            'image.image' => 'Tệp tin phải là hình ảnh.',
            'image.mimes' => 'Hình ảnh phải có định dạng jpeg, png, jpg, gif, hoặc svg.',
        ]);

        $news = News::findOrFail($id);
        $alias = Str::slug($request->input('title'), '-' ). '-' . $id;

        $imagePath = $news->image;

        if ($request->hasFile('image')) {
            // Delete the old image from public/source/news if it exists
            if ($news->image && file_exists(public_path($news->image))) {
                unlink(public_path($news->image));
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

        $news->update([
            'title' => $request->input('title'),
            'alias' => $alias,
            'description' => $request->input('description'),
            'content' => $request->input('content'),
            'image' => $imagePath,
        ]);

        return redirect()->route('news.index')->with('success', 'Tin tức đã được cập nhật thành công!');
    }
    public function destroy($id)
    {
        $news = News::findOrFail($id);
        if ($news->image) {
            // Construct the path for the existing image in the public directory
            $imagePath = public_path($news->image);
            
            // Check if the file exists and delete it
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }
        $news->delete();
        return redirect()->route('news.index')->with('success', 'Tin tức đã được xóa thành công!');
    }
    public function detail($alias)
    {
        $news = News::where('alias', $alias)->firstOrFail();
        return view('admin.news.detail', compact('news'));
    }
}
