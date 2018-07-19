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

class PenerimaanBrgSupController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function suplier()
    {
        return view('inventory/p_suplier/suplier');
    }

<<<<<<< HEAD
    public function get_data_sj(Request $request)
=======
    public function getDatatableIndex()
    {
        $data = d_terima_pembelian::join('d_purchasing','d_terima_pembelian.d_tb_pid','=','d_purchasing.d_pcs_id')
                ->join('d_supplier','d_terima_pembelian.d_tb_sup','=','d_supplier.s_id')
                ->join('d_mem','d_terima_pembelian.d_tb_staff','=','d_mem.m_id')
                ->select('d_terima_pembelian.*', 'd_supplier.s_id', 'd_supplier.s_company', 'd_purchasing.d_pcs_id', 'd_purchasing.d_pcs_code', 'd_purchasing.d_pcs_date_created', 'd_mem.m_name')
                ->orderBy('d_tb_created', 'DESC')
                ->get();
        //dd($data);    
        return DataTables::of($data)
        ->addIndexColumn()
        ->editColumn('tglBuat', function ($data) 
        {
            if ($data->d_tb_created == null) 
            {
                return '-';
            }
            else 
            {
                return $data->d_tb_created ? with(new Carbon($data->d_tb_created))->format('d M Y') : '';
            }
        })
        ->editColumn('hargaTotal', function ($data) 
        {
          return 'Rp. '.number_format($data->d_tb_totalnett,2,",",".");
        })
        ->addColumn('action', function($data)
        {
          
            return '<div class="text-center">
                        <button class="btn btn-sm btn-success" title="Detail"
                            onclick=detailPenerimaan("'.$data->d_pcsr_id.'")><i class="fa fa-eye"></i> 
                        </button>
                        <button class="btn btn-sm btn-warning" title="Edit"
                            onclick=editPenerimaan("'.$data->d_pcsr_id.'")><i class="glyphicon glyphicon-edit"></i>
                        </button>
                        <button class="btn btn-sm btn-danger" title="Delete"
                            onclick=deletePenerimaan("'.$data->d_pcsr_id.'")><i class="glyphicon glyphicon-trash"></i>
                        </button>
                    </div>';
        })
        ->rawColumns(['status', 'action'])
        ->make(true);
    }

    public function lookupDataPembelian(Request $request)
