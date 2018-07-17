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

class LaporanRetailController extends Controller
{
  public function index()
  {
    return view('/penjualan/laporanretail/index');
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
                ->where('d_sales.s_channel', '=', "RT")
                ->whereBetween('d_sales.s_date', [$tanggal1, $tanggal2])
                ->orderBy('d_sales_dt.sd_item', 'DESC')
                ->get();

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
  public function print_laporan_penjualan($tgl1, $tgl2)
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
                ->where('d_sales.s_channel', '=', "RT")
                ->whereBetween('d_sales.s_date', [$tanggal1, $tanggal2])
                ->orderBy('m_item.i_name', 'd_sales.s_note')
                ->get()->toArray();
    


    $nama_array = [];

    for ($i=0; $i < count($data); $i++) { 
        $nama_array[$i] = $data[$i]->i_code;
    }


    $nama_array = array_unique($nama_array);

    $nama_array = array_values($nama_array);

    


    $penjualan = [];

    for($j=0; $j < count($nama_array);$j++){
        $array = array();
        $penjualan[$j] = $array;

        for ($k=0; $k < count($data); $k++) {
            if ($nama_array[$j]==$data[$k]->i_code) {
                
                array_push($penjualan[$j], $data[$k]);
            }
        }


    }
            // dd($penjualan);

    return view('penjualan/laporanretail/print_laporan_penjualan', compact('data', 'tgl1', 'tgl2', 'penjualan', 'nama_array'));
  }
}


