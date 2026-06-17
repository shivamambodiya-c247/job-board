<x-layout>
<div>
    <x-card x-data="" class="rounded-md border border-slate-300 p-4 mb-4 bg-white shadow-sm">
        <form x-ref="filters" id="filtering-form" action="{{ route('jobs.filter') }}" method="GET">
            <div class="mb-4 grid grid-cols-2 gap-4">
                <div>
                    <div class="mb-1 font-semibold text-sm">Search</div>
                    <x-text-input name="search" value="{{ request('search') }}" placeholder="Search jobs..." form-refs="filters" />
                </div>
                <div>
                    <div class="mb-1 font-semibold text-sm">
                        Salary
                    </div>
                    <div class="flex space-x-2">
                        <x-text-input name="min_salary" value="{{ request('min_salary') }}" placeholder="Min Salary" form-refs="filters" />
                        <x-text-input name="max_salary" value="{{ request('max_salary') }}" placeholder="Max Salary" form-refs="filters" />
                    </div>
                </div>
                <div>
                    <div class="mb-1 font-semibold text-sm">
                        Experience
                    </div>
                    <x-radio-group name="experience" :options="App\Models\Job::$experience" />
                </div>
                <div>
                    <div class="mb-1 font-semibold text-sm">
                        Category
                    </div>                    
                    <x-radio-group name="category" :options="App\Models\Job::$categories" />
                </div>
            </div>

            <div class="mt-4">
                <x-button type="submit">Filter</x-button>
            </div>
        </form>
    </x-card>

    @foreach ($jobs as $job)
        <x-job-card :job="$job">
            <div>
                <x-link-button href="{{ route('jobs.show', $job) }}">View</x-link-button>
            </div>
        </x-job-card>
    @endforeach
    {{-- {{ $jobs->links() }} --}}
</div>
</x-layout>