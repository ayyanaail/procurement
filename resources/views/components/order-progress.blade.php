{{-- resources/views/components/order-progress.blade.php --}}
<div class="w-full p-4 bg-white rounded-lg shadow">
    {{-- Progress Header --}}
    <div class="flex justify-between items-center mb-4">
        <h3 class="text-lg font-semibold text-gray-900">Order Progress</h3>
        <span class="text-lg font-bold text-rose-600">{{ $progressPercentage }}%</span>
    </div>

    {{-- Progress Bar --}}
    <div class="h-2 w-full bg-gray-200 rounded-full mb-6">
        <div class="h-2 bg-rose-600 rounded-full transition-all duration-500"
             style="width: {{ $progressPercentage }}%"></div>
    </div>

    {{-- Milestone Steps with Fixed Connectors --}}
    <div class="relative">
        {{-- Connector Line Background (Static) --}}
        <div class="absolute top-5 left-0 w-full h-0.5 bg-gray-200 -z-10"></div>

        {{-- Progress Line (Dynamic) --}}
        <div class="absolute top-5 left-12 h-0.5 bg-rose-600 transition-all duration-500 -z-5"
             style="width: {{ $progressPercentage }}%"></div>

        {{-- Milestone Steps --}}
        <div class="relative flex justify-between">
            @foreach($milestones as $key => $milestone)
                <div class="flex flex-col items-center">
                    {{-- Step Circle --}}
                    <div @class([
                        'w-10 h-10 rounded-full border-2 flex items-center justify-center text-sm font-bold',
                        'border-rose-600 bg-rose-600 text-white' => $milestone['status'],
                        'border-gray-300 text-gray-400' => !$milestone['status'],
                    ])>
                        {{ $key }}
                    </div>

                    {{-- Label --}}
                    <div class="mt-2 text-center">
                        <span class="text-xs font-medium text-gray-600">{{ $milestone['label'] }}</span>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    {{-- Milestone Details --}}
    <div class="mt-8 space-y-4">
        @foreach($milestones as $key => $milestone)
            <div @class([
                'flex items-center p-3 rounded-lg',
                'bg-rose-50' => $milestone['status'],
                'bg-gray-50' => !$milestone['status'],
            ])>
                {{-- Status Icon --}}
                <div @class([
                    'w-8 h-8 rounded-full flex items-center justify-center',
                    'bg-rose-600 text-white' => $milestone['status'],
                    'bg-gray-300 text-gray-500' => !$milestone['status'],
                ])>
                    @if($milestone['status'])
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                        </svg>
                    @else
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    @endif
                </div>

                {{-- Milestone Info --}}
                <div class="ml-4 flex-1">
                    <div class="flex justify-between items-center">
                        <div>
                            <h4 class="text-sm font-medium text-gray-900">{{ $milestone['label'] }}</h4>
                            @if($milestone['status'])
                                <p class="text-sm text-gray-600">
                                    {{ $key }}: {{ $milestone['value'] }}
                                </p>
                            @endif
                        </div>
                        @if($milestone['date'])
                            <span class="text-sm text-gray-500">
                                {{ \Carbon\Carbon::parse($milestone['date'])->format('M d, Y') }}
                            </span>
                        @endif
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
