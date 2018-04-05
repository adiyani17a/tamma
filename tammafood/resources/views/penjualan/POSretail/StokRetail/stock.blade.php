
<style type="text/css">
#loading {
  display: block;
  position: absolute;
  top: 0;
  left: 0;
  z-index: 100;
  width: 100%;
  height: 100%;
  background-color: rgba(192, 192, 192, 0.5);
  background-image: url("https://i.stack.imgur.com/MnyxU.gif");
  background-repeat: no-repeat;
  background-position: center;
}  
</style>
<div id="loading" style="display: none;"></div>
<div id="nav-stock" class="tab-pane fade">

  <!-- Modal -->
  @include('penjualan.POSretail.stokRetail.transfer')
  {{-- End modal --}}
  <div class="row" style="margin-top: 15px;">
    <div class="col-md-12 col-sm-12 col-xs-12">
            <!-- Trigger the modal with a button -->
           
      <div class="" align="right" style="margin-bottom: 15px;">
               <button  data-toggle="modal" onclick="noNota()" aria-controls="list" role="tab"  class="btn-primary btn-flat btn-sm"><i class="fa fa-plus" aria-hidden="true"></i> &nbsp; Transfer Item</button>

      </div>


<div class="col-sm-6">
  <div class="form-group row">
    <label for="staticEmail" class="col-sm-1 col-form-label no-padding">Show</label>
    <div class="col-sm-3 no-padding" >
            <select id="lenght" name="table_data_length" aria-controls="table_data" class="form-control input-sm" onchange="stock()">
                <option value="10">10</option>
                <option value="25">25</option>
                <option value="50">50</option>
                <option value="100">100</option>
              </select>
    </div>
    <label for="staticEmail" class="col-sm-2 col-form-label no-padding">Entries</label>
  </div>
</div>

      <div id="table-stock">
        
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
  function stock(){
      var lenght=$('#lenght').val();
      var cari=$('#cari').val();
       $.ajax({
        url : baseUrl + "/penjualan/POSretail/stock/table-stock",
        type: 'get',  
        data:  { lenght : lenght, cari : cari },         
          success:function(response)
          {
            $('#table-stock').html(response);
          }
        });
  }

   function noNota(){
         $.ajax({
                    url         : baseUrl+'/transfer/no-nota',
                    type        : 'get',
                    timeout     : 10000,
                    dataType    :'json',
                    success     : function(response){
                        $('#no-nota').val(response);
                        $('#myTransfer').modal('show');
                        }
                    });
    }

      


</script>
