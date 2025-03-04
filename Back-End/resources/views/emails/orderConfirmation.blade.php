<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Order Confirmation</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .order-details { margin-bottom: 20px; }
        .order-items { border-collapse: collapse; width: 100%; }
        .order-items th, .order-items td { border: 1px solid #ddd; padding: 8px; }
        .order-items th { background-color: #f2f2f2; }
    </style>
</head>
<body>
    <h1>Thank You for Your Order!</h1>
    
    <div class="order-details">
        <p><strong>Order ID:</strong> {{ $order->id }}</p>
        <p><strong>Total Amount:</strong> ${{ number_format($order->total, 2) }}</p>
    </div>

    <h2>Order Items</h2>
    <table class="order-items">
        <thead>
            <tr>
                <th>Product Title</th>
                <th>Price</th>
                <th>Quantity</th>
            </tr>
        </thead>
        <tbody>
            @foreach($order->orderItems as $item)
                <tr>
                    <td>{{ $item->product->title }}</td>
                    <td>${{ number_format($item->product->price, 2) }}</td>
                    <td>{{ $item->quantity }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    
    <p>If you have any questions, feel free to contact our support.</p>
</body>
</html>
