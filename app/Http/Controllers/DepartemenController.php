<?php

namespace App\Http\Controllers;

use App\Models\Departement;
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


class DepartementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $departements = Departement::all();
        return view('departement.index', compact('departements'));
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
        $request->validate(["nama_departement" => 'required']);
        Departement::create([
            'nama_departement' => "nama_departement"
        ]);
        return redirect('/departements')->with('success', "Departement berhasil ditambahkan");
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
    public function edit(departement $departement)
    {
        // return view('departemen.edit',)
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, departement $departement)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(departement $departement)
    {
        //
    }
}
