<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Http\Requests\OrderItemRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderItemController extends Controller
{
    public function index()
    {
        //
    }

    public function create()
    {
        //
    }

    public function store(OrderItemRequest $request)
    {
        $user = Auth::user();
        $order = Order::create([
            'user_id' => $user ? $user->id : null,
        ]);
        // for order table
        $totalAmount = 0;
        foreach ($request->items as $item) {
            $product = Product::find($item['product_id']);
            if (! $product) {
                return response()->json(['message' => 'Product not found'], 404);
            }

            $amount = $product->price * $item['quantity'];

            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $product->id,
                'quantity' => $item['quantity'],
                'amount' => $amount,
            ]);
            $totalAmount += $amount;
        }
        // update the order table
        $order->update([
            'total' => $totalAmount,
        ]);

        return response()->json(['message' => 'order placed successfully'], 201);
    }

    public function show($id)
    {
        // returns the UserName and Product details against the orderItems id
        $orderItem = OrderItem::find($id);
        if (! $orderItem) {
            return response()->json(['message' => 'OrderItem not found'], 404);
        }
        $orderItem->load('order.user', 'product');

        return response()->json($orderItem, 200);
    }

    public function edit()
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
