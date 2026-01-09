<?php

namespace App\Http\Controllers;

use App\Actions\Gacha\GetBannerJobs;
use Illuminate\Http\Request;

class GachaController extends Controller
{
    public function index(Request $request, GetBannerJobs $bannerJobs)
    {
        $bannerSection = $request->query('banner', 'limited');
        $banner = config("gacha.banners.$bannerSection") ?? config("gacha.banners.limited");
        $jobs = $bannerJobs($banner);
        
        return view('gacha.index', compact('banner', 'jobs'));
    }
}   
