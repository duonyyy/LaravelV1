<?php

namespace App\Http\Controllers\User;

use App\Models\Cart;
use App\Models\CartDetail;
use App\Models\ProductComment;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Can;
use Illuminate\Database\Eloquent\ModelNotFoundException;



class ClientController extends Controller
{
    public function addToCart(Request $req)
    {
        // Validate incoming request data
        // $req->validate([
        //     'product_id' => 'required|exists:products,id', // Ensure the product exists
        //     'quantity' => 'required|integer|min:1', // Ensure the quantity is a positive integer
        // ]);

        // Check if the cart exists for the current user
        $cart = Cart::where('user_id', Auth::id())->first();

        if ($cart) {
            // Check if the cart detail for the given product already exists
            $cartDetail = CartDetail::where('cart_id', $cart->id)
                ->where('product_id', $req->productId)
                ->first();

            if ($cartDetail) {
                // Update the quantity if the product is already in the cart
                $cartDetail->update([
                    'quantity' => intval($cartDetail->first()->quantity) + intval($req->quantity) // Add the requested quantity
                ]);
            } else {
                // Add new cart detail if the product is not in the cart
                CartDetail::create([
                    'cart_id' => $cart->id,
                    'product_id' => $req->productId,
                    'quantity' => $req->quantity,
                ]);
            }
        } else {
            // Create a new cart for the user if no cart exists
            $newCart = Cart::create([
                'user_id' => Auth::id()
            ]);

            // Add the product to the new cart
            CartDetail::create([
                'cart_id' => $newCart->id,
                'product_id' => $req->productId, // Use product_id here
                'quantity' => $req->quantity,
            ]);
        }

        // Redirect to the cart view page
        return redirect()->route('users.cart');
    }



    public function cart()
    {
        $cart = Cart::where('user_id', Auth::id())
            ->with('cartDetails:id,cart_id,product_id,quantity')
            ->with('cartDetails.product:id,name,price')
            ->with('cartDetails.product.category:id,name')
            ->with('cartDetails.product.images:id,product_id,image_url')
            ->first();

        return view('user.pages.cart')->with([
            'cart' => $cart
        ]);
    }

    public function updateCart(Request $req)
    {
        foreach ($req->cartDetailId as $key => $cartDetailId) {
            CartDetail::find($cartDetailId)->update([
                'quantity' => $req->quantity[$key]
            ]);

            return redirect()->back()->with([
                'message' => ' Cap nhat thanh cong'
            ]);
        }
    }

    public function deleteCart($cartItemId)
    {
        $cartDetail = CartDetail::find($cartItemId);

        if ($cartDetail) {
            $cartDetail->delete();
        }

        return redirect()->route('users.cart')->with('success', 'Sản phẩm đã được xóa khỏi giỏ hàng');
    }

    public function deleteCartAjax($id)
    {
        $cartDetail = CartDetail::findOrFail($id); // Find cart item by ID
        $cartDetail->delete(); // Delete the cart item
    
        // Return a response
        return response()->json([
            'status' => 'success',
            'message' => 'Sản phẩm đã được xóa khỏi giỏ hàng.'
        ]);
    }
    














    public function store(Request $request)
    {
        // Validate the input to ensure product_id is an integer
        $validated = $request->validate([
            'product_id' => 'required',
            'comment' => 'required|string|max:500',
        ]);

        // Create the comment
        ProductComment::create([
            'product_id' => $validated['product_id'],
            'user_id' => auth()->id(),
            'comment' => $validated['comment'],
        ]);

        return back()->with('success', 'Comment added successfully!');
    }
  
    // Delete Comment
    public function deleteComment($id)
    {
        $comment = ProductComment::findOrFail($id);

        // Ensure the logged-in user is the owner of the comment
        if ($comment->user_id !== auth()->id()) {
            return redirect()->back()->with('error', 'Unauthorized action.');
        }

        $comment->delete();

        return redirect()->back()->with('success', 'Comment deleted successfully.');
    }
}
