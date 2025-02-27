<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderItemRequest;
use App\Http\Resources\OrderResourse;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Services\OrderCreator;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index()
    {
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
        $billingData = [
            'billing_name' => $request->billing_name,
            'billing_email' => $request->billing_email,
            'billing_address' => $request->billing_address,
        ];

        $orderItems = $request->items;
        $totalAmount = (float) ($request->total);

        $orderCreator = new OrderCreator;
        $order = $orderCreator->call($billingData, $orderItems, $userId, $totalAmount);

        return response()->json([
            'message' => 'Order placed successfully',
            'order' => new OrderResourse($order),
        ], 201);
    }

    public function show($id)
    {
        $order = Order::find($id); // lazy load -> :with
        if (! $order) {
            return response()->json(['message' => 'Order not found'], 404);
        }

        return response()->json([
            'order' => new OrderResourse($order),
        ]);
    }

    public function update(OrderItemRequest $request, $id)
    {
        $order = Order::find($id);
        if (! $order) {
            return response()->json(['message' => 'Order not found'], 404);
        }

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

        $order->update(['total' => $totalAmount]);

        return response()->json([
            'message' => 'order updated successfully',
            'order' => new OrderResourse($order),
        ], 200);

    }

    public function destroy($id)
    {
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
