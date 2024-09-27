<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Models\Contacts;
use App\Models\Sliders;
use App\Models\Webconfigs;
use Illuminate\Http\Request;

class ContactsControler extends Controller
{
    public function index(Request $request)
    {
        
        $webConfig = Webconfigs::find(1);
        $sliders = Sliders::all();
      
        return view('users.contact.index', compact( 'webConfig', 'sliders'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'email' => 'required|string|email',
           
        ], [
            'name.required' => 'Tiêu đề là bắt buộc.',
            'name.string' => 'Tiêu đề phải là chuỗi.',
            'name.max' => 'Tiêu đề không được vượt quá 255 ký tự.',
            'description.string' => 'Mô tả phải là chuỗi.',
            'description.max' => 'Mô tả không được vượt quá 255 ký tự.',
            'description.required' => 'Mô tả là bắt buộc.',
            'email.required' => 'Email là bắt buộc.',
            'email.email' => 'Phải là email.',

            
        ]);

     

        Contacts::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'select_what' => $request->input('select_what'),
            'description' => $request->input('description'),
        ]);
      
        return redirect()->back()->with('success', 'Liên hệ đã được gửi thành công!');
    }
}
