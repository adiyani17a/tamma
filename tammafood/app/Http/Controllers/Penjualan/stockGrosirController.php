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
use Illuminate\Support\Facades\Route;

class stockGrosirController extends Controller
{
  public function tableStock(Request $request){
    if($request->numberload=='')
      $request->numberload=10;
    $stock=m_item::leftjoin('d_stock',function($join){
        $join->on('i_id', '=', 's_item');        
        $join->on('s_comp', '=', 's_position');                
        $join->on('s_comp', '=',DB::raw("'7'"));           
    })    
    ->where('i_type', '=',DB::raw("'BJ'"))
    ->orWhere('i_type', '=',DB::raw("'BP'"))   
    ->orderBy('i_name')
    ->paginate($request->numberload);    
    

       if ($request->ajax()) {
            return view('penjualan.POSgrosir.StokGrosir.table-stock', compact('stock'));

        }
        
    return view('penjualan.POSgrosir.StokGrosir.stock',compact('stock'));
  }

}




