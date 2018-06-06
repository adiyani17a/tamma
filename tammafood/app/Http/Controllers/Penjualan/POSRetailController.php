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

class POSRetailController extends Controller
{
  public function retail(){	
	  $year = carbon::now()->format('y');
    $month = carbon::now()->format('m');
    $date = carbon::now()->format('d');
    //select max dari um_id dari table d_uangmuka
    $maxid = DB::Table('m_customer')->select('c_id')->max('c_id');
    $idfatkur = DB::Table('d_sales')->select('s_id')->max('s_id');
    $idreq = DB::table('d_transferitem')->select('ti_id')->max('ti_id');
    //untuk +1 nilai yang ada,, jika kosong maka maxid = 1 , 
    if ($maxid <= 0 || $maxid <= '') {
      $maxid  = 1;
    }else{
      $maxid += 1;
    }
    if ($idfatkur <= 0 || $idfatkur <= '') {
      $idfatkur  = 1;
    }else{
      $idfatkur += 1;
    }
    if ($idreq <= 0 || $idreq <= '') {
      $idreq  = 1;
    }else{
      $idreq += 1;
    }
    //jika kurang dari 100 maka maxid mimiliki 00 didepannya
    if ($maxid < 100) {
      $maxid = '00'.$maxid;
    }

    $id_cust = 'CUS' . $month . $year . '/' . 'C001' . '/' .  $maxid; 
    $fatkur = 'XX'  . $year . $month . $date . $idfatkur;
    $idreq = 'REQ'  . $year . $month . $date . $idreq;

    $stock  = DB::table('d_stock')->where('s_comp','3')->where('s_position','3')
      ->join('m_item', 'm_item.i_id', '=', 'd_stock.s_item')
      ->get();

    $dataPayment = DB::table('m_paymentmethod')->get();

    $ket = 'create';

    return view('/penjualan/POSretail/index',compact('id_cust','fatkur', 'idreq','stock','dataPayment', 'ket'));
  }

  public function edit_sales($id){
    $year = carbon::now()->format('y');
    $month = carbon::now()->format('m');
    $date = carbon::now()->format('d');

    //select max dari um_id dari table d_uangmuka
    $maxid = DB::Table('m_customer')->select('c_id')->max('c_id');
    $idfatkur = DB::Table('d_sales')->select('s_id')->max('s_id');
    $idreq = DB::table('d_transferitem')->select('ti_id')->max('ti_id');
    //untuk +1 nilai yang ada,, jika kosong maka maxid = 1 , 

    if ($maxid <= 0 || $maxid <= '') {
      $maxid  = 1;
    }else{
      $maxid += 1;
    }

    if ($idfatkur <= 0 || $idfatkur <= '') {
      $idfatkur  = 1;
    }else{
      $idfatkur += 1;
    }

    if ($idreq <= 0 || $idreq <= '') {
      $idreq  = 1;
    }else{
      $idreq += 1;
    }
    //jika kurang dari 100 maka maxid mimiliki 00 didepannya
    if ($maxid < 100) {
      $maxid = '00'.$maxid;
    }

    $id_cust = 'CUS' . $month . $year . '/' . 'C001' . '/' .  $maxid; 
    $fatkur = 'XX'  . $year . $month . $date . $idfatkur;
    $idreq = 'REQ'  . $year . $month . $date . $idreq;

    $edit = DB::table('d_sales')
    ->join('m_customer', 'm_customer.c_id', '=' , 'd_sales.s_customer')
    ->join('d_sales_dt','d_sales_dt.sd_sales','=','d_sales.s_id')
    ->join('m_item','m_item.i_id','=','d_sales_dt.sd_item')
     ->join('m_price','m_price.m_pitem', '=','d_sales_dt.sd_item')
    ->where('d_sales.s_id',$id)
    ->get();

    $dataPayment = DB::table('m_paymentmethod')->get();

    $ket = 'edit';

    return view('/penjualan/POSretail/index',compact('id_cust','fatkur','idreq', 'stock','edit','dataPayment', 'ket'));
  }

