@extends('main')
@section('content')
            <!--BEGIN PAGE WRAPPER-->
            <div id="page-wrapper">
                <!--BEGIN TITLE & BREADCRUMB PAGE-->
                <div id="title-breadcrumb-option-demo" class="page-title-breadcrumb">
                    <div class="page-header pull-left" style="font-family: 'Raleway', sans-serif;">
                        <div class="page-title">Tambah Rencana Penjualan</div>
                    </div>
                    <ol class="breadcrumb page-breadcrumb pull-right" style="font-family: 'Raleway', sans-serif;">
                        <li><i class="fa fa-home"></i>&nbsp;<a href="{{ url('/home') }}">Home</a>&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
                        <li><i></i>&nbsp;Penjualan&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
                        <li class="active">Rencana Penjualan&nbsp;&nbsp;</li><i class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
                        <li class="active">Tambah Rencana Penjualan</li>
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
                            <li class="active"><a href="#alert-tab" data-toggle="tab">Tambah Rencana Penjualan</a></li>
                            <!-- <li><a href="#note-tab" data-toggle="tab">2</a></li>
                            <li><a href="#label-badge-tab" data-toggle="tab">3</a></li> -->
                          </ul>
                    <div id="generalTabContent" class="tab-content responsive" >
                      <!-- div alert-tab -->
                      <div id="alert-tab" class="tab-pane fade in active">
                      <div class="row">  
                        <div class="col-md-12 col-xs-12 col-sm-12">
                          <div class="col-md-6 col-sm-6 col-xs-6" style="margin-top: -10px;">
                            <div class="form-group">
                              <h4>Data Barang Penjualan Terlaris Bulan Lalu :</h4>
                            </div>
                          </div>
                           
                          <div class="col-md-6 col-sm-6 col-xs-6" align="right">
                            
                            
                            <a href="{{ url('/penjualan/rencanapenjualan/rencana') }}" class="btn"><i class="fa fa-arrow-left"></i></a>
                            
                          </div>
                        </div>

                        <div class="col-md-12 col-xs-12 col-sm-12">
                          <div class="table-responsive">
                          <table class="table tabelan table-hover table-bordered " id="data2" width="100%" cellspacing="0">
                            <thead>
                              <th class="wd-15p">No</th>
                              <th class="wd-15p">Nama Barang</th>
                              <th class="wd-15p">Quantity</th>                              
                            </thead>
                            <tbody>                              
                            </tbody>
                          </table>
                          </div>                                       
                        </div> 
                        
                      
                      <div class="col-md-12 col-xs-12 col-sm-12">
                        <div class="col-md-12 col-sm-12 col-xs-12">  
                          <div class="form-group">
                            <h4>Tambah Data Rencana Penjualan</h4>
                          </div>
                        </div>
                      </div>
                      
                      <form class="col-md-12 col-xs-12 col-sm-12 form_header">  
                        <div class="col-md-12 col-sm-12 col-xs-12 tamma-bg" style="padding-bottom: : 10px;padding-top: 10px;margin-bottom: 10px;">      
                               {{ csrf_field() }}

                              <div class="col-md-3 col-md-offset-2 col-sm-6 col-xs-12">
                                <label class="form-label">Id Rencana</label>
                              </div>

                              <div class="col-md-4 col-sm-6 col-xs-12">
                                <div class="form-group">
                                  <input type="text" id="id" name="id" readonly="" value="{{$data->rp_id}}" class="form-control input-sm id">
                                </div>
                              </div>

                              <div class="col-md-3 col-sm-0 col-xs-0" style="height: 45px;">
                                <!-- Empty -->
                              </div>

                              <div class="col-md-3 col-md-offset-2 col-sm-6 col-xs-12">
                                <label class="form-label">Bulan</label>
                              </div>

                              <div class="col-md-4 col-sm-6 col-xs-12">
                                <div class="form-group">
                                  <input value="{{ $data->rp_bulan }}" type="text" id="bulan" name="bulan" class="form-control input-sm datepicker bulan">
                                </div>
                              </div>

                              <div class="col-md-3 col-sm-0 col-xs-0" style="height: 45px;">
                                <!-- Empty -->
                              </div>

                              <div class="col-md-3 col-md-offset-2 col-sm-6 col-xs-12">
                                <label class="col-form-label">Sampai Periode</label>
                              </div>

                              <div class="col-md-4 col-sm-6 col-xs-12">
                                <div class="form-group">
                                  <input type="text" id="periode" value="{{ carbon\carbon::parse($data->rp_periode)->format('d-m-Y') }}" name="periode" class="form-control input-sm datepicker2">
                                </div>
                              </div>

                              <div class="col-md-3 col-sm-0 col-xs-0" style="height: 45px;">
                                <!-- Empty -->
                              </div>

                              <div class="col-md-3 col-md-offset-2 col-sm-6 col-xs-12">
                                <label class="col-form-label">Jumlah Target Penjualan</label>
                              </div>

                              <div class="col-md-4 col-sm-6 col-xs-12">
                                <div class="form-group">
                                  <input type="text" name="total_qty" readonly="" value="{{ $data->rp_target_qty }}" class="form-control input-sm value">
                                </div>
                              </div>

                              <div class="col-md-3 col-sm-0 col-xs-0" style="height: 45px;">
                                <!-- Empty -->
                              </div>

                              <div class="col-md-3 col-md-offset-2 col-sm-6 col-xs-12">
                                <label class="col-form-label">Jumlah Target Pendapatan</label>
                              </div>

                              <div class="col-md-4 col-sm-6 col-xs-12">
                                <div class="form-group">
                                  <input type="text" name="total_val" readonly="" value="{{ number_format($data->rp_target_value, 0, ",", ".")}}" class="form-control input-sm value2">
                                </div>
                              </div>

                              <div class="col-md-8 col-sm-0 col-xs-0" style="height: 45px;">
                                <!-- Empty -->
                              </div>


                              <div class="col-md-4 col-sm-6 col-xs-12">
                                <div class="form-group">
                                  <button type="button" name="simpan"   class="btn btn-warning simpan"><i class="fa fa-save"> Simpan</i></button>
                                </div>
                              </div>

                        </div>
                      </form>  


                        <div class="col-md-12 col-xs-12 col-sm-12">  
                          <div class="table-responsive" style="margin-top: 10px;">
                            <table width="100%" class="table-hover table tabelan" cellspacing="0" id="data">
                              <thead>
                                <th width="5%">No</th>
                                <th>Nama Barang</th>
                                <th width="10%">Stock Gudang</th>
                                <th width="5%">Satuan</th>
                                <th>Target Penjualan</th>
                                <th>Target Pendapatan</th>
                              </thead>
                              <tbody>
                                
                              </tbody>
                            </table>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
