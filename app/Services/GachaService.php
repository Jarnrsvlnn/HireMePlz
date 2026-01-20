<?php

namespace App\Services;

use App\Actions\Gacha\GetBannerJobs;
use App\Actions\Gacha\ObtainJob;
use App\Models\GachaPity;
use App\Models\User;

class GachaService
{

    public function __construct(private GetBannerJobs $bannerJobs, private ObtainJob $obtainJob)
    {}

    public function pull(User $user, string $bannerKey, int $multiplier = 1) 
    {

        // get the banner 
        $banner = config("gacha.banners.$bannerKey") ?? config('gacha.banners.limited');

        // get the allowed jobs
        $jobs = ($this->bannerJobs)($banner)->groupBy('job_tier');

        // get tiers config
        $tiers = config('gacha.tiers');

        /**
         * array_keys gets all the keys from the tiers assoc. array from the config file,
         * $jobs->keys() gets all the keys from the $jobs array then converts all of those key into an array,
         * array_intersect then will contain all of the keys that match between the two array parameters
         */
        $availableTiers = array_intersect(array_keys($tiers), $jobs->keys()->toArray()); 

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
        $pulledJobs = [];
        $maxPity = config("gacha.pity.$bannerKey.after", 60);
        $pityTier = config("gacha.pity.$bannerKey.min_tier", 'Godlike');
        $pity = $this->getPity($user, $bannerKey);


        for ($i = 0; $i < $multiplier; $i++) {
        
            // RESET per pull
            $randNum = rand(1, $totalWeight);
            $runningSum = 0;
            $rolledTier = null;
            $forcePity = $pity->count >= $maxPity;
    
            if ($forcePity) {
                $rolledTier = $pityTier;
            } 
            else {
                foreach ($weightedTiers as $currentTier => $weight) {
                    $runningSum += $weight;
                    if ($randNum <= $runningSum) {
                        $rolledTier = $currentTier;
                        break;
                    }
                }
            }

            if (! isset($jobs[$rolledTier])) {
                continue;
            }
            
            if ($rolledTier === $pityTier) {
                $pity->update(['count' => 0]);
            } else {
                $pity->increment('count');
            }

            $pulledJobs[] = $jobs[$rolledTier]->random();
        }

        ($this->obtainJob)($user, $pulledJobs);
        
        return [
            'job' => $pulledJobs,
        ];
    }

    public function getPity(User $user, string $bannerKey): GachaPity 
    {
        return GachaPity::firstOrCreate(
            ['user_id' => $user->id, 'banner_key' => $bannerKey],
            ['count' => 0]
        );
    }
}
