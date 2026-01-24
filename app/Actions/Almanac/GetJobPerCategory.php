<?php

namespace App\Actions\Almanac;

use App\Models\Job;
use Illuminate\Http\Request;

class GetJobPerCategory {

    public function __invoke(Request $request)
    {
        $sortMethod = $request->query('sort');
        $category = $request->query('category');

        if($request->user()->isAdmin()) 
        {
            $query = Job::query();
        }
        else 
        {
            $query = $request->user()->jobs()->select('jobs.id', 'jobs.job_title', 'jobs.salary', 'jobs.description', 'jobs.job_tier');
        }    

        if($category) 
        {
            $query->where('jobs.category', $category);
        }
        
        $query = $this->sortItems($sortMethod, $query);

        return $query
            ->paginate(16)
            ->withQueryString();
    }

    private function sortItems($sortMethod, $query)
    {
        switch($sortMethod) 
        {
            case 'newest':
                $query->orderBy('created_at', 'desc');
                break;
            case 'oldest':
                $query->orderBy('created_at', 'asc');
                break;
            case 'tier':
                $query->orderByRaw("
                    CASE job_tier
                        WHEN 'Godlike' THEN 1
                        WHEN 'Legendary' THEN 2
                        WHEN 'Epic' THEN 3
                        WHEN 'Kinda mid' THEN 4
                        WHEN 'Uncommon' THEN 5
                        WHEN 'Common' THEN 6
                    END
                ");
                break;
            default:
                $query->latest();
                break;
        }

        return $query;
    }
}
