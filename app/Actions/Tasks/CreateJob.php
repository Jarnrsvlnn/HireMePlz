<?php 

namespace App\Actions\Tasks;

use App\Models\Job;

class CreateJob {

    public function __invoke(array $data)
    {
        return Job::create($data);
    }
    
}