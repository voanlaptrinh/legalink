<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Members;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class MemberController extends Controller
{
    public function index(Request $request)
    {
        $query = Members::query();
        if ($request->has('name') && $request->input('name') != '') {
            $query->where('name', 'like', '%' . $request->input('name') . '%');
        }


        $query->orderBy('id', 'desc');
        $members = $query->paginate(10);

        return view('admin.members.index', compact('members'));
    }
    public function create()
    {
      
        return view('admin.members.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'content' => 'nullable|string',
            'phone' => 'required|string|regex:/^[0-9]{10}$/',
            'email' => 'required|email',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,sv',
        ], [
            'name.required' => 'Tiêu đề là bắt buộc.',
            'name.string' => 'Tiêu đề phải là chuỗi.',
            'name.max' => 'Tiêu đề không được vượt quá 255 ký tự.',
            'description.string' => 'Mô tả phải là chuỗi.',
            'content.string' => 'Nội dung phải là chuỗi.',
            'image.image' => 'Tệp tin phải là hình ảnh.',
            'image.mimes' => 'Hình ảnh phải có định dạng jpeg, png, jpg, gif, hoặc svg.',
            'phone.required' => 'Vui lòng nhập số điện thoại.',
            'phone.string' => 'Số điện thoại phải là một chuỗi.',
            'phone.regex' => 'Số điện thoại phải có đúng 10 chữ số.',
            'email.required' => 'Vui lòng nhập email.',
            'email.email' => 'Email không hợp lệ.',
        ]);

        $alias = Str::slug($request->input('name'));

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

        $member = Members::create([
            'name' => $request->input('name'),
            // 'alias' => $alias,
            'description' => $request->input('description'),
            'content' => $request->input('content'),
            'phone' => $request->input('phone'),
            'email' => $request->input('email'),
            'image' => $imagePath,
        ]);
        $alias = Str::slug($request->input('name'), '-') . '-' . $member->id;
        $member->update(['alias' => $alias]);
        return redirect()->route('members.index')->with('success', 'Thành viên đã được thêm thành công!');
    }

    public function edit($alias)
    {
        $member = Members::where('alias', $alias)->firstOrFail();
        return view('admin.members.edit', compact('member'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'content' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
            'phone' => 'required|string|regex:/^[0-9]{10}$/',
            'email' => 'required|email',
        ], [
            'name.required' => 'Tiêu đề là bắt buộc.',
            'name.string' => 'Tiêu đề phải là chuỗi.',
            'name.max' => 'Tiêu đề không được vượt quá 255 ký tự.',
            'description.string' => 'Mô tả phải là chuỗi.',
            'content.string' => 'Nội dung phải là chuỗi.',
            'phone.required' => 'Vui lòng nhập số điện thoại.',
            'phone.string' => 'Số điện thoại phải là một chuỗi.',
            'phone.regex' => 'Số điện thoại phải có đúng 10 chữ số.',
            'email.required' => 'Vui lòng nhập email.',
            'email.email' => 'Email không hợp lệ.',
            'image.image' => 'Tệp tin phải là hình ảnh.',
            'image.mimes' => 'Hình ảnh phải có định dạng jpeg, png, jpg, gif, hoặc svg.',
        ]);

        $news = Members::findOrFail($id);
        $alias = Str::slug($request->input('name'), '-' ). '-' . $id;

        $imagePath = $news->image;
        if ($request->hasFile('image')) {
            if ($news->image && file_exists(storage_path('app/public/' . $news->image))) {
                unlink(storage_path('app/public/' . $news->image));
            }
            $image = $request->file('image');
            $imageExtension = $image->getClientOriginalExtension();
            $imageName = Str::random(10) . '.' . $imageExtension;
            $imagePath = $image->storeAs('images', $imageName, 'public');
        }

        $news->update([
            'name' => $request->input('name'),
            'alias' => $alias,
            'description' => $request->input('description'),
            'content' => $request->input('content'),
            'phone' => $request->input('phone'),
            'email' => $request->input('email'),
            'image' => $imagePath,
        ]);

        return redirect()->route('members.index')->with('success', 'Thành viên đã được cập nhật thành công!');
    }
    public function destroy($id)
    {
        $members = Members::findOrFail($id);

        if ($members->image) {
            $imagePath = storage_path('app/public/' . $members->image);
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }
        $members->delete();
        return redirect()->route('members.index')->with('success', 'Thành viên đã được xóa thành công!');
    }
    public function detail($alias)
    {
        $member = Members::where('alias', $alias)->firstOrFail();
        return view('admin.members.detail', compact('member'));
    }
}