  public function detail(Request $request){
    $detalis = DB::table('d_sales_dt')
      ->select( 'i_name',
                'sd_qty',
                'i_sat1',
                'm_psell',
                'sd_disc_percent',
                'sd_disc_value',
                'sd_total')
      ->join('d_sales', 'd_sales_dt.sd_sales', '=', 'd_sales.s_id' )
      ->join('m_item', 'm_item.i_id', '=' , 'd_sales_dt.sd_item')
      ->join('m_price','m_price.m_pitem', '=','d_sales_dt.sd_item')
      ->where('sd_sales','=',$request->x)
      ->get();
    
    return view('/penjualan/POSretail/NotaPenjualan.detail',compact('detalis'));
  }

  public function autocomplete(Request $request){
    $term = $request->term;

    $results = array();
    
    $queries = DB::table('m_customer')
      ->where('m_customer.c_name', 'LIKE', '%'.$term.'%')
      ->take(50)->get();
    
    if ($queries == null) {
      $results[] = [ 'id' => null, 'label' =>'tidak di temukan data terkait'];
    } else {
      foreach ($queries as $query) 
      {
        $results[] = [ 'id' => $query->c_id, 'label' => $query->c_name .'  '.$query->c_address, 'alamat' => $query->c_address.' '.$query->c_hp ];
      }
    }

    return Response::json($results);
  }

  public function autocompleteitem(Request $request){
    $term = $request->term;

    $results = array();
  
    $queries = DB::select('select * from m_item left join d_stock on i_id = s_item join m_price on i_id = m_pitem where ( i_name like "%'.$term.'%" or i_code like "%'.$term.'%" ) and ( i_type = "BP" or i_type = "BJ" ) and ( s_comp = 1 and s_position = 1 or s_comp is null or s_position is null ) limit 50');

    if ($queries == null) {
      $results[] = [ 'i_id' => null, 'label' =>'tidak di temukan data terkait'];
    } else {
      foreach ($queries as $query) 
      {
        $results[] = [ 'id' => $query->i_id, 
                       'label' => $query->i_code .' - '. $query->i_name,
                       'harga' => $query->m_psell, 
                       'kode' => $query->i_id, 
                       'nama' => $query->i_name, 
                       'satuan' => $query->i_sat1, 
                       's_qty'=>$query->s_qty 
                     ];
      }
    }

    return Response::json($results); 
  }

  public function autocompletereq(Request $request){
    $term = $request->term;

    $results = array();
    
    $queries = DB::table('m_item')

      ->leftJoin('d_stock','m_item.i_id','=', 'd_stock.s_item')

      ->where(function ($b) use ($term) {
                $b->where('s_comp','9')
                  ->where('s_position','9');
            })
      ->where(function ($d) use ($term) {
                $d->orWhere('m_item.i_type', 'LIKE', '%'.$term.'%')
                  ->orWhere('m_item.i_name', 'LIKE', '%'.$term.'%');
            })
      ->take(50)->get();
    if ($queries == null) {
      $results[] = [ 'i_id' => null, 'label' =>'tidak di temukan data terkait'];
    } else {
      foreach ($queries as $query) 
      {
        $results[] = [ 'id' => $query->i_id, 'label' => $query->i_code .' - '. $query->i_name,
                       'harga' => $query->i_price, 'kode' => $query->i_id, 'nama' => $query->i_name, 'satuan' => $query->i_unit, 'stok' => $query->s_qty ];
      }
    }
 
    return Response::json($results); 
  }




