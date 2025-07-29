@props(['job'])

<x-panel class="hover:border-blue-500/50 transition-all duration-300 group">
    <div class="flex items-start justify-between mb-4">
        <div class="flex items-start space-x-4 flex-1">
            <x-employer-logo :employer="$job->employer" :width="50" />
            <div class="flex-1">
                <h3 class="font-bold text-lg group-hover:text-blue-400 transition-colors">
                    <a href="/jobs/{{ $job->id }}">{{ $job->title }}</a>
                </h3>
                <p class="text-gray-400 text-sm">{{ $job->employer->name }}</p>
                <div class="flex items-center space-x-3 text-sm text-gray-400 mt-2">
                    <span>{{ $job->location }}</span>
                    <span>•</span>
                    <span>{{ $job->schedule }}</span>
                </div>
            </div>
        </div>
        @if($job->featured)
            <span class="bg-yellow-500 text-black px-2 py-1 rounded text-xs font-semibold">
                Featured
            </span>
        @endif
    </div>

    <div class="flex items-center justify-between">
        <div class="flex flex-wrap gap-1">
            @foreach($job->tags->take(3) as $tag)
                <x-tag :$tag size="small" />
            @endforeach
        </div>
        <span class="text-green-400 font-semibold">{{ $job->salary }}</span>
    </div>
</x-panel>
