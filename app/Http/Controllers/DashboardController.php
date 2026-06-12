<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Employee;
use App\Models\Payroll;
use App\Services\PeriodService;

class DashboardController extends Controller
{
    public function index(PeriodService $periodService)
    {

        $user = Auth::user();

        $total_employees = Employee::count(); //Total staffs

        $month = request('month', now()->month);
        $year = request('year', now()->year);

        $current_period = $periodService->ensureCurrentPeriodExists()->id;
        // $current_period_id = $current_period->id;

        // if(!$current_period){
        //     return view('dashboard',([ 'user'=>$user,'payroll_summary'=>0,'unpaid_employees'=>collect(),'total_employee'=>$total_employee,'total_unpaid_employees'=>0]));
        // }

        // $payroll_summary = Payroll::where('status', 'belum_dibayar')
        //     ->where('period_id', $current_period)->sum('gaji_bersih');
        $payroll_summary = Payroll::where('status', 'belum_dibayar')->where('period_id', $current_period)->selectRaw('SUM(gaji_pokok + total_tunjangan - total_potongan) as gaji_bersih')->first(); //Total Gaji bulan ini yang sudah dihitung tapi belum dibayar
        $base_query = Payroll::with('employee')->where('status', 'belum_dibayar')->where('period_id', $current_period);

        $unpaid_employees = $base_query->paginate(5)->withQueryString(); // Daftar karyawan yang belum dibayar gajinya
        $total_unpaid_employees = $base_query->count();  // Daftar karyawan yang belum dibayar (namun sudah dihitung)

        return view('pages/dashboard', compact('user', 'payroll_summary', 'unpaid_employees', 'total_employees', 'total_unpaid_employees'), ['pageTitle' => 'Dashboard']);
    }
}
