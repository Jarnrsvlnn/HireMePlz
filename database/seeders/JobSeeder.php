<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Job;

class JobSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $jobs = Job::factory()->count(10)->make();

        $validatedJobs = $jobs->filter(fn($job) => !empty($job->job_title));

        Job::factory()->create($validatedJobs);
    }
}
