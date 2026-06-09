<x-layout>
<div>
    <x-card class="rounded-md border border-slate-300 p-4 mb-4 bg-white shadow-sm">
        <p class="mb-4 text-sm">Filters</p>
    </x-card>

    <x-job-card :jobs="$jobs">
        <div>
            <x-link-button href="{{ route('jobs.show', $jobs) }}">View</x-link-button>
        </div>
    </x-job-card>

    {{ $jobs->links() }}
</div>
</x-layout>