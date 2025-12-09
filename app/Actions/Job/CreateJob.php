<?php 

namespace App\Actions\Job;

use App\Models\Job;

class CreateJob {

    public function __invoke($user, array $data)
    {
        return $user->jobs()->create($data);
    }
    
}