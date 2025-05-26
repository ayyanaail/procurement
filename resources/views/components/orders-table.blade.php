<div class="overflow-x-auto">
    <table class="min-w-full bg-white dark:bg-gray-800 rounded-lg overflow-hidden">
        <thead class="bg-gray-100 dark:bg-gray-700">
            <tr>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Vendor</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Brand</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Description</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">ETA</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Progress</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Actions</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-200 dark:divide-gray-600">
            @forelse ($orders as $order)
                <tr class="hover:bg-gray-50 dark:hover:bg-gray-700">
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-300">
                        {{ $order->vendor->name }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-300">
                        {{ $order->brand->name }}
                    </td>
                    <td class="px-6 py-4 text-sm text-gray-500 dark:text-gray-300 max-w-xs truncate">
                        {{ $order->description ?? 'No description' }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-300">
                        {{ $order->eta ? $order->eta->format('M d, Y') : 'N/A' }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        @php
                            $milestones = [
                                'PQ' => !is_null($order->pq_no),
                                'PI' => !is_null($order->pi_no),
                                'AP' => !is_null($order->ap_value),
                                'CI' => !is_null($order->ci_no),
                                'BP' => !is_null($order->bp_value),
                                'BL' => !is_null($order->bl_no),
                            ];
                            $completedSteps = count(array_filter($milestones));
                            $progressPercentage = round(($completedSteps / count($milestones)) * 100);
                        @endphp
                        <div class="flex items-center">
                            <div class="w-full bg-gray-200 rounded-full h-2.5">
                                <div class="bg-rose-600 h-2.5 rounded-full" style="width: {{ $progressPercentage }}%"></div>
                            </div>
                            <span class="ml-2 text-xs font-medium text-gray-500 dark:text-gray-300">{{ $progressPercentage }}%</span>
                        </div>
                        <div class="flex mt-2 space-x-1">
                            @foreach($milestones as $key => $status)
                                <span class="inline-flex items-center justify-center w-5 h-5 text-xs rounded-full {{ $status ? 'bg-rose-600 text-white' : 'bg-gray-200 text-gray-500' }}">
                                    {{ $key }}
                                </span>
                            @endforeach
                        </div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                        <div class="flex space-x-2">
                            <a href="{{ route('orders.show', $order) }}" class="text-rose-600 hover:text-rose-900 dark:hover:text-rose-400">
                                View
                            </a>
                            <a href="{{ route('orders.edit', $order) }}" class="text-blue-600 hover:text-blue-900 dark:hover:text-blue-400">
                                Edit
                            </a>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" class="px-6 py-4 text-center text-sm text-gray-500 dark:text-gray-300">
                        No orders found.
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>

    @if ($orders instanceof \Illuminate\Pagination\LengthAwarePaginator && $orders->hasPages())
        <div class="px-6 py-4">
            {{ $orders->links() }}
        </div>
    @endif
</div>
