<?php 

namespace App\Actions\Job;

use App\Models\Job;

class GetAllJobs {

    public function __invoke()
    {
        return Job::select('id', 'job_title', 'salary', 'description')->get();
    }
    
}