@endsection
@section("extra_scripts")
{{-- <script src="{{ asset ('assets/script/icheck.min.js') }}"></script> --}}
<script type="text/javascript">
   
$('.bulan').datepicker({
  format: "mm-yyyy",
  viewMode: "months",
  minViewMode: "months"
});


$('.datepicker2').datepicker({
  format: "dd-mm-yyyy",
});


$(document).ready(function(){
  var id = '{{ $id }}';
  $('#data').DataTable({
    processing: false,
    serverSide: false,
    ajax: {
        url:'{{ route('datatable_rencana2') }}',
        data:{id}
    },
    columnDefs: [

            {
               targets: 0 ,
               className: 'center'
            },
            {
               targets: 2,
               className: 'center'
            },
            {
               targets: 5,
               className: 'center'
            },
          ],
    columns: [
      {data: 'DT_Row_Index', name: 'DT_Row_Index'},
      {data: 'i_name', name: 'i_name'},
      {data: 's_qty', name: 's_qty'},
      {data: 'i_sat1', name: 'i_sat1'},
      {data: 'target_penjualan', name: 'target_penjualan'},
      {data: 'target_pendapatan', name: 'target_pendapatan'},
    ],


  });



})


function target_qty(a) {
  var table = $('#data').DataTable();
  $('.target_qty').maskMoney({
    decimal:"",
    precision:0,
    allowZero:true,
    defaultZero: true,
    thousands:""
  });

  var temp = 0;
  table.$('.target_qty').each(function(){
    var val = $(this).val()/1;
    temp += val;
  })

  $('.value').val(temp);




  var par         = $(a).parents('td');
  var par_tr      = $(a).parents('tr');
  var i_id        = $(par).find('.i_id').val()/1;
  var qty         = $(par).find('.target_qty').val()/1;
  var harga       = $(par).find('.harga').val()/1;

  $(par_tr).find('.target_value').val(accounting.formatMoney(qty * harga, "", 0, ".",','));

  var temp1 = 0;
  table.$('.target_value').each(function(){
    var val = $(this).val();
    val     = val.replace(/[^0-9\-]+/g,"")/1;
    temp1 += val;
  })
  $('.value2').val(accounting.formatMoney(temp1, "", 0, ".",','));

}

$('.simpan').click(function(){
  var table = $('#data').DataTable();
  var datepicker = $('.bulan').val();
  var datepicker2 = $('.datepicker2').val();

  if (datepicker == '') {
    alert('Bulan Harus Diisi');
    return false;
  }

  if (datepicker2 == '') {
    alert('Periode Harus Diisi');
    return false;
  }
  var stay = confirm("Simpan Data?");
  if(stay)
  {
    var arr1 = [];
    var arr2 = [];
    var arr3 = [];
    table.$('.i_id').each(function(){
      var par = $(this).parents('tr');
      var qty = $(par).find('.target_qty').val();
      if (qty != 0) {
        var val = $(this).val();
        arr1.push(val);
      }
    })

    table.$('.target_qty').each(function(){
      var val = $(this).val();
      if (val != 0) {
        arr2.push(val);
      }
    })

    table.$('.target_value').each(function(){
      var par = $(this).parents('tr');
      var qty = $(par).find('.target_qty').val();
      if (qty != 0) {
        var val = $(this).val();
        arr3.push(val);
      }
    })


    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
      url:'{{ url('penjualan/rencanapenjualan/save_item') }}' + '?'+ $('.form_header :input').serialize(),
      data: {arr1,arr2,arr3},
      dataType:'json',
      type: 'get',
      success:function(data){
        if (data.status == 1) {
          alert(data.message);
          window.location = '{{ url('penjualan/rencanapenjualan/rencana') }}';
        }else{
          alert(data.message);
        }
      },
      error:function(){

      }
    }) 
  }
})
</script>
@endsection()