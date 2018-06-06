<?php

namespace App\Http\Controllers\Pembelian;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Http\Request;
use Carbon\Carbon;
use DB;
use DataTables;
use App\d_purchasing;
use App\d_purchasing_dt;

class OrderPembelianController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function order()
    {
        return view('purchasing/orderpembelian/index');
    }

    public function tambah_order()
    {
        return view ('/purchasing/orderpembelian/tambah_order');
    }

    public function getDataTabelIndex()
    {
        $data = d_purchasing::join('d_supplier','d_purchasing.s_id','=','d_supplier.s_id')
                ->select('d_pcs_date','d_pcs_id','d_pcs_code','s_company','d_pcs_staff','d_pcs_method','d_pcs_net','d_pcs_date_received','d_pcs_status')
                //->where('d_pcs_status', '=', 'FN')
                ->orderBy('d_pcs_date', 'DESC')
                ->get();
        //dd($data);    
        return DataTables::of($data)
        ->addIndexColumn()
        ->editColumn('status', function ($data)
          {
          if ($data->d_pcs_status == "WT") 
          {
            return '<span class="label label-info">Waiting</span>';
          }
          elseif ($data->d_pcs_status == "FN") 
          {
            return '<span class="label label-success">Finish</span>';
          }
        })
        ->editColumn('tglOrder', function ($data) 
        {
            if ($data->d_pcs_date == null) 
            {
                return '-';
            }
            else 
            {
                return $data->d_pcs_date ? with(new Carbon($data->d_pcs_date))->format('d M Y') : '';
            }
        })
        ->editColumn('hargaTotalNet', function ($data) 
        {
             return 'Rp. '.number_format($data->d_pcs_net,0,",",".");
        })
        ->editColumn('tglMasuk', function ($data) 
        {
            if ($data->d_pcs_date_received == null) 
            {
                return '-';
            }
            else 
            {
                return $data->d_pcs_date_received ? with(new Carbon($data->d_pcs_date_received))->format('d M Y') : '';
            }
        })
        ->addColumn('action', function($data)
          {
            return '<div class="text-center">
                          <button class="btn btn-sm btn-success" title="Detail"
                              onclick=detailOrder("'.$data->d_pcs_id.'")><i class="fa fa-eye"></i> 
                          </button>
                          <button class="btn btn-sm btn-warning" title="Edit"
                              onclick=editOrder("'.$data->d_pcs_id.'")><i class="glyphicon glyphicon-edit"></i>
                          </button>
                          <button class="btn btn-sm btn-danger" title="Dele"
                              onclick=deleteOrder("'.$data->d_pcs_id.'")><i class="glyphicon glyphicon-trash"></i>
                          </button>
                      </div>'; 
          })
        ->rawColumns(['status', 'action'])
        ->make(true);
    }

    public function getDataDetail($id)
    {
        $dataHeader = d_purchasing::join('d_supplier','d_purchasing.s_id','=','d_supplier.s_id')
                ->select('d_pcs_date',
                         'd_pcs_id',
                         'd_pcs_code',
                         'd_pcs_staff',
                         's_company',
                         's_name',
                         'd_pcs_method',
                         'd_pcs_disc_gross',
                         'd_pcs_disc_value',
                         'd_pcs_tax',
                         'd_pcs_net',
                         'd_pcs_date_received',
                         'd_pcs_status'
                )
                ->where('d_pcs_id', '=', $id)
                ->orderBy('d_pcs_date', 'DESC')
                ->get();

        foreach ($dataHeader as $val) 
        {
            $data = array(
                'hargaBruto' => 'Rp. '.number_format($val->d_pcs_disc_gross,0,",","."),
                'nilaiDiskon' => 'Rp. '.number_format($val->d_pcs_disc_value,0,",","."),
                'nilaiPajak' => 'Rp. '.number_format($val->d_pcs_tax,0,",","."),
                'hargaNet' => 'Rp. '.number_format($val->d_pcs_net,0,",",".")
            );
        }

        $dataIsi = d_purchasing_dt::join('d_purchasing','d_purchasing_dt.d_pcs_id','=','d_purchasing.d_pcs_id')
                ->join('m_item', 'd_purchasing_dt.i_id', '=', 'm_item.i_id')
                ->select('d_purchasing_dt.d_pcsdt_id',
                         'd_purchasing_dt.d_pcs_id',
                         'd_purchasing_dt.i_id',
                         'm_item.i_name',
                         'd_purchasing_dt.d_pcsdt_qty',
                         'd_purchasing_dt.d_pcsdt_price',
                         'd_purchasing_dt.d_pcsdt_total'
                )
                ->where('d_purchasing_dt.d_pcs_id', '=', $id)
                
                ->orderBy('d_purchasing_dt.d_pcsdt_created', 'DESC')
                ->get();

        foreach ($dataIsi as $val) 
        {
            //cek item type
            $itemType[] = DB::table('m_item')->select('i_type', 'i_id')->where('i_id','=', $val->i_id)->first();
        }

        //ambil value stok by item type
        foreach ($itemType as $val) 
        { 
            if ($val->i_type == "BP") //brg produksi
            {
                $query = DB::select(DB::raw("SELECT IFNULL( (SELECT s_qty FROM d_stock where s_item = '$val->i_id' AND s_comp = '6' AND s_position = '6' limit 1) ,'0') as qtyStok"));
                $stok[] = $query[0];
            }
            elseif ($val->i_type == "BJ") //brg jual
            {
                $query = DB::select(DB::raw("SELECT IFNULL( (SELECT s_qty FROM d_stock where s_item = '$val->i_id' AND s_comp = '7' AND s_position = '7' limit 1) ,'0') as qtyStok"));
                $stok[] = $query[0];
            }
            elseif ($val->i_type == "BB") //bahan baku
            {
                $query = DB::select(DB::raw("SELECT IFNULL( (SELECT s_qty FROM d_stock where s_item = '$val->i_id' AND s_comp = '3' AND s_position = '3' limit 1) ,'0') as qtyStok"));
                $stok[] = $query[0];
            }
        }
        
        return response()->json([
            'status' => 'sukses',
            'header' => $dataHeader,
            'header2' => $data,
            'data_isi' => $dataIsi,
            'data_stok' => $stok
        ]);
    }

    public function konvertRp($value)
    {
        $value = str_replace(['Rp', '\\', '.', ' '], '', $value);
        return str_replace(',', '.', $value);
    }
}
