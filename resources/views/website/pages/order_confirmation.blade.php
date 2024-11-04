<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Confirmation</title>
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
</head>
<body class="bg-white">
    <div class="container mx-auto py-12 ">
        <h1 class="text-3xl font-bold mb-8 text-center">Order Confirmation</h1>

        <div class="bg-white p-6 rounded-lg shadow-lg border border-gray-200 text-center">
            <h2 class="text-xl font-semibold mb-4">Your order has been placed successfully!</h2>
            <p class="mb-4">Thank you for your purchase. We appreciate your business.</p>

            <div class="flex justify-center space-x-4">
                <a href="{{ route('orders.order_detail', ['orderId' => $order->id]) }}" class="bg-blue-500 text-white p-3 rounded-lg hover:bg-blue-600 flex items-center justify-center">
                    View Order Details
                </a>
                <a href="{{ route('dashboard') }}" class="bg-gray-200 text-black p-3 rounded-lg hover:bg-gray-300 flex items-center justify-center">
                    Back to Dashboard
                </a>
            </div>
        </div>
    </div>
</body>
</html>
