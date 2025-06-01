<x-app-layout>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <h1 class="text-3xl font-bold text-gray-900 mb-8">Checkout</h1>

        <!-- Progress Steps -->
        <div class="mb-8">
            <div class="flex items-center">
                <div class="flex items-center text-luxury-brown">
                    <div class="rounded-full bg-luxury-brown text-white w-8 h-8 flex items-center justify-center text-sm">1</div>
                    <span class="ml-2 text-sm font-medium">Shipping & Billing</span>
                </div>
                <div class="flex-1 border-t-2 border-gray-200 mx-4"></div>
                <div class="flex items-center text-gray-400">
                    <div class="rounded-full border-2 border-gray-200 w-8 h-8 flex items-center justify-center text-sm">2</div>
                    <span class="ml-2 text-sm font-medium">Payment</span>
                </div>
                <div class="flex-1 border-t-2 border-gray-200 mx-4"></div>
                <div class="flex items-center text-gray-400">
                    <div class="rounded-full border-2 border-gray-200 w-8 h-8 flex items-center justify-center text-sm">3</div>
                    <span class="ml-2 text-sm font-medium">Confirmation</span>
                </div>
            </div>
        </div>

        <form action="{{ route('checkout.process') }}" method="POST" class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            @csrf

            <!-- Checkout Form -->
            <div class="lg:col-span-2 space-y-6">
                <!-- Billing Address -->
                <div class="bg-white rounded-lg shadow p-6">
                    <h2 class="text-xl font-bold text-gray-900 mb-4">Billing Address</h2>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">First Name *</label>
                            <input type="text" name="billing_first_name" value="{{ old('billing_first_name', auth()->user()->name) }}"
                                class="w-full border rounded-lg px-3 py-2 @error('billing_first_name') border-red-500 @enderror" required>
                            @error('billing_first_name')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Last Name *</label>
                            <input type="text" name="billing_last_name" value="{{ old('billing_last_name') }}"
                                class="w-full border rounded-lg px-3 py-2 @error('billing_last_name') border-red-500 @enderror" required>
                            @error('billing_last_name')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Email *</label>
                            <input type="email" name="billing_email" value="{{ old('billing_email', auth()->user()->email) }}"
                                class="w-full border rounded-lg px-3 py-2 @error('billing_email') border-red-500 @enderror" required>
                            @error('billing_email')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Phone *</label>
                            <input type="tel" name="billing_phone" value="{{ old('billing_phone') }}"
                                class="w-full border rounded-lg px-3 py-2 @error('billing_phone') border-red-500 @enderror" required>
                            @error('billing_phone')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="md:col-span-2">
                            <label class="block text-sm font-medium text-gray-700 mb-1">Address *</label>
                            <input type="text" name="billing_address" value="{{ old('billing_address') }}"
                                class="w-full border rounded-lg px-3 py-2 @error('billing_address') border-red-500 @enderror" required>
                            @error('billing_address')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">City *</label>
                            <input type="text" name="billing_city" value="{{ old('billing_city') }}"
                                class="w-full border rounded-lg px-3 py-2 @error('billing_city') border-red-500 @enderror" required>
                            @error('billing_city')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">State *</label>
                            <input type="text" name="billing_state" value="{{ old('billing_state') }}"
                                class="w-full border rounded-lg px-3 py-2 @error('billing_state') border-red-500 @enderror" required>
                            @error('billing_state')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">ZIP Code *</label>
                            <input type="text" name="billing_zip" value="{{ old('billing_zip') }}"
                                class="w-full border rounded-lg px-3 py-2 @error('billing_zip') border-red-500 @enderror" required>
                            @error('billing_zip')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Country *</label>
                            <select name="billing_country" class="w-full border rounded-lg px-3 py-2 @error('billing_country') border-red-500 @enderror" required>
                                <option value="">Select Country</option>
                                <option value="US" {{ old('billing_country') == 'US' ? 'selected' : '' }}>United States</option>
                                <option value="CA" {{ old('billing_country') == 'CA' ? 'selected' : '' }}>Canada</option>
                                <option value="UK" {{ old('billing_country') == 'UK' ? 'selected' : '' }}>United Kingdom</option>
                                <option value="LK" {{ old('billing_country') == 'LK' ? 'selected' : '' }}>Sri Lanka</option>
                            </select>
                            @error('billing_country')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>

                <!-- Shipping Address -->
                <div class="bg-white rounded-lg shadow p-6">
                    <h2 class="text-xl font-bold text-gray-900 mb-4">Shipping Address</h2>

                    <div class="mb-4">
                        <label class="flex items-center">
                            <input type="checkbox" name="shipping_same_as_billing" value="1"
                                class="rounded border-gray-300" {{ old('shipping_same_as_billing', true) ? 'checked' : '' }}>
                            <span class="ml-2 text-sm text-gray-700">Same as billing address</span>
                        </label>
                    </div>

                    <div id="shipping-fields" class="grid grid-cols-1 md:grid-cols-2 gap-4" style="display: none;">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">First Name</label>
                            <input type="text" name="shipping_first_name" value="{{ old('shipping_first_name') }}"
                                class="w-full border rounded-lg px-3 py-2">
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Last Name</label>
                            <input type="text" name="shipping_last_name" value="{{ old('shipping_last_name') }}"
                                class="w-full border rounded-lg px-3 py-2">
                        </div>

                        <div class="md:col-span-2">
                            <label class="block text-sm font-medium text-gray-700 mb-1">Address</label>
                            <input type="text" name="shipping_address" value="{{ old('shipping_address') }}"
                                class="w-full border rounded-lg px-3 py-2">
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">City</label>
                            <input type="text" name="shipping_city" value="{{ old('shipping_city') }}"
                                class="w-full border rounded-lg px-3 py-2">
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">State</label>
                            <input type="text" name="shipping_state" value="{{ old('shipping_state') }}"
                                class="w-full border rounded-lg px-3 py-2">
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">ZIP Code</label>
                            <input type="text" name="shipping_zip" value="{{ old('shipping_zip') }}"
                                class="w-full border rounded-lg px-3 py-2">
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Country</label>
                            <select name="shipping_country" class="w-full border rounded-lg px-3 py-2">
                                <option value="">Select Country</option>
                                <option value="US">United States</option>
                                <option value="CA">Canada</option>
                                <option value="UK">United Kingdom</option>
                                <option value="LK">Sri Lanka</option>
                            </select>
                        </div>
                    </div>
                </div>

                <!-- Payment Method -->
                <div class="bg-white rounded-lg shadow p-6">
                    <h2 class="text-xl font-bold text-gray-900 mb-4">Payment Method</h2>

                    <div class="space-y-3">
                        <label class="flex items-center p-3 border rounded-lg cursor-pointer hover:bg-gray-50">
                            <input type="radio" name="payment_method" value="credit_card"
                                class="text-luxury-brown" {{ old('payment_method', 'credit_card') == 'credit_card' ? 'checked' : '' }}>
                            <span class="ml-3 font-medium">Credit Card</span>
                        </label>

                        <label class="flex items-center p-3 border rounded-lg cursor-pointer hover:bg-gray-50">
                            <input type="radio" name="payment_method" value="paypal"
                                class="text-luxury-brown" {{ old('payment_method') == 'paypal' ? 'checked' : '' }}>
                            <span class="ml-3 font-medium">PayPal</span>
                        </label>

                        <label class="flex items-center p-3 border rounded-lg cursor-pointer hover:bg-gray-50">
                            <input type="radio" name="payment_method" value="bank_transfer"
                                class="text-luxury-brown" {{ old('payment_method') == 'bank_transfer' ? 'checked' : '' }}>
                            <span class="ml-3 font-medium">Bank Transfer</span>
                        </label>
                    </div>
                </div>

                <!-- Terms and Conditions -->
                <div class="bg-white rounded-lg shadow p-6">
                    <label class="flex items-start">
                        <input type="checkbox" name="terms_accepted" value="1"
                            class="rounded border-gray-300 mt-1" {{ old('terms_accepted') ? 'checked' : '' }} required>
                        <span class="ml-3 text-sm text-gray-700">
                            I agree to the <a href="#" class="text-luxury-brown hover:underline">Terms and Conditions</a>
                            and <a href="#" class="text-luxury-brown hover:underline">Privacy Policy</a>
                        </span>
                    </label>
                    @error('terms_accepted')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <!-- Order Summary -->
            <div class="lg:col-span-1">
                <div class="bg-white rounded-lg shadow p-6 sticky top-4">
                    <h2 class="text-xl font-bold text-gray-900 mb-4">Order Summary</h2>

                    <!-- Cart Items -->
                    <div class="space-y-4 mb-6">
                        @foreach($cartItems as $item)
                        <div class="flex items-center space-x-3">
                            <div class="w-16 h-16 bg-gray-200 rounded-lg flex items-center justify-center flex-shrink-0">
                                <span class="text-xs text-gray-500">{{ $item->product->name }}</span>
                            </div>
                            <div class="flex-1">
                                <h4 class="text-sm font-medium text-gray-900">{{ $item->product->name }}</h4>
                                <p class="text-sm text-gray-500">Qty: {{ $item->quantity }}</p>
                                @if($item->size)
                                <p class="text-sm text-gray-500">Size: {{ $item->size }}</p>
                                @endif
                            </div>
                            <div class="text-sm font-medium">
                                ${{ number_format(($item->product->isOnSale() ? $item->product->sale_price : $item->product->price) * $item->quantity, 2) }}
                            </div>
                        </div>
                        @endforeach
                    </div>

                    <!-- Totals -->
                    <div class="space-y-3 border-t pt-4">
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

                    <!-- Place Order Button -->
                    <button type="submit" class="w-full btn-luxury mt-6">
                        Place Order
                    </button>
                </div>
            </div>
        </form>
    </div>

    <script>
        // Toggle shipping fields
        document.addEventListener('DOMContentLoaded', function() {
            const shippingCheckbox = document.querySelector('input[name="shipping_same_as_billing"]');
            const shippingFields = document.getElementById('shipping-fields');

            function toggleShippingFields() {
                if (shippingCheckbox.checked) {
                    shippingFields.style.display = 'none';
                } else {
                    shippingFields.style.display = 'grid';
                }
            }

            shippingCheckbox.addEventListener('change', toggleShippingFields);
            toggleShippingFields(); // Initial state
        });
    </script>
</x-app-layout>