<?php

namespace App\Http\Controllers;

use App\Actions\Gacha\GetBannerJobs;
use App\Services\GachaService;
use Illuminate\Http\Request;

class GachaController extends Controller
{
    public function index(Request $request, GetBannerJobs $bannerJobs, GachaService $gacha)
    {
        // getting the banner and the jobs that can be obtained within
        $bannerSection = $request->query('banner', 'limited');
        $banner = config("gacha.banners.$bannerSection") ?? config("gacha.banners.limited");
        $jobs = $bannerJobs($banner);

        $multiplier = $request->query('multi', 1);

        $pulls = $gacha->pull($request->user(), $bannerSection, $multiplier)['job'];

        return view('gacha.index', compact('banner', 'pulls'));
    }
}   
