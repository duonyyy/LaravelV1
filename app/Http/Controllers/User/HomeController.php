<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\Sliders;
use App\Models\Social;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home()
     {
    // Lấy tất cả sản phẩm từ bảng products và eager load các quan hệ
    $products = Product::with('images:id,product_id,image_url')  // Quan hệ với bảng images
                       ->with('category:id,name')  // Quan hệ với bảng category
                       ->get();  // Lấy tất cả các sản phẩm với các quan hệ đã được eager load
     $listSlider = Sliders::select('id', 'title', 'image')->get();
     $listSocial = Social::get();
    // Trả về view 'user.home' và truyền dữ liệu 'products'
    return view('user.pages.home', compact('products','listSlider', 'listSocial'));
    }

    public  function categoryProducts($categoryId){
        $category_products = Product::with(['images:id,product_id,image_url', 'category:id,name'])
                       ->where('category_id', $categoryId)  // Filter products by category_id
                       ->get();  // Get the products for that category
          return view('user.pages.category_product', compact('category_products'));
    }

    
    public function detailProduct($id){
        // Lấy thông tin sản phẩm cần cập nhật và ảnh liên quan
        $product = Product::with(['images:id,product_id,image_url,image_type', 'comments.user:id,name'])
                           ->find($id);

        // Lấy danh sách tất cả các danh mục
        $categories = Category::get();
    
        // Trả về view với dữ liệu sản phẩm và danh mục
        return view('user.pages.productDetail')->with([
            'product' => $product,
            'categories' => $categories
        ]); // Load product with images and category
    
       ;
    }




}
