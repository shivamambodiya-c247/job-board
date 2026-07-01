<x-layout>
    <x-breadcrumbs 
       :links="[
           'All Jobs' => route('jobs.index'),
           'My Applications' => route('my-job-application.index'),
       ]"
    />

    {{-- {{ dd($applications) }} --}}

    @forelse ($applications as $application)
    <x-job-card :job="$application->job">
        <div class="flex items-center justify-between text-xs text-slate-500">
            <div>
                <div>
                    Applied {{ $application->created_at->diffForHumans() }}
                </div>
                <div>
                    Other {{ Str::plural('applicant', $application->job->job_applications_count - 1) }}
                    {{ $application->job->job_applications_count - 1 }}
            </div>
            <div>
                Your asking salary ${{ number_format($application->expected_salary) }}
            </div>
            <div>
                Average asking salary
                ${{ number_format($application->job->job_applications_avg_expected_salary) }}
            </div>
            </div>
            <div>
                <!-- cancel application -->
                <form action="{{ route('my-job-application.destroy', $application) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <x-button class="" type="submit">Cancel Application</x-button>
                </form>
            </div>
        </div>
        </x-job-card>
        @empty
            <p>You have not applied for any job yet.</p>
            <a href="{{route('jobs.index')}}">Browse jobs</a>
        @endforelse

    </x-layout>