<?php

namespace App\Http\Controllers\Penjualan;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use DB;
use Response;
use App\Http\Requests;
use Illuminate\Http\Request;

// use App\mmember

class POSRetailController extends Controller
{
    public function retail()
      {	

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

          $dataitem = DB::table('m_item')->get();

          // $leagues = DB::table('d_sales_dt')
          //   ->select('s_date','i_name', DB::raw("sum(sd_qty) as jumlah"))
          //   ->join('m_item', 'm_item.i_id', '=' , 'd_sales_dt.sd_item')
          //   ->join('d_sales', 'd_sales.s_id', '=' , 'd_sales_dt.sd_sales')
          //   ->groupBy('sd_item')
          //   ->where('s_channel','RT')
          //   ->get();

          $detalis = DB::table('d_sales')->where('s_channel','RT')->get();

          $detaliss = DB::table('d_sales_dt')
            ->join('d_sales', 'd_sales_dt.sd_sales', '=', 'd_sales.s_id' )
            ->join('m_item', 'm_item.i_id', '=' , 'd_sales_dt.sd_item')->get();

          $stock  = DB::table('d_stock')->where('s_comp','11')->where('s_position','11')
            ->join('m_item', 'm_item.i_id', '=', 'd_stock.s_item')
            ->get();

          //detail request
          $request = DB::table('d_transferitem')->get();
          $ket = 'create';

        return view('/penjualan/POSretail/index',compact('id_cust','fatkur','customers','dataitem', 'detalis','cek','leagues','detaliss', 'stock','idreq','request', 'ket'));
      }

    public function edit_sales($id)
      {
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

          $dataitem = DB::table('m_item')->get();

          $detalis = DB::table('d_sales')->where('s_channel','RT')->get();

          $detaliss = DB::table('d_sales_dt')
            ->join('d_sales', 'd_sales_dt.sd_sales', '=', 'd_sales.s_id' )
            ->join('m_item', 'm_item.i_id', '=' , 'd_sales_dt.sd_item')->get();

          $stock  = DB::table('d_stock')->where('s_comp','11')->where('s_position','11')
            ->join('m_item', 'm_item.i_id', '=', 'd_stock.s_item')
            ->get();

          $edit = DB::table('d_sales')
          ->select('c_id','c_code','c_name','c_hp','c_address','c_type','c_insert','c_update',
                    'd_sales.s_id as sd_id','s_channel','s_date','s_note','s_staff','s_customer','s_gross',
                    's_disc_percent','s_disc_value','s_tax','s_net','s_status','d_sales.s_insert as sd_insert',
                    'd_sales.s_update as sd_update','sd_sales','sd_detailid','sd_item','sd_qty','sd_price','sd_disc_percent',
                    'sd_disc_value','sd_total','i_id','i_code','i_type','i_group','i_name','i_unit',
                    'i_price','i_price','i_insert','i_update','d_stock.s_id as d_id','s_comp',
                    's_position','s_item','s_qty','d_stock.s_insert as d_insert','d_stock.s_update as d_update')
          ->join('m_customer', 'm_customer.c_id', '=' , 'd_sales.s_customer')
          ->join('d_sales_dt','d_sales_dt.sd_sales','=','d_sales.s_id')
          ->join('m_item','m_item.i_id','=','d_sales_dt.sd_item')
          ->join('d_stock','d_stock.s_item','=','d_sales_dt.sd_item')
          ->where('s_comp','11')
          ->where('s_position','11')
          ->where('s_status','DR')
          ->where('d_sales.s_id',$id)
          ->get();
          //dd($edit);

          $request = DB::table('d_transferitem')->get();
          $ket = 'edit';

        return view('/penjualan/POSretail/index',compact('id_cust','fatkur','customers','dataitem', 'detalis','cek','leagues','detaliss', 'stock','idreq','request','edit', 'ket'));
      }

    public function detail(Request $request)
    {
          $detaliss = DB::table('d_sales_dt')
                        ->select('*')
            ->join('d_sales', 'd_sales_dt.sd_sales', '=', 'd_sales.s_id' )
            ->join('m_item', 'm_item.i_id', '=' , 'd_sales_dt.sd_item')
            ->where('sd_sales','=',$request->x)->get();

        return view('/penjualan/POSretail/NotaPenjualan.detail',compact('detaliss'));
    }

