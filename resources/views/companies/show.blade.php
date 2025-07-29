<x-layout>
    <div class="max-w-4xl mx-auto">
        <!-- Company Header -->
        <div class="text-center mb-10">
            <x-employer-logo :employer="$employer" :width="120" class="mx-auto mb-4" />
            <h1 class="text-3xl font-bold mb-2">{{ $employer->name }}</h1>
            <p class="text-gray-400 mb-4">
                {{ $employer->jobs->count() }} {{ Str::plural('job', $employer->jobs->count()) }} available
            </p>
        </div>

        <!-- Company Description -->
        @if($employer->description)
            <x-panel class="mb-8">
                <h2 class="text-xl font-semibold mb-4">About Us</h2>
                <p class="text-gray-300 leading-relaxed">{{ $employer->description }}</p>
            </x-panel>
        @endif

        <!-- Jobs Section -->
        <div>
            <h2 class="text-2xl font-bold mb-6">Open Positions</h2>

            <div class="space-y-6">
                @forelse($employer->jobs as $job)
                    <x-job-card-wide :$job />
                @empty
                    <div class="text-center py-12">
                        <p class="text-gray-400">No open positions at the moment.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
</x-layout>
