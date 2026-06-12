<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePositionRequest;
use App\Http\Requests\UpdatePositionRequest;
use App\Models\Departement;
use App\Models\Position;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class PositionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $departements = Departement::all();
        return view('pages.master-data.position.create', compact('departements'), ['pageTitle' => "Master Data"]);
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePositionRequest $request)
    {
        $lock_key = 'submit_lock' . Auth::id() . '_' . md5($request->nama_jabatan);
        $lock = Cache::lock($lock_key, 5);
        if (!$lock->get()) {
            return redirect()->route('master-data.index');
        }
        try {
            Position::create(['nama_jabatan' => $request->nama_jabatan, 'departement_id' => $request->departement_id, 'nominal_tunjangan' => $request->nominal_tunjangan]);
            return redirect()->route('master-data.index')->with('success', "Jabatan berhasil ditambahkan");
        } finally {
            $lock->release();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id) {}

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $position = Position::findOrFail($id);
        $departements = Departement::all();
        return view('pages.master-data.position.edit', compact('position', 'departements'), ['pageTitle' => "Master Data"]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePositionRequest $request, string $id)
    {
        $position = Position::where('id', $id);
        $lock_key = 'submit_lock' . Auth::id() . '_' . md5($request->nama_jabatan);
        $lock = Cache::lock($lock_key, 5);
        $data = $request->validated();
        if (!$lock->get()) {
            return redirect()->route('master-data.index');
        }
        try {
            $position->update($data);
            return redirect()->route('master-data.index')->with('success', "Jabatan berhasil di edit");
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
    }
}
