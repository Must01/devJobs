<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Http\Requests\UpdateJobRequest;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jobs = Job::latest()->with(['employer', 'tags'])->get()->groupBy('featured');

        return view('jobs.index', [
            'featuredJobs' => $jobs->get(1, collect()),
            'jobs' => $jobs->get(0, collect()),
            'tags' => Tag::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('jobs.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $attributes = $request->validate([
            'title' => ['required', 'max:255'],
            'salary' => ['required', 'max:255'],
            'location' => ['required', 'max:255'],
            'schedule' => ['required', Rule::in(['Part Time', 'Full Time'])],
            'url' => ['required', 'active_url'],
            'description' => ['nullable', 'max:5000'],
            'tags' => ['nullable']
        ]);

        $attributes['featured'] = $request->has('featured');

        $job = Auth::user()->employer->jobs()->create(Arr::except($attributes, 'tags'));

        if ($attributes['tags'] ?? false) {
            foreach (explode(',', $attributes['tags']) as $tag) {
                $job->tag(trim($tag));
            }
        }

        return redirect('/')->with('success', 'Job posted successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Job $job)
    {
        $job->load(['employer', 'tags']);
        return view('jobs.show', compact('job'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Job $job)
    {
        // Ensure user can only edit their own jobs
        if ($job->employer_id !== Auth::user()->employer->id) {
            abort(403);
        }

        return view('jobs.edit', compact('job'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Job $job)
    {
        // Ensure user can only update their own jobs
        if ($job->employer_id !== Auth::user()->employer->id) {
            abort(403);
        }

        $attributes = $request->validate([
            'title' => ['required', 'max:255'],
            'salary' => ['required', 'max:255'],
            'location' => ['required', 'max:255'],
            'schedule' => ['required', Rule::in(['Part Time', 'Full Time'])],
            'url' => ['required', 'active_url'],
            'description' => ['nullable', 'max:5000'],
            'tags' => ['nullable']
        ]);

        $attributes['featured'] = $request->has('featured');

        $job->update(Arr::except($attributes, 'tags'));

        // Sync tags
        $job->tags()->detach();
        if ($attributes['tags'] ?? false) {
            foreach (explode(',', $attributes['tags']) as $tag) {
                $job->tag(trim($tag));
            }
        }

        return redirect('/dashboard')->with('success', 'Job updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Job $job)
    {
        // Ensure user can only delete their own jobs
        if ($job->employer_id !== Auth::user()->employer->id) {
            abort(403);
        }

        $job->tags()->detach();
        $job->delete();

        return redirect('/dashboard')->with('success', 'Job deleted successfully!');
    }
}
