<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $employer = $user->employer;

        $stats = [
            'total_jobs' => $employer->jobs()->count(),
            'featured_jobs' => $employer->jobs()->where('featured', true)->count(),
            'recent_views' => 0, // You can implement view tracking later
        ];

        $recentJobs = $employer->jobs()
            ->latest()
            ->take(5)
            ->get();

        return view('dashboard.index', compact('stats', 'recentJobs'));
    }
}
