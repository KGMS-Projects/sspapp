<x-app-layout>
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <div class="text-center mb-8">
            <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-4">
                <svg class="w-8 h-8 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                </svg>
            </div>
            <h1 class="text-3xl font-bold text-gray-900 mb-2">Order Confirmed!</h1>
            <p class="text-gray-600">Your order has been successfully placed.</p>
        </div>

        <!-- Order Details -->
        <div class="bg-white rounded-lg shadow p-6 mb-8">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                <div>
                    <h3<h3 class="text-lg font-semibold text-gray-900 mb-2">Order Information</h3>
                        <p class="text-sm text-gray-600">Order Number: <span class="font-medium">{{ $order->order_number }}</span></p>
                        <p class="text-sm text-gray-600">Order Date: <span class="font-medium">{{ $order->created_at->format('M j, Y g:i A') }}</span></p>
                        <p class="text-sm text-gray-600">Payment Method: <span class="font-medium">{{ ucfirst(str_replace('_', ' ', $order->payment_method)) }}</span></p>
                        <p class="text-sm text-gray-600">Status: <span class="px-2 py-1 text-xs rounded-full bg-yellow-100 text-yellow-800">{{ ucfirst($order->status) }}</span></p>
                </div>

                <div>
                    <h3 class="text-lg font-semibold text-gray-900 mb-2">Shipping Address</h3>
                    <div class="text-sm text-gray-600">
                        <p>{{ $order->shipping_address['first_name'] }} {{ $order->shipping_address['last_name'] }}</p>
                        <p>{{ $order->shipping_address['address'] }}</p>
                        <p>{{ $order->shipping_address['city'] }}, {{ $order->shipping_address['state'] }} {{ $order->shipping_address['zip'] }}</p>
                        <p>{{ $order->shipping_address['country'] }}</p>
                    </div>
                </div>
            </div>

            <!-- Order Items -->
            <div class="border-t pt-6">
                <h3 class="text-lg font-semibold text-gray-900 mb-4">Order Items</h3>
                <div class="space-y-4">
                    @foreach($order->orderItems as $item)
                    <div class="flex items-center space-x-4 pb-4 border-b border-gray-200 last:border-b-0">
                        <div class="w-16 h-16 bg-gray-200 rounded-lg flex items-center justify-center flex-shrink-0">
                            <span class="text-xs text-gray-500">{{ $item->product->name ?? 'Product' }}</span>
                        </div>
                        <div class="flex-1">
                            <h4 class="text-sm font-medium text-gray-900">{{ $item->product->name ?? 'Product Name' }}</h4>
                            <p class="text-sm text-gray-500">Quantity: {{ $item->quantity }}</p>
                            @if($item->size)
                            <p class="text-sm text-gray-500">Size: {{ $item->size }}</p>
                            @endif
                            @if($item->color)
                            <p class="text-sm text-gray-500">Color: {{ $item->color }}</p>
                            @endif
                        </div>
                        <div class="text-sm">
                            <p class="font-medium">${{ number_format($item->total_price, 2) }}</p>
                            <p class="text-gray-500">${{ number_format($item->unit_price, 2) }} each</p>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>

            <!-- Order Total -->
            <div class="border-t pt-6 mt-6">
                <div class="space-y-2">
                    <div class="flex justify-between text-sm">
                        <span class="text-gray-600">Subtotal</span>
                        <span>${{ number_format($order->subtotal, 2) }}</span>
                    </div>
                    <div class="flex justify-between text-sm">
                        <span class="text-gray-600">Shipping</span>
                        <span>${{ number_format($order->shipping_amount, 2) }}</span>
                    </div>
                    <div class="flex justify-between text-sm">
                        <span class="text-gray-600">Tax</span>
                        <span>${{ number_format($order->tax_amount, 2) }}</span>
                    </div>
                    <div class="border-t pt-2">
                        <div class="flex justify-between text-lg font-bold">
                            <span>Total</span>
                            <span>${{ number_format($order->total_amount, 2) }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Action Buttons -->
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            @if($order->payment_status === 'pending')
            <form action="{{ route('checkout.payment', $order->id) }}" method="POST">
                @csrf
                <button type="submit" class="btn-luxury">
                    Complete Payment
                </button>
            </form>
            @endif

            <a href="{{ route('home') }}" class="btn-outline-luxury">
                Continue Shopping
            </a>

            <button onclick="window.print()" class="btn-outline-luxury">
                Print Order
            </button>
        </div>
    </div>
</x-app-layout>