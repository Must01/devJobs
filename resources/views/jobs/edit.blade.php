<x-layout>
    <x-page-heading>Edit Job: {{ $job->title }}</x-page-heading>

    <x-forms.form method="POST" action="/jobs/{{ $job->id }}">
        @method('PUT')

        <x-forms.input
            label="Title"
            placeholder="Senior Laravel Developer"
            name="title"
            value="{{ $job->title }}"
            required
        />

        <x-forms.input
            label="Salary"
            placeholder="$90,000 - $120,000 USD"
            name="salary"
            value="{{ $job->salary }}"
            required
        />

        <x-forms.input
            label="Location"
            placeholder="Remote, New York, London"
            name="location"
            value="{{ $job->location }}"
            required
        />

        <x-forms.input
            label="URL"
            name="url"
            placeholder="https://company.com/careers/position"
            value="{{ $job->url }}"
            required
        />

        <x-forms.textarea
            label="Description"
            name="description"
            placeholder="Describe the role, responsibilities, and requirements..."
            rows="6"
        >{{ $job->description }}</x-forms.textarea>

        <x-forms.select label="Schedule" name="schedule" required>
            <option value="Part Time" {{ $job->schedule === 'Part Time' ? 'selected' : '' }}>Part Time</option>
            <option value="Full Time" {{ $job->schedule === 'Full Time' ? 'selected' : '' }}>Full Time</option>
        </x-forms.select>

        <x-forms.checkbox
            label="Feature this job (Costs Extra)"
            name="featured"
            :checked="$job->featured"
        />

        <x-forms.divider />

        <x-forms.input
            label="Tags (comma separated)"
            name="tags"
            placeholder="laravel, php, remote, senior"
            value="{{ $job->tags->pluck('name')->implode(', ') }}"
        />

        <div class="flex space-x-4">
            <x-forms.button>Update Job</x-forms.button>
            <a href="/dashboard" class="px-6 py-3 bg-gray-600 hover:bg-gray-700 text-white font-semibold rounded-lg transition-colors duration-200">
                Cancel
            </a>
        </div>
    </x-forms.form>
</x-layout>
