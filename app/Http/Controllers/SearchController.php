<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $searchTerm = $request->get('q');
        $location = $request->get('location');
        $schedule = $request->get('schedule');

        $query = Job::with(['employer', 'tags']);

        if ($searchTerm) {
            $query->search($searchTerm);
        }

        if ($location) {
            $query->where('location', 'LIKE', '%' . $location . '%');
        }

        if ($schedule && in_array($schedule, ['Part Time', 'Full Time'])) {
            $query->where('schedule', $schedule);
        }

        $jobs = $query->latest()->paginate(10);

        return view('results', [
            'jobs' => $jobs,
            'searchTerm' => $searchTerm,
            'location' => $location,
            'schedule' => $schedule
        ]);
    }
}
