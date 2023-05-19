<?php

namespace App\Http\Controllers;

use App\Models\MataKuliahModel;
use Illuminate\Http\Request;

class MataKuliahController extends Controller
{
    public function index() {
        $matkul = MataKuliahModel::all();
        return view('mata-kuliah')
            ->with('matkul',$matkul);
    }
}