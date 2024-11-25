<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Social;
use Illuminate\Http\Request;
class SocialController extends Controller
{
    public function listSocial(){
        $listSocial = Social::get();
        return view('admin.social.list-social')->with([
            'listSocial' => $listSocial
        ]);
    }
    
    public function addSocial(){
        return view('admin.social.add-social');
    }

     // Phương thức thêm mới social
     public function addPostSocial(Request $req)
     {
         // Xác thực dữ liệu
         $req->validate([
             'title' => 'required|string|max:255',
             'icon' => 'required|string|max:255',
             'url' => 'required|url|max:255',
         ]);
 
         // Lưu dữ liệu vào database
         Social::create([
             'title' => $req->title,
             'icon' => $req->icon,
             'url' => $req->url,
         ]);
 
         // Chuyển hướng và hiển thị thông báo
         return redirect()->route('admin.socials.listSocial')->with('message', 'Thêm social thành công!');
     }

     public function destroy($id)
     {
         // Find the social by ID
         $social = Social::find($id);
         
         // Check if the social exists
         if ($social) {
             // Delete the social
             $social->delete();
             
             // Redirect back with success message
             return redirect()->route('admin.socials.listSocial')->with('message', 'Xóa thành công!');
         } else {
             // Redirect back with error message if not found
             return redirect()->route('admin.socials.listSocial')->with('error', 'Không tìm thấy mục cần xóa!');
         }
     }

     // Controller method to show the edit form
public function updateSocial($id)
{
    // Retrieve the social record by its ID
    $social = Social::findOrFail($id);
    
    return view('admin.social.update-social', compact('social'));
}

// Controller method to handle the form submission for updating
public function updatePatchSocial(Request $request, $id)
{
    // Validate the incoming data
    $request->validate([
        'title' => 'required|string|max:255',
        'icon' => 'required|string|max:255',
        'url' => 'required|url|max:255',
    ]);

    // Find the existing social record by its ID
    $social = Social::findOrFail($id);

    // Update the social record with the new data
    $social->title = $request->input('title');
    $social->icon = $request->input('icon');
    $social->url = $request->input('url');
    $social->save();

    // Redirect back with a success message
    return redirect()->route('admin.socials.listSocial')->with('message', 'Social đã được cập nhật thành công!');
}

}
