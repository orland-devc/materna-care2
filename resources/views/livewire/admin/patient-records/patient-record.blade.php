<x-layouts.app :title="__('Patient Records')">
    <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-8 gap-4">
        <div>
            <flux:heading size="xl" level="1">{{ __('Patient Records') }}</flux:heading>
            <flux:subheading size="lg" class="mb-6">{{ __('Manage all admission records.') }}</flux:subheading>
        </div>
        <a href="{{ route('patient-records.create') }}"
           class="inline-flex items-center px-4 py-2.5 bg-blue-600 text-white text-sm font-medium rounded-lg hover:bg-blue-700 dark:bg-blue-600 dark:hover:bg-blue-700 transition-colors duration-200 ease-in-out shadow-sm">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
            </svg>
            {{ __('Add New Record') }}
        </a>
    </div>

    <div class="overflow-hidden border border-zinc-200 bg-zinc-50 dark:border-zinc-700 dark:bg-zinc-900 rounded-lg">
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-zinc-200 dark:divide-zinc-700">
                <thead>
                    <tr>
                        <th scope="col" class="px-3 py-3 text-left text-xs font-medium text-zinc-500 dark:text-zinc-400 uppercase tracking-wider">Med. Record No.</th>
                        <th scope="col" class="px-3 py-3 text-left text-xs font-medium text-zinc-500 dark:text-zinc-400 uppercase tracking-wider">Name</th>
                        <th scope="col" class="px-3 py-3 text-left text-xs font-medium text-zinc-500 dark:text-zinc-400 uppercase tracking-wider">Status</th>
                        <th scope="col" class="px-3 py-3 text-left text-xs font-medium text-zinc-500 dark:text-zinc-400 uppercase tracking-wider">Type</th>
                        <th scope="col" class="px-3 py-3 text-left text-xs font-medium text-zinc-500 dark:text-zinc-400 uppercase tracking-wider">Date Admitted</th>
                        <th scope="col" class="px-3 py-3 text-left text-xs font-medium text-zinc-500 dark:text-zinc-400 uppercase tracking-wider">Time Admitted</th>
                        <th scope="col" class="px-3 py-3 text-left text-xs font-medium text-zinc-500 dark:text-zinc-400 uppercase tracking-wider">Discharge</th>
                        <th scope="col" class="px-3 py-3 text-right text-xs font-medium text-zinc-500 dark:text-zinc-400 uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody class="bg-white dark:bg-zinc-900 divide-y divide-zinc-100 dark:divide-zinc-800">
                    @forelse($patientRecords as $record)
                        <tr class="hover:bg-zinc-50 dark:hover:bg-zinc-800 transition-colors duration-150">
                            <td class="px-3 py-3 whitespace-nowrap text-sm font-medium text-zinc-700 dark:text-zinc-300">{{ $record->medrec_code }}</td>
                            <td class="px-3 py-3 whitespace-nowrap text-sm text-zinc-700 dark:text-zinc-300">
                                {{ $record->lastName }}, {{ $record->firstName }} {{ $record->middleName }}
                            </td>
                            <td class="px-3 py-3 whitespace-nowrap text-sm text-zinc-700 dark:text-zinc-300">
                                {{ $record->disposition->name ?? '-' }}
                            </td>
                            <td class="px-3 py-3 whitespace-nowrap text-sm text-zinc-700 dark:text-zinc-300">
                                {{ $record->type->name ?? '-' }}
                            </td>
                            <td class="px-3 py-3 whitespace-nowrap text-sm text-zinc-700 dark:text-zinc-300">
                                @if($record->admissionDate)
                                    <span class="flex items-center">
                                        <x-lucide-calendar class="h-4 w-4 mr-1.5 text-blue-600 dark:text-blue-400" />
                                        {{ $record->admissionDate->format('M d, Y') }}
                                    </span>
                                @else
                                    <span class="text-zinc-400 dark:text-zinc-500">-</span>
                                @endif
                            </td>
                            <td class="px-3 py-3 whitespace-nowrap text-sm text-zinc-700 dark:text-zinc-300">
                                @if($record->admissionTime)
                                    <span class="flex items-center">
                                        <x-lucide-clock class="h-4 w-4 mr-1.5 text-blue-600 dark:text-blue-400" />
                                        {{ $record->admissionTime }}
                                    </span>
                                @else
                                    <span class="text-zinc-400 dark:text-zinc-500">-</span>
                                @endif
                            </td>
                            <td class="px-3 py-3 whitespace-nowrap text-sm text-zinc-700 dark:text-zinc-300">
                                @if($record->dischargeDate)
                                    <span class="flex items-center">
                                        <x-lucide-circle-check-big class="h-4 w-4 mr-1.5 text-teal-600 dark:text-teal-400" />
                                        {{ $record->dischargeDate->format('M d, Y') }}
                                    </span>
                                @else
                                    <span class="text-zinc-400 dark:text-zinc-500">-</span>
                                @endif
                            </td>
                            <td class="px-3 py-3 whitespace-nowrap text-right text-sm font-medium">
                                <div class="flex items-center justify-end space-x-3">
                                    <a href="{{ route('patient-records.show', $record) }}"
                                       class="text-blue-600 dark:text-blue-400 hover:text-blue-800 dark:hover:text-blue-300 transition-colors">
                                        <span class="sr-only">View</span>
                                        <x-lucide-eye class="h-5 w-5" />
                                    </a>
                                    <a href="{{ route('patient-records.edit', $record) }}"
                                       class="text-zinc-600 dark:text-zinc-400 hover:text-zinc-800 dark:hover:text-zinc-300 transition-colors">
                                        <span class="sr-only">Edit</span>
                                        <x-lucide-square-pen class="h-5 w-5" />
                                    </a>
                                    <form action="{{ route('patient-records.destroy', $record) }}" method="POST"
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
                        <tr>
                            <td colspan="6" class="px-3 py-12 text-center">
                                <div class="flex flex-col items-center justify-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-zinc-300 dark:text-zinc-600 mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                    </svg>
                                    <p class="text-zinc-500 dark:text-zinc-400 text-lg font-medium">{{ __('No patient records found') }}</p>
                                    <p class="text-zinc-400 dark:text-zinc-500 text-sm mt-1">{{ __('Add a new record to get started') }}</p>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-layouts.app>