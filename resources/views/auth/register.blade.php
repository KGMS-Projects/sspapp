<x-guest-layout>
    <div class="min-h-screen bg-gradient-to-br from-blue-50 via-white to-purple-50 flex flex-col justify-center py-12 sm:px-6 lg:px-8">
        <div class="sm:mx-auto sm:w-full sm:max-w-md">
            <!-- Logo Section -->
            <div class="flex justify-center">
                <div class="w-20 h-20 bg-gradient-to-r from-blue-600 to-purple-600 rounded-2xl flex items-center justify-center shadow-lg">
                    <x-authentication-card-logo class="w-12 h-12 text-white" />
                </div>
            </div>
            <h2 class="mt-6 text-center text-3xl font-bold tracking-tight text-gray-900">
                Create your account
            </h2>
            <p class="mt-2 text-center text-sm text-gray-600">
                Join our e-commerce platform and start shopping
            </p>
        </div>

        <div class="mt-8 sm:mx-auto sm:w-full sm:max-w-md">
            <div class="bg-white py-8 px-4 shadow-xl sm:rounded-2xl sm:px-10 border border-gray-100">
                <!-- Validation Errors -->
                <x-validation-errors class="mb-6" />

                <form method="POST" action="{{ route('register') }}" class="space-y-6">
                    @csrf

                    <!-- Name Field -->
                    <div>
                        <x-label for="name" value="{{ __('Full Name') }}" class="block text-sm font-semibold text-gray-700 mb-2" />
                        <div class="relative">
                            <x-input id="name"
                                class="block w-full px-4 py-3 border border-gray-300 rounded-xl shadow-sm placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200"
                                type="text"
                                name="name"
                                :value="old('name')"
                                required
                                autofocus
                                autocomplete="name"
                                placeholder="Enter your full name" />
                            <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                </svg>
                            </div>
                        </div>
                    </div>

                    <!-- Email Field -->
                    <div>
                        <x-label for="email" value="{{ __('Email Address') }}" class="block text-sm font-semibold text-gray-700 mb-2" />
                        <div class="relative">
                            <x-input id="email"
                                class="block w-full px-4 py-3 border border-gray-300 rounded-xl shadow-sm placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200"
                                type="email"
                                name="email"
                                :value="old('email')"
                                required
                                autocomplete="username"
                                placeholder="Enter your email address" />
                            <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207"></path>
                                </svg>
                            </div>
                        </div>
                    </div>

                    <!-- Role Selection Field -->
                    <div>
                        <x-label for="role" value="{{ __('Account Type') }}" class="block text-sm font-semibold text-gray-700 mb-2" />
                        <div class="relative">
                            <select id="role"
                                name="role"
                                class="block w-full px-4 py-3 border border-gray-300 rounded-xl shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200 bg-white"
                                required>
                                <option value="">{{ __('Select your account type') }}</option>
                                <option value="user" {{ old('role') == 'user' ? 'selected' : '' }}>
                                    {{ __('Customer - Shop and browse products') }}
                                </option>
                                <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>
                                    {{ __('Administrator - Manage store') }}
                                </option>
                            </select>
                            <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </div>
                        </div>
                    </div>

                    <!-- Password Field -->
                    <div>
                        <x-label for="password" value="{{ __('Password') }}" class="block text-sm font-semibold text-gray-700 mb-2" />
                        <div class="relative">
                            <x-input id="password"
                                class="block w-full px-4 py-3 border border-gray-300 rounded-xl shadow-sm placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200"
                                type="password"
                                name="password"
                                required
                                autocomplete="new-password"
                                placeholder="Create a strong password" />
                            <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                                </svg>
                            </div>
                        </div>
                        <p class="mt-1 text-xs text-gray-500">Must be at least 8 characters long</p>
                    </div>

                    <!-- Confirm Password Field -->
                    <div>
                        <x-label for="password_confirmation" value="{{ __('Confirm Password') }}" class="block text-sm font-semibold text-gray-700 mb-2" />
                        <div class="relative">
                            <x-input id="password_confirmation"
                                class="block w-full px-4 py-3 border border-gray-300 rounded-xl shadow-sm placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200"
                                type="password"
                                name="password_confirmation"
                                required
                                autocomplete="new-password"
                                placeholder="Confirm your password" />
                            <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                        </div>
                    </div>

                    <!-- Terms and Privacy Policy -->
                    @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                    <div class="flex items-start">
                        <div class="flex items-center h-5">
                            <x-checkbox name="terms"
                                id="terms"
                                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 focus:ring-2"
                                required />
                        </div>
                        <div class="ml-3 text-sm">
                            <label for="terms" class="text-gray-600">
                                {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="font-medium text-blue-600 hover:text-blue-500 underline">'.__('Terms of Service').'</a>',
                                'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="font-medium text-blue-600 hover:text-blue-500 underline">'.__('Privacy Policy').'</a>',
                                ]) !!}
                            </label>
                        </div>
                    </div>
                    @endif

                    <!-- Submit Button -->
                    <div>
                        <button type="submit"
                            class="group relative w-full flex justify-center py-3 px-4 border border-transparent text-sm font-semibold rounded-xl text-white bg-gradient-to-r from-blue-600 to-purple-600 hover:from-blue-700 hover:to-purple-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition duration-200 transform hover:scale-105 shadow-lg">
                            <span class="absolute left-0 inset-y-0 flex items-center pl-3">
                                <svg class="h-5 w-5 text-blue-300 group-hover:text-blue-200" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd"></path>
                                </svg>
                            </span>
                            {{ __('Create Account') }}
                        </button>
                    </div>

                    <!-- Login Link -->
                    <div class="text-center">
                        <p class="text-sm text-gray-600">
                            {{ __('Already have an account?') }}
                            <a href="{{ route('login') }}"
                                class="font-semibold text-blue-600 hover:text-blue-500 transition duration-200">
                                {{ __('Sign in here') }}
                            </a>
                        </p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-guest-layout>