@extends('main')
@section('content')
<style type="text/css">
  .ui-autocomplete { z-index:2147483647; }
</style>
  <!--BEGIN PAGE WRAPPER-->
  <div id="page-wrapper">
    <!--BEGIN TITLE & BREADCRUMB PAGE-->
    <div id="title-breadcrumb-option-demo" class="page-title-breadcrumb">
      <div class="page-header pull-left" style="font-family: 'Raleway', sans-serif;">
          <div class="page-title">Form Return Pembelian</div>
      </div>

      <ol class="breadcrumb page-breadcrumb pull-right" style="font-family: 'Raleway', sans-serif;">
        <li><i class="fa fa-home"></i>&nbsp;<a href="{{ url('/home') }}">Home</a>&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
        <li><i></i>&nbsp;Purchasing&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
        <li class="active">Return Pembelian</li><li><i class="fa fa-angle-right"></i>&nbsp;Form Return Pembelian&nbsp;&nbsp;</i>&nbsp;&nbsp;</li>
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
              <li class="active"><a href="#alert-tab" data-toggle="tab">Form Return Pembelian</a></li>
              <!-- <li><a href="#note-tab" data-toggle="tab">2</a></li>
              <li><a href="#label-badge-tab-tab" data-toggle="tab">3</a></li> -->
            </ul>

            <div id="generalTabContent" class="tab-content responsive" >
              <div id="alert-tab" class="tab-pane fade in active">
                <div class="row">
                  <div class="col-md-12 col-sm-12 col-xs-12" style="margin-top: -10px;margin-bottom: 15px;">
                    <div class="col-md-5 col-sm-6 col-xs-8">
                      <h4>Form Return Pembelian</h4>
                    </div>

                    <div class="col-md-7 col-sm-6 col-xs-4 " align="right" style="margin-top:5px;margin-right: -25px;">
                      <a href="{{ url('purchasing/returnpembelian/pembelian') }}" class="btn">
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
                    <form method="post">
                      {{ csrf_field() }}
                      <div class="col-md-12 col-sm-12 col-xs-12 tamma-bg" style="margin-bottom: 20px; padding-top:30px;padding-bottom:20px;" id="appending-form">
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

    $('.datepicker2').datepicker({
      format:"dd-mm-yyyy",
      autoclose: true
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
        $('#appending-form').append('<div class="col-md-2 col-sm-3 col-xs-12">'
                                      +'<label class="tebal">Kode Return</label>'
                                    +'</div>'
                                    +'<div class="col-md-4 col-sm-9 col-xs-12">'
                                      +'<div class="form-group">'
                                        +'<input type="text" name="kodeReturn" readonly="" class="form-control input-sm" value="{{$codeRP}}">'
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
                                        +'<input type="text" name="namaStaff" readonly="" class="form-control input-sm" id="nama_staff">'
                                      +'</div>'
                                    +'</div>'
                                    +'<div class="col-md-2 col-sm-3 col-xs-12">'
                                      +'<label class="tebal">Nota Pembelian</label>'
                                    +'</div>'
                                    +'<div class="col-md-4 col-sm-9 col-xs-12">'
                                      +'<div class="form-group">'
                                        +'<select class="form-control input-sm" id="cari_nota_purchase" name="cariNotaPurchase" style="width: 100%;">'
                                          +'<option> - Pilih Nota Pembelian</option>'
                                        +'</select>'
                                      +'</div>'
                                    +'</div>'
                                    +'<div class="col-md-2 col-sm-3 col-xs-12">'
                                      +'<label class="tebal">Supplier</label>'
                                    +'</div>'
                                    +'<div class="col-md-4 col-sm-9 col-xs-12">'
                                      +'<div class="form-group">'
                                        +'<input type="text" name="namaSup" readonly="" class="form-control input-sm" id="nama_sup">'
                                      +'</div>'
                                    +'</div>'
                                    +'<div class="col-md-2 col-sm-3 col-xs-12">'
                                      +'<label class="tebal">Metode Bayar</label>'
                                    +'</div>'
                                    +'<div class="col-md-4 col-sm-9 col-xs-12">'
                                      +'<div class="form-group">'
                                        +'<input type="text" name="methodBayar" readonly="" class="form-control input-sm" id="method_bayar">'
                                      +'</div>'
                                    +'</div>'
                                    +'<div class="col-md-2 col-sm-3 col-xs-12">'
                                      +'<label class="tebal">Nilai Total Pembelian</label>'
                                    +'</div>'
                                    +'<div class="col-md-4 col-sm-9 col-xs-12">'
                                      +'<div class="form-group">'
                                        +'<input type="text" name="nilaiTotalPurchase" readonly="" class="form-control input-sm" id="nilai_total_purchase">'
                                      +'</div>'
                                    +'</div>'
                                    +'<div class="table-responsive">'
                                      +'<table class="table tabelan table-bordered">'
                                        +'<thead>'
                                          +'<tr>'
                                            +'<th>Nama Barang</th>'
                                            +'<th>IMEI</th>'
                                            +'<th>Jumlah</th>'
                                            +'<th>Keterangan</th>'
                                            +'<th>Aksi</th>'
                                          +'</tr>'
                                        +'</thead>'
                                        +'<tbody>'
                                        +'</tbody>'
                                      +'</table>'
                                    +'</div>'
                                      +'<div align="right">'
                                        +'<div id="div_button_save" class="form-group">'
                                          +'<button type="button" id="button_save" class="btn btn-primary" onclick="simpanReturn()">Simpan Data</button>'
                                        +'</div>'
                                      +'</div>');
      }
      else
      {
        //remove child div inside appending-form before appending
        $('#appending-form div').remove();
        $('#appending-form').append('<div class="col-md-2 col-sm-3 col-xs-12">'
                                      +'<label class="tebal">Kode Return</label>'
                                    +'</div>'
                                    +'<div class="col-md-4 col-sm-9 col-xs-12">'
                                      +'<div class="form-group">'
                                        +'<input type="text" name="kodeReturn" readonly="" class="form-control input-sm" value="{{$codeRP}}">'
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
                                        +'<input type="text" name="namaStaff" readonly="" class="form-control input-sm" id="nama_staff">'
                                      +'</div>'
                                    +'</div>'
                                    +'<div class="col-md-2 col-sm-3 col-xs-12">'
                                      +'<label class="tebal">Nota Pembelian</label>'
                                    +'</div>'
                                    +'<div class="col-md-4 col-sm-9 col-xs-12">'
                                      +'<div class="form-group">'
                                        +'<select class="form-control input-sm" id="cari_nota_purchase" name="cariNotaPurchase" style="width: 100%;">'
                                          +'<option> - Pilih Nota Pembelian</option>'
                                        +'</select>'
                                      +'</div>'
                                    +'</div>'
                                    +'<div class="col-md-2 col-sm-3 col-xs-12">'
                                      +'<label class="tebal">Supplier</label>'
                                    +'</div>'
                                    +'<div class="col-md-4 col-sm-9 col-xs-12">'
                                      +'<div class="form-group">'
                                        +'<input type="text" name="namaSup" readonly="" class="form-control input-sm" id="nama_sup">'
                                      +'</div>'
                                    +'</div>'
                                    +'<div class="col-md-2 col-sm-3 col-xs-12">'
                                      +'<label class="tebal">Metode Bayar</label>'
                                    +'</div>'
                                    +'<div class="col-md-4 col-sm-9 col-xs-12">'
                                      +'<div class="form-group">'
                                        +'<input type="text" name="methodBayar" readonly="" class="form-control input-sm" id="method_bayar">'
                                      +'</div>'
                                    +'</div>'
                                    +'<div class="col-md-2 col-sm-3 col-xs-12">'
                                      +'<label class="tebal">Nilai Total Pembelian</label>'
                                    +'</div>'
                                    +'<div class="col-md-4 col-sm-9 col-xs-12">'
                                      +'<div class="form-group">'
                                        +'<input type="text" name="nilaiTotalPurchase" readonly="" class="form-control input-sm" id="nilai_total_purchase">'
                                      +'</div>'
                                    +'</div>'
                                    +'<div class="col-md-2 col-sm-3 col-xs-12">'
                                      +'<label class="tebal">Nilai Total Return</label>'
                                    +'</div>'
                                    +'<div class="col-md-4 col-sm-9 col-xs-12">'
                                      +'<div class="form-group">'
                                        +'<input type="text" name="nilaiTotalReturn" readonly="" class="form-control input-sm" id="nilai_total_return">'
                                      +'</div>'
                                    +'</div>'
                                    +'<div class="table-responsive">'
                                      +'<table class="table tabelan table-bordered">'
                                        +'<thead>'
                                          +'<tr>'
                                            +'<th>Nama Barang</th>'
                                            +'<th>IMEI</th>'
                                            +'<th>Jumlah</th>'
                                            +'<th>Keterangan</th>'
                                            +'<th>Aksi</th>'
                                          +'</tr>'
                                        +'</thead>'
                                        +'<tbody>'
                                        +'</tbody>'
                                      +'</table>'
                                    +'</div>'
                                      +'<div align="right">'
                                        +'<div id="div_button_save" class="form-group">'
                                          +'<button type="button" id="button_save" class="btn btn-primary" onclick="simpanReturn()">Simpan Data</button>'
                                        +'</div>'
                                      +'</div>');
      }
      //select2
      $( "#cari_nota_purchase" ).select2({
        placeholder: "Pilih Nota Pembelian...",
        ajax: {
          url: baseUrl + '/purchasing/returnpembelian/lookup-data-pembelian',
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
    });

    //autocomplete
    $( "#ip_barang" ).focus(function() {
      var key = 1;
        $( "#ip_barang" ).autocomplete({
            source: baseUrl+'/purchasing/rencanapembelian/autocomplete-barang',
            minLength: 1,
            select: function(event, ui) {
                $('#ip_item').val(ui.item.id);
                $('#ip_barang').val(ui.item.label);
                $('#ip_qtyStok').val(ui.item.stok);
                $('#ip_hargaPrev').val(ui.item.prevCost);
                Object.keys(ui.item.sat).forEach(function(){
                    $('#ip_sat').append($('<option>', { 
                        value: ui.item.sat[key-1],
                        text : ui.item.sat[key-1]
                    }));
                    key++;
                });
                $("input[name='ipQtyReq']").focus();
            }
        });
        $('#ip_sat').empty();
        $('#ip_barang').val("");
        $('#ip_qtyreq').val("");
        $('#ip_hargaPrev').val("");
        $('#ip_qtyStok').val("");
    });

    var i = randString(5);
    var no = 1;
    $('#add_item').click(function() {
        var ambilSatuan = $("#ip_sat option:selected").val();
        $('#ip_sat').empty();
        var ambilIdBarang = $('#ip_item').val();
        var ambilBarang = $('#ip_barang').val();
        var ambilQtyReq = $('#ip_qtyreq').val();
        var ambilQtyStok = $('#ip_qtyStok').val();
        var ambilHargaPrev = $('#ip_hargaPrev').val();
        if (ambilIdBarang == "" || ambilBarang == "" || ambilQtyReq == "" || ambilQtyStok == "" ) 
        {
            alert('Terdapat kolom yang kosong, dimohon cek lagi!!');
        }
        else
        {
            $('#barang_table').append('<tr class="tbl_form_row" id="row'+i+'">'
                                    +'<td style="text-align:center">'+no+'</td>'
                                    +'<td><input type="text" name="fieldIpBarang[]" value="'+ambilBarang+'" id="field_ip_barang" class="form-control" required readonly>'
                                    +'<input type="hidden" name="fieldIpItem[]" value="'+ambilIdBarang+'" id="field_ip_item" class="form-control"></td>'
                                    +'<td><input type="text" name="fieldIpQtyReq[]" value="'+ambilQtyReq+'" id="field_ip_qty_req" class="form-control" required readonly></td>'
                                    +'<td><input type="text" name="fieldIpQtySat[]" value="'+ambilSatuan+'" id="field_ip_qty_stok" class="form-control" required readonly></td>'
                                    +'<td><input type="text" name="fieldHargaPrev[]" value="'+ambilHargaPrev+'" id="field_ip_qty_stok" class="form-control" required readonly></td>'
                                    +'<td><input type="text" name="fieldIpQtyStok[]" value="'+ambilQtyStok+'" id="field_ip_qty_stok" class="form-control" required readonly></td>'
                                    +'<td><button name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td>'
                                    +'</tr>');
            i = randString(5);
            no++;
            //kosongkan field setelah append row
            $('#ip_item').val("");
            $('#ip_barang').val("");
            $('#ip_qtyreq').val("");
            $('#ip_qtyStok').val("");
            $('#ip_hargaPrev').val("");
        } 
    });

    $(document).on('click', '.btn_remove', function(){
        no--;
        var button_id = $(this).attr('id');
        $('#row'+button_id+'').remove();
    });

    //force integer input in textfield
    $('input.numberinput').bind('keypress', function (e) {
        return (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57) && e.which != 46) ? false : true;
    });
  //end jquery
  });

  function randString(angka) 
  {
    var text = "";
    var possible = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";

    for (var i = 0; i < angka; i++)
      text += possible.charAt(Math.floor(Math.random() * possible.length));

    return text;
  }

  /*function simpanPlan()
  {
    if(confirm('Simpan Data ?'))
    {
        $('#button_save').text('Menyimpan...'); //change button text
        $('#button_save').attr('disabled',true); //set button disable 
        $.ajax({
            url : baseUrl + "/purchasing/rencanapembelian/simpan-plan",
            type: "post",
            dataType: "JSON",
            data: $('#form_order_plan').serialize(),
            success: function(response)
            {
                if(response.status == "sukses")
                {
                    alert(response.pesan);
                    $('#button_save').text('Simpan Data'); //change button text
                    $('#button_save').attr('disabled',false); //set button enable 
                    window.location.href = baseUrl+"/purchasing/rencanapembelian/rencana";
                }
                else
                {
                    alert(response.pesan);
                    $('#button_save').text('Simpan Data'); //change button text
                    $('#button_save').attr('disabled',false); //set button enable 
                    window.location.href = baseUrl+"/purchasing/rencanapembelian/rencana";
                }
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error updating data');
            }
        });
    }
  }*/

  /*function convertDecimalToRupiah(decimal) 
  {
      var angka = parseInt(decimal);
      var rupiah = '';        
      var angkarev = angka.toString().split('').reverse().join('');
      for(var i = 0; i < angkarev.length; i++) if(i%3 == 0) rupiah += angkarev.substr(i,3)+'.';
      var hasil = 'Rp. '+rupiah.split('',rupiah.length-1).reverse().join('');
      return hasil+',00';
  }*/
</script>
@endsection                            
