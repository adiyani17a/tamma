<?php

namespace App\Http\Controllers\Pembelian;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Response;
use DB;
use DataTables;
use App\d_purchasingplan;
use App\d_purchasingplan_dt;

class RencanaPembelianController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function rencana()
    {
        return view('/purchasing/rencanapembelian/index');
    }

    public function create()
    {
      //code plan
      $query = DB::select(DB::raw("SELECT MAX(RIGHT(d_pcsp_code,4)) as kode_max from d_purchasingplan WHERE DATE_FORMAT(d_pcsp_datecreated, '%Y-%m') = DATE_FORMAT(CURRENT_DATE(), '%Y-%m')"));
      $kd = "";

        if(count($query)>0)
        {
          foreach($query as $k)
          {
            $tmp = ((int)$k->kode_max)+1;
            $kd = sprintf("%04s", $tmp);
          }
        }
        else
        {
          $kd = "0001";
        }

        // $idPlan = $id;
        $codePlan = "ROR-".date('myd')."-".$kd;
        $namaStaff = 'Jamilah';
      
      return view('/purchasing/rencanapembelian/create' ,compact('codePlan', 'namaStaff'));
    }

    public function getDataTabelDaftar()
    {
        $data = d_purchasingplan::join('d_supplier','d_purchasingplan.d_pcsp_sup','=','d_supplier.s_id')
                ->select('d_pcsp_id','d_pcsp_code','d_pcsp_code','s_company','d_pcsp_staff','d_pcsp_status','d_pcsp_datecreated','d_pcsp_dateconfirm')
                ->orderBy('d_pcsp_datecreated', 'DESC')
                ->get();
        //dd($data);    
        return DataTables::of($data)
        ->addIndexColumn()
        ->editColumn('status', function ($data)
          {
          if ($data->d_pcsp_status == "WT") 
          {
            return '<span class="label label-info">Waiting</span>';
          }
          elseif ($data->d_pcsp_status == "DE") 
          {
            return '<span class="label label-warning">Dapat diedit</span>';
          }
          elseif ($data->d_pcsp_status == "FN") 
          {
            return '<span class="label label-success">Finish</span>';
          }
        })
        ->editColumn('tglBuat', function ($data) 
        {
            if ($data->d_pcsp_datecreated == null) 
            {
                return '-';
            }
            else 
            {
                return $data->d_pcsp_datecreated ? with(new Carbon($data->d_pcsp_datecreated))->format('d M Y') : '';
            }
        })
        ->editColumn('tglConfirm', function ($data) 
        {
            if ($data->d_pcsp_dateconfirm == null) 
            {
                return '-';
            }
            else 
            {
                return $data->d_pcsp_dateconfirm ? with(new Carbon($data->d_pcsp_dateconfirm))->format('d M Y') : '';
            }
        })
        ->addColumn('action', function($data)
          {
            return '<div class="text-center">
                          <button class="btn btn-sm btn-primary" title="Ubah Status"
                              onclick=konfirmasiPlan("'.$data->d_pcsp_id.'")><i class="fa fa-check"></i>
                          </button>
                          <button class="btn btn-sm btn-success" title="Detail"
                              onclick=detailPlan("'.$data->d_pcsp_id.'")><i class="fa fa-eye"></i> 
                          </button>
                          <button class="btn btn-sm btn-warning" title="Edit"
                              onclick=editPlan("'.$data->d_pcsp_id.'")><i class="fa fa-edit"></i>
                          </button>
                          <button class="btn btn-sm btn-danger" title="Hapus"
                              onclick=deletePlan("'.$data->d_pcsp_id.'")><i class="fa fa-times"></i>
                          </button>
                      </div>'; 
          })
        ->rawColumns(['status', 'action'])
        ->make(true);
    }

    public function getDetailPlan($id)
    {

      $dataHeader = d_purchasingplan::join('d_supplier','d_purchasingplan.d_pcsp_sup','=','d_supplier.s_id')
                                ->select('d_pcsp_id','d_pcsp_code','s_company','d_pcsp_staff','d_pcsp_status','d_pcsp_datecreated','d_pcsp_dateconfirm')
                                ->where('d_pcsp_id', '=', $id)
                                ->orderBy('d_pcsp_datecreated', 'DESC')
                                ->get();

      $statusLabel = $dataHeader[0]->d_pcsp_status;
      if ($statusLabel == "WT") 
      {
        $spanTxt = 'Waiting';
        $spanClass = 'label-info';
      }
      elseif ($statusLabel == "DE")
      {
        $spanTxt = 'Dapat Diedit';
        $spanClass = 'label-warning';
      }
      else
      {
        $spanTxt = 'Di setujui';
        $spanClass = 'label-success';
      }

      $dataIsi = d_purchasingplan_dt::join('d_purchasingplan','d_purchasingplan_dt.d_pcspdt_idplan','=','d_purchasingplan.d_pcsp_id')
                                ->join('m_item', 'd_purchasingplan_dt.d_pcspdt_item', '=', 'm_item.i_id')
                                ->select('d_purchasingplan_dt.d_pcspdt_item',
                                         'm_item.i_code',
                                         'm_item.i_name',
                                         'd_purchasingplan_dt.d_pcspdt_qty',
                                         'd_purchasingplan_dt.d_pcspdt_qtyconfirm'
                                )
                                ->where('d_purchasingplan_dt.d_pcspdt_idplan', '=', $id)
                                ->orderBy('d_purchasingplan_dt.d_pcspdt_created', 'DESC')
                                ->get();

        foreach ($dataIsi as $val) 
        {
            //cek item type
            $itemType[] = DB::table('m_item')->select('i_type', 'i_id')->where('i_id','=', $val->d_pcspdt_item)->first();
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
        
        return Response()->json([
            'status' => 'sukses',
            'header' => $dataHeader,
            'data_isi' => $dataIsi,
            'data_stok' => $stok,
            'spanTxt' => $spanTxt,
            'spanClass' => $spanClass
        ]);
    }

    public function confirmPlan($id)
    {

      $dataHeader = d_purchasingplan::join('d_supplier','d_purchasingplan.d_pcsp_sup','=','d_supplier.s_id')
                                ->select('d_pcsp_id','d_pcsp_code','s_company','d_pcsp_staff','d_pcsp_status','d_pcsp_datecreated','d_pcsp_dateconfirm')
                                ->where('d_pcsp_id', '=', $id)
                                ->orderBy('d_pcsp_datecreated', 'DESC')
                                ->get();

      $statusLabel = $dataHeader[0]->d_pcsp_status;
      if ($statusLabel == "WT") 
      {
        $spanTxt = 'Waiting';
        $spanClass = 'label-info';
      }
      elseif ($statusLabel == "DE")
      {
        $spanTxt = 'Dapat Diedit';
        $spanClass = 'label-warning';
      }
      else
      {
        $spanTxt = 'Di setujui';
        $spanClass = 'label-success';
      }

      $dataIsi = d_purchasingplan_dt::join('d_purchasingplan','d_purchasingplan_dt.d_pcspdt_idplan','=','d_purchasingplan.d_pcsp_id')
                                ->join('m_item', 'd_purchasingplan_dt.d_pcspdt_item', '=', 'm_item.i_id')
                                ->select('d_purchasingplan_dt.d_pcspdt_id',
                                         'd_purchasingplan_dt.d_pcspdt_item',
                                         'm_item.i_code',
                                         'm_item.i_name',
                                         'd_purchasingplan_dt.d_pcspdt_qty',
                                         'd_purchasingplan_dt.d_pcspdt_qtyconfirm'
                                )
                                ->where('d_purchasingplan_dt.d_pcspdt_idplan', '=', $id)
                                ->orderBy('d_purchasingplan_dt.d_pcspdt_created', 'DESC')
                                ->get();

        foreach ($dataIsi as $val) 
        {
            //cek item type
            $itemType[] = DB::table('m_item')->select('i_type', 'i_id')->where('i_id','=', $val->d_pcspdt_item)->first();
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
        
        return Response()->json([
            'status' => 'sukses',
            'header' => $dataHeader,
            'data_isi' => $dataIsi,
            'data_stok' => $stok,
            'spanTxt' => $spanTxt,
            'spanClass' => $spanClass
        ]);
    }

    public function submitConfirm(Request $request)
    {
      //dd($request->all());
      DB::beginTransaction();
      try {
        //update table d_purchasingplan
        $plan = d_purchasingplan::find($request->idPlan);
        if ($request->statusConfirm == "FN") 
        {
          $plan->d_pcsp_dateconfirm = date('Y-m-d',strtotime(Carbon::now()));
        }
        else
        {
          $plan->d_pcsp_dateconfirm = null;
        }
        
        $plan->d_pcsp_status = $request->statusConfirm;
        $plan->d_pcsp_updated = Carbon::now();
        $plan->save();

        //update table d_purchasingplan_dt
        $hitung_field = count($request->fieldIdDt);
        for ($i=0; $i < $hitung_field; $i++) 
        {
          $plandt = d_purchasingplan_dt::find($request->fieldIdDt[$i]);
          $plandt->d_pcspdt_qtyconfirm = $request->fieldConfirm[$i];
          $plandt->d_pcspdt_updated = Carbon::now();
          $plandt->save();
        } 
        
      DB::commit();
      return response()->json([
            'status' => 'sukses',
            'pesan' => 'Data Rencana Order Berhasil Diupdate'
        ]);
      } 
      catch (\Exception $e) 
      {
        DB::rollback();
        return response()->json([
            'status' => 'gagal',
            'pesan' => $e
        ]);
      }
    }

    public function getDataSupplier(Request $request)
    {
        $formatted_tags = array();
        $term = trim($request->q);
        if (empty($term)) {
            $sup = DB::table('d_supplier')->get();
            foreach ($sup as $val) {
                $formatted_tags[] = ['id' => $val->s_id, 'text' => $val->s_company];
            }
            return Response::json($formatted_tags);
        }
        else
        {
            $sup = DB::table('d_supplier')->where('s_company', 'LIKE', '%'.$term.'%')->get();
            foreach ($sup as $val) {
                $formatted_tags[] = ['id' => $val->s_id, 'text' => $val->s_company];
            }

            return Response::json($formatted_tags);  
        }
    }

    public function autocompleteBarang(Request $request)
    {
      $term = $request->term;
      $results = array();
      $queries = DB::table('m_item')
        ->where('i_name', 'LIKE', '%'.$term.'%')
        ->take(10)->get();
      
      if ($queries == null) 
      {
        $results[] = [ 'id' => null, 'label' =>'tidak di temukan data terkait'];
      } 
      else 
      {
        foreach ($queries as $val) 
        {
          //cek type barang
          if ($val->i_type == "BP") //brg produksi
          {
            //ambil stok berdasarkan type barang
            $query = DB::select(DB::raw("SELECT IFNULL( (SELECT s_qty FROM d_stock where s_item = '$val->i_id' AND s_comp = '6' AND s_position = '6' limit 1) ,'0') as qtyStok"));
            $stok = $query[0]->qtyStok;
          }
          elseif ($val->i_type == "BJ") //brg jual
          {
            //ambil stok berdasarkan type barang
            $query = DB::select(DB::raw("SELECT IFNULL( (SELECT s_qty FROM d_stock where s_item = '$val->i_id' AND s_comp = '7' AND s_position = '7' limit 1) ,'0') as qtyStok"));
            $stok = $query[0]->qtyStok;
          }
          elseif ($val->i_type == "BB") //bahan baku
          {
            //ambil stok berdasarkan type barang
            $query = DB::select(DB::raw("SELECT IFNULL( (SELECT s_qty FROM d_stock where s_item = '$val->i_id' AND s_comp = '3' AND s_position = '3' limit 1) ,'0') as qtyStok"));
            $stok = $query[0]->qtyStok;
          }

          $results[] = [ 'id' => $val->i_id, 'label' => $val->i_code .'  '.$val->i_name, 'stok' => $stok ];
        }
    }

    return Response::json($results);
    }

    public function simpanPlan(Request $request)
    {
      //dd($request->all());
      DB::beginTransaction();
      try {
        //insert to table d_purchasingplan
        $plan = new d_purchasingplan;
        $plan->d_pcsp_code = $request->kodeOrderPlan;
        $plan->d_pcsp_sup = $request->cariSup;
        $plan->d_pcsp_staff = $request->namaStaff;
        $plan->d_pcsp_datecreated = date('Y-m-d',strtotime($request->tanggal));
        $plan->save();

        //get last id plan then insert id to d_purchasingplan_dt
        $lastIdPlan = d_purchasingplan::select('d_pcsp_id')->max('d_pcsp_id');
        if ($lastIdPlan == 0 || $lastIdPlan == '') 
        {
          $lastIdPlan  = 1;
        }

        
        $hitung_field = count($request->fieldIpBarang);
        for ($i=0; $i < $hitung_field; $i++) 
        {

          $plandt = new d_purchasingplan_dt;
          $plandt->d_pcspdt_idplan = $lastIdPlan;
          $plandt->d_pcspdt_item = $request->fieldIpItem[$i];
          $plandt->d_pcspdt_qty = $request->fieldIpQtyReq[$i];
          $plandt->d_pcspdt_updated = Carbon::now();
          $plandt->save();
        } 
        
      DB::commit();
      return response()->json([
            'status' => 'sukses',
            'pesan' => 'Data Rencana Order Berhasil Disimpan'
        ]);
      } 
      catch (\Exception $e) 
      {
        DB::rollback();
        return response()->json([
            'status' => 'gagal',
            'pesan' => $e
        ]);
      }
    }

    public function konvertRp($value)
    {
        $value = str_replace(['Rp', '\\', '.', ' '], '', $value);
        return str_replace(',', '.', $value);
    }
}
