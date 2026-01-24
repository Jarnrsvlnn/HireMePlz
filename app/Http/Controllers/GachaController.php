<?php

namespace App\Http\Controllers;

use App\Actions\Gacha\GetBannerPity;
use App\Services\GachaService;
use Illuminate\Http\Request;

class GachaController extends Controller
{
    public function index(Request $request, GachaService $gacha, GetBannerPity $bannerPity)
    {
        // getting the banner and the jobs that can be obtained within
        $bannerSection = $request->query('banner', 'limited');
        $banner = config("gacha.banners.$bannerSection") ?? config("gacha.banners.limited");
        $maxPity = config("gacha.pity.$bannerSection.after", 60);
        $pity = $bannerPity($request->user(), $bannerSection);
        
        if ($request->has('multi')) {
            $multiplier = (int) $request->query('multi');

            $pulls = $gacha->pull($request->user(), $bannerSection, $multiplier)['job'];
            
            return redirect()
                ->route('gacha.index', [
                    'banner' => $bannerSection,
                    'pity' => $pity,
                    'maxPity' => $maxPity
                    ])
                ->with('pulls', $pulls);
        }

        return view('gacha.index', [
            'banner' => $banner,
            'pulls' => session('pulls'),
            'pity' => $pity,
            'maxPity' => $maxPity
        ]);
    }
}