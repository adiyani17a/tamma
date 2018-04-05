<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\d_transferItem;
use App\d_transferItemDt;
use DB;
use Validator;
use Carbon\Carbon;
use App\d_stock;
class transferItemController extends Controller
{
    public function noNota(){
        $year = carbon::now()->format('y');
        $month = carbon::now()->format('m');
        $date = carbon::now()->format('d');

    $idreq = d_transferItem::select('ti_id')->max('ti_id');        
        if ($idreq <= 0 || $idreq <= '') {
          $idreq  = 1;
        }else{
          $idreq += 1;
        }                
    $idreq = 'REQ'  . $year . $month . $date . $idreq;
        return json_encode($idreq);
    }
    public function index(){
        return view('transfer.index');
    }
     public function dataTransfer(){        
        $transferItem=d_transferItem::where('ti_order',DB::raw("'RT'"))->paginate();
        return view('transfer.table-transfer',compact('transferItem'));
    }
    public function simpanTransfer(Request $request)
    {
    return DB::transaction(function () use ($request) {
    	
    	$ti_id=d_transferItem::max('ti_id')+1;
    	d_transferItem::create([
    				'ti_id'			=>$ti_id,
    				'ti_time'		=>date('Y-m-d',strtotime($request->ri_tanggal)), 
    				'ti_code'		=>$request->ri_nomor, 
    				'ti_order'		=>'RT',
    				//'ti_orderstaff'	=>,
    				'ti_note'		=>$request->ri_keterangan,
    				
    	]);
    
    	for ($i=0; $i <count($request->kode_item) ; $i++) { 
    			$tidt_id=d_transferItemDt::where('tidt_id',$ti_id)->max('tidt_detail')+1;
    			 d_transferItemDt::create([
    				'tidt_id'			=>$ti_id,
    				'tidt_detail'		=>$tidt_id, 
    				'tidt_item'		=>$request->kode_item[$i], 
    				'tidt_qty'		=>$request->sd_qty[$i]
    			]);
    	}

    	$data=['status'=>'sukses'];    	
    	return json_encode($data);
       
    });

    }

    public function editTransfer(Request $request,$id)
    {
        
        $transferItem=d_transferItem::where('ti_id',$id)->first();
        $transferItemDt=d_transferItemDt::
                        join('m_item','d_transferitem_dt.tidt_item','=','m_item.i_id')->
                        where('tidt_id',$id)->get();
                        

        return view('transfer.edit-transfer',compact('transferItem','transferItemDt'));

    }

    public function updateTransfer(Request $request)
    {
    	return DB::transaction(function () use ($request) {    		
    	$ti_id=d_transferItem::max('ti_id')+1;
    	d_transferItem::create([
    				'ti_id'			=>$ti_id,
    				'ti_time'		=>date('Y-m-d',strtotime($request->ri_tanggal)), 
    				'ti_code'		=>$request->ri_nomor, 
    				'ti_order'		=>'RT',
    				//'ti_orderstaff'	=>,
    				'ti_note'		=>$request->ri_keterangan,
    				
    	]);
    
    	for ($i=0; $i <count($request->kode_item) ; $i++) { 
    			$tidt_id=d_transferItemDt::where('tidt_id',$ti_id)->max('tidt_detail')+1;
    			 d_transferItemDt::create([
    				'tidt_id'			=>$ti_id,
    				'tidt_detail'		=>$tidt_id, 
    				'tidt_item'		=>$request->kode_item[$i], 
    				'tidt_qty'		=>$request->sd_qty[$i]
    			]);
    	}
       
    });

    }

    public function HapusTransfer($id){
        return DB::transaction(function () use ($id) {
             $transferItem=d_transferItem::where('ti_id',$id);             
             if($transferItem->first()->ti_isapproved=='Y'){
                    $data=['status'=>'Gagal','info'=>'Maaf, Permintaan Transfer Item Telah di Setujui'];
                    return json_encode($data);
             }else{
                  $transferItem->delete();
                  $data=['status'=>'sukses'];
                return json_encode($data);
             }
             
        });
    }

