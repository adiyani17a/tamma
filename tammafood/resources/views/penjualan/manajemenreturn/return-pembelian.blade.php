@extends('main')
@section('content')
<style type="text/css">
  .ui-autocomplete { z-index:2147483647; }
  .select2-container { margin: 0; }
</style>
  <!--BEGIN PAGE WRAPPER-->
  <div id="page-wrapper">
    <!--BEGIN TITLE & BREADCRUMB PAGE-->
    <div id="title-breadcrumb-option-demo" class="page-title-breadcrumb">
      <div class="page-header pull-left" style="font-family: 'Raleway', sans-serif;">
          <div class="page-title">Form Return Penjualan</div>
      </div>

      <ol class="breadcrumb page-breadcrumb pull-right" style="font-family: 'Raleway', sans-serif;">
        <li><i class="fa fa-home"></i>&nbsp;<a href="{{ url('/home') }}">Home</a>&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
        <li><i></i>&nbsp;Purchasing&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
        <li class="active">Return Penjualan</li><li><i class="fa fa-angle-right"></i>&nbsp;Form Return Penjualan&nbsp;&nbsp;</i>&nbsp;&nbsp;</li>
      </ol>

      <div class="clearfix"></div>
    </div>

    <div class="page-content fadeInRight">
      <div id="tab-general">
        <div class="row mbl">
          <div class="col-lg-12">
                      
            <div class="col-md-12">
              <div id="area-chart-spline" style="width: 100%; height: 300px; display: none;">
              </div>
            </div>
                       
            <ul id="generalTab" class="nav nav-tabs">
              <li class="active"><a href="#alert-tab" data-toggle="tab">Form Return Penjualan</a></li>
              <!-- <li><a href="#note-tab" data-toggle="tab">2</a></li>
              <li><a href="#label-badge-tab-tab" data-toggle="tab">3</a></li> -->
            </ul>

            <div id="generalTabContent" class="tab-content responsive" >
              <div id="alert-tab" class="tab-pane fade in active">
                <div class="row">
                  <div class="col-md-12 col-sm-12 col-xs-12" style="margin-top: -10px;margin-bottom: 15px;">
                    <div class="col-md-5 col-sm-6 col-xs-8">
                      <h4>Form Return Penjualan</h4>
                    </div>

                    <div class="col-md-7 col-sm-6 col-xs-4 " align="right" style="margin-top:5px;margin-right: -25px;">
                      <a href="{{ url('penjualan/manajemenreturn/r_penjualan') }}" class="btn">
                        <i class="fa fa-arrow-left"></i>
                      </a>
                    </div>
                  </div>

                  <div class="col-md-12 col-sm-12 col-xs-12" style="margin-top: -10px;margin-bottom: 15px;">
                    <div class="col-md-2 col-sm-3 col-xs-12">
                      <label class="tebal">Metode Return</label>
                    </div>

                    <div class="col-md-4 col-sm-9 col-xs-12">
                      <div class="form-group">
                        <select class="form-control input-sm" id="pilih_metode_return" name="pilihMetodeReturn" style="width: 100%;">
                          <option value=""> - Pilih Metode Return</option>
                          <option value="TK"> Tukar Barang </option>
                          <option value="PN"> Potong Nota </option>
                        </select>
                      </div>
                    </div>
                  </div>

                  <!-- START div#header_form -->
                  <div class="col-md-12 col-sm-12 col-xs-12" style="margin-top:15px;" id="header_form">
                    <form method="post" id="form_return_pembelian">
                      {{ csrf_field() }}
                      <div class="col-md-12 col-sm-12 col-xs-12" style="margin-bottom: 10px; padding-top:10px;padding-bottom:20px;" id="appending-form">
                      </div>
                    </form>
                  </div>
                  <!-- END div#header_form -->

                </div>                                       
              </div>
            </div>
                                
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--END PAGE WRAPPER-->              
@endsection
@section("extra_scripts")
<script src="{{ asset ('assets/script/icheck.min.js') }}"></script>
<script type="text/javascript">
  $(document).ready(function() {
    //fix to issue select2 on modal when opening in firefox
    $.fn.modal.Constructor.prototype.enforceFocus = function() {};

    var extensions = {
        "sFilterInput": "form-control input-sm",
        "sLengthSelect": "form-control input-sm"
    }
    // Used when bJQueryUI is false
    $.extend($.fn.dataTableExt.oStdClasses, extensions);
    // Used when bJQueryUI is true
    $.extend($.fn.dataTableExt.oJUIClasses, extensions);

    $('.datepicker').datepicker({
      format: "mm-yyyy",
      viewMode: "months",
      minViewMode: "months"
    });

    //autofill
    $('#pilih_metode_return').change(function()
    {
      //remove child div inside appending-form before appending
      $('#appending-form div').remove();
      var method = $(this).val();
      var methodTxt = $(this).text();
      if (method == "") 
      {
        //alert("Mohon untuk Memilih salah satu dari metode return pembelian")
        $('#appending-form div').remove();
      }
      else if(method == "TK")
      {
        //remove child div inside appending-form before appending
        $('#appending-form div').remove();
        // $('#appending-form').append('<div class="col-md-2 col-sm-3 col-xs-12">'
        //                               +'<label class="tebal">Nota Penjualan</label>'
        //                             +'</div>'
        //                             +'<div class="col-md-4 col-sm-9 col-xs-12">'
        //                               +'<div class="form-group">'
        //                                 +'<select class="form-control input-sm select2" id="cari_nota_sales" name="cariNotaPurchase" style="width: 100% !important;">'
        //                                   +'<option> - Pilih Nota Penjualan</option>'
        //                                 +'</select>'
        //                               +'</div>'
        //                             +'</div>'
        //                             +'<div class="col-md-2 col-sm-3 col-xs-12">'
        //                               +'<label class="tebal">Kode Return</label>'
        //                             +'</div>'
        //                             +'<div class="col-md-4 col-sm-9 col-xs-12">'
        //                               +'<div class="form-group">'
        //                                 +'<input type="text" name="kodeReturn" readonly="" class="form-control input-sm" value="">'
        //                                 +'<input type="hidden" name="metodeReturn" readonly="" class="form-control input-sm">'
        //                               +'</div>'
        //                             +'</div>'
        //                             +'<div class="col-md-2 col-sm-3 col-xs-12">'
        //                               +'<label class="tebal">Tanggal Return</label>'
        //                             +'</div>'
        //                             +'<div class="col-md-4 col-sm-9 col-xs-12">'
        //                               +'<div class="form-group">'
        //                                 +'<input id="tanggalReturn" class="form-control input-sm datepicker2 " name="tanggal" type="text" value="{{ date('d-m-Y') }}">'
        //                               +'</div>'
        //                             +'</div>'
        //                             +'<div class="col-md-2 col-sm-3 col-xs-12">'
        //                               +'<label class="tebal">Staff</label>'
        //                             +'</div>'
        //                             +'<div class="col-md-4 col-sm-9 col-xs-12">'
        //                               +'<div class="form-group">'
        //                                 +'<input type="text" name="namaStaff" readonly="" class="form-control input-sm" id="nama_staff" value="">'
        //                               +'</div>'
        //                             +'</div>'
        //                             +'<div class="col-md-2 col-sm-3 col-xs-12">'
        //                               +'<label class="tebal">Supplier</label>'
        //                             +'</div>'
        //                             +'<div class="col-md-4 col-sm-9 col-xs-12">'
        //                               +'<div class="form-group">'
        //                                 +'<input type="text" name="namaSup" readonly="" class="form-control input-sm" id="nama_sup">'
        //                                 +'<input type="hidden" name="idSup" readonly="" class="form-control input-sm" id="id_sup">'
        //                               +'</div>'
        //                             +'</div>'
        //                             +'<div class="col-md-2 col-sm-3 col-xs-12">'
        //                               +'<label class="tebal">Metode Bayar</label>'
        //                             +'</div>'
        //                             +'<div class="col-md-4 col-sm-9 col-xs-12">'
        //                               +'<div class="form-group">'
        //                                 +'<input type="text" name="methodBayar" readonly="" class="form-control input-sm" id="method_bayar">'
        //                               +'</div>'
        //                             +'</div>'
        //                             +'<div class="col-md-2 col-sm-3 col-xs-12">'
        //                               +'<label class="tebal">Alamat Pelanggan</label>'
        //                             +'</div>'
        //                             +'<div class="col-md-4 col-sm-9 col-xs-12">'
        //                               +'<div class="form-group">'
        //                                 +'<input type="text" name="nilaiTotalGross" readonly="" class="form-control input-sm" id="nilai_total_gross">'
        //                               +'</div>'
        //                             +'</div>'
        //                             +'<div class="col-md-2 col-sm-3 col-xs-12">'
        //                               +'<label class="tebal">Nilai Total Diskon</label>'
        //                             +'</div>'
        //                             +'<div class="col-md-4 col-sm-9 col-xs-12">'
        //                               +'<div class="form-group">'
        //                                 +'<input type="text" name="nilaiTotalDisc" readonly="" class="form-control input-sm" id="nilai_total_disc">'
        //                               +'</div>'
        //                             +'</div>'
        //                             +'<div class="col-md-2 col-sm-3 col-xs-12">'
        //                               +'<label class="tebal">Total Diskon</label>'
        //                             +'</div>'
        //                             +'<div class="col-md-4 col-sm-9 col-xs-12">'
        //                               +'<div class="form-group">'
        //                                 +'<input type="text" name="nilaiTotalTax" readonly="" class="form-control input-sm" id="nilai_total_tax">'
        //                               +'</div>'
        //                             +'</div>'
        //                             +'<div class="col-md-2 col-sm-3 col-xs-12">'
        //                               +'<label class="tebal">Nilai Total Penjualan (Nett)</label>'
        //                             +'</div>'
        //                             +'<div class="col-md-4 col-sm-9 col-xs-12">'
        //                               +'<div class="form-group">'
        //                                 +'<input type="text" name="nilaiTotalNett" readonly="" class="form-control input-sm" id="nilai_total_nett">'
        //                               +'</div>'
        //                             +'</div>'
        //                             +'<div class="table-responsive">'
        //                               +'<table class="table tabelan table-bordered" id="tabel-form-return">'
        //                                 +'<form method="POST" id="form_create_po">'
        //                                   +'{{ csrf_field() }}'
        //                                   +'<thead>'
        //                                     +'<tr>'
        //                                       +'<th width="5%">No</th>'
        //                                       +'<th width="30%">Kode | Barang</th>'
        //                                       +'<th width="10%">Qty</th>'
        //                                       +'<th width="10%">Satuan</th>'
        //                                       +'<th width="15%">Harga</th>'
        //                                       +'<th width="15%">Total</th>'
        //                                       +'<th width="10%">Stok</th>'
        //                                       +'<th width="5%">Aksi</th>'
        //                                     +'</tr>'
        //                                   +'</thead>'
        //                                   +'<tbody>'
        //                                   +'</tbody>'
        //                                 +'</form>'
        //                               +'</table>'
        //                             +'</div>'
        //                               +'<div align="right">'
        //                                 +'<div id="div_button_save" class="form-group">'
        //                                   +'<button type="button" id="button_save" class="btn btn-primary" onclick="simpanReturn()">Simpan Data</button>'
        //                                 +'</div>'
        //                               +'</div>');
      }
      else
      {
        //remove child div inside appending-form before appending
        $('#appending-form div').remove();
        $('#appending-form').append('<div class="col-md-12 col-sm-12 col-xs-12 tamma-bg"            style="margin-bottom: 10px; padding-top:25px;padding-bottom:20px;">'
                                    +'<div class="col-md-2 col-sm-3 col-xs-12">'
                                      +'<label class="tebal">Nota Penjualan</label>'
                                    +'</div>'
                                    +'<div class="col-md-4 col-sm-9 col-xs-12">'
                                      +'<div class="form-group">'
                                        +'<select class="form-control input-sm select2" id="cari_nota_sales" name="cariNotaPurchase" style="width: 100% !important;">'
                                          +'<option> - Pilih Nota Penjualan</option>'
                                        +'</select>'
                                      +'</div>'
                                    +'</div>'
                                    +'<div class="col-md-2 col-sm-3 col-xs-12">'
                                      +'<label class="tebal">Kode Return</label>'
                                    +'</div>'
                                    +'<div class="col-md-4 col-sm-9 col-xs-12">'
                                      +'<div class="form-group">'
                                        +'<input type="text" name="kodeReturn" readonly="" class="form-control input-sm" value="{{ $returnSales }}">'
                                        +'<input type="hidden" name="metodeReturn" readonly="" class="form-control input-sm">'
                                      +'</div>'
                                    +'</div>'
                                    +'<div class="col-md-2 col-sm-3 col-xs-12">'
                                      +'<label class="tebal">Tanggal Return</label>'
                                    +'</div>'
                                    +'<div class="col-md-4 col-sm-9 col-xs-12">'
                                      +'<div class="form-group">'
                                        +'<input id="tanggalReturn" class="form-control input-sm datepicker2 " name="tanggal" type="text" value="{{ date('d-m-Y') }}">'
                                      +'</div>'
                                    +'</div>'
                                    +'<div class="col-md-2 col-sm-3 col-xs-12">'
                                      +'<label class="tebal">Staff</label>'
                                    +'</div>'
                                    +'<div class="col-md-4 col-sm-9 col-xs-12">'
                                      +'<div class="form-group">'
                                        +'<input type="text" name="namaStaff" readonly="" class="form-control input-sm" id="nama_staff" value="">'
                                      +'</div>'
                                    +'</div>'
                                    +'<div class="col-md-2 col-sm-3 col-xs-12">'
                                      +'<label class="tebal">Detail Pelanggan</label>'
                                    +'</div>'
                                    +'<div class="col-md-4 col-sm-9 col-xs-12">'
                                      +'<div class="form-group">'
                                        +'<input type="text" name="c_name" readonly="" class="form-control input-sm" id="c_name">'
                                        +'<input type="hidden" name="idSup" readonly="" class="form-control input-sm" id="id_sup">'
                                      +'</div>'
                                    +'</div>'
                                    +'<div class="col-md-2 col-sm-3 col-xs-12">'
                                      +'<label class="tebal">Total Return</label>'
                                    +'</div>'
                                    +'<div class="col-md-4 col-sm-9 col-xs-12">'
                                      +'<div class="form-group">'
                                        +'<input type="text" name="t_return" readonly="" class="form-control input-sm" id="t_return" value="">'
                                      +'</div>'
                                    +'</div>'
                                    +'<div class="col-md-2 col-sm-3 col-xs-12">'
                                      +'<label class="tebal">S Gross</label>'
                                    +'</div>'
                                    +'<div class="col-md-4 col-sm-9 col-xs-12">'
                                      +'<div class="form-group">'
                                        +'<input type="text" name="s_gross" readonly="" class="form-control input-sm" id="s_gross">'
                                      +'</div>'
                                    +'</div>'
                                    +'<div class="col-md-2 col-sm-3 col-xs-12">'
                                      +'<label class="tebal">Total Diskon</label>'
                                    +'</div>'
                                    +'<div class="col-md-4 col-sm-9 col-xs-12">'
                                      +'<div class="form-group">'
                                        +'<input type="text" name="total_diskon" readonly="" class="form-control input-sm totalGross" id="total_diskon">'
                                      +'</div>'
                                    +'</div>'
                                    +'<div class="col-md-2 col-sm-3 col-xs-12">'
                                      +'<label class="tebal">Total Penjualan (Nett)</label>'
                                    +'</div>'
                                    +'<div class="col-md-4 col-sm-9 col-xs-12">'
                                      +'<div class="form-group">'
                                        +'<input type="text" name="s_net" readonly="" class="form-control input-sm totalGross" id="s_net">'
                                      +'</div>'
                                    +'</div>'
                                    +'<div class="col-md-2 col-sm-3 col-xs-12">'
                                      +'<label class="tebal">Metode Pembayaran</label>'
                                    +'</div>'
                                    +'<div class="col-md-4 col-sm-9 col-xs-12">'
                                      +'<div class="form-group">'
                                        +'<input type="text" name="pm_name" readonly="" class="form-control input-sm" id="pm_name">'
                                      +'</div>'
                                    +'</div>'
                                    +'</div>'

                                    +'<div class="table-responsive">'
                                      +'<table class="table tabelan table-bordered" id="tabel-return-sales" width="100%">'
                                        +'<form method="GET" id="form_create">'
                                          +'{{ csrf_field() }}'
                                          +'<thead>'
                                            +'<tr>'
                                                +'<th>Nama</th>'
                                                +'<th width="5%">Jumlah</th>'
                                                +'<th width="5%">Return</th>'
                                                +'<th>Satuan</th>'
                                                +'<th>Harga</th>'
                                                +'<th width="10%">Disc Percent</th>'
                                                +'<th>Disc Value</th>'
                                                +'<th>Jumlah Return</th>'
                                                +'<th width="20%">Total</th>'
                                            +'</tr>'
                                          +'</thead>'
                                          +'<tbody>'
                                          +'</tbody>'
                                        +'</form>'
                                      +'</table>'
                                    +'</div>'

                                      +'<div align="right" style="padding-top: 15px;">'
                                        +'<div id="div_button_save" class="form-group">'
                                          +'<button type="button" id="button_save" class="btn btn-primary" onclick="simpanReturn()">Simpan Data</button>'
                                        +'</div>'
                                      +'</div>');
      }
      //select2
      $( "#cari_nota_sales" ).select2({
        placeholder: "Pilih Nota Penjualan...",
        ajax: {
          url: baseUrl + '/penjualan/returnpenjualan/carinota',
          dataType: 'json',
          data: function (params) {
            return {
                q: $.trim(params.term)
            };
          },
          processResults: function (data) {
              return {
                  results: data
              };
          },
          cache: true
        }, 
      });

      //datepicker
      $('.datepicker2').datepicker({
        autoclose: true,
        format:"dd-mm-yyyy",
        endDate: 'today'
      });
      //event onchange select option
      $('#cari_nota_sales').change(function() {
        $('#tabel-return-sales').dataTable().fnDestroy();
        var id = $('#cari_nota_sales').val();
        $.ajax({
          url : baseUrl + "/penjualan/returnpenjualan/get-data/"+id,
          type: "GET",
          dataType: "JSON",
          success: function(response){
            var c_name =  response[0].c_name;
            var c_hp = response[0].c_hp;
            var c_address = response[0].c_address;
            if (c_address == null) {
              c_address = '';
            }
            $('#c_name').val( c_name +'. '+ c_hp +'. '+ c_address);
              var s_gross = parseInt(response[0].s_gross);
              s_gross = convertToRupiah(s_gross);
            $('#s_gross').val(s_gross); 
              var persen = parseInt(response[0].s_disc_percent);
              var value = (response[0].s_disc_value);
              value = parseFloat(value);
              var total_diskon = persen + value;
              total_diskon = convertToRupiah(total_diskon);      
            $('#total_diskon').val(total_diskon);
              var s_net = parseInt(response[0].s_net);
              s_net = convertToRupiah(s_net);
            $('#s_net').val(s_net);
            $('#pm_name').val(response[0].pm_name);

            $('#tabel-return-sales').DataTable({
              processing: true,
              serverSide: true,
              ajax: {
                  url : baseUrl + "/penjualan/returnpenjualan/tabelpnota/"+id,
              },
              columns: [
              {data: 'i_name', name: 'i_name'},
              {data: 'sd_qty', name: 'sd_qty'},
              {data: 'sd_qty_return', name: 'sd_qty_return'},
              {data: 'm_sname', name: 'm_sname'},
              {data: 'sd_price', name: 'sd_price'},
              {data: 'sd_disc_percent', name: 'sd_disc_percent', orderable: false},
              {data: 'sd_disc_value', name: 'sd_disc_value', orderable: false},
              {data: 'sd_return', name: 'sd_return', orderable: false},
              {data: 'sd_total', name: 'sd_total', orderable: false},
              ],
              "responsive":true,
                "pageLength": 10,
              "lengthMenu": [[10, 20, 50, - 1], [10, 20, 50, "All"]],
              "language": {
                  "searchPlaceholder": "Cari Data",
                  "emptyTable": "Tidak ada data",
                  "sInfo": "Menampilkan _START_ - _END_ Dari _TOTAL_ Data",
                  "sSearch": '<i class="fa fa-search"></i>',
                  "sLengthMenu": "Menampilkan &nbsp; _MENU_ &nbsp; Data",
                  "infoEmpty": "",
                  "paginate": {
                          "previous": "Sebelumnya",
                          "next": "Selanjutnya",
                 }
                }
            });
          },
        });
      });

    });
    
  });

  function discpercent(inField, e){
    var a = 0;
      $('input.discpercent:text').each(function(evt){
        var getIndex = a; 
        var getIndex = $('input.discpercent:text').index(inField);
        var dataInput = $('input.discpercent:text:eq('+getIndex+')').val();
        var qty = $('input.qty-item:text:eq('+getIndex+')').val();
        var hargaItem =$('input.harga-item:text:eq('+getIndex+')').val();
        var dPersen =$('input.dPersen-item:text:eq('+getIndex+')').val();
        hargaItem = convertToAngka(hargaItem);
        x = hargaItem * qty;
        if (dPersen >= 100) {
          dPersen = 0;
          $('input.discpercent:text:eq('+getIndex+')').val(0);
        }
        hasil = x * dPersen/100;
        $('input.value-persen:text:eq('+getIndex+')').val(hasil);
        totalHarga = qty * hargaItem - hasil;
        if (dPersen == '') {
          $('input.discvalue:text:eq('+getIndex+')').attr("readonly",false);
        }else{
          $('input.discvalue:text:eq('+getIndex+')').attr("readonly",true);
        }
        totalHarga = convertToRupiah(totalHarga);
        $('input.totalHarga:text:eq('+getIndex+')').val(totalHarga);
        $('input.hasilReturn:text:eq('+getIndex+')').val(0);
        $('input.qtyreturn:text:eq('+getIndex+')').val(0);
      a++;
      }) 
      autoJumlahNet();
  }

  function discvalue(inField, e){
    var a = 0;
      $('input.discvalue:text').each(function(evt){
        var getIndex = a; 
        var getIndex = $('input.discvalue:text').index(inField);
        var dataInput = $('input.discvalue:text:eq('+getIndex+')').val();
        var qty = $('input.qty-item:text:eq('+getIndex+')').val();
        var hargaItem =$('input.harga-item:text:eq('+getIndex+')').val();
        var dValue =$('input.dValue-item:text:eq('+getIndex+')').val();
        hargaItem = convertToAngka(hargaItem);
        x = hargaItem * qty;
        hasil = x - dValue;
        if (dValue >= x) {
          dValue = 0;
          $('input.discvalue:text:eq('+getIndex+')').val(0);
        }
        if (dValue == '' || dValue == '0') {
          $('input.discpercent:text:eq('+getIndex+')').attr("readonly",false);
        }else{
          $('input.discpercent:text:eq('+getIndex+')').attr("readonly",true);
        }
        $('input.qtyreturn:text:eq('+getIndex+')').val(0);
        hasil = convertToRupiah(hasil);
        $('input.totalHarga:text:eq('+getIndex+')').val(hasil);
        $('input.hasilReturn:text:eq('+getIndex+')').val(0);
      a++;
      }) 
      autoJumlahNet();
      autoTotalReturn();
  }

  function qtyReturn(inField, e){
    var getIndex = $('input.qtyreturn:text').index(inField);
    var dataInput = $('input.qtyreturn:text:eq('+getIndex+')').val();
    var qty = $('input.qty-item:text:eq('+getIndex+')').val();
    var totalHarga = $('input.totalHarga:text:eq('+getIndex+')').val();
    totalHarga = convertToAngka(totalHarga);
    var hargaItem = $('input.harga-item:text:eq('+getIndex+')').val();
    hargaItem = convertToAngka(hargaItem);
    var valuePersen = $('input.value-persen:text:eq('+getIndex+')').val();
    var dValue = $('input.dValue-item:text:eq('+getIndex+')').val();
    dValue = convertToAngka(dValue);
    var x = qty - dataInput;
    if (x < 0 ) {
      $('input.qtyreturn:text:eq('+getIndex+')').val(0);
      $('input.hasilReturn:text:eq('+getIndex+')').val(0);
      var hasilA = $('input.qty-return:text:eq('+getIndex+')').val(qty);
      //discpercent(inField, e)
        var dataInput = $('input.discpercent:text:eq('+getIndex+')').val();
        var dPersen =$('input.dPersen-item:text:eq('+getIndex+')').val();
        x = hargaItem * qty;
        if (dPersen >= 100) {
          dPersen = 0;
          $('input.discpercent:text:eq('+getIndex+')').val(0);
        }
        hasil = x * dPersen/100;
        $('input.value-persen:text:eq('+getIndex+')').val(hasil);
        //end discpercent(inField, e)
      dataInput = $('input.qtyreturn:text:eq('+getIndex+')').val();
        if (isNaN(dValue)) {
          dValue=0;
        }
      hasilC = (qty * hargaItem - hasil - dValue) / qty * dataInput;
      totalAkhir = (qty * hargaItem - hasil - dValue) - hasilC;
      hasilC = convertToRupiah(hasilC);
      totalAkhir = convertToRupiah(totalAkhir);
      $('input.hasilReturn:text:eq('+getIndex+')').val(hasilC);
      $('input.totalHarga:text:eq('+getIndex+')').val(totalAkhir);
    }else if (x == 10) {
      var hasilB = $('input.qty-return:text:eq('+getIndex+')').val(qty);
      //discpercent(inField, e)
        var dataInput = $('input.discpercent:text:eq('+getIndex+')').val();
        var dPersen =$('input.dPersen-item:text:eq('+getIndex+')').val();
        x = hargaItem * qty;
        if (dPersen >= 100) {
          dPersen = 0;
          $('input.discpercent:text:eq('+getIndex+')').val(0);
        }
        hasil = x * dPersen/100;
        $('input.value-persen:text:eq('+getIndex+')').val(hasil);
        //end discpercent(inField, e)
      dataInput = $('input.qtyreturn:text:eq('+getIndex+')').val();
        if (isNaN(dValue)) {
          dValue=0;
        }
      hasilC = (qty * hargaItem - hasil - dValue) / qty * dataInput;
      totalAkhir = (qty * hargaItem - hasil - dValue) - hasilC;
      hasilC = convertToRupiah(hasilC);
      totalAkhir = convertToRupiah(totalAkhir);
      $('input.hasilReturn:text:eq('+getIndex+')').val(hasilC);
      $('input.totalHarga:text:eq('+getIndex+')').val(totalAkhir);
    }else{
      var Return = $('input.qty-return:text:eq('+getIndex+')').val(x);
        //discpercent(inField, e)
        var dataInput = $('input.discpercent:text:eq('+getIndex+')').val();
        var dPersen =$('input.dPersen-item:text:eq('+getIndex+')').val();
        x = hargaItem * qty;
        if (dPersen >= 100) {
          dPersen = 0;
          $('input.discpercent:text:eq('+getIndex+')').val(0);
        }
        hasil = x * dPersen/100;
        $('input.value-persen:text:eq('+getIndex+')').val(hasil);
        //end discpercent(inField, e)
        dataInput = $('input.qtyreturn:text:eq('+getIndex+')').val();
        if (isNaN(dValue)) {
          dValue=0;
        }
      hasilC = (qty * hargaItem - hasil - dValue) / qty * dataInput;
      totalAkhir = (qty * hargaItem - hasil - dValue) - hasilC;
      hasilC = convertToRupiah(hasilC);
      totalAkhir = convertToRupiah(totalAkhir);
      $('input.hasilReturn:text:eq('+getIndex+')').val(hasilC);
      $('input.totalHarga:text:eq('+getIndex+')').val(totalAkhir);
    }
    autoTotalReturn();    
  }

