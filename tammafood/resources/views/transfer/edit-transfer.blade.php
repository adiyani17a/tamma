
                    <form action="get" id="save_request">
                            <div class="col-md-12 col-sm-12 col-xs-12 tamma-bg" style="margin-bottom: 20px; padding-bottom:5px;padding-top:20px; ">

                                <div class="col-md-4 col-sm-3 col-xs-12"> 
                              
                                  <label class="tebal">No Transfer</label>
                                  
                                </div>
                                <div class="col-md-8 col-sm-9 col-xs-12">
                                  <div class="form-group">
                                        <input type="text" id="" readonly="true" name="ri_nomor" value="{{$transferItem->ti_code}}" class="form-control input-sm">
                                  </div>
                                </div>
                                <div class="col-md-4 col-sm-3 col-xs-12">
                                  
                                      <label class="tebal" name="admin">Admin</label>
                                  
                                </div>
                                <div class="col-md-8 col-sm-9 col-xs-12">
                                  <div class="form-group">
                                    <div class="input-icon right">
                                      <i class="glyphicon glyphicon-user"></i>
                                      <input type="text" id="" readonly="true" name="admin" class="form-control input-sm" \
                                      value="{{ Auth::user()->m_name }}"> 
                                      <input type="hidden" id="" readonly="true" name="ri_admin" class="form-control input-sm" value="{{ Auth::user()->m_id }}">      
                                    </div>                           
                                  </div>
                                </div>
                                <div class="col-md-4 col-sm-3 col-xs-12">
                                  
                                      <label class="tebal">Tanggal</label>
                                  
                                </div>
                                <div class="col-md-8 col-sm-9 col-xs-12">
                                  <div class="form-group">
                                    <div class="input-icon right">
                                      <i class="glyphicon glyphicon-envelope"></i>
                                      <input type="text" readonly="true" name="ri_tanggal" class="form-control input-sm" value="{{ date('d-m-Y',strtotime($transferItem->ti_time))}}">
                                    </div>                                
                                  </div>
                                </div>
                                <div class="col-md-4 col-sm-3 col-xs-12">
                                  
                                      <label class="tebal">Ket</label>
                                  
                                </div>
                                <div class="col-md-8 col-sm-9 col-xs-12">
                                  <div class="form-group">
                                    <div class="input-icon right">
                                      <i class="glyphicon glyphicon-envelope"></i>
                                      <input type="text" id="" name="ri_keterangan" class="form-control input-sm" value="{{$transferItem->ti_note}}">
                                    </div>                                
                                  </div>
                                </div>
                            </div>
                        <div class="col-md-12 col-sm-12 col-xs-12 tamma-bg" style="margin-bottom: 20px; padding-bottom:20px;padding-top:20px; ">
                             <div class="col-md-6 col-sm-6 col-xs-12">
                               <label class="control-label tebal" >Masukan Kode / Nama</label>
                                  <div class="input-group input-group-sm" style="width: 100%;">
                                      <input type="text" id="rnamaitem" name="rnamaitem" class="form-control">
                                      <input type="hidden" id="code" name="code" class="form-control">
                                      <input type="hidden" id="rkode" name="rsd_item" class="form-control">
                                      <input type="hidden" id="rdetailnama" name="rnama" class="form-control">                                     
                                      
                                  </div>
                              </div>        
                              <div class="col-md-6 col-sm-6 col-xs-12">
                               <label class="control-label tebal">Masukan Jumlah</label>
                                  <div class="input-group input-group-sm" style="width: 100%;">
                                     <input type="number" id="rqty" name="rqty" class="form-control" >
                                  </div>
                              </div>
                        </div> 
                      </form>
                        <div class="table-responsive">
                          <table class="table tabelan table-bordered table-hover dt-responsive" id="detail-req" style="width:100%" >
                           <thead align="right">
                            <tr>
                              <th width="10%">Kode</th>
                             <th width="70%">Nama Item</th>
                             <th width="10%">Jumlah</th>                            
                             <th width="10%"><button class="hidden" >add</button></th>
                            </tr>
                           </thead> 
                           <tbody>
                              @foreach($transferItemDt as $data)
                                    <tr>
                                      <td>{{$data->i_code}}</td>
                                      <td>{{$data->i_name}}</td>
                                      <td><input style="width: 100%" class="text-right" type="" name="" value="{{$data->tidt_qty}}"></td>
                                      <td class="text-center">
                                        <button type="button" class="btn btn-danger hapus btn-xs" onclick="rhapus(this)"><i class="fa fa-trash-o"></i></button>
                                      </td>
                                    </tr>
                              @endforeach
                           </tbody>
                          </table>
                        </div>
                    
                  


