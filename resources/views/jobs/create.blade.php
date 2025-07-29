<x-layout>
    <x-page-heading>Create A Job</x-page-heading>

    <x-forms.form method="POST" action="/jobs">
        <x-forms.input label="title" placeholder="job title" name="title" />
        <x-forms.input label="salary" placeholder="$50,000 USD" name="salary" />
        <x-forms.input label="location" placeholder="Geulmim, Rabat..." name="location" />
        <x-forms.input label="URL" name="url" placeholder="https://acme.com/jobs/ceo-wanted" />


        <x-forms.select label="Schedule" name="schedule">
            <option>Part Time</option>
            <option>Full Time</option>
        </x-forms.select>

        <x-forms.checkbox label="Feature (Costs Extra)" name="featured" />

        <x-forms.divider />

        <x-forms.input label="Tags (comma separated)" name="tags" placeholder="laracasts, video, education" />

        <x-forms.button>Publish</x-forms.button>
    </x-forms.form>
</x-layout>
