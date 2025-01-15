<?php

namespace App\Http\Controllers;

use App\Models\gallery;
use App\Models\project;
use App\Models\resume;
use App\Models\skill;
use App\Models\User;
use Illuminate\Http\Request;

class Dashboardcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function userindex()
    {
        $totaluser =User::count();
        $totalproject=project::count();
        $totalskills=skill::count();
        $totalimage=gallery::count();
        $totalresume=resume::count();

       $userCounts = User::selectRaw('DATE(created_at) as date, COUNT(*) as count')
        ->groupBy('date')
        ->orderBy('date')
        ->take(7) // Get the last 7 days
        ->pluck('count', 'date')
        ->toArray();

    $projectCounts = Project::selectRaw('DATE(created_at) as date, COUNT(*) as count')
        ->groupBy('date')
        ->orderBy('date')
        ->take(7)
        ->pluck('count', 'date')
        ->toArray();

    // Ensure both datasets have the same labels (dates)
    $chartLabels = array_keys(array_merge($userCounts, $projectCounts));
    $userCounts = array_values(array_replace(array_flip($chartLabels), $userCounts));
    $projectCounts = array_values(array_replace(array_flip($chartLabels), $projectCounts));

    return view('users.dashboard', [
        'totaluser' => $totaluser,
        'totalproject' => $totalproject,
        'totalskills' => $totalskills,
        'totalimage' => $totalimage,
        'totalresume' => $totalresume,
        'chartLabels' => $chartLabels,
        'userCounts' => $userCounts,
        'projectCounts' => $projectCounts,
    ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function nonuser()
    {
        return view('dashboard');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
