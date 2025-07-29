<x-layout>
    <div class="mb-8">
        @if(isset($searchTerm) || isset($location) || isset($schedule))
            <div class="flex justify-between items-center mb-6">
                <div>
                    <h1 class="text-3xl font-bold mb-2">Search Results</h1>
                    <p class="text-gray-400">
                        @if(isset($searchTerm) && $searchTerm)
                            Showing results for "{{ $searchTerm }}"
                        @endif
                        @if(isset($location) && $location)
                            in {{ $location }}
                        @endif
                        @if(isset($schedule) && $schedule)
                            • {{ $schedule }}
                        @endif
                        @if($jobs->total() > 0)
                            ({{ $jobs->total() }} {{ Str::plural('job', $jobs->total()) }} found)
                        @endif
                    </p>
                </div>
                <a href="/" class="text-blue-400 hover:text-blue-300">← Back to all jobs</a>
            </div>
        @elseif(isset($tag))
            <div class="flex justify-between items-center mb-6">
                <div>
                    <h1 class="text-3xl font-bold mb-2">Jobs tagged with "{{ $tag->name }}"</h1>
                    <p class="text-gray-400">{{ $jobs->count() }} {{ Str::plural('job', $jobs->count()) }} found</p>
                </div>
                <a href="/" class="text-blue-400 hover:text-blue-300">← Back to all jobs</a>
            </div>
        @endif

        <!-- Advanced Search Form -->
        <x-panel class="mb-8">
            <x-forms.form action="/search" class="grid md:grid-cols-4 gap-4 items-center">
                <x-forms.input
                    name="q"
                    label="Search Jobs"
                    placeholder="Job title, company, skills..."
                    value="{{ request('q') }}"
                />
                <x-forms.input
                    name="location"
                    label="Location"
                    placeholder="City, state, or remote"
                    value="{{ request('location') }}"
                />
                <x-forms.select name="schedule" label="Schedule">
                    <option value="">Any Schedule</option>
                    <option value="Part Time" {{ request('schedule') === 'Part Time' ? 'selected' : '' }}>Part Time</option>
                    <option value="Full Time" {{ request('schedule') === 'Full Time' ? 'selected' : '' }}>Full Time</option>
                </x-forms.select>
                <x-forms.button >Search Jobs</x-forms.button>
            </x-forms.form>
        </x-panel>
    </div>

    <div class="space-y-4">
        @forelse($jobs as $job)
            <x-job-card-wide :$job />
        @empty
            <div class="text-center py-12">
                <div class="text-6xl mb-4">🔍</div>
                <h3 class="text-xl font-semibold mb-2">No jobs found</h3>
                <p class="text-gray-400 mb-6">
                    @if(isset($searchTerm) && $searchTerm)
                        We couldn't find any jobs matching "{{ $searchTerm }}".
                    @elseif(isset($tag))
                        No jobs are currently tagged with "{{ $tag->name }}".
                    @else
                        No jobs match your search criteria.
                    @endif
                    Try adjusting your search terms.
                </p>
                <a href="/" class="bg-blue-600 hover:bg-blue-700 px-6 py-3 rounded-lg font-semibold transition-colors">
                    Browse All Jobs
                </a>
            </div>
        @endforelse
    </div>

    @if($jobs->hasPages())
        <div class="mt-8 flex justify-center">
            {{ $jobs->appends(request()->query())->links() }}
        </div>
    @endif
</x-layout>
