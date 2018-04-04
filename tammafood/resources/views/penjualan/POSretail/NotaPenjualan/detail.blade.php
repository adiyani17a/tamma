<table class="table tabelan table-bordered table-hover">
    <thead>
      <tr>
        <th>Nomor</th>
        <th>Item</th>
        <th>Jumlah</th>
        <th>Satuan</th>
        <th>Harga</th>

      </tr>
    </thead>
    <tbody>
      @foreach ($detaliss as $index => $detaill)
      <tr>
        <td>{{ $index+1 }}</td>
        <td>{{ $detaill->i_name }}</td>
        <td>{{ $detaill->sd_qty }}</td>
        <td>{{ $detaill->i_unit }}</td>
         <td>Rp.{{ number_format( $detaill->sd_price ,2,',','.')}}</td>
      </tr>
      @endforeach
    </tbody>
  </table>
