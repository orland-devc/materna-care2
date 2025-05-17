<x-layouts.app :title="__('APGAR Scoring Charts')">
    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
        <div>
            <flux:heading size="xl" level="1">{{ __('APGAR Scoring Charts') }}</flux:heading>
            <flux:subheading size="lg" class="mb-6">{{ __('Manage all scoring chart records.') }}</flux:subheading>
        </div>
        <a href="{{ route('scoring-chart.create') }}"
           class="inline-flex items-center justify-center px-4 py-2.5 bg-blue-500 text-white dark:text-gray-800 text-sm font-medium rounded-lg hover:bg-blue-600 dark:bg-gray-50 dark:hover:bg-gray-200 transition-all duration-200 ease-in-out shadow-sm">
            <x-lucide-plus class="h-5 w-5 mr-2"/>
            {{ __('Add New Record') }}
        </a>
    </div>

    <!-- Search Bar -->
    <div class="mb-6">
        <div class="relative flex flex-col md:flex-row md:items-center md:justify-between">
            <div class="absolute inset-y-0 start-0 flex items-center pl-3 pointer-events-none">
                <x-lucide-search class="w-5 h-5 text-gray-500 dark:text-gray-400" />
            </div>
            <input
                type="text"
                id="patient-search"
                class="inline-flex bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-700 text-gray-900 dark:text-gray-100 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 lg:w-1/3 md:w-1/2 pl-10 p-2.5"
                placeholder="Search by medical record number or patient name..."
            >
        </div>
    </div>

    <div class="overflow-hidden border border-gray-200 bg-gray-50 dark:border-gray-700 dark:bg-gray-900 rounded-lg">
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                <thead>
                    <tr>
                        <th scope="col" class="px-3 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Med. Record No.</th>
                        <th scope="col" class="px-3 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Name</th>
                        <th scope="col" class="px-3 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Date Admitted</th>
                        <th scope="col" class="px-3 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Date Discharged</th>
                        <th scope="col" class="px-3 py-3 text-right text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody class="bg-white dark:bg-gray-900 divide-y divide-gray-100 dark:divide-gray-800">
                    @forelse($scoringCharts as $record)
                        <tr class="patient-record-row hover:bg-gray-50 dark:hover:bg-gray-800 transition-colors duration-150" 
                            data-medrec="{{ $record->patientRecord->medrec_code }}" 
                            data-name="{{ $record->patientRecord->formalName() }}">
                            <td class="px-3 py-3 whitespace-nowrap text-sm font-medium text-gray-700 dark:text-gray-300">{{ $record->patientRecord->medrec_code }}</td>
                            <td class="px-3 py-3 whitespace-nowrap text-sm text-gray-700 dark:text-gray-300">
                                {{ $record->patientRecord->formalName() }}
                            </td>
                            <td class="px-3 py-3 whitespace-nowrap text-sm text-gray-700 dark:text-gray-300">
                                @if($record->patientRecord->admissionDate)
                                    <span class="flex items-center">
                                        <x-lucide-calendar class="h-4 w-4 mr-1.5 text-blue-600 dark:text-blue-400" />
                                        {{ $record->patientRecord->admissionDate ? date('M d, Y \a\t h:i A', strtotime($record->patientRecord->admissionDate)) : '' }}
                                    </span>
                                @else
                                    <span class="text-gray-400 dark:text-gray-500">-</span>
                                @endif
                            </td>
                            <td class="px-3 py-3 whitespace-nowrap text-sm text-gray-700 dark:text-gray-300">
                                @if($record->patientRecord->dischargeDate)
                                    <span class="flex items-center">
                                        <x-lucide-circle-check-big class="h-4 w-4 mr-1.5 text-teal-600 dark:text-teal-400" />
                                        {{ $record->patientRecord->dischargeDate ? date('M d, Y \a\t h:i A', strtotime($record->patientRecord->dischargeDate)) : '' }}
                                    </span>
                                @else
                                    <span class="text-gray-400 dark:text-gray-500">-</span>
                                @endif
                            </td>
                            <td class="px-3 py-3 whitespace-nowrap text-right text-sm font-medium">
                                <div class="flex items-center justify-end space-x-3">
                                    <a href="{{ route('scoring-chart.show', $record) }}"
                                       class="text-blue-600 dark:text-blue-400 hover:text-blue-800 dark:hover:text-blue-300 transition-colors">
                                        <span class="sr-only">View</span>
                                        <x-lucide-eye class="h-5 w-5" />
                                    </a>
                                    <a href="{{ route('scoring-chart.edit', $record) }}"
                                       class="text-gray-600 dark:text-gray-400 hover:text-gray-800 dark:hover:text-gray-300 transition-colors">
                                        <span class="sr-only">Edit</span>
                                        <x-lucide-square-pen class="h-5 w-5" />
                                    </a>
                                    <form action="{{ route('scoring-chart.destroy', $record) }}" method="POST"
                                        class="inline-block"
                                        onsubmit="return confirm('Are you sure you want to delete this record?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                                class="text-red-600 dark:text-red-400 hover:text-red-800 dark:hover:text-red-300 transition-colors">
                                            <span class="sr-only">Delete</span>
                                            <x-lucide-trash-2 class="h-5 w-5" />
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr id="no-records-row" class="hidden">
                            <td colspan="8" class="px-3 py-12 text-center">
                                <div class="flex flex-col items-center justify-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-gray-300 dark:text-gray-600 mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                    </svg>
                                    <p class="text-gray-500 dark:text-gray-400 text-lg font-medium" id="no-records-message">{{ __('No matching records found') }}</p>
                                    <p class="text-gray-400 dark:text-gray-500 text-sm mt-1">{{ __('Try adjusting your search') }}</p>
                                </div>
                            </td>
                        </tr>
                        <tr id="empty-records-row">
                            <td colspan="8" class="px-3 py-12 text-center">
                                <div class="flex flex-col items-center justify-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-gray-300 dark:text-gray-600 mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                    </svg>
                                    <p class="text-gray-500 dark:text-gray-400 text-lg font-medium">{{ __('No patient records found') }}</p>
                                    <p class="text-gray-400 dark:text-gray-500 text-sm mt-1">{{ __('Add a new record to get started') }}</p>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <!-- JavaScript for Real-time Search -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const searchInput = document.getElementById('patient-search');
            const patientRows = document.querySelectorAll('.patient-record-row');
            const noRecordsRow = document.getElementById('no-records-row');
            const emptyRecordsRow = document.getElementById('empty-records-row');
            
            // Check if we have any patient records
            const hasRecords = patientRows.length > 0;
            
            if (hasRecords) {
                // Hide the empty state row if we have records
                if (emptyRecordsRow) {
                    emptyRecordsRow.classList.add('hidden');
                }
            }
            
            searchInput.addEventListener('input', function() {
                const searchTerm = this.value.toLowerCase().trim();
                let visibleCount = 0;
                
                // Only perform search if we have records
                if (hasRecords) {
                    patientRows.forEach(row => {
                        const medrecCode = row.getAttribute('data-medrec').toLowerCase();
                        const patientName = row.getAttribute('data-name').toLowerCase();
                        
                        // Check if the row matches the search term
                        if (medrecCode.includes(searchTerm) || patientName.includes(searchTerm)) {
                            row.classList.remove('hidden');
                            visibleCount++;
                        } else {
                            row.classList.add('hidden');
                        }
                    });
                    
                    // Show or hide "no results" message
                    if (visibleCount === 0 && searchTerm !== '') {
                        noRecordsRow.classList.remove('hidden');
                    } else {
                        noRecordsRow.classList.add('hidden');
                    }
                }
            });
        });
    </script>
</x-layouts.app>