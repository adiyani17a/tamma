    <div class="col-md-12 tamma-bg" style="margin-top: 5px;margin-bottom: 5px;margin-bottom: 20px; padding-bottom:20px;padding-top:20px;" >
         <div class="col-md-6">
           <label class="control-label tebal" for="">Masukan Kode / Nama</label>
              <div class="input-group input-group-sm" style="width: 100%;">
                  <input type="text" id="namaitem" name="item" class="form-control">
                  <input type="hidden" id="kode" name="sd_item" class="form-control">
                  <input type="hidden" id="harga" name="sd_sell" class="form-control">
                  <input type="hidden" id="detailnama" name="nama" class="form-control">
                  <input type="hidden" id="satuan" name="satuan" class="form-control" >
              </div>
          </div>      
          <div class="col-md-3">
           <label class="control-label tebal" name="qty">Masukan Jumlah</label>
              <div class="input-group input-group-sm" style="width: 100%;">
                 <input type="number" id="qty" name="qty" class="form-control" onkeyup="setQty()">
              </div>
          </div>
          <div class="col-md-3">
           <label class="control-label tebal" name="qty">Kuantitas Stok</label>
              <div class="input-group input-group-sm" style="width: 100%;">
                 <input type="number" id="s_qty" name="s_qty" class="form-control" readonly>
              </div>
          </div>
    </div>                      
    <div class="table-responsive">
      <table class="table tabelan table-bordered table-hover dt-responsive" id="detail-penjualan">
        <thead align="right">
          <tr>
           <th width="20%">Nama</th>
           <th width="2%">Jumlah</th>
           <th width="2%">Satuan</th>
           <th width="15%">Harga</th>
           <th>Disc Percent</th>
           <th>Disc Value</th>
           <th width="17%">Total</th>
           <th><button class="hidden" onclick="tambahEdit()">add</button></th>
          </tr>
        </thead> 
        <tbody>
          @foreach ($edit as $x)
          <tr>
            <td>
              {{ $x->i_name }}
              <input type="hidden" name="sd_sales[]" class="sd_sales" value="{{ $x->sd_sales }}">
              <input type="hidden" name="sd_detailid[]" class="sd_detailid" value="{{ $x->sd_detailid }}">

              <input type="hidden" name="kode_item[]" class="kode_item kode" value="{{ $x->i_id }}">
              <input type="hidden" name="nama_item[]" class="nama_item" value="{{ $x->i_name }}">
            </td>
            <td>
              <input size="30" style="text-align:right" type="number"  name="sd_qty[]" class="sd_qty form-control qty-{{+$x->i_id }}" value="{{$x->sd_qty }}" onkeyup="UpdateHarga('{{ $x->i_id }}'); qtyInput('{{ $x->s_qty }}', '{{ $x->i_id }}')" onchange="qtyInput('{{ $x->s_qty }}', '{{ $x->i_id }}')">
            </td>
            <td>
              {{ $x->i_unit }}<input type="hidden" name="satuan[]" class="satuan" value="{{ $x->i_unit }}">
            </td>
            <td>
              <input type="text" size="10" readonly style="text-align:right" name="harga_item[]" class="harga_item form-control harga-{{ $x->i_id }}" value="Rp. {{ number_format( $x->sd_price ,2,',','.')}}">
            </td>
            <td><input type="text" class="form-control" value=""></td>
            <td><input type="text" class="form-control" value=""></td>
            <td >
              <input type="text" size="200" readonly style="text-align:right" name="hasil[]" id="hasil" class="form-control hasil hasil-{{ $x->i_id }}" value="Rp. {{ number_format( $x->sd_total ,2,',','.')}}"><input type="hidden" size="200" readonly style="text-align:right" name="" id="hasil2" class="hasil2 form-control" value="'+b+'">
            </td>
            <td>
              <button type="button" class="btn btn-danger hapus" onclick="hapus(this)"><i class="fa fa-trash-o"></i></button>
            </td>
          </tr>
        @endforeach
        </tbody>
      </table>
    </div>

