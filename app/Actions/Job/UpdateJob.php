<?php 

namespace App\Actions\Job;

use App\Models\Job;

class UpdateJob {

    public function __invoke(Job $job, array $data)
    {
        return $job->update($data);
    }
    
}