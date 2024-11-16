<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home()
     {
    // Lấy tất cả sản phẩm từ bảng products và eager load các quan hệ
    $products = Product::with('images:id,product_id,image_url')  // Quan hệ với bảng images
                       ->with('category:id,name')  // Quan hệ với bảng category
                       ->get();  // Lấy tất cả các sản phẩm với các quan hệ đã được eager load
    
    // Trả về view 'user.home' và truyền dữ liệu 'products'
    return view('user.home', compact('products'));
    }

    public function detailProduct($id){
        // Lấy thông tin sản phẩm cần cập nhật và ảnh liên quan
        $product = Product::with('images:id,product_id,image_url,image_type')->find($id);
    
        // Lấy danh sách tất cả các danh mục
        $categories = Category::get();
    
        // Trả về view với dữ liệu sản phẩm và danh mục
        return view('user.detail')->with([
            'product' => $product,
            'categories' => $categories
        ]); // Load product with images and category
    
       ;
    }

}
