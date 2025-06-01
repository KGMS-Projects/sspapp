<x-app-layout>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,400;0,500;0,600;0,700;1,400&family=Montserrat:wght@100;200;300;400;500;600;700&display=swap');

        :root {
            --luxury-gold: #9a3412;
            --luxury-black: #1a1a1a;
            --luxury-grey: #f8f8f8;
            --luxury-dark-grey: #666666;
            --luxury-cream: #fefefe;
        }

        .font-serif {
            font-family: 'Cormorant Garamond', serif;
        }

        .font-sans {
            font-family: 'Montserrat', sans-serif;
        }

        body {
            background-color: var(--luxury-cream);
        }

        .hero-overlay {
            background: linear-gradient(180deg, rgba(26, 26, 26, 0.3) 0%, rgba(26, 26, 26, 0.7) 100%);
        }

        .luxury-button {
            background: transparent;
            border: 2px solid var(--luxury-gold);
            color: var(--luxury-gold);
            font-family: 'Montserrat', sans-serif;
            font-weight: 400;
            letter-spacing: 2px;
            text-transform: uppercase;
            transition: all 0.4s cubic-bezier(0.23, 1, 0.320, 1);
            position: relative;
            overflow: hidden;
        }

        .luxury-button::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: var(--luxury-gold);
            transition: left 0.4s cubic-bezier(0.23, 1, 0.320, 1);
            z-index: -1;
        }

        .luxury-button:hover::before {
            left: 0;
        }

        .luxury-button:hover {
            color: var(--luxury-black);
            transform: translateY(-1px);
            box-shadow: 0 8px 25px rgba(212, 175, 55, 0.3);
        }

        .luxury-card {
            background: white;
            transition: all 0.5s cubic-bezier(0.23, 1, 0.320, 1);
            position: relative;
            overflow: hidden;
        }

        .luxury-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(45deg, transparent 30%, rgba(212, 175, 55, 0.05) 50%, transparent 70%);
            transform: translateX(-100%) rotate(45deg);
            transition: transform 0.6s ease;
            z-index: 1;
        }

        .luxury-card:hover::before {
            transform: translateX(100%) rotate(45deg);
        }

        .luxury-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.1);
        }

        .category-overlay {
            background: linear-gradient(0deg, rgba(26, 26, 26, 0.8) 0%, transparent 60%);
        }

        .product-card {
            background: white;
            border: 1px solid rgba(212, 175, 55, 0.1);
            transition: all 0.4s ease;
        }

        .product-card:hover {
            border-color: var(--luxury-gold);
            transform: translateY(-2px);
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.08);
        }

        .section-divider {
            height: 1px;
            background: linear-gradient(90deg, transparent, var(--luxury-gold), transparent);
            margin: 60px auto;
            max-width: 200px;
        }

        .luxury-heading {
            position: relative;
            display: inline-block;
        }

        .luxury-heading::after {
            content: '';
            position: absolute;
            bottom: -8px;
            left: 50%;
            transform: translateX(-50%);
            width: 60px;
            height: 2px;
            background: var(--luxury-gold);
        }

        .animate-fade-in {
            animation: fadeIn 0.8s ease-out forwards;
            opacity: 0;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .letter-spacing-luxury {
            letter-spacing: 0.15em;
        }

        .promo-banner {
            background: linear-gradient(135deg, var(--luxury-black) 0%, #2a2a2a 100%);
            position: relative;
            overflow: hidden;
        }

        .promo-banner::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><rect fill="none" stroke="%23D4AF37" stroke-width="0.5" x="0" y="0" width="20" height="20" opacity="0.1"/></svg>');
            background-size: 40px 40px;
        }
    </style>

    <!-- Hero Section -->
    <section class="relative h-screen overflow-hidden">
        <!-- Video Background -->
        <video autoplay muted loop playsinline class="absolute inset-0 w-full h-full object-cover z-0">
            <source src="/mainimages/mainV.mp4" type="video/mp4" />
            Your browser does not support the video tag.
        </video>

        <!-- Overlay -->
        <div class="absolute inset-0 bg-black bg-opacity-50 z-0"></div>


        <div class="relative h-full flex items-center justify-center text-center text-white px-6">
            <div class="max-w-4xl animate-fade-in mt-64">
                <p class="font-sans text-sm letter-spacing-luxury text-gray-300 mb-4 uppercase">SPRING COLLECTION 2024</p>
                <!-- <h1 class="font-serif text-6xl md:text-8xl lg:text-9xl font-light mb-6 leading-none">
                    ÉLÉGANCE
                </h1> -->
                <p class="font-sans text-lg md:text-xl font-light mb-12 max-w-2xl mx-auto leading-relaxed text-gray-200">
                    Where timeless sophistication meets contemporary artistry. Discover pieces that define luxury.
                </p>
                <a href="#shop-by-category" class="luxury-button px-12 py-4 inline-block text-sm">
                    DISCOVER COLLECTION
                </a>
            </div>
        </div>
    </section>

    <!-- Shop by Category Section -->
    <section id="shop-by-category" class="py-24 bg-white">
        <div class="max-w-7xl mx-auto px-6">
            <div class="text-center mb-20">
                <h2 class="font-serif text-5xl md:text-6xl font-light text-gray-900 mb-6 luxury-heading">
                    Collections
                </h2>
                <p class="font-sans text-gray-600 max-w-2xl mx-auto leading-relaxed">
                    Curated with precision, designed for those who appreciate the finest details
                </p>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                <!-- Women's Collection -->
                <div class="group">
                    <a href="{{ route('category.women') }}" class="block luxury-card h-96 relative">
                        <img src="/mainimages/women-main.jpg" alt="Women's Collection" class="w-full h-full object-cover">
                        <div class="absolute inset-0 category-overlay"></div>
                        <div class="absolute bottom-8 left-8 right-8 text-white">
                            <div class="flex items-end justify-between">
                                <div>
                                    <h3 class="font-serif text-3xl font-light mb-2">Women</h3>
                                    <p class="font-sans text-sm letter-spacing-luxury uppercase text-gray-300">HAUTE COUTURE</p>
                                </div>
                                <div class="w-12 h-12 border border-white/30 rounded-full flex items-center justify-center group-hover:border-white/60 transition-colors">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>

                <!-- Men's Collection -->
                <div class="group">
                    <a href="{{ route('category.men') }}" class="block luxury-card h-96 relative">
                        <img src="/mainimages/men-main.jpg" alt="Men's Collection" class="w-full h-full object-cover">
                        <div class="absolute inset-0 category-overlay"></div>
                        <div class="absolute bottom-8 left-8 right-8 text-white">
                            <div class="flex items-end justify-between">
                                <div>
                                    <h3 class="font-serif text-3xl font-light mb-2">Men</h3>
                                    <p class="font-sans text-sm letter-spacing-luxury uppercase text-gray-300">SARTORIAL EXCELLENCE</p>
                                </div>
                                <div class="w-12 h-12 border border-white/30 rounded-full flex items-center justify-center group-hover:border-white/60 transition-colors">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Promotional Banner -->
    <section class="promo-banner py-20 relative">
        <div class="max-w-4xl mx-auto text-center px-6 relative z-10">
            <p class="font-sans text-sm letter-spacing-luxury text-gray-400 mb-4 uppercase">EXCLUSIVE OFFER</p>
            <h2 class="font-serif text-4xl md:text-6xl font-light text-white mb-6">
                Private Sale Event
            </h2>
            <p class="font-sans text-gray-300 mb-10 max-w-2xl mx-auto leading-relaxed">
                Access to limited editions and exclusive pieces. By invitation only.
            </p>
            <a href="#shop-by-category" class="luxury-button px-12 py-4 inline-block text-sm">
                VIEW COLLECTION
            </a>
        </div>
    </section>

    <!-- Featured Products Section -->
    <section class="py-24 bg-gray-50">
        <div class="max-w-7xl mx-auto px-6">
            <div class="text-center mb-20">
                <h2 class="font-serif text-5xl md:text-6xl font-light text-gray-900 mb-6 luxury-heading">
                    Signature Pieces
                </h2>
                <p class="font-sans text-gray-600 max-w-3xl mx-auto leading-relaxed">
                    Each piece tells a story of craftsmanship, heritage, and uncompromising attention to detail
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                <!-- Small Leather Goods -->
                <div class="group">
                    <a href="{{ route('category.accessories') }}#volet" class="block">
                        <div class="product-card p-6 text-center">
                            <div class="mb-6 overflow-hidden">
                                <img src="/mainimages/Accessories-leather.png" alt="Small Leather Goods" class="w-full h-64 object-cover transition-transform duration-500 group-hover:scale-105">
                            </div>
                            <h3 class="font-serif text-2xl font-light text-gray-900 mb-2">
                                Leather Goods
                            </h3>
                            <p class="font-sans text-sm letter-spacing-luxury uppercase text-gray-500 mb-4">
                                ARTISANAL CRAFT
                            </p>
                            <div class="w-8 h-px bg-gray-300 mx-auto group-hover:bg-yellow-600 transition-colors"></div>
                        </div>
                    </a>
                </div>



                <!-- Fragrances -->
                <div class="group">
                    <a href="{{ route('category.accessories') }}#perfumes" class="block">
                        <div class="product-card p-6 text-center">
                            <div class="mb-6 overflow-hidden">
                                <img src="/mainimages/Accessseries-freg.png" alt="Fragrances" class="w-full h-64 object-cover transition-transform duration-500 group-hover:scale-105">
                            </div>
                            <h3 class="font-serif text-2xl font-light text-gray-900 mb-2">
                                Fragrances
                            </h3>
                            <p class="font-sans text-sm letter-spacing-luxury uppercase text-gray-500 mb-4">
                                SIGNATURE SCENTS
                            </p>
                            <div class="w-8 h-px bg-gray-300 mx-auto group-hover:bg-yellow-600 transition-colors"></div>
                        </div>
                    </a>
                </div>

                <!-- Belts -->
                <div class="group">
                    <a href="{{ route('category.accessories') }}#belts" class="block">
                        <div class="product-card p-6 text-center">
                            <div class="mb-6 overflow-hidden">
                                <img src="/mainimages/Accesseries-belt.png" alt="Belts" class="w-full h-64 object-cover transition-transform duration-500 group-hover:scale-105">
                            </div>
                            <h3 class="font-serif text-2xl font-light text-gray-900 mb-2">
                                Accessories
                            </h3>
                            <p class="font-sans text-sm letter-spacing-luxury uppercase text-gray-500 mb-4">
                                STATEMENT PIECES
                            </p>
                            <div class="w-8 h-px bg-gray-300 mx-auto group-hover:bg-yellow-600 transition-colors"></div>
                        </div>
                    </a>
                </div>

                <!-- Fashion Jewelry -->
                <div class="group">
                    <a href="{{ route('category.accessories') }}#jewelry" class="block">
                        <div class="product-card p-6 text-center">
                            <div class="mb-6 overflow-hidden">
                                <img src="/mainimages/Accesseries-jewl.png" alt="Fashion Jewelry" class="w-full h-64 object-cover transition-transform duration-500 group-hover:scale-105">
                            </div>
                            <h3 class="font-serif text-2xl font-light text-gray-900 mb-2">
                                Fine Jewelry
                            </h3>
                            <p class="font-sans text-sm letter-spacing-luxury uppercase text-gray-500 mb-4">
                                PRECIOUS STONES
                            </p>
                            <div class="w-8 h-px bg-gray-300 mx-auto group-hover:bg-yellow-600 transition-colors"></div>
                        </div>
                    </a>
                </div>

            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-slate-900 relative overflow-hidden">
        <!-- Elegant curve top -->
        <div class="absolute top-0 left-0 w-full h-16">
            <svg viewBox="0 0 1200 120" preserveAspectRatio="none" class="w-full h-full">
                <path d="M0,0 C400,60 800,60 1200,0 L1200,120 L0,120 Z" fill="#f8fafc" />
            </svg>
        </div>

        <div class="relative pt-20 pb-12 px-6">
            <!-- Newsletter Section -->
            <div class="max-w-6xl mx-auto text-center mb-16">
                <h3 class="font-serif text-3xl md:text-4xl text-white mb-4">
                    Stay Connected with Luxury
                </h3>
                <p class="font-sans text-gray-400 mb-8 max-w-2xl mx-auto">
                    Be the first to discover our exclusive collections, private sales, and style insights
                </p>
                <div class="flex flex-col sm:flex-row max-w-md mx-auto gap-4">
                    <input type="email" placeholder="Enter your email"
                        class="flex-1 px-6 py-3 bg-transparent border border-gray-600 text-white placeholder-gray-500 focus:border-yellow-600 focus:outline-none font-sans">
                    <button class="luxury-button px-8 py-3 whitespace-nowrap">
                        SUBSCRIBE
                    </button>
                </div>
            </div>

            <!-- Main Footer Content -->
            <div class="max-w-6xl mx-auto">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-12 mb-12">
                    <!-- Brand Section -->
                    <div class="lg:col-span-2">
                        <a href="{{ route('home') }}" class="inline-block mb-6">
                            <span class="font-serif text-3xl text-white">Pearl & Prestige</span>
                        </a>
                        <p class="font-sans text-gray-400 leading-relaxed mb-6 max-w-md">
                            At Pearl & Prestige, we offer luxurious, expertly crafted fashion pieces that embody elegance and timeless style, designed for those who appreciate the finest things in life.
                        </p>
                        <!-- Social Media Icons -->
                        <div class="flex space-x-6">
                            <a href="#" class="w-10 h-10 border border-gray-600 rounded-full flex items-center justify-center text-gray-400 hover:border-yellow-600 hover:text-white transition-all duration-300">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M12.017 0C5.396 0 .029 5.367.029 11.987c0 5.079 3.158 9.417 7.618 11.174-.105-.949-.199-2.403.042-3.441.219-.937 1.407-5.965 1.407-5.965s-.359-.719-.359-1.782c0-1.668.967-2.914 2.171-2.914 1.023 0 1.518.769 1.518 1.69 0 1.029-.655 2.568-.994 3.995-.283 1.194.599 2.169 1.777 2.169 2.133 0 3.772-2.249 3.772-5.495 0-2.873-2.064-4.882-5.012-4.882-3.414 0-5.418 2.561-5.418 5.207 0 1.031.397 2.138.893 2.738a.36.36 0 01.083.345l-.333 1.36c-.053.22-.174.267-.402.161-1.499-.698-2.436-2.888-2.436-4.649 0-3.785 2.75-7.262 7.929-7.262 4.163 0 7.398 2.967 7.398 6.931 0 4.136-2.607 7.464-6.227 7.464-1.216 0-2.357-.631-2.75-1.378l-.748 2.853c-.271 1.043-1.002 2.35-1.492 3.146C9.57 23.812 10.763 24.009 12.017 24c6.624 0 11.99-5.367 11.99-11.987C24.007 5.367 18.641.001 12.017.001z" />
                                </svg>
                            </a>
                            <a href="#" class="w-10 h-10 border border-gray-600 rounded-full flex items-center justify-center text-gray-400 hover:border-yellow-600 hover:text-white transition-all duration-300">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z" />
                                </svg>
                            </a>
                            <a href="#" class="w-10 h-10 border border-gray-600 rounded-full flex items-center justify-center text-gray-400 hover:border-yellow-600 hover:text-white transition-all duration-300">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z" />
                                </svg>
                            </a>
                            <a href="#" class="w-10 h-10 border border-gray-600 rounded-full flex items-center justify-center text-gray-400 hover:border-yellow-600 hover:text-white transition-all duration-300">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z" />
                                </svg>
                            </a>
                        </div>
                    </div>

                    <!-- Collections -->
                    <div>
                        <h4 class="font-sans font-semibold text-white mb-6 letter-spacing-luxury uppercase text-sm">Collections</h4>
                        <ul class="space-y-4 font-sans text-gray-400">
                            <li><a href="{{ route('products.index') }}" class="hover:text-white transition-colors duration-300">New Arrivals</a></li>
                            <li><a href="{{ route('category.women') }}" class="hover:text-white transition-colors duration-300">Women</a></li>
                            <li><a href="{{ route('category.men') }}" class="hover:text-white transition-colors duration-300">Men</a></li>
                            <li><a href="{{ route('category.accessories') }}" class="hover:text-white transition-colors duration-300">Accessories</a></li>
                            <li><a href="{{ route('products.index') }}" class="hover:text-white transition-colors duration-300">Sale</a></li>
                        </ul>
                    </div>

                    <!-- Customer Care -->
                    <div>
                        <h4 class="font-sans font-semibold text-white mb-6 letter-spacing-luxury uppercase text-sm">Customer Care</h4>
                        <ul class="space-y-4 font-sans text-gray-400">
                            <li><a href="#" class="hover:text-white transition-colors duration-300">Contact Us</a></li>
                            <li><a href="#" class="hover:text-white transition-colors duration-300">Size Guide</a></li>
                            <li><a href="#" class="hover:text-white transition-colors duration-300">Shipping & Returns</a></li>
                            <li><a href="#" class="hover:text-white transition-colors duration-300">Privacy Policy</a></li>
                            <li><a href="#" class="hover:text-white transition-colors duration-300">Terms & Conditions</a></li>
                        </ul>
                    </div>
                </div>

                <!-- Luxury Divider -->
                <div class="border-t border-gray-700 pt-8">
                    <div class="flex flex-col md:flex-row justify-between items-center space-y-4 md:space-y-0">
                        <p class="font-sans text-sm text-gray-400">
                            © 2025 <span class="text-white">Pearl & Prestige</span>. All Rights Reserved.
                        </p>
                        <p class="font-sans text-sm text-gray-500">
                            Developed by <a href="#" class="text-orange-800 hover:text-orange-600 transition-colors">Mihilayan Sachinthana</a> (KGMS)
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</x-app-layout>