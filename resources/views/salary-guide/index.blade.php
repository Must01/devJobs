<x-layout>
    <div class="max-w-6xl mx-auto">
        <div class="text-center mb-12">
            <h1 class="text-4xl font-bold bg-gradient-to-r from-blue-400 to-purple-600 bg-clip-text text-transparent mb-4">
                Tech Salary Guide 2024
            </h1>
            <p class="text-gray-400 text-lg">
                Comprehensive salary data for tech professionals across different roles and locations
            </p>
        </div>

        {{-- Salary Calculator --}}
        <x-panel class="mb-12 p-8">
            <h2 class="text-2xl font-bold mb-6">💰 Salary Calculator</h2>
            <div class="grid md:grid-cols-3 gap-6">
                <div>
                    <label class="block text-sm font-medium mb-2">Job Title</label>
                    <select class="w-full px-4 py-3 bg-white/10 border border-white/20 rounded-lg text-white">
                        <option>Entry Level (0-2 years)</option>
                        <option>Mid Level (3-5 years)</option>
                        <option>Senior Level (6-10 years)</option>
                        <option>Lead/Principal (10+ years)</option>
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-medium mb-2">Location</label>
                    <select class="w-full px-4 py-3 bg-white/10 border border-white/20 rounded-lg text-white">
                        <option>San Francisco, CA</option>
                        <option>New York, NY</option>
                        <option>Austin, TX</option>
                        <option>Seattle, WA</option>
                        <option>Remote</option>
                    </select>
                </div>
            </div>
            <button class="mt-6 bg-blue-600 hover:bg-blue-700 px-6 py-3 rounded-lg font-medium transition-colors">
                Calculate Salary Range
            </button>
        </x-panel>

        {{-- Salary Data Table --}}
        <x-panel class="mb-12">
            <h2 class="text-2xl font-bold mb-6">📊 Average Salaries by Role</h2>
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead>
                        <tr class="border-b border-white/20">
                            <th class="text-left py-4 px-4">Role</th>
                            <th class="text-left py-4 px-4">Entry Level</th>
                            <th class="text-left py-4 px-4">Mid Level</th>
                            <th class="text-left py-4 px-4">Senior Level</th>
                            <th class="text-left py-4 px-4">Lead/Principal</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-300">
                        <tr class="border-b border-white/10">
                            <td class="py-4 px-4 font-medium">Frontend Developer</td>
                            <td class="py-4 px-4">$65K - $85K</td>
                            <td class="py-4 px-4">$85K - $120K</td>
                            <td class="py-4 px-4">$120K - $160K</td>
                            <td class="py-4 px-4">$160K - $220K</td>
                        </tr>
                        <tr class="border-b border-white/10">
                            <td class="py-4 px-4 font-medium">Backend Developer</td>
                            <td class="py-4 px-4">$70K - $90K</td>
                            <td class="py-4 px-4">$90K - $130K</td>
                            <td class="py-4 px-4">$130K - $170K</td>
                            <td class="py-4 px-4">$170K - $240K</td>
                        </tr>
                        <tr class="border-b border-white/10">
                            <td class="py-4 px-4 font-medium">Full-Stack Developer</td>
                            <td class="py-4 px-4">$75K - $95K</td>
                            <td class="py-4 px-4">$95K - $135K</td>
                            <td class="py-4 px-4">$135K - $180K</td>
                            <td class="py-4 px-4">$180K - $250K</td>
                        </tr>
                        <tr class="border-b border-white/10">
                            <td class="py-4 px-4 font-medium">DevOps Engineer</td>
                            <td class="py-4 px-4">$80K - $100K</td>
                            <td class="py-4 px-4">$100K - $140K</td>
                            <td class="py-4 px-4">$140K - $185K</td>
                            <td class="py-4 px-4">$185K - $260K</td>
                        </tr>
                        <tr>
                            <td class="py-4 px-4 font-medium">Data Scientist</td>
                            <td class="py-4 px-4">$85K - $110K</td>
                            <td class="py-4 px-4">$110K - $150K</td>
                            <td class="py-4 px-4">$150K - $200K</td>
                            <td class="py-4 px-4">$200K - $280K</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </x-panel>

        {{-- Location Comparison --}}
        <div class="grid md:grid-cols-2 gap-8">
            <x-panel>
                <h3 class="text-xl font-bold mb-4">🌍 Top Paying Cities</h3>
                <div class="space-y-4">
                    <div class="flex justify-between items-center">
                        <span>San Francisco, CA</span>
                        <span class="text-green-400 font-semibold">$180K avg</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span>New York, NY</span>
                        <span class="text-green-400 font-semibold">$165K avg</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span>Seattle, WA</span>
                        <span class="text-green-400 font-semibold">$155K avg</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span>Austin, TX</span>
                        <span class="text-green-400 font-semibold">$140K avg</span>
                    </div>
                </div>
            </x-panel>

            <x-panel>
                <h3 class="text-xl font-bold mb-4">🚀 Fastest Growing Skills</h3>
                <div class="space-y-4">
                    <div class="flex justify-between items-center">
                        <span>AI/Machine Learning</span>
                        <span class="text-blue-400 font-semibold">+25% demand</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span>Cloud Architecture</span>
                        <span class="text-blue-400 font-semibold">+22% demand</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span>DevOps/SRE</span>
                        <span class="text-blue-400 font-semibold">+20% demand</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span>Cybersecurity</span>
                        <span class="text-blue-400 font-semibold">+18% demand</span>
                    </div>
                </div>
            </x-panel>
        </div>
    </div>
</x-layout>
