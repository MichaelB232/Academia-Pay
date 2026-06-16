<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDepartmentRequest;
use App\Http\Requests\UpdateDepartementRequest;
use App\Models\Departement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

// | HTTP      | URL                 | Controller | Nama Route       |
// | --------- | ------------------- | ---------- | ---------------- |
// | GET       | /products           | index()    | products.index   |
// | GET       | /products/create    | create()   | products.create  |
// | POST      | /products           | store()    | products.store   |
// | GET       | /products/{id}      | show()     | products.show    |
// | GET       | /products/{id}/edit | edit()     | products.edit    |
// | PUT/PATCH | /products/{id}      | update()   | products.update  |
// | DELETE    | /products/{id}      | destroy()  | products.destroy |


class DepartementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $departements = Departement::all();
        return view('departement.index', compact('departements'), ['pageTitle' => 'Department']);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        return view('pages.master-data.departement.create', ['pageTitle' => "Master Data"]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreDepartmentRequest $request)
    {
        $data = $request->validated();
        $lock_key = 'submit_lock' . Auth::id() . '_' . md5($request->nama_departement);
        $lock = Cache::lock($lock_key, 5);
        if (!$lock->get()) {
            return redirect()->route('master-data.index');
        }
        try {
            Departement::create(
                $data
            );
            return redirect()->route('master-data.index')->with('success', "Departement berhasil ditambahkan");
        } finally {
            $lock->release();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(departement $departement)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $departement = Departement::findOrFail($id);
        return view('pages.master-data.departement.edit', compact('departement'), ['pageTitle' => "Master Data"]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDepartementRequest $request, string $id)
    {
        $data = $request->validated();
        $lock_key = 'submit_lock' . Auth::id() . '_' . md5($request->nama_departement);
        $lock = Cache::lock($lock_key, 5);
        if (!$lock->get()) {
            return redirect()->route('master-data.index');
        }
        try {
            Departement::where('id', $id)->update(['nama_departement' => $data['nama_departement']]);
            return redirect()->route('master-data.index')->with('Success', "Departement berhasil di edit");
        } finally {
            $lock->release();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(departement $departement)
    {
        //
    }
}
