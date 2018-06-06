@extends('main')
@section('content')
  <!--BEGIN PAGE WRAPPER-->
  <div id="page-wrapper">
      <!--BEGIN TITLE & BREADCRUMB PAGE-->
      <div id="title-breadcrumb-option-demo" class="page-title-breadcrumb">
          <div class="page-header pull-left" style="font-family: 'Raleway', sans-serif;">
              <div class="page-title">Order Pembelian</div>
          </div>

          <ol class="breadcrumb page-breadcrumb pull-right" style="font-family: 'Raleway', sans-serif;">
              <li><i class="fa fa-home"></i>&nbsp;<a href="{{ url('/home') }}">Home</a>&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
              <li><i></i>&nbsp;Purchasing&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
              <li class="active">Order Pembelian</li>
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

              <ul id="generalTab" class="nav nav-tabs ">
                <li class="active"><a href="#index-tab" data-toggle="tab">Order Pembelian</a></li>
                <!-- <li><a href="#note-tab" data-toggle="tab">Belanja Harian</a></li> -->
                <!--  <li><a href="#label-badge-tab" data-toggle="tab">Belanja Harian</a></li> -->
              </ul>

              <div id="generalTabContent" class="tab-content responsive">
                
                <!-- div index-tab -->  
                @include('purchasing.orderpembelian.tab-index')
                <!-- /div index-tab -->

              </div>

            </div>
          </div>
        </div>
      </div>

      <!-- modal -->
      @include('purchasing.orderpembelian.modal')
      <!-- /modal -->
  </div>

