  <div class="table-responsive">
    <table class="table tabelan table-hover table-bordered" id="table-plan">
      <thead>
        <tr>
          <th width="50%">Tanggal</th>
          <th width="50%">Item</th>
          <th width="50%">Jumlah</th>
          <th width="50%">Action</th>
        </tr>
      </thead>
      <tbody>
      @foreach($productplan as $dataPlan)                 
        <tr>
          <td>
              {{date('d-m-Y',strtotime($dataPlan->pp_date))}}
          </td>
          <td>{{$dataPlan->i_name}}</td>
          <td>
              {{$dataPlan->pp_qty}}
          </td>
          <td>
              <button class="btn btn-warning btn-sm" title="Buat SPK" onclick="BuatSpk('{{$dataPlan->pp_id}}','{{date('d-m-Y',strtotime($dataPlan->pp_date))}}','{{$dataPlan->i_name}}','{{$dataPlan->pp_qty}}','{{$dataPlan->pp_item}}')">
                <i class="fa  fa-plus"></i>
              </button>                        
          </td>
        </tr>
      @endforeach
      </tbody>
    </table>
  </div>

  <script type="text/javascript">
    $('#table-plan').DataTable();
    
  </script>