<script type="text/javascript">
   //transfer thoriq   
       tableReq=$('#detail-req').DataTable({
          "columns": [ { "width": "10%px" }, { "width": "70%" }, { "width": "10%" }, { "width": "10%" }],
          'columnDefs': [
              {
                  "targets": 3, // your case first column
                  "className": "text-center",
                  "width": "4%"
             }
          ],
       });
    $("#rnamaitem").autocomplete({
        source: baseUrl+'/penjualan/POSretail/retail/transfer-item',
        minLength: 1,
        select: function(event, ui) 
        {
          console.log(ui);
        $('#rnamaitem').val(ui.item.label);        
        $('#rkode').val(ui.item.id);
        $('#code').val(ui.item.code);
        $('#rdetailnama').val(ui.item.name);        
        $('#rqty').val(ui.item.qty);
        $("input[name='rqty']").focus();
        }
      });

        //enter stock
  $('#rqty').keypress(function(e){
      var charCode;
      if ((e.which && e.which == 13)) {
        charCode = e.which;
      }else if (window.event) {
          e = window.event;
          charCode = e.keyCode;
      }
      if ((e.which && e.which == 13)){
        var isi   = $('#rqty').val();
        var jumlah= $('#rdetailnama').val();
        if(isi == '' || jumlah == ''){
          toastr.warning('Item dan Jumlah tidak boleh kosong');
          return false;
      }
        tambahreq();
        $("#rnamaitem").val('');
        $("#rqty").val('');
        $("input[name='rnamaitem']").focus();
           return false;  
      }
   });

    var rindex=0;
    var rtamp=[];
            function tambahreq() {   
        var code  =$('#code').val(); 
        var kode  =$('#rkode').val();      
        var nama  =$('#rdetailnama').val();                                
        var qty   =parseInt($('#rqty').val());        
        var Hapus = '<button type="button" class="btn btn-danger hapus btn-xs text-center" onclick="rhapus(this)"><i class="fa fa-trash-o"></i></button>';
        var rindex = rtamp.indexOf(kode);

        if ( rindex == -1){     
            tableReq.row.add([
              code,
              nama+'<input type="hidden" name="kode_item[]" class="kode_item kode" value="'+kode+'"><input type="hidden" name="nama_item[]" class="nama_item" value="'+nama+'"> ',
              '<input style="text-align:right;width:100%" type="text"  name="sd_qty[]" class="sd_qty form-control r_qty-'+kode+'" value="'+qty+'"> ',
              
              Hapus
              ]);

            tableReq.draw();
        rindex++;
        // console.log(rtamp);
        rtamp.push(kode);
            }else{
            var qtyLawas= parseInt($(".r_qty-"+kode).val());
            $(".r_qty-"+kode).val(qtyLawas+qty);
            }

          var kode  =$('#rkode').val('');      
          var nama  =$('#rdetailnama').val('');
        }


        function rhapus(a){
    var par = a.parentNode.parentNode;
    tableReq.row(par).remove().draw(false);

  var inputs = document.getElementsByClassName( 'kode' ),
      names  = [].map.call(inputs, function( input ) {
          return input.value;
      });
      rtamp = names;

     }
</script>