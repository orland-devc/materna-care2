<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>MaternaCare</title>
    <link rel="icon" href="{{ asset('images/assets/image-favicon.png') }}" type="image/x-icon" />
    
    @vite('resources/css/app.css')
</head>
<body class="font-sans text-gray-700 bg-gray-50">
    <!-- Header -->
    <header class="bg-white shadow-md fixed w-full top-0 z-50">
        <nav class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4 flex justify-between items-center">
            <a href="{{ route('home') }}" class="relative z-20 flex items-center text-lg font-medium">
                <img src="{{ asset('images/assets/image.png') }}" alt="" class="h-8 w-8 mr-2">
                </svg>
                <div class="text-2xl font-bold flex gap-0">
                    <span class="text-blue-600">Materna</span>
                    <span class="text-teal-500">Care</span>
                </div>
            </a>
            <ul class="hidden md:flex items-center space-x-8">
                <li><a href="#features" class="font-medium hover:text-blue-600 transition">Features</a></li>
                <li><a href="#benefits" class="font-medium hover:text-blue-600 transition">Benefits</a></li>
                <li><a href="#about" class="font-medium hover:text-blue-600 transition">About</a></li>
                <li><a href="#contact" class="font-medium hover:text-blue-600 transition">Contact</a></li>
                @auth
                    <li>
                        <a 
                            href="{{ route('dashboard') }}" 
                            class="font-semibold border-2 border-blue-600 text-blue-600 px-4 py-2 rounded hover:bg-blue-600 hover:text-white transition"
                        >
                            Dashboard
                            <i class="fas fa-house text-lg ml-2"></i>
                        </a>
                    </li>
                @else
                    <li>
                        <a 
                            href="{{ route('login') }}" 
                            class="font-semibold border-2 border-blue-600 text-blue-600 px-4 py-2 rounded hover:bg-blue-600 hover:text-white transition"
                        >
                            Login
                        </a>
                    </li>
                @endauth
            </ul>
            <button class="md:hidden">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </button>
        </nav>
    </header>

    <!-- Hero Section -->
    <section class="pt-32 pb-16 px-4 sm:px-6 lg:px-8 max-w-7xl mx-auto">
        <div class="flex flex-col md:flex-row items-center md:justify-between">
            <div class="md:w-1/2 md:pr-8 mb-8 md:mb-0 text-center md:text-left">
                <h1 class="text-5xl font-bold text-gray-800 mb-4 leading-tight">
                    Comprehensive <span class="text-blue-600">Maternal Health</span> Management System
                </h1>
                <p class="text-lg mb-6">
                    MaternaCare is an integrated healthcare solution designed to streamline maternal care workflows, 
                    predict risks, and improve patient outcomes through advanced analytics and intuitive design.
                </p>
                <div class="flex flex-wrap justify-center md:justify-start gap-4">
                    <a href="#demo" class="flex items-center bg-blue-600 text-white font-semibold px-6 py-3 rounded hover:bg-blue-700 transition">
                        Book an Appointment 
                        <i class="fas fa-arrow-right text-xl ml-2"></i>
                    </a>
                    <a href="#features" class="border-2 border-blue-600 text-blue-600 font-semibold px-6 py-3 rounded hover:bg-blue-600 hover:text-white transition">
                        Explore Features
                    </a>
                </div>
            </div>
            <div class="md:w-1/4">
                <img 
                    src="{{ asset('images/assets/hero asset.png') }}" 
                    alt="MaternaCare Dashboard Preview" 
                    class="rounded-lg w-full"
                />
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section id="features" class="py-16 px-4 sm:px-6 lg:px-8 bg-white">
        <div class="max-w-7xl mx-auto">
            <div class="text-center mb-16">
                <h2 class="text-3xl font-bold text-gray-800 mb-4">Comprehensive Features</h2>
                <p class="text-xl text-gray-600">Our integrated system provides everything you need for effective maternal care</p>
            </div>
            
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Card 1 -->
                <div class="bg-gray-50 rounded-lg p-8 shadow-sm hover:shadow-lg transform hover:-translate-y-2 transition duration-300">
                    <div class="w-14 h-14 bg-blue-600 text-white rounded-full flex items-center justify-center mb-6 text-xl font-bold">
                        <x-lucide-stethoscope class="w-8 h-8" />
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-4">Predict Maternal Risk</h3>
                    <p class="mb-4">Digital storage and analysis of patient information</p>
                    <ul class="ml-5 list-disc space-y-2">
                        <li>Secure patient database</li>
                        <li>Electronic Medical Records (EMR)</li>
                        <li>Risk prediction algorithms</li>
                    </ul>
                </div>

                <!-- Card 2 -->
                <div class="bg-gray-50 rounded-lg p-8 shadow-sm hover:shadow-lg transform hover:-translate-y-2 transition duration-300">
                    <div class="w-14 h-14 bg-blue-600 text-white rounded-full flex items-center justify-center mb-6 text-xl font-bold">
                        <x-lucide-calendar-plus class="w-8 h-8" />
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-4">Appointment Scheduling</h3>
                    <p class="mb-4">Efficient scheduling for all maternal care needs</p>
                    <ul class="ml-5 list-disc space-y-2">
                        <li>Online appointment booking</li>
                        <li>Real-time scheduling management</li>
                        <li>Automated reminders</li>
                    </ul>
                </div>

                <!-- Card 3 -->
                <div class="bg-gray-50 rounded-lg p-8 shadow-sm hover:shadow-lg transform hover:-translate-y-2 transition duration-300">
                    <div class="w-14 h-14 bg-blue-600 text-white rounded-full flex items-center justify-center mb-6 text-xl font-bold">
                        <x-lucide-heart-pulse class="w-8 h-8" />
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-4">Labor and Delivery Monitoring</h3>
                    <p class="mb-4">Comprehensive tracking of labor progression</p>
                    <ul class="ml-5 list-disc space-y-2">
                        <li>Real-time vitals monitoring</li>
                        <li>Pattern detection for complications</li>
                        <li>Decision support systems</li>
                    </ul>
                </div>

                <!-- Card 4 -->
                <div class="bg-gray-50 rounded-lg p-8 shadow-sm hover:shadow-lg transform hover:-translate-y-2 transition duration-300">
                    <div class="w-14 h-14 bg-blue-600 text-white rounded-full flex items-center justify-center mb-6 text-xl font-bold">
                        <x-lucide-package-open class="w-8 h-8" />
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-4">Inventory Management</h3>
                    <p class="mb-4">Efficient management of medical supplies</p>
                    <ul class="ml-5 list-disc space-y-2">
                        <li>Forecasting supply needs</li>
                        <li>Alerts for low supply levels</li>
                        <li>Usage trend analysis</li>
                    </ul>
                </div>

                <!-- Card 5 -->
                <div class="bg-gray-50 rounded-lg p-8 shadow-sm hover:shadow-lg transform hover:-translate-y-2 transition duration-300">
                    <div class="w-14 h-14 bg-blue-600 text-white rounded-full flex items-center justify-center mb-6 text-xl font-bold">
                        <x-lucide-users class="w-8 h-8" />
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-4">Staff Management</h3>
                    <p class="mb-4">Optimize healthcare personnel workflows</p>
                    <ul class="ml-5 list-disc space-y-2">
                        <li>Duty scheduling</li>
                        <li>Workload balancing</li>
                        <li>Identifying overworked staff</li>
                    </ul>
                </div>

                <!-- Card 6 -->
                <div class="bg-gray-50 rounded-lg p-8 shadow-sm hover:shadow-lg transform hover:-translate-y-2 transition duration-300">
                    <div class="w-14 h-14 bg-blue-600 text-white rounded-full flex items-center justify-center mb-6 text-xl font-bold">
                        <x-lucide-philippine-peso class="w-8 h-8" />
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-4">Financial and Billing</h3>
                    <p class="mb-4">Streamlined financial operations</p>
                    <ul class="ml-5 list-disc space-y-2">
                        <li>Payment tracking</li>
                        <li>Expense trend analysis</li>
                        <li>Insurance claim processing</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- Benefits Section -->
    <section id="benefits" class="py-16 px-4 sm:px-6 lg:px-8">
        <div class="max-w-7xl mx-auto">
            <div class="text-center mb-16">
                <h2 class="text-3xl font-bold text-gray-800 mb-4">Why Choose MaternaCare</h2>
                <p class="text-xl text-gray-600">Our system delivers measurable improvements to maternal healthcare</p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <!-- Benefit 1 -->
                <div class="flex items-start">
                    <div class="w-12 h-12 bg-teal-500 text-white rounded-full flex items-center justify-center mr-4 flex-shrink-0">
                        1
                    </div>
                    <div>
                        <h3 class="text-xl font-bold text-gray-800 mb-2">Improved Patient Outcomes</h3>
                        <p class="text-gray-600">Advanced risk prediction helps identify and address potential complications before they become critical.</p>
                    </div>
                </div>

                <!-- Benefit 2 -->
                <div class="flex items-start">
                    <div class="w-12 h-12 bg-teal-500 text-white rounded-full flex items-center justify-center mr-4 flex-shrink-0">
                        2
                    </div>
                    <div>
                        <h3 class="text-xl font-bold text-gray-800 mb-2">Operational Efficiency</h3>
                        <p class="text-gray-600">Streamlined workflows reduce administrative burden and allow staff to focus on patient care.</p>
                    </div>
                </div>

                <!-- Benefit 3 -->
                <div class="flex items-start">
                    <div class="w-12 h-12 bg-teal-500 text-white rounded-full flex items-center justify-center mr-4 flex-shrink-0">
                        3
                    </div>
                    <div>
                        <h3 class="text-xl font-bold text-gray-800 mb-2">Data-Driven Decisions</h3>
                        <p class="text-gray-600">Comprehensive analytics provide insights for continuous improvement of care protocols.</p>
                    </div>
                </div>

                <!-- Benefit 4 -->
                <div class="flex items-start">
                    <div class="w-12 h-12 bg-teal-500 text-white rounded-full flex items-center justify-center mr-4 flex-shrink-0">
                        4
                    </div>
                    <div>
                        <h3 class="text-xl font-bold text-gray-800 mb-2">Resource Optimization</h3>
                        <p class="text-gray-600">Smart inventory and staff management ensure resources are allocated efficiently.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section id="demo" class="py-16 px-4 sm:px-6 lg:px-8 bg-gradient-to-r from-blue-600 to-teal-500 text-white text-center">
        <div class="max-w-3xl mx-auto">
            <h2 class="text-3xl font-bold mb-6">Ready to Transform Maternal Care?</h2>
            <p class="text-xl mb-8 opacity-90">Join leading healthcare providers who have improved outcomes and efficiency with MaternaCare.</p>
            <div class="flex flex-wrap justify-center gap-4">
                <a 
                    {{-- href="{{ route('contact') }}"  --}}
                    href="#contact"
                    class="bg-white text-blue-600 font-semibold px-6 py-3 rounded hover:opacity-90 transition"
                >
                    Book an Appointment Now
                    <x-lucide-arrow-right class="inline-block ml-2 w-6 h-6" />
                </a>
                {{-- <a 
                    href="{{ route('pricing') }}" 
                    href="#pricing"
                    class="bg-white text-blue-600 font-semibold px-6 py-3 rounded hover:opacity-90 transition"
                >
                    View Pricing
                </a> --}}
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white pt-16 pb-6 px-4 sm:px-6 lg:px-8">
        <div class="max-w-7xl mx-auto">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 mb-8">
                <!-- Company Info -->
                <div>
                    <div class="text-2xl font-bold mb-4 flex gap-0 items-center">
                        <img src="{{ asset('images/assets/image.png') }}" alt="" class="w-5 h-5 mr-2">
                        <span>Materna</span>
                        <span class="text-teal-400">Care</span>
                    </div>
                    <p class="text-gray-300 mb-4">
                        Comprehensive maternal health management system designed to improve patient outcomes 
                        through advanced analytics and streamlined workflows.
                    </p>
                </div>

                <!-- Product Links -->
                <div>
                    <h4 class="text-lg font-semibold mb-4">Product</h4>
                    <ul class="space-y-2">
                        <li><a href="#" class="text-gray-300 hover:text-white transition">Features</a></li>
                        <li><a href="#" class="text-gray-300 hover:text-white transition">Pricing</a></li>
                        <li><a href="#" class="text-gray-300 hover:text-white transition">Case Studies</a></li>
                        <li><a href="#" class="text-gray-300 hover:text-white transition">Testimonials</a></li>
                    </ul>
                </div>

                <!-- Company Links -->
                <div>
                    <h4 class="text-lg font-semibold mb-4">Company</h4>
                    <ul class="space-y-2">
                        <li><a href="#" class="text-gray-300 hover:text-white transition">About Us</a></li>
                        <li><a href="#" class="text-gray-300 hover:text-white transition">Careers</a></li>
                        <li><a href="#" class="text-gray-300 hover:text-white transition">Blog</a></li>
                        <li><a href="#" class="text-gray-300 hover:text-white transition">Contact</a></li>
                    </ul>
                </div>

                <!-- Resources Links -->
                <div>
                    <h4 class="text-lg font-semibold mb-4">Resources</h4>
                    <ul class="space-y-2">
                        <li><a href="#" class="text-gray-300 hover:text-white transition">Support</a></li>
                        <li><a href="#" class="text-gray-300 hover:text-white transition">Documentation</a></li>
                        <li><a href="#" class="text-gray-300 hover:text-white transition">Privacy Policy</a></li>
                        <li><a href="#" class="text-gray-300 hover:text-white transition">Terms of Service</a></li>
                    </ul>
                </div>
            </div>

            <!-- Copyright -->
            <div class="pt-8 mt-8 border-t border-gray-700 text-center text-gray-400 text-sm">
                © {{ date('Y') }} MaternaCare. All rights reserved.
            </div>
        </div>
    </footer>

    @vite('resources/js/app.js')
</body>
</html>