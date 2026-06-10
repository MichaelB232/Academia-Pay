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

        $total_employee = Employee::count(); //Total staff

        $month = request('month', now()->month);
        $year = request('year', now()->year);

        $current_period = $periodService->ensureCurrentPeriodExists();

        // if(!$current_period){
        //     return view('dashboard',([ 'user'=>$user,'payroll_summary'=>0,'unpaid_employees'=>collect(),'total_employee'=>$total_employee,'total_unpaid_employees'=>0]));
        // }

        $payroll_summary = Payroll::where('status','belum_dibayar')
            ->where('period_id',$current_period)->sum('gaji_bersih'); //Total Gaji bulan ini yang sudah dihitung tapi belum dibayar

        $base_query = Payroll::with('employee')->where('status','belum_dibayar')->where('period_id',$current_period);

        $unpaid_employees = $base_query->get(); // Daftar karyawan yang belum dibayar gajinya
        $total_unpaid_employees = $base_query->count();  // Daftar karyawan yang belum dibayar (namun sudah dihitung)

        return view('dashboard', compact('user','payroll_summary','unpaid_employees','total_employee','total_unpaid_employees'));
    }
}
