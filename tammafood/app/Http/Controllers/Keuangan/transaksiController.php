<?php

namespace App\Http\Controllers\Keuangan;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class transaksiController extends Controller
{
    public function index(){
    	return view('/master/datatransaksi/transaksi');
    }
}