function autoJumlahNet(){
  var inputs = document.getElementsByClassName( 'totalNet' ),
  hasil  = [].map.call(inputs, function( input ) {
      return input.value;
  });
  var total = 0;
  for (var i = hasil.length - 1; i >= 0; i--) {
    hasil[i] = convertToAngka(hasil[i]);
    hasil[i] = parseInt(hasil[i]);
    total = total + hasil[i];
  }
  total = convertToRupiah(total);
  $('#s_net').val(total);
  autoTotalGross();
  autoTotalReturn();
  }  

function autoJumlahDiskon(){
  var inputs = document.getElementsByClassName( 'totalPersen' ),
  hasil  = [].map.call(inputs, function( input ) {
    if(input.value == '') input.value = 0;
      return input.value;
  });
  var total = 0;
  for (var i = hasil.length - 1; i >= 0; i--) {
    hasil[i] = convertToAngka(hasil[i]);
    hasil[i] = parseInt(hasil[i]);
    total = total + hasil[i];
  }
  total = convertToRupiah(total);
  $('#total_diskon').val(total);
  autoTotalGross();
  autoTotalReturn();
  } 

function autoTotalGross(){
  var inputs = document.getElementsByClassName( 'totalGross' ),
  hasil  = [].map.call(inputs, function( input ) {
      return input.value;
  });
  var total = 0;
  for (var i = hasil.length - 1; i >= 0; i--) {
    hasil[i] = convertToAngka(hasil[i]);
    hasil[i] = parseInt(hasil[i]);
    total = total + hasil[i];
  }
  total = convertToRupiah(total);
  $('#s_gross').val(total);
  } 

