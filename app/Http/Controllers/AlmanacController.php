<?php

namespace App\Http\Controllers;

use App\Actions\Almanac\GetJobPerCategory;
use Illuminate\Http\Request;

class AlmanacController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(GetJobPerCategory $getAllJobs, Request $request)
    {
        $category = $request->query('category');
        $jobs = null;

        if ($category) {
            $jobs = $getAllJobs($request);
        }

        return view('almanac.index', compact('jobs', 'category'));
    }
}   
