<?php

namespace App\Http\Controllers;

use App\Models\Employer;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function index(Request $request)
    {
        $query = Employer::withCount('jobs');

        if ($search = $request->get('search')) {
            $query->where('name', 'LIKE', '%' . $search . '%');
        }

        $employers = $query->paginate(12);

        return view('companies.index', compact('employers'));
    }

    public function show(Employer $employer)
    {
        $employer->load(['jobs.tags']);

        return view('companies.show', compact('employer'));
    }
}
