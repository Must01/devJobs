<x-layout>
    <div class="space-y-12">

        {{-- Hero Section --}}
        <section class="py-12 text-center">
            <div class="flex flex-col items-center gap-6">
                <h1 class='font-bold text-4xl bg-gradient-to-r from-blue-400 to-purple-600 bg-clip-text text-transparent'>
                    Find Your Dream Tech Job
                </h1>
                <p class="text-gray-400 text-lg max-w-2xl">
                    Discover amazing opportunities from top companies. Your next career move starts here.
                </p>
                <div class="flex items-center mt-6 w-full max-w-lg">
                    <x-forms.form action="/search" class="w-full">
                        <div class="relative">
                            <x-forms.input
                                class="w-full py-4 px-6 bg-white/10 rounded-xl outline-none border border-white/20 focus:border-blue-500 text-lg backdrop-blur-sm"
                                name='q'
                                placeholder="Search jobs, companies, skills..."
                                :label="false"
                            />
                            <button type="submit" class="absolute right-3 top-1/2 transform -translate-y-1/2 bg-blue-600 hover:bg-blue-700 px-4 py-2 rounded-lg transition-colors">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                </svg>
                            </button>
                        </div>
                    </x-forms.form>
                </div>
            </div>
        </section>

        {{-- Featured Jobs --}}
        @if($featuredJobs->count() > 0)
        <section>
            <x-section-heading>⭐ Featured Opportunities</x-section-heading>
            <div class="grid lg:grid-cols-3 gap-8 mt-8">
                @foreach ($featuredJobs as $job)
                    <x-job-card :$job />
                @endforeach
            </div>
        </section>
        @endif

        {{-- Popular Skills --}}
        <section>
            <x-section-heading>🏷️ Popular Skills</x-section-heading>
            <div class="mt-8">
                <div class="flex flex-wrap gap-3">
                    @foreach ($tags as $tag)
                        <x-tag :$tag />
                    @endforeach
                </div>
            </div>
        </section>

        {{-- Recent Jobs --}}
        <section>
            <x-section-heading>🕒 Latest Opportunities</x-section-heading>
            <div class="mt-8 space-y-4">
                @foreach ($jobs->take(4) as $job)
                    <x-job-card-wide :$job />
                @endforeach
            </div>

            @if($jobs->count() >= 10)
                <div class="text-center mt-8">
                    <a href="/search" class="bg-blue-600 hover:bg-blue-700 px-6 py-3 rounded-lg font-semibold transition-colors duration-200">
                        View All Jobs
                    </a>
                </div>
            @endif
        </section>

    </div>
</x-layout>
