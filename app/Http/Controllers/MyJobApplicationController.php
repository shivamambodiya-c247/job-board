<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JobApplication;

class MyJobApplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view(
            'my_job_applications.index',
            [
                'applications' => auth()->user()->jobApplications()
                    ->with('job', 'job.employer')
                    ->with([
                        'job' => fn($query) => $query->withCount('jobApplications')
                            ->withAvg('jobApplications', 'expected_salary'),
                        'job.employer'
                    ])
                    ->latest()->get()
            ]
        );
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $application = JobApplication::findOrFail($id);
        $application->delete();
        return redirect()->route('my-job-application.index')
            ->with('success', 'Job application cancelled successfully!');
    }
}