>>>>>>> b673989bd2b4ed45ac752fb1578c967d0e58e1a7
    {
        $formatted_tags = array();
        $term = trim($request->q);
        if (empty($term)) {
            $do = d_delivery_orderdt::select('d_delivery_order.do_nota', 'd_delivery_orderdt.dod_do', 'd_delivery_orderdt.dod_detailid')
                    ->join('d_delivery_order', 'd_delivery_orderdt.dod_do', '=', 'd_delivery_order.do_id')
                    ->where('d_delivery_orderdt.dod_status', '=', 'WT')
                    ->groupBy('d_delivery_orderdt.dod_do')
                    ->get();

            foreach ($do as $val) {
                $formatted_tags[] = ['id' => $val->dod_do, 'text' => $val->do_nota];
            }
            return \Response::json($formatted_tags);
        }
        else
        {
<<<<<<< HEAD
            $do = d_delivery_orderdt::select('d_delivery_order.do_nota', 'd_delivery_orderdt.dod_do', 'd_delivery_orderdt.dod_detailid')
                    ->join('d_delivery_order', 'd_delivery_orderdt.dod_do', '=', 'd_delivery_order.do_id')
                    ->where('d_delivery_order.do_nota', 'LIKE', '%'.$term.'%')
                    ->where('d_delivery_orderdt.dod_status', '=', 'WT')
                    ->groupBy('d_delivery_orderdt.dod_do')
                    ->get();
=======
          $kd = "0001";
        }

        return $codeTerimaBeli = "INB-".date('myd')."-".$kd;
    }

    public function simpanPenerimaan(Request $request)
    {
        //dd($request->all());
        DB::beginTransaction();
        try 
        {
            //insert to table d_terimapembelian
            $dataHeader = new d_terima_pembelian;
            $dataHeader->d_tb_pid = $request->headNotaPurchase;
            $dataHeader->d_tb_sup = $request->headSupplierId;
            $dataHeader->d_tb_code = $request->headKodeTerima;
            $dataHeader->d_tb_staff = $request->headStaffId;
            $dataHeader->d_tb_date = date('Y-m-d',strtotime($request->headTglTerima));
            $dataHeader->d_tb_totalnett = $this->konvertRp($request->headTotalTerima);
            $dataHeader->d_tb_created = Carbon::now();
            $dataHeader->save();
                  
            //get last lastId then insert id to d_terimapembelian_dt
            $lastId = d_terima_pembelian::select('d_tb_id')->max('d_tb_id');
            if ($lastId == 0 || $lastId == '') 
            {
                $lastId  = 1;
            }  

            //variabel untuk hitung array field
            $hitung_field = count($request->fieldItemId);

            //update d_stock, insert d_stock_mutation & insert d_terimapembelian_dt
            for ($i=0; $i < $hitung_field; $i++) 
            {
                //variabel u/ cek primary satuan
                $primary_sat = DB::table('m_item')->select('m_item.*')->where('i_id', $request->fieldItemId[$i])->first();
        
                //cek satuan primary, convert ke primary apabila beda satuan
                if ($primary_sat->i_sat1 == $request->fieldSatuanId[$i]) 
                {
                  $hasilConvert = (int)$request->fieldQtyterima[$i] * (int)$primary_sat->i_sat_isi1;
                }
                elseif ($primary_sat->i_sat2 == $request->fieldSatuanId[$i])
                {
                  $hasilConvert = (int)$request->fieldQtyterima[$i] * (int)$primary_sat->i_sat_isi2;
                }
                else
                {
                  $hasilConvert = (int)$request->fieldQtyterima[$i] * (int)$primary_sat->i_sat_isi3;
                }

                $grup = $this->getGroupGudang($request->fieldItemId[$i]);
                $stokAkhir = (int)$request->fieldStokVal[$i] + (int)$hasilConvert;

                //update stock akhir d_stock
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
                  'sm_mutcat' => '14',
                  'sm_item' => $request->fieldItemId[$i],
                  'sm_qty' => $hasilConvert,
                  'sm_qty_used' => '0',
                  'sm_qty_expired' => '0',
                  'sm_detail' => "PENAMBAHAN",
                  'sm_hpp' => $this->konvertRp($request->fieldHargaTotal[$i]),
                  'sm_sell' => '0',
                  'sm_reff' => $request->headKodeTerima,
                  'sm_insert' => Carbon::now(),
                ]);

                //insert d_terimapembelian_dt
                $dataIsi = new d_terima_pembelian_dt;
                $dataIsi->d_tbdt_idtb = $lastId;
                $dataIsi->d_tbdt_smdetail = $hasil_id;
                $dataIsi->d_tbdt_item = $request->fieldItemId[$i];
                $dataIsi->d_tbdt_sat = $request->fieldSatuanId[$i];
                $dataIsi->d_tbdt_idpcsdt = $request->fieldIdPurchaseDet[$i];
                $dataIsi->d_tbdt_qty = $request->fieldQtyterima[$i];
                $dataIsi->d_tbdt_price = $request->fieldHargaRaw[$i];
                $dataIsi->d_tbdt_pricetotal = $this->konvertRp($request->fieldHargaTotal[$i]);
                $dataIsi->d_tbdt_date_received = date('Y-m-d',strtotime($request->headTglTerima));
                $dataIsi->d_tbdt_created = Carbon::now();
                $dataIsi->save();
            }

            DB::commit();
            return response()->json([
                  'status' => 'sukses',
                  'pesan' => 'Data Penerimaan Pembelian Berhasil Disimpan'
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

    public function getStokByType($arrItemType, $arrSatuan, $counter)
    {
        foreach ($arrItemType as $val) 
        {
            if ($val->i_type == "BP") //brg produksi
            {
                $query = DB::select(DB::raw("SELECT IFNULL( (SELECT s_qty FROM d_stock where s_item = '$val->i_id' AND s_comp = '6' AND s_position = '6' limit 1) ,'0') as qtyStok"));
                $satUtama = DB::table('m_item')->join('m_satuan', 'm_item.i_sat1', '=', 'm_satuan.m_sid')->select('m_satuan.m_sname')->where('m_item.i_sat1', '=', $arrSatuan[$counter])->first();
                  
                $stok[] = $query[0];
                $satuan[] = $satUtama->m_sname;
                $counter++;
            }
            elseif ($val->i_type == "BJ") //brg jual
            {
                $query = DB::select(DB::raw("SELECT IFNULL( (SELECT s_qty FROM d_stock where s_item = '$val->i_id' AND s_comp = '7' AND s_position = '7' limit 1) ,'0') as qtyStok"));
                $satUtama = DB::table('m_item')->join('m_satuan', 'm_item.i_sat1', '=', 'm_satuan.m_sid')->select('m_satuan.m_sname')->where('m_item.i_sat1', '=', $arrSatuan[$counter])->first();
>>>>>>> b673989bd2b4ed45ac752fb1578c967d0e58e1a7

            $formatted_tags = [];

            foreach ($do as $val) {
                $formatted_tags[] = ['id' => $val->dod_do, 'text' => $val->do_nota];
            }

            return \Response::json($formatted_tags);  
        }
    }

    public function list_sj(Request $request)
    {
        $id_sj = trim($request->sj_code);
            
        return response()->json([
            'idSj' => $id_sj,
        ]);
        //return view('/inventory/p_hasilproduksi/tabel_penerimaan',compact('query'));
    }

<<<<<<< HEAD
    public function get_tabel_data($id)
    {
        $query = d_delivery_orderdt::select(
                    'd_delivery_order.do_nota', 
                    'd_delivery_orderdt.dod_do',
                    'd_delivery_orderdt.dod_detailid',
                    'm_item.i_name',
                    'd_delivery_orderdt.dod_qty_send',
                    'd_delivery_orderdt.dod_qty_received',
                    'd_delivery_orderdt.dod_date_received',
                    'd_delivery_orderdt.dod_time_received',
                    'd_delivery_orderdt.dod_status')
            ->join('d_delivery_order', 'd_delivery_orderdt.dod_do', '=', 'd_delivery_order.do_id')
            ->join('m_item', 'd_delivery_orderdt.dod_item', '=', 'm_item.i_id')
            ->where('d_delivery_order.do_nota', '=', $id)
            ->where('d_delivery_orderdt.dod_status', '=', 'WT')
            ->orderBy('d_delivery_orderdt.dod_update', 'desc')
            ->get();

        return DataTables::of($query)
        ->addIndexColumn()
        ->addColumn('action', function($data)
        {
            if ($data->dod_qty_received == '0' && $data->dod_date_received == null && $data->dod_time_received == null) 
            {
                return '<div class="text-center">
                            <a class="btn btn-sm btn-success" href="javascript:void(0)" title="Terima"
                                onclick=terimaHasilProduksi("'.$data->dod_do.'","'.$data->dod_detailid.'")><i class="fa fa-plus"></i> 
                            </a>&nbsp;
                            <a class="btn btn-sm btn-info" href="javascript:void(0)" title="Ubah Status"
                                onclick=ubahStatus("'.$data->dod_do.'","'.$data->dod_detailid.'")><i class="glyphicon glyphicon-ok"></i>
                            </a>
                        </div>';
            }
            else
            {
                return '<div class="text-center">
                            <a class="btn btn-sm btn-warning" href="javascript:void(0)" title="Edit"
                                onclick=editHasilProduksi("'.$data->dod_do.'","'.$data->dod_detailid.'")><i class="fa fa-edit"></i>  
                            </a>&nbsp;
                            <a class="btn btn-sm btn-info" href="javascript:void(0)" title="Ubah Status"
                                onclick=ubahStatus("'.$data->dod_do.'","'.$data->dod_detailid.'")><i class="glyphicon glyphicon-ok"></i>
                            </a>
                        </div>';
            }     
        })
        ->editColumn('tanggalTerima', function ($data) 
        {
            if ($data->dod_date_received == null) 
            {
                return '-';
            }
            else 
            {
                return $data->dod_date_received ? with(new Carbon($data->dod_date_received))->format('d M Y') : '';
            }
        })
        ->editColumn('jamTerima', function ($data) 
        {
            if ($data->dod_time_received == null) 
            {
                return '-';
            }
            else 
            {
                return $data->dod_time_received;
            }
        })
        ->editColumn('status', function ($data) 
        {
            if ($data->dod_status == "WT") 
            {
                return '<span class="label label-info">Waiting</span>';
            }
            elseif ($data->dod_status == "FN") 
            {
                return '<span class="label label-success">Final</span>';
            }
        })
        //inisisai column status agar kode html digenerate ketika ditampilkan
        ->rawColumns(['status', 'action'])
        ->make(true);
    }
=======
    // ============================================================================================================== //
>>>>>>> b673989bd2b4ed45ac752fb1578c967d0e58e1a7

    public function get_penerimaan_by_tgl($tgl1,$tgl2,$akses)
    {
        $y = substr($tgl1, -4);
        $m = substr($tgl1, -7,-5);
        $d = substr($tgl1,0,2);
        $tanggal1 = $y.'-'.$m.'-'.$d;

        $y2 = substr($tgl2, -4);
        $m2 = substr($tgl2, -7,-5);
        $d2 = substr($tgl2,0,2);
        $tanggal2 = $y2.'-'.$m2.'-'.$d2;
        //dd(array($tanggal1, $tanggal2));
        
        $query = d_delivery_orderdt::select(
                    'd_delivery_order.do_nota', 
                    'd_delivery_orderdt.dod_do',
                    'd_delivery_orderdt.dod_detailid',
                    'm_item.i_name',
                    'd_delivery_orderdt.dod_qty_send',
                    'd_delivery_orderdt.dod_qty_received',
                    'd_delivery_orderdt.dod_date_received',
                    'd_delivery_orderdt.dod_time_received',
                    'd_delivery_orderdt.dod_status')
            ->join('d_delivery_order', 'd_delivery_orderdt.dod_do', '=', 'd_delivery_order.do_id')
            ->join('m_item', 'd_delivery_orderdt.dod_item', '=', 'm_item.i_id')
            ->where('d_delivery_orderdt.dod_status', '=', 'FN')
            ->where('d_delivery_orderdt.dod_date_received','>=',$tanggal1)
            ->where('d_delivery_orderdt.dod_date_received','<=',$tanggal2)
            ->orderBy('d_delivery_orderdt.dod_update', 'desc')
            ->get();    
        if ($akses == "inventory") 
        {
            return DataTables::of($query)
            ->addIndexColumn()
            ->editColumn('tanggalTerima', function ($data) 
            {
                if ($data->dod_date_received == null) 
                {
                    return '-';
                }
                else 
                {
                    return $data->dod_date_received ? with(new Carbon($data->dod_date_received))->format('d M Y') : '';
                }
            })
            ->editColumn('jamTerima', function ($data) 
            {
                if ($data->dod_time_received == null) 
                {
                    return '-';
                }
                else 
                {
                    return $data->dod_time_received;
                }
            })
            ->editColumn('status', function ($data) 
            {
                if ($data->dod_status == "WT") 
                {
                    return '<span class="label label-info">Waiting</span>';
                }
                elseif ($data->dod_status == "FN") 
                {
                    return '<span class="label label-success">Final</span>';
                }
            })
            ->rawColumns(['status'])
            ->make(true);
        }
        else
        {
            return DataTables::of($query)
            ->addIndexColumn()
            ->addColumn('action', function($data)
            {
                if ($data->dod_qty_received == '0') 
                {
                    return '<div class="text-center">
                                <a class="btn btn-sm btn-info" href="javascript:void(0)" title="Ubah Status"
                                    onclick=ubahStatus("'.$data->dod_do.'","'.$data->dod_detailid.'")><i class="glyphicon glyphicon-ok"></i>
                                </a>
                            </div>';
                }
                else
                {
                    return '<div class="text-center">
                                <a class="btn btn-sm btn-info" href="javascript:void(0)" title="Ubah Status"
                                    onclick=ubahStatus("'.$data->dod_do.'","'.$data->dod_detailid.'")><i class="glyphicon glyphicon-ok"></i>
                                </a>
                            </div>';
                }     
            })
            ->editColumn('tanggalTerima', function ($data) 
            {
                if ($data->dod_date_received == null) 
                {
                    return '-';
                }
                else 
                {
                    return $data->dod_date_received ? with(new Carbon($data->dod_date_received))->format('d M Y') : '';
                }
            })
            ->editColumn('jamTerima', function ($data) 
            {
                if ($data->dod_time_received == null) 
                {
                    return '-';
                }
                else 
                {
                    return $data->dod_time_received;
                }
            })
            ->editColumn('status', function ($data) 
            {
                if ($data->dod_status == "WT") 
                {
                    return '<span class="label label-info">Waiting</span>';
                }
                elseif ($data->dod_status == "FN") 
                {
                    return '<span class="label label-success">Final</span>';
                }
            })
            ->rawColumns(['status', 'action'])
            ->make(true);
        }
              
    }

    public function get_list_waiting_by_tgl($tgl3,$tgl4)
    {
        $y = substr($tgl3, -4);
        $m = substr($tgl3, -7,-5);
        $d = substr($tgl3,0,2);
        $tanggal1 = $y.'-'.$m.'-'.$d;

        $y2 = substr($tgl4, -4);
        $m2 = substr($tgl4, -7,-5);
        $d2 = substr($tgl4,0,2);
        $tanggal2 = $y2.'-'.$m2.'-'.$d2;
        //dd(array($tanggal1, $tanggal2));
        
        $query = d_delivery_orderdt::select(
                    'd_delivery_order.do_nota', 
                    'd_delivery_orderdt.dod_do',
                    'd_delivery_orderdt.dod_detailid',
                    'm_item.i_name',
                    'd_delivery_orderdt.dod_qty_send',
                    'd_delivery_orderdt.dod_qty_received',
                    'd_delivery_orderdt.dod_date_received',
                    'd_delivery_orderdt.dod_time_received',
                    'd_delivery_orderdt.dod_status')
            ->join('d_delivery_order', 'd_delivery_orderdt.dod_do', '=', 'd_delivery_order.do_id')
            ->join('m_item', 'd_delivery_orderdt.dod_item', '=', 'm_item.i_id')
            ->where('d_delivery_orderdt.dod_status', '=', 'WT')
            ->where('d_delivery_orderdt.dod_date_send','>=',$tanggal1)
            ->where('d_delivery_orderdt.dod_date_send','<=',$tanggal2)
            ->orderBy('d_delivery_orderdt.dod_update', 'desc')
            ->get();    

        return DataTables::of($query)
        ->addIndexColumn()
        ->addColumn('action', function($data)
        {
            if ($data->dod_qty_received == '0') 
            {
                return '<div class="text-center">
                            <a class="btn btn-sm btn-success" href="javascript:void(0)" title="Terima"
                                onclick=terimaHasilProduksi("'.$data->dod_do.'","'.$data->dod_detailid.'")><i class="fa fa-plus"></i> 
                            </a>&nbsp;
                            <a class="btn btn-sm btn-info" href="javascript:void(0)" title="Ubah Status"
                                onclick=ubahStatus("'.$data->dod_do.'","'.$data->dod_detailid.'")><i class="glyphicon glyphicon-ok"></i>
                            </a>
                        </div>';
            }
            else
            {
                return '<div class="text-center">
                            <a class="btn btn-sm btn-warning" href="javascript:void(0)" title="Edit"
                                onclick=editHasilProduksi("'.$data->dod_do.'","'.$data->dod_detailid.'")><i class="fa fa-edit"></i>  
                            </a>&nbsp;
                            <a class="btn btn-sm btn-info" href="javascript:void(0)" title="Ubah Status"
                                onclick=ubahStatus("'.$data->dod_do.'","'.$data->dod_detailid.'")><i class="glyphicon glyphicon-ok"></i>
                            </a>
                        </div>';
            }     
        })
        ->editColumn('tanggalTerima', function ($data) 
        {
            if ($data->dod_date_received == null) 
            {
                return '-';
            }
            else 
            {
                return $data->dod_date_received ? with(new Carbon($data->dod_date_received))->format('d M Y') : '';
            }
        })
        ->editColumn('jamTerima', function ($data) 
        {
            if ($data->dod_time_received == null) 
            {
                return '-';
            }
            else 
            {
                return $data->dod_time_received;
            }
        })
        ->editColumn('status', function ($data) 
        {
            if ($data->dod_status == "WT") 
            {
                return '<span class="label label-info">Waiting</span>';
            }
            elseif ($data->dod_status == "FN") 
            {
                return '<span class="label label-success">Final</span>';
            }
        })
        ->rawColumns(['status', 'action'])
        ->make(true);       
    }

    public function terima_hasil_produksi($dod_do, $dod_detailid)
    {
        $query = d_delivery_orderdt::select(
                    'd_delivery_order.do_nota', 
                    'd_delivery_orderdt.dod_do',
                    'd_delivery_orderdt.dod_detailid',
                    'd_delivery_orderdt.dod_item',
                    'd_delivery_orderdt.dod_prdt_productresult',
                    'd_delivery_orderdt.dod_prdt_detail',
                    'm_item.i_name',
                    'd_delivery_orderdt.dod_qty_send',
                    'd_delivery_orderdt.dod_qty_received',
                    'd_delivery_orderdt.dod_date_received',
                    'd_delivery_orderdt.dod_time_received',
                    'd_delivery_orderdt.dod_status')
            ->join('d_delivery_order', 'd_delivery_orderdt.dod_do', '=', 'd_delivery_order.do_id')
            ->join('m_item', 'd_delivery_orderdt.dod_item', '=', 'm_item.i_id')
            ->where('d_delivery_orderdt.dod_do', '=', $dod_do)
            ->where('d_delivery_orderdt.dod_detailid', '=', $dod_detailid)
            ->where('d_delivery_orderdt.dod_status', '=', 'WT')
            ->get();

         echo json_encode($query);
    }

    public function edit_hasil_produksi($dod_do, $dod_detailid)
    {
         $query = d_delivery_orderdt::select(
                    'd_delivery_order.do_nota', 
                    'd_delivery_orderdt.dod_do',
                    'd_delivery_orderdt.dod_detailid',
                    'd_delivery_orderdt.dod_item',
                    'd_delivery_orderdt.dod_prdt_productresult',
                    'd_delivery_orderdt.dod_prdt_detail',
                    'm_item.i_name',
                    'd_delivery_orderdt.dod_qty_send',
                    'd_delivery_orderdt.dod_qty_received',
                    'd_delivery_orderdt.dod_date_received',
                    'd_delivery_orderdt.dod_time_received',
                    'd_delivery_orderdt.dod_status')
            ->join('d_delivery_order', 'd_delivery_orderdt.dod_do', '=', 'd_delivery_order.do_id')
            ->join('m_item', 'd_delivery_orderdt.dod_item', '=', 'm_item.i_id')
            ->where('d_delivery_orderdt.dod_do', '=', $dod_do)
            ->where('d_delivery_orderdt.dod_detailid', '=', $dod_detailid)
            ->get();

         echo json_encode($query);
    }

    public function simpan_update_data(Request $request)
    {
        //dd($request->all());
        DB::beginTransaction();
        try 
        {
            //get stock item gdg Sending
            $stok_item_gs = DB::table('d_stock')
                ->where('s_comp','2')
                ->where('s_position','5')
                ->where('s_item',$request->idItemMasuk)
                ->first();

            //get stock item gdg Produksi
            $stok_item_gp = DB::table('d_stock')
                ->where('s_comp','6')
                ->where('s_position','6')
                ->where('s_item',$request->idItemMasuk)
                ->first();
            
            $stok_akhir_gdgSending = $stok_item_gs->s_qty - $request->qtyDiterima;
            $stok_akhir_gdgProd = $stok_item_gp->s_qty - $request->qtyDiterima;

            //cek ada tidaknya record pada tabel
            $rows = DB::table('d_stock')->select('s_id')
                ->where('s_comp','2')
                ->where('s_position','2')
                ->where('s_item',$request->idItemMasuk)
                ->exists();
            // dd($rows);
            if($rows !== FALSE) //jika terdapat record, maka lakukan update
            {
                //get stock item gdg Grosir
                $stok_item_gs = DB::table('d_stock')
                ->where('s_comp','2')
                ->where('s_position','2')
                ->where('s_item',$request->idItemMasuk)
                ->first();
                $stok_akhir_gdgGrosir = $stok_item_gs->s_qty + $request->qtyDiterima;
                //update stok gudang grosir
                $update = DB::table('d_stock')
                    ->where('s_comp','2')
                    ->where('s_position','2')
                    ->where('s_item',$request->idItemMasuk)
                    ->update(['s_qty' => $stok_akhir_gdgGrosir]);
            }
            else //jika tidak ada record, maka lakukan insert
            {
                //get last id
                $id_stock = DB::table('d_stock')->max('s_id') + 1;
                //insert value ke tbl d_stock
                DB::table('d_stock')->insert([
                    's_id' => $id_stock,
                    's_comp' => '2',
                    's_position' => '2',
                    's_item' => $request->idItemMasuk,
                    's_qty' => $request->qtyDiterima,
                ]);
            }
             
            //update d_delivery_orderdt
            $date = Carbon::parse($request->tglMasuk)->format('Y-m-d');
            $time = $request->jamMasuk.":00";
            $now = Carbon::now();
            DB::table('d_delivery_orderdt')
                    ->where('dod_detailid', $request->detailId)
                    ->where('dod_do',$request->doId)
                    ->update(['dod_qty_received' => $request->qtyDiterima, 'dod_date_received' => $date, 'dod_time_received' => $time, 'dod_update' => $now]);
                        
            //update gdg Sending
            DB::table('d_stock')
                    ->where('s_item', $request->idItemMasuk)
                    ->where('s_comp','2')
                    ->where('s_position','5')
                    ->update(['s_qty' => $stok_akhir_gdgSending]);

            //update gdg Produksi
            // DB::table('d_stock')
            //         ->where('s_item', $request->idItemMasuk)
            //         ->where('s_comp','6')
            //         ->where('s_position','6')
            //         ->update(['s_qty' => $stok_akhir_gdgProd]);  
            
            // //cek qty mutasi
            // $total_qty_mutasi = DB::table('d_stock_mutation')
            //     ->selectRaw('sum(sm_qty) as totalMutasi')
            //     ->where('sm_stock',$request->modalIdStockInput)
            //     ->where('sm_item',$request->modalNamaItemInput)
            //     ->where('sm_comp',"2")
            //     ->first();
                
            // //jika jumlah qty pd mutasi sama dengan qty total pengiriman   
            // if ($total_qty_mutasi->totalMutasi == $request->modalTotalKirim || $total_qty_mutasi->totalMutasi < $request->modalFieldBatasAtas) 
            // {
            //     //update status to finish
            //     $update = DB::table('d_productresult')
            //         ->where('pr_id', $request->modalIdProductResultInput)
            //         ->update(['prdt_status' => "FN"]);
            // }            

            DB::commit();
            return response()->json([
                'status' => 'Sukses',
                'pesan' => 'Data Telah Berhasil di Simpan'
            ]);
        } 
        catch (\Exception $e) 
        {
            DB::rollback();
            return response()->json([
                'status' => 'gagal',
                'data' => $e->getMessage()
            ]);
        }
    }

    public function update_data(Request $request)
    {
        //dd($request->all());
        DB::beginTransaction();
        try 
        {
            //get stock item gdg Sending
            $stok_item_gs = DB::table('d_stock')
                ->where('s_comp','2')
                ->where('s_position','5')
                ->where('s_item',$request->idItemMasuk)
                ->first();

            //get stock item gdg Produksi
            $stok_item_gp = DB::table('d_stock')
                ->where('s_comp','6')
                ->where('s_position','6')
                ->where('s_item',$request->idItemMasuk)
                ->first();

            //get stock item gdg Grosir
            $stok_item_gg = DB::table('d_stock')
                ->where('s_comp','2')
                ->where('s_position','2')
                ->where('s_item',$request->idItemMasuk)
                ->first();
            
            //stok dikembalikan sebelum terjadinya penambahan
            $stok_prev_gdgSending = $stok_item_gs->s_qty + $request->qtyMasukPrev;
            $stok_prev_gdgProd = $stok_item_gp->s_qty + $request->qtyMasukPrev;
            $stok_prev_gdgGrosir = $stok_item_gg->s_qty - $request->qtyMasukPrev;
            //stok ditambahkan dengan inputan
            $stok_akhir_gdgSending = $stok_prev_gdgSending - $request->qtyDiterima;
            $stok_akhir_gdgProd = $stok_prev_gdgProd - $request->qtyDiterima;
            $stok_akhir_gdgGrosir = $stok_prev_gdgGrosir + $request->qtyDiterima;

            //update d_delivery_orderdt
            $date = Carbon::parse($request->tglMasuk)->format('Y-m-d');
            $time = $request->jamMasuk.":00";
            $now = Carbon::now();
            DB::table('d_delivery_orderdt')
                    ->where('dod_detailid', $request->detailId)
                    ->where('dod_do',$request->doId)
                    ->update(['dod_qty_received' => $request->qtyDiterima, 'dod_date_received' => $date, 'dod_time_received' => $time, 'dod_update' => $now]);
                        
            //update gdg Grosir
            DB::table('d_stock')
                    ->where('s_item', $request->idItemMasuk)
                    ->where('s_comp','2')
                    ->where('s_position','2')
                    ->update(['s_qty' => $stok_akhir_gdgGrosir]);
             
            //update gdg Sending
            DB::table('d_stock')
                    ->where('s_item', $request->idItemMasuk)
                    ->where('s_comp','2')
                    ->where('s_position','5')
                    ->update(['s_qty' => $stok_akhir_gdgSending]);

            //update gdg Produksi
            // DB::table('d_stock')
            //         ->where('s_item', $request->idItemMasuk)
            //         ->where('s_comp','6')
            //         ->where('s_position','6')
            //         ->update(['s_qty' => $stok_akhir_gdgProd]);

            // //cek qty mutasi
            // $total_qty_mutasi = DB::table('d_stock_mutation')
            //     ->selectRaw('sum(sm_qty) as totalMutasi')
            //     ->where('sm_stock',$request->modalIdStockInput)
            //     ->where('sm_item',$request->modalNamaItemInput)
            //     ->where('sm_comp',"2")
            //     ->first();
                
            // //jika jumlah qty pd mutasi sama dengan qty total pengiriman   
            // if ($total_qty_mutasi->totalMutasi == $request->modalTotalKirim || $total_qty_mutasi->totalMutasi < $request->modalFieldBatasAtas) 
            // {
            //     //update status to finish
            //     $update = DB::table('d_productresult')
            //         ->where('pr_id', $request->modalIdProductResultInput)
            //         ->update(['prdt_status' => "FN"]);
            // }            

            DB::commit();
            return response()->json([
                'status' => 'Sukses',
                'pesan' => 'Data Telah Berhasil di Update'
            ]);
        } 
        catch (\Exception $e) 
        {
            DB::rollback();
            return response()->json([
                'status' => 'gagal',
                'data' => $e->getMessage()
            ]);
        }
    }

    public function ubah_status_transaksi($dod_do, $dod_detailid)
    {
        //get recent status DO
        $recentStatusDo = DB::table('d_delivery_orderdt')
                            ->where('dod_do',$dod_do)
                            ->where('dod_detailid',$dod_detailid)
                            ->first();

        if ($recentStatusDo->dod_status == "WT") 
        {
            //update status to FN
            DB::table('d_delivery_orderdt')
                ->where('dod_do',$dod_do)
                ->where('dod_detailid',$dod_detailid)
                ->update(['dod_status' => "FN"]);
        }
        else
        {
            //update status to WT
            DB::table('d_delivery_orderdt')
                ->where('dod_do',$dod_do)
                ->where('dod_detailid',$dod_detailid)
                ->update(['dod_status' => "WT"]);
        }

        //get recent status Product Result detail
        $recentStatusPrdt = DB::table('d_productresult_dt')
                                ->where('prdt_productresult',$recentStatusDo->dod_prdt_productresult)
                                ->where('prdt_detail',$recentStatusDo->dod_prdt_detail)
                                ->first();

        if ($recentStatusPrdt->prdt_status != "RC") 
        {
            //update status to RC
            DB::table('d_productresult_dt')
                ->where('prdt_productresult',$recentStatusPrdt->prdt_productresult)
                ->where('prdt_detail',$recentStatusPrdt->prdt_detail)
                ->update(['prdt_status' => "RC"]);
        }
        else
        {
            //update status to SN
            DB::table('d_productresult_dt')
                ->where('prdt_productresult',$recentStatusPrdt->prdt_productresult)
                ->where('prdt_detail',$recentStatusPrdt->prdt_detail)
                ->update(['prdt_status' => "SN"]);
        }
        
        return response()->json([
            'status' => 'sukses',
            'pesan' => 'Status penerimaan telah berhasil diubah',
        ]);
    }

}
