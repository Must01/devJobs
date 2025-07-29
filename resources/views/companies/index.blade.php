<x-layout>
    <x-page-heading>Browse Companies</x-page-heading>

    {{-- Centered search form --}}
    <div class="flex justify-center mb-8">
        <div class="w-full max-w-md">
            <x-forms.form action="/companies">
                <x-forms.input
                    name="search"
                    placeholder="Search companies..."
                    :label="false"
                    value="{{ request('search') }}"
                    class="text-center"
                />
            </x-forms.form>
        </div>
    </div>

    @if(request('search'))
        <div class="text-center mb-6">
            <p class="text-gray-400">
                @if($employers->total() > 0)
                    Found {{ $employers->total() }} {{ Str::plural('company', $employers->total()) }}
                    matching "{{ request('search') }}"
                @else
                    No companies found matching "{{ request('search') }}"
                @endif
            </p>
        </div>
    @endif

    <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
        @forelse($employers as $employer)
            <x-panel class="text-center hover:scale-105 transition-transform duration-200">
                <div class="mb-4 flex justify-center">
                    <x-employer-logo :employer="$employer" :width="80" />
                </div>

                <h3 class="font-bold text-lg mb-2">{{ $employer->name }}</h3>

                <p class="text-sm text-gray-400 mb-2">{{ $employer->location }}</p>

                <p class="text-sm text-gray-400 mb-4">
                    {{ $employer->jobs_count }} {{ Str::plural('job', $employer->jobs_count) }} available
                </p>

                @if($employer->jobs->count() > 0)
                    <div class="flex flex-wrap justify-center gap-1 mb-4">
                        @foreach($employer->jobs->take(3) as $job)
                            @foreach($job->tags->take(2) as $tag)
                                <x-tag :$tag size="small" />
                            @endforeach
                        @endforeach
                    </div>
                @endif

                <a href="/companies/{{ $employer->id }}"
                   class="inline-block bg-white/10 hover:bg-white/20 px-4 py-2 rounded-lg text-sm transition-colors duration-200">
                    View Jobs
                </a>
            </x-panel>
        @empty
            <div class="col-span-full text-center py-12">
                @if(request('search'))
                    <div class="text-6xl mb-4">🔍</div>
                    <p class="text-gray-400 text-lg mb-4">No companies found matching your search.</p>
                    <a href="/companies" class="bg-blue-600 hover:bg-blue-700 px-4 py-2 rounded-lg transition-colors duration-200">
                        View All Companies
                    </a>
                @else
                    <p class="text-gray-400 text-lg">No companies found.</p>
                @endif
            </div>
        @endforelse
    </div>

    @if($employers->hasPages())
        <div class="mt-8 flex justify-center">
            {{ $employers->links() }}
        </div>
    @endif
</x-layout>
