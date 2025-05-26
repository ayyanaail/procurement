<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Order Details') }}
            </h2>
            <div class="flex space-x-2">
                <a href="{{ route('orders.edit', $order) }}" class="inline-flex items-center px-4 py-2 bg-rose-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-rose-500 active:bg-rose-700 focus:outline-none focus:ring-2 focus:ring-rose-500 focus:ring-offset-2 transition ease-in-out duration-150">
                    {{ __('Edit') }}
                </a>
                <a href="{{ route('orders.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-rose-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                    {{ __('Back to Orders') }}
                </a>
            </div>
        </div>
    </x-slot>

    <div>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="mb-6">
                        <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100">Order #{{ $order->id }}</h3>
                    </div>

                    <!-- Basic Information -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                        <div>
                            <h4 class="text-sm font-medium text-gray-500 dark:text-gray-400">Vendor</h4>
                            <div class="mt-2 text-sm text-gray-900 dark:text-gray-100">
                                {{ $order->vendor->name }}
                            </div>
                        </div>

                        <div>
                            <h4 class="text-sm font-medium text-gray-500 dark:text-gray-400">Brand</h4>
                            <div class="mt-2 text-sm text-gray-900 dark:text-gray-100">
                                {{ $order->brand->name }}
                            </div>
                        </div>
                    </div>

                    <div class="mb-6">
                        <h4 class="text-sm font-medium text-gray-500 dark:text-gray-400">Description</h4>
                        <div class="mt-2 text-sm text-gray-900 dark:text-gray-100">
                            {{ $order->description ?? 'No description available.' }}
                        </div>
                    </div>

                    <!-- Purchase Quotation Information -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                        <div>
                            <h4 class="text-sm font-medium text-gray-500 dark:text-gray-400">PQ No</h4>
                            <div class="mt-2 text-sm text-gray-900 dark:text-gray-100">
                                {{ $order->pq_no ?? 'N/A' }}
                            </div>
                        </div>

                        <div>
                            <h4 class="text-sm font-medium text-gray-500 dark:text-gray-400">PQ Date</h4>
                            <div class="mt-2 text-sm text-gray-900 dark:text-gray-100">
                                {{ $order->pq_date ? $order->pq_date->format('F j, Y') : 'N/A' }}
                            </div>
                        </div>
                    </div>

                    <!-- Proforma Invoice Information -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                        <div>
                            <h4 class="text-sm font-medium text-gray-500 dark:text-gray-400">PI No</h4>
                            <div class="mt-2 text-sm text-gray-900 dark:text-gray-100">
                                {{ $order->pi_no ?? 'N/A' }}
                            </div>
                        </div>

                        <div>
                            <h4 class="text-sm font-medium text-gray-500 dark:text-gray-400">PI Date</h4>
                            <div class="mt-2 text-sm text-gray-900 dark:text-gray-100">
                                {{ $order->pi_date ? $order->pi_date->format('F j, Y') : 'N/A' }}
                            </div>
                        </div>
                    </div>

                    <!-- Advance Payment Information -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                        <div>
                            <h4 class="text-sm font-medium text-gray-500 dark:text-gray-400">AP Value</h4>
                            <div class="mt-2 text-sm text-gray-900 dark:text-gray-100">
                                {{ $order->ap_value ? number_format($order->ap_value, 2) : 'N/A' }}
                            </div>
                        </div>

                        <div>
                            <h4 class="text-sm font-medium text-gray-500 dark:text-gray-400">AP Date</h4>
                            <div class="mt-2 text-sm text-gray-900 dark:text-gray-100">
                                {{ $order->ap_date ? $order->ap_date->format('F j, Y') : 'N/A' }}
                            </div>
                        </div>
                    </div>

                    <!-- Commercial Invoice Information -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                        <div>
                            <h4 class="text-sm font-medium text-gray-500 dark:text-gray-400">CI No</h4>
                            <div class="mt-2 text-sm text-gray-900 dark:text-gray-100">
                                {{ $order->ci_no ?? 'N/A' }}
                            </div>
                        </div>

                        <div>
                            <h4 class="text-sm font-medium text-gray-500 dark:text-gray-400">CI Date</h4>
                            <div class="mt-2 text-sm text-gray-900 dark:text-gray-100">
                                {{ $order->ci_date ? $order->ci_date->format('F j, Y') : 'N/A' }}
                            </div>
                        </div>
                    </div>

                    <!-- Bill of Lading Information -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                        <div>
                            <h4 class="text-sm font-medium text-gray-500 dark:text-gray-400">BL No</h4>
                            <div class="mt-2 text-sm text-gray-900 dark:text-gray-100">
                                {{ $order->bl_no ?? 'N/A' }}
                            </div>
                        </div>

                        <div>
                            <h4 class="text-sm font-medium text-gray-500 dark:text-gray-400">BL Date</h4>
                            <div class="mt-2 text-sm text-gray-900 dark:text-gray-100">
                                {{ $order->bl_date ? $order->bl_date->format('F j, Y') : 'N/A' }}
                            </div>
                        </div>
                    </div>

                    <!-- Balance Payment Information -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                        <div>
                            <h4 class="text-sm font-medium text-gray-500 dark:text-gray-400">BP Value</h4>
                            <div class="mt-2 text-sm text-gray-900 dark:text-gray-100">
                                {{ $order->bp_value ? number_format($order->bp_value, 2) : 'N/A' }}
                            </div>
                        </div>

                        <div>
                            <h4 class="text-sm font-medium text-gray-500 dark:text-gray-400">BP Date</h4>
                            <div class="mt-2 text-sm text-gray-900 dark:text-gray-100">
                                {{ $order->bp_date ? $order->bp_date->format('F j, Y') : 'N/A' }}
                            </div>
                        </div>
                    </div>

                    <!-- ETA and Remarks -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                        <div>
                            <h4 class="text-sm font-medium text-gray-500 dark:text-gray-400">ETA</h4>
                            <div class="mt-2 text-sm text-gray-900 dark:text-gray-100">
                                {{ $order->eta ? $order->eta->format('F j, Y') : 'N/A' }}
                            </div>
                        </div>

                        <div>
                            <h4 class="text-sm font-medium text-gray-500 dark:text-gray-400">Remarks</h4>
                            <div class="mt-2 text-sm text-gray-900 dark:text-gray-100">
                                {{ $order->remarks ?? 'No remarks available.' }}
                            </div>
                        </div>
                    </div>

                    <!-- Timestamps -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                        <div>
                            <h4 class="text-sm font-medium text-gray-500 dark:text-gray-400">Created At</h4>
                            <div class="mt-2 text-sm text-gray-900 dark:text-gray-100">
                                {{ $order->created_at->format('F j, Y, g:i a') }}
                            </div>
                        </div>

                        <div>
                            <h4 class="text-sm font-medium text-gray-500 dark:text-gray-400">Last Updated</h4>
                            <div class="mt-2 text-sm text-gray-900 dark:text-gray-100">
                                {{ $order->updated_at->format('F j, Y, g:i a') }}
                            </div>
                        </div>
                    </div>

                    <div class="mt-8 border-t border-gray-200 dark:border-gray-700 pt-6">
                        <form action="{{ route('orders.destroy', $order) }}" method="POST" class="inline" onsubmit="return confirm('Are you sure you want to delete this order?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="inline-flex items-center px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-500 active:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                {{ __('Delete Order') }}
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <x-order-progress :order="$order" />

</x-app-layout>
