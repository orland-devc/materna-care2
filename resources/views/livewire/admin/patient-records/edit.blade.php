<x-layouts.app :title="__('Edit Patient Record')">
    <div class="flex flex-col gap-6">
        <!-- Header Section -->
        <div class="mb-8">
            <flux:heading size="xl" level="1">{{ __('Edit Patient Record') }}</flux:heading>
            <flux:subheading size="lg" class="text-zinc-600 dark:text-zinc-400">{{ __('Edit the details below to update a patient record.') }}</flux:subheading>
        </div>
        
        <!-- Coming Soon Card -->
        <div class="overflow-hidden border border-zinc-200 bg-white dark:border-zinc-700 dark:bg-zinc-800 rounded-xl shadow-sm">
            <!-- Card Header -->
            <div class="bg-zinc-50 dark:bg-zinc-900 px-6 py-4 border-b border-zinc-200 dark:border-zinc-700">
                <h2 class="text-lg font-semibold text-zinc-900 dark:text-white">Feature Development</h2>
            </div>
            
            <!-- Card Content -->
            <div class="flex flex-col md:flex-row items-center p-6">
                <div class="w-full md:w-1/3 flex justify-center mb-6 md:mb-0">
                    <div class="bg-blue-50 dark:bg-zinc-900 p-6 rounded-full">
                        <img src="{{ asset('images/assets/nurse 2.png') }}" alt="Medical professional" class="w-80 h-80 object-contain">
                    </div>
                </div>
                
                <div class="w-full md:w-2/3 flex flex-col items-center md:items-start text-center md:text-left">
                    <h3 class="text-2xl font-bold text-blue-600 dark:text-blue-400 mb-4">Coming Soon</h3>
                    <p class="text-zinc-700 dark:text-zinc-300 text-lg mb-4">We're working hard to bring you this feature. The patient record editing functionality will be available in the next update.</p>
                    <p class="text-zinc-600 dark:text-zinc-400 mb-6">Thank you for your patience as we improve our healthcare platform.</p>
                    
                    <div class="flex gap-4">
                        <a href="#" class="inline-flex items-center px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition-colors">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M10 12a2 2 0 100-4 2 2 0 000 4z" />
                                <path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd" />
                            </svg>
                            View Existing Records
                        </a>
                        <a href="#" class="inline-flex items-center px-4 py-2 border border-zinc-300 dark:border-zinc-600 text-zinc-700 dark:text-zinc-300 rounded-md hover:bg-zinc-50 dark:hover:bg-zinc-700 transition-colors">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd" />
                            </svg>
                            Learn More
                        </a>
                    </div>
                </div>
            </div>
            
            <!-- Card Footer -->
            <div class="bg-zinc-50 dark:bg-zinc-900 px-6 py-4 border-t border-zinc-200 dark:border-zinc-700 flex justify-between items-center">
                <p class="text-sm text-zinc-500 dark:text-zinc-400">Expected release: June 2025</p>
                <div class="flex items-center">
                    <span class="text-sm text-zinc-500 dark:text-zinc-400 mr-2">Development Progress:</span>
                    <div class="w-32 bg-zinc-200 dark:bg-zinc-700 rounded-full h-2.5">
                        <div class="bg-blue-600 h-2.5 rounded-full" style="width: 75%"></div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Additional Information -->
        <div class="mt-6 grid grid-cols-1 md:grid-cols-3 gap-4">
            <div class="p-4 bg-white dark:bg-zinc-800 rounded-lg border border-zinc-200 dark:border-zinc-700 flex items-center">
                <div class="p-2 bg-green-100 dark:bg-green-900 rounded-lg mr-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-green-600 dark:text-green-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
                <div>
                    <h3 class="font-medium text-zinc-900 dark:text-white">Need assistance?</h3>
                    <p class="text-sm text-zinc-500 dark:text-zinc-400">Contact our support team</p>
                </div>
            </div>
            
            <div class="p-4 bg-white dark:bg-zinc-800 rounded-lg border border-zinc-200 dark:border-zinc-700 flex items-center">
                <div class="p-2 bg-blue-100 dark:bg-blue-900 rounded-lg mr-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-600 dark:text-blue-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
                <div>
                    <h3 class="font-medium text-zinc-900 dark:text-white">Documentation</h3>
                    <p class="text-sm text-zinc-500 dark:text-zinc-400">View user guides and tutorials</p>
                </div>
            </div>
            
            <div class="p-4 bg-white dark:bg-zinc-800 rounded-lg border border-zinc-200 dark:border-zinc-700 flex items-center">
                <div class="p-2 bg-purple-100 dark:bg-purple-900 rounded-lg mr-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-purple-600 dark:text-purple-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                    </svg>
                </div>
                <div>
                    <h3 class="font-medium text-zinc-900 dark:text-white">Feature Updates</h3>
                    <p class="text-sm text-zinc-500 dark:text-zinc-400">Subscribe to receive notifications</p>
                </div>
            </div>
        </div>
    </div>
</x-layouts.app>