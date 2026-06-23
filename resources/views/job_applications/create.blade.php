<x-layout>
    <x-job-card :$job />

    <x-card>
        <h2 class="mb-4 text-lg font-medium">Apply for this job {{ $job->title }}</h2>
        <form action="{{ route('job.application.store', $job) }}" method="POST">
            @csrf
            <label class="mb-2 block text-sm text-slate-900" for="expected_salary">Expected Salary</label>
            <x-text-input type="number" name="expected_salary" id="expected_salary" class="input border border-slate-300 rounded-md p-2 mb-4 w-full" />
            
            @error('expected_salary')
                <p class="text-red-500">{{ $message }}</p>
            @enderror
            <x-button type="submit" class="btn">Apply</x-button>
        </form>
    </x-card>
</x-layout>