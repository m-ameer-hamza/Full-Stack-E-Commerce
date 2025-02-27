<?php

namespace App\Services;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;

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
    public function createOrder(array $billingData, array $orderItems, $userId, $totalAmount)
    {
        // Create the order record. 'total' can be updated later.
        $order = Order::create(array_merge([
            'user_id' => $userId,
            'total' => 0,  // initial total
        ], $billingData));

        // Process each order item.
        foreach ($orderItems as $item) {
            // Find the product; you can add error handling if product is not found.
            $product = Product::find($item['product_id']);
            if (! $product) {
                // Optionally, you could throw an exception or skip the item.
                continue;
            }
            $amount = $product->price * $item['quantity'];
            // Create an OrderItem record.
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $product->id,
                'quantity' => $item['quantity'],
                'amount' => $amount,
            ]);
        }

        // Update the order with the calculated total.
        $order->update(['total' => $totalAmount]);

        return $order;
    }
}
