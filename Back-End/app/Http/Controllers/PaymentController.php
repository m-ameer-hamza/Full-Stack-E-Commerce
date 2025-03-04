<?php

namespace App\Http\Controllers;

use App\Services\OrderCreator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Stripe\Checkout\Session;
use Stripe\Customer;
use Stripe\Stripe;

class PaymentController extends Controller
{
    public function createCheckoutSession(Request $request)
    {

         $request->validate([
            'amount' => 'required|numeric',
            'items' => 'required|array',
        ]);

        Stripe::setApiKey(env('STRIPE_SECRET'));

        $lineItems = [];
        $metadataItems = [];

        foreach ($request->items as $item) {
            // dollars to cents
            $priceInCents = intval($item['price'] * 100);

            //  line item for the Stripe Checkout
            $lineItems[] = [
                'price_data' => [
                    'currency' => 'usd',
                    'product_data' => [
                        'name' => $item['title'],
                    ],
                    'unit_amount' => $priceInCents, // Price in cents
                ],
                'quantity' => $item['quantity'],
            ];

            $metadataItems[] = [
                'product_id' => $item['product_id'],
                'quantity' => $item['quantity'],
            ];
        }

        $session = Session::create([
            'payment_method_types' => ['card'],
            'billing_address_collection' => 'required',
            'phone_number_collection' => ['enabled' => true],
            'line_items' => $lineItems,
            'mode' => 'payment',
            'success_url' => 'http://localhost:5173/payment-success?session_id={CHECKOUT_SESSION_ID}',
            'cancel_url' => 'http://localhost:5173/payment-cancelled',
            'metadata' => [
                'order_items' => json_encode($metadataItems),
                'amount' => intval($request->amount * 100), // store amount in cents
                'user_id' => Auth::id(),
            ],
        ]);

        return response()->json(['url' => $session->url]);
    }

    public function completeOrder(Request $request)
    {
        $sessionId = $request->input('session_id');
        if (! $sessionId) {
            return response()->json(['error' => 'Session ID is required'], 400);
        }

        Stripe::setApiKey(env('STRIPE_SECRET'));

        try {
            $session = Session::retrieve($sessionId);

            if (! empty($session->customer)) {
                $customer = Customer::retrieve($session->customer);
            } else {

                $customer = (object) $session->customer_details;
            }

            $orderItems = json_decode($session->metadata->order_items, true);
            $amount = (float) $session->metadata->amount;
            $userId = $session->metadata->user_id;

            $billingData = [
                'billing_name' => $customer->name,
                'billing_email' => $customer->email,
                'billing_address' => $customer->address->city ?? null,
            ];

            // OrderCreator service.
            $orderCreator = new OrderCreator;
            $order = $orderCreator->call($billingData, $orderItems, $userId, $amount);

            return response()->json([
                'message' => 'Order created successfully',
                'order' => $order,
            ]);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
