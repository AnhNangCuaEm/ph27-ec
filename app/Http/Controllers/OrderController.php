<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Order;
use App\Models\OrderDetail;

class OrderController extends Controller
{
    public function order(Request $request)
    {
        $cart = session('cart', []);

        if (empty($cart)) {
            return redirect('/products');
        }

        $products = [];
        $totalPrice = 0;

        foreach ($cart as $productId => $quantity) {
            $product = Product::find($productId);
            $totalPrice += $product->price * $quantity;
            $items[] = [
                'product' => $product,
                'quantity' => $quantity,
            ];
        }

        $order = new Order();
        $order->user_id = $request->user()->id;
        $order->total_price = $totalPrice;
        $order->save();

        foreach ($items as $item) {
            $product = $item['product'];
            $quantity = $item['quantity'];

            $orderDetail = new OrderDetail();
            $orderDetail->order_id = $order->id;
            $orderDetail->product_id = $product->id;
            $orderDetail->quantity = $quantity;
            $orderDetail->price = $product->price;
            $orderDetail->save();
        }

        session()->forget('cart');

        echo "合計金額: {$totalPrice}円<br>";

        echo "注文を受け付けました。";
    }
}
