<?php 

namespace App\Actions\Job;

use App\Models\Job;

class ViewJob {

    public function __invoke()
    {
        return Job::select('job_title', 'salary', 'description')->get();
    }
    
}