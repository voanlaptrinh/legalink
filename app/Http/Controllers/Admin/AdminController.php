<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
class AdminController extends Controller
{
    public function index(Request $request)
    {
        $query = User::query();
        if ($request->has('email') && $request->input('email') != '') {
            $query->where('email', 'like', '%' . $request->input('email') . '%');
        }


        $query->where('role', 'admin')->orderBy('id', 'desc');
        $users = $query->paginate(10);

        return view('admin.admin.index', compact('users'));
    }

    public function create(Request $request)
    {
        return view('admin.admin.create');
    }
    public function store(Request $request)
    {
    
        // Xác thực dữ liệu đầu vào
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ], [
            'email.unique' => 'Email đã được sử dụng. Vui lòng chọn email khác.',
            'name.required' => 'Tên là bắt buộc.',
            'password.required' => 'Mật khẩu là bắt buộc.',
            'password.confirmed' => 'Mật khẩu xác nhận không khớp.',
        ]);

       
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
        ]);

        return redirect()->route('adminaccount.index')->with('success', 'thêm mời tài khoản quản lý!');
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'price' => 'required|numeric',
            'password' => 'nullable|string|min:6', // Mật khẩu có thể để trống
        ]);
    
        $user = User::findOrFail($id);
        $user->price = $request->input('price');
    
        // Kiểm tra nếu mật khẩu không trống thì cập nhật mật khẩu
        if ($request->filled('password')) {
            $user->password = bcrypt($request->input('password'));
        }
    
        $user->save();
    
        return redirect()->route('adminaccount.index')->with('success', 'Cập nhật thành công!');
    }
}
