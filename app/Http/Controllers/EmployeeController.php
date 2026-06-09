<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use Illuminate\Validation\Rule;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() //Menampilkan semua data
    {
        $employees = Employee::all();
        return view('pages.daftar-karyawan.index', compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() //Menampilkan bagian create daftar karyawan
    {
        //
        return view('pages.daftar-karyawan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'niy'=>'required|unique:employees,niy'
        ]);

        Employee::create([
            'nama_karyawan'=>$request->nama_karyawan,
            'niy'=>$request->niy,
            'position_id'=>$request->position_id
        ]);
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
        return view('pages.daftar-karyawan.edit',compact('employee'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $employee = Employee::findOrFail($id);
        
        $request->validate([
            'niy'=>['required',Rule::unique('employees')->ignore($employee->id)]
        ]);
        $employee->update([
            'nama_karyawan'=>$request->nama_karyawan,
            'niy'=>$request->niy,
            'position_id'=>$request->position_id,
            'gaji_pokok'=>$request->gaji_pokok
        ]);
        return redirect()->route('daftar-karyawan.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $employee = Employee::findOrFail($id);
        $employee->delete();

        return redirect()->route('daftar-karyawan.index');
    }

        public function search(Request $request){
        $query = Employee::query();

        if($request->filled('nama_karyawan')){
            $query->where('nama_karyawan','like',"%{$request->nama_karyawan}%");
        }
        if($request->filled('niy')){
            $query->where('niy','like',"%{$request->niy}%");
        }
        return $query->get();
    }

}
