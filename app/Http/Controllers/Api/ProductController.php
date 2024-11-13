<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Support\Facades\File;
class ProductController extends Controller
{
    public function getListProducts() {
        $products = Product::with(['images' => function($query) {
            $query->select('product_id', 'image_url');
        }])
        ->leftJoin('category', 'product.category_id', '=', 'category.id')
        ->select('product.id', 'product.name', 'product.price', 'product.description', 'category.name as category_name')
        ->get()
        ->map(function ($product) {
            return [
                'id' => $product->id,
                'name' => $product->name,
                'price' => $product->price,
                'description' => $product->description,
                'category_name' => $product->category_name,
                'images' => $product->images->pluck('image_url'), // Array of image URLs
            ];
        });
    
        return response()->json([
            'data' => $products,
            'message' => 'success',
            'status_code' => 200
        ], 200);
    }


    public function getProduct($id) {
        // Lấy sản phẩm theo ID và kèm theo mối quan hệ 'images'
        $product = Product::with(['images' => function($query) {
            $query->select('product_id', 'image_url');
        }])
        ->leftJoin('category', 'product.category_id', '=', 'category.id')
        ->select('product.id', 'product.name', 'product.price', 'product.description', 'category.name as category_name')
        ->findOrFail($id); // Lấy sản phẩm theo ID, nếu không tìm thấy thì trả về lỗi 404
    
        // Chuyển đổi dữ liệu và trả về dưới dạng JSON
        return response()->json([
            'data' => [
                'id' => $product->id,
                'name' => $product->name,
                'price' => $product->price,
                'description' => $product->description,
                'category_name' => $product->category_name,
                'images' => $product->images->pluck('image_url'), // Mảng các URL ảnh
            ],
            'message' => 'success',
            'status_code' => 200
        ], 200);
    }
    

    public function addPostProduct(Request $req)
    {
        // Kiểm tra dữ liệu gửi lên
        $req->validate([
            'images.*' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Kiểm tra ảnh
            'name' => 'required', // Kiểm tra tên sản phẩm
            'price' => 'required', // Kiểm tra giá trị và kiểu dữ liệu
            'category' => 'required', // Kiểm tra danh mục có tồn tại trong bảng categories
            'description' => 'present', // Kiểm tra mô tả (nếu có)
        ], [
            'images.*.required' => 'Vui lòng tải lên ít nhất một ảnh cho sản phẩm.',
            'name.required' => 'Tên sản phẩm là bắt buộc.',
            'price.required' => 'Giá sản phẩm là bắt buộc.',
           
            'category.required' => 'Danh mục sản phẩm là bắt buộc.',
            
            'description.present' => 'Mô tả phải là một chuỗi văn bản.',
        ]);

        // Tạo sản phẩm mới
        $data = [
            'name' => $req->name,
            'price' => $req->price,
            'description' => $req->description,
            'category_id' => $req->category
        ];
    
        $product = Product::create($data);
    
        // Kiểm tra và lưu ảnh
        if ($req->hasFile('images')) {
            $images = $req->file('images');
            foreach ($images as $key => $image) {
                // Đặt tên cho ảnh
                $imageName = time() . '-' . $image->getClientOriginalName();
    
                // Kiểm tra và tạo thư mục nếu chưa tồn tại
                $destinationPath = public_path('products');
                if (!file_exists($destinationPath)) {
                    mkdir($destinationPath, 0777, true); // Tạo thư mục nếu chưa có
                }
    
                // Lưu ảnh vào thư mục public/products
                $image->move($destinationPath, $imageName);
    
                // Lưu thông tin ảnh vào bảng images
                ProductImage::create([
                    'product_id' => $product->id,
                    'image_url' => 'products/' . $imageName,
                    'image_type' => $key == 0 ? 'main' : 'secondary', // Đánh dấu ảnh chính và phụ
                ]);
            }
        }
    
        // Trả về thông báo thành công
        return response()->json([
            'message' => 'Sản phẩm đã được thêm thành công!',
            'product' => $product
        ], 201); // Trả về mã lỗi 201 khi tạo mới thành công
    }
    
