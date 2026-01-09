<?php

namespace App\Actions\Gacha;

use App\Models\Job;
use Illuminate\Http\Request;

class GetBannerJobs {

    public function __invoke(array $rules = [])
    {
        $jobs = Job::query();

        if (!empty($rules['allowed_tiers'])) {
            $jobs->whereIn('job_tier', $rules['allowed_tiers']);
        }

        return $jobs->get();
    }
}
