<?php

namespace App\Services;

use App\Actions\Gacha\GetBannerJobs;
use App\Models\User;

class GachaService
{

    public function __construct(private GetBannerJobs $bannerJobs){}

    public function pull(User $user, string $bannerKey) {

        // get the banner 
        $banner = config("gacha.banners.$bannerKey") ?? config('gacha.banners.limited');

        // get the allowed jobs
        $jobs = ($this->bannerJobs)($banner);

        // group jobs by tier
        $jobsByTier = $jobs->groupBy('job_tier');

        // get tiers config
        $tiers = config('gacha.tiers');

        /**
         * array_keys gets all the keys from the tiers assoc. array from the config file,
         * $jobsByTier->keys() gets all the keys from the $jobsByTier array then converts all of those key into an array,
         * array_intersect then will contain all of the keys that match between the two array parameters
         */
        $availableTiers = array_intersect(array_keys($tiers), $jobsByTier->keys()->toArray());

        /**
         * get all the weights of the available tiers and store it inside the $weightedTiers array
         */
        $weightedTiers = [];
        foreach ($availableTiers as $currentTier) {
            $weightedTiers[$currentTier] = $tiers[$currentTier]['weight'];
        }

        /**
         * $totalWeights = gets the total weight from available tiers,
         * $randNum = picks a random number starting from 1 to $totalWeight (e.g. 1 - 50),
         * $runningSum = states where we are in the number line,
         * $rolledTier = will contain the tier we rolled with the runningSum
         * 
         * foreach loops through all of the weightedTiers with their weight,
         * then every item, will increment the $runningSum with its weight (e.g. $runningSum += 9),
         * then if the $randNum that was picked randomly from 1-50 is less or equal than the $runningSum (e.g. 3 <= 9),
         * then it will assign that currently rolled tier into the $rolledTier and break
         */
        $totalWeight = array_sum($weightedTiers);
        $randNum = rand(1, $totalWeight);
        $runningSum = 0;
        $rolledTier = null;

        foreach ($weightedTiers as $currentTier => $weight) {
            $runningSum += $weight;
            if ($randNum <= $runningSum) {
                $rolledTier = $currentTier;
                break;
            }
        }

        // gets a random job from the $jobsByTier which tier bases on the $rolledTier
        $job = $jobsByTier[$rolledTier]->random();

        return [
            'tier' => $rolledTier,
            'job' => $job,
        ];
    }
}
