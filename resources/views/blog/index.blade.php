<x-layout>
    <div class="max-w-4xl mx-auto">
        <div class="text-center mb-12">
            <h1 class="text-4xl font-bold bg-gradient-to-r from-blue-400 to-purple-600 bg-clip-text text-transparent mb-4">
                Career Blog
            </h1>
            <p class="text-gray-400 text-lg">
                Tips, guides, and insights to accelerate your tech career
            </p>
        </div>

        <div class="grid md:grid-cols-2 gap-8 mb-12">
            {{-- Featured Article --}}
            <x-panel class="md:col-span-2 p-8">
                <div class="flex items-start space-x-6">
                    <img src="https://images.unsplash.com/photo-1516321318423-f06f85e504b3?w=200&h=120&fit=crop&crop=center"
                         alt="Blog post" class="w-48 h-32 object-cover rounded-lg" />
                    <div class="flex-1">
                        <span class="bg-blue-600 text-white px-3 py-1 rounded-full text-sm font-medium">Featured</span>
                        <h2 class="text-2xl font-bold mt-3 mb-3">
                            <a href="/blog/junior-to-senior-developer-roadmap" class="hover:text-blue-400 transition-colors">
                                From Junior to Senior: Your Complete Developer Roadmap
                            </a>
                        </h2>
                        <p class="text-gray-400 mb-4">
                            A comprehensive guide on how to advance from a junior developer to a senior role, including the skills you need to master and the mindset shifts required.
                        </p>
                        <div class="flex items-center text-sm text-gray-500">
                            <span>By TechCareers Team</span>
                            <span class="mx-2">•</span>
                            <span>5 min read</span>
                            <span class="mx-2">•</span>
                            <span>2 days ago</span>
                        </div>
                    </div>
                </div>
            </x-panel>

            {{-- Recent Articles --}}
            @php
                $articles = [
                    [
                        'title' => 'Remote Work Best Practices for Developers',
                        'excerpt' => 'Essential tips for thriving as a remote developer in 2024.',
                        'image' => 'https://images.unsplash.com/photo-1521737604893-d14cc237f11d?w=400&h=200&fit=crop&crop=center',
                        'date' => '4 days ago',
                        'readTime' => '3 min read'
                    ],
                    [
                        'title' => 'Top 10 Skills Every Full-Stack Developer Needs',
                        'excerpt' => 'The most in-demand skills for full-stack developers in today\'s market.',
                        'image' => 'https://images.unsplash.com/photo-1555066931-4365d14bab8c?w=400&h=200&fit=crop&crop=center',
                        'date' => '1 week ago',
                        'readTime' => '7 min read'
                    ],
                    [
                        'title' => 'Salary Negotiation Tips for Tech Professionals',
                        'excerpt' => 'How to negotiate your salary like a pro and get what you deserve.',
                        'image' => 'https://images.unsplash.com/photo-1554224155-6726b3ff858f?w=400&h=200&fit=crop&crop=center',
                        'date' => '1 week ago',
                        'readTime' => '5 min read'
                    ],
                    [
                        'title' => 'Building Your Tech Portfolio: A Complete Guide',
                        'excerpt' => 'Everything you need to know about creating an impressive portfolio.',
                        'image' => 'https://images.unsplash.com/photo-1467232004584-a241de8bcf5d?w=400&h=200&fit=crop&crop=center',
                        'date' => '2 weeks ago',
                        'readTime' => '6 min read'
                    ]
                ];
            @endphp

            @foreach($articles as $article)
                <x-panel class="hover:border-blue-500/50 transition-all duration-300">
                    <img src="{{ $article['image'] }}" alt="{{ $article['title'] }}"
                         class="w-full h-48 object-cover rounded-lg mb-4" />
                    <h3 class="font-bold text-lg mb-2 hover:text-blue-400 transition-colors">
                        <a href="/blog/{{ Str::slug($article['title']) }}">{{ $article['title'] }}</a>
                    </h3>
                    <p class="text-gray-400 text-sm mb-4">{{ $article['excerpt'] }}</p>
                    <div class="flex items-center text-xs text-gray-500">
                        <span>{{ $article['readTime'] }}</span>
                        <span class="mx-2">•</span>
                        <span>{{ $article['date'] }}</span>
                    </div>
                </x-panel>
            @endforeach
        </div>

        {{-- Newsletter Signup --}}
        <x-panel class="text-center p-8 bg-gradient-to-r from-blue-600/10 to-purple-600/10 border-blue-500/20">
            <h3 class="text-2xl font-bold mb-4">Stay Updated</h3>
            <p class="text-gray-400 mb-6">Get weekly career tips and industry insights delivered to your inbox</p>
            <div class="flex max-w-md mx-auto gap-4">
                <input type="email" placeholder="Enter your email"
                       class="flex-1 px-4 py-3 bg-white/10 border border-white/20 rounded-lg text-white placeholder-gray-400 focus:outline-none focus:border-blue-500" />
                <button class="bg-blue-600 hover:bg-blue-700 px-6 py-3 rounded-lg font-medium transition-colors">
                    Subscribe
                </button>
            </div>
        </x-panel>
    </div>
</x-layout>
