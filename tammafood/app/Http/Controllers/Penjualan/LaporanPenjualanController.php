<?php

namespace App\Http\Controllers\Penjualan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use DB;
use Response;
use App\Http\Requests;
use DataTables;
use URL;


class LaporanPenjualanController extends Controller
{
	public function laporan_penjualan()
	{
		return view('penjualan/laporanpenjualan/index');
	}
    public function get_data($tgl1, $tgl2)
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
	                ->where('d_sales.s_status', '=', "FN")
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
                ->where('d_sales.s_status', '=', 'FN')
                ->whereBetween('d_sales.s_date', [$tanggal1, $tanggal2])
                ->orderBy('m_item.i_name' ,'DESC')
                ->get()->toArray();
    // SUM
    $data_sum = DB::table('d_sales_dt')
                ->select( (DB::raw('SUM(d_sales_dt.sd_total) as total_penjualan')), DB::raw('SUM(d_sales_dt.sd_qty) as total_qty'), DB::raw('SUM(d_sales_dt.sd_disc_value) as total_disc_val') )
                ->join('d_sales','d_sales_dt.sd_sales','=','d_sales.s_id')
                ->join('m_item','d_sales_dt.sd_item','=','m_item.i_id')
                ->join('m_satuan','m_item.i_sat1','=','m_satuan.m_sid')
                ->join('m_customer','d_sales.s_customer','=','m_customer.c_id')
                ->where('d_sales.s_status', '=', 'FN')
                ->whereBetween('d_sales.s_date', [$tanggal1, $tanggal2])
                ->orderBy('m_item.i_name' ,'DESC')
                ->groupBy('m_item.i_name')
                ->get()->toArray();

    $data_sum_all = DB::table('d_sales_dt')
                ->select( (DB::raw('SUM(d_sales_dt.sd_total) as total_semua_penjualan')),(DB::raw('SUM(d_sales_dt.sd_disc_vpercent) as total_semua_vdisc_penjualan')),(DB::raw('SUM(d_sales_dt.sd_disc_value) as total_semua_disc_val_penjualan')) )
                ->join('d_sales','d_sales_dt.sd_sales','=','d_sales.s_id')
                ->join('m_item','d_sales_dt.sd_item','=','m_item.i_id')
                ->join('m_satuan','m_item.i_sat1','=','m_satuan.m_sid')
                ->join('m_customer','d_sales.s_customer','=','m_customer.c_id')
                ->where('d_sales.s_status', '=', 'FN')
                ->whereBetween('d_sales.s_date', [$tanggal1, $tanggal2])
                ->orderBy('m_item.i_name' ,'DESC')
                ->get()->toArray();

    $nama_array = [];

    for ($i=0; $i < count($data); $i++) { 
        $nama_array[$i] = $data[$i]->i_code;
    }


    $nama_array = array_unique($nama_array);

    $nama_array = array_values($nama_array);


    // dd($data_sum);
    // return $data_sum_all;

    $penjualan = [];

    for($j=0; $j < count($nama_array);$j++){
        $array = array();
        $penjualan[$j] = $array;

        for ($k=0; $k < count($data); $k++) {
            if ($nama_array[$j]==$data[$k]->i_code) {
                
                array_push($penjualan[$j], $data[$k]);
            }

        }

        // $penjualan[$j] = array_chunk($penjualan[$j], 10);

    }
            // dd($penjualan);
    // return $penjualan;

    return view('penjualan/laporanretail/print_laporan_penjualan', compact('data', 'tgl1', 'tgl2', 'penjualan', 'nama_array', 'data_sum', 'data_sum_all'));
  }
}
