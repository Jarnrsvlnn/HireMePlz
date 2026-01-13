<?php

namespace App\Actions\Gacha;

use App\Models\Job;
use Illuminate\Http\Request;

class GetBannerJobs {

    public function __invoke(array $bannerArray = [])
    {
        $jobs = Job::query();

        if (!empty($bannerArray['allowed_tiers'])) {
            $jobs->whereIn('job_tier', $bannerArray['allowed_tiers']);
        }

        return $jobs->get();
    }
}
