<x-layouts.app :title="__('New Patient Record')">
    <div class="flex flex-col gap-6">
        <div>
            <flux:heading size="xl" level="1">{{ __('New Patient Record') }}</flux:heading>
            <flux:subheading size="lg">{{ __('Fill in the details below to create a new patient record.') }}</flux:subheading>
        </div>
        <x-auth-session-status class="text-center" :status="session('status')" />

        <form method="POST" action="{{ route('patient-records.store') }}" class="flex flex-col gap-6">
            @csrf
            <x-input class="hidden" name="user_id" value="{{ Auth::user()->id }}" />

            <!-- Basic Info -->
            <div class="border-t pt-3">
                <h2 class="text-lg font-semibold mb-4">{{ __('Basic Info') }}</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                    <x-select label="Type" name="type">
                        <option value="" disabled selected>Select Type</option>
                        @foreach (App\Enums\PatientTypeEnum::options() as $value => $label)
                            <option value="{{ $value }}">{{ $label }}</option>
                        @endforeach
                    </x-select>
    
                    <x-select label="Admission Type" name="admissionType">
                        <option value="" disabled selected>Select Type</option>
                        @foreach (App\Enums\AdmissionTypeEnum::options() as $value => $label)
                            <option value="{{ $value }}">{{ $label }}</option>
                        @endforeach
                    </x-select>
    
                    <x-input label="Ward or Service" name="wardService" value="{{ old('wardService') }}" />
                </div>
    
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 pt-2">
                    <x-input label="Last Name" name="lastName" value="{{ old('lastName') }}" />
                    <x-input label="First Name" name="firstName" value="{{ old('firstName') }}" />
                    <x-input label="Middle Name" name="middleName" value="{{ old('middleName') }}" />
                    <x-input label="Permanent Address" name="permanentAddress" value="{{ old('permanentAddress') }}" />
                    <x-input label="Telephone Number" name="telephoneNumber" value="{{ old('telephoneNumber') }}" />
                    <x-input label="Email Address" name="email" type="email" value="{{ old('emailAddress') }}" />
                </div>
    
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 pt-3">
                    <x-select label="Sex" name="sex">
                        <option value="" disabled selected>Select Type</option>
                        @foreach (App\Enums\PatientSexEnum::options() as $value => $label)
                            <option value="{{ $value }}">{{ $label }}</option>
                        @endforeach
                    </x-select>
    
                    <x-select label="Civil Status" name="civilStatus">
                        <option value="" disabled selected>Select Type</option>
                        @foreach (App\Enums\PatientCivilStatus::options() as $value => $label)
                            <option value="{{ $value }}">{{ $label }}</option>
                        @endforeach
                    </x-select>
    
                    <x-input label="Nationality" name="nationality" value="{{ old('nationality') }}" />
                    <x-input label="Religion" name="religion" value="{{ old('religion') }}" />
    
                    <x-input label="Birth Date" name="birthDate" type="date" value="{{ old('birthDate') }}" id="birthDate"/>
                    <x-input label="Age" name="age" id="age" readOnly />
                    <x-input label="Birth Place" name="birthPlace" value="{{ old('birthPlace') }}" />
                    <x-input label="Occupation" name="occupation" value="{{ old('occupation') }}" />
                </div>
            </div>

            <!-- Employer Info -->
            <div class="border-t pt-3">
                <h2 class="text-lg font-semibold mb-4">{{ __('Employer Info') }}</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                    <x-input label="Employer" name="employer" value="{{ old('employer') }}" />
                    <x-input label="Employer Address" name="employerAddress" value="{{ old('employerAddress') }}" />
                    <x-input label="Employer Tel No." name="employerTelNo" value="{{ old('employerTelNo') }}" />
                </div>
            </div>

            <!-- Family Info -->
            <div class="border-t pt-3">
                <h2 class="text-lg font-semibold mb-4">{{ __('Family Info') }}</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                    <x-input label="Father Name" name="fatherName" value="{{ old('fatherName') }}" />
                    <x-input label="Father Address" name="fatherAddress" value="{{ old('fatherAddress') }}" />
                    <x-input label="Father Tel No." name="fatherTelNo" value="{{ old('fatherTelNo') }}" />
                    <x-input label="Mother Name" name="motherName" value="{{ old('motherName') }}" />
                    <x-input label="Mother Address" name="motherAddress" value="{{ old('motherAddress') }}" />
                    <x-input label="Mother Tel No." name="motherTelNo" value="{{ old('motherTelNo') }}" />
                </div>
            </div>

            <!-- Admission Info -->
            <div class="border-t pt-3">
                <h2 class="text-lg font-semibold mb-4">{{ __('Admission Info') }}</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                    <x-input label="Admission Date" name="admissionDate" type="datetime-local" value="{{ old('admissionDate') }}" /> 
                    <x-input label="Discharge Date" name="dischargeDate" type="date" value="{{ old('dischargeDate') }}" />
                </div>
            </div>

            <!-- Discharge Info -->
            <div class="border-t pt-3">
                <h2 class="text-lg font-semibold mb-4">{{ __('Discharge Info') }}</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                    <x-input label="Total Days" name="totalDays" type="number" value="{{ old('totalDays') }}" />
                    <x-input label="Attending Physician" name="attendingPhysician" value="{{ old('attendingPhysician') }}" />
                    <x-input label="Referred By" name="referredBy" value="{{ old('referredBy') }}" />
                </div>
            </div>

            <!-- Informant Details -->
            <div class="border-t pt-3">
                <h2 class="text-lg font-semibold mb-4">{{ __('Informant Details') }}</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <x-input label="Informant Name" name="informant" value="{{ old('informant') }}" />
                    <x-input label="Informant Address" name="informantAddress" value="{{ old('informantAddress') }}" />
                    <x-input label="Informant Tel No." name="informantTelNo" value="{{ old('informantTelNo') }}" />
                    <x-input label="Informant Relationship" name="relationship" value="{{ old('relationship') }}" />
                </div>
            </div>

            <!-- Insurance & Social Info -->
            <div class="border-t pt-3">
                <h2 class="text-lg font-semibold mb-4">{{ __('Insurance & Social Info') }}</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <x-select label="Social Service Classification" name="socialServiceClass">
                        <option value="" disabled selected>Select Type</option>
                        @foreach (App\Enums\SocialServiceTypeEnum::options() as $value => $label)
                            <option value="{{ $value }}">{{ $label }}</option>
                        @endforeach
                    </x-select>
                    <x-input label="Hospitalization Plan" name="hospitalizationPlan" value="{{ old('hospitalizationPlan') }}" />
                    <x-input label="Health Insurance" name="healthInsurance" value="{{ old('healthInsurance') }}" />

                    <x-select label="Medicare Type" name="medicareType">
                        <option value="" disabled selected>Select Type</option>
                        @foreach (App\Enums\PatientMedicareTypeEnum::options() as $value => $label)
                            <option value="{{ $value }}">{{ $label }}</option>
                        @endforeach
                    </x-select>
                </div>
            </div>

            <!-- Diagnosis & Procedures -->
            <div class="border-t pt-3">
                <h2 class="text-lg font-semibold mb-4">{{ __('Diagnosis & Procedures') }}</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <x-textarea label="Allergies" name="allergies">{{ old('allergies') }}</x-textarea>
                    <x-textarea label="Admission Diagnosis" name="admissionDiagnosis">{{ old('admissionDiagnosis') }}</x-textarea>
                    <x-textarea label="Principal Diagnosis" name="principalDiagnosis">{{ old('principalDiagnosis') }}</x-textarea>
                    <x-textarea label="Other Diagnosis" name="otherDiagnosis">{{ old('otherDiagnosis') }}</x-textarea>
                    <x-textarea label="Principal Procedure" name="principalProcedure">{{ old('principalProcedure') }}</x-textarea>
                    <x-textarea label="Other Procedures" name="otherProcedures">{{ old('otherProcedures') }}</x-textarea>
                </div>
            </div>

            <!-- Accident Info -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <x-input label="Accident Details" name="accidentDetails" value="{{ old('accidentDetails') }}" />
                <x-input label="Place of Occurrence" name="placeOfOccurrence" value="{{ old('placeOfOccurrence') }}" />
            </div>

            <!-- Disposition Info -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <x-select label="Disposition" name="disposition">
                    <option value="" disabled selected>Select Type</option>
                    @foreach (App\Enums\PatientDispositionEnum::options() as $value => $label)
                        <option value="{{ $value }}">{{ $label }}</option>
                    @endforeach
                </x-select>

                <x-select label="Autopsy Status" name="autopsyStatus">
                    <option value="" disabled selected>Select Type</option>
                    @foreach (App\Enums\PatientAutopsyStatusEnum::options() as $value => $label)
                        <option value="{{ $value }}">{{ $label }}</option>
                    @endforeach
                </x-select>
            </div>

            <!-- Submit -->
            <div class="flex justify-end">
                <button class="px-4 py-2.5 text-sm rounded-md dark:bg-gray-50 bg-blue-500 dark:hover:bg-gray-200 hover:bg-blue-600 text-white dark:text-gray-800 transition-all cursor-pointer" type="submit">
                    {{ __('Save Patient Record') }}
                </button>
            </div>
        </form>
    </div>
</x-layouts.app>

<script>
    document.getElementById('birthDate').addEventListener('change', function() {
        const birthDate = new Date(this.value);
        const today = new Date();
        
        let age = today.getFullYear() - birthDate.getFullYear();
        const monthDiff = today.getMonth() - birthDate.getMonth();
        const dayDiff = today.getDate() - birthDate.getDate();

        // Adjust age if the birthday hasn't occurred yet this year
        if (monthDiff < 0 || (monthDiff === 0 && dayDiff < 0)) {
            age--;
        }

        document.getElementById('age').value = age > 0 ? age : 0; // Ensure age is not negative
    });
</script>