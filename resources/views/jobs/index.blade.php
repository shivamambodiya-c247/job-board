<x-layout>
<div>
    @foreach ($jobs as $job)
        <x-card class="rounded-md border border-slate-300 p-4 mb-4 bg-white shadow-sm">
            <div class="flex justify-between">
                <h2 class="text-lg font-medium">{{ $job->title }}</h2>
                <div class="text-slate-500">
                    ${{ number_format($job->salary) }}
                </div>

            </div>

            <div class="mb-4 flex justify-between items-center text-sm text-slate-500">
                <div class="flex space-x-0">
                    <div>{{ $job->location }}</div>
                </div>

                <div class="flex space-x-0">
                    <x-tag>{{ Str::ucfirst($job->experience) }}</x-tag>
                    <x-tag>{{ Str::ucfirst($job->category) }}</x-tag>
                </div>
            </div>


            <p class="text-sm">{!! nl2br(e($job->description)) !!}</p>

            <div>
                <x-link-button href="{{ route('jobs.show', $job) }}">View</x-link-button>
            </div>
        </x-card>
    @endforeach

    {{ $jobs->links() }}
</div>
</x-layout>