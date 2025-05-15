<x-layouts.app :title="__('Edit Patient Record')">
    <div class="flex flex-col gap-6">
        <div>
            <flux:heading size="xl" level="1">{{ __('Edit Patient Record') }}</flux:heading>
            <flux:subheading size="lg">{{ __('Medical Record #: ') . $patientRecord->medrec_code }}</flux:subheading>
        </div>
        <x-auth-session-status class="text-center" :status="session('status')" />

        <form method="POST" action="{{ route('patient-records.update', $patientRecord) }}" class="flex flex-col gap-6">
            @csrf
            @method('PUT')

            <!-- Basic Info -->
            <div class="border-t pt-3">
                <h2 class="text-lg font-semibold mb-4">{{ __('Basic Info') }}</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                    <x-select label="Type" name="type">
                        <option value="" disabled>Select Type</option>
                        @foreach (App\Enums\PatientTypeEnum::options() as $value => $label)
                            <option value="{{ $value }}" {{ $patientRecord->type == $value ? 'selected' : '' }}>{{ $label }}</option>
                        @endforeach
                    </x-select>
    
                    <x-select label="Admission Type" name="admissionType">
                        <option value="" disabled>Select Type</option>
                        @foreach (App\Enums\AdmissionTypeEnum::options() as $value => $label)
                            <option value="{{ $value }}" {{ $patientRecord->admissionType == $value ? 'selected' : '' }}>{{ $label }}</option>
                        @endforeach
                    </x-select>
    
                    <x-input label="Ward or Service" name="wardService" value="{{ old('wardService', $patientRecord->wardService) }}" />
                </div>
    
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 pt-2">
                    <x-input label="Last Name" name="lastName" value="{{ old('lastName', $patientRecord->lastName) }}" />
                    <x-input label="First Name" name="firstName" value="{{ old('firstName', $patientRecord->firstName) }}" />
                    <x-input label="Middle Name" name="middleName" value="{{ old('middleName', $patientRecord->middleName) }}" />
                    <x-input label="Permanent Address" name="permanentAddress" value="{{ old('permanentAddress', $patientRecord->permanentAddress) }}" />
                    <x-input label="Telephone Number" name="telephoneNumber" value="{{ old('telephoneNumber', $patientRecord->telephoneNumber) }}" />
                    <x-input label="Email Address" name="email" type="email" value="{{ old('email', $patientRecord->email) }}" />
                </div>
    
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 pt-3">
                    <x-select label="Sex" name="sex">
                        <option value="" disabled>Select Type</option>
                        @foreach (App\Enums\PatientSexEnum::options() as $value => $label)
                            <option value="{{ $value }}" {{ $patientRecord->sex == $value ? 'selected' : '' }}>{{ $label }}</option>
                        @endforeach
                    </x-select>
    
                    <x-select label="Civil Status" name="civilStatus">
                        <option value="" disabled>Select Type</option>
                        @foreach (App\Enums\PatientCivilStatus::options() as $value => $label)
                            <option value="{{ $value }}" {{ $patientRecord->civilStatus == $value ? 'selected' : '' }}>{{ $label }}</option>
                        @endforeach
                    </x-select>
    
                    <x-input label="Nationality" name="nationality" value="{{ old('nationality', $patientRecord->nationality) }}" />
                    <x-input label="Religion" name="religion" value="{{ old('religion', $patientRecord->religion) }}" />
    
                    <x-input label="Birth Date" name="birthDate" type="date" value="{{ old('birthDate', $patientRecord->birthDate) }}" id="birthDate" />
                    <x-input label="Age" name="age" id="age" value="{{ old('age', $patientRecord->age) }}" readOnly />
                    <x-input label="Birth Place" name="birthPlace" value="{{ old('birthPlace', $patientRecord->birthPlace) }}" />
                    <x-input label="Occupation" name="occupation" value="{{ old('occupation', $patientRecord->occupation) }}" />
                </div>
            </div>

            <!-- Employer Info -->
            <div class="border-t pt-3">
                <h2 class="text-lg font-semibold mb-4">{{ __('Employer Info') }}</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                    <x-input label="Employer" name="employer" value="{{ old('employer', $patientRecord->employer) }}" />
                    <x-input label="Employer Address" name="employerAddress" value="{{ old('employerAddress', $patientRecord->employerAddress) }}" />
                    <x-input label="Employer Tel No." name="employerTelNo" value="{{ old('employerTelNo', $patientRecord->employerTelNo) }}" />
                </div>
            </div>

            <!-- Family Info -->
            <div class="border-t pt-3">
                <h2 class="text-lg font-semibold mb-4">{{ __('Family Info') }}</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                    <x-input label="Father Name" name="fatherName" value="{{ old('fatherName', $patientRecord->fatherName) }}" />
                    <x-input label="Father Address" name="fatherAddress" value="{{ old('fatherAddress', $patientRecord->fatherAddress) }}" />
                    <x-input label="Father Tel No." name="fatherTelNo" value="{{ old('fatherTelNo', $patientRecord->fatherTelNo) }}" />
                    <x-input label="Mother Name" name="motherName" value="{{ old('motherName', $patientRecord->motherName) }}" />
                    <x-input label="Mother Address" name="motherAddress" value="{{ old('motherAddress', $patientRecord->motherAddress) }}" />
                    <x-input label="Mother Tel No." name="motherTelNo" value="{{ old('motherTelNo', $patientRecord->motherTelNo) }}" />
                </div>
            </div>

            <!-- Admission Info -->
            <div class="border-t pt-3">
                <h2 class="text-lg font-semibold mb-4">{{ __('Admission Info') }}</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                    <x-input label="Admission Date" name="admissionDate" type="datetime-local" value="{{ old('admissionDate', $patientRecord->admissionDate) }}" /> 
                    <x-input label="Discharge Date" name="dischargeDate" type="datetime-local" value="{{ old('dischargeDate', $patientRecord->dischargeDate) }}" />
                    <x-input label="Total Days" name="totalDays" type="number" value="{{ old('totalDays', $patientRecord->totalDays) }}" />
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 mt-4 gap-4">
                    <x-input label="Attending Physician" name="attendingPhysician" value="{{ old('attendingPhysician', $patientRecord->attendingPhysician) }}" />
                    <x-input label="Referred By" name="referredBy" value="{{ old('referredBy', $patientRecord->referredBy) }}" />
                </div>
            </div>

            <!-- Informant Details -->
            <div class="border-t pt-3">
                <h2 class="text-lg font-semibold mb-4">{{ __('Informant Details') }}</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <x-input label="Informant Name" name="informant" value="{{ old('informant', $patientRecord->informant) }}" />
                    <x-input label="Informant Address" name="informantAddress" value="{{ old('informantAddress', $patientRecord->informantAddress) }}" />
                    <x-input label="Informant Tel No." name="informantTelNo" value="{{ old('informantTelNo', $patientRecord->informantTelNo) }}" />
                    <x-input label="Informant Relationship" name="relationship" value="{{ old('relationship', $patientRecord->relationship) }}" />
                </div>
            </div>

            <!-- Insurance & Social Info -->
            <div class="border-t pt-3">
                <h2 class="text-lg font-semibold mb-4">{{ __('Insurance & Social Info') }}</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <x-input label="Social Service Class" name="socialServiceClass" value="{{ old('socialServiceClass', $patientRecord->socialServiceClass) }}" />
                    <x-input label="Hospitalization Plan" name="hospitalizationPlan" value="{{ old('hospitalizationPlan', $patientRecord->hospitalizationPlan) }}" />
                    <x-input label="Health Insurance" name="healthInsurance" value="{{ old('healthInsurance', $patientRecord->healthInsurance) }}" />

                    <x-select label="Medicare Type" name="medicareType">
                        <option value="" disabled>Select Type</option>
                        @foreach (App\Enums\PatientMedicareTypeEnum::options() as $value => $label)
                            <option value="{{ $value }}" {{ $patientRecord->medicareType == $value ? 'selected' : '' }}>{{ $label }}</option>
                        @endforeach
                    </x-select>
                </div>
            </div>

            <!-- Diagnosis & Procedures -->
            <div class="border-t pt-3">
                <h2 class="text-lg font-semibold mb-4">{{ __('Diagnosis & Procedures') }}</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <x-textarea label="Allergies" name="allergies">{{ old('allergies', $patientRecord->allergies) }}</x-textarea>
                    <x-textarea label="Admission Diagnosis" name="admissionDiagnosis">{{ old('admissionDiagnosis', $patientRecord->admissionDiagnosis) }}</x-textarea>
                    <x-textarea label="Principal Diagnosis" name="principalDiagnosis">{{ old('principalDiagnosis', $patientRecord->principalDiagnosis) }}</x-textarea>
                    <x-textarea label="Other Diagnosis" name="otherDiagnosis">{{ old('otherDiagnosis', $patientRecord->otherDiagnosis) }}</x-textarea>
                    <x-textarea label="Principal Procedure" name="principalProcedure">{{ old('principalProcedure', $patientRecord->principalProcedure) }}</x-textarea>
                    <x-textarea label="Other Procedures" name="otherProcedures">{{ old('otherProcedures', $patientRecord->otherProcedures) }}</x-textarea>
                </div>
            </div>

            <!-- Accident Info -->
            <div class="border-t pt-3">
                <h2 class="text-lg font-semibold mb-4">{{ __('Accident Info') }}</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <x-input label="Accident Details" name="accidentDetails" value="{{ old('accidentDetails', $patientRecord->accidentDetails) }}" />
                    <x-input label="Place of Occurrence" name="placeOfOccurrence" value="{{ old('placeOfOccurrence', $patientRecord->placeOfOccurrence) }}" />
                </div>
            </div>

            <!-- Disposition Info -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <x-select label="Disposition" name="disposition">
                    <option value="" disabled {{ old('disposition', $patientRecord->disposition ?? '') === '' ? 'selected' : '' }}>
                        Select Type
                    </option>
                    @foreach (App\Enums\PatientDispositionEnum::options() as $value => $label)
                        <option value="{{ $value }}" {{ old('disposition', $patientRecord->disposition ?? '') == $value ? 'selected' : '' }}>
                            {{ $label }}
                        </option>
                    @endforeach
                </x-select>

                <x-select label="Autopsy Status" name="autopsyStatus">
                    <option value="" disabled {{ old('autopsyStatus', $patientRecord->autopsyStatus ?? '') === '' ? 'selected' : '' }}>
                        Select Type
                    </option>
                    @foreach (App\Enums\PatientAutopsyStatusEnum::options() as $value => $label)
                        <option value="{{ $value }}" {{ old('autopsyStatus', $patientRecord->autopsyStatus ?? '') == $value ? 'selected' : '' }}>
                            {{ $label }}
                        </option>
                    @endforeach
                </x-select>
            </div>

            <!-- Submit & Cancel Buttons -->
            <div class="flex justify-end gap-3">
                <a href="{{ route('patient-records.show', $patientRecord) }}" class="px-4 py-2.5 text-sm rounded-md bg-gray-500 hover:bg-gray-600 text-white transition-all cursor-pointer">
                    {{ __('Cancel') }}
                </a>
                <button class="px-4 py-2.5 text-sm rounded-md dark:bg-gray-50 bg-blue-500 dark:hover:bg-gray-200 hover:bg-blue-600 text-white dark:text-gray-800 transition-all cursor-pointer" type="submit">
                    {{ __('Update Patient Record') }}
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