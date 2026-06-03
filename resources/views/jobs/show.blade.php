<x-layout>
    <x-card>
        <div class="flex justify-between">
            <h2 class="text-lg font-medium">{{ $job->title }}</h2>
            <div class="text-slate-500">
                ${{ number_format($job->salary) }}
            </div>
        </div>
    </x-card>
</x-layout>