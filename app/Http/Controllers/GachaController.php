<?php

namespace App\Http\Controllers;

use App\Actions\Gacha\GetBannerJobs;
use App\Actions\Gacha\ObtainJob;
use App\Services\GachaService;
use Illuminate\Http\Request;

class GachaController extends Controller
{
    public function index(Request $request, GetBannerJobs $bannerJobs, GachaService $gacha)
    {
        // getting the banner and the jobs that can be obtained within
        $bannerSection = $request->query('banner', 'limited');
        $banner = config("gacha.banners.$bannerSection") ?? config("gacha.banners.limited");
        
        if ($request->has('multi')) {
            $multiplier = (int) $request->query('multi');

            $pulls = $gacha->pull($request->user(), $bannerSection, $multiplier)['job'];

            return redirect()
                ->route('gacha.index', ['banner' => $bannerSection])
                ->with('pulls', $pulls);
        }

        return view('gacha.index', [
            'banner' => $banner,
            'pulls' => session('pulls')
        ]);
    }
}