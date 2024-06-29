
<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{

    public function index()
    {
        return view('frontend.pages.cart.index');
    }

    public function addToCart($id)
    {
        $product = Product::findOrFail($id);
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                "name" => $product->name,
                "quantity" => 1,
                "price" => $product->price,
                "image" => $product->image
            ];
        }

        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Product added to cart successfully!');
    }


    public function update(Request $request)
    {
        if ($request->id && $request->quantity) {
            $cart = session()->get('cart');
            $cart[$request->id]["quantity"] = $request->quantity;
            session()->put('cart', $cart);
            session()->flash('success', 'Cart updated successfully');
        }
    }


    public function remove(Request $request)
    {
        if ($request->id) {
            $cart = session()->get('cart');
            if (isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            return redirect()->back()->with('success', 'Product removed successfully!');
        }
    }

    public function order(Request $request)
    {
        if ($request->method() == 'POST') {
            $cartData = session()->get('cart');
            if (!$cartData) {
                return redirect()->back()->with('error', 'Cart is empty!');
            } else {
                $total = 0;
                foreach ($cartData as $cart) {
                    $total += $cart['price'] * $cart['quantity'];
                }
                $insertData = [];
                foreach ($cartData as $cart) {
                    $insertData[] = [
                        'user_id' => auth()->id(),
                        'product_name' => $cart['name'],
                        'product_price' => $cart['price'],
                        'product_image' => $cart['image'],
                        'quantity' => $cart['quantity'],
                        'total' => $total,
                        'status' => 'pending',
                        'payment_method' => $request->payment_method,
                        'created_at' => now(),
                        'updated_at' => now()
                    ];
                }

                Order::insert($insertData);
                session()->forget('cart');
                return redirect()->back()->with('success', 'Order placed successfully!');
            }

        }
    }


}
