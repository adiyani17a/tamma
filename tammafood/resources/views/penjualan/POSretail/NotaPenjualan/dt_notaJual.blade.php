          <table class="table tabelan table-bordered table-hover dt-responsive" id="data2">
            <thead>
              <th>Tanggal Nota</th>
              <th>No Nota</th>
              <th>Customer</th>
              <th>Item</th>
              <th>Nominal</th>
              <th>Status</th>
              <th>Aksi</th>
            </thead>
            <tbody>
              @foreach ($detalis as $index => $detail)                       
              <tr>
                <td>{{ date('d M Y', strtotime($detail->s_date)) }}</td>
                <td>{{ $detail->s_note }}</td>
                <td>{{ $detail->s_customer }}</td>
                <td><button type="button" class="btn btn-info btn-sm" data-toggle="modal"  onclick="lihatDetail('{{ $detail->s_id }}')" data-target="#myItem">Buka Item</button></td>
                <td>Rp.{{ number_format( $detail->s_gross ,2,',','.')}}</td>
                <td>{{ $detail->s_status }}</td>
                <td class="text-center">
              <div class="">

               <a href="{{ url('/penjualan/POSretail/retail/edit_sales',$detail->s_id) }}" class="btn btn-warning btn-sm" title="Edit"><i class="glyphicon glyphicon-pencil"></i></a>
               <a onclick="return confirm('Apakah anda yakin?')"; href="{{ url('/penjualan/POSretail/retail/distroy',$detail->s_id) }}" class="btn btn-danger btn-sm" title="Hapus"><i class="glyphicon glyphicon-trash"></i></a>

              </div>                            
              </td>
              </tr>
              @endforeach
            </tbody>
          </table>
<script>
  $('#data2').DataTable();

</script>
{{-- @if($ket != 'create')
tambahEdit();       
    function tambahEdit() 
    {  

      var data = [];
      var mahmud = {{ count($edit) }};
      
      @for ($i = 0; $i < count($edit); $i++)
        data[{{ $i }}] = {{ $edit[$i] }};
        console.log(data); 
      @endfor
      var index;
    var a = ["a", "b", "c"];
    for (index = 0; index < mahmud.length; ++index) {
        console.log(mahmud[index]);
    }
    }

@endif  --}}