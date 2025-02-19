<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Http\Requests\OrderItemRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\OrderResourse;
use Laravel\Sanctum\PersonalAccessToken;

class OrderController extends Controller
{
    public function index()
    {
        //returns the orders of a specific user only using the id from token
        $orders = Order::all();
        return response()->json([
            'orders' => OrderResourse::collection($orders),
        ]);
    }

    public function create()
    {
        //
    }
//     public function getUserId(Request $request) {
//     if ($request->hasHeader('Authorization')) {
//         $token = $request->bearerToken();
//         if ($token) {
//             $accessToken = PersonalAccessToken::findToken($token);
//             if ($accessToken) {
//                 return $accessToken->tokenable_id;
//             }
//         }
//     }
//     return null;
// }
    public function store(OrderItemRequest $request)
    {
        // $userId = $this->getUserId($request);
        $userId=null;
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
        //find the order by id. order id is passed as a parameter
        $order = Order::find($id);
        if (!$order) {
            return response()->json(['message' => 'Order not found'], 404);
        }
        return response()->json([
            'order' => new OrderResourse($order),
        ]);
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
