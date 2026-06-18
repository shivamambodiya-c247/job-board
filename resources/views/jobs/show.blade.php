<x-layout>
        <x-card class="rounded-md border border-slate-300 p-4 mb-4 bg-white shadow-sm">
            <x-breadcrumbs :job="$job" />

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
                    <x-tag>{{ Str::ucfirst($job->experience) }}</x-tag>
                    <x-tag>{{ Str::ucfirst($job->category) }}</x-tag>
                </div>
            </div>


            <p class="text-sm">{!! nl2br(e($job->description)) !!}</p>
        </x-card>

        <x-card>
            More Jobs from {{ $job->employer->company_name }}

            @foreach ($job->employer->jobs as $otherJob)
                <div class="flex justify-between align-center p-2 border border-slate-300 mb-2">
                    <div class="">
                        <a href="{{ route('jobs.show', $otherJob->id) }}" class="block  text-sm text-slate-700 font-medium hover:underline">{{ $otherJob->title }}</a>
                        <span class="mt-4 text-sm text-slate-500">{{ $otherJob->created_at->diffForHumans() }}</span>
                    </div>

                    <div>${{ number_format($otherJob->salary) }}</div>
                </div>
            @endforeach
        </x-card>
</x-layout>