@endsection
@section("extra_scripts")
<script src="{{ asset ('assets/script/icheck.min.js') }}"></script>
<script type="text/javascript">
  var save_method;
  $(document).ready(function() {
    //fix to issue select2 on modal when opening in firefox
    $.fn.modal.Constructor.prototype.enforceFocus = function() {};
    //add bootstrap class to datatable
    var extensions = {
        "sFilterInput": "form-control input-sm",
        "sLengthSelect": "form-control input-sm"
    }
    // Used when bJQueryUI is false
    $.extend($.fn.dataTableExt.oStdClasses, extensions);
      // Used when bJQueryUI is true
    $.extend($.fn.dataTableExt.oJUIClasses, extensions);

    $('#tbl-index').dataTable({
        "destroy": true,
        "processing" : true,
        "serverside" : true,
        "ajax" : {
          url: baseUrl + "/purchasing/orderpembelian/get-data-tabel-index",
          type: 'GET'
        },
        "columns" : [
          {"data" : "DT_Row_Index", orderable: true, searchable: false, "width" : "5%"}, //memanggil column row
          {"data" : "tglOrder", "width" : "10%"},
          {"data" : "d_pcs_code", "width" : "10%"},
          {"data" : "d_pcs_staff", "width" : "10%"},
          {"data" : "s_company", "width" : "10%"},
          {"data" : "d_pcs_method", "width" : "5%"},
          {"data" : "hargaTotalNet", "width" : "10%"},
          {"data" : "tglMasuk", "width" : "10%"},
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

    $('#data3').dataTable({
          "destroy": true,
          "processing" : true,
          "serverside" : true,
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

    // fungsi jika modal hidden
    $(".modal").on("hidden.bs.modal", function(){
      //reset form value on modals
      //$('#form')[0].reset(); 
      $('tr').remove('.tbl_modal_row'); 
    });

  });

  function detailOrder(id) 
  {
    $.ajax({
      url : baseUrl + "/purchasing/orderpembelian/get-data-detail/" + id,
      type: "GET",
      dataType: "JSON",
      success: function(data)
      {
        var i = randString(5);
        var key = 1;
        //ambil data ke json->modal
        $('#lblNoOrder').text(data.header[0].d_pcs_code);
        $('#lblCaraBayar').text(data.header[0].d_pcs_method);
        $('#lblTglOrder').text(data.header[0].d_pcs_date);
        $('#lblTglKirim').text(data.header[0].d_pcs_date_received);
        $('#lblStaff').text(data.header[0].d_pcs_staff);
        $('#lblSupplier').text(data.header[0].s_company);
        $('[name="totalHarga"]').val(data.header2.hargaBruto);
        $('[name="diskonHarga"]').val(data.header2.nilaiDiskon);
        $('[name="ppnHarga"]').val(data.header2.nilaiPajak);
        $('[name="totalHargaFinal"]').val(data.header2.hargaNet);
        //loop data
        Object.keys(data.data_isi).forEach(function(){
          $('#tabel-order').append('<tr class="tbl_modal_row" id="row'+i+'">'
                          +'<td>'+data.data_isi[key-1].i_name+'</td>'
                          +'<td>'+data.data_isi[key-1].d_pcsdt_qty+'</td>'
                          +'<td>'+data.data_stok[key-1].qtyStok+'</td>'
                          +'<td>'+convertDecimalToRupiah(data.data_isi[key-1].d_pcsdt_price)+'</td>'
                          +'<td>'+convertDecimalToRupiah(data.data_isi[key-1].d_pcsdt_total)+'</td>'
                          +'</tr>');
          key++;  
          i = randString(5);
        });
        $('#modal-detail').modal('show');
      },
      error: function (jqXHR, textStatus, errorThrown)
      {
          alert('Error get data from ajax');
      }
    });
  }

  /*function editHasilProduksi(id,id2) 
  {
    save_method = 'update';
    $.ajax({
          url : baseUrl+"/inventory/p_hasilproduksi/edit_hasil_produksi/"+id+"/"+id2,
          type: "GET",
          dataType: "JSON",
          success: function(data)
          {
              //ambil data ke json->modal
              $('#idItemMasuk').val(data[0].dod_item);
              $('#namaItemMasuk').val(data[0].i_name);
              $('[name="qtyMasuk"]').val(data[0].dod_qty_send);
              $('#noNotaMasuk').val(data[0].do_nota);
              $('#detailId').val(data[0].dod_detailid);
              $('#doId').val(data[0].dod_do);
              $('#prdtId').val(data[0].dod_prdt_productresult);
              $('#prdtDetailId').val(data[0].dod_prdt_detail);
              $('[name="qtyDiterima"]').val(data[0].dod_qty_received);
              $('[name="qtyMasukPrev"]').val(data[0].dod_qty_received);
              $('[name="tglMasuk"]').val(data[0].dod_date_received);
              $('[name="jamMasuk"]').val(data[0].dod_time_received);
              $('#modalTerima').modal('show');
          },
          error: function (jqXHR, textStatus, errorThrown)
          {
              alert('Error get data from ajax');
          }
    });
  }*/

  function randString(angka) 
  {
    var text = "";
    var possible = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";

    for (var i = 0; i < angka; i++)
      text += possible.charAt(Math.floor(Math.random() * possible.length));

    return text;
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

  function convertIntToRupiah(angka) 
  {
    var rupiah = '';        
    var angkarev = angka.toString().split('').reverse().join('');
    for(var i = 0; i < angkarev.length; i++) 
      if(i%3 == 0) 
        rupiah += angkarev.substr(i,3)+'.';
    var hasil = 'Rp. '+rupiah.split('',rupiah.length-1).reverse().join('');
    return hasil+',00'; 
  }

  function setRupiah(evt, nilai)
  {
    $minus=0;
    var code =  (evt.charCode) ? evt.charCode : ((evt.which) ? evt.which : evt.keyCode);
    var uangDe;
    if (code != 37 && code != 39 && code != 16 && code != 36 && code != 8)
        var uang = $('.' + nilai).val().replace(/[^0-9,-]*/g, '');
    $('.' + nilai).val(uang);
    var hitungKoma = 0;
    var pisah = new Array();
    var chekArray;
    for (o = 0; o < uang.length; o++) {
        if ((uang.charAt(0)) == '-' && uang.length>1) {
            $minus=1;
            uang=uang.replace(/[^0-9,]*/g, '');
        } 
        else if ((uang.charAt(0)) == '-' && uang.length==1) {
            uang.replace(/[^0-9,]*/g, '');                
            uang='';
        } 
        if ((uang.charAt(o)) == ',') {
            hitungKoma++;
            if (hitungKoma == 1) {                        
                uangDe=parseFloat(uang.replace(',', '.')).toFixed(2);
                uang=uangDe.replace('.', ',');                       
                chekArray = uang.split(',');                    
                
            }else if(hitungKoma > 1){
                toastr.warning('Harap perikasa kembali inputan anda');
                var $notifyContainer = $('#toast-container').closest('.toast-top-center');
              if ($notifyContainer) {
                 // align center
                 var windowHeight = $(window).height() - 90;
                 $notifyContainer.css("margin-top", windowHeight / 2);
              }
                return false;
            }
        }
    }
    if ($.isArray(chekArray)) {
      var rev = parseInt(chekArray[0], 10).toString().split('').reverse().join('');            
      var rev2 = '';
      for (var l = 0; l < rev.length; l++) {
        rev2 += rev[l];
        if ((l + 1) % 3 === 0 && l !== (rev.length - 1)) {
          rev2 += '.';
        }
      }
      if (chekArray[1] == '' && $minus==0) {
          $('.' + nilai).val('Rp. ' + rev2.split('').reverse().join('') + ',' + '00');
      }
      if (chekArray[1] == '' && $minus>0) {
          $('.' + nilai).val('Rp. -' + rev2.split('').reverse().join('') + ',' + '00');
      }
      if (chekArray[1] != '' && $minus==0) {
          $('.' + nilai).val('Rp. ' + rev2.split('').reverse().join('') + ',' + chekArray[1]);
      }
      if (chekArray[1] != '' && $minus>0) {
          $('.' + nilai).val('Rp. -' + rev2.split('').reverse().join('') + ',' + chekArray[1]);
      }
    } else {
      var rev = parseInt(uang, 10).toString().split('').reverse().join('');
      var rev2 = '';
      for (var u = 0; u < rev.length; u++) {
          rev2 += rev[u];
          if ((u + 1) % 3 === 0 && u !== (rev.length - 1)) {
              rev2 += '.';
          }
      }
      if($minus==0){
      $('.' + nilai).val('Rp. ' + rev2.split('').reverse().join('') + ',' + '00');
      }
      if($minus>0){
      $('.' + nilai).val('Rp. -' + rev2.split('').reverse().join('') + ',' + '00');
      }
      if (uang == '' || uang == '0') {
          $('.' + nilai).val('');
      }
    }
  }

</script>
@endsection()