<x-layouts.app :title="__('Edit APGAR Scoring Chart')">
    <div class="max-w-5xl mx-auto md:px-4 md:py-6">
        <!-- Header Section -->
        <div class="mb-8">
            <div class="flex items-center space-x-3 mb-2">
                <div class="w-2 h-8 bg-blue-500 rounded-full"></div>
                <flux:heading size="xl" level="1" class="text-2xl font-bold text-gray-800 dark:text-white">{{ __('APGAR Scoring Chart') }}</flux:heading>
            </div>
            <flux:subheading size="lg" class="text-gray-600 dark:text-gray-300 ml-5">{{ __('Record vital signs and responses of newborn assessment') }}</flux:subheading>
        </div>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4 bg-green-50 dark:bg-green-900/20 text-green-700 dark:text-green-300 p-4 rounded-lg" :status="session('status')" />
        
        <!-- Error Messages -->
        @if ($errors->any())
            <div class="mb-6 bg-red-50 dark:bg-red-900/20 text-red-700 dark:text-red-300 p-4 rounded-lg">
                <div class="flex items-center mb-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                    </svg>
                    <span class="font-medium">{{ __('Please correct the following errors:') }}</span>
                </div>
                <ul class="list-disc list-inside ml-5 space-y-1">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('scoring-chart.update', $scoringChart) }}" class="bg-white dark:bg-gray-800 rounded-xl shadow-sm md:border border-gray-200 dark:border-gray-700">
            @csrf
            @method('PUT')
            
            <!-- Patient Information Section -->
            <div class="p-6 border-y md:border-0 border-gray-200 dark:border-gray-700">
                <h2 class="flex items-center text-lg font-semibold text-gray-800 dark:text-white mb-5">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-blue-500" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd" />
                    </svg>
                    {{ __('Patient Information') }}
                </h2>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <x-input 
                        label="Name of the Patient" 
                        type="text" 
                        value="{{ $scoringChart->patientRecord->fullName() }} ({{ $scoringChart->patientRecord->medrec_code }})" 
                        readOnly
                    />
        
                    <x-input 
                        label="Date & Time of Assessment" 
                        type="text" 
                        value="{{ $scoringChart->dateScored ? date('M d, Y \a\t h:i A', strtotime($scoringChart->dateScored)) : '' }}" 
                        class="w-full rounded-lg border-gray-300 dark:border-gray-600 focus:border-blue-500 focus:ring focus:ring-blue-200 dark:focus:ring-blue-800 transition"
                        readOnly
                    />
                </div>
            
                
                <!-- APGAR Score Chart Legend -->
                <div class="bg-gray-50 dark:bg-gray-800/50 p-4 rounded-lg mb-6">
                    <h3 class="font-medium text-gray-800 dark:text-white mb-3">{{ __('APGAR Score Guide') }}</h3>
                    <div class="flex items-center space-x-4 text-sm text-gray-600 dark:text-gray-300">
                        <div class="flex items-center">
                            <span class="inline-block w-3 h-3 rounded-full bg-red-500 mr-1"></span>
                            <span>0: Critical</span>
                        </div>
                        <div class="flex items-center">
                            <span class="inline-block w-3 h-3 rounded-full bg-yellow-500 mr-1"></span>
                            <span>1: Concerning</span>
                        </div>
                        <div class="flex items-center">
                            <span class="inline-block w-3 h-3 rounded-full bg-green-500 mr-1"></span>
                            <span>2: Normal</span>
                        </div>
                    </div>
                </div>
                
                <!-- Immediate After Birth (Tab Content) -->
                <div class="space-y-6">
                    <div class="flex items-center mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-blue-500" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd" />
                        </svg>
                        <h2 class="text-lg font-semibold text-gray-800 dark:text-white">{{ __('Immediate After Birth') }}</h2>
                    </div>
                    
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        <!-- Heart Rate -->
                        <div class="bg-white dark:bg-gray-800/50 p-4 rounded-lg border border-gray-100 dark:border-gray-700">
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">{{ __('Heart Rate') }}</label>
                            <div class="space-y-2">
                                <label class="flex items-center cursor-pointer">
                                    <input type="radio" name="heartRate" value="0" class="h-4 w-4 text-red-500 focus:ring-red-400" {{ $scoringChart->heartRate == '0' ? 'checked' : '' }}>
                                    <span class="ml-2 text-gray-700 dark:text-gray-300">{{ __('Absent') }}</span>
                                </label>
                                <label class="flex items-center cursor-pointer">
                                    <input type="radio" name="heartRate" value="1" class="h-4 w-4 text-yellow-500 focus:ring-yellow-400" {{ $scoringChart->heartRate == '1' ? 'checked' : '' }}>
                                    <span class="ml-2 text-gray-700 dark:text-gray-300">{{ __('Less than 100 beats/min') }}</span>
                                </label>
                                <label class="flex items-center cursor-pointer">
                                    <input type="radio" name="heartRate" value="2" class="h-4 w-4 text-green-500 active:ring-green-400" {{ $scoringChart->heartRate == '2' ? 'checked' : '' }}>
                                    <span class="ml-2 text-gray-700 dark:text-gray-300">{{ __('More than 100 beats/min') }}</span>
                                </label>
                            </div>
                        </div>
                        
                        <!-- Respiratory -->
                        <div class="bg-white dark:bg-gray-800/50 p-4 rounded-lg border border-gray-100 dark:border-gray-700">
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">{{ __('Respiratory Effort') }}</label>
                            <div class="space-y-2">
                                <label class="flex items-center cursor-pointer">
                                    <input type="radio" name="respiratory" value="0" class="h-4 w-4 text-red-500 focus:ring-red-400" {{ $scoringChart->respiratory == '0' ? 'checked' : '' }}>
                                    <span class="ml-2 text-gray-700 dark:text-gray-300">{{ __('Absent') }}</span>
                                </label>
                                <label class="flex items-center cursor-pointer">
                                    <input type="radio" name="respiratory" value="1" class="h-4 w-4 text-yellow-500 focus:ring-yellow-400" {{ $scoringChart->respiratory == '1' ? 'checked' : '' }}>
                                    <span class="ml-2 text-gray-700 dark:text-gray-300">{{ __('Slow irregular, weak cry') }}</span>
                                </label>
                                <label class="flex items-center cursor-pointer">
                                    <input type="radio" name="respiratory" value="2" class="h-4 w-4 text-green-500 focus:ring-green-400" {{ $scoringChart->respiratory == '2' ? 'checked' : '' }}>
                                    <span class="ml-2 text-gray-700 dark:text-gray-300">{{ __('Good, strong cry') }}</span>
                                </label>
                            </div>
                        </div>
                        
                        <!-- Muscle Tone -->
                        <div class="bg-white dark:bg-gray-800/50 p-4 rounded-lg border border-gray-100 dark:border-gray-700">
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">{{ __('Muscle Tone') }}</label>
                            <div class="space-y-2">
                                <label class="flex items-center cursor-pointer">
                                    <input type="radio" name="muscleTone" value="0" class="h-4 w-4 text-red-500 focus:ring-red-400" {{ $scoringChart->muscleTone == '0' ? 'checked' : '' }}>
                                    <span class="ml-2 text-gray-700 dark:text-gray-300">{{ __('Limp') }}</span>
                                </label>
                                <label class="flex items-center cursor-pointer">
                                    <input type="radio" name="muscleTone" value="1" class="h-4 w-4 text-yellow-500 focus:ring-yellow-400" {{ $scoringChart->muscleTone == '1' ? 'checked' : '' }}>
                                    <span class="ml-2 text-gray-700 dark:text-gray-300">{{ __('Some flexion of extremities') }}</span>
                                </label>
                                <label class="flex items-center cursor-pointer">
                                    <input type="radio" name="muscleTone" value="2" class="h-4 w-4 text-green-500 focus:ring-green-400" {{ $scoringChart->muscleTone == '2' ? 'checked' : '' }}>
                                    <span class="ml-2 text-gray-700 dark:text-gray-300">{{ __('Active motion') }}</span>
                                </label>
                            </div>
                        </div>
                        
                        <!-- Reflex -->
                        <div class="bg-white dark:bg-gray-800/50 p-4 rounded-lg border border-gray-100 dark:border-gray-700">
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">{{ __('Reflex Irritability') }}</label>
                            <div class="space-y-2">
                                <label class="flex items-center cursor-pointer">
                                    <input type="radio" name="reflexes" value="0" class="h-4 w-4 text-red-500 focus:ring-red-400" {{ $scoringChart->reflexes == '0' ? 'checked' : '' }}>
                                    <span class="ml-2 text-gray-700 dark:text-gray-300">{{ __('No response') }}</span>
                                </label>
                                <label class="flex items-center cursor-pointer">
                                    <input type="radio" name="reflexes" value="1" class="h-4 w-4 text-yellow-500 focus:ring-yellow-400" {{ $scoringChart->reflexes == '1' ? 'checked' : '' }}>
                                    <span class="ml-2 text-gray-700 dark:text-gray-300">{{ __('Grimace') }}</span>
                                </label>
                                <label class="flex items-center cursor-pointer">
                                    <input type="radio" name="reflexes" value="2" class="h-4 w-4 text-green-500 focus:ring-green-400" {{ $scoringChart->reflexes == '2' ? 'checked' : '' }}>
                                    <span class="ml-2 text-gray-700 dark:text-gray-300">{{ __('Grimace with cough or sneeze') }}</span>
                                </label>
                            </div>
                        </div>
                        
                        <!-- Color -->
                        <div class="bg-white dark:bg-gray-800/50 p-4 rounded-lg border border-gray-100 dark:border-gray-700">
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">{{ __('Color') }}</label>
                            <div class="space-y-2">
                                <label class="flex items-center cursor-pointer">
                                    <input type="radio" name="color" value="0" class="h-4 w-4 text-red-500 focus:ring-red-400" {{ $scoringChart->color == '0' ? 'checked' : '' }}>
                                    <span class="ml-2 text-gray-700 dark:text-gray-300">{{ __('Blue or pale all over') }}</span>
                                </label>
                                <label class="flex items-center cursor-pointer">
                                    <input type="radio" name="color" value="1" class="h-4 w-4 text-yellow-500 focus:ring-yellow-400" {{ $scoringChart->color == '1' ? 'checked' : '' }}>
                                    <span class="ml-2 text-gray-700 dark:text-gray-300">{{ __('Body pink, extremities blue') }}</span>
                                </label>
                                <label class="flex items-center cursor-pointer">
                                    <input type="radio" name="color" value="2" class="h-4 w-4 text-green-500 focus:ring-green-400" {{ $scoringChart->color == '2' ? 'checked' : '' }}>
                                    <span class="ml-2 text-gray-700 dark:text-gray-300">{{ __('Completely pink') }}</span>
                                </label>
                            </div>
                        </div>
                    </div>                    
                </div>
                
                <!-- 5 Minutes After Birth (Tab Content) -->
                <div class="space-y-6">
                    <div class="flex items-center mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-blue-500" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd" />
                        </svg>
                        <h2 class="text-lg font-semibold text-gray-800 dark:text-white">{{ __('5 Minutes After Birth') }}</h2>
                    </div>
                    
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        <!-- Heart Rate -->
                        <div class="bg-white dark:bg-gray-800/50 p-4 rounded-lg border border-gray-100 dark:border-gray-700">
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">{{ __('Heart Rate') }}</label>
                            <div class="space-y-2">
                                <label class="flex items-center cursor-pointer">
                                    <input type="radio" name="five_heartRate" value="0" class="h-4 w-4 text-red-500 focus:ring-red-400" {{ $scoringChart->five_heartRate == '0' ? 'checked' : '' }}>
                                    <span class="ml-2 text-gray-700 dark:text-gray-300">{{ __('Absent') }}</span>
                                </label>
                                <label class="flex items-center cursor-pointer">
                                    <input type="radio" name="five_heartRate" value="1" class="h-4 w-4 text-yellow-500 focus:ring-yellow-400" {{ $scoringChart->five_heartRate == '1' ? 'checked' : '' }}>
                                    <span class="ml-2 text-gray-700 dark:text-gray-300">{{ __('Less than 100 beats/min') }}</span>
                                </label>
                                <label class="flex items-center cursor-pointer">
                                    <input type="radio" name="five_heartRate" value="2" class="h-4 w-4 text-green-500 focus:ring-green-400" {{ $scoringChart->five_heartRate == '2' ? 'checked' : '' }}>
                                    <span class="ml-2 text-gray-700 dark:text-gray-300">{{ __('More than 100 beats/min') }}</span>
                                </label>
                            </div>
                        </div>
                        
                        <!-- Respiratory -->
                        <div class="bg-white dark:bg-gray-800/50 p-4 rounded-lg border border-gray-100 dark:border-gray-700">
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">{{ __('Respiratory Effort') }}</label>
                            <div class="space-y-2">
                                <label class="flex items-center cursor-pointer">
                                    <input type="radio" name="five_respiratory" value="0" class="h-4 w-4 text-red-500 focus:ring-red-400" {{ $scoringChart->five_respiratory == '0' ? 'checked' : '' }}>
                                    <span class="ml-2 text-gray-700 dark:text-gray-300">{{ __('Absent') }}</span>
                                </label>
                                <label class="flex items-center cursor-pointer">
                                    <input type="radio" name="five_respiratory" value="1" class="h-4 w-4 text-yellow-500 focus:ring-yellow-400" {{ $scoringChart->five_respiratory == '1' ? 'checked' : '' }}>
                                    <span class="ml-2 text-gray-700 dark:text-gray-300">{{ __('Slow irregular, weak cry') }}</span>
                                </label>
                                <label class="flex items-center cursor-pointer">
                                    <input type="radio" name="five_respiratory" value="2" class="h-4 w-4 text-green-500 focus:ring-green-400" {{ $scoringChart->five_respiratory == '2' ? 'checked' : '' }}>
                                    <span class="ml-2 text-gray-700 dark:text-gray-300">{{ __('Good, strong cry') }}</span>
                                </label>
                            </div>
                        </div>
                        
                        <!-- Muscle Tone -->
                        <div class="bg-white dark:bg-gray-800/50 p-4 rounded-lg border border-gray-100 dark:border-gray-700">
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">{{ __('Muscle Tone') }}</label>
                            <div class="space-y-2">
                                <label class="flex items-center cursor-pointer">
                                    <input type="radio" name="five_muscleTone" value="0" class="h-4 w-4 text-red-500 focus:ring-red-400" {{ $scoringChart->five_muscleTone == '0' ? 'checked' : '' }}>
                                    <span class="ml-2 text-gray-700 dark:text-gray-300">{{ __('Limp') }}</span>
                                </label>
                                <label class="flex items-center cursor-pointer">
                                    <input type="radio" name="five_muscleTone" value="1" class="h-4 w-4 text-yellow-500 focus:ring-yellow-400" {{ $scoringChart->five_muscleTone == '1' ? 'checked' : '' }}>
                                    <span class="ml-2 text-gray-700 dark:text-gray-300">{{ __('Some flexion of extremities') }}</span>
                                </label>
                                <label class="flex items-center cursor-pointer">
                                    <input type="radio" name="five_muscleTone" value="2" class="h-4 w-4 text-green-500 focus:ring-green-400" {{ $scoringChart->five_muscleTone == '2' ? 'checked' : '' }}>
                                    <span class="ml-2 text-gray-700 dark:text-gray-300">{{ __('Active motion') }}</span>
                                </label>
                            </div>
                        </div>
                        
                        <!-- Reflex -->
                        <div class="bg-white dark:bg-gray-800/50 p-4 rounded-lg border border-gray-100 dark:border-gray-700">
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">{{ __('Reflex Irritability') }}</label>
                            <div class="space-y-2">
                                <label class="flex items-center cursor-pointer">
                                    <input type="radio" name="five_reflexes" value="0" class="h-4 w-4 text-red-500 focus:ring-red-400" {{ $scoringChart->five_reflexes == '0' ? 'checked' : '' }}>
                                    <span class="ml-2 text-gray-700 dark:text-gray-300">{{ __('No response') }}</span>
                                </label>
                                <label class="flex items-center cursor-pointer">
                                    <input type="radio" name="five_reflexes" value="1" class="h-4 w-4 text-yellow-500 focus:ring-yellow-400" {{ $scoringChart->five_reflexes == '1' ? 'checked' : '' }}>
                                    <span class="ml-2 text-gray-700 dark:text-gray-300">{{ __('Grimace') }}</span>
                                </label>
                                <label class="flex items-center cursor-pointer">
                                    <input type="radio" name="five_reflexes" value="2" class="h-4 w-4 text-green-500 focus:ring-green-400" {{ $scoringChart->five_reflexes == '2' ? 'checked' : '' }}>
                                    <span class="ml-2 text-gray-700 dark:text-gray-300">{{ __('Grimace with cough or sneeze') }}</span>
                                </label>
                            </div>
                        </div>
                        
                        <!-- Color -->
                        <div class="bg-white dark:bg-gray-800/50 p-4 rounded-lg border border-gray-100 dark:border-gray-700">
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">{{ __('Color') }}</label>
                            <div class="space-y-2">
                                <label class="flex items-center cursor-pointer">
                                    <input type="radio" name="five_color" value="0" class="h-4 w-4 text-red-500 focus:ring-red-400" {{ $scoringChart->five_color == '0' ? 'checked' : '' }}>
                                    <span class="ml-2 text-gray-700 dark:text-gray-300">{{ __('Blue or pale all over') }}</span>
                                </label>
                                <label class="flex items-center cursor-pointer">
                                    <input type="radio" name="five_color" value="1" class="h-4 w-4 text-yellow-500 focus:ring-yellow-400" {{ $scoringChart->five_color == '1' ? 'checked' : '' }}>
                                    <span class="ml-2 text-gray-700 dark:text-gray-300">{{ __('Body pink, extremities blue') }}</span>
                                </label>
                                <label class="flex items-center cursor-pointer">
                                    <input type="radio" name="five_color" value="2" class="h-4 w-4 text-green-500 focus:ring-green-400" {{ $scoringChart->five_color == '2' ? 'checked' : '' }}>
                                    <span class="ml-2 text-gray-700 dark:text-gray-300">{{ __('Completely pink') }}</span>
                                </label>
                            </div>
                        </div>
                    </div>                    
                </div>

                <!-- 10 Minutes After Birth (Tab Content) -->
                <div class="space-y-6">
                    <div class="flex items-center mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-blue-500" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd" />
                        </svg>
                        <h2 class="text-lg font-semibold text-gray-800 dark:text-white">{{ __('10 Minutes After Birth') }}</h2>
                    </div>
                    
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        <!-- Heart Rate -->
                        <div class="bg-white dark:bg-gray-800/50 p-4 rounded-lg border border-gray-100 dark:border-gray-700">
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">{{ __('Heart Rate') }}</label>
                            <div class="space-y-2">
                                <label class="flex items-center cursor-pointer">
                                    <input type="radio" name="ten_heartRate" value="0" class="h-4 w-4 text-red-500 focus:ring-red-400" {{ $scoringChart->ten_heartRate == '0' ? 'checked' : '' }}>
                                    <span class="ml-2 text-gray-700 dark:text-gray-300">{{ __('Absent') }}</span>
                                </label>
                                <label class="flex items-center cursor-pointer">
                                    <input type="radio" name="ten_heartRate" value="1" class="h-4 w-4 text-yellow-500 focus:ring-yellow-400" {{ $scoringChart->ten_heartRate == '1' ? 'checked' : '' }}>
                                    <span class="ml-2 text-gray-700 dark:text-gray-300">{{ __('Less than 100 beats/min') }}</span>
                                </label>
                                <label class="flex items-center cursor-pointer">
                                    <input type="radio" name="ten_heartRate" value="2" class="h-4 w-4 text-green-500 focus:ring-green-400" {{ $scoringChart->ten_heartRate == '2' ? 'checked' : '' }}>
                                    <span class="ml-2 text-gray-700 dark:text-gray-300">{{ __('More than 100 beats/min') }}</span>
                                </label>
                            </div>
                        </div>
                        
                        <!-- Respiratory -->
                        <div class="bg-white dark:bg-gray-800/50 p-4 rounded-lg border border-gray-100 dark:border-gray-700">
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">{{ __('Respiratory Effort') }}</label>
                            <div class="space-y-2">
                                <label class="flex items-center cursor-pointer">
                                    <input type="radio" name="ten_respiratory" value="0" class="h-4 w-4 text-red-500 focus:ring-red-400" {{ $scoringChart->ten_respiratory == '0' ? 'checked' : '' }}>
                                    <span class="ml-2 text-gray-700 dark:text-gray-300">{{ __('Absent') }}</span>
                                </label>
                                <label class="flex items-center cursor-pointer">
                                    <input type="radio" name="ten_respiratory" value="1" class="h-4 w-4 text-yellow-500 focus:ring-yellow-400" {{ $scoringChart->ten_respiratory == '1' ? 'checked' : '' }}>
                                    <span class="ml-2 text-gray-700 dark:text-gray-300">{{ __('Slow irregular, weak cry') }}</span>
                                </label>
                                <label class="flex items-center cursor-pointer">
                                    <input type="radio" name="ten_respiratory" value="2" class="h-4 w-4 text-green-500 focus:ring-green-400" {{ $scoringChart->ten_respiratory == '2' ? 'checked' : '' }}>
                                    <span class="ml-2 text-gray-700 dark:text-gray-300">{{ __('Good, strong cry') }}</span>
                                </label>
                            </div>
                        </div>
                        
                        <!-- Muscle Tone -->
                        <div class="bg-white dark:bg-gray-800/50 p-4 rounded-lg border border-gray-100 dark:border-gray-700">
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">{{ __('Muscle Tone') }}</label>
                            <div class="space-y-2">
                                <label class="flex items-center cursor-pointer">
                                    <input type="radio" name="ten_muscleTone" value="0" class="h-4 w-4 text-red-500 focus:ring-red-400" {{ $scoringChart->ten_muscleTone == '0' ? 'checked' : '' }}>
                                    <span class="ml-2 text-gray-700 dark:text-gray-300">{{ __('Limp') }}</span>
                                </label>
                                <label class="flex items-center cursor-pointer">
                                    <input type="radio" name="ten_muscleTone" value="1" class="h-4 w-4 text-yellow-500 focus:ring-yellow-400" {{ $scoringChart->ten_muscleTone == '1' ? 'checked' : '' }}>
                                    <span class="ml-2 text-gray-700 dark:text-gray-300">{{ __('Some flexion of extremities') }}</span>
                                </label>
                                <label class="flex items-center cursor-pointer">
                                    <input type="radio" name="ten_muscleTone" value="2" class="h-4 w-4 text-green-500 focus:ring-green-400" {{ $scoringChart->ten_muscleTone == '2' ? 'checked' : '' }}>
                                    <span class="ml-2 text-gray-700 dark:text-gray-300">{{ __('Active motion') }}</span>
                                </label>
                            </div>
                        </div>
                        
                        <!-- Reflex -->
                        <div class="bg-white dark:bg-gray-800/50 p-4 rounded-lg border border-gray-100 dark:border-gray-700">
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">{{ __('Reflex Irritability') }}</label>
                            <div class="space-y-2">
                                <label class="flex items-center cursor-pointer">
                                    <input type="radio" name="ten_reflexes" value="0" class="h-4 w-4 text-red-500 focus:ring-red-400" {{ $scoringChart->ten_reflexes == '0' ? 'checked' : '' }}>
                                    <span class="ml-2 text-gray-700 dark:text-gray-300">{{ __('No response') }}</span>
                                </label>
                                <label class="flex items-center cursor-pointer">
                                    <input type="radio" name="ten_reflexes" value="1" class="h-4 w-4 text-yellow-500 focus:ring-yellow-400" {{ $scoringChart->ten_reflexes == '1' ? 'checked' : '' }}>
                                    <span class="ml-2 text-gray-700 dark:text-gray-300">{{ __('Grimace') }}</span>
                                </label>
                                <label class="flex items-center cursor-pointer">
                                    <input type="radio" name="ten_reflexes" value="2" class="h-4 w-4 text-green-500 focus:ring-green-400" {{ $scoringChart->ten_reflexes == '2' ? 'checked' : '' }}>
                                    <span class="ml-2 text-gray-700 dark:text-gray-300">{{ __('Grimace with cough or sneeze') }}</span>
                                </label>
                            </div>
                        </div>
                        
                        <!-- Color -->
                        <div class="bg-white dark:bg-gray-800/50 p-4 rounded-lg border border-gray-100 dark:border-gray-700">
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">{{ __('Color') }}</label>
                            <div class="space-y-2">
                                <label class="flex items-center cursor-pointer">
                                    <input type="radio" name="ten_color" value="0" class="h-4 w-4 text-red-500 focus:ring-red-400" {{ $scoringChart->ten_color == '0' ? 'checked' : '' }}>
                                    <span class="ml-2 text-gray-700 dark:text-gray-300">{{ __('Blue or pale all over') }}</span>
                                </label>
                                <label class="flex items-center cursor-pointer">
                                    <input type="radio" name="ten_color" value="1" class="h-4 w-4 text-yellow-500 focus:ring-yellow-400" {{ $scoringChart->ten_color == '1' ? 'checked' : '' }}>
                                    <span class="ml-2 text-gray-700 dark:text-gray-300">{{ __('Body pink, extremities blue') }}</span>
                                </label>
                                <label class="flex items-center cursor-pointer">
                                    <input type="radio" name="ten_color" value="2" class="h-4 w-4 text-green-500 focus:ring-green-400" {{ $scoringChart->ten_color == '2' ? 'checked' : '' }}>
                                    <span class="ml-2 text-gray-700 dark:text-gray-300">{{ __('Completely pink') }}</span>
                                </label>
                            </div>
                        </div>
                    </div>                    
                </div>

                <!-- Other Time After Birth (Tab Content) -->
                <div class="space-y-6">
                    <div class="flex items-center mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-blue-500" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd" />
                        </svg>
                        <h2 class="text-lg font-semibold text-gray-800 dark:text-white">{{ __('Other Time After Birth') }}</h2>
                    </div>
                    
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        <!-- Heart Rate -->
                        <div class="bg-white dark:bg-gray-800/50 p-4 rounded-lg border border-gray-100 dark:border-gray-700">
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">{{ __('Heart Rate') }}</label>
                            <div class="space-y-2">
                                <label class="flex items-center cursor-pointer">
                                    <input type="radio" name="otherHeartRate" value="0" class="h-4 w-4 text-red-500 focus:ring-red-400" {{ $scoringChart->otherHeartRate == '0' ? 'checked' : '' }}>
                                    <span class="ml-2 text-gray-700 dark:text-gray-300">{{ __('Absent') }}</span>
                                </label>
                                <label class="flex items-center cursor-pointer">
                                    <input type="radio" name="otherHeartRate" value="1" class="h-4 w-4 text-yellow-500 focus:ring-yellow-400" {{ $scoringChart->otherHeartRate == '1' ? 'checked' : '' }}>
                                    <span class="ml-2 text-gray-700 dark:text-gray-300">{{ __('Less than 100 beats/min') }}</span>
                                </label>
                                <label class="flex items-center cursor-pointer">
                                    <input type="radio" name="otherHeartRate" value="2" class="h-4 w-4 text-green-500 focus:ring-green-400" {{ $scoringChart->otherHeartRate == '2' ? 'checked' : '' }}>
                                    <span class="ml-2 text-gray-700 dark:text-gray-300">{{ __('More than 100 beats/min') }}</span>
                                </label>
                            </div>
                        </div>
                        
                        <!-- Respiratory -->
                        <div class="bg-white dark:bg-gray-800/50 p-4 rounded-lg border border-gray-100 dark:border-gray-700">
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">{{ __('Respiratory Effort') }}</label>
                            <div class="space-y-2">
                                <label class="flex items-center cursor-pointer">
                                    <input type="radio" name="otherRespiratory" value="0" class="h-4 w-4 text-red-500 focus:ring-red-400" {{ $scoringChart->otherRespiratory == '0' ? 'checked' : '' }}>
                                    <span class="ml-2 text-gray-700 dark:text-gray-300">{{ __('Absent') }}</span>
                                </label>
                                <label class="flex items-center cursor-pointer">
                                    <input type="radio" name="otherRespiratory" value="1" class="h-4 w-4 text-yellow-500 focus:ring-yellow-400" {{ $scoringChart->otherRespiratory == '1' ? 'checked' : '' }}>
                                    <span class="ml-2 text-gray-700 dark:text-gray-300">{{ __('Slow irregular, weak cry') }}</span>
                                </label>
                                <label class="flex items-center cursor-pointer">
                                    <input type="radio" name="otherRespiratory" value="2" class="h-4 w-4 text-green-500 focus:ring-green-400" {{ $scoringChart->otherRespiratory == '2' ? 'checked' : '' }}>
                                    <span class="ml-2 text-gray-700 dark:text-gray-300">{{ __('Good, strong cry') }}</span>
                                </label>
                            </div>
                        </div>
                        
                        <!-- Muscle Tone -->
                        <div class="bg-white dark:bg-gray-800/50 p-4 rounded-lg border border-gray-100 dark:border-gray-700">
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">{{ __('Muscle Tone') }}</label>
                            <div class="space-y-2">
                                <label class="flex items-center cursor-pointer">
                                    <input type="radio" name="otherMuscleTone" value="0" class="h-4 w-4 text-red-500 focus:ring-red-400" {{ $scoringChart->otherMuscleTone == '0' ? 'checked' : '' }}>
                                    <span class="ml-2 text-gray-700 dark:text-gray-300">{{ __('Limp') }}</span>
                                </label>
                                <label class="flex items-center cursor-pointer">
                                    <input type="radio" name="otherMuscleTone" value="1" class="h-4 w-4 text-yellow-500 focus:ring-yellow-400" {{ $scoringChart->otherMuscleTone == '1' ? 'checked' : '' }}>
                                    <span class="ml-2 text-gray-700 dark:text-gray-300">{{ __('Some flexion of extremities') }}</span>
                                </label>
                                <label class="flex items-center cursor-pointer">
                                    <input type="radio" name="otherMuscleTone" value="2" class="h-4 w-4 text-green-500 focus:ring-green-400" {{ $scoringChart->otherMuscleTone == '2' ? 'checked' : '' }}>
                                    <span class="ml-2 text-gray-700 dark:text-gray-300">{{ __('Active motion') }}</span>
                                </label>
                            </div>
                        </div>
                        
                        <!-- Reflex -->
                        <div class="bg-white dark:bg-gray-800/50 p-4 rounded-lg border border-gray-100 dark:border-gray-700">
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">{{ __('Reflex Irritability') }}</label>
                            <div class="space-y-2">
                                <label class="flex items-center cursor-pointer">
                                    <input type="radio" name="otherReflexes" value="0" class="h-4 w-4 text-red-500 focus:ring-red-400" {{ $scoringChart->otherReflexes == '0' ? 'checked' : '' }}>
                                    <span class="ml-2 text-gray-700 dark:text-gray-300">{{ __('No response') }}</span>
                                </label>
                                <label class="flex items-center cursor-pointer">
                                    <input type="radio" name="otherReflexes" value="1" class="h-4 w-4 text-yellow-500 focus:ring-yellow-400" {{ $scoringChart->otherReflexes == '1' ? 'checked' : '' }}>
                                    <span class="ml-2 text-gray-700 dark:text-gray-300">{{ __('Grimace') }}</span>
                                </label>
                                <label class="flex items-center cursor-pointer">
                                    <input type="radio" name="otherReflexes" value="2" class="h-4 w-4 text-green-500 focus:ring-green-400" {{ $scoringChart->otherReflexes == '2' ? 'checked' : '' }}>
                                    <span class="ml-2 text-gray-700 dark:text-gray-300">{{ __('Grimace with cough or sneeze') }}</span>
                                </label>
                            </div>
                        </div>
                        
                        <!-- Color -->
                        <div class="bg-white dark:bg-gray-800/50 p-4 rounded-lg border border-gray-100 dark:border-gray-700">
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">{{ __('Color') }}</label>
                            <div class="space-y-2">
                                <label class="flex items-center cursor-pointer">
                                    <input type="radio" name="otherColor" value="0" class="h-4 w-4 text-red-500 focus:ring-red-400" {{ $scoringChart->otherColor == '0' ? 'checked' : '' }}>
                                    <span class="ml-2 text-gray-700 dark:text-gray-300">{{ __('Blue or pale all over') }}</span>
                                </label>
                                <label class="flex items-center cursor-pointer">
                                    <input type="radio" name="otherColor" value="1" class="h-4 w-4 text-yellow-500 focus:ring-yellow-400" {{ $scoringChart->otherColor == '1' ? 'checked' : '' }}>
                                    <span class="ml-2 text-gray-700 dark:text-gray-300">{{ __('Body pink, extremities blue') }}</span>
                                </label>
                                <label class="flex items-center cursor-pointer">
                                    <input type="radio" name="otherColor" value="2" class="h-4 w-4 text-green-500 focus:ring-green-400" {{ $scoringChart->otherColor == '2' ? 'checked' : '' }}>
                                    <span class="ml-2 text-gray-700 dark:text-gray-300">{{ __('Completely pink') }}</span>
                                </label>
                            </div>
                        </div>
                    </div>                    
                </div>

                <!-- Clinical Assessment Section -->
                <div class="mt-10 border-t border-gray-200 dark:border-gray-700 pt-6">
                    <h2 class="flex items-center text-lg font-semibold text-gray-800 dark:text-white mb-5">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-blue-500" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd" />
                        </svg>
                        {{ __('Clinical Assessment') }}
                    </h2>
                    
                    <div class="bg-white dark:bg-gray-800/50 p-4 rounded-lg border border-gray-100 dark:border-gray-700">
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">{{ __('Additional Notes') }}</label>
                        <textarea 
                            name="clinical_notes" 
                            rows="3"
                            class="w-full p-4 rounded-lg border-gray-300 dark:border-gray-600 focus:border-blue-500 focus:ring focus:ring-blue-200 dark:focus:ring-blue-800 transition dark:bg-gray-800 dark:text-white"
                            placeholder="{{ __('Enter any additional observations or notes about the newborn...') }}"
                        ></textarea>
                    </div>
                </div>
            </div>
            
            <!-- Form Actions -->
            <div class="px-6 py-4 bg-gray-50 dark:bg-gray-800/50 border-t border-gray-200 dark:border-gray-700 rounded-b-xl flex items-center justify-between">
                <div class="text-sm text-gray-500 dark:text-gray-400">
                    {{ __('All assessments must be completed within standard timeframes') }}
                </div>
                <div class="flex space-x-3">
                    <button type="submit" class="px-4 py-2 rounded-md shadow-sm text-sm text-white dark:text-black bg-blue-600 dark:bg-white hover:bg-blue-700 dark:hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 dark:ring-offset-gray-900 transition-colors">
                        {{ __('Complete Assessment') }}
                    </button>
                </div>
            </div>
        </form>
    </div>
</x-layouts.app>