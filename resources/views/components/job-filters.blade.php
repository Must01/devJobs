@props(['searchTerm' => '', 'location' => '', 'schedule' => ''])

<x-panel class="mb-8">
    <h3 class="font-semibold mb-4">Filter Jobs</h3>

    <x-forms.form action="/search" class="grid md:grid-cols-4 gap-4 items-end">
        <x-forms.input
            label="Keywords"
            name="q"
            placeholder="Job title, company, or skill..."
            value="{{ $searchTerm }}"
            :label="true"
        />

        <x-forms.input
            label="Location"
            name="location"
            placeholder="City, state, or remote"
            value="{{ $location }}"
            :label="true"
        />

        <x-forms.select label="Schedule" name="schedule" :label="true">
            <option value="">Any Schedule</option>
            <option value="Full Time" {{ $schedule === 'Full Time' ? 'selected' : '' }}>Full Time</option>
            <option value="Part Time" {{ $schedule === 'Part Time' ? 'selected' : '' }}>Part Time</option>
        </x-forms.select>

        <x-forms.button type="submit" class="h-fit">
            Search Jobs
        </x-forms.button>
    </x-forms.form>
</x-panel>
