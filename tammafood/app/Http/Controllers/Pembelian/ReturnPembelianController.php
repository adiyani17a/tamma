<?php

namespace App\Http\Controllers\Pembelian;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Response;
use DB;
use DataTables;
use App\d_purchasingreturn;
use App\d_purchasingreturn_dt;

class ReturnPembelianController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
  }

  public function index()
  {
    return view('/purchasing/returnpembelian/index');
  }

  public function getDataReturnPembelian()
  {
    $data = d_purchasingreturn::join('d_purchasing','d_purchasingreturn.d_pcsr_pcsid','=','d_purchasing.d_pcs_id')
            ->join('d_supplier','d_purchasingreturn.d_pcsr_supid','=','d_supplier.s_id')
            ->select('d_purchasingreturn.*', 'd_supplier.s_id', 'd_supplier.s_company', 'd_purchasing.d_pcs_id', 'd_purchasing.d_pcs_code')
            ->orderBy('d_pcsr_created', 'DESC')
            ->get();
    //dd($data);    
    return DataTables::of($data)
    ->addIndexColumn()
    ->editColumn('status', function ($data)
    {
      if ($data->d_pcsr_status == "WT") 
      {
        return '<span class="label label-info">Waiting</span>';
      }
      elseif ($data->d_pcsr_status == "CF") 
      {
        return '<span class="label label-success">Disetujui</span>';
      }
      elseif ($data->d_pcsr_status == "DE") 
      {
        return '<span class="label label-warning">Dapat Diedit</span>';
      }
    })
    ->editColumn('metode', function ($data)
    {
      if ($data->d_pcsr_method == "TK") 
      {
        return 'Tukar Barang';
      }
      elseif ($data->d_pcsr_method == "PN") 
      {
        return 'Potong Nota';
      }
    })
    ->editColumn('tglBuat', function ($data) 
    {
        if ($data->d_pcsr_datecreated == null) 
        {
            return '-';
        }
        else 
        {
            return $data->d_pcsr_datecreated ? with(new Carbon($data->d_pcsr_datecreated))->format('d M Y') : '';
        }
    })
    ->editColumn('hargaTotal', function ($data) 
    {
      return 'Rp. '.number_format($data->d_pcsr_pricetotal,2,",",".");
    })
    ->addColumn('action', function($data)
    {
      if ($data->d_pcsr_status == "WT") 
      {
        return '<div class="text-center">
                    <button class="btn btn-sm btn-success" title="Detail"
                        onclick=detailReturPembelian("'.$data->d_pcsr_id.'")><i class="fa fa-eye"></i> 
                    </button>
                    <button class="btn btn-sm btn-warning" title="Edit"
                        onclick=editReturPembelian("'.$data->d_pcsr_id.'")><i class="glyphicon glyphicon-edit"></i>
                    </button>
                    <button class="btn btn-sm btn-danger" title="Delete"
                        onclick=deleteReturPembelian("'.$data->d_pcsr_id.'")><i class="glyphicon glyphicon-trash"></i>
                    </button>
                </div>'; 
      }
      elseif ($data->d_pcsr_status == "DE") 
      {
        return '<div class="text-center">
                    <button class="btn btn-sm btn-success" title="Detail"
                        onclick=detailReturPembelian("'.$data->d_pcsr_id.'")><i class="fa fa-eye"></i> 
                    </button>
                    <button class="btn btn-sm btn-warning" title="Edit"
                        onclick=editReturPembelian("'.$data->d_pcsr_id.'")><i class="glyphicon glyphicon-edit"></i>
                    </button>
                    <button class="btn btn-sm btn-danger" title="Delete"
                        onclick=deleteReturPembelian("'.$data->d_pcsr_id.'") disabled><i class="glyphicon glyphicon-trash"></i>
                    </button>
                </div>'; 
      }
      else
      {
        return '<div class="text-center">
                    <button class="btn btn-sm btn-success" title="Detail"
                        onclick=detailReturPembelian("'.$data->d_pcsr_id.'")><i class="fa fa-eye"></i> 
                    </button>
                    <button class="btn btn-sm btn-warning" title="Edit"
                        onclick=editReturPembelian("'.$data->d_pcsr_id.'") disabled><i class="glyphicon glyphicon-edit"></i>
                    </button>
                    <button class="btn btn-sm btn-danger" title="Delete"
                        onclick=deleteReturPembelian("'.$data->d_pcsr_id.'") disabled><i class="glyphicon glyphicon-trash"></i>
                    </button>
                </div>'; 
      }
      
    })
    ->rawColumns(['status', 'action'])
    ->make(true);
  }

  public function getDataDetail($id, $type="all")
  {
    $dataHeader = d_purchasingreturn::join('d_purchasing','d_purchasingreturn.d_pcsr_pcsid','=','d_purchasing.d_pcs_id')
          ->join('d_supplier','d_purchasingreturn.d_pcsr_supid','=','d_supplier.s_id')
          ->select('d_purchasingreturn.*', 'd_supplier.s_id', 'd_supplier.s_company', 'd_purchasing.d_pcs_id', 'd_purchasing.d_pcs_total_net', 'd_purchasing.d_pcs_code')
          ->where('d_purchasingreturn.d_pcsr_id', '=', $id)
          ->orderBy('d_pcsr_created', 'DESC')
          ->get();

    $statusLabel = $dataHeader[0]->d_pcsr_status;
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

    $metodeReturn = $dataHeader[0]->d_pcsr_method;
    if ($metodeReturn == "PN") 
    {
      $lblMethod = 'Potong nota';
    }
    else
    {
      $lblMethod = 'Tukar barang';
    }

    foreach ($dataHeader as $val) 
    {
        $data = array(
          'hargaTotalReturn' => 'Rp. '.number_format($val->d_pcsr_pricetotal,2,",","."),
          'hargaTotalResult' => 'Rp. '.number_format($val->d_pcsr_priceresult,2,",","."),
          'tanggalReturn' => date('Y-m-d',strtotime($val->d_pcsr_datecreated))
        );
    }

    $dataIsi = d_purchasingreturn_dt::join('d_purchasingreturn', 'd_purchasingreturn_dt.d_pcsrdt_idpcsr', '=', 'd_purchasingreturn.d_pcsr_id')
            ->join('m_item', 'd_purchasingreturn_dt.d_pcsrdt_item', '=', 'm_item.i_id')
            ->select('d_purchasingreturn_dt.*', 'm_item.*', 'd_purchasingreturn.d_pcsr_code')
            ->where('d_purchasingreturn_dt.d_pcsrdt_idpcsr', '=', $id)
            ->orderBy('d_purchasingreturn_dt.d_pcsrdt_created', 'DESC')
            ->get();
    
    //cek item type untuk hitung stok
    foreach ($dataIsi as $val) 
    {
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
        'spanTxt' => $spanTxt,
        'spanClass' => $spanClass,
        'lblMethod' => $lblMethod,
        'data_stok' => $stok
    ]);
  }

  public function tambahReturn()
  {
    //code order
    $query = DB::select(DB::raw("SELECT MAX(RIGHT(d_pcsr_id,4)) as kode_max from d_purchasingreturn WHERE DATE_FORMAT(d_pcsr_datecreated, '%Y-%m') = DATE_FORMAT(CURRENT_DATE(), '%Y-%m')"));
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

    $codeRP = "RTN-".date('myd')."-".$kd;
    $namaStaff = 'Jamilah';
    return view ('/purchasing/returnpembelian/tambah-return',compact('codeRP', 'namaStaff'));
  }

  public function lookupDataPembelian(Request $request)
  {
    $formatted_tags = array();
    $term = trim($request->q);
    if (empty($term)) {
      $sup = DB::table('d_purchasing')->where('d_pcs_status','=','CF')->orderBy('d_pcs_code', 'DESC')->limit(5)->get();
      foreach ($sup as $val) {
          $formatted_tags[] = ['id' => $val->d_pcs_id, 'text' => $val->d_pcs_code];
      }
      return Response::json($formatted_tags);
    }
    else
    {
      $sup = DB::table('d_purchasing')->where('d_pcs_status','=','CF')->orderBy('d_pcs_code', 'DESC')->where('d_pcs_code', 'LIKE', '%'.$term.'%')->limit(5)->get();
      foreach ($sup as $val) {
          $formatted_tags[] = ['id' => $val->d_pcs_id, 'text' => $val->d_pcs_code];
      }

      return Response::json($formatted_tags);  
    }
  }

  public function getDataForm($id)
  {
    $dataHeader = DB::table('d_purchasing')
                ->select('d_purchasing.*', 'd_supplier.s_company', 'd_supplier.s_name', 'd_supplier.s_id')
                ->join('d_supplier','d_purchasing.s_id','=','d_supplier.s_id')
                ->where('d_pcs_id', '=', $id)
                ->get();

    $dataIsi = DB::table('d_purchasing_dt')
          ->select('d_purchasing_dt.*', 'm_item.i_name', 'm_item.i_code', 'm_item.i_sat1', 'm_item.i_id')
          ->leftJoin('m_item','d_purchasing_dt.i_id','=','m_item.i_id')
          ->where('d_purchasing_dt.d_pcs_id', '=', $id)
          // ->where('d_purchasing_dt.d_pcsdt_isconfirm', '=', "TRUE")
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
        'data_header' => $dataHeader,
        'data_isi' => $dataIsi,
        'data_stok' => $stok,
    ]);
  }

  public function simpanDataReturn(Request $request)
  {
    //dd($request->all());
    DB::beginTransaction();
    try {
      //cek method return
      if ($request->metodeReturn == "PN") 
      {
        //insert to table d_purchasingreturn
        $dataHeader = new d_purchasingreturn;
        $dataHeader->d_pcsr_pcsid = $request->cariNotaPurchase;
        $dataHeader->d_pcsr_supid = $request->idSup;
        $dataHeader->d_pcsr_code = $request->kodeReturn;
        $dataHeader->d_pcsr_method = $request->metodeReturn;
        $dataHeader->d_pcs_staff = $request->namaStaff;
        $dataHeader->d_pcsr_datecreated = date('Y-m-d',strtotime($request->tanggal));
        $dataHeader->d_pcsr_pricetotal = $this->konvertRp($request->nilaiTotalReturn);
        $dataHeader->d_pcsr_priceresult = $this->konvertRp($request->nilaiTotalNett) - $this->konvertRp($request->nilaiTotalReturn);
        $dataHeader->save();
      }
      else
      {
        //insert to table d_purchasingreturn
        $dataHeader = new d_purchasingreturn;
        $dataHeader->d_pcsr_pcsid = $request->cariNotaPurchase;
        $dataHeader->d_pcsr_supid = $request->idSup;
        $dataHeader->d_pcsr_code = $request->kodeReturn;
        $dataHeader->d_pcsr_method = $request->metodeReturn;
        $dataHeader->d_pcs_staff = $request->namaStaff;
        $dataHeader->d_pcsr_datecreated = date('Y-m-d',strtotime($request->tanggal));
        $dataHeader->d_pcsr_pricetotal = $this->konvertRp($request->nilaiTotalReturn);
        $dataHeader->d_pcsr_priceresult = $this->konvertRp($request->nilaiTotalNett);
        $dataHeader->save();
      }
      
      //get last lastId then insert id to d_purchasingreturn_dt
      $lastId = d_purchasingreturn::select('d_pcsr_id')->max('d_pcsr_id');
      if ($lastId == 0 || $lastId == '') 
      {
        $lastId  = 1;
      }  

      //variabel untuk hitung array field
      $hitung_field = count($request->fieldItemId);

      //update d_stock, insert d_stock_mutation & insert d_purchasingreturn_dt
      for ($i=0; $i < $hitung_field; $i++) 
      {
        $grup = $this->getGroupGudang($request->fieldItemId[$i]);
        $stokAkhir = (int)$request->fieldStok[$i] - (int)$request->fieldQty[$i];
        DB::table('d_stock')
          ->where('s_item', $request->fieldItemId[$i])
          ->where('s_comp', $grup)
          ->where('s_position', $grup)
          ->update(['s_qty' => $stokAkhir]);

        //get id d_stock
        $dstock_id = DB::table('d_stock')
          ->select('s_id')
          ->where('s_item', $request->fieldItemId[$i])
          ->where('s_comp', $grup)
          ->where('s_position', $grup)
          ->first();

        //get last id stock_mutation
        $lastIdSm = DB::select(DB::raw("SELECT EXISTS(SELECT sm_detailid FROM d_stock_mutation where sm_stock = '$dstock_id->s_id' ORDER BY sm_detailid DESC LIMIT 1) as zz"));
        //dd($lastIdSm);
      
        if ($lastIdSm[0]->zz == 0 || $lastIdSm[0]->zz = '0')
        {
          $hasil_id = 1;
        }
        else
        {
          $hasil_id = (int)$lastIdSm[0]->zz + 1;
        }

        //insert to d_stock_mutation
        DB::table('d_stock_mutation')->insert([
          'sm_stock' => $dstock_id->s_id,
          'sm_detailid' => $hasil_id,
          'sm_date' => Carbon::now(),
          'sm_comp' => $grup,
          'sm_mutcat' => '12',
          'sm_item' => $request->fieldItemId[$i],
          'sm_qty' => $request->fieldQty[$i],
          'sm_detail' => "PENGURANGAN",
          'sm_hpp' => $this->konvertRp($request->fieldHargaTotal[$i]),
          'sm_reff' => $request->kodeReturn,
          'sm_insert' => Carbon::now(),
        ]);

        //insert d_purchasingreturn_dt
        $dataIsi = new d_purchasingreturn_dt;
        $dataIsi->d_pcsrdt_idpcsr = $lastId;
        $dataIsi->d_pcsrdt_smdetail = $hasil_id;
        $dataIsi->d_pcsrdt_item = $request->fieldItemId[$i];
        $dataIsi->d_pcsrdt_qty = $request->fieldQty[$i];
        $dataIsi->d_pcsrdt_price = $this->konvertRp($request->fieldHarga[$i]);
        $dataIsi->d_pcsrdt_pricetotal = $this->konvertRp($request->fieldHargaTotal[$i]);
        $dataIsi->d_pcsrdt_created = Carbon::now();
        $dataIsi->save();
      }

    DB::commit();
    return response()->json([
          'status' => 'sukses',
          'pesan' => 'Data Return Pembelian Berhasil Disimpan'
      ]);
    } 
    catch (\Exception $e) 
    {
      DB::rollback();
      return response()->json([
          'status' => 'gagal',
          'pesan' => $e->getMessage()."\n at file: ".$e->getFile()."\n line: ".$e->getLine()
      ]);
    }
  }

  public function updateDataReturn(Request $request)
  {
    //dd($request->all());
    DB::beginTransaction();
    try {
      //cek method return
      if ($request->methodReturn == "PN") 
      {
        //update to table d_purchasingreturn
        $data_header = d_purchasingreturn::find($request->idReturn);
        $data_header->d_pcsr_dateupdated = date('Y-m-d',strtotime(Carbon::now()));
        $data_header->d_pcsr_updated = Carbon::now();
        $data_header->d_pcsr_pricetotal = $this->konvertRp($request->priceTotal);
        $data_header->d_pcsr_priceresult = (int)$request->priceTotalNett - (int)$request->priceTotal;
        $data_header->save();
      }
      else
      {
        //update to table d_purchasingreturn
        $data_header = d_purchasingreturn::find($request->idReturn);
        $data_header->d_pcsr_dateupdated = date('Y-m-d',strtotime(Carbon::now()));
        $data_header->d_pcsr_updated = Carbon::now();
        $data_header->d_pcsr_pricetotal = $this->konvertRp($request->priceTotal);
        $data_header->d_pcsr_priceresult = (int)$request->priceTotalNett;
        $data_header->save();
      }

      //variabel untuk cek jumlah field
      $hitung_field_edit = count($request->fieldIdItem);

      for ($i=0; $i < $hitung_field_edit; $i++) 
      { 
        //mengembalikan stok sebelum return
        $grup = $this->getGroupGudang($request->fieldIdItem[$i]);
        $stokAkhir = (int)$request->fieldStokItem[$i] + (int)$request->fieldQtyLalu[$i];
        DB::table('d_stock')
          ->where('s_item', $request->fieldIdItem[$i])
          ->where('s_comp', $grup)
          ->where('s_position', $grup)
          ->update(['s_qty' => $stokAkhir]);

        //update d_stock
        $grup2 = $this->getGroupGudang($request->fieldIdItem[$i]);
        $stokAkhir2 = (int)$stokAkhir - (int)$request->fieldQty[$i];
        DB::table('d_stock')
          ->where('s_item', $request->fieldIdItem[$i])
          ->where('s_comp', $grup2)
          ->where('s_position', $grup2)
          ->update(['s_qty' => $stokAkhir2]);

        //update to table d_purchasingreturn_dt
        $data_isi = d_purchasingreturn_dt::find($request->fieldIdDt[$i]);
        $data_isi->d_pcsrdt_qty = $request->fieldQty[$i];
        $data_isi->d_pcsrdt_price = $this->konvertRp($request->fieldHarga[$i]);
        $data_isi->d_pcsrdt_pricetotal = $this->konvertRp($request->fieldHargaTotal[$i]);
        $data_isi->d_pcsrdt_updated = Carbon::now();
        $data_isi->save();

        //cari stok mutasi detailid
        $sm_detailid = DB::table('d_purchasingreturn_dt')
          ->select('d_pcsrdt_smdetail')
          ->where('d_pcsrdt_id','=', $request->fieldIdDt[$i])
          ->first();

        //get id d_stock
        $dstock_id = DB::table('d_stock')
          ->select('s_id')
          ->where('s_item', $request->fieldIdItem[$i])
          ->where('s_comp', $grup2)
          ->where('s_position', $grup2)
          ->first();

        //update d_stock_mutasi
        DB::table('d_stock_mutation')
          ->where('sm_stock', $dstock_id->s_id)
          ->where('sm_detailid', $sm_detailid->d_pcsrdt_smdetail)
          ->where('sm_item', $request->fieldIdItem[$i])
          ->update([
            'sm_qty' => $request->fieldQty[$i],
            'sm_hpp' => $this->konvertRp($request->fieldHargaTotal[$i]),
            'sm_update' => Carbon::now(),
          ]);
      } 
      
    DB::commit();
    return response()->json([
          'status' => 'sukses',
          'pesan' => 'Data Belanja Harian Berhasil Diupdate'
      ]);
    } 
    catch (\Exception $e) 
    {
      DB::rollback();
      return response()->json([
          'status' => 'gagal',
          'pesan' => $e->getMessage()."\n at file: ".$e->getFile()."\n line: ".$e->getLine()
      ]);
    }
  }

  public function deleteDataReturn(Request $request)
  {
    //dd($request->all());
    DB::beginTransaction();
    try {
      //delete row table d_purchasingreturn_dt
      $deleteReturnDt = d_purchasingreturn_dt::where('d_pcsrdt_idpcsr', $request->id)->delete();
      //delete row table d_purchasingreturn
      $deleteReturn = d_purchasingreturn::where('d_pcsr_id', $request->id)->delete();

      DB::commit();
      return response()->json([
          'status' => 'sukses',
          'pesan' => 'Data Belanja Harian Berhasil Dihapus'
      ]);
    } 
    catch (\Exception $e) 
    {
      DB::rollback();
      return response()->json([
          'status' => 'gagal',
          'pesan' => $e->getMessage()."\n at file: ".$e->getFile()."\n line: ".$e->getLine()
      ]);
    }
  }

  public function konvertRp($value)
  {
    $value = str_replace(['Rp', '\\', '.', ' '], '', $value);
    return (int)str_replace(',', '.', $value);
  }

  public function getGroupGudang($id_item)
  {
    $typeBrg = DB::table('m_item')->select('i_type')->where('i_id','=', $id_item)->first();
    if ($typeBrg->i_type == "BB") 
    {
      $idGroupGdg = '3';
    } 
    elseif ($typeBrg->i_type == "BJ") 
    {
      $idGroupGdg = '7';
    }
    elseif ($typeBrg->i_type == "BP") 
    {
      $idGroupGdg = '6';
    }
    return $idGroupGdg;
  }

}
