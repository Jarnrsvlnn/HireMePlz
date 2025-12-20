<?php 

namespace App\Actions\Job;

use App\Models\Job;
use Illuminate\Support\Facades\Mail;
use App\Mail\GodlikeJobObtained;

class CreateJob {

    public function __invoke($user, array $data)
    {
        $job = $user->jobs()->create($data);

        if ($job['job_tier'] == 'Godlike') {
            Mail::to('jarorosaurusrex@gmail.com')->send(new GodlikeJobObtained());
        }
        return $job;
    }
    
}