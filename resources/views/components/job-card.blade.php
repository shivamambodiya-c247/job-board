
<x-card class="rounded-md border border-slate-300 p-4 mb-4 bg-white shadow-sm">
    <div class="flex justify-between">
        <h2 class="text-lg font-medium">{{ $job->title }}</h2>
        <div class="text-slate-500">
            ${{ number_format($job->salary) }}
        </div>

    </div>

    <div class="mb-4 flex justify-between items-center text-sm text-slate-500">
        <div class="flex space-x-2">
            <div>Company name: {{ $job->employer->company_name }}</div>
            <div>{{ $job->location }}</div>
        </div>

        <div class="flex space-x-0">
            <x-tag>
                <a href="{{route('jobs.filter', ['experience' => $job->experience])}}">{{ Str::ucfirst($job->experience) }}</a>
            </x-tag>
            
            <x-tag>
                <a href="{{route('jobs.filter', ['category' => $job->category])}}">{{ Str::ucfirst($job->category) }}</a>
            </x-tag>
        </div>
    </div>

    <div>
        <x-link-button href="{{ route('jobs.show', $job) }}">View</x-link-button>
    </div>
</x-card>

    {{-- {{ $jobs->links() }} --}}