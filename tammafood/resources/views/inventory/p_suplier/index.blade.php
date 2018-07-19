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
        <div class="page-title">Penerimaan Barang Supplier</div>
    </div>

    <ol class="breadcrumb page-breadcrumb pull-right" style="font-family: 'Raleway', sans-serif;">
      <li><i class="fa fa-home"></i>&nbsp;<a href="{{ url('/home') }}">Home</a>&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
      <li><i></i>&nbsp;Inventory&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
      <li class="active">Penerimaan Barang Supplier</li>
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
            <li class="active"><a href="#index-tab" data-toggle="tab">Daftar Penerimaan</a></li>
            <li><a href="#wait-tab" data-toggle="tab" onclick="lihatHistorybyTgl()">Daftar Tunggu</a></li>
            <li><a href="#finish-tab" data-toggle="tab" onclick="lihatHistorybyTgl()">Daftar Hasil Penerimaan</a></li>
          </ul>

          <div id="generalTabContent" class="tab-content responsive">
            
            @include('inventory.p_suplier.tab-index')
            @include('inventory.p_suplier.tab-wait')
            @include('inventory.p_suplier.tab-finish')          

          </div>
        </div>
      </div>
    </div>
  </div>
  <!--END TITLE & BREADCRUMB PAGE-->
  <!-- modal -->
    <!--modal Tambah Terima-->
    @include('inventory.p_suplier.modal')
  <!-- /modal -->
