<?php

namespace App\Http\Controllers;

use App\Models\DisciplineAssessment;
use App\Models\Employee;
use App\Models\KpiAssessment;
use App\Services\PeriodService;
use Illuminate\Http\Request;

class KpiAssessmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(PeriodService $periodService)
    {
        $current_period = $periodService->ensureCurrentPeriodExists();
        // if (!$current_period) {
        //     return view('pages.performance-tracker.index', [
        //         'employees' => collect()->paginate(7),
        //         'avg_kpi' => 0,
        //         'avg_discipline' => 0,
        //         'total_employees' => 0,
        //         'current_period' => null,
        //         'pageTitle' => 'Performance Tracker'
        //     ]);
        // }
        $total_employees = Employee::count();
        $avg_kpi = KpiAssessment::where('period_id', $current_period->id)->avg('skor_kpi');
        $avg_discipline = DisciplineAssessment::where('period_id', $current_period->id)->avg('skor_kedisiplinan');

        $employees_assessments = Employee::with([
            'position.departement',
            'kpiAssessments' => fn($q) => $q->where('period_id', $current_period->id),
            'disciplineAssessments' => fn($q) => $q->where('period_id', $current_period->id)
        ])->paginate(10);

        return view('pages.performance-tracker.index', compact('avg_kpi', 'total_employees', 'avg_discipline', 'employees_assessments', 'current_period'), ['pageTitle' => "Performance Tracker"]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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
