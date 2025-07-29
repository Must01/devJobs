@props(['job'])

<x-panel class="hover:border-blue-500/50 transition-all duration-300">
    <div class="flex items-center justify-between">
        <div class="flex items-center space-x-4 flex-1">
            <x-employer-logo :employer="$job->employer" :width="60" />
            <div class="flex-1">
                <div class="flex items-start justify-between">
                    <div>
                        <h3 class="font-bold text-lg hover:text-blue-400 transition-colors">
                            <a href="/jobs/{{ $job->id }}">{{ $job->title }}</a>
                        </h3>
                        <p class="text-gray-400">{{ $job->employer->name }}</p>
                        <div class="flex items-center space-x-3 text-sm text-gray-400 mt-1">
                            <span>{{ $job->location }}</span>
                            <span>•</span>
                            <span>{{ $job->schedule }}</span>
                            <span>•</span>
                            <span class="text-green-400 font-semibold">{{ $job->salary }}</span>
                        </div>
                    </div>
                    @if($job->featured)
                        <span class="bg-yellow-500 text-black px-3 py-1 rounded-full text-sm font-semibold ml-4">
                            Featured
                        </span>
                    @endif
                </div>

                <div class="flex flex-wrap gap-2 mt-3">
                    @foreach($job->tags->take(4) as $tag)
                        <x-tag :$tag size="small" />
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-panel>