    public function updateProduct(Request $req, $id)
    {
        // Kiểm tra dữ liệu gửi lên
        $req->validate([
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Validate images
            'name' => 'required|string|max:255', // Validate product name
            'price' => 'required|numeric', // Validate price
            'category' => 'required', // Validate category
            'description' => 'nullable|string|max:1000', // Validate description (optional)
        ], [
            'images.*.nullable' => 'Vui lòng tải lên ảnh hợp lệ cho sản phẩm.',
            'name.required' => 'Tên sản phẩm là bắt buộc.',
            'price.required' => 'Giá sản phẩm là bắt buộc.',
            'price.numeric' => 'Giá sản phẩm phải là một số.',
            'category.required' => 'Danh mục sản phẩm là bắt buộc.',
            'category.exists' => 'Danh mục sản phẩm không hợp lệ.',
            'description.string' => 'Mô tả phải là một chuỗi văn bản.',
        ]);
    
        // Tìm sản phẩm dựa trên id
        $product = Product::find($id);
    
        // Kiểm tra sản phẩm có tồn tại
        if (!$product) {
            return response()->json([
                'message' => 'Sản phẩm không tồn tại.',
            ], 404);
        }
    
        // Cập nhật thông tin sản phẩm
        $product->update([
            'name' => $req->name,
            'price' => $req->price,
            'description' => $req->description,
            'category_id' => $req->category
        ]);
    
        // Nếu có ảnh mới, xóa ảnh cũ và lưu ảnh mới
        if ($req->hasFile('images')) {
            // Xóa ảnh cũ
            foreach ($product->images as $image) {
                $imagePath = public_path($image->image_url);
                if (file_exists($imagePath)) {
                    unlink($imagePath); // Xóa file ảnh cũ
                }
                $image->delete(); // Xóa bản ghi ảnh cũ trong database
            }
    
            // Lưu ảnh mới
            foreach ($req->file('images') as $key => $image) {
                $imageName = time() . '-' . $image->getClientOriginalName();
                $image->move(public_path('products'), $imageName);
                
                // Tạo bản ghi ảnh mới trong database
                ProductImage::create([
                    'product_id' => $product->id,
                    'image_url' => 'products/' . $imageName,
                    'image_type' => $key == 0 ? 'main' : 'secondary', // Đánh dấu ảnh chính hoặc phụ
                ]);
            }
        }
    
        // Trả về phản hồi thành công
        return response()->json([
            'message' => 'Sản phẩm đã được cập nhật thành công!',
            'product' => $product->load('images') // Nạp quan hệ 'images' để trả về ảnh mới cập nhật
        ], 200);
    }
    


    public function deleteProduct(Request $req)
    {
        try {
            // Lấy idProduct từ query string (GET parameter)
            $idProduct = $req->query('id');
    
            // Kiểm tra xem sản phẩm có tồn tại không
            $product = Product::find($idProduct);
            if (!$product) {
                return response()->json([
                    'message' => 'Sản phẩm không tồn tại.',
                ], 404);
            }
    
            // Lấy tất cả ảnh liên quan đến sản phẩm
            $productImages = ProductImage::where('product_id', $idProduct)->select('image_url')->get();
    
            // Xóa các tệp ảnh khỏi thư mục public/products
            foreach ($productImages as $image) {
                File::delete(public_path($image->image_url)); // Xóa ảnh khỏi thư mục
            }
    
            // Xóa các ảnh khỏi cơ sở dữ liệu
            ProductImage::where('product_id', $idProduct)->delete();
    
            // Xóa sản phẩm khỏi bảng sản phẩm
            $product->delete();
    
            // Trả về thông báo thành công
            return response()->json([
                'message' => 'Sản phẩm và ảnh liên quan đã được xóa thành công!',
            ], 200);
    
        } catch (\Exception $e) {
            // Trả về thông báo lỗi nếu có lỗi xảy ra
            return response()->json([
                'message' => 'Có lỗi xảy ra. Vui lòng thử lại!',
                'error' => $e->getMessage(),
            ], 500);
        }
    }
    


}