    public function store(Request $request)
      {

        $maxid = DB::Table('m_customer')->select('c_id')->max('c_id');
         if ($maxid <= 0 || $maxid <= '') {
            $maxid  = 1;
          }else{
            $maxid += 1;
          }

          $tanggal = Carbon::createFromFormat('d/m/Y', $request->tgl_lahir, 'Asia/Jakarta');

        $customer = DB::table('m_customer')
              ->insert([
                'c_id' => $maxid,
                'c_code' => $request->id_cus_ut,
                'c_name' => $request->nama_cus,
                'c_birthday' => $tanggal,
                'c_email' => $request->email,
                'c_hp' => $request->no_hp,
                'c_address' => $request->alamat,
                'c_type' =>'RT',
                'c_insert' => Carbon::now(),
                'c_update' => $request->c_update
              ]);
      }    

    public function autocomplete(Request $request)
     {

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

    public function autocompleteitem(Request $request)
      {

        $term = $request->term;

        $results = array();
      
        $queries = DB::table('m_item')

          ->leftJoin('d_stock','m_item.i_id','=', 'd_stock.s_item')

          ->orWhere(function ($b) use ($term) {
                    $b->where('s_comp','11')
                      ->where('s_position','11');
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
            $results[] = [ 'id' => $query->i_id, 
                           'label' => $query->i_code .' - '. $query->i_name,
                           'harga' => $query->i_price, 
                           'kode' => $query->i_id, 
                           'nama' => $query->i_name, 
                           'satuan' => $query->i_unit, 
                           's_qty'=>$query->s_qty 
                         ];
          }
        }
   
        return Response::json($results); 
        }

    public function autocompletereq(Request $request)
      {
        $term = $request->term;

        $results = array();
        
        $queries = DB::table('m_item')

          ->leftJoin('d_stock','m_item.i_id','=', 'd_stock.s_item')

          ->where(function ($b) use ($term) {
                    $b->where('s_comp','11')
                      ->where('s_position','11');
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

    public function setnama($id)
      {

       $setnama = DB::table('m_customer')->where('c_name',$id)->first();

        return Response::json($setnama);
      }

    public function setitem($flag)
      {

       $setnama = DB::table('m_item')->where('i_name',$flag)->orWhere('i_name',$flag)->first();
        return Response::json($setnama);
      }

    public function sal_save_final(Request $request)
      { 
             dd($request->all());
            $customer = DB::table('d_sales')
                ->insert([
                  's_id' =>$request->s_id,
                  's_channel' =>'RT',
                  's_date' =>date('Y-m-d',strtotime($request->s_date)),
                  's_note' =>$request->s_nota,
                  's_staff' =>$request->s_staff,
                  's_customer' => $request->id_cus,
                  's_disc_percent' => $request->s_disc_percent,
                  's_disc_value' => $request->s_disc_value,
                  's_gross' => ($this->konvertRp($request->s_gross)),
                  's_tax' => $request->s_pajak,
                  's_net' => ($this->konvertRp($request->s_gross)),
                  's_status' => 'FN',
                  's_insert' => Carbon::now(),
                  's_update' => $request->s_update
                  
                ]);

                $s_id= DB::table('d_sales')->max('s_id');

                for ($i=0; $i < count($request->kode_item); $i++) 
                {

                $stokRetail = DB::table('d_stock')
                ->where('s_comp','11')
                ->where('s_position','11')
                ->where('s_item',$request->kode_item[$i])->first(); 

                $d_sales_dt = DB::table('d_sales_dt')
                    ->insert([
                      'sd_sales'=>$s_id,
                      'sd_detailid'=>$i+1,
                      'sd_item'=>$request->kode_item[$i],
                      'sd_qty'=>$request->sd_qty[$i],
                      'sd_price'=>($this->konvertRp($request->harga_item[$i])),
                      'sd_disc_percent'=>$request->sd_disc_percent[$i],
                      'sd_disc_value'=>$request->sd_disc_value[$i]

                  ]);

                $stokBaru = $stokRetail->s_qty - $request->sd_qty[$i];

                DB::table("d_stock")
                ->where('s_comp','11')
                ->where('s_position','11')
                ->where("s_id", $stokRetail->s_id)
                ->update(['s_qty' => $stokBaru]);
                }
      }

    public function sal_save_draft(Request $request)
      {
          dd($request->all());
          $customer = DB::table('d_sales')
              ->insert([
                's_id' =>$request->s_id,
                's_channel' =>'RT',
                's_date' =>date('Y-m-d',strtotime($request->s_date)),
                's_note' =>$request->s_nota,
                's_staff' =>$request->s_staff,
                's_customer' => $request->id_cus,
                's_disc_percent' => $request->s_disc_percent,
                's_disc_value' => $request->s_disc_value,
                's_gross' => ($this->konvertRp($request->s_gross)),
                's_tax' => $request->s_pajak,
                's_net' => ($this->konvertRp($request->s_gross)),
                's_status' => 'DR',
                's_insert' => Carbon::now(),
                's_update' => $request->s_update
                
              ]);

              $s_id= DB::table('d_sales')->max('s_id');

              for ($i=0; $i < count($request->kode_item); $i++) 
              { 

              $d_sales_dt = DB::table('d_sales_dt')
                  ->insert([
                    'sd_sales'=>$s_id,
                    'sd_detailid'=>$i+1,
                    'sd_item'=>$request->kode_item[$i],
                    'sd_qty'=>$request->sd_qty[$i],
                    'sd_price'=>($this->konvertRp($request->harga_item[$i])),
                    'sd_total'=>($this->konvertRp($request->hasil[$i])),
                    'sd_disc_percent'=>$request->sd_disc_percent[$i],
                    'sd_disc_value'=>$request->sd_disc_value[$i]
                ]);
                
              }
      }

    public function distroy($id){

      DB::table('d_sales')->where('s_id',$id)->where('s_status','DR')->delete();

     return redirect('/penjualan/POSretail/index');
    }
    
    public function konvertRp($value){

      $value = str_replace(['Rp', '\\', '.', ' '], '', $value);
      return str_replace(',', '.', $value);

      }

    public function detail_request_save(Request $request)
      {

        DB::table('d_transferitem')
        ->insert([
            'ti_id'=>$request->ri_id,
            'ti_date'=>$request->ri_tanggal,
            'ti_code'=>$request->ri_nomor,
            'ti_transferstaff'=>$request->ri_admin,
            'ti_note'=>$request->ri_keterangan
        ]);

         $ri_id= DB::table('d_transferitem')->max('ri_id');

              for ($i=0; $i < count($request->kode_item); $i++) 
              { 

              DB::table('d_transferitem_dt')
                  ->insert([
                    'trd_transfer'=>$ri_id,
                    'trd_detail'=>$i+1,
                    'trd_item'=>$request->kode_item[$i],
                    'trd_qty'=>$request->sd_qty[$i]
                ]);
      }
    }

    public function getTanggal($tgl1,$tgl2){

      $y = substr($tgl1, -4);
      $m = substr($tgl1, -7,-5);
      $d = substr($tgl1,0,2);
       $tgll = $y.'-'.$m.'-'.$d;

      $y2 = substr($tgl2, -4);
      $m2 = substr($tgl2, -7,-5);
      $d2 = substr($tgl2,0,2);
        $tgl2 = $y2.'-'.$m2.'-'.$d2;

      $detalis = DB::table('d_sales')
        ->where('s_channel','RT')
        ->where('s_date','>=',$tgll)
        ->where('s_date','<=',$tgl2)
        ->get();

      return view('/penjualan/POSretail/NotaPenjualan.dt_notaJual',compact('detalis'));
      }

    function getTanggalJual($tgl1,$tgl2){

      $y = substr($tgl1, -4);
      $m = substr($tgl1, -7,-5);
      $d = substr($tgl1,0,2);
       $tgll = $y.'-'.$m.'-'.$d;

      $y2 = substr($tgl2, -4);
      $m2 = substr($tgl2, -7,-5);
      $d2 = substr($tgl2,0,2);
        $tgl2 = $y2.'-'.$m2.'-'.$d2;

      $leagues = DB::table('d_sales_dt')
        ->select('sd_item','s_date','i_name', DB::raw("sum(sd_qty) as jumlah"))
        ->join('m_item', 'm_item.i_id', '=' , 'd_sales_dt.sd_item')
        ->join('d_sales', 'd_sales.s_id', '=' , 'd_sales_dt.sd_sales')
        ->where('s_channel','RT')
        ->where('s_date','>=',$tgll)
        ->where('s_date','<=',$tgl2)
        ->groupBy('sd_item','i_name')
        ->get();

        return view('/penjualan/POSretail/ItemPenjualan.Data_JualRetail',compact('leagues'));
        }

}

    // public function detailReq(Request $request)
    // {
    //     $request = DB::table('d_transferitem_dt')
    //         ->join('d_transferitem','d_transferitem.ti_id','=','d_transferitem_dt.tidt_id')
    //         ->join('m_item','m_item.i_id','=','d_transferitem_dt.tidt_item')
    //         ->where('ti_id','=',$request->r)->get();

    //     return view('/penjualan/POSretail.detail_request',compact('request'));
    // }

