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
          <div class="page-title">Form Belanja Harian</div>
      </div>
      <ol class="breadcrumb page-breadcrumb pull-right" style="font-family: 'Raleway', sans-serif;">
          <li><i class="fa fa-home"></i>&nbsp;<a href="{{ url('/home') }}">Home</a>&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
          <li><i></i>&nbsp;Purchasing&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
          <li class="active">Belanja Harian&nbsp;&nbsp;</li><i class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
          <li class="active">Form Belanja Harian</li>
      </ol>
      <div class="clearfix">
      </div>
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
              <li class="active"><a href="#alert-tab" data-toggle="tab">Form Belanja Harian</a></li>
              <!-- <li><a href="#note-tab" data-toggle="tab">2</a></li>
              <li><a href="#label-badge-tab" data-toggle="tab">3</a></li> -->
            </ul>

            <div id="generalTabContent" class="tab-content responsive" >
              <!-- div alert-tab -->
              <div id="alert-tab" class="tab-pane fade in active">
                <div class="row">  
                  <div class="col-md-12 col-sm-12 col-xs-12">
                  
                    <div class="col-md-12 col-sm-12 col-xs-12" style="margin-top: -10px;margin-bottom: 15px;">  
                      <div class="col-md-5 col-sm-6 col-xs-8" >
                        <h4>Form Belanja Harian</h4>
                      </div>

                      <div class="col-md-7 col-sm-6 col-xs-4" align="right" style="margin-top:5px;margin-right: -25px;">
                        <a href="{{ url('purchasing/belanjaharian/belanja') }}" class="btn"><i class="fa fa-arrow-left"></i></a>
                     </div>
                    </div>

                    <form action="#" method="post" id="form-belanja">
                      {{ csrf_field() }}
                      <div class="col-md-12 col-sm-12 col-xs-12 tamma-bg" style="margin-bottom: 20px; padding-top:30px;padding-bottom:20px;">
                        
                        <div class="col-md-2 col-sm-3 col-xs-12">
                          <label class="tebal">Tanggal Beli</label>
                        </div>

                        <div class="col-md-4 col-sm-9 col-xs-12">
                          <div class="form-group">
                            <input id="tanggal_beli" class="form-control input-sm datepicker2" name="tanggalBeli" type="text" value="{{ date('d-m-Y') }}">
                          </div> 
                        </div>

                        <div class="col-md-2 col-sm-3 col-xs-12">
                          <label class="tebal">No Nota</label>
                        </div>

                        <div class="col-md-4 col-sm-9 col-xs-12">
                          <div class="form-group">
                            <input type="text" readonly="" class="form-control input-sm" value="{{$codePH}}" name="kodeNota">                
                          </div>
                        </div>

                        <div class="col-md-2 col-sm-3 col-xs-12">
                          <label class="tebal">Total Biaya</label>
                        </div>

                        <div class="col-md-4 col-sm-9 col-xs-12">
                          <div class="form-group">
                            <input type="text" class="form-control input-sm" name="totalBiaya" readonly>
                          </div>
                        </div>

                        <div class="col-md-2 col-sm-3 col-xs-12">
                          <label class="tebal">Nama Staff</label>
                        </div>

                        <div class="col-md-4 col-sm-9 col-xs-12">
                          <div class="form-group">
                            {{-- <input type="text" readonly="" value="{{ Auth::user()->username }}" class="form-control input-sm">
                            <input type="hidden" value="{{ Auth::user()->id }}" name=""> --}}
                            <input type="text" readonly="" class="form-control input-sm" name="namaStaff" value="{{$namaStaff}}">
                          </div>
                        </div>

                        <div class="col-md-2 col-sm-3 col-xs-12">
                          <label class="tebal">No Reff</label>
                        </div>

                        <div class="col-md-4 col-sm-9 col-xs-12">
                          <div class="form-group">
                              <input type="text" class="form-control input-sm" name="noReff">
                          </div>
                        </div>

                        <div class="col-md-2 col-sm-3 col-xs-12">
                          <label class="tebal">Jumlah Yang Dibayarkan</label>
                        </div>

                        <div class="col-md-4 col-sm-9 col-xs-12">
                          <div class="form-group">
                              <input type="text"  class="form-control input-sm" name="totalBayar" id="total_bayar">
                          </div>
                        </div>
                        
                        <div class="col-md-2 col-sm-3 col-xs-12">
                          <label class="tebal">Supplier</label>
                        </div>

                        <div class="col-md-4 col-sm-9 col-xs-12">
                          <div class="input-group input-group-sm" style="width: 100%;">
                            <input type="text" id="nama_supplier" name="namaSupplier" class="form-control" required>
                            <input type="hidden" id="id_supplier" name="idSupplier" class="form-control">
                            <span class="input-group-btn"><button  type="button" class="btn btn-info btn-sm btn_add_supplier" data-toggle="modal" data-target="#modal-supplier"><i class="fa fa-plus"></i></button></span>
                          </div>
                        </div>

                      </div>

                      <div class="table-responsive">
                        <table class="table tabelan table-bordered" id="tabel-belanja">
                          <thead>
                            <tr>
                              <th width="5%">No</th>
                              <th width="25%">Nama Barang</th>
                              <th width="10%">QTY</th>
                              <th width="10%">Satuan</th>
                              <th width="15%">Harga Satuan</th>
                              <th width="15%">Total Harga</th>
                              <th style="text-align: center;" width="5%">Aksi</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <td style="text-align: center;"><strong>#</strong></td>
                              <td>
                                  {{ csrf_field() }}
                                  <input type="hidden" id="ip_item" class="form-control" value="" name="ipItem">
                                  <div class="input-group input-group-sm" style="width: 100%;">
                                    <input type="text" id="ip_barang" class="form-control ui-autocomplete-input input-sm" placeholder="Masukkan nama barang" autocomplete="off" name="ipBarang">
                                    <!-- <span class="input-group-btn"><button  type="button" class="btn btn-info btn-sm btn_add_barang" data-toggle="modal" data-target="#modal-barang"><i class="fa fa-plus"></i></button></span> -->
                                    <span class="input-group-btn"><button  type="button" class="btn btn-info btn-sm btn_add_barang" onclick="tambahMasterBarang()"><i class="fa fa-plus"></i></button></span>
                                  </div>
                              </td>
                              <td>
                                  <input type="text" id="ip_qty" class="form-control input-sm numberinput" value="" name="ipQty">
                              </td>
                              <td>
                                  <select class="form-control input-sm" id="ip_satuan" name="ipSat" style="width: 100%;"></select>
                              </td>
                              <td>
                                  <input type="text" id="ip_harga" class="form-control input-sm" value="" name="ipHarga">
                              </td>
                              <td>
                                  <input type="text" id="ip_harga_total" class="form-control input-sm" value="" name="ipHargaTotal" readonly>
                              </td>
                              <td>
                                  <button id="add_item" type="button" class="btn btn-info btn-sm" title="tambah"><i class="fa fa-plus"></i></button>
                              </td>
                            </tr>
                          </tbody>
                        </table>
                      </div>

                      <div align="right" style="margin-top:20px;">
                        <div class="form-group" align="right">
                          <button type="button" id="button_save" class="btn btn-primary" onclick="simpanBelanja()">Simpan Data</button>
                        </div>
                      </div>

                    </form>

                  </div>
                </div>
              </div>
              <!-- /div alert-tab -->
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--END PAGE WRAPPER-->
  <!-- modal-supplier -->
  @include('purchasing.belanjaharian.modal-supplier')
  <!-- modal-barang -->
  @include('purchasing.belanjaharian.modal-barang')
