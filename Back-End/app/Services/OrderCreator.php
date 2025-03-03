<?php

namespace App\Services;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Jobs\SendOrderConfirmationEmail;

class OrderCreator
{
    /**
     * Create an order along with its items.
     *
     * @param  array  $billingData  Array containing billing_name, billing_email, billing_address, etc.
     * @param  array  $orderItems  Array of order items (each item should have product_id and quantity)
     * @param  int|null  $userId  Optional user ID
     * @return \App\Models\Order
     */
    public function call(array $billingData, array $orderItems, $userId, $totalAmount)
    {
        // Create the order record. 'total' can be updated later.
        $order = Order::create(array_merge([
            'user_id' => $userId,
            'total' => 0,  // initial total
        ], $billingData));

        foreach ($orderItems as $item) {
            $product = Product::find($item['product_id']);
            if (!$product) {
                continue;
            }
            $amount = $product->price * $item['quantity'];
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $product->id,
                'quantity' => $item['quantity'],
                'amount' => $amount,
            ]);
        }
        $order->update(['total' => $totalAmount]);
        SendOrderConfirmationEmail::dispatch($order);

        return $order;
    }
}
