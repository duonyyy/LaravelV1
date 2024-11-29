<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller  
{
    public function listUsers()
    {
        $listuser = User::select('id','image', 'name', 'email', 'role')->get();
        return view('admin.users.list-user')->with([
            'listuser' => $listuser
        ]);
    }

    public function addUsers(Request $req)
    {
        // Kiểm tra và validate dữ liệu đầu vào
        $req->validate([
            'name' => 'required',
            'email' => ['required', 'email', 'unique:users,email'],
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Ảnh không bắt buộc
            'password' => 'required',
            'role' => 'required'
        ], [
            'name.required' => 'Vui lòng nhập tên người dùng.',
            'email.required' => 'Vui lòng nhập email.',
            'email.email' => 'Email không đúng định dạng.',
            'image.image' => 'Tệp tải lên phải là hình ảnh.',
            'password.required' => 'Vui lòng nhập mật khẩu.',
            'role.required' => 'Vui lòng chọn vai trò.'
        ]);
    
        // Khởi tạo user mới
        $newUser = new User();
        $newUser->name = $req->name;
        $newUser->email = $req->email;
        $newUser->password = Hash::make($req->password);
        $newUser->role = $req->role;
    
        // Nếu có ảnh tải lên, xử lý và lưu đường dẫn
        if ($req->hasFile('image')) {
            $image = $req->file('image');
            $imageName = time() . '-' . $image->getClientOriginalName(); // Tạo tên duy nhất
            $image->move(public_path('users'), $imageName); // Lưu ảnh vào thư mục public/uploads/users
            $newUser->image = 'users/' . $imageName; // Gán đường dẫn vào cột image
        }
    
        // Lưu user vào cơ sở dữ liệu
        $newUser->save();
    
        // Trả về thông báo thành công
        return redirect()->back()->with([
            'message' => 'Thêm mới thành công',
            'alert-type' => 'success'
        ]);
    }
    public function deleteUser($id)
    {
        // Tìm người dùng theo ID
        $user = User::find($id);
    
        if (!$user) {
            return redirect()->route('admin.users.listUsers')
                             ->with('error', 'Không tìm thấy người dùng cần xóa!');
        }
    
        // Nếu người dùng có hình ảnh, xóa hình ảnh khỏi thư mục public
        if ($user->image && file_exists(public_path($user->image))) {
            unlink(public_path($user->image));
        }
    
        // Xóa người dùng khỏi cơ sở dữ liệu
        $user->delete();
    
        // Chuyển hướng với thông báo thành công
        return redirect()->route('admin.users.listUsers')
                         ->with('success', 'Người dùng đã được xóa thành công!');
    }
    
    
    public function detailUser(Request $req){
        $user = User::where('id',$req-> id)
            ->select('id', 'name', 'email', 'role')
            ->first();
            return json_encode($user);
    }

    public function updateUser(Request $req)
    {
        $req->validate([
            'idUser'=>'required',
            'name' => 'required',
            'email' => ['required', 'email'],
            'role' => 'required'
        ], [
                'name.required' => 'Vui lòng nhập tên người dùng.',
                'email.required' => 'Vui lòng nhập email.',
                'email.email' => 'Email không đúng định dạng.',
                'role.required' => 'Vui lòng chọn vai trò.'
        ]);
     
        $user = User::where('id', $req-> idUser);
        if($user->exists()){
           $data = [
            'name' => $req->name,
            'email' => $req->email,
            'role' => $req->role,
           ];
           $user->update($data);  
        }
       

        return redirect()->back()->with([
            'message' => 'Chinh sua thành công'
        ]);
    }
    

}
