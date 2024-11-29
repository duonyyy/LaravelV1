<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class OderController extends Controller
{
    public function listOrders()
    {
        $orders = Order::with('orderDetails.product')->get();  // Lấy các đơn hàng cùng với chi tiết sản phẩm


        return view('admin.order.list-order', compact('orders'));
    }

    // Xóa đơn hàng
    public function deleteOrder($id)
    {
        // Lấy đơn hàng và các chi tiết đơn hàng
        $order = Order::with('orderDetails')->findOrFail($id);

        // Xóa các chi tiết đơn hàng
        $order->orderDetails()->delete();

        // Sau khi đã xóa chi tiết, có thể xóa đơn hàng
        $order->delete();


        return redirect()->route('admin.orders.listOrders')->with('message', 'Đơn hàng đã được xóa thành công!');
    }

    // public function listOrders()
    // {
    //     $orders = Order::where('user_id', auth()->id())
    //         ->with('orderDetails.product')
    //         ->orderBy('created_at', 'desc')
    //         ->get();

    //     return response()->json([
    //         'message' => 'Danh sách đơn hàng được lấy thành công.',
    //         'orders' => $orders
    //     ], 200);
    // }
}
