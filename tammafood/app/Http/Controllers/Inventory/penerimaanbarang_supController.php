<?php

namespace App\Http\Controllers\Inventory;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Http\Request;
use Carbon\Carbon;
use DB;
use DataTables;
use App\d_delivery_order;
use App\d_delivery_orderdt;

class penerimaanbarang_supController extends Controller
{
	public function suplier()
	{
		$nota = DB::table('d_purchasingplan')->get();
		return view('inventory/p_suplier/suplier',compact('nota'));
	}
	public function create_suplier(Request $request)
	{
		$data_header = DB::table('d_supplier')->join('d_purchasingplan','d_purchasingplan.d_pcsp_sup','=','d_supplier.s_id')->first();
		json_encode($data_header);
		$data_seq = DB::table('d_purchasingplan_dt')->join('m_item','m_item.i_id','=','d_purchasingplan_dt.d_pcspdt_item')->get();

		return view('inventory/p_suplier/create_suplier',compact('data_header','data_seq'));
	}


}