<?php

namespace App\Http\Controllers\Api;

use App\Models\Job;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class JobController extends Controller
{
    /**
     * Get all jobs
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $jobs = Job::all();
        return response()->json(['success' => true, 'data' => $jobs], 200);
    }

    /**
     * Store a new job
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'queue' => 'required|string',
            'payload' => 'required|string',
            'attempts' => 'required|integer',
            'reserved_at' => 'nullable|integer',
            'available_at' => 'required|integer',
            'created_at' => 'required|integer',
        ]);

        $job = Job::create($validatedData);
        return response()->json(['success' => true, 'data' => $job], 201);
    }

    /**
     * Get a single job
     *
     * @param \App\Models\Job $job
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(Job $job)
    {
        return response()->json(['success' => true, 'data' => $job], 200);
    }

    /**
     * Update an existing job
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Job $job
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, Job $job)
    {
        $validatedData = $request->validate([
            'queue' => 'required|string',
            'payload' => 'required|string',
            'attempts' => 'required|integer',
            'reserved_at' => 'nullable|integer',
            'available_at' => 'required|integer',
            'created_at' => 'required|integer',
        ]);

        $job->update($validatedData);
        return response()->json(['success' => true, 'data' => $job], 200);
    }

    /**
     * Delete a job
     *
     * @param \App\Models\Job $job
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Job $job)
    {
        $job->delete();
        return response()->json(['success' => true, 'message' => 'Job deleted successfully'], 200);
    }
}
