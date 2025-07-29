<x-layout>
    <div class="max-w-4xl mx-auto">
        <!-- Header Section -->
        <div class="mb-8">
            <div class="flex items-start justify-between mb-6">
                <div class="flex items-start space-x-6">
                    <x-employer-logo :employer="$job->employer" :width="80" />
                    <div>
                        <h1 class="text-3xl font-bold mb-2">{{ $job->title }}</h1>
                        <p class="text-xl text-gray-400 mb-3">{{ $job->employer->name }}</p>
                        <div class="flex items-center space-x-4 text-sm text-gray-400">
                            <span>{{ $job->location }}</span>
                            <span>{{ $job->schedule }}</span>
                            <span class="font-semibold text-green-400">{{ $job->salary }}</span>
                        </div>
                    </div>
                </div>

                @if($job->featured)
                    <span class="bg-yellow-500 text-black px-3 py-1 rounded-full text-sm font-semibold">
                        Featured
                    </span>
                @endif
            </div>

            <!-- Tags -->
            <div class="flex flex-wrap gap-2 mb-6">
                @foreach($job->tags as $tag)
                    <x-tag :$tag />
                @endforeach
            </div>

            <!-- Apply Button -->
            <a href="{{ $job->url }}" target="_blank"
               class="inline-block bg-blue-600 hover:bg-blue-700 text-white font-semibold px-8 py-3 rounded-lg transition-colors duration-200">
                Apply Now
            </a>
        </div>

        <!-- Job Description -->
        <x-panel class="mb-8">
            <h2 class="text-xl font-semibold mb-4">Job Description</h2>
            <div class="prose prose-invert max-w-none">
                <p class="text-gray-300 leading-relaxed">
                    {{ $job->description ?? 'No description provided for this position. Please visit the company website for more details.' }}
                </p>
            </div>
        </x-panel>

        <!-- Company Info -->
        <x-panel>
            <h2 class="text-xl font-semibold mb-4">About {{ $job->employer->name }}</h2>
            <div class="flex items-start space-x-4">
                <x-employer-logo :employer="$job->employer" :width="60" />
                <div>
                    <h3 class="font-semibold text-lg mb-2">{{ $job->employer->name }}</h3>
                    <p class="text-gray-300">
                        {{ $job->employer->description ?? 'Learn more about this company by visiting their website.' }}
                    </p>
                </div>
            </div>
        </x-panel>
    </div>
</x-layout>
