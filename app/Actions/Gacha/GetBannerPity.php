<?php

namespace App\Actions\Gacha;

class GetBannerPity {

    public function __invoke($user, string $bannerKey)
    {
        $pity = $user->gachaPities()
            ->where('banner_key', $bannerKey)
            ->first();
        
        return $pity->count ?? '0';
    }
}
