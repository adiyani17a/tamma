<!-- detail order-->
<div class="modal fade" id="table-production-plan" role="dialog">
  <div class="modal-dialog modal-lg"">
  
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header" style="background-color: #e77c38;">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title" style="color: white;">Rencana Produksi</h4>
        </div>
        <div class="modal-body">

            <div class="row">
                              <div class="panel-body">

                                
                                  <div class="col-md-2 col-sm-3 col-xs-12">
                                    <label class="tebal">Tanggal Belanja</label>
                                  </div>

                                  <div class="col-md-4 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                      <div class="input-daterange input-group">
                                        <input id="pp_date1" class="form-control input-sm datepicker2 " name="tanggal" type="text" value="12-04-2018">
                                        <span class="input-group-addon">-</span>
                                        <input id="pp_date2" class="input-sm form-control datepicker2" name="tanggal" type="text" value="12-04-2018">
                                      </div>
                                    </div>
                                  </div>
                                

                                  <div class="col-md-3 col-sm-3 col-xs-12" align="center">
                                    <button class="btn btn-primary btn-sm btn-flat autoCari" type="button" onclick="cariTanggal()">
                                      <strong>
                                        <i class="fa fa-search" aria-hidden="true"></i>
                                      </strong>
                                    </button>
                                    <button class="btn btn-info btn-sm btn-flat" type="button">
                                      <strong>
                                        <i class="fa fa-undo" aria-hidden="true"></i>
                                      </strong>
                                    </button>
                                  </div>

                                <div class="table-responsive" style="padding-top: 15px;">
                                  <div id="dt_nota_jual"> 

                                  </div>
                                </div>
                              </div>
                            </div>


          <div id="cari-plan">
              
          </div>
          
          
        </div>
            
       {{--  <div class="modal-footer">
          <button class="btn btn-link" type="button"><i class="glyphicon glyphicon-print"></i>&nbsp;Print</button>
          <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
          <button class="btn btn-primary" type="button">Posting</button>
          
        </div> --}}

      </div>
    
  </div>
</div>
<!-- end detail order-->

<script type="text/javascript">
   function BuatSpk(id,tgl,item,jumlah,iditem){
             $.ajax({
                        url         : baseUrl+'/produksi/spk/create-id',
                        type        : 'get',
                        timeout     : 10000,                          
                        dataType    :'json',
                        success     : function(response){
                                if(response.status=='sukses'){
                                    $('#id_spk').val(response.id_spk);
                                    $('#create').modal('show');
                                    $('#id_plan').val(id);
                                    $('#tgl_plan').val(tgl);
                                    $('#iditem').val(iditem);
                                    $('#item').val(item);
                                    $('#jumlah').val(jumlah);
                                    $('#tgl_spk').val(tgl);

                                    
                                }

                        }
              });
      }

    function cariTanggal(){
            var tanggal1=$('#pp_date1').val();
            var tanggal2=$('#pp_date2').val();
             $.ajax({
                        url         : baseUrl+'/produksi/spk/cari-data-plan',
                        type        : 'get',
                        timeout     : 10000,                                                  
                        data        :{'tanggal1':tanggal1,'tanggal2':tanggal2},
                        success     : function(response){                                
                                      $('#cari-plan').html(response);
                        }
              });
      }
</script>