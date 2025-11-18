<?php

namespace App\Http\Controllers;

use App\Actions\Job\CreateJob;
use App\Actions\Job\DeleteJob;
use App\Actions\Job\GetAllJobs;
use App\Actions\Job\UpdateJob;
use App\Http\Requests\CreateJobRequest;
use App\Http\Requests\UpdateJobRequest;
use App\Models\Job;
use Illuminate\Http\Request;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(GetAllJobs $getAllJobs)
    {
        $jobs = $getAllJobs();
        return view('list-jobs', compact('jobs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('create-job');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateJobRequest $request, CreateJob $createJob)
    {
        $createJob($request->validated());
        return redirect()->route('jobs.create')->with('success', 'Job created successfully! ');
    }

    /**
     * Display the specified resource.
     */
    public function show(Job $job)
    {
        return view('job-details', compact('job'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    
    public function edit(Job $job)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateJobRequest $request, Job $job, UpdateJob $updateJob)
    {
        $updateJob($job, $request->validated());
        return redirect()->route('jobs.show', $job)->with('success', 'Updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Job $job, DeleteJob $deleteJob)
    {
        $deleteJob($job);
        return redirect()->route('jobs.index')->with('success', 'Job Deleted!');
    }
}