    public function indexGrosir(){
        return view('transfer-grosir.index-grosir');
    }

    public function dataTransferAppr(){        
        $transferItem=d_transferItem::paginate();
        return view('transfer-grosir.table-transfer',compact('transferItem'));
    }
   
    public function grosirTransfer(){        
        $transferItem=d_transferItem::paginate();
        return view('transfer-grosir.grosir-transfer',compact('transferItem'));
    }
    public function approveTransfer($id){

        $transferItem=d_transferItem::where('ti_id',$id)->first();
        $transferItemDt=d_transferItemDt::
                        join('m_item','d_transferitem_dt.tidt_item','=','m_item.i_id')->
                        leftjoin('d_stock',function($join){
                        $join->on('i_id', '=', 's_item');        
                        $join->on('s_comp', '=', 's_position');                
                        $join->on('s_comp', '=',DB::raw("'3'"));           
                        })->  
                        where('tidt_id',$id)->get();
/*dd($transferItemDt);*/
        return view('transfer-grosir.approve-transfer',compact('transferItem','transferItemDt'));
    }

    public function simpanApprove(Request $request){
return DB::transaction(function () use ($request) {    


            for ($i=0; $i <count($request->tidt_id) ; $i++) {                 
                $transferItemDt=d_transferItemDt::                        
                                where('tidt_id',$request->tidt_id[$i])->
                                where('tidt_detail',$request->tidt_detail[$i]);

                $transferItemDt->update([
                    'tidt_qty_appr'=>$request->qtyAppr[$i],
                    'tidt_apprtime'=>date('Y-m-d g:i:s'),
                    'tidt_qty_send'=>$request->qtySend[$i],
                    'tidt_sendtime'=>date('Y-m-d g:i:s'),
                ]);

                //update qty grosir 3/3
                $stockGrosir=d_stock::                        
                       where('s_item',$request->tidt_item[$i])->
                       where('s_comp',DB::raw('3'))->
                       where('s_position',DB::raw('3'));
                if($stockGrosir->first()){
                            $stockGrosir->update([
                                's_qty'=>$stockGrosir->first()->s_qty-$request->qtySend[$i]
                            ]);
                }else{
                            DB::rollback();
                            $data=['status'=>'Gagal','info'=>'Stok Tidak Mencukupi'];
                            return json_encode($data);
                }



                //
                $stockRetailInGrosir=d_stock::                        
                       where('s_item',$request->tidt_item[$i])->
                       where('s_comp',DB::raw('11'))->
                       where('s_position',DB::raw('3'));
                       
                if($stockRetailInGrosir->first()){
                            $stockRetailInGrosir->update([
                                's_qty'=>$stockRetailInGrosir->first()->s_qty+$request->qtySend[$i]
                            ]);
                    }else{
                            $s_id=d_stock::max('s_id');
                            d_stock::create([
                                    's_id'      =>$s_id+1,
                                    's_comp'    =>11,
                                    's_position' =>3,
                                    's_item'    =>$request->tidt_item[$i],
                                    's_qty'     =>$request->qtySend[$i],

                            ]);
                    }
                    }


                $transferItem=d_transferItem::where('ti_id',$request->tidt_id);

                $transferItem->update([
                            'ti_isapproved'=>'Y',
                            'ti_issent'=>'Y'
                                ]);


               $data=['status'=>'sukses'];
               return json_encode($data);
        });
            
           
    }

     public function indexPenerimaanTransfer(){
        return view('transfer.penerimaan.index');
    }
     public function dataPenerimaanTransfer(){
        $transferItem=d_transferItem::where('ti_issent','Y')->paginate();
        return view('transfer.penerimaan.table-penerimaan',compact('transferItem'));
    }

