<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Webconfigs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
class WebConfigController extends Controller
{
    public function index(Request $request)
    {
        $webConfig = Webconfigs::find(1);
        return view('admin.webconfig.index', compact('webConfig'));
    }
    public function update(Request $request)
    {

        // Validate the form data
        $request->validate([
            'title' => 'required|string',
            'phone' => 'required|string|regex:/^[0-9]{10}$/',
            'email' => 'required|email',
            'key' => 'required',
            'code' => 'nullable|string',
            'gg_map' => 'nullable|string',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
            'facebook' => 'nullable',
            'zalo' => 'nullable',
            'pinterest' => 'nullable',
            'description' => 'nullable',
            'youtube' => 'nullable',
            'dribbble' => 'nullable',
            'tiktok' => 'nullable',
            'telegram' => 'nullable',
            'twitter' => 'nullable',
            'instagram' => 'nullable',
            'reddit' => 'nullable',
            'linkedin' => 'nullable',
            'whats_app' => 'nullable',
            'google' => 'nullable',
            // Add validation for other fields
        ], [
            'title.required' => 'Vui lòng nhập tên.',
            'title.string' => 'Tên phải là một chuỗi.',
            'phone.required' => 'Vui lòng nhập số điện thoại.',
            'phone.string' => 'Số điện thoại phải là một chuỗi.',
            'phone.regex' => 'Số điện thoại phải có đúng 10 chữ số.',
            'email.required' => 'Vui lòng nhập email.',
            'key.required' => 'Vui lòng nhập key seo.',
            'email.email' => 'Email không hợp lệ.',
            'code.string' => 'Mã phải là một chuỗi.',
            'gg_map.string' => 'Google Map URL phải là một chuỗi.',
            'logo.required' => 'Vui lòng tải lên logo.',
            'logo.image' => 'Logo phải là một hình ảnh.',
            'logo.mimes' => 'Logo chỉ được chấp nhận với các định dạng: jpeg, png, jpg, gif, svg.',

        ]);

        // Find the existing WebConfig model based on some criteria (you might use ID or some unique identifier)
        $webConfig = Webconfigs::find(1); // Replace 1 with the appropriate identifier

        // Update other fields
        $webConfig->update([
            'title' => $request->input('title'),
            'phone' => $request->input('phone'),
            'email' => $request->input('email'),
            'code' => $request->input('code'),
            'gg_map' => $request->input('gg_map'),
            'key' => $request->input('key'),
            'facebook' => $request->input('facebook'),
            'zalo' => $request->input('zalo'),
            'pinterest' => $request->input('pinterest'),
            'youtube' => $request->input('youtube'),
            'dribbble' => $request->input('dribbble'),
            'description' => $request->input('description'),
            'tiktok' => $request->input('tiktok'),
            'telegram' => $request->input('telegram'),
            'twitter' => $request->input('twitter'),
            'instagram' => $request->input('instagram'),
            'reddit' => $request->input('reddit'),
            'linkedin' => $request->input('linkedin'),
            'google' => $request->input('google'),
            'whats_app' => $request->input('whats_app'),
            // Add update for other fields
        ]);


        // Handle logo upload
        // Handle logo upload
        if ($request->hasFile('logo')) {
            // Xóa logo cũ nếu có
            if ($webConfig->logo && file_exists(public_path($webConfig->logo))) {
                unlink(public_path($webConfig->logo));
            }
    
            // Xử lý file logo mới
            $logo = $request->file('logo');
            $logoExtension = $logo->getClientOriginalExtension(); // Lấy đuôi file
            $logoName = Str::random(10) . '.' . $logoExtension; // Tạo tên ngẫu nhiên cho logo
            $logoPath = 'source/logo/' . $logoName; // Đường dẫn sẽ lưu file
    
            // Di chuyển logo vào thư mục public/source/logo
            $logo->move(public_path('source/logo'), $logoName);
    
            // Lưu đường dẫn logo mới vào cơ sở dữ liệu
            $webConfig->logo = $logoPath;
        }



        // Save the changes
        $webConfig->save();
        // Redirect back or to a specific route after the update
        return redirect()->back()->with('success', 'Đã update thành công!');
    }
}