  public function store(Request $request){
    DB::beginTransaction();
    try {
    $year = carbon::now()->format('y');
    $month = carbon::now()->format('m');
    $date = carbon::now()->format('d');

    $maxid = DB::Table('m_customer')->select('c_id')->max('c_id');

     if ($maxid <= 0 || $maxid <= '') {
        $maxid  = 1;
      }else{
        $maxid += 1;
      }

    if ($maxid < 100) {
      $maxid = '00'.$maxid;
    }

    $id_cust = 'CUS' . $month . $year . '/' . 'C001' . '/' .  $maxid; 

    $customer = DB::table('m_customer')
          ->insert([
        'c_id' => $maxid,
        'c_code' => $id_cust,
        'c_name' => $request->nama_cus,
        'c_birthday' => $request->tgl_lahir,
        'c_email' => $request->email,
        'c_hp' => $request->no_hp,
        'c_address' => $request->alamat,
        'c_type' =>'RT',
        'c_insert' => Carbon::now(),
        'c_update' => $request->c_update
      ]);
    DB::commit();
    return response()->json([
          'status' => 'sukses'
      ]);
    } catch (\Exception $e) {
    DB::rollback();
    return response()->json([
        'status' => 'gagal',
        'data' => $e
      ]);
    }
}  

  public function sal_save_final(Request $request){ 
    DB::beginTransaction();
    try {
    $year = carbon::now()->format('y');
    $month = carbon::now()->format('m');
    $date = carbon::now()->format('d');

    $idfatkur = DB::Table('d_sales')->select('s_id')->max('s_id');

    if ($idfatkur <= 0 || $idfatkur <= '') {
      $idfatkur  = 1;
    }else{
      $idfatkur += 1;
    }
    $fatkur = 'XX'  . $year . $month . $date . $idfatkur;
    //end nota fatkur
    $customer = DB::table('d_sales')
        ->insert([
          's_id' => $request->s_id,
          's_channel' => 'RT',
          's_date' => date('Y-m-d',strtotime($request->s_date)),
          's_note' => $fatkur,
          's_staff' => $request->s_staff,
          's_customer' => $request->id_cus,
          's_gross' => ($this->konvertRp($request->s_gross)),
          's_disc_percent' => ($this->konvertRp($request->s_disc_percent)),
          's_disc_value' => ($this->konvertRp($request->s_disc_value)),
          's_tax' => $request->s_pajak,
          's_net' => ($this->konvertRp($request->s_net)),
          's_status' => 'FN',
          's_insert' => Carbon::now(),
          's_update' => $request->s_update
        ]);

        $s_id = DB::table('d_sales')->max('s_id');

        for ($i=0; $i < count($request->kode_item); $i++) {

        $stokRetail = DB::table('d_stock')
        ->where('s_comp','1')
        ->where('s_position','1')
        ->where('s_item',$request->kode_item[$i])
        ->first(); 

        $d_sales_dt = DB::table('d_sales_dt')
            ->insert([
              'sd_sales' => $s_id,
              'sd_detailid' => $i+1,
              'sd_item' => $request->kode_item[$i],
              'sd_qty' => $request->sd_qty[$i],
              'sd_price' => ($this->konvertRp($request->harga_item[$i])),
              'sd_disc_percent' => $request->sd_disc_percent[$i],
              'sd_disc_value' => $request->sd_disc_value[$i],
              'sd_total' => ($this->konvertRp($request->hasil[$i]))
          ]);

        $stokBaru = $stokRetail->s_qty - $request->sd_qty[$i];

        DB::table("d_stock")
        ->where('s_comp','1')
        ->where('s_position','1')
        ->where("s_id", $stokRetail->s_id)
        ->update(['s_qty' => $stokBaru]);
        }

      for ($i=0; $i < count($request->sp_method); $i++) {

      $d_sales_payment = DB::table('d_sales_payment')
          ->insert([
              'sp_sales' => $s_id,
              'sp_paymentid' => $i+1,
              'sp_method' => $request->sp_method[$i],
              'sp_nominal' => ($this->konvertRp($request->sp_nominal[$i]))
          ]);
        } 
    DB::commit();
    return response()->json([
          'status' => 'sukses'
      ]);
    } catch (\Exception $e) {
    DB::rollback();
    return response()->json([
        'status' => 'gagal',
        'data' => $e
      ]);
    }
  }