    public function lihatPenerimaan($id){
              $transferItem=d_transferItem::where('ti_id',$id)->first();
        $transferItemDt=d_transferItemDt::
                        join('m_item','d_transferitem_dt.tidt_item','=','m_item.i_id')->
                        leftjoin('d_stock',function($join){
                        $join->on('i_id', '=', 's_item');        
                        $join->on('s_comp', '=', 's_position');                
                        $join->on('s_comp', '=',DB::raw("'11'"));           
                        })
                        ->where('tidt_id',$id)
                        ->get();
        return view('transfer.penerimaan.penerimaan-transfer',compact('transferItem','transferItemDt'));
    }

public function simpaPenerimaan(Request $request){
    return DB::transaction(function () use ($request) {         
            for ($i=0; $i <count($request->tidt_id) ; $i++) { 
                $transferItemDt=d_transferItemDt::                        
                                where('tidt_id',$request->tidt_id[$i])->
                                where('tidt_detail',$request->tidt_detail[$i]);

                $transferItemDt->update([
                    'tidt_qty_received'=>$request->qtyRecieved[$i],
                    'tidt_receivedtime'=>date('Y-m-d g:i:s'),
                ]);

                $stockPosisi=d_stock::                        
                       where('s_item',$request->tidt_item[$i])->
                       where('s_comp',DB::raw('11'))->
                       where('s_position',DB::raw('3'));
                if($stockPosisi->first()){
                            $stockPosisi->update([
                                's_qty'=>$stockPosisi->first()->s_qty-$request->qtyRecieved[$i]
                            ]);
                }else{
                            DB::rollback();
                            $data=['status'=>'Gagal','info'=>'Stok Tidak Mencukupi'];
                            return json_encode($data);
                }


                 $stockRetail=d_stock::                        
                       where('s_item',$request->tidt_item[$i])->
                       where('s_comp',DB::raw('11'))->
                       where('s_position',DB::raw('11'));
                if($stockRetail->first()){
                            $stockRetail->update([
                                's_qty'=>$stockRetail->first()->s_qty+$request->qtyRecieved[$i]
                            ]);
                }else{
                            $s_id=d_stock::max('s_id');
                            d_stock::create([
                                    's_id'      =>$s_id+1,
                                    's_comp'    =>11,
                                    's_position' =>11,
                                    's_item'    =>$request->tidt_item[$i],
                                    's_qty'     =>$request->qtyRecieved[$i],

                            ]);
                }


            }
               $data=['status'=>'sukses'];
               return json_encode($data);
           });
    }

    public function simpanTransferGrosir(Request $request){
        return DB::transaction(function () use ($request) {

        $ti_id=d_transferItem::max('ti_id')+1;
        d_transferItem::create([
                    'ti_id'         =>$ti_id,
                    'ti_time'       =>date('Y-m-d',strtotime($request->tf_tanggal)), 
                    'ti_code'       =>$request->tf_nomor, 
                    'ti_order'      =>'GR',
                    //'ti_orderstaff'   =>,
                    'ti_note'       =>$request->tf_keterangan,
                    'ti_isapproved' =>'Y',
                    'ti_issent' =>'Y',
                    
        ]);
    
        for ($i=0; $i <count($request->kode_item) ; $i++) { 
                $tidt_id=d_transferItemDt::where('tidt_id',$ti_id)->max('tidt_detail')+1;
                 d_transferItemDt::create([
                    'tidt_id'           =>$ti_id,
                    'tidt_detail'       =>$tidt_id, 
                    'tidt_item'     =>$request->kode_item[$i], 
                    'tidt_qty'      =>$request->sd_qty[$i],


                    'tidt_qty_appr'=>$request->sd_qty[$i],
                    'tidt_apprtime'=>date('Y-m-d g:i:s'),
                    'tidt_qty_send'=>$request->sd_qty[$i],
                    'tidt_sendtime'=>date('Y-m-d g:i:s'),
                ]);
        }

        $data=['status'=>'sukses'];     
        return json_encode($data);
       
    });
    }

     public function dataTransferGrosir(){        
        $transferItem=d_transferItem::where('ti_order','=','GR')->paginate();
        return view('transfer-grosir.data-transfer-grosir',compact('transferItem'));
    }
}
