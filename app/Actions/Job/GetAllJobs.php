<?php

namespace App\Actions\Job;

use Illuminate\Http\Request;

class GetAllJobs {

    public function __invoke(Request $request)
    {
        return $request->user()
                ->jobs()
                ->select('jobs.id', 'jobs.job_title', 'jobs.salary', 'jobs.description', 'jobs.job_tier')
                ->latest()
                ->paginate(16);
    }
}
