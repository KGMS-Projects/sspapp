<div>
    @if($cartItems->count() > 0)
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <!-- Cart Items -->
        <div class="lg:col-span-2 space-y-4">
            @foreach($cartItems as $item)
            <div class="bg-white rounded-lg shadow-md p-6 flex items-center space-x-4">
                <!-- Product Image -->
                <div class="w-24 h-24 bg-gray-200 rounded-lg flex items-center justify-center flex-shrink-0">
                    <span class="text-xs text-gray-500">{{ $item->product->name }}</span>
                </div>

                <!-- Product Details -->
                <div class="flex-1">
                    <h3 class="text-lg font-semibold text-gray-900">{{ $item->product->name }}</h3>
                    <p class="text-sm text-gray-500">{{ $item->product->category->name }}</p>

                    @if($item->size)
                    <p class="text-sm text-gray-500">Size: {{ $item->size }}</p>
                    @endif

                    @if($item->color)
                    <p class="text-sm text-gray-500">Color: {{ $item->color }}</p>
                    @endif

                    <p class="text-lg font-bold text-luxury-black mt-2">
                        ${{ number_format($item->product->isOnSale() ? $item->product->sale_price : $item->product->price, 2) }}
                    </p>
                </div>

                <!-- Quantity Controls -->
                <div class="flex items-center space-x-2">
                    <button
                        wire:click="updateQuantity({{ $item->id }}, {{ $item->quantity - 1 }})"
                        class="w-8 h-8 flex items-center justify-center border border-gray-300 rounded-md hover:bg-gray-50">
                        -
                    </button>
                    <span class="w-8 text-center">{{ $item->quantity }}</span>
                    <button
                        wire:click="updateQuantity({{ $item->id }}, {{ $item->quantity + 1 }})"
                        class="w-8 h-8 flex items-center justify-center border border-gray-300 rounded-md hover:bg-gray-50"
                        {{ $item->quantity >= $item->product->stock_quantity ? 'disabled' : '' }}>
                        +
                    </button>
                </div>

                <!-- Remove Button -->
                <button
                    wire:click="removeItem({{ $item->id }})"
                    class="text-red-500 hover:text-red-700">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                    </svg>
                </button>
            </div>
            @endforeach

            <!-- Cart Actions -->
            <div class="flex justify-between items-center pt-4">
                <button
                    wire:click="clearCart"
                    class="text-red-500 hover:text-red-700 font-medium">
                    Clear Cart
                </button>
                <a href="{{ route('products.index') }}" class="btn-outline-luxury">
                    Continue Shopping
                </a>
            </div>
        </div>

        <!-- Order Summary -->
        <div class="lg:col-span-1">
            <div class="bg-white rounded-lg shadow-md p-6 sticky top-4">
                <h2 class="text-xl font-bold text-gray-900 mb-4">Order Summary</h2>

                <div class="space-y-3">
                    <div class="flex justify-between">
                        <span class="text-gray-600">Subtotal</span>
                        <span class="font-medium">${{ number_format($subtotal, 2) }}</span>
                    </div>

                    <div class="flex justify-between">
                        <span class="text-gray-600">Shipping</span>
                        <span class="font-medium">
                            @if($shipping == 0)
                            <span class="text-green-600">Free</span>
                            @else
                            ${{ number_format($shipping, 2) }}
                            @endif
                        </span>
                    </div>

                    <div class="flex justify-between">
                        <span class="text-gray-600">Tax</span>
                        <span class="font-medium">${{ number_format($tax, 2) }}</span>
                    </div>

                    <div class="border-t pt-3">
                        <div class="flex justify-between text-lg font-bold">
                            <span>Total</span>
                            <span>${{ number_format($total, 2) }}</span>
                        </div>
                    </div>
                </div>

                <!-- Replace the existing checkout button with this -->
                <a href="{{ route('checkout.index') }}" class="w-full btn-luxury block text-center">
                    Proceed to Checkout
                </a>

                @if($subtotal < 200 && $subtotal> 0)
                    <p class="text-sm text-gray-500 mt-3 text-center">
                        Add ${{ number_format(200 - $subtotal, 2) }} more for free shipping
                    </p>
                    @endif
            </div>
        </div>
    </div>
    @else
    <!-- Empty Cart -->
    <div class="text-center py-12">
        <svg class="mx-auto h-24 w-24 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4m0 0L7 13m0 0l-1.5 6M7 13l-1.5 6m0 0h9m-9 0V9a2 2 0 012-2h2m5 0V7a2 2 0 012-2h2m0 0V5a2 2 0 012-2h1"></path>
        </svg>
        <h3 class="mt-4 text-lg font-medium text-gray-900">Your cart is empty</h3>
        <p class="mt-2 text-gray-500">Start shopping to add items to your cart.</p>
        <a href="{{ route('products.index') }}" class="mt-6 inline-block btn-luxury">
            Start Shopping
        </a>
    </div>
    @endif

    <!-- Success Messages -->
    @if (session()->has('success'))
    <div class="fixed bottom-4 right-4 bg-green-500 text-white px-6 py-3 rounded-lg shadow-lg">
        {{ session('success') }}
    </div>
    @endif
</div>