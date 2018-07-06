<?php

namespace App\Http\Controllers\Penjualan;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use DB;
use Response;
use App\Http\Requests;
use Illuminate\Http\Request;
use DataTables;
use URL;

// use App\mmember

class LaporanGrosirController extends Controller
{
  public function index()
  {
    return view('/penjualan/laporangrosir/index');
  }

  public function getDataLaporan($tgl1, $tgl2)
  {
    $y = substr($tgl1, -4);
    $m = substr($tgl1, -7,-5);
    $d = substr($tgl1,0,2);
    $tanggal1 = $y.'-'.$m.'-'.$d;

    $y2 = substr($tgl2, -4);
    $m2 = substr($tgl2, -7,-5);
    $d2 = substr($tgl2,0,2);
    $tanggal2 = $y2.'-'.$m2.'-'.$d2;

    $data = DB::table('d_sales_dt')
                ->select('d_sales_dt.*', 'd_sales.*', 'm_item.i_name', 'm_item.i_code', 'm_satuan.m_sname', 'm_customer.c_name')
                ->join('d_sales','d_sales_dt.sd_sales','=','d_sales.s_id')
                ->join('m_item','d_sales_dt.sd_item','=','m_item.i_id')
                ->join('m_satuan','m_item.i_sat1','=','m_satuan.m_sid')
                ->join('m_customer','d_sales.s_customer','=','m_customer.c_id')
                ->where('d_sales.s_channel', '=', "GR")
                ->whereBetween('d_sales.s_date', [$tanggal1, $tanggal2])
                ->orderBy('d_sales_dt.sd_item', 'DESC')
                ->get();

    //dd($data);

    /*return response()->json([
        'status' => 'sukses',
        'data' => $data
    ]);*/

    return DataTables::of($data)
    ->editColumn('nama', function ($data)
    {
       return $data->i_code.' - '.$data->i_name;
    })
    ->editColumn('kurs', function ($data)
    {
       return '1';
    })
    ->make(true);
  }

}


