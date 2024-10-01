<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Models\Files;
use App\Models\MenusServices;
use App\Models\Sliders;
use App\Models\Webconfigs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class LawController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $webConfig = Webconfigs::find(1);
        $sliders = Sliders::all();
        $menus = MenusServices::whereNull('parent_id')->with('children')->get();
        $files = Files::when($search, function ($query, $search) {
            return $query->where('name', 'like', "%{$search}%");
        })->paginate(20);
        return view('users.files.index', compact('files', 'search','webConfig','menus','sliders'));
    }
    public function download($id)
    {
        // Kiểm tra xem người dùng đã đăng nhập hay chưa
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Bạn cần đăng nhập để tải xuống file.');
        }

        // Lấy thông tin file
        $file = Files::findOrFail($id);

        // Lấy thông tin người dùng
        $user = Auth::user();

        // Kiểm tra số dư tài khoản của người dùng
        if ($user->price < $file->price) {
            return redirect()->back()->with('error', 'Số dư trong tài khoản của bạn không đủ để tải file này.');
        }

        // Trừ số tiền từ tài khoản của người dùng
        $user->price -= $file->price;
        $user->save();

        // Tạo đường dẫn tới file
        $filePath = $file->file;

        // Kiểm tra nếu file tồn tại trong storage
        if (!$filePath) {
            return redirect()->back()->with('error', 'File không tồn tại.');
        }

        // Nếu file tồn tại, thực hiện tải file xuống
        return Storage::disk('public')->download($filePath);
    }
}
