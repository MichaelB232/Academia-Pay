<?php

namespace App\Http\Controllers;

use App\Models\Departement;
use App\Models\Position;

class MasterDataController extends Controller
{
    public function index()
    {
        $departements = Departement::all();
        $positions = Position::all();
        return view('pages.master-data.index', compact('departements', 'positions'), ['pageTitle' => "Master Data"]);
    }
}
