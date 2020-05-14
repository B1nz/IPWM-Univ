<?php

namespace App\Http\Controllers;

use App\Barang;
use App\Fakultas;
use App\Jurusan;
use App\Ruangan;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index() {

        $fakultas = Fakultas::all()->count();
        $jurusan = Jurusan::all()->count();
        $ruangan = Ruangan::all()->count();
        $barang = Barang::all()->count();

        return view('dashboard.index', compact('fakultas', 'jurusan', 'ruangan', 'barang'));

    }
}
