<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\About;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function getAbout(){
        $about =  About::first();
        return view('admin.manager.about')->with([
              'about' => $about
        ]);
    }


    public function storeOrUpdateAbout(Request $req)
    {
        // Xác thực dữ liệu đầu vào
        $validatedData = $req->validate([
            'content' => 'required|string',  // Đảm bảo content không rỗng và là chuỗi
            'footer' => 'required|string', 
        ]);
    
        // Lấy term đầu tiên trong cơ sở dữ liệu (vì chỉ có 1 term duy nhất)
        $about = About::first();
    
        if ($about) {
            // Nếu term đã tồn tại, cập nhật giá trị term
            $about->content = $req->content;
            $about->footer = $req->footer;
            $about->save();
            return redirect()->route('admin.managers.getAbout')
                    ->with('success', 'Thay đổi thành công!');
        } else {
            // Nếu không có term nào, tạo một term mới
            $about = About::create([
                'content' => $req->content,
                'footer' => $req->footer
            ]);
            return redirect()->route('admin.managers.getAbout')
                    ->with('success', 'Tạo mới thành công!');
        }
    }
    
}