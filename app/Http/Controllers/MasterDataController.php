<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Departemen;

class MasterDataController extends Controller
{
    public function index()
    {
        return redirect('master-data');
    }
}
