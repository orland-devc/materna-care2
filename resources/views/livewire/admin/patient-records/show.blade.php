<x-layouts.app :title="$patientRecord->medrec_code">
    <div class="flex flex-col gap-6">
        <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
            <div>
                <flux:heading size="xl" level="1">
                    Patient Record: {{ $patientRecord->formalName() }}
                </flux:heading>
                <flux:subheading size="lg">
                    Medical Record #: {{ $patientRecord->medrec_code }}
                </flux:subheading>
            </div>
        
            <div class="flex sm:flex-row flex-wrap gap-2 md:justify-end">
                <a href="{{ route('patient-records.edit', $patientRecord) }}"
                   class="inline-flex items-center px-4 py-2.5 bg-gray-100 text-gray-800 dark:bg-gray-700 dark:text-gray-200 text-sm font-medium rounded-lg hover:bg-gray-200 dark:hover:bg-gray-600 transition-all duration-200 ease-in-out shadow-sm">
                    <x-lucide-square-pen class="h-5 w-5 mr-2" />
                    {{ __('Edit Record') }}
                </a>
        
                <form method="POST" action="{{ route('patient-records.destroy', $patientRecord) }}"
                      onsubmit="return confirm('Are you sure you want to delete this record?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit"
                            class="inline-flex items-center px-4 py-2.5 text-sm rounded-md bg-red-500 hover:bg-red-600 cursor-pointer text-white transition-all">
                        <x-lucide-trash-2 class="h-5 w-5 mr-2"/>
                        {{ __('Delete') }}
                    </button>
                </form>
        
                <a href="{{ route('patient-records') }}"
                   class="inline-flex items-center px-4 py-2.5 bg-blue-500 text-white dark:text-gray-800 dark:bg-gray-50 text-sm font-medium rounded-lg hover:bg-blue-600 dark:hover:bg-gray-200 transition-all duration-200 ease-in-out shadow-sm">
                    <x-lucide-chevron-left class="h-5 w-5 mr-2" />
                    {{ __('Back to Records') }}
                </a>
            </div>
        </div>        

        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Basic Info -->
        <div class="border-t border-gray-300 dark:border-gray-600 pt-3">
            <h2 class="text-lg font-semibold mb-4">{{ __('Basic Info') }}</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <div class="border border-gray-300 dark:border-gray-600 p-3 rounded-md bg-gray-50 dark:bg-gray-900">
                    <p class="text-sm text-gray-500 dark:text-gray-400">Type</p>
                    <p>{{ $patientRecord->type->getLabel() }}</p>
                </div>
                
                <div class="border border-gray-300 dark:border-gray-600 p-3 rounded-md bg-gray-50 dark:bg-gray-900">
                    <p class="text-sm text-gray-500 dark:text-gray-400">Admission Type</p>
                    <p>{{ $patientRecord->admissionType->getLabel() }}</p>
                </div>
                
                <div class="border border-gray-300 dark:border-gray-600 p-3 rounded-md bg-gray-50 dark:bg-gray-900">
                    <p class="text-sm text-gray-500 dark:text-gray-400">Ward or Service</p>
                    <p>{{ $patientRecord->wardService }}</p>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mt-4">
                <div class="border border-gray-300 dark:border-gray-600 p-3 rounded-md bg-gray-50 dark:bg-gray-900">
                    <p class="text-sm text-gray-500 dark:text-gray-400">Last Name</p>
                    <p>{{ $patientRecord->lastName }}</p>
                </div>
                
                <div class="border border-gray-300 dark:border-gray-600 p-3 rounded-md bg-gray-50 dark:bg-gray-900">
                    <p class="text-sm text-gray-500 dark:text-gray-400">First Name</p>
                    <p>{{ $patientRecord->firstName }}</p>
                </div>
                
                <div class="border border-gray-300 dark:border-gray-600 p-3 rounded-md bg-gray-50 dark:bg-gray-900">
                    <p class="text-sm text-gray-500 dark:text-gray-400">Middle Name</p>
                    <p>{{ $patientRecord->middleName }}</p>
                </div>

                <div class="border border-gray-300 dark:border-gray-600 p-3 rounded-md bg-gray-50 dark:bg-gray-900">
                    <p class="text-sm text-gray-500 dark:text-gray-400">Permanent Address</p>
                    <p>{{ $patientRecord->permanentAddress }}</p>
                </div>

                <div class="border border-gray-300 dark:border-gray-600 p-3 rounded-md bg-gray-50 dark:bg-gray-900">
                    <p class="text-sm text-gray-500 dark:text-gray-400">Telephone Number</p>
                    <p>{{ $patientRecord->telephoneNumber }}</p>
                </div>

                <div class="border border-gray-300 dark:border-gray-600 p-3 rounded-md bg-gray-50 dark:bg-gray-900">
                    <p class="text-sm text-gray-500 dark:text-gray-400">Email Address</p>
                    <p>{{ $patientRecord->email }}</p>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mt-4">
                <div class="border border-gray-300 dark:border-gray-600 p-3 rounded-md bg-gray-50 dark:bg-gray-900">
                    <p class="text-sm text-gray-500 dark:text-gray-400">Sex</p>
                    <p>{{ $patientRecord->sex->getLabel() }}</p>
                </div>
                
                <div class="border border-gray-300 dark:border-gray-600 p-3 rounded-md bg-gray-50 dark:bg-gray-900">
                    <p class="text-sm text-gray-500 dark:text-gray-400">Civil Status</p>
                    <p>{{ $patientRecord->civilStatus->getLabel() }}</p>
                </div>
                
                <div class="border border-gray-300 dark:border-gray-600 p-3 rounded-md bg-gray-50 dark:bg-gray-900">
                    <p class="text-sm text-gray-500 dark:text-gray-400">Nationality</p>
                    <p>{{ $patientRecord->nationality }}</p>
                </div>
                
                <div class="border border-gray-300 dark:border-gray-600 p-3 rounded-md bg-gray-50 dark:bg-gray-900">
                    <p class="text-sm text-gray-500 dark:text-gray-400">Religion</p>
                    <p>{{ $patientRecord->religion }}</p>
                </div>

                <div class="border border-gray-300 dark:border-gray-600 p-3 rounded-md bg-gray-50 dark:bg-gray-900">
                    <p class="text-sm text-gray-500 dark:text-gray-400">Birth Date</p>
                    <p>{{ $patientRecord->birthDate ? date('M d, Y', strtotime($patientRecord->birthDate)) : '' }}</p>
                </div>
                
                <div class="border border-gray-300 dark:border-gray-600 p-3 rounded-md bg-gray-50 dark:bg-gray-900">
                    <p class="text-sm text-gray-500 dark:text-gray-400">Age</p>
                    <p>{{ $patientRecord->age }}</p>
                </div>
                
                <div class="border border-gray-300 dark:border-gray-600 p-3 rounded-md bg-gray-50 dark:bg-gray-900">
                    <p class="text-sm text-gray-500 dark:text-gray-400">Birth Place</p>
                    <p>{{ $patientRecord->birthPlace }}</p>
                </div>
                
                <div class="border border-gray-300 dark:border-gray-600 p-3 rounded-md bg-gray-50 dark:bg-gray-900">
                    <p class="text-sm text-gray-500 dark:text-gray-400">Occupation</p>
                    <p>{{ $patientRecord->occupation }}</p>
                </div>
            </div>
        </div>

        <!-- Employer Info -->
        <div class="border-t border-gray-300 dark:border-gray-600 pt-3">
            <h2 class="text-lg font-semibold mb-4">{{ __('Employer Info') }}</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <div class="border border-gray-300 dark:border-gray-600 p-3 rounded-md bg-gray-50 dark:bg-gray-900">
                    <p class="text-sm text-gray-500 dark:text-gray-400">Employer</p>
                    <p>{{ $patientRecord->employer }}</p>
                </div>
                
                <div class="border border-gray-300 dark:border-gray-600 p-3 rounded-md bg-gray-50 dark:bg-gray-900">
                    <p class="text-sm text-gray-500 dark:text-gray-400">Employer Address</p>
                    <p>{{ $patientRecord->employerAddress }}</p>
                </div>
                
                <div class="border border-gray-300 dark:border-gray-600 p-3 rounded-md bg-gray-50 dark:bg-gray-900">
                    <p class="text-sm text-gray-500 dark:text-gray-400">Employer Tel No.</p>
                    <p>{{ $patientRecord->employerTelNo }}</p>
                </div>
            </div>
        </div>

        <!-- Family Info -->
        <div class="border-t border-gray-300 dark:border-gray-600 pt-3">
            <h2 class="text-lg font-semibold mb-4">{{ __('Family Info') }}</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <div class="border border-gray-300 dark:border-gray-600 p-3 rounded-md bg-gray-50 dark:bg-gray-900">
                    <p class="text-sm text-gray-500 dark:text-gray-400">Father Name</p>
                    <p>{{ $patientRecord->fatherName }}</p>
                </div>
                
                <div class="border border-gray-300 dark:border-gray-600 p-3 rounded-md bg-gray-50 dark:bg-gray-900">
                    <p class="text-sm text-gray-500 dark:text-gray-400">Father Address</p>
                    <p>{{ $patientRecord->fatherAddress }}</p>
                </div>
                
                <div class="border border-gray-300 dark:border-gray-600 p-3 rounded-md bg-gray-50 dark:bg-gray-900">
                    <p class="text-sm text-gray-500 dark:text-gray-400">Father Tel No.</p>
                    <p>{{ $patientRecord->fatherTelNo }}</p>
                </div>

                <div class="border border-gray-300 dark:border-gray-600 p-3 rounded-md bg-gray-50 dark:bg-gray-900">
                    <p class="text-sm text-gray-500 dark:text-gray-400">Mother Name</p>
                    <p>{{ $patientRecord->motherName }}</p>
                </div>
                
                <div class="border border-gray-300 dark:border-gray-600 p-3 rounded-md bg-gray-50 dark:bg-gray-900">
                    <p class="text-sm text-gray-500 dark:text-gray-400">Mother Address</p>
                    <p>{{ $patientRecord->motherAddress }}</p>
                </div>
                
                <div class="border border-gray-300 dark:border-gray-600 p-3 rounded-md bg-gray-50 dark:bg-gray-900">
                    <p class="text-sm text-gray-500 dark:text-gray-400">Mother Tel No.</p>
                    <p>{{ $patientRecord->motherTelNo }}</p>
                </div>
            </div>
        </div>

        <!-- Admission Info -->
        <div class="border-t border-gray-300 dark:border-gray-600 pt-3">
            <h2 class="text-lg font-semibold mb-4">{{ __('Admission Info') }}</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <div class="border border-gray-300 dark:border-gray-600 p-3 rounded-md bg-gray-50 dark:bg-gray-900">
                    <p class="text-sm text-gray-500 dark:text-gray-400">Admission Date</p>
                    <p>{{ $patientRecord->admissionDate ? date('M d, Y \a\t h:i A', strtotime($patientRecord->admissionDate)) : '' }}</p>
                </div>
                                
                <div class="border border-gray-300 dark:border-gray-600 p-3 rounded-md bg-gray-50 dark:bg-gray-900">
                    <p class="text-sm text-gray-500 dark:text-gray-400">Discharge Date</p>
                    <p>{{ $patientRecord->dischargeDate ? date('M d, Y \a\t h:i A', strtotime($patientRecord->dischargeDate)) : '' }}</p>
                </div>

                <div class="border border-gray-300 dark:border-gray-600 p-3 rounded-md bg-gray-50 dark:bg-gray-900">
                    <p class="text-sm text-gray-500 dark:text-gray-400">Total Days</p>
                    <p>{{ $patientRecord->totalDays }}</p>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 pt-4">
                <div class="border border-gray-300 dark:border-gray-600 p-3 rounded-md bg-gray-50 dark:bg-gray-900">
                    <p class="text-sm text-gray-500 dark:text-gray-400">Attending Physician</p>
                    <p>{{ $patientRecord->attendingPhysician }}</p>
                </div>
                
                <div class="border border-gray-300 dark:border-gray-600 p-3 rounded-md bg-gray-50 dark:bg-gray-900">
                    <p class="text-sm text-gray-500 dark:text-gray-400">Referred By</p>
                    <p>{{ $patientRecord->referredBy }}</p>
                </div>
            </div>
        </div>

        <!-- Informant Details -->
        <div class="border-t border-gray-300 dark:border-gray-600 pt-3">
            <h2 class="text-lg font-semibold mb-4">{{ __('Informant Details') }}</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div class="border border-gray-300 dark:border-gray-600 p-3 rounded-md bg-gray-50 dark:bg-gray-900">
                    <p class="text-sm text-gray-500 dark:text-gray-400">Informant Name</p>
                    <p>{{ $patientRecord->informant }}</p>
                </div>
                
                <div class="border border-gray-300 dark:border-gray-600 p-3 rounded-md bg-gray-50 dark:bg-gray-900">
                    <p class="text-sm text-gray-500 dark:text-gray-400">Informant Address</p>
                    <p>{{ $patientRecord->informantAddress }}</p>
                </div>
                
                <div class="border border-gray-300 dark:border-gray-600 p-3 rounded-md bg-gray-50 dark:bg-gray-900">
                    <p class="text-sm text-gray-500 dark:text-gray-400">Informant Tel No.</p>
                    <p>{{ $patientRecord->informantTelNo }}</p>
                </div>
                
                <div class="border border-gray-300 dark:border-gray-600 p-3 rounded-md bg-gray-50 dark:bg-gray-900">
                    <p class="text-sm text-gray-500 dark:text-gray-400">Informant Relationship</p>
                    <p>{{ $patientRecord->relationship }}</p>
                </div>
            </div>
        </div>

        <!-- Insurance & Social Info -->
        <div class="border-t border-gray-300 dark:border-gray-600 pt-3">
            <h2 class="text-lg font-semibold mb-4">{{ __('Insurance & Social Info') }}</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div class="border border-gray-300 dark:border-gray-600 p-3 rounded-md bg-gray-50 dark:bg-gray-900">
                    <p class="text-sm text-gray-500 dark:text-gray-400">Social Service Class</p>
                    <p>{{ $patientRecord->socialServiceClass }}</p>
                </div>
                
                <div class="border border-gray-300 dark:border-gray-600 p-3 rounded-md bg-gray-50 dark:bg-gray-900">
                    <p class="text-sm text-gray-500 dark:text-gray-400">Hospitalization Plan</p>
                    <p>{{ $patientRecord->hospitalizationPlan }}</p>
                </div>
                
                <div class="border border-gray-300 dark:border-gray-600 p-3 rounded-md bg-gray-50 dark:bg-gray-900">
                    <p class="text-sm text-gray-500 dark:text-gray-400">Health Insurance</p>
                    <p>{{ $patientRecord->healthInsurance }}</p>
                </div>
                
                <div class="border border-gray-300 dark:border-gray-600 p-3 rounded-md bg-gray-50 dark:bg-gray-900">
                    <p class="text-sm text-gray-500 dark:text-gray-400">Medicare Type</p>
                    <p>{{ $patientRecord->medicareType->getLabel() }}</p>
                </div>
            </div>
        </div>

        <!-- Diagnosis & Procedures -->
        <div class="border-t border-gray-300 dark:border-gray-600 pt-3">
            <h2 class="text-lg font-semibold mb-4">{{ __('Diagnosis & Procedures') }}</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div class="border border-gray-300 dark:border-gray-600 p-3 rounded-md bg-gray-50 dark:bg-gray-900">
                    <p class="text-sm text-gray-500 dark:text-gray-400">Allergies</p>
                    <p class="whitespace-pre-line">{{ $patientRecord->allergies }}</p>
                </div>
                
                <div class="border border-gray-300 dark:border-gray-600 p-3 rounded-md bg-gray-50 dark:bg-gray-900">
                    <p class="text-sm text-gray-500 dark:text-gray-400">Admission Diagnosis</p>
                    <p class="whitespace-pre-line">{{ $patientRecord->admissionDiagnosis }}</p>
                </div>
                
                <div class="border border-gray-300 dark:border-gray-600 p-3 rounded-md bg-gray-50 dark:bg-gray-900">
                    <p class="text-sm text-gray-500 dark:text-gray-400">Principal Diagnosis</p>
                    <p class="whitespace-pre-line">{{ $patientRecord->principalDiagnosis }}</p>
                </div>
                
                <div class="border border-gray-300 dark:border-gray-600 p-3 rounded-md bg-gray-50 dark:bg-gray-900">
                    <p class="text-sm text-gray-500 dark:text-gray-400">Other Diagnosis</p>
                    <p class="whitespace-pre-line">{{ $patientRecord->otherDiagnosis }}</p>
                </div>
                
                <div class="border border-gray-300 dark:border-gray-600 p-3 rounded-md bg-gray-50 dark:bg-gray-900">
                    <p class="text-sm text-gray-500 dark:text-gray-400">Principal Procedure</p>
                    <p class="whitespace-pre-line">{{ $patientRecord->principalProcedure }}</p>
                </div>
                
                <div class="border border-gray-300 dark:border-gray-600 p-3 rounded-md bg-gray-50 dark:bg-gray-900">
                    <p class="text-sm text-gray-500 dark:text-gray-400">Other Procedures</p>
                    <p class="whitespace-pre-line">{{ $patientRecord->otherProcedures }}</p>
                </div>
            </div>
        </div>

        <!-- Accident Info -->
        <div class="border-t border-gray-300 dark:border-gray-600 pt-3">
            <h2 class="text-lg font-semibold mb-4">{{ __('Accident Info') }}</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div class="border border-gray-300 dark:border-gray-600 p-3 rounded-md bg-gray-50 dark:bg-gray-900">
                    <p class="text-sm text-gray-500 dark:text-gray-400">Accident Details</p>
                    <p>{{ $patientRecord->accidentDetails }}</p>
                </div>
                
                <div class="border border-gray-300 dark:border-gray-600 p-3 rounded-md bg-gray-50 dark:bg-gray-900">
                    <p class="text-sm text-gray-500 dark:text-gray-400">Place of Occurrence</p>
                    <p>{{ $patientRecord->placeOfOccurrence }}</p>
                </div>
            </div>
        </div>

        <!-- Disposition Info -->
        <div class="border-t border-gray-300 dark:border-gray-600 pt-3 mb-6">
            <h2 class="text-lg font-semibold mb-4">{{ __('Disposition Info') }}</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div class="border border-gray-300 dark:border-gray-600 p-3 rounded-md bg-gray-50 dark:bg-gray-900">
                    <p class="text-sm text-gray-500 dark:text-gray-400">Disposition</p>
                    <p>{{ $patientRecord->disposition->getLabel() }}</p>
                </div>
                
                <div class="border border-gray-300 dark:border-gray-600 p-3 rounded-md bg-gray-50 dark:bg-gray-900">
                    <p class="text-sm text-gray-500 dark:text-gray-400">Autopsy Status</p>
                    <p>{{ $patientRecord->autopsyStatus->getLabel() }}</p>
                </div>
            </div>
        </div>

        <!-- Print Button -->
        <div class="flex justify-end mb-6">
            <button onclick="window.print()" class="px-4 py-2 text-sm rounded-md bg-blue-500 hover:bg-blue-600 text-white transition-all print:hidden">
                <i class="fas fa-print mr-2"></i> {{ __('Print Record') }}
            </button>
        </div>
    </div>
</x-layouts.app>