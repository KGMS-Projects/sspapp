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

        .letter-spacing-luxury {
            letter-spacing: 0.15em;
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
            color: white;
            transform: translateY(-1px);
            box-shadow: 0 8px 25px rgba(154, 52, 18, 0.3);
        }

        .luxury-card {
            background: white;
            transition: all 0.3s cubic-bezier(0.23, 1, 0.320, 1);
            position: relative;
            overflow: hidden;
            border: 1px solid rgba(154, 52, 18, 0.1);
            border-radius: 0.5rem;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
        }

        .luxury-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.12);
            border-color: var(--luxury-gold);
        }

        .contact-hero {
            background: linear-gradient(135deg, var(--luxury-cream) 0%, #f8f9fa 100%);
            position: relative;
            overflow: hidden;
        }

        .contact-hero::before {
            content: '';
            position: absolute;
            top: 0;
            right: 0;
            width: 300px;
            height: 300px;
            background: radial-gradient(circle, rgba(154, 52, 18, 0.03) 0%, transparent 70%);
            border-radius: 50%;
            transform: translate(100px, -100px);
        }

        .luxury-heading {
            position: relative;
            display: inline-block;
        }

        .luxury-heading::after {
            content: '';
            position: absolute;
            bottom: -6px;
            left: 50%;
            transform: translateX(-50%);
            width: 50px;
            height: 2px;
            background: var(--luxury-gold);
        }

        .form-input {
            background: white;
            border: 1px solid rgba(154, 52, 18, 0.2);
            color: var(--luxury-black);
            font-family: 'Montserrat', sans-serif;
            font-size: 0.875rem;
            padding: 0.75rem 1rem;
            border-radius: 0.375rem;
            transition: all 0.3s ease;
            width: 100%;
        }

        .form-input:focus {
            outline: none;
            border-color: var(--luxury-gold);
            box-shadow: 0 0 0 3px rgba(154, 52, 18, 0.1);
        }

        .form-input::placeholder {
            color: var(--luxury-dark-grey);
        }

        .form-label {
            font-family: 'Montserrat', sans-serif;
            font-size: 0.875rem;
            font-weight: 500;
            color: var(--luxury-black);
            margin-bottom: 0.5rem;
            display: block;
            letter-spacing: 0.5px;
        }

        .contact-info-item {
            display: flex;
            align-items: flex-start;
            gap: 1rem;
            padding: 1.5rem;
            border-left: 2px solid var(--luxury-gold);
            background: rgba(154, 52, 18, 0.02);
            border-radius: 0.5rem;
            transition: all 0.3s ease;
        }

        .contact-info-item:hover {
            background: rgba(154, 52, 18, 0.05);
            transform: translateX(4px);
        }

        .contact-icon {
            color: var(--luxury-gold);
            font-size: 1.25rem;
            margin-top: 0.25rem;
            flex-shrink: 0;
        }

        .social-link {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 2.5rem;
            height: 2.5rem;
            background: white;
            border: 1px solid rgba(154, 52, 18, 0.2);
            border-radius: 50%;
            color: var(--luxury-gold);
            transition: all 0.3s ease;
            text-decoration: none;
        }

        .social-link:hover {
            background: var(--luxury-gold);
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 4px 15px rgba(154, 52, 18, 0.3);
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

        .business-hours {
            background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%);
            border: 1px solid rgba(154, 52, 18, 0.1);
            border-radius: 0.75rem;
            padding: 1.5rem;
        }

        .hours-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0.5rem 0;
            border-bottom: 1px solid rgba(154, 52, 18, 0.1);
        }

        .hours-row:last-child {
            border-bottom: none;
        }

        .day {
            font-family: 'Montserrat', sans-serif;
            font-weight: 500;
            color: var(--luxury-black);
        }

        .time {
            font-family: 'Montserrat', sans-serif;
            color: var(--luxury-dark-grey);
            font-size: 0.875rem;
        }
    </style>

    <!-- Contact Hero Section -->
    <section class="contact-hero py-12 relative">
        <div class="max-w-6xl mx-auto px-6 text-center relative z-10">
            <div class="animate-fade-in">
                <p class="font-sans text-sm letter-spacing-luxury text-gray-500 mb-3 uppercase">Get In Touch</p>
                <h1 class="font-serif text-4xl md:text-5xl font-light text-gray-900 mb-4 leading-none luxury-heading">
                    Contact Us
                </h1>
                <p class="font-sans text-base md:text-lg font-light text-gray-600 max-w-2xl mx-auto leading-relaxed">
                    We'd love to hear from you. Get in touch with Pearl & Prestige for any inquiries about our luxury fashion collection.
                </p>
            </div>
        </div>
    </section>

    <!-- Contact Content -->
    <section class="py-12">
        <div class="max-w-6xl mx-auto px-6">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
                <!-- Contact Form -->
                <div class="luxury-card p-8">
                    <h2 class="font-serif text-2xl md:text-3xl font-light text-gray-900 mb-6">
                        Send us a Message
                    </h2>

                    <form action="#" method="POST" class="space-y-6">
                        @csrf
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label for="first_name" class="form-label">First Name</label>
                                <input type="text" id="first_name" name="first_name" class="form-input" placeholder="Your first name" required>
                            </div>
                            <div>
                                <label for="last_name" class="form-label">Last Name</label>
                                <input type="text" id="last_name" name="last_name" class="form-input" placeholder="Your last name" required>
                            </div>
                        </div>

                        <div>
                            <label for="email" class="form-label">Email Address</label>
                            <input type="email" id="email" name="email" class="form-input" placeholder="your.email@example.com" required>
                        </div>

                        <div>
                            <label for="phone" class="form-label">Phone Number</label>
                            <input type="tel" id="phone" name="phone" class="form-input" placeholder="+1 (555) 123-4567">
                        </div>

                        <div>
                            <label for="subject" class="form-label">Subject</label>
                            <select id="subject" name="subject" class="form-input" required>
                                <option value="">Select a subject</option>
                                <option value="general">General Inquiry</option>
                                <option value="product">Product Information</option>
                                <option value="order">Order Support</option>
                                <option value="custom">Custom Orders</option>
                                <option value="partnership">Partnership</option>
                            </select>
                        </div>

                        <div>
                            <label for="message" class="form-label">Message</label>
                            <textarea id="message" name="message" rows="5" class="form-input" placeholder="Tell us about your inquiry..." required></textarea>
                        </div>

                        <div>
                            <button type="submit" class="luxury-button px-8 py-3 text-sm w-full md:w-auto">
                                Send Message
                            </button>
                        </div>
                    </form>
                </div>

                <!-- Contact Information -->
                <div class="space-y-8">
                    <!-- Contact Details -->
                    <div class="luxury-card p-8">
                        <h2 class="font-serif text-2xl md:text-3xl font-light text-gray-900 mb-6">
                            Contact Information
                        </h2>

                        <div class="space-y-4">
                            <div class="contact-info-item">
                                <div class="contact-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25s-7.5-4.108-7.5-11.25a7.5 7.5 0 1115 0z" />
                                    </svg>
                                </div>
                                <div>
                                    <h3 class="font-sans font-medium text-gray-900 mb-1">Address</h3>
                                    <p class="font-sans text-gray-600 text-sm">
                                        123 Luxury Avenue<br>
                                        Fashion District<br>
                                        New York, NY 10001
                                    </p>
                                </div>
                            </div>

                            <div class="contact-info-item">
                                <div class="contact-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 002.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 01-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 00-1.091-.852H4.5A2.25 2.25 0 002.25 4.5v2.25z" />
                                    </svg>
                                </div>
                                <div>
                                    <h3 class="font-sans font-medium text-gray-900 mb-1">Phone</h3>
                                    <p class="font-sans text-gray-600 text-sm">
                                        <a href="tel:+1234567890" class="hover:text-amber-800 transition-colors">+1 (234) 567-8900</a>
                                    </p>
                                </div>
                            </div>

                            <div class="contact-info-item">
                                <div class="contact-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75" />
                                    </svg>
                                </div>
                                <div>
                                    <h3 class="font-sans font-medium text-gray-900 mb-1">Email</h3>
                                    <p class="font-sans text-gray-600 text-sm">
                                        <a href="mailto:info@pearlandprestige.com" class="hover:text-amber-800 transition-colors">info@pearlandprestige.com</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Business Hours -->
                    <div class="business-hours">
                        <h3 class="font-serif text-xl font-medium text-gray-900 mb-4">Business Hours</h3>
                        <div class="space-y-1">
                            <div class="hours-row">
                                <span class="day">Monday - Friday</span>
                                <span class="time">9:00 AM - 8:00 PM</span>
                            </div>
                            <div class="hours-row">
                                <span class="day">Saturday</span>
                                <span class="time">10:00 AM - 6:00 PM</span>
                            </div>
                            <div class="hours-row">
                                <span class="day">Sunday</span>
                                <span class="time">12:00 PM - 5:00 PM</span>
                            </div>
                        </div>
                    </div>

                    <!-- Social Media -->
                    <div class="luxury-card p-8">
                        <h3 class="font-serif text-xl font-medium text-gray-900 mb-4">Follow Us</h3>
                        <div class="flex space-x-4">
                            <a href="#" class="social-link" aria-label="Instagram">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24" class="w-4 h-4">
                                    <path d="M12.017 0C5.396 0 .029 5.367.029 11.987c0 6.62 5.367 11.987 11.988 11.987 6.62 0 11.987-5.367 11.987-11.987C24.004 5.367 18.637.001 12.017.001zM8.23 16.85c-2.13 0-3.85-1.72-3.85-3.85s1.72-3.85 3.85-3.85 3.85 1.72 3.85 3.85-1.72 3.85-3.85 3.85zm7.54-7.54h-3.08v-1.54c0-.85.69-1.54 1.54-1.54s1.54.69 1.54 1.54v1.54z" />
                                </svg>
                            </a>
                            <a href="#" class="social-link" aria-label="Facebook">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24" class="w-4 h-4">
                                    <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z" />
                                </svg>
                            </a>
                            <a href="#" class="social-link" aria-label="Twitter">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24" class="w-4 h-4">
                                    <path d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z" />
                                </svg>
                            </a>
                            <a href="#" class="social-link" aria-label="Pinterest">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24" class="w-4 h-4">
                                    <path d="M12.017 0C5.396 0 .029 5.367.029 11.987c0 5.079 3.158 9.417 7.618 11.174-.105-.949-.199-2.403.041-3.439.219-.937 1.406-5.957 1.406-5.957s-.359-.72-.359-1.781c0-1.663.967-2.911 2.168-2.911 1.024 0 1.518.769 1.518 1.688 0 1.029-.653 2.567-.992 3.992-.285 1.193.6 2.165 1.775 2.165 2.128 0 3.768-2.245 3.768-5.487 0-2.861-2.063-4.869-5.008-4.869-3.41 0-5.409 2.562-5.409 5.199 0 1.033.394 2.143.889 2.741.1.12.112.225.085.345-.09.375-.293 1.199-.334 1.363-.053.225-.172.271-.402.165-1.495-.69-2.433-2.878-2.433-4.646 0-3.776 2.748-7.252 7.92-7.252 4.158 0 7.392 2.967 7.392 6.923 0 4.135-2.607 7.462-6.233 7.462-1.214 0-2.357-.629-2.746-1.378l-.748 2.853c-.271 1.043-1.002 2.35-1.492 3.146C9.57 23.812 10.763 24.009 12.017 24.009c6.624 0 11.99-5.367 11.99-11.988C24.007 5.367 18.641.001.012 12.017z" />
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Map Section (Optional) -->
    <section class="py-12 bg-gray-50">
        <div class="max-w-6xl mx-auto px-6">
            <div class="text-center mb-8">
                <h2 class="font-serif text-3xl md:text-4xl font-light text-gray-900 mb-4 luxury-heading">
                    Visit Our Showroom
                </h2>
                <p class="font-sans text-gray-600 max-w-2xl mx-auto leading-relaxed">
                    Experience our luxury collection in person at our flagship showroom in the heart of the fashion district.
                </p>
            </div>

            <!-- Placeholder for map - replace with actual map integration -->
            <div class="luxury-card p-8 text-center bg-gray-100">
                <div class="w-full h-64 bg-gradient-to-br from-gray-200 to-gray-300 rounded-lg flex items-center justify-center">
                    <div class="text-center">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-12 h-12 text-gray-400 mx-auto mb-2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 6.75V15m6-6v8.25m.503 3.498l4.875-2.437c.381-.19.622-.58.622-1.006V4.82c0-.836-.88-1.38-1.628-1.006l-3.869 1.934c-.317.159-.69.159-1.006 0L9.503 3.252a1.125 1.125 0 00-1.006 0L3.622 5.689C3.24 5.88 3 6.27 3 6.695V19.18c0 .836.88 1.38 1.628 1.006l3.869-1.934c.317-.159.69-.159 1.006 0l4.994 2.497c.317.158.69.158 1.006 0z" />
                        </svg>
                        <p class="font-sans text-gray-500 text-sm">Interactive map coming soon</p>
                        <p class="font-sans text-xs text-gray-400 mt-1">123 Luxury Avenue, Fashion District, New York, NY 10001</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        // Add form submission handling
        document.querySelector('form').addEventListener('submit', function(e) {
            e.preventDefault();

            // Simple form validation
            const requiredFields = this.querySelectorAll('[required]');
            let isValid = true;

            requiredFields.forEach(field => {
                if (!field.value.trim()) {
                    isValid = false;
                    field.style.borderColor = '#dc2626';
                } else {
                    field.style.borderColor = 'rgba(154, 52, 18, 0.2)';
                }
            });

            if (isValid) {
                // Here you would normally submit the form
                alert('Thank you for your message! We\'ll get back to you soon.');
                this.reset();
            } else {
                alert('Please fill in all required fields.');
            }
        });

        // Reset field border color on focus
        document.querySelectorAll('.form-input').forEach(input => {
            input.addEventListener('focus', function() {
                this.style.borderColor = 'var(--luxury-gold)';
            });
        });
    </script>
</x-app-layout>