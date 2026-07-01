<x-layout>
    <x-job-card :$job />

    <x-card>
        <h2 class="mb-4 text-lg font-medium">Apply for this job {{ $job->title }}</h2>
        <form action="{{ route('job.application.store', $job) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-4">
                <x-label :required="true" for="expected_salary">Expected Salary</x-label>
                <x-text-input type="number" name="expected_salary" id="expected_salary" class="input border border-slate-300 rounded-md p-2 mb-4 w-full" />
            </div>

            <div class="mb-4">
                <x-label for="upload_cv" :required="true">Upload CV</x-label>
                <x-text-input type="file" name="upload_cv" id="upload_cv" class="input border border-slate-300 rounded-md p-2 mb-4 w-full" />
            </div>

            <x-button type="submit" class="btn">Apply</x-button>
        </form>
    </x-card>
</x-layout>