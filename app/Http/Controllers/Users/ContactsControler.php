<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Models\Contacts;
use App\Models\DetailPays;
use App\Models\MenusServices;
use App\Models\Sliders;
use App\Models\Webconfigs;
use Illuminate\Http\Request;

class ContactsControler extends Controller
{
    public function index(Request $request)
    {
        
        $webConfig = Webconfigs::find(1);
        $sliders = Sliders::all();
        $menus = MenusServices::whereNull('parent_id')->with('children')->get();
        $detailPays = DetailPays::find(1);
        return view('users.contact.index', compact( 'webConfig','detailPays', 'sliders','menus'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'email' => 'required|string|email',
          'phone' => 'required|string|regex:/^[0-9]{10}$/',
           
        ], [
            'name.required' => 'Tiêu đề là bắt buộc.',
            'name.string' => 'Tiêu đề phải là chuỗi.',
            'name.max' => 'Tiêu đề không được vượt quá 255 ký tự.',
            'description.string' => 'Mô tả phải là chuỗi.',
            'description.max' => 'Mô tả không được vượt quá 255 ký tự.',
            'description.required' => 'Mô tả là bắt buộc.',
            'email.required' => 'Email là bắt buộc.',
            'email.email' => 'Phải là email.',
            'phone.required' => 'Vui lòng nhập số điện thoại.',
            'phone.string' => 'Số điện thoại phải là một chuỗi.',
            'phone.regex' => 'Số điện thoại phải có đúng 10 chữ số.',

            
        ]);

     

        Contacts::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
            'select_what' => $request->input('select_what'),
            'description' => $request->input('description'),
        ]);
      
        return redirect()->back()->with('success', 'Liên hệ đã được gửi thành công!');
    }
}