  public function sal_save_draft(Request $request){
    DB::beginTransaction();
    try {
    $year = carbon::now()->format('y');
    $month = carbon::now()->format('m');
    $date = carbon::now()->format('d');

    $idfatkur = DB::Table('d_sales')->select('s_id')->max('s_id');

    if ($idfatkur <= 0 || $idfatkur <= '') {
      $idfatkur  = 1;
    }else{
      $idfatkur += 1;
    }
    $fatkur = 'XX'  . $year . $month . $date . $idfatkur;
    //end nota fatkur
    $customer = DB::table('d_sales')
        ->insert([
          's_id' =>$request->s_id,
          's_channel' =>'RT',
          's_date' =>date('Y-m-d',strtotime($request->s_date)),
          's_note' =>$fatkur,
          's_staff' =>$request->s_staff,
          's_customer' => $request->id_cus,
          's_disc_percent' => $request->s_disc_percent,
          's_disc_value' => ($this->konvertRp($request->totalDiscount)),
          's_gross' => ($this->konvertRp($request->s_gross)),
          's_tax' => $request->s_pajak,
          's_net' => ($this->konvertRp($request->s_gross)),
          's_status' => 'DR',
          's_insert' => Carbon::now(),
          's_update' => $request->s_update
          
        ]);

        $s_id= DB::table('d_sales')->max('s_id');

        for ($i=0; $i < count($request->kode_item); $i++) { 

        $d_sales_dt = DB::table('d_sales_dt')
            ->insert([
              'sd_sales' => $s_id,
              'sd_detailid' => $i+1,
              'sd_item' => $request->kode_item[$i],
              'sd_qty' => $request->sd_qty[$i],
              'sd_price' => ($this->konvertRp($request->harga_item[$i])),
              'sd_disc_percent' => $request->sd_disc_percent[$i],
              'sd_disc_value' => ($this->konvertRp($request->sd_disc_value[$i])),
              'sd_total' => ($this->konvertRp($request->hasil[$i]))
          ]);
          
            }
    DB::commit();
    return response()->json([
          'status' => 'sukses'
      ]);
    } catch (\Exception $e) {
    DB::rollback();
    return response()->json([
        'status' => 'gagal',
        'data' => $e
      ]);
    }
  }

  public function sal_save_finalUpdate(Request $request){
    // dd($request->all());
    return DB::transaction(function () use ($request) {

     $s_id = $request->s_id;
      
     $m = DB::table('d_sales')->where('s_id',$request->s_id)->first();

     // if ($m->s_status == 'DR') {

        DB::table('d_sales')->where('s_id',$request->sd_id)
          ->update([
            's_channel' => 'GR',
            's_date' => date('Y-m-d',strtotime($request->s_date)),
            's_note' => $request->s_nota,
            's_staff' => $request->s_staff,
            's_customer' => $request->id_cus,
            's_disc_percent' => $request->s_disc_percent,
            's_disc_value' => $request->s_disc_value,
            's_gross' => ($this->konvertRp($request->s_gross)),
            's_tax' => $request->s_pajak,
            's_net' => ($this->konvertRp($request->s_gross)),
            's_status' => "TK",
            's_insert' => Carbon::now(),
            's_update' => $request->s_update
          ]);

            for ($i=0; $i < count($request->kode_item); $i++) {

            $stokRetail = DB::table('d_stock')
              ->where('s_comp','1')
              ->where('s_position','1')
              ->where('s_item',$request->kode_item[$i])->first(); 

          
          if ($request->sd_sales[$i] == null ){ 
            $sd_detailid=DB::table('d_sales_dt')->where('sd_sales',$s_id)->max('sd_detailid');
            $d_sales_dt = DB::table('d_sales_dt')
              ->where('sd_sales',$s_id)
                ->insert([
                  'sd_sales' =>$s_id,
                  'sd_detailid'=>$sd_detailid+1,
                  'sd_qty'=>$request->sd_qty[$i],
                  'sd_price'=>($this->konvertRp($request->harga_item[$i])),
                  'sd_item'=>$request->kode_item[$i],
                  'sd_disc_percent'=>$request->sd_disc_percent[$i],
                  'sd_disc_value'=>$request->sd_disc_value[$i],
                  'sd_total'=>($this->konvertRp($request->hasil[$i]))

          ]);
                     
          }else{

           $d_sales_dt = DB::table('d_sales_dt')
              ->where('sd_sales',$s_id)
              ->where('sd_detailid',$request->sd_detailid[$i])
                ->update([                        
                  'sd_item'=>$request->kode_item[$i],
                  'sd_qty'=>$request->sd_qty[$i],
                  'sd_price'=>($this->konvertRp($request->harga_item[$i])),
                  'sd_disc_percent'=>$request->sd_disc_percent[$i],
                  'sd_disc_value'=>$request->sd_disc_value[$i],
                  'sd_total'=>($this->konvertRp($request->hasil[$i]))
          ]);

          $stokBaru = $stokRetail->s_qty - $request->sd_qty[$i];

          DB::table("d_stock")
          ->where('s_comp','1')
          ->where('s_position','1')
          ->where("s_id", $stokRetail->s_id)
          ->update(['s_qty' => $stokBaru]);
          }

          for ($i=0; $i < count($request->sp_method); $i++) {

          $d_sales_payment = DB::table('d_sales_payment')
              ->insert([
                  'sp_sales' => $s_id,
                  'sp_paymentid' => $i+1,
                  'sp_method' => $request->sp_method[$i],
                  'sp_nominal' => ($this->konvertRp($request->sp_nominal[$i]))
              ]);
            }
          }
        // }
    });
  }

