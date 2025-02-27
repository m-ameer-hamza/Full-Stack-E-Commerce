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
        // Validate incoming request (if needed)
        $validated = $request->validate([
            'amount' => 'required|integer', // Amount in cents
        ]);

        Stripe::setApiKey(env('STRIPE_SECRET'));

        // Create a Checkout session
        $session = Session::create([
            'payment_method_types' => ['card'],
            'billing_address_collection' => 'required',
            'line_items' => [[
                'price_data' => [
                    'currency' => 'usd',
                    'product_data' => [
                        'name' => 'Your Product Name',
                    ],
                    'unit_amount' => $request->amount, // amount in cents
                ],
                'quantity' => 1,
            ]],
            'mode' => 'payment',
            'success_url' => url('/payment-success?session_id={CHECKOUT_SESSION_ID}'),
            'cancel_url' => url('/payment-cancel'),
            'metadata' => [
                'order_items' => json_encode($request->items),
                'amount' => (string) $request->amount,
                'user_id' => Auth::id(),
            ],

        ]);

        // Return the session URL for redirection from the Vue app
        return response()->json(['url' => $session->url]);
    }

    public function handleWebhook(Request $request)
    {
        Stripe::setApiKey(env('STRIPE_SECRET'));

        $event = $request->all();

        if ($event['type'] === 'checkout.session.completed') {
            $session = $event['data']['object'];

            // Retrieve customer details from Stripe.
            $customer = Customer::retrieve($session['customer']);
            // Decode order items from metadata.
            $orderItems = json_decode($session['metadata']['order_items'], true);
            $amount = (float) $session['metadata']['amount'];
            $userId = $session['metadata']['user_id'];

            // Prepare billing data. Adjust keys as per your Order table columns.
            $billingData = [
                'billing_name' => $customer->name,
                'billing_email' => $customer->email,
                'billing_address' => json_encode($customer->address),
            ];

            // Create an instance of the OrderCreator service.
            $orderCreator = new OrderCreator;

            // Create the order without a user_id since this might be a guest checkout.
            $order = $orderCreator->createOrder($billingData, $orderItems, $userId, $amount);

            // Optionally, you can log or perform other actions with the created order.
        }

        return response()->json(['message' => 'Webhook received']);
    }
}
