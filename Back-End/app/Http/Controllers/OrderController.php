<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderItemRequest;
use App\Http\Resources\OrderResourse;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index()
    {
        // returns all orders of a specific user only using the id from token
        $userId = Auth::id();
        $orders = Order::where('user_id', $userId)->get();
        if ($orders->isEmpty()) {
            return response()->json(['message' => 'No orders found'], 404);
        }

        return response()->json([
            'orders' => OrderResourse::collection($orders),
        ]);
    }

    public function store(OrderItemRequest $request)
    {
        $userId = Auth::id();
        $order = Order::create([
            'user_id' => $userId,
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

        return response()->json([
            'message' => 'order placed successfully',
            'order' => new OrderResourse($order),
        ], 201);
    }

    public function show($id)
    {
        $order = Order::find($id);
        if (! $order) {
            return response()->json(['message' => 'Order not found'], 404);
        }

        return response()->json([
            'order' => new OrderResourse($order),
        ]);
    }

    public function update(OrderItemRequest $request, $id)
    {
        if (! $id) {
            return response()->json(['message' => 'provide order id'], 400);
        }
        $order = Order::find($id);
        if (! $order) {
            return response()->json(['message' => 'Order not found'], 404);
        }
        // delete previous records
        $order->orderItems()->delete();
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

        return response()->json([
            'message' => 'order updated successfully',
            'order' => new OrderResourse($order),
        ], 200);

    }

    public function destroy($id)
    {
        if (! $id) {
            return response()->json(['message' => 'provide order id'], 400);
        }
        $order = Order::find($id);
        if (! $order) {
            return response()->json(['message' => 'Order not found'], 404);
        }
        $order->delete();

        return response()->json([
            'message' => 'Order deleted successfully',
        ]);
    }
}