function autoTotalReturn(){
  var inputs = document.getElementsByClassName( 'hasilReturn' ),
  hasil  = [].map.call(inputs, function( input ) {
      return input.value;
  });
  var total = 0;
  for (var i = hasil.length - 1; i >= 0; i--) {
    hasil[i] = convertToAngka(hasil[i]);
    hasil[i] = parseInt(hasil[i]);
    total = total + hasil[i];
  }
  total = convertToRupiah(total);
  $('#t_return').val(total);
  }

  function convertToRupiah(angka) {
    var rupiah = '';        
    var angkarev = angka.toString().split('').reverse().join('');
      for(var i = 0; i < angkarev.length; i++) if(i%3 == 0) rupiah += angkarev.substr(i,3)+'.';
      var hasil = 'Rp. '+rupiah.split('',rupiah.length-1).reverse().join('');
      return hasil+',00'; 
  }

  function convertToAngka(rupiah){
    return parseInt(rupiah.replace(/,.*|[^0-9]/g, ''), 10);
  }

  //event focus on input harga
  $(document).on('focus', '.field_harga',  function(e){
      var harga = convertToAngka($(this).val());
      if (isNaN(harga)) {
        harga = 0;
      }
      if (harga == 0) {
        harga = 0;
      }
      $(this).val(harga);
  });

  //event onblur input harga
  $(document).on('blur', '.field_harga',  function(e){
    //ubah format ke rupiah
    var hargaRp = convertToRupiah($(this).val());
    $(this).val(hargaRp);
  });


</script>
@endsection                            
