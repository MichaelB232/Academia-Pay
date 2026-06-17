<?php

namespace App\Http\Controllers;

use App\Models\Departement;
use App\Models\Position;

class MasterDataController extends Controller
{
    public function index()
    {
        // 1. PASTIKAN MENGGUNAKAN PAGINATE, BUKAN ALL() ATAU GET()
        $departements = Departement::latest()
            ->paginate(5, ['*'], 'page_dept')
            ->withQueryString();

        // 2. PASTIKAN MENGGUNAKAN PAGINATE JUGA DI SINI
        $positions = Position::with('departement')
            ->latest()
            ->paginate(5, ['*'], 'page_pos')
            ->withQueryString();

        // Kirim ke view
        return view('pages.master-data.index', compact('departements', 'positions'), [
            'pageTitle' => "Master Data"
        ]);
    }
}
