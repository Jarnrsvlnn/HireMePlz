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
        Job::query()->delete();

    $jobs = Job::factory()
            ->count(100)
            ->make()
            ->filter(fn ($job) => !empty($job->job_title));

        $jobs->each->save();
    }
}
