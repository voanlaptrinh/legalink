<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $query = User::query();
        if ($request->has('email') && $request->input('email') != '') {
            $query->where('email', 'like', '%' . $request->input('email') . '%');
        }


        $query->where('role', 'users')->orderBy('id', 'desc');
        $users = $query->paginate(10);

        return view('admin.users.index', compact('users'));
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

    return redirect()->route('users.index')->with('success', 'Cập nhật thành công!');
}

}
