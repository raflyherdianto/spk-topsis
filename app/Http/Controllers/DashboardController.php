<?php

namespace App\Http\Controllers;

use App\Models\Kriteria;
use App\Models\Alternatif;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        return view('dashboard.index', [
            'title' => 'Dashboard',
            'alternatifs' => Alternatif::all(),
            'kriterias' => Kriteria::all(),
        ]);
    }
}
