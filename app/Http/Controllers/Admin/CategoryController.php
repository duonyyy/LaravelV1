<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //lấy DS
    public function listCategories(){
        $listcategory = Category::get();
        return view('admin.categories.list-category')->with([
            'listcategory' => $listcategory
        ]);
    }
    // lấy ra trang thêm DS
    public function addCategory()
        {
            return view('admin.categories.add-category');
        }


    public function addPostCategory(Request $request)
        {
            $request->validate([
                'name' => 'required|string|max:255',
               
            ]);

            $newCategory = new Category();
            $newCategory->name = $request->name;

            $newCategory ->save(); 

            return redirect()->route('admin.categories.listCategories')
                   ->with('message', 'Danh mục đã được thêm thành công.');
        }
    
   
        public function deleteCategory($id)
        {
            try {
                $category = Category::findOrFail($id);
                
                // Kiểm tra nếu danh mục có các sản phẩm hoặc liên kết khác, bạn có thể xóa hoặc xử lý trước.
                // Ví dụ, nếu có sản phẩm liên quan, bạn có thể xóa sản phẩm liên quan
                // $category->products()->delete();
        
                $category->delete();
                return redirect()->back()
                    ->with('message', 'Danh mục đã được xóa thành công.');
            } catch (\Exception $e) {
                // In lỗi để dễ dàng kiểm tra
               
                return redirect()->back()
                    ->with('error', 'Đã xảy ra lỗi khi xóa danh mục.');
            }
        }
        
    // public function deleteUser($id)
    // {
    //     try {
    //         $user = User::findOrFail($id);
    //         $user->delete();
    //         return redirect()->back()->with('message', 'User deleted successfully');
    //     } catch (\Exception $e) {
    //         return redirect()->back()->with('error', 'An error occurred while deleting the user');
    //     }
    // }
    public function updateCategory($idCategory){
        $category = Category::find($idCategory);
        return view('admin.categories.update-category')->with([
            'category' =>  $category 
        ]);
    }


    public function updatePatchCategory(Request $request)
    {
         $request->validate([
            'idCategory' => 'required',  //|exists:categories,id
            'name' => 'required|string|max:255',
        ], [
            'idCategory.required' => 'Vui lòng cung cấp ID danh mục.',
            //'idCategory.exists' => 'Danh mục không tồn tại.',
            'name.required' => 'Vui lòng nhập tên danh mục.',
            'name.string' => 'Tên danh mục phải là một chuỗi ký tự.',
            'name.max' => 'Tên danh mục không được vượt quá 255 ký tự.',
        ]);
        try {
            $category = Category::where('id', $request-> idCategory);
            if($category->exists()){
               $data = [
                'name' => $request->name,
                
               ];
               $category->update($data);  
            }
            // Redirect with a success message
            return redirect()->route('admin.categories.listCategories')->with('message', 'Danh mục đã được cập nhật thành công.');
        } catch (\Exception $e) {
            // Handle exceptions
            return redirect()->back()->withErrors(['error' => 'Có lỗi xảy ra khi cập nhật danh mục.'])->withInput();
        }
    }

}
