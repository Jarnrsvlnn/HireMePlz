<?php

namespace App\Actions\Gacha;

use App\Models\Job;

class ObtainJob
{
    /**
     * Invoke the class instance.
     */
    public function __invoke($user, iterable $jobs)
    {

        foreach ($jobs as $job) {
            $isOwned = $user->jobs()
                    ->where('job_id', $job->id)
                    ->exists();

            if ($isOwned) { 
                continue; 
            }

            $user->jobs()->attach($job->id); 
        }
        
    }

    // private function handleDuplicate($user, Job $job) {}
}   