  public function distroy($id){
    DB::table('d_sales')
      ->where('s_id',$id)
      ->where('s_status','DR')
      ->delete();

   return redirect('/penjualan/POSretail/index');
  }
  
  public function konvertRp($value){

    $value = str_replace(['Rp', '\\', '.', ' '], '', $value);
    return str_replace(',', '.', $value);

    }

  public function getTanggal($tgl1,$tgl2,$tampil){

    $y = substr($tgl1, -4);
    $m = substr($tgl1, -7,-5);
    $d = substr($tgl1,0,2);
     $tgll = $y.'-'.$m.'-'.$d;

    $y2 = substr($tgl2, -4);
    $m2 = substr($tgl2, -7,-5);
    $d2 = substr($tgl2,0,2);
      $tgl2 = $y2.'-'.$m2.'-'.$d2;

    if ($tampil == 'semua') {
      $detalis = DB::table('d_sales')
        ->join('m_customer','m_customer.c_id','=','d_sales.s_customer')
        ->where('s_channel','RT')
        ->where('s_date','>=',$tgll)
        ->where('s_date','<=',$tgl2)
        ->get();
    }elseif ($tampil == 'draft') {
      $detalis = DB::table('d_sales')
        ->join('m_customer','m_customer.c_id','=','d_sales.s_customer')
        ->where('s_channel','RT')
        ->where('s_status','DR')
        ->where('s_date','>=',$tgll)
        ->where('s_date','<=',$tgl2)
        ->get();
    }else{
        $detalis = DB::table('d_sales')
          ->join('m_customer','m_customer.c_id','=','d_sales.s_customer')
          ->where('s_channel','RT')
          ->where('s_status','FN')
          ->where('s_date','>=',$tgll)
          ->where('s_date','<=',$tgl2)
          ->get();
    }
    
    // return view('/penjualan/POSretail/NotaPenjualan.dt_notaJual',compact('detalis'));
    return DataTables::of($detalis)
        // ->addIndexColumn()
        ->editColumn('sDate', function ($data) 
        {
            return date('d M Y', strtotime($data->s_date));
        })
        ->editColumn('sGross', function ($data) 
        {
            return number_format( $data->s_gross ,2,',','.');
        })
        ->editColumn('status', function ($data)  {
            if ($data->s_status == "DR") 
            {
                return 'Draft';
            }
            elseif ($data->s_status == "FN") 
            {
                return 'Final';
            }
        })
        ->addColumn('action', function($data)
        {
          if ($data->s_status == 'FN') { $attr = 'disabled'; } else { $attr = ''; };
          $linkEdit = URL::to('/penjualan/POSretail/retail/edit_sales/'.$data->s_id);
          // $linkHapus = URL::to('/penjualan/POSretail/retail/distroy/'.$data->s_id);
          return  '<div class="text-center">
                      <button type="button" 
                          class="btn btn-success fa fa-eye btn-sm" 
                          title="detail" 
                          data-toggle="modal" 
                          onclick="lihatDetail('."'".$data->s_id."'".')" 
                          data-target="#myItem">
                      </button>
                      <a href="'.$linkEdit.'" 
                          class="btn btn-warning btn-sm" 
                          title="Edit" '.$attr.'>
                          <i class="fa fa-pencil"></i>
                      </a>
                      <a  onclick="distroyNota('.$data->s_id.')"
                          class="btn btn-danger btn-sm" 
                          title="Hapus" '.$attr.'>
                          <i class="fa fa-trash-o"></i></a>
                    </div>'; 
          })
        //inisisai column status agar kode html digenerate ketika ditampilkan
        ->rawColumns(['action'])
        ->make(true);
  }

