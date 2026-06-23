<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class JobApplicationController extends Controller
{
    use AuthorizesRequests;
    /**
     * Show the form for creating a new resource.
     */
    public function create(Job $job)
    {
        return view('job_applications.create', compact('job'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Job $job, Request $request)
    {
        $this->authorize('apply', $job);

        $job->jobApplications()->create([
            'user_id' => request()->user()->id,
            ...$request->validate([
                'expected_salary' => 'required|integer|min:0|max:1000000',
            ])
        ]);
        return redirect()->route('jobs.show', $job)->with('success', 'Job application submitted successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