</div>
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

    var date = new Date();
    var newdate = new Date(date);

    newdate.setDate(newdate.getDate()-3);
    var nd = new Date(newdate);

    $('.datepicker1').datepicker({
      autoclose: true,
      format:"dd-mm-yyyy",
      endDate: 'today'
    }).datepicker("setDate", nd);

    $('.datepicker2').datepicker({
      autoclose: true,
      format:"dd-mm-yyyy",
      endDate: 'today'
    });//datepicker("setDate", "0");

    //select2
    $( "#head_nota_purchase" ).select2({
      placeholder: "Pilih Nota Pembelian...",
      ajax: {
        url: baseUrl + '/inventory/p_suplier/lookup-data-pembelian',
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

    //event onchange select option
    $('#head_nota_purchase').change(function() 
    {
      //remove existing appending row
      $('tr').remove('.tbl_form_row');
      var idPo = $('#head_nota_purchase').val();
      $.ajax({
        url : baseUrl + "/inventory/p_suplier/get-data-form/"+idPo,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
          var totalPembelianGross = data.data_header[0].d_pcs_total_gross;
          var totalPembelianNett = data.data_header[0].d_pcs_total_net;
          var totalDisc = parseInt(data.data_header[0].d_pcs_disc_value) + parseInt(data.data_header[0].d_pcs_discount);
          var taxPercent = data.data_header[0].d_pcs_tax_percent;
          console.log(totalDisc);
          $('#head_kode_terima').val(data.code);
          $('#head_staff').val(data.staff.nama);
          $('#head_staff_id').val(data.staff.id);
          $('#head_supplier').val(data.data_header[0].s_company);
          $('#head_supplier_id').val(data.data_header[0].s_id);
          $('#head_total_gross').val(convertDecimalToRupiah(totalPembelianGross));
          $('#head_total_disc').val(convertDecimalToRupiah(totalDisc));
          $('#head_total_nett').val(convertDecimalToRupiah(totalPembelianNett));
          $('#head_total_terima').val(convertDecimalToRupiah(totalPembelianNett));
          //persentase diskon berdasarkan total harga bruto
          var percentDiscTotalGross = parseFloat(totalDisc*100/totalPembelianGross);
          var key = 1;
          i = randString(5);
          //loop data
          Object.keys(data.data_isi).forEach(function(){
            var hargaTotalItemGross = data.data_isi[key-1].d_pcsdt_total;
            var qtyCost = data.data_isi[key-1].d_pcsdt_qtyconfirm;
            //harga total per item setelah kena diskon & pajak
            var hargaTotalItemNet = Math.round(parseFloat(hargaTotalItemGross - (hargaTotalItemGross * percentDiscTotalGross/100) + ((hargaTotalItemGross - (hargaTotalItemGross * percentDiscTotalGross/100)) * taxPercent/100)).toFixed(2));
            console.log(hargaTotalItemNet);
            var hargaSatuanItemNet = hargaTotalItemNet/qtyCost;
            //console.log(hargaSatuanItemNet);
            $('#tabel-modal-terima').append('<tr class="tbl_form_row" id="row'+i+'">'
                            +'<td style="text-align:center">'+key+'</td>'
                            +'<td><input type="text" value="'+data.data_isi[key-1].i_code+' | '+data.data_isi[key-1].i_name+'" name="fieldNamaItem[]" class="form-control input-sm" readonly/>'
                            +'<input type="hidden" value="'+data.data_isi[key-1].i_id+'" name="fieldItemId[]" class="form-control input-sm"/>'
                            +'<input type="hidden" value="'+data.data_isi[key-1].d_pcsdt_id+'" name="fieldIdTerimaDet[]" class="form-control input-sm"/></td>'
                            +'<td><input type="text" value="'+qtyCost+'" name="fieldQty[]" class="form-control numberinput input-sm field_qty" readonly/></td>'
                            +'<td><input type="text" value="'+qtyCost+'" name="fieldQtyterima[]" class="form-control numberinput input-sm field_qty_terima" id="'+i+'"/></td>'
                            +'<td><input type="text" value="'+data.data_isi[key-1].m_sname+'" name="fieldSatuanTxt[]" class="form-control input-sm" readonly/>'
                            +'<input type="hidden" value="'+data.data_isi[key-1].m_sid+'" name="fieldSatuanId[]" class="form-control input-sm" readonly/></td>'
                            +'<td><input type="text" value="'+convertDecimalToRupiah(hargaSatuanItemNet)+'" name="fieldHarga[]" id="cost_'+i+'" class="form-control input-sm field_harga numberinput" readonly/>'
                            +'<input type="hidden" value="'+hargaSatuanItemNet+'" name="fieldHargaRaw[]" id="costRaw_'+i+'" class="form-control input-sm field_harga_raw numberinput" readonly/></td>'
                            +'<td><input type="text" value="'+convertDecimalToRupiah(hargaTotalItemNet)+'" name="fieldHargaTotal[]" class="form-control input-sm hargaTotalItem" id="total_'+i+'" readonly/></td>'
                            +'<td><input type="text" value="'+data.data_stok[key-1].qtyStok+' '+data.data_satuan[key-1]+'" name="fieldStokTxt[]" class="form-control input-sm" readonly/>'
                            +'<input type="hidden" value="'+data.data_stok[key-1].qtyStok+'" name="fieldStokVal[]" class="form-control input-sm" readonly/></td>'
                            +'<td><button name="remove" id="'+i+'" class="btn btn-danger btn_remove btn-sm">X</button></td>'
                            +'</tr>');
            i = randString(5);
            key++;
          });
          //set readonly to enabled
          totalNilaiPenerimaan();
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error get data from ajax');
        }
      });
    });

    /*$('#tabel-modal-terima').dataTable({
        "destroy": true,
        "processing" : true,
        "serverside" : true,
        "ajax" : {
          url: baseUrl + "/inventory/p_suplier/tabel-modal-terima",
          type: 'GET'
        },
        "columns" : [
          {"data" : "DT_Row_Index", orderable: true, searchable: false, "width" : "5%"}, //memanggil column row
          {"data" : "tglBuat", "width" : "10%"},
          {"data" : "d_pcsp_code", "width" : "10%"},
          {"data" : "d_pcsp_staff", "width" : "10%"},
          {"data" : "s_company", "width" : "15%"},
          {"data" : "tglConfirm", "width" : "10%"},
          {"data" : "status", "width" : "10%"},
          {"data" : "action", orderable: false, searchable: false, "width" : "13%"}
        ],
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
    });*/

    //force integer input in textfield
    $('input.numberinput').bind('keypress', function (e) {
        return (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57) && e.which != 46) ? false : true;
    });

    //remove row in modal form
    $(document).on('click', '.btn_remove', function(){
      var button_id = $(this).attr('id');
      $('#row'+button_id+'').remove();
      totalNilaiPenerimaan();
    });

    // fungsi jika modal hidden
    $(".modal").on("hidden.bs.modal", function(){
      $('tr').remove('.tbl_form_row');
      //reset all input txt field
      $('#form-terima-beli')[0].reset();
      //empty select2 field
      $('#head_nota_purchase').empty();
      //set datepicker to today 
      $('.datepicker2').datepicker('setDate', 'today');  
    });

    //event focus on input qty
    $(document).on('focus', '.field_qty_terima',  function(e){
        var qty = $(this).val();
        $(this).val(qty);
        $('#button_save').attr('disabled', true);
    });

    $(document).on('blur', '.field_qty_terima',  function(e){
      var getid = $(this).attr("id");
      var qtyReturn = $(this).val();
      var cost = $('#costRaw_'+getid+'').val();
      var hasilTotal = parseInt(qtyReturn * cost);
      var totalCost = $('#total_'+getid+'').val(convertDecimalToRupiah(hasilTotal));
      // $(this).val(potonganRp);
      totalNilaiPenerimaan();
      $('#button_save').attr('disabled', false);
    });

    /*$('#tampil_data').on('change', function() {
      lihatHistorybyTgl();
    })

    $('.refresh-data-history').click(function(event) {
      $('#tbl-history').DataTable().ajax.reload();
    });*/
  //end jquery
  });

  function totalNilaiPenerimaan()
  {
    var inputs = document.getElementsByClassName( 'hargaTotalItem' ),
    hasil  = [].map.call(inputs, function( input ) 
    {
      if(input.value == '') input.value = 0;
      return input.value;
    });
    console.log(hasil);
    var total = 0;
    for (var i = hasil.length - 1; i >= 0; i--){

      hasil[i] = convertToAngka(hasil[i]);
      hasil[i] = parseInt(hasil[i]);
      total = total + hasil[i];
    }
      if (isNaN(total)) {
          total=0;
        }
    total = convertToRupiah(total);
    // console.log(total);
    $('#head_total_terima').val(total);
  }

  function randString(angka) 
  {
    var text = "";
    var possible = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";

    for (var i = 0; i < angka; i++)
      text += possible.charAt(Math.floor(Math.random() * possible.length));

    return text;
  }

  function detailPlan(id) 
  {
    $.ajax({
      url : baseUrl + "/purchasing/rencanapembelian/get-detail-plan/"+id+"/confirmed",
      type: "GET",
      dataType: "JSON",
      success: function(data)
      {
        var key = 1;
        //ambil data ke json->modal
        $('#txt_span_status').text(data.spanTxt);
        $("#txt_span_status").addClass('label'+' '+data.spanClass);
        $('#lblCodePlan').text(data.header[0].d_pcsp_code);
        $('#lblTglPlan').text(data.header[0].d_pcsp_datecreated);
        $('#lblStaff').text(data.header[0].d_pcsp_staff);
        $('#lblSupplier').text(data.header[0].s_company);
        //loop data
        Object.keys(data.data_isi).forEach(function(){
          $('#tabel-detail').append('<tr class="tbl_modal_detail_row">'
                          +'<td>'+key+'</td>'
                          +'<td>'+data.data_isi[key-1].i_code+' '+data.data_isi[key-1].i_name+'</td>'
                          +'<td>'+data.data_isi[key-1].m_sname+'</td>'
                          +'<td>'+data.data_isi[key-1].d_pcspdt_qty+'</td>'
                          +'<td>'+data.data_isi[key-1].d_pcspdt_qtyconfirm+'</td>'
                          +'<td>'+data.data_stok[key-1].qtyStok+' '+data.data_satuan[key-1]+'</td>'
                          +'</tr>');
          key++;
        });
        $('#modal-detail').modal('show');
      },
      error: function (jqXHR, textStatus, errorThrown)
      {
          alert('Error get data from ajax');
      }
    });
  }

  function detailPlanAll(id) 
  {
    $.ajax({
      url : baseUrl + "/purchasing/rencanapembelian/get-detail-plan/"+id+"/all",
      type: "GET",
      dataType: "JSON",
      success: function(data)
      {
        var key = 1;
        //ambil data ke json->modal
        $('#txt_span_status').text(data.spanTxt);
        $("#txt_span_status").addClass('label'+' '+data.spanClass);
        $('#lblCodePlan').text(data.header[0].d_pcsp_code);
        $('#lblTglPlan').text(data.header[0].d_pcsp_datecreated);
        $('#lblStaff').text(data.header[0].d_pcsp_staff);
        $('#lblSupplier').text(data.header[0].s_company);
        //loop data
        Object.keys(data.data_isi).forEach(function(){
          $('#tabel-detail').append('<tr class="tbl_modal_detail_row">'
                          +'<td>'+key+'</td>'
                          +'<td>'+data.data_isi[key-1].i_code+' '+data.data_isi[key-1].i_name+'</td>'
                          +'<td>'+data.data_isi[key-1].m_sname+'</td>'
                          +'<td>'+data.data_isi[key-1].d_pcspdt_qty+'</td>'
                          +'<td>'+data.data_isi[key-1].d_pcspdt_qtyconfirm+'</td>'
                          +'<td>'+data.data_stok[key-1].qtyStok+' '+data.data_satuan[key-1]+'</td>'
                          +'</tr>');
          key++;
        });
        $('#modal-detail').modal('show');
      },
      error: function (jqXHR, textStatus, errorThrown)
      {
          alert('Error get data from ajax');
      }
    });
  }

  function editPlanAll(id) 
  {
    $.ajax({
      url : baseUrl + "/purchasing/rencanapembelian/get-edit-plan/"+id+"/all",
      type: "GET",
      dataType: "JSON",
      success: function(data)
      {
        var key = 1;
        //ambil data ke json->modal
        $('#txt_span_status_edit').text(data.spanTxt);
        $("#txt_span_status_edit").addClass('label'+' '+data.spanClass);
        $('#lblCodeEdit').text(data.header[0].d_pcsp_code);
        $('#lblTglEdit').text(data.header[0].d_pcsp_datecreated);
        $('#lblStaffEdit').text(data.header[0].d_pcsp_staff);
        $('#lblSupplierEdit').text(data.header[0].s_company);
        $('#id_plan').val(data.header[0].d_pcsp_id);
        //loop data
        Object.keys(data.data_isi).forEach(function(){
          $('#tabel-edit').append('<tr class="tbl_modal_edit_row">'
                          +'<td>'+key+'</td>'
                          +'<td>'+data.data_isi[key-1].i_code+' '+data.data_isi[key-1].i_name+'</td>'
                          +'<td>'+data.data_isi[key-1].m_sname
                          +'<input type="hidden" value="'+data.data_isi[key-1].m_sid+'" name="fieldIdSat[]" class="form-control"/></td>'
                          +'<td><input type="text" value="'+data.data_isi[key-1].d_pcspdt_qty+'" name="fieldQty[]" class="form-control numberinput input-sm"/>'
                          +'<input type="hidden" value="'+data.data_isi[key-1].d_pcspdt_id+'" name="fieldIdDt[]" class="form-control"/></td>'
                          +'<td>'+data.data_isi[key-1].d_pcspdt_qtyconfirm+'</td>'
                          +'<td>'+convertDecimalToRupiah(data.data_isi[key-1].d_pcspdt_prevcost)+'</td>'
                          +'<td>'+data.data_stok[key-1].qtyStok+' '+data.data_satuan[key-1]+'</td>'
                          +'</tr>');
          key++;
        });
        $('#modal-edit').modal('show');
      },
      error: function (jqXHR, textStatus, errorThrown)
      {
          alert('Error get data from ajax');
      }
    });
  }

  function editPlan(id) 
  {
    $.ajax({
      url : baseUrl + "/purchasing/rencanapembelian/get-edit-plan/"+id+"/confirmed",
      type: "GET",
      dataType: "JSON",
      success: function(data)
      {
        var key = 1;
        //ambil data ke json->modal
        $('#txt_span_status_edit').text(data.spanTxt);
        $("#txt_span_status_edit").addClass('label'+' '+data.spanClass);
        $('#lblCodeEdit').text(data.header[0].d_pcsp_code);
        $('#lblTglEdit').text(data.header[0].d_pcsp_datecreated);
        $('#lblStaffEdit').text(data.header[0].d_pcsp_staff);
        $('#lblSupplierEdit').text(data.header[0].s_company);
        //loop data
        Object.keys(data.data_isi).forEach(function(){
          $('#tabel-edit').append('<tr class="tbl_modal_edit_row">'
                          +'<td>'+key+'</td>'
                          +'<td>'+data.data_isi[key-1].i_code+' '+data.data_isi[key-1].i_name+'</td>'
                          +'<td>'+data.data_isi[key-1].m_sname
                          +'<input type="hidden" value="'+data.data_isi[key-1].m_sid+'" name="fieldIdSat[]" class="form-control"/></td>'
                          +'<td><input type="text" value="'+data.data_isi[key-1].d_pcspdt_qty+'" name="fieldQty[]" class="form-control numberinput input-sm"/>'
                          +'<input type="hidden" value="'+data.data_isi[key-1].d_pcspdt_id+'" name="fieldIdDt[]" class="form-control"/></td>'
                          +'<td>'+data.data_isi[key-1].d_pcspdt_qtyconfirm+'</td>'
                          +'<td>'+convertDecimalToRupiah(data.data_isi[key-1].d_pcspdt_prevcost)+'</td>'
                          +'<td>'+data.data_stok[key-1].qtyStok+' '+data.data_satuan[key-1]+'</td>'
                          +'</tr>');
          key++;
        });
        $('#modal-edit').modal('show');
      },
      error: function (jqXHR, textStatus, errorThrown)
      {
          alert('Error get data from ajax');
      }
    });
  }

  function submitTerima()
  {
    if(confirm('Simpan Data ?'))
    {
        $('#btn_simpan').text('Updating...'); //change button text
        $('#btn_simpan').attr('disabled',true); //set button disable 
        $.ajax({
            url : baseUrl + "/inventory/p_suplier/simpan-penerimaan",
            type: "post",
            dataType: "JSON",
            data: $('#form-terima-beli').serialize(),
            success: function(response)
            {
              if(response.status == "sukses")
              {
                  alert(response.pesan);
                  $('#btn_simpan').text('Saving...'); //change button text
                  $('#btn_simpan').attr('disabled',false); //set button enable
                  $('#modal-edit').modal('hide');
                  $('#tbl-daftar').DataTable().ajax.reload();
              }
              else
              {
                  alert(response.pesan);
                  $('#btn_simpan').text('Update'); //change button text
                  $('#btn_simpan').attr('disabled',false); //set button enable
                  $('#modal-edit').modal('hide');
                  $('#tbl-daftar').DataTable().ajax.reload();
              }
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error updating data');
            }
        });
    }
  }

  function deletePlan(idPlan) 
  {
    if(confirm('Yakin hapus data ?'))
    {
        $.ajax({
            url : baseUrl + "/purchasing/rencanapembelian/delete-data-plan",
            type: "POST",
            dataType: "JSON",
            data: {idPlan:idPlan, "_token": "{{ csrf_token() }}"},
            success: function(response)
            {
                if(response.status == "sukses")
                {
                    alert(response.pesan);
                    $('#tbl-daftar').DataTable().ajax.reload();
                }
                else
                {
                    alert(response.pesan);
                    $('#tbl-daftar').DataTable().ajax.reload();
                }
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error updating data');
            }
        });
    }
  }

  function lihatHistorybyTgl(){
    var tgl1 = $('#tanggal1').val();
    var tgl2 = $('#tanggal2').val();
    var tampil = $('#tampil_data').val();
    $('#tbl-history').dataTable({
      "destroy": true,
      "processing" : true,
      "serverside" : true,
      "ajax" : {
        url: baseUrl + "/purchasing/rencanapembelian/get-data-tabel-history/"+tgl1+"/"+tgl2+"/"+tampil,
        type: 'GET'
      },
      "columns" : [
        {"data" : "DT_Row_Index", orderable: true, searchable: false, "width" : "5%"}, //memanggil column row
        {"data" : "d_pcsp_code", "width" : "10%"},
        {"data" : "i_name", "width" : "15%"},
        {"data" : "m_sname", "width" : "10%"},
        {"data" : "s_company", "width" : "15%"},
        {"data" : "tglBuat", "width" : "10%"},
        {"data" : "d_pcspdt_qty", "width" : "5%"},
        {"data" : "tglConfirm", "width" : "10%"},
        {"data" : "d_pcspdt_qtyconfirm", "width" : "5%"},
        {"data" : "status", "width" : "10%"}
      ],
      /*"rowsGroup": [
        'first:name'
      ],*/
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
  }

  function convertToAngka(rupiah)
  {
    return parseInt(rupiah.replace(/,.*|[^0-9]/g, ''), 10);
  }

  function convertToRupiah(angka) 
  {
    var rupiah = '';        
    var angkarev = angka.toString().split('').reverse().join('');
    for(var i = 0; i < angkarev.length; i++) if(i%3 == 0) rupiah += angkarev.substr(i,3)+'.';
    var hasil = 'Rp. '+rupiah.split('',rupiah.length-1).reverse().join('');
    return hasil+',00'; 
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

</script>
@endsection()