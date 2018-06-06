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
        <div class="page-title">Rencana Pembelian</div>
    </div>
    <ol class="breadcrumb page-breadcrumb pull-right" style="font-family: 'Raleway', sans-serif;">
      <li><i class="fa fa-home"></i>&nbsp;<a href="{{ url('/home') }}">Home</a>&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
      <li><i></i>&nbsp;Purchasing&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
      <li class="active">Rencana Pembelian</li>
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
            <li class="active"><a href="#alert-tab" data-toggle="tab">Daftar Rencana Pembelian</a></li>
            <li><a href="#note-tab" data-toggle="tab">History Rencana Pembelian</a></li>
            <!--  <li><a href="#label-badge-tab" data-toggle="tab">Belanja Harian</a></li> -->
          </ul>

          <div id="generalTabContent" class="tab-content responsive">
            
            @include('purchasing.rencanapembelian.tab-daftar')
            
            @include('purchasing.rencanapembelian.tab-history')          

          </div>
        </div>
      </div>
    </div>
  </div>
  <!--END TITLE & BREADCRUMB PAGE-->
  <!-- modal -->
    <!--modal detail-->
    @include('purchasing.rencanapembelian.modal-detail')
    <!--modal confirm-->
    @include('purchasing.rencanapembelian.modal-confirm')
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

    $('#tbl-daftar').dataTable({
        "destroy": true,
        "processing" : true,
        "serverside" : true,
        "ajax" : {
          url: baseUrl + "/purchasing/rencanapembelian/get-data-tabel-daftar",
          type: 'GET'
        },
        "columns" : [
          {"data" : "DT_Row_Index", orderable: true, searchable: false, "width" : "5%"}, //memanggil column row
          {"data" : "tglBuat", "width" : "10%"},
          {"data" : "d_pcsp_code", "width" : "10%"},
          {"data" : "d_pcsp_staff", "width" : "10%"},
          {"data" : "s_company", "width" : "10%"},
          {"data" : "tglConfirm", "width" : "10%"},
          {"data" : "status", "width" : "10%"},
          {"data" : "action", orderable: false, searchable: false, "width" : "15%"}
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
    });

    $('#data2').dataTable({
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

    //force integer input in textfield
    $('input.numberinput').bind('keypress', function (e) {
        return (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57) && e.which != 46) ? false : true;
    });

    // fungsi jika modal hidden
    $(".modal").on("hidden.bs.modal", function(){
      $('tr').remove('.tbl_modal_detail_row');
      //remove span class in modal detail
      $("#txt_span_status").removeClass();
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

  function detailPlan(id) 
  {
    $.ajax({
      url : baseUrl + "/purchasing/rencanapembelian/get-detail-plan/" + id,
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
                          +'<td>'+data.data_isi[key-1].d_pcspdt_qty+'</td>'
                          +'<td>'+data.data_isi[key-1].d_pcspdt_qtyconfirm+'</td>'
                          +'<td>'+data.data_stok[key-1].qtyStok+'</td>'
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

  function konfirmasiPlan(id) 
  {
      $.ajax({
      url : baseUrl + "/purchasing/rencanapembelian/confirm-plan/" + id,
      type: "GET",
      dataType: "JSON",
      success: function(data)
      {
        var key = 1;
        //ambil data ke json->modal
        $('#txt_span_status_confirm').text(data.spanTxt);
        $("#txt_span_status_confirm").addClass('label'+' '+data.spanClass);
        $("#id_plan").val(data.header[0].d_pcsp_id);
        $("#status_confirm").val(data.header[0].d_pcsp_status);
        $('#lblCodeConfirm').text(data.header[0].d_pcsp_code);
        $('#lblTglConfirm').text(data.header[0].d_pcsp_datecreated);
        $('#lblStaffConfirm').text(data.header[0].d_pcsp_staff);
        $('#lblSupplierConfirm').text(data.header[0].s_company);
        //loop data
        Object.keys(data.data_isi).forEach(function(){
          $('#tabel-confirm').append('<tr class="tbl_modal_detail_row">'
                          +'<td>'+key+'</td>'
                          +'<td>'+data.data_isi[key-1].i_code+' '+data.data_isi[key-1].i_name+'</td>'
                          +'<td>'+data.data_isi[key-1].d_pcspdt_qty+'</td>'
                          +'<td><input type="text" value="'+data.data_isi[key-1].d_pcspdt_qtyconfirm+'" name="fieldConfirm[]" class="form-control numberinput"/>'
                          +'<input type="hidden" value="'+data.data_isi[key-1].d_pcspdt_id+'" name="fieldIdDt[]" class="form-control"/></td>'
                          +'<td>'+data.data_stok[key-1].qtyStok+'</td>'
                          +'</tr>');
          key++;
        });
        $('#modal-confirm').modal('show');
      },
      error: function (jqXHR, textStatus, errorThrown)
      {
          alert('Error get data from ajax');
      }
      });
  }

  function submitConfirm(id)
  {
    if(confirm('Anda yakin konfirmasi rencana pembelian ?'))
    {
      $.ajax({
          url : baseUrl + "/purchasing/rencanapembelian/confirm-plan-submit",
          type: "post",
          dataType: "JSON",
          data: $('#form-confirm-plan').serialize(),
          success: function(response)
          {
            if(response.status == "sukses")
            {
                alert(response.pesan);
                $('#modal-confirm').modal('hide');
                $('#tbl-daftar').DataTable().ajax.reload();
            }
            else
            {
                alert(response.pesan);
                $('#modal-confirm').modal('hide');
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

</script>
@endsection()