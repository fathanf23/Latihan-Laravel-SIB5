<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LihatNilaiController extends Controller
{
    public function dataMahasiswa(){
        $mhs1 = 'Fathan'; $asal1 = 'Kuningan';
        $mhs2 = 'Dhini'; $asal2 = 'Bojong';
        return view('coba.data', compact('mhs1','mhs2','asal1','asal2'));
    }
}
