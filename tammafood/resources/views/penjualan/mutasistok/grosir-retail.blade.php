<div id="grosir-retail" class="tab-pane fade in active">
                                 
  <div class="row">
   
      <div class="col-md-12 col-sm-12 col-xs-12">
        

            
              <div class="col-md-2 col-sm-3 col-xs-12">
                <label class="tebal">Tanggal</label>
              </div>

              <div class="col-md-4 col-sm-6 col-xs-12">
                <div class="form-group">
                  <div class="input-daterange input-group">
                    <input id="tanggal" class="form-control input-sm datepicker2" name="tanggal" type="text">
                    <span class="input-group-addon">-</span>
                    <input id="tanggal"" class="input-sm form-control datepicker2" name="tanggal" type="text">
                  </div>
                </div>
              </div>
            

              <div class="col-md-3 col-sm-3 col-xs-12" align="center">
                <button class="btn btn-primary btn-sm btn-flat" type="button">
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

            
              <div class="col-md-3 col-sm-12 col-xs-12" align="right">
                <button class="btn btn-box-tool" data-toggle="modal" data-target="#tambah-grosirretail"><i class="fa fa-plus"></i>&nbsp;&nbsp;Tambah Data</button>
              </div>
        
          
        <div class="table-responsive" style="margin-top: 50px;">
          <table class="table tabelan table-hover table-bordered" width="100%" cellspacing="0" id="data">
            <thead>
              <tr>
                <th>Tanggal</th>
                <th>Kode Item</th>
               <th>Nama Item</th>
               <th>Jumlah Mutasi</th>
               <th>Status</th>
               <th>Aksi</th>
              </tr>
            </thead>

            <tbody>
{{--             @foreach ($mutationstore as $data)
              <tr>
                <td>{{date('Y-m-d',strtotime($data->ms_date))}}</td>
                <td>{{$data->i_code}}</td>
                <td>{{$data->i_name}}</td>
                <td>{{$data->ms_qty}}</td>
                <td><i class="fa fa-times"></i></td>
                <td>
                   <a onclick="editTransferGrosir('{{$data->ms_id}}')" class="btn btn-warning btn-xs" title="Edit"><i class="glyphicon glyphicon-pencil"></i></a>
                  <a onclick="hapusTransferGrosir('{{$data->ms_id}}')" class="btn btn-danger btn-xs" title="Hapus"><i class="glyphicon glyphicon-trash"></i></a>
                </td>
              </tr>
              @endforeach  --}}            
            </tbody>
          </table> 
        </div> 

      </div>
  </div>


  
</div>
<!-- /div grosir-retail -->