  function getTanggalJual($tgl1,$tgl2)
  {
    $y = substr($tgl1, -4);
    $m = substr($tgl1, -7,-5);
    $d = substr($tgl1,0,2);
     $tgll = $y.'-'.$m.'-'.$d;

    $y2 = substr($tgl2, -4);
    $m2 = substr($tgl2, -7,-5);
    $d2 = substr($tgl2,0,2);
      $tgl2 = $y2.'-'.$m2.'-'.$d2;

    $leagues = DB::table('d_sales_dt')
      ->select('sd_item','s_date','i_name','i_type','i_group', DB::raw("sum(sd_qty) as jumlah"))
      ->join('m_item', 'm_item.i_id', '=' , 'd_sales_dt.sd_item')
      ->join('d_sales', 'd_sales.s_id', '=' , 'd_sales_dt.sd_sales')
      ->where('s_channel','RT')
      ->where('s_status','FN')
      ->where('s_date','>=',$tgll)
      ->where('s_date','<=',$tgl2)
      ->groupBy('sd_item','i_name')
      ->get();

    return DataTables::of($leagues)
      ->addIndexColumn()
      ->editColumn('sDate', function ($data) 
      {
        return date('d M Y', strtotime($data->s_date));
      })
      ->editColumn('type', function ($data) 
      {
          if ($data->i_type == "BJ") 
          {
              return 'Barang Jual';
          }
          elseif ($data->i_type == "BP") 
          {
              return 'Barang Produksi';
          }
      })
      ->make(true);
  }
      
  public function PayMethode(Request $request){
    $paymethode=DB::table('m_paymentmethod')
      ->select('pm_id','pm_name')
      //->where('pm_id','!=',$request->data0)
      ->get();
    $data = array();
    foreach ($paymethode as $value) {
      $data[] = (array) $value;
    }
    for ($j=0; $j<count($data); $j++) {
      for($i=0; $i<$request->length; $i++){
        if($data[$j]['pm_id'] == $request->{'data'.$i})
          $data[$j]['pm_id']=0;
      }
    }
    $idx=0;
    foreach ($data as $key) {
      if($key['pm_id'] == 0){
        unset($data[$idx]);
      }
      $idx++;
    } 

    $data2 = array();
    foreach ($data as $key => $value) {
      $data2[] = (array) $value;
    }
    echo json_encode($data2);
  }

  public function setBarcode(Request $request){
    $data = DB::table('m_item')
        ->select( 'i_id',
                  'i_code',
                  'i_name',
                  'm_psell',
                  'i_sat1',
                  's_qty')
        ->join('d_stock','d_stock.s_item','=','m_item.i_id')
        ->join('m_price','m_price.m_pitem','=','m_item.i_id')
        ->where('s_comp','1')
        ->where('s_position','1')
        ->where('i_code', 'like', '%'.$request->code.'%')
        ->get();

    return Response::json($data); 
  }
}


