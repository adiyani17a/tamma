<?php 

namespace App\Http\Controllers\Penjualan;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use DB;
use Auth;
use Response;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\m_item;
use App\mMember;
use DataTables;
use Illuminate\Support\Facades\Route;

class stockGrosirController extends Controller
{
  public function tableStock(){
    $data=m_item::
      select('i_name',
             'i_type',
             'm_gname',
             's_qty')
      ->join('m_group','m_group.m_gcode','=','i_code_group')
      ->leftjoin('d_stock',function($join){
        $join->on('i_id', '=', 's_item');        
        $join->on('s_comp', '=', 's_position');                
        $join->on('s_comp', '=',DB::raw("'2'"));           
      })    
      ->where('i_type', '=',DB::raw("'BJ'"))
      ->orWhere('i_type', '=',DB::raw("'BP'"))   
      ->get();

    return DataTables::of($data)
    ->editColumn('s_qty', function ($data)  {
          if ($data->s_qty == null) {
              return '0';
          }else{
              return $data->s_qty;
          }
      })
    ->addIndexColumn()
    ->make(true);
  }

}




