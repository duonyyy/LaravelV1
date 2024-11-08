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
        $listuser = User::select('id', 'name', 'email', 'role')->get();
        return view('admin.users.list-user')->with([
            'listuser' => $listuser
        ]);
    }

    public function addUsers(Request $req)
    {
        $req->validate([
            'name' => 'required',
            'email' => ['required', 'email', 'unique:users,email'],
            'password' => 'required',
            'role' => 'required'
        ], [
            'name.required' => 'Vui lòng nhập tên người dùng.',
            'email.required' => 'Vui lòng nhập email.',
            'email.email' => 'Email không đúng định dạng.',
            'password.required' => 'Vui lòng nhập mật khẩu.',
            'role.required' => 'Vui lòng chọn vai trò.'
        ]);

        $newUser = new User();
        $newUser->name = $req->name;
        $newUser->email = $req->email;
        $newUser->password = Hash::make($req->password);
        $newUser->role = $req->role;

        $newUser->save(); 

        return redirect()->back()->with([
            'message' => 'Thêm mới thành công'
        ]);
    }

    public function deleteUser($id)
    {
        try {
            $user = User::findOrFail($id);
            $user->delete();
            return redirect()->back()->with('message', 'User deleted successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred while deleting the user');
        }
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
