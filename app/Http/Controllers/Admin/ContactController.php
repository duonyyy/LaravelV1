<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function getContact(){
        $contact =  Contact::first();
        return view('admin.manager.contact')->with([
              'contact' => $contact
        ]);
    }


    public function storeOrUpdateContact(Request $req)
    {
        // Xác thực dữ liệu đầu vào
        $validatedData = $req->validate([
            'content' => 'required|string',  // Đảm bảo content không rỗng và là chuỗi
        ]);
    
        // Lấy term đầu tiên trong cơ sở dữ liệu (vì chỉ có 1 term duy nhất)
        $contact = Contact::first();
    
        if ($contact) {
            // Nếu term đã tồn tại, cập nhật giá trị term
            $contact->content = $req->content;
            $contact->save();
            return redirect()->route('admin.managers.getContact')
                    ->with('success', 'Thay đổi thành công!');
        } else {
            // Nếu không có term nào, tạo một term mới
            $term = Contact::create([
                'content' => $req->content
            ]);
            return redirect()->route('admin.managers.getContact')
                    ->with('success', 'Tạo mới thành công!');
        }
    }
    
}