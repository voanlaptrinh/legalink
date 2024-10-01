<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ArticlesService;
use App\Models\Members;
use App\Models\MenusServices;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ArticleServiceController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');

        $articles = ArticlesService::when($search, function ($query, $search) {
            return $query->where('name', 'like', "%{$search}%");
        })->paginate(20);
        return view('admin.articles.index', compact('articles', 'search'));
    }
    public function create()
    {
        $menus = MenusServices::all();
        $members = Members::all();

        return view('admin.articles.create', compact('menus', 'members'));
    }

    public function store(Request $request)
    {
        // Validate input data
        $validatedData = $request->validate([
            'menus_services_id' => 'required|exists:menus_services,id',
            'name' => 'required|string|max:255',
            'content' => 'required',
            'members_ids' => 'required|array', // Expecting an array of member IDs
        ], [
            'menus_services_id.required' => 'Trường này là bắt buộc.',
            'menus_services_id.exists' => 'Dịch vụ không tồn tại trong danh sách.',
            'name.required' => 'Tên là bắt buộc.',
            'name.string' => 'Tên phải là một chuỗi.',
            'name.max' => 'Tên không được vượt quá 255 ký tự.',
            'content.required' => 'Nội dung là bắt buộc.',
            'members_ids.required' => 'Cần chọn ít nhất một thành viên.',
            'members_ids.array' => 'Danh sách thành viên không hợp lệ.',
        ]);

        // Create new article service
        $article = new ArticlesService();
        $article->name = $validatedData['name'];
        $article->content = $validatedData['content'];
        $article->menus_services_id = $validatedData['menus_services_id'];
        $article->alias = $request->alias;

        // Lưu danh sách các thành viên (dưới dạng JSON)
        $article->setMembers($validatedData['members_ids']);

        $article->save();
        $alias = Str::slug($request->input('name'), separator: '-') . '-' . $article->id;

        // Cập nhật alias cho danh mục
        $article->update(['alias' => $alias]);

        return redirect()->route('article.index')->with('success', 'Article created successfully!');
    }
    public function edit($id)
    {
        $article = ArticlesService::findOrFail($id);
        $members = Members::all(); // Lấy danh sách tất cả thành viên
        $menus = MenusServices::all();
        return view('admin.articles.edit', compact('article', 'members','menus'));
    }
    public function update(Request $request, $id)
    {
        // Validate input data
        $validatedData = $request->validate([
            'menus_services_id' => 'required|exists:menus_services,id',
            'name' => 'required|string|max:255',
            'content' => 'required',
            'members_ids' => 'required|array', // Expecting an array of member IDs
        ], [
            'menus_services_id.required' => 'Trường này là bắt buộc.',
            'menus_services_id.exists' => 'Dịch vụ không tồn tại trong danh sách.',
            'name.required' => 'Tên là bắt buộc.',
            'name.string' => 'Tên phải là một chuỗi.',
            'name.max' => 'Tên không được vượt quá 255 ký tự.',
            'content.required' => 'Nội dung là bắt buộc.',
            'members_ids.required' => 'Cần chọn ít nhất một thành viên.',
            'members_ids.array' => 'Danh sách thành viên không hợp lệ.',
        ]);

        // Find the existing article service
        $article = ArticlesService::findOrFail($id);
        $alias = Str::slug($request->input('name'), '-') . '-' . $id;
        // Update the article with the validated data
        $article->name = $validatedData['name'];
        $article->content = $validatedData['content'];
        $article->menus_services_id = $validatedData['menus_services_id'];
        $article->alias = $alias;

        // Cập nhật danh sách các thành viên (dưới dạng JSON)
        $article->setMembers($validatedData['members_ids']);

        // Save the changes
        $article->save();

        return redirect()->route('article.index')->with('success', 'Article updated successfully!');
    }
    public function destroy($id)
    {
        // Tìm danh mục theo ID và xóa
        $article = ArticlesService::findOrFail($id);
      
        $article->delete();

        return redirect()->route('article.index')->with('success', 'bài viết danh mục đã được xóa thành công!');
    }
    public function detail($id)
    {
        $article = ArticlesService::findOrFail($id);
        $members = Members::all(); // Lấy danh sách tất cả thành viên
        $menus = MenusServices::all();
        return view('admin.articles.detail', compact('article', 'members','menus'));
    }
}
