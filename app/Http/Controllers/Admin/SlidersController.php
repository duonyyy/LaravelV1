<?php


namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Sliders;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
class SlidersController extends Controller

{
    public function listSliders(){
        $listSlider = Sliders::select('id', 'title', 'image')->get();
        return view('admin.sliders.list-slider')->with([
            'listSlider' => $listSlider
        ]);
    }

    public function addSlider(){
        return view('admin.sliders.add-slider');
    }

    public function addPostSlider(Request $req)
    {
        // Xác thực dữ liệu
        $req->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Kiểm tra hình ảnh
            'title' => 'present', // Kiểm tra tiêu đề (nếu có)
        ], [
            'image.required' => 'Vui lòng tải lên một ảnh cho slider.',
            'title.present' => 'Tiêu đề phải là một chuỗi văn bản.',
        ]);
    
        // Chuẩn bị dữ liệu
        $data = [
            'title' => $req->title,
        ];
    
        // Nếu có hình ảnh, xử lý lưu ảnh
        if ($req->hasFile('image')) {
            $image = $req->file('image');
            // Đặt tên cho ảnh
            $imageName = time() . '-' . $image->getClientOriginalName();
            // Lưu ảnh vào thư mục public/sliders
            $image->move(public_path('sliders'), $imageName);
            // Thêm đường dẫn ảnh vào dữ liệu
            $data['image'] = 'sliders/' . $imageName;
        }
    
        // Tạo slider mới trong bảng sliders
        Sliders::create($data);
    
        // Trả về thông báo thành công
        return redirect()->route('admin.sliders.listSliders')
                         ->with('success', 'Slider đã được thêm thành công!');
    }


    public function deleteSlider($idSlider)
    {
        // Tìm slider theo ID
        $slider = Sliders::find($idSlider);
    
        if (!$slider) {
            return redirect()->route('admin.sliders.listSliders')
                             ->with('error', 'Không tìm thấy slider cần xóa!');
        }
    
        // Xóa hình ảnh khỏi thư mục public (nếu tồn tại)
        $imagePath = public_path($slider->image);
        if (file_exists($imagePath)) {
            unlink($imagePath);
        }
    
        // Xóa slider khỏi cơ sở dữ liệu
        $slider->delete();
    
        // Chuyển hướng với thông báo thành công
        return redirect()->route('admin.sliders.listSliders')
                         ->with('success', 'Slider đã được xóa thành công!');
    }
    

    public function updateSlider($idSlider){
        $slider = Sliders::find($idSlider);
        return view('admin.sliders.update-slider')->with([
            'slider' =>  $slider 
        ]);
    }

    public function updatePatchSlider(Request $req)
{
    // Xác thực dữ liệu
    $req->validate([
        'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Kiểm tra hình ảnh
        'title' => 'present', // Kiểm tra tiêu đề (nếu có)
    ], [
        'image.required' => 'Vui lòng tải lên một ảnh cho slider.',
        'title.present' => 'Tiêu đề phải là một chuỗi văn bản.',
    ]);

    // Tìm slider cần cập nhật
    $slider = Sliders::findOrFail($req->idSlider);

    // Chuẩn bị dữ liệu cập nhật
    $data = [
        'title' => $req->title,
    ];

    // Kiểm tra xem có tải lên ảnh mới không
    if ($req->hasFile('image')) {
        // Xóa ảnh cũ nếu có
        if ($slider->image && file_exists(public_path('sliders/' . $slider->image))) {          
            unlink(public_path('sliders/' . $slider->image));
        }

        // Lưu ảnh mới
        $image = $req->file('image');
        $imageName = time() . '_' . $image->getClientOriginalName();
        $image->move(public_path('sliders/'), $imageName);
     
        $data['image'] = 'sliders/' . $imageName;
    }

    // Cập nhật dữ liệu trong cơ sở dữ liệu
    $slider->update($data);

    // // Phản hồi lại
    // return response()->json([
    //     'success' => true,
    //     'message' => 'Slider đã được cập nhật thành công.',
    //     'slider' => $slider,
    // ]);

    return redirect()->route('admin.sliders.listSliders')
                             ->with('success', 'Thay đổi thành công!');
}

    
}
