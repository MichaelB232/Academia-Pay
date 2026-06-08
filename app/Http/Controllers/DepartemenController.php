<?php

namespace App\Http\Controllers;

use App\Models\Departemen;
use Illuminate\Http\Request;

// | HTTP      | URL                 | Controller | Nama Route       |
// | --------- | ------------------- | ---------- | ---------------- |
// | GET       | /products           | index()    | products.index   |
// | GET       | /products/create    | create()   | products.create  |
// | POST      | /products           | store()    | products.store   |
// | GET       | /products/{id}      | show()     | products.show    |
// | GET       | /products/{id}/edit | edit()     | products.edit    |
// | PUT/PATCH | /products/{id}      | update()   | products.update  |
// | DELETE    | /products/{id}      | destroy()  | products.destroy |


class DepartemenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $departements = Departemen::all();
        return view('departemen.index', compact('departements'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request) {}

    /** 
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(["nama_departemen" => 'required']);
        Departemen::create([
            'nama_departemen' => "nama_departemen"
        ]);
        return redirect('/departemens')->with('success', "Departemen berhasil ditambahkan");
    }

    /**
     * Display the specified resource.
     */
    public function show(departemen $departemen)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(departemen $departemen)
    {
        // return view('departemen.edit',)
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, departemen $departemen)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(departemen $departemen)
    {
        //
    }
}
