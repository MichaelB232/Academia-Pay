<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEmployeeRequest;
use App\Http\Requests\UpdateEmployeeRequest;
use App\Models\Departement;
use App\Models\Employee;
use App\Models\Position;
use App\Services\EmployeeService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Validation\Rule;


class EmployeeController extends Controller
{
    private EmployeeService $employeeService;
    public function __construct(EmployeeService $employeeService)
    {
        $this->employeeService = $employeeService;
    }

    public function index(Request $request) //Menampilkan semua data
    {
        $user = Auth::user();
        $departements = Departement::all();

        $query = Employee::query()->with(['position.departement']);

        //Search by nama_karyawan or NIY
        if ($request->filled('search')) {
            $search = $request->search;

            $query->where(function ($q) use ($search) {
                $q->where('nama_karyawan', 'like', "%{$search}%")->orWhere('niy', 'like', "%{$search}%");
            });
        }
        //Filter by Departement
        if ($request->filled("departement_id")) {
            $departement_id = $request->departement_id;

            $query->whereHas('position', function ($q) use ($departement_id) {
                $q->where('departement_id', $departement_id);
            });
        }

        $employees = $query->latest()->paginate(10)->withQueryString();
        return view('pages.daftar-karyawan.index', compact('employees', 'user', 'departements'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() //Menampilkan bagian create daftar karyawan
    {
        $departements = Departement::all();
        $positions = Position::all()->groupBy('departement_id');
        return view('pages.daftar-karyawan.create', compact(['departements', 'positions']));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEmployeeRequest $request)
    {
        $lockKey = 'submit_lock' . Auth::id() . '_' . md5($request->niy);
        $lock = Cache::lock($lockKey, 5);

        if (!$lock->get()) {
            return redirect()->route('daftar-karyawan.index');
        }
        try {
            $this->employeeService->create($request->validated());
            return redirect()->route('daftar-karyawan.index')->with('success', 'Data karyawan berhasil ditambahkan');
        } finally {
            $lock->release();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
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
        $departements = Departement::all();
        $positions = Position::all()->groupBy('departement_id');
        return view('pages.daftar-karyawan.edit', compact('employee', 'departements', 'positions'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEmployeeRequest $request, string $id)
    {
        //
        $employee = Employee::findOrFail($id);
        $lockKey = 'submit_lock' . Auth::id() . '_' . md5($request->niy);
        $lock = Cache::lock($lockKey, 5);
        if (!$lock->get()) {
            return redirect()->route('daftar-karyawan.index');
        }
        try {
            $this->employeeService->update($employee, $request->validated());
            return redirect()->route('daftar-karyawan.index')->with('success', 'Data Karyawan berhasil di update');
        } finally {
            $lock->release();
        }
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
