<?php 

namespace App\Actions\Job;

use App\Models\Job;

class DeleteJob {

    public function __invoke(Job $job)
    {
        return $job->delete();
    }
    
}