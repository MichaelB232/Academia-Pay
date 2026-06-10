<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Employee;
use App\Models\Payroll;
use App\Models\Period;
class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $totalEmployee = Employee::count(); //Total staff

        $month = request('month', now()->month);
        $year = request('year', now()->year);

        $period_id = 1; //Mengambil id dari periode bulan dan tahun tersebut

        if(!$period_id){
            return view('dashboard',([ 'user'=>$user,'payrollSummary'=>0,'unpaidEmployees'=>collect(),'totalEmployee'=>$totalEmployee,'totalUnpaidEmployees'=>0]));
        }

        $payrollSummary = Payroll::where('status','belum_dibayar')
            ->where('period_id',$period_id)->sum('gaji_bersih'); //Total Gaji bulan ini yang sudah dihitung tapi belum dibayar

        $baseQuery = Payroll::with('employee')->where('status','belum_dibayar')->where('period_id',$period_id);

        $unpaidEmployees = $baseQuery->get(); // Daftar karyawan yang belum dibayar gajinya
        $totalUnpaidEmployees = $baseQuery->count();  // Daftar karyawan yang belum dibayar (namun sudah dihitung)

        return view('dashboard', compact('user','payrollSummary','unpaidEmployees','totalEmployee','totalUnpaidEmployees'));
    }
}
