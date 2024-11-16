<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
class ProductController extends Controller
{
    public function listProducts()
    {
        // Lấy tất cả sản phẩm từ bảng products và eager load các quan hệ
        $products = Product::with('images:id,product_id,image_url')  // Quan hệ với bảng images
                           ->with('category:id,name')  // Quan hệ với bảng category
                           ->get();  // Lấy tất cả các sản phẩm với các quan hệ đã được eager load
        
        // Trả về view 'admin.products.list-product' và truyền dữ liệu 'products'
        return view('admin.products.list-product')->with([
            'products' => $products  // Truyền biến $products vào view để sử dụng
        ]);
    }

    public function addProduct()
    {
        $products = Product::with('images:id,product_id,image_url')  // Quan hệ với bảng images
        ->get(); 
        $categories = Category::get();
        return view('admin.products.add-product')->with([
            'categories' => $categories,
            'products' => $products
        ]);
    }

    public function addPostProduct(Request $req)
    {
     
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

            $data = [
                'name' => $req->name,
                'price' => $req->price,
                'description' => $req->description,
                'category_id' => $req->category
            ];

            $product = Product::create($data);

            if ($req->hasFile('images')) {
                $images = $req->file('images');
                foreach ($images as $key => $image) {
                    // Đặt tên cho ảnh
                    $imageName = time().'-'.$image->getClientOriginalName();
                    // Lưu ảnh vào thư mục public/products
                    $image->move(public_path('products'), $imageName); 
            
                  
            
                    // Lưu thông tin ảnh vào bảng images
                    ProductImage::create([
                        'product_id' => $product->id,
                        'image_url' => 'products/' . $imageName,
                        'image_type' => $key == 0 ? 'main' : 'secondary',
                    ]);
                   
                    
                }
            }
            
            // Trả về trang sau khi lưu thành công
            return redirect()->route('admin.products.listProducts')
                             ->with('success', 'Sản phẩm đã được thêm thành công!');
            
       
    }

    public function deleteProduct(Request $req)
    {
        try {
            // Lấy tất cả ảnh liên quan đến sản phẩm
            $productImages = ProductImage::where('product_id', $req->idProduct)->select('image_url')->get();
    
            // Xóa các tệp ảnh khỏi thư mục public/products
            foreach ($productImages as $image) {
                // // Kiểm tra xem ảnh có tồn tại trong thư mục public/products và xóa nó không
                // $imagePath = public_path('products/' . $image->image_url); // Đường dẫn tuyệt đối đến ảnh
                // if (file_exists($imagePath)) {
                //     unlink($imagePath); // Xóa ảnh
                // }
                File::delete(public_path($image->image_url));
            }
    
            // Xóa các ảnh khỏi cơ sở dữ liệu
            ProductImage::where('product_id', $req->idProduct)->delete();
    
            // Xóa sản phẩm khỏi bảng sản phẩm
            $product = Product::find($req->idProduct);
            if ($product) {
                $product->delete();
            }
    
            // Trả về thông báo thành công
            return redirect()->route('admin.products.index')->with('success', 'Sản phẩm và ảnh liên quan đã được xóa thành công!');
            
        } catch (\Exception $e) {
            // Trả về thông báo lỗi nếu có lỗi xảy ra
            return back()->withErrors(['error' => 'Có lỗi xảy ra. Vui lòng thử lại!'])->withInput();
        }
    }
    
    public function updateProduct($idProduct)
    {
        // Lấy thông tin sản phẩm cần cập nhật và ảnh liên quan
        $product = Product::with('images:id,product_id,image_url')->find($idProduct);
    
        // Lấy danh sách tất cả các danh mục
        $categories = Category::get();
    
        // Trả về view với dữ liệu sản phẩm và danh mục
        return view('admin.products.edit-product')->with([
            'product' => $product,
            'categories' => $categories
        ]);
    }
    

    public function updatePatchProduct(Request $req)
    {
        try {
            // Validate input data
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
    
            // Prepare data for updating product
            $data = [
                'name' => $req->name,
                'price' => $req->price,
                'description' => $req->description,
                'category_id' => $req->category,
            ];
    
            // Find the product by ID and update it
            $product = Product::findOrFail($req->idProduct);  // Ensure the product is found
            $product->update($data);
    
            // Handle image upload if images are provided
            if ($req->hasFile('images')) {
                $productImages = ProductImage::where('product_id', $req->idProduct)->select('image_url')->get();
    
                // Xóa các tệp ảnh khỏi thư mục public/products
                foreach ($productImages as $image) {
                    // // Kiểm tra xem ảnh có tồn tại trong thư mục public/products và xóa nó không
                    // $imagePath = public_path('products/' . $image->image_url); // Đường dẫn tuyệt đối đến ảnh
                    // if (file_exists($imagePath)) {
                    //     unlink($imagePath); // Xóa ảnh
                    // }
                    File::delete(public_path($image->image_url));
                }
        
                // Xóa các ảnh khỏi cơ sở dữ liệu
                ProductImage::where('product_id', $req->idProduct)->delete();
                // Add new images
                $images = $req->file('images');
                foreach ($images as $key => $image) {
                    $imageName = time() . '_' . $image->getClientOriginalName();
                    $image->move(public_path('products'), $imageName);  // Save the image to the public directory
    
                    // Set image type as 'main' or 'secondary'
                    $imageType = $key == 0 ? 'main' : 'secondary';
    
                    // Store the image in the database
                    $product->images()->create([
                        'product_id' => $product->id,
                        'image_url' => 'products/' . $imageName,  // Save the image path
                        'image_type' => $imageType,  // Specify if it's the main or secondary image
                    ]);
                }
            }
    
            // Redirect with a success message
            return redirect()->route('admin.products.listProducts')
                             ->with('success', 'Sản phẩm đã được cập nhật thành công!');
    
        } catch (\Exception $e) {
            // Handle errors and provide feedback
            return back()->withErrors(['error' => 'Có lỗi xảy ra. Vui lòng thử lại!'])
                         ->withInput();
        }
    }
    

   

}