@endsection
@section("extra_scripts")
<script src="{{ asset("js/inputmask/inputmask.jquery.js") }}"></script>
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
        format:"dd-mm-yyyy"
    });

    //autocomplete
    $( "#nama_supplier" ).focus(function() {
      $( "#nama_supplier" ).autocomplete({
          source: baseUrl+'/purchasing/belanjaharian/autocomplete-supplier',
          minLength: 1,
          select: function(event, ui) {
              $('#id_supplier').val(ui.item.id);
              $('#nama_supplier').val(ui.item.label);
              $("input[name='totalBayar']").focus();
          }
      });
      $('#nama_supplier').val("");
      $('input[name="totalBayar"]').val(convertDecimalToRupiah('0.00'));
    });

    //autocomplete
    $( "#ip_barang" ).focus(function() {
      var key = 1;
        $( "#ip_barang" ).autocomplete({
            source: baseUrl+'/purchasing/belanjaharian/autocomplete-barang',
            minLength: 1,
            select: function(event, ui) {
                $('#ip_item').val(ui.item.id);
                $('#ip_barang').val(ui.item.label);
                //$('#ip_satuan').val(ui.item.satuan);
                Object.keys(ui.item.sat).forEach(function()
                {
                  $('#ip_satuan').append($('<option>', 
                  { 
                      value: ui.item.sat[key-1],
                      text : ui.item.satTxt[key-1]
                  }));
                  key++;
                });
                $('#ip_harga').val(convertDecimalToRupiah('0.00'));
                $('#ip_harga_total').val(convertDecimalToRupiah('0.00'));
                $("input[name='ipQty']").focus();
            }
        });
        $('#ip_satuan').empty();
        $('#ip_barang').val("");
        $('#ip_item').val("");
        $('#ip_qty').val("");
        $('#ip_harga').val("");
        $('#ip_harga_total').val("");
    });

    //event focus on input harga
    $(document).on('focus', '#ip_harga',  function(e){
        var harga = convertToAngka($(this).val());
        $(this).val(harga);
    });

    $(document).on('focus', '#total_bayar',  function(e){
        var bayar = convertToAngka($(this).val());
        $(this).val(bayar);
    });

    //event onblur input harga
    $(document).on('blur', '#ip_harga',  function(e){
      var harga = $(this).val();
      var qty = $('#ip_qty').val();
      //hitung nilai harga total
      var valueHargaTotal = convertToRupiah(qty * harga);
      $('#ip_harga_total').val(valueHargaTotal);
      //ubah format ke rupiah
      var hargaRp = convertToRupiah($(this).val());
      $(this).val(hargaRp);
      //totalPembelian();
    });

    //event onblur qty
    $(document).on('blur', '#ip_qty',  function(e){
      var qty = $(this).val();
      var harga = convertToAngka($('#ip_harga').val());
      //hitung nilai harga total
      var valueHargaTotal = convertToRupiah(qty * harga);
      $('#ip_harga_total').val(valueHargaTotal);
      //totalPembelian();
    });

    $(document).on('blur', '#total_bayar',  function(e){
      var valueHargaByr = convertToRupiah($(this).val());
      $(this).val(valueHargaByr);
    });

    var i = randString(5);
    var no = 1;
    $('#add_item').click(function() {
        var ambilSatuanId = $("#ip_satuan option:selected").val();
        var ambilSatuanTxt = $("#ip_satuan option:selected").text();
        $('#ip_satuan').empty();
        var ambilIdBarang = $('#ip_item').val();
        var ambilBarang = $('#ip_barang').val();
        var ambilQty = $('#ip_qty').val();
        var ambilHarga = $('#ip_harga').val();
        var ambilHargaTotal = $('#ip_harga_total').val();
        if (ambilIdBarang == "" || ambilBarang == "" || ambilQty == "" || ambilSatuanId == "" ) 
        {
            alert('Terdapat kolom yang kosong, dimohon cek lagi!!');
        }
        else
        {
            $('#tabel-belanja').append('<tr class="tbl_form_row" id="row'+i+'">'
                                    +'<td style="text-align:center">'+no+'</td>'
                                    +'<td><input type="text" name="fieldIpBarang[]" value="'+ambilBarang+'" id="field_ip_barang" class="form-control" required readonly>'
                                    +'<input type="hidden" name="fieldIpItem[]" value="'+ambilIdBarang+'" id="field_ip_item" class="form-control"></td>'
                                    +'<td><input type="text" name="fieldIpQty[]" value="'+ambilQty+'" id="field_ip_qty" class="form-control" required readonly></td>'
                                    +'<td><input type="text" name="fieldIpSatTxt[]" value="'+ambilSatuanTxt+'" id="field_ip_sat_txt" class="form-control" required readonly>'
                                    +'<input type="hidden" name="fieldIpSatId[]" value="'+ambilSatuanId+'" id="field_ip_sat_id" class="form-control" required readonly></td>'
                                    +'<td><input type="text" name="fieldIpHarga[]" value="'+ambilHarga+'" id="field_ip_harga" class="form-control" required readonly></td>'
                                    +'<td><input type="text" name="fieldIpHargaTot[]" value="'+ambilHargaTotal+'" id="field_ip_harga_tot" class="form-control hargaTotalItem" required readonly></td>'
                                    +'<td><button name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td>'
                                    +'</tr>');
            i = randString(5);
            no++;
            //kosongkan field setelah append row
            $('#ip_satuan').val("");
            $('#ip_barang').val("");
            $('#ip_qty').val("");
            $('#ip_item').val("");
            $('#ip_harga').val("");
            $('#ip_harga_total').val("");
            totalPembelian();
        } 
    });

    $(document).on('click', '.btn_remove', function(){
        var button_id = $(this).attr('id');
        $('#row'+button_id+'').remove();
        totalPembelian();
    });

    //force integer input in textfield
    $('input.numberinput').bind('keypress', function (e) {
        return (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57) && e.which != 46) ? false : true;
    });

    $('#code_group').change(function(){
      var id = $(this).val();
      var bid = $('#code_group').find(':selected').data('val');
      console.log(id);
      $.ajax({
         type: "get",
         url: '{{ route('kode_barang') }}',
         data: {id},
         success: function(data){
          $('#kode_barang').val(data);
         
         },
         error: function(){
        
         },
         async: false
      });
    });

    // fungsi jika modal hidden
    /*$(".modal").on("hidden.bs.modal", function(){
      
    });*/

    //mask money
    $.fn.maskFunc = function(){
      $('.currency').inputmask("currency", {
          radixPoint: ",",
          groupSeparator: ".",
          digits: 2,
          autoGroup: true,
          prefix: '', //Space after $, this will not truncate the first character.
          rightAlign: false,
          oncleared: function () { self.Value(''); }
      });
    }

    $(this).maskFunc();

    $('#code_group').change(function(){
      var id = $(this).val();
      var bid = $('#code_group').find(':selected').data('val');
      console.log(id);
      $.ajax({
         type: "get",
         url: '{{ route('kode_barang') }}',
         data: {id},
         success: function(data){
          $('#kode_barang').val(data);
         
         },
         error: function(){
        
         },
         async: false
      });
    });

    //event focus on isi_sat3
    $(document).on('focus', '#isi_sat2',  function(e){
      $('#isi_sat2').attr('readonly', false);
      $('#isi_sat3').attr('readonly', false);
      $('#harga_beli1').val('').attr('readonly', true);
      $('#harga_beli2').val('');
      $('#harga_beli3').val('');
    });

    //event focus on isi_sat3
    $(document).on('focus', '#isi_sat3',  function(e){
      $('#isi_sat2').attr('readonly', false);
      $('#isi_sat3').attr('readonly', false);
      $('#harga_beli1').val('').attr('readonly', true);
      $('#harga_beli2').val('');
      $('#harga_beli3').val('');
    });

    //event onblur harga isi_sat3
    $(document).on('blur', '#isi_sat3',  function(e){
      $('#harga_beli1').attr('readonly', false);
    });

    //event focus on harga beli1
    $(document).on('focus', '#harga_beli1',  function(e){
      $('#isi_sat2').attr('readonly', true);
      $('#isi_sat3').attr('readonly', true);
    });

    //event onblur harga beli1
    $(document).on('blur', '#harga_beli1',  function(e){
      var harga1 = convertToAngka($(this).val());
      // console.log(harga1);
      var isi2 = $('#isi_sat2').val();
      var isi3 = $('#isi_sat3').val();
      var harga2 = parseInt(harga1 * isi2);
      var harga3 = parseInt(harga1 * isi3);
      // console.log(harga2);
      // console.log(harga3);
      $('#harga_beli2').val(harga2);
      $('#harga_beli3').val(harga3);
    });

    $('#change_function').on("click", "#save_barang",function(){
      if(confirm('Simpan Data Barang ?'))
      {
        $('#save_barang').text('Menyimpan...'); //change button text
        $('#save_barang').attr('disabled',true); //set button disable 
        $.ajax({
          type: "get",
          url: '{{ route('simpan_barang') }}',
          data: $('#form-master-barang').serialize(),
          success: function(response)
          {
            if(response.status == "sukses")
            {
              // alert(response.pesan);
              toastr.success(response.pesan, 'Pemberitahuan');
              $('#save_barang').text('Simpan Data'); //change button text
              $('#save_barang').attr('disabled',false); //set button enable
              $('#modal-barang').modal('hide');
            }
            else
            {
              toastr.error(response.pesan, 'Pemberitahuan');
              $('#save_barang').text('Simpan Data'); //change button text
              $('#save_barang').attr('disabled',false); //set button enable
              $('#modal-barang').modal('hide');
            }              
          },
          error: function()
          {
            toastr.error('Data Tidak Tersimpan!','Pemberitahuan') 
          },
          async: false
        });
      }
    });


  //end jquery
  });

  function save_supplier() 
  {
    if(confirm('Simpan Data Supplier ?'))
    {
        $('#btn-simpan-supplier').text('Menyimpan...'); //change button text
        $('#btn-simpan-supplier').attr('disabled',true); //set button disable 
        $.ajax({
            url : baseUrl + "/purchasing/belanjaharian/buat-master-supplier",
            type: "post",
            dataType: "JSON",
            data: $('#form-master-supplier').serialize(),
            success: function(response)
            {
                if(response.status == "sukses")
                {
                    alert(response.pesan);
                    $('#btn-simpan-supplier').text('Simpan Data'); //change button text
                    $('#btn-simpan-supplier').attr('disabled',false); //set button enable
                    $('#modal-supplier').modal('hide');
                }
                else
                {
                    alert(response.pesan);
                    $('#btn-simpan-supplier').text('Simpan Data'); //change button text
                    $('#btn-simpan-supplier').attr('disabled',false); //set button enable
                    $('#modal-supplier').modal('hide');
                }
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error updating data');
            }
        });
    }
  }

  function simpanBelanja()
  {
    if(confirm('Simpan Data Belanja ?'))
    {
        $('#button_save').text('Menyimpan...'); //change button text
        $('#button_save').attr('disabled',true); //set button disable 
        $.ajax({
            url : baseUrl + "/purchasing/belanjaharian/simpan-data-belanja",
            type: "post",
            dataType: "JSON",
            data: $('#form-belanja').serialize(),
            success: function(response)
            {
                if(response.status == "sukses")
                {
                    alert(response.pesan);
                    $('#button_save').text('Simpan Data'); //change button text
                    $('#button_save').attr('disabled',false); //set button enable
                     window.location.href = baseUrl+"/purchasing/belanjaharian/belanja";
                }
                else
                {
                    alert(response.pesan);
                    $('#button_save').text('Simpan Data'); //change button text
                    $('#button_save').attr('disabled',false); //set button enable
                    window.location.href = baseUrl+"/purchasing/belanjaharian/belanja";
                }
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error updating data');
            }
        });
    }
  }

  function tambahMasterBarang() 
  {
    $('#code_group').empty();
    $('#satuan_1').empty();
    $('#satuan_2').empty();
    $('#satuan_3').empty();
    $('#code_group').append($('<option>', { value: "", text : "- Pilih Data -" }));
    $('#satuan_1').append($('<option>', { value: "", text : "- Pilih Data -" }));
    $('#satuan_2').append($('<option>', { value: "", text : "- Pilih Data -" }));
    $('#satuan_3').append($('<option>', { value: "", text : "- Pilih Data -" }));
    $.ajax({
      url : baseUrl + "/purchasing/belanjaharian/get-data-masterbarang",
      type: "GET",
      dataType: "JSON",
      success: function(data)
      {
        var key = 1;
        var key2 = 1;
        Object.keys(data.group).forEach(function(){
          $('#code_group').append($('<option>',
          {
            value: data.group[key-1].m_gcode,
            text : data.group[key-1].m_gname 
          }));

          key++;
        });

        Object.keys(data.satuan).forEach(function(){
          $('#satuan_1').append($('<option>',
          {
            value: data.satuan[key2-1].m_sid,
            text : data.satuan[key2-1].m_sname 
          }));

          $('#satuan_2').append($('<option>',
          {
            value: data.satuan[key2-1].m_sid,
            text : data.satuan[key2-1].m_sname 
          }));

          $('#satuan_3').append($('<option>',
          {
            value: data.satuan[key2-1].m_sid,
            text : data.satuan[key2-1].m_sname 
          }));
          
          key2++;
        });

        $('#modal-barang').modal('show');
      },
      error: function (jqXHR, textStatus, errorThrown)
      {
          alert('Error get data from ajax');
      }
    });
  }

  function convertDecimalToRupiah(decimal) 
  {
    var angka = parseInt(decimal);
    var rupiah = '';        
    var angkarev = angka.toString().split('').reverse().join('');
    for(var i = 0; i < angkarev.length; i++) if(i%3 == 0) rupiah += angkarev.substr(i,3)+'.';
    var hasil = 'Rp. '+rupiah.split('',rupiah.length-1).reverse().join('');
    return hasil+',00';
  }

  function randString(angka) 
  {
    var text = "";
    var possible = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";

    for (var i = 0; i < angka; i++)
      text += possible.charAt(Math.floor(Math.random() * possible.length));

    return text;
  }

  function convertToRupiah(angka) 
  {
    var rupiah = '';        
    var angkarev = angka.toString().split('').reverse().join('');
    for(var i = 0; i < angkarev.length; i++) if(i%3 == 0) rupiah += angkarev.substr(i,3)+'.';
    var hasil = 'Rp. '+rupiah.split('',rupiah.length-1).reverse().join('');
    return hasil+',00'; 
  }

  function convertToAngka(rupiah)
  {
    return parseInt(rupiah.replace(/,.*|[^0-9]/g, ''), 10);
  }

  function convertDiscToAngka(disc) {
    return parseInt(disc.replace('%', ''), 10);
  }

  function totalPembelian(){
    var inputs = document.getElementsByClassName( 'hargaTotalItem' ),
    hasil  = [].map.call(inputs, function( input ) {
        if(input.value == '') input.value = 0;
        return input.value;
    });
    console.log(hasil);
    var total = 0;
    for (var i = hasil.length - 1; i >= 0; i--)
    {
      hasil[i] = convertToAngka(hasil[i]);
      hasil[i] = parseInt(hasil[i]);
      total = total + hasil[i];
    }
    if (isNaN(total)) 
    {
      total=0;
    }

    total = convertToRupiah(total);
    $('[name="totalBiaya"]').val(total);
  }
  
</script>
@endsection()