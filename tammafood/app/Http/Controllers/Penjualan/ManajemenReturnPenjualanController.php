<?php

namespace App\Http\Controllers\Penjualan;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use Carbon\Carbon;
use DataTables;
use Response;
use URL;
use DB;
use App\d_sales_returndt;
use App\d_sales;


class ManajemenReturnPenjualanController extends Controller
{
  public function tabel(){
  	return 'd';
  }

  public function newreturn(){

  	return view('Penjualan.manajemenreturn.return-pembelian');
  }

  public function cariNotaSales(Request $request){
  	$formatted_tags = array();
    $term = trim($request->q);
    if (empty($term)) {
      $sup = d_sales::where('s_status','=','FN')->limit(5)->get();
      foreach ($sup as $val) {
          $formatted_tags[] = ['id' => $val->s_id, 'text' => $val->s_note];
      }
      return Response::json($formatted_tags);
    }
    else
    {
      $sup = d_sales::where('s_status','=','FN')->where('s_note', 'LIKE', '%'.$term.'%')->limit(5)->get();
      foreach ($sup as $val) {
          $formatted_tags[] = ['id' => $val->s_id, 'text' => $val->s_note];
      }

      return Response::json($formatted_tags);  
    }

  }
}
