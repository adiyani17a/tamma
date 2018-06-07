<?php

namespace App\Http\Controllers\master;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use DB;
use Response;
use App\Http\Requests;
use Illuminate\Http\Request;
use DataTables;
use URL;

// use App\mmember

class barangController extends Controller
{

    public function barang()
    {
        return view('master.databarang.barang');
    }

    public function datatable_barang()
    {
        $list = DB::select("SELECT * from m_item  join m_price on m_price.m_pitem = m_item.i_id ");
        // return $list;
        $data = collect($list);
        
        // return $data;

        return Datatables::of($data)
            
                ->addColumn('aksi', function ($data) {

                         return  '<button id="edit" onclick="edit(this)" class="btn btn-warning btn-sm" title="Edit"><i class="glyphicon glyphicon-pencil"></i></button>'.'
                                        <button id="delete" onclick="hapus(this)" class="btn btn-danger btn-sm" title="Hapus"><i class="glyphicon glyphicon-trash"></i></button>';
                })
                ->addColumn('none', function ($data) {
                    return '-';
                })
                ->rawColumns(['aksi','confirmed'])
                ->make(true);
    }

    public function tambah_barang()
    {
        
        $satuan  = DB::table('m_satuan')->get();
        $group  = DB::table('m_group')->get();
        return view('master.databarang.tambah_barang',compact('kode','group','satuan'));
    }
    public function kode_barang(Request $request)
    {
        $kode = DB::Table('m_item')->max('i_id');
        $group = DB::Table('m_group')->where('m_gcode','=',$request->id)->first();
        json_encode($group);
        if ($kode <= 0 || $kode <= '') {
            $kode  = 1;
        }else{
            $kode += 1;
        }
        
        $kode = str_pad($kode, 3, '0', STR_PAD_LEFT);
        $tanggal = date("ym");
        
        $kode = $group->m_gcode.$tanggal.'/'.$kode;
        return response()->json([$kode]);
    }
    public function simpan_barang(Request $request)
    {
        // dd($request->all());
        $tanggal = date("Y-m-d h:i:s");

        $kode = DB::Table('m_item')->max('i_id');

        if ($kode <= 0 || $kode <= '') {
            $kode  = 1;
        }else{
            $kode += 1;
        }

        $data_item = DB::table('m_item')
                ->insert([
                    'i_id' => $kode,
                    'i_name'=>$request->nama,
                    'i_type' => $request->type,
                    'i_code'=> $request->kode_barang,
                    'i_group'=> $request->code_group,
                    'i_code_group'=> $request->code_group,
                    'i_sat1'=>$request->satuan1,
                    'i_sat_isi1'=> $request->isi_sat1,

                    'i_sat2'=>$request->satuan2,
                    'i_sat_isi2'=> $request->isi_sat2,

                    'i_sat3'=>$request->satuan3,
                    'i_sat_isi3'=> $request->isi_sat3,

                    'i_insert'=>$tanggal,
                    'i_detail'=>$request->detail,
                    'i_weight'=>$request->berat,
                    
                    'i_minstock'=>$request->min_stock,

                ]);


        //------------------------//


        $kode_price = DB::Table('m_price')->max('m_pid');

        if ($kode_price <= 0 || $kode_price <= '') {
            $kode_price  = 1;
        }else{
            $kode_price += 1;
        }

        $data_price = DB::table('m_price')
                ->insert([
                    'm_pid'=>$kode_price,
                    'm_pitem'=>$kode,
                    'm_pbuy'=>$request->harga,
                ]);
    return response()->json(['status'=>1]);
    }
    public function hapus_barang(Request $request)
    {
      // dd($request->all());
      $data = DB::table('m_item')->where('i_id','=',$request->id)->delete();
      $data = DB::table('m_price')->where('m_pitem','=',$request->id)->delete();

      return response()->json(['status'=>1]);
    }
    public function edit_barang(Request $request)
    {
      $satuan  = DB::table('m_satuan')->get();
      $data_item = DB::table('m_item')->where('i_id','=',$request->id)->first();
      $data_price = DB::table('m_price')->where('m_pitem','=',$request->id)->first();
      json_encode($data_item);
      json_encode($data_price);
      $group  = DB::table('m_group')->get();
      return view('master/databarang/edit_barang',compact('data_item','data_price','satuan','group'));
    }
    public function update_barang(Request $request)
    {
        // dd($request->all());
        $tanggal = date("Y-m-d h:i:s");

        $data_item = DB::table('m_item')
                ->where('i_id','=',$request->kode_old)
                ->update([
                    'i_name'=>$request->nama,
                    'i_type' => $request->type,
                    'i_code'=> $request->kode_barang,
                    'i_group'=> $request->code_group,
                    'i_code_group'=> $request->code_group,
                    'i_sat1'=>$request->satuan1,
                    'i_sat_isi1'=> $request->isi_sat1,

                    'i_sat2'=>$request->satuan2,
                    'i_sat_isi2'=> $request->isi_sat2,

                    'i_sat3'=>$request->satuan3,
                    'i_sat_isi3'=> $request->isi_sat3,

                    'i_update'=>$tanggal,
                    'i_detail'=>$request->detail,
                    'i_weight'=>$request->berat,
                    
                    'i_minstock'=>$request->min_stock,

                ]);


        //------------------------//

        $data_price = DB::table('m_price')
                ->where('m_pid','=',$request->kode_old)                
                ->update([
                    'm_pbuy'=>$request->harga,
                    'm_pupdated'=>$tanggal,
                ]);
    return response()->json(['status'=>1]);
    }

    public function cari_group_barang(Request $request)
    {
      $data = DB::table('m_group')->where('m_gtype','=',$request->id)->get();
    
      return response()->json($data);
    }

}

