<x-layout>
    <div class="max-w-6xl mx-auto">
        <div class="flex justify-between items-center mb-8">
            <h1 class="text-3xl font-bold">Dashboard</h1>
            <a href="/jobs/create" class="bg-blue-600 hover:bg-blue-700 px-4 py-2 rounded-lg font-semibold transition-colors duration-200">
                Post New Job
            </a>
        </div>

        <!-- Stats Cards -->
        <div class="grid md:grid-cols-3 gap-6 mb-8">
            <x-panel class="text-center">
                <h3 class="text-2xl font-bold text-blue-400">{{ $stats['total_jobs'] }}</h3>
                <p class="text-gray-400">Total Jobs Posted</p>
            </x-panel>

            <x-panel class="text-center">
                <h3 class="text-2xl font-bold text-green-400">{{ $stats['featured_jobs'] }}</h3>
                <p class="text-gray-400">Featured Jobs</p>
            </x-panel>

            <x-panel class="text-center">
                <h3 class="text-2xl font-bold text-yellow-400">{{ $stats['recent_views'] ?? 0 }}</h3>
                <p class="text-gray-400">Recent Views</p>
            </x-panel>
        </div>

        <!-- Recent Jobs -->
        <div>
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-xl font-semibold">Your Recent Jobs</h2>
                <a href="/dashboard/jobs" class="text-blue-400 hover:text-blue-300">View All</a>
            </div>

            <div class="space-y-4">
                @forelse($recentJobs as $job)
                    <x-panel class="flex justify-between items-center">
                        <div>
                            <h3 class="font-semibold">{{ $job->title }}</h3>
                            <p class="text-sm text-gray-400">{{ $job->location }} • {{ $job->schedule }}</p>
                            <p class="text-xs text-gray-500">Posted {{ $job->created_at->diffForHumans() }}</p>
                        </div>

                        <div class="flex items-center space-x-3">
                            @if($job->featured)
                                <span class="bg-yellow-500 text-black px-2 py-1 rounded text-xs font-semibold">Featured</span>
                            @endif

                            <div class="flex space-x-2">
                                <a href="/jobs/{{ $job->id }}/edit" class="text-blue-400 hover:text-blue-300 text-sm">Edit</a>
                                <form action="/jobs/{{ $job->id }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-400 hover:text-red-300 text-sm"
                                            onclick="return confirm('Are you sure?')">Delete</button>
                                </form>
                            </div>
                        </div>
                    </x-panel>
                @empty
                    <div class="text-center py-12">
                        <p class="text-gray-400 mb-4">You haven't posted any jobs yet.</p>
                        <a href="/jobs/create" class="bg-blue-600 hover:bg-blue-700 px-4 py-2 rounded-lg font-semibold transition-colors duration-200">
                            Post Your First Job
                        </a>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
</x-layout>
