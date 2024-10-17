<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Models\DetailPays;
use App\Models\MenusServices;
use App\Models\Sliders;
use App\Models\User;
use App\Models\Webconfigs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    public function index()
    {
        $webConfig = Webconfigs::find(1);
        $detailPays = DetailPays::find(1);
        $menus = MenusServices::whereNull('parent_id')->with('children')->get();
        $sliders = Sliders::all();
        return view('users.login.index', compact('webConfig', 'menus','sliders',detailPays''));
    }

    public function login(Request $request)
    {
        // Xác thực dữ liệu đầu vào
        $validator = Validator::make($request->all(), [
            'email' => ['required', 'string', 'email', 'max:255'],
            'password' => ['required', 'string', 'min:8'],
        ]);

        // Nếu xác thực thất bại
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator) // Gửi lỗi về lại view
                ->withInput() // Giữ lại dữ liệu đã nhập
                ->with('form', 'login'); // Chỉ ra form đăng nhập đang hoạt động
        }

        $credentials = $request->only('email', 'password');

        // Kiểm tra thông tin đăng nhập
        if (Auth::attempt($credentials)) {
            // Lấy thông tin người dùng đã đăng nhập
            $user = Auth::user();

            // Điều hướng dựa trên vai trò của người dùng
            if ($user->role == 'admin') {
                return redirect()->route('admin.dashboard');
            } else {
                return redirect()->route('home'); // Giả sử bạn có route 'home' cho trang chủ
            }
        }

        // Nếu đăng nhập thất bại, trả về với thông báo lỗi
        return redirect()->back()
            ->withInput() // Giữ lại dữ liệu đã nhập
            ->withErrors(['email' => 'Email hoặc mật khẩu không hợp lệ.']); // Sử dụng withErrors với mảng
    }



    public function register(Request $request)
    {
        // Xác thực dữ liệu đầu vào
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ], [
            'email.unique' => 'Email đã được sử dụng. Vui lòng chọn email khác.',
            'name.required' => 'Tên là bắt buộc.',
            'password.required' => 'Mật khẩu là bắt buộc.',
            'password.confirmed' => 'Mật khẩu xác nhận không khớp.',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput()
                ->with('form', 'register');
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'user',
        ]);

        Auth::login($user);


        return redirect()->route('home')->with('success', 'Đăng ký thành công!');
    }
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('success', 'Đăng xuất thành công!');
    }
}
