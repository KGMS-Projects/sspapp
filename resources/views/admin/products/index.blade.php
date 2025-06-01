<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Admin - Manage Products</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <style>
        .category-section {
            margin-bottom: 3rem;
        }

        .category-heading {
            font-size: 1.5rem;
            font-weight: 600;
            margin-bottom: 1.5rem;
            padding-bottom: 0.5rem;
            border-bottom: 2px solid #e5e7eb;
        }
    </style>
</head>

<body class="bg-gray-100 font-sans antialiased">

    <div class="min-h-screen flex flex-col">
        <!-- Header -->
        <header class="bg-white shadow">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6 flex justify-between items-center">
                <div class="flex items-center">
                    <button onclick="window.history.back()" class="mr-4 text-gray-600 hover:text-gray-900">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                        </svg>
                    </button>
                    <h1 class="text-3xl font-bold text-gray-900">Manage Products</h1>
                </div>
            </div>
        </header>

        <!-- Main Content -->
        <main class="flex-1">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">

                <!-- Add Product Button -->
                <div class="flex justify-end mb-6">
                    <a href="{{ route('admin.products.create') }}" class="btn-luxury flex items-center px-4 py-2 bg-orange-800 text-white rounded-lg hover:bg-gray-800 transition">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                        </svg>
                        Add Product
                    </a>
                </div>

                <!-- Flash Messages -->
                @if(session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                    {{ session('success') }}
                </div>
                @endif

                @if(session('error'))
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                    {{ session('error') }}
                </div>
                @endif

                <!-- Women's Products Section -->
                <div class="category-section">
                    <h2 class="category-heading">Women's Products</h2>
                    <div class="bg-white rounded-xl shadow overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase">Name</th>
                                    <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase">Category</th>
                                    <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase">Price</th>
                                    <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase">Stock</th>
                                    <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase">Status</th>
                                    <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200">
                                @foreach($products->where('category.name', 'Women') as $product)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="w-10 h-10 bg-gray-200 rounded-lg mr-3"></div>
                                            <div>
                                                <div class="text-sm font-semibold text-gray-900">{{ $product->name }}</div>
                                                <div class="text-xs text-gray-500">{{ $product->sku }}</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900">{{ $product->category->name }}</div>
                                        <div class="text-xs text-gray-500">{{ $product->subcategory->name ?? '' }}</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm font-medium text-gray-900">${{ number_format($product->price, 2) }}</div>
                                        @if($product->sale_price)
                                        <div class="text-sm text-red-600">${{ number_format($product->sale_price, 2) }}</div>
                                        @endif
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span class="text-sm {{ $product->stock_quantity <= 5 ? 'text-red-600' : 'text-gray-900' }}">
                                            {{ $product->stock_quantity }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span class="px-3 py-1 text-xs rounded-full {{ $product->is_active ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                            {{ $product->is_active ? 'Active' : 'Inactive' }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm">
                                        <div class="flex space-x-3">
                                            <!--  <a href="{{ route('admin.products.show', $product) }}" class="text-blue-600 hover:text-blue-800">View</a> -->
                                            <a href="{{ route('admin.products.edit', $product) }}" class="text-indigo-600 hover:text-indigo-800">Edit</a>
                                            <form action="{{ route('admin.products.destroy', $product) }}" method="POST" onsubmit="return confirm('Are you sure?')" class="inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-red-600 hover:text-red-800">Delete</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Men's Products Section -->
                <div class="category-section">
                    <h2 class="category-heading">Men's Products</h2>
                    <div class="bg-white rounded-xl shadow overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase">Name</th>
                                    <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase">Category</th>
                                    <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase">Price</th>
                                    <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase">Stock</th>
                                    <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase">Status</th>
                                    <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200">
                                @foreach($products->where('category.name', 'Men') as $product)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="w-10 h-10 bg-gray-200 rounded-lg mr-3"></div>
                                            <div>
                                                <div class="text-sm font-semibold text-gray-900">{{ $product->name }}</div>
                                                <div class="text-xs text-gray-500">{{ $product->sku }}</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900">{{ $product->category->name }}</div>
                                        <div class="text-xs text-gray-500">{{ $product->subcategory->name ?? '' }}</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm font-medium text-gray-900">${{ number_format($product->price, 2) }}</div>
                                        @if($product->sale_price)
                                        <div class="text-sm text-red-600">${{ number_format($product->sale_price, 2) }}</div>
                                        @endif
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span class="text-sm {{ $product->stock_quantity <= 5 ? 'text-red-600' : 'text-gray-900' }}">
                                            {{ $product->stock_quantity }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span class="px-3 py-1 text-xs rounded-full {{ $product->is_active ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                            {{ $product->is_active ? 'Active' : 'Inactive' }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm">
                                        <div class="flex space-x-3">
                                            <!-- <a href="{{ route('admin.products.show', $product) }}" class="text-blue-600 hover:text-blue-800">View</a> -->
                                            <a href="{{ route('admin.products.edit', $product) }}" class="text-indigo-600 hover:text-indigo-800">Edit</a>
                                            <form action="{{ route('admin.products.destroy', $product) }}" method="POST" onsubmit="return confirm('Are you sure?')" class="inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-red-600 hover:text-red-800">Delete</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Accessories Section -->
                <div class="category-section">
                    <h2 class="category-heading">Accessories</h2>
                    <div class="bg-white rounded-xl shadow overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase">Name</th>
                                    <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase">Category</th>
                                    <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase">Price</th>
                                    <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase">Stock</th>
                                    <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase">Status</th>
                                    <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200">
                                @foreach($products->where('category.name', 'Accessories') as $product)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="w-10 h-10 bg-gray-200 rounded-lg mr-3"></div>
                                            <div>
                                                <div class="text-sm font-semibold text-gray-900">{{ $product->name }}</div>
                                                <div class="text-xs text-gray-500">{{ $product->sku }}</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900">{{ $product->category->name }}</div>
                                        <div class="text-xs text-gray-500">{{ $product->subcategory->name ?? '' }}</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm font-medium text-gray-900">${{ number_format($product->price, 2) }}</div>
                                        @if($product->sale_price)
                                        <div class="text-sm text-red-600">${{ number_format($product->sale_price, 2) }}</div>
                                        @endif
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span class="text-sm {{ $product->stock_quantity <= 5 ? 'text-red-600' : 'text-gray-900' }}">
                                            {{ $product->stock_quantity }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span class="px-3 py-1 text-xs rounded-full {{ $product->is_active ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                            {{ $product->is_active ? 'Active' : 'Inactive' }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm">
                                        <div class="flex space-x-3">
                                            <!-- <a href="{{ route('admin.products.show', $product) }}" class="text-blue-600 hover:text-blue-800">View</a> -->
                                            <a href="{{ route('admin.products.edit', $product) }}" class="text-indigo-600 hover:text-indigo-800">Edit</a>
                                            <form action="{{ route('admin.products.destroy', $product) }}" method="POST" onsubmit="return confirm('Are you sure?')" class="inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-red-600 hover:text-red-800">Delete</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </main>
    </div>

</body>

</html>