<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Employee;
use Illuminate\Validation\Rule;
use App\Models\Departemen;
use App\Models\Position;
use App\Services\EmployeeService;
use App\Http\Requests\StoreEmployeeRequest;
use App\Http\Requests\UpdateEmployeeRequest;


class EmployeeController extends Controller
{
    private EmployeeService $employeeService;
    public function __construct(EmployeeService $employeeService)
    {
        $this->employeeService = $employeeService;
    }

    public function index() //Menampilkan semua data
    {
        $user = Auth::user();
        $employees = Employee::paginate(10);
        return view('pages.daftar-karyawan.index', compact('employees', 'user'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() //Menampilkan bagian create daftar karyawan
    {
        //
        $departemens = Departemen::all();
        $positions = Position::all()->groupBy('departemen_id');
        return view('pages.daftar-karyawan.create', compact(['departemens', 'positions']));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEmployeeRequest $request)
    {
        $this->employeeService->create($request->validated());
        return redirect()->route('daftar-karyawan.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $employee = Employee::findOrFail($id);

        return view('pages.daftar-karyawan.show', compact('employee'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $employee = Employee::findOrFail($id);
        $departemens = Departemen::all();
        $positions = Position::all()->groupBy('departemen_id');
        return view('pages.daftar-karyawan.edit', compact('employee', 'departemens', 'positions'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEmployeeRequest $request, string $id)
    {
        //
        $employee = Employee::findOrFail($id);
        $this->employeeService->update($employee, $request->validated());
        return redirect()->route('daftar-karyawan.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $employee = Employee::findOrFail($id);
        $this->employeeService->delete($employee);

        return redirect()->route('daftar-karyawan.index');
    }

    public function search(Request $request)
    {
        $query = Employee::query();

        if ($request->filled('nama_karyawan')) {
            $query->where('nama_karyawan', 'like', "%{$request->nama_karyawan}%");
        }
        if ($request->filled('niy')) {
            $query->where('niy', 'like', "%{$request->niy}%");
        }
        return $query->get();
    }
}
