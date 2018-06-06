    <table class="table tabelan table-bordered table-hover dt-responsive" id="data3" style="width: 100%;"> 
      <thead>
        <th>No</th>
        <th>Tanggal</th>
        <th>Nama Item</th>
        <th>Tipe Item</th>
        <th>Group Item</th>
        <th width="5%">Jumlah Penjualan</th>
      </thead>
      <tbody>
        {{-- @foreach ($leagues as $index => $league)
         <tr>
          <td>{{ date('d M Y', strtotime($league->s_date))}}</td>
          <td>{{ $league->i_name }}</td>
          <td>
            @if($league->i_type=='BJ')
            Barang Jual
            @elseif($league->i_type=='BP')
            Barang Produksi
            @endif
          </td>
          <td>{{ $league->i_group }}</td>
          <td><span class="pull-right">
            {{ $league->jumlah }}
            </span>
          </td>
        </tr> 
        @endforeach --}}
      </tbody>
    </table>