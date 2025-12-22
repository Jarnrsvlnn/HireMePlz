<?php

namespace App\Jobs;

use App\Models\Job;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;

class TransalateJob implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    public function __construct(public Job $jobListing)
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        logger('Translating ' . $this->jobListing->job_title . 'into spanish.');
    }
}
