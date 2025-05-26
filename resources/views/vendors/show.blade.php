<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Vendor Details') }}
            </h2>
            <div class="flex space-x-2">
                <a href="{{ route('vendors.edit', $vendor) }}" class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-500 active:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                    {{ __('Edit') }}
                </a>
                <a href="{{ route('vendors.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                    {{ __('Back to Vendors') }}
                </a>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="mb-6">
                        <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100">{{ $vendor->name }}</h3>
                        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full {{ $vendor->active ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                {{ $vendor->active ? 'Active' : 'Inactive' }}
                            </span>
                        </p>
                    </div>

                    @if($vendor->contact_person)
                    <div class="mb-6">
                        <h4 class="text-sm font-medium text-gray-500 dark:text-gray-400">Contact Person</h4>
                        <div class="mt-2 text-sm text-gray-900 dark:text-gray-100">
                            {{ $vendor->contact_person }}
                        </div>
                    </div>
                    @endif

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                        @if($vendor->email)
                        <div>
                            <h4 class="text-sm font-medium text-gray-500 dark:text-gray-400">Email</h4>
                            <div class="mt-2 text-sm text-gray-900 dark:text-gray-100">
                                {{ $vendor->email }}
                            </div>
                        </div>
                        @endif

                        @if($vendor->phone)
                        <div>
                            <h4 class="text-sm font-medium text-gray-500 dark:text-gray-400">Phone</h4>
                            <div class="mt-2 text-sm text-gray-900 dark:text-gray-100">
                                {{ $vendor->phone }}
                            </div>
                        </div>
                        @endif
                    </div>

                    @if($vendor->address || $vendor->city || $vendor->state || $vendor->postal_code || $vendor->country)
                    <div class="mb-6">
                        <h4 class="text-sm font-medium text-gray-500 dark:text-gray-400">Address</h4>
                        <div class="mt-2 text-sm text-gray-900 dark:text-gray-100">
                            @if($vendor->address)
                                <p>{{ $vendor->address }}</p>
                            @endif
                            @if($vendor->city || $vendor->state || $vendor->postal_code)
                                <p>
                                    {{ $vendor->city }}
                                    @if($vendor->city && ($vendor->state || $vendor->postal_code)), @endif
                                    {{ $vendor->state }}
                                    @if($vendor->state && $vendor->postal_code) @endif
                                    {{ $vendor->postal_code }}
                                </p>
                            @endif
                            @if($vendor->country)
                                <p>{{ $vendor->country }}</p>
                            @endif
                        </div>
                    </div>
                    @endif

                    @if($vendor->notes)
                    <div class="mb-6">
                        <h4 class="text-sm font-medium text-gray-500 dark:text-gray-400">Notes</h4>
                        <div class="mt-2 text-sm text-gray-900 dark:text-gray-100">
                            {{ $vendor->notes }}
                        </div>
                    </div>
                    @endif

                    <div class="mb-6">
                        <h4 class="text-sm font-medium text-gray-500 dark:text-gray-400">Created At</h4>
                        <div class="mt-2 text-sm text-gray-900 dark:text-gray-100">
                            {{ $vendor->created_at->format('F j, Y, g:i a') }}
                        </div>
                    </div>

                    <div class="mb-6">
                        <h4 class="text-sm font-medium text-gray-500 dark:text-gray-400">Last Updated</h4>
                        <div class="mt-2 text-sm text-gray-900 dark:text-gray-100">
                            {{ $vendor->updated_at->format('F j, Y, g:i a') }}
                        </div>
                    </div>

                    <div class="mt-8 border-t border-gray-200 dark:border-gray-700 pt-6">
                        <form action="{{ route('vendors.destroy', $vendor) }}" method="POST" class="inline" onsubmit="return confirm('Are you sure you want to delete this vendor?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="inline-flex items-center px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-500 active:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                {{ __('Delete Vendor') }}
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
