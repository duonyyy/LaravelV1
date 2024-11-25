<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Term;
use Illuminate\Http\Request;

class TermController extends Controller
{
    public function getTerm(){
        $term =  Term::first();
        return view('admin.manager.terms')->with([
              'term' => $term
        ]);
    }


    public function storeOrUpdateTerm(Request $req)
    {
        // Xác thực dữ liệu đầu vào
        $validatedData = $req->validate([
            'content' => 'required|string',  // Đảm bảo content không rỗng và là chuỗi
        ]);
    
        // Lấy term đầu tiên trong cơ sở dữ liệu (vì chỉ có 1 term duy nhất)
        $term = Term::first();
    
        if ($term) {
            // Nếu term đã tồn tại, cập nhật giá trị term
            $term->content = $req->content;
            $term->save();
            return redirect()->route('admin.managers.getTerm')
                    ->with('success', 'Thay đổi thành công!');
        } else {
            // Nếu không có term nào, tạo một term mới
            $term = Term::create([
                'content' => $req->content
            ]);
            return redirect()->route('admin.managers.getTerm')
                    ->with('success', 'Tạo mới thành công!');
        }
    }
    
}