<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreKpiCriteriaRequest;
use App\Http\Requests\UpdateKpiCriteriaRequest;
use App\Models\KpiCriteria;
use App\Models\Position;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class KpiCriteriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Position $position)
    {
        $kpis = KpiCriteria::where('position_id', $position->id)->orderBy('created_at')->get();
        return view('pages.master-data.kpi-criteria.index', ['pageTitle' => "Manajemen KPI Jabatan"], compact('position', 'kpis'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Position $position)
    {
        //
        return view('pages.master-data.kpi-criteria.create', compact('position'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreKpiCriteriaRequest $request)
    {
        $data = $request->validated();

        $lockKey = 'submit_lock_' . Auth::id() . '_' . md5($data['nama_kriteria']);
        $lock = Cache::lock($lockKey, 5);

        if (!$lock->get()) {
            return redirect()->route(
                'kpi-criteria.position',
                $data['position_id']
            );
        }

        try {

            KpiCriteria::create([
                'position_id'      => $data['position_id'],
                'nama_kriteria'    => $data['nama_kriteria'],
                'deskripsi'        => $data['deskripsi'],
                'bobot'            => $data['bobot'],
                'metode_ukur'      => $data['metode_ukur'],
                'jenis_tunjangan'  => $data['jenis_tunjangan'],
            ]);

            return redirect()
                ->route('kpi-criteria.position', $data['position_id'])
                ->with('success', 'Criteria KPI berhasil ditambahkan');
        } finally {
            $lock->release();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $kpi = KpiCriteria::findOrFail($id);
        return view('pages.master-data.kpi-criteria.edit', compact('kpi'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateKpiCriteriaRequest $request, string $id)
    {
        $data = $request->validated();

        $kpi = KpiCriteria::findOrFail($id);

        $lockKey = 'submit_lock_' . Auth::id() . '_' . md5($request->nama_kriteria);

        $lock = Cache::lock($lockKey, 5);

        if (!$lock->get()) {
            return redirect()->route(
                'kpi-criteria.position',
                $request->position_id
            );
        }
        try {
            $kpi->update($data);
            return redirect()
                ->route('kpi-criteria.position', $kpi->position_id)
                ->with('success', 'Kriteria KPI berhasil diperbarui');
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
