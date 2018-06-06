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


        $id = DB::table('d_rencana_penjualan')->max('rp_id')+1;
      

    	
        return view('/penjualan/rencanapenjualan/tambah_rencana',compact('id'));
    }

    public function datatable_rencana1()
    {
    	$data = DB::table('m_item')
    			  ->leftjoin('d_stock','s_item','=','i_id')
    			  ->where('i_group','BARANG DAGANGAN')
    			  ->get();

    	for ($i=0; $i < count($data); $i++) { 
    		if ($data[$i]->s_qty == null) {
    			$data[$i]->s_qty = 0;
    		}
    	}

      
	    // return $data;
	    $data = collect($data);
	    // return $data;
	    return Datatables::of($data)
	                    ->addColumn('aksi', function ($data) {
	                    	$a = '<button class="btn btn-warning" onclick="edit(\''.$data->s_id.'\')"><i class="fa fa-pencil">Edit</i></button>';
	                    	$b = '<button class="btn btn-danger" onclick="hapus(\''.$data->s_id.'\')"><i class="fa fa-pencil">Edit</i></button>';
	                    	return $a . $b;
	                    })
	                    ->addColumn('target_penjualan', function ($data) {
	                    	
	                    	$a ='<input type="text" onkeyup="target_qty(this)" value="1" class="target_qty form-control" name="target_qty">';
	                    	$b ='<input type="hidden" class="i_id form-control" name="i_id" value="'.$data->i_id.'">';
	                    	return $a . $b;
	                    })
	                    ->addColumn('target_pendapatan', function ($data) {
	                    	
	                    	return '<input readonly type="text" class="target_value form-control" name="target_value">';
	                    })
	                    ->rawColumns(['aksi','target_penjualan','target_pendapatan'])
	                    ->addIndexColumn()
	                    ->make(true);
	}

	public function save_item(request $req)
	{
		
	}


}
