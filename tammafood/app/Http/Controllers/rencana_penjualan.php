<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use carbon\Carbon;
use Auth;
use Yajra\Datatables\Datatables;
use DB;
class rencana_penjualan extends Controller
{
    public function index()
    {
        return view('/penjualan/rencanapenjualan/rencana');
    }

    public function datatable_rencana()
    {
    	$data = DB::table('d_rencana_penjualan')
    			  ->get();

      
	    // return $data;
	    $data = collect($data);
	    // return $data;
	    return Datatables::of($data)
	                    ->addColumn('aksi', function ($data) {
	                    	$a = '<button class="btn btn-warning" onclick="edit(\''.$data->rp_id.'\')"><i class="fa fa-pencil">Edit</i></button>';
	                    	$b = '<button class="btn btn-danger" onclick="hapus(\''.$data->rp_id.'\')"><i class="fa fa-pencil">Edit</i></button>';
	                    	return $a . $b;
	                    })
	                    ->rawColumns(['aksi'])
	                    ->addIndexColumn()
	                    ->make(true);
	}

	public function tambah_rencana()
    {

    	
        return view('/penjualan/rencanapenjualan/tambah_rencana');
    }



}
