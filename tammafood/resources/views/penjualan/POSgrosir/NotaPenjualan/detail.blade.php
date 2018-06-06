<table class="table tabelan table-bordered table-hover" id="TbDtDetail">
    <thead>
      <tr>
        <th>No</th>
        <th width="25%">Item</th>
        <th>Jumlah</th>
        <th>Satuan</th>
        <th width="25%">Harga</th>
        <th width="5%">Disc Percent</th>
        <th width="25%">Disc Value</th>
        <th width="25%">Total</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($detaliss as $index => $detaill)
      <tr>
        <td>{{ $index+1 }}</td>
        <td>{{ $detaill->i_name }}</td>
        <td><span class="pull-right"> 
              {{$detaill->sd_qty}}
            </span>
        </td>
        <td>{{ $detaill->i_unit }}</td>
        <td>Rp.
          <span class="pull-right">
          {{ number_format($detaill->sd_price,2,',','.')}}
          </span>
        </td>
        <td><span class="pull-right">
          @if($detaill->sd_disc_percent == null)
          0
          @else
          {{$detaill->sd_disc_percent}}
          @endif
          %
        </span>
        </td>
        <td>Rp.
          <span class="pull-right">
          {{ number_format($detaill->sd_disc_value,2,',','.')}}
          </span>
        </td>
        <td>Rp. 
          <span class="pull-right">
          {{ number_format($detaill->sd_total,2,',','.')}}
          </span>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>

<script>
   $('#TbDtDetail').DataTable();

</script>