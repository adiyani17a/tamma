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
                      
                      <div class="col-md-12 col-xs-12 col-sm-12">  
                        <div class="col-md-12 col-sm-12 col-xs-12 tamma-bg" style="padding-bottom: : 10px;padding-top: 10px;margin-bottom: 10px;">      
                              <div class="col-md-3 col-md-offset-2 col-sm-6 col-xs-12">
                                <label class="form-label">Id Rencana</label>
                              </div>

                              <div class="col-md-4 col-sm-6 col-xs-12">
                                <div class="form-group">
                                  <input type="text" id="id" name="id" readonly="" value="{{$id}}" class="form-control input-sm id">
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
                                  <input type="text" id="bulan" name="bulan" class="form-control input-sm datepicker">
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
                                  <input type="text" id="periode" name="periode" class="form-control input-sm datepicker2">
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
                                  <input type="text" name="" disabled="" class="form-control input-sm value">
                                </div>
                              </div>
                        </div>
                      </div>       
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
   
$('.datepicker').datepicker({
  format: "mm-yyyy",
  viewMode: "months",
  minViewMode: "months"
});


$('.datepicker2').datepicker();


$(document).ready(function(){

  $('#data').DataTable({
    processing: true,
    serverSide: true,
    ajax: {
        url:'{{ route('datatable_rencana1') }}',
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
    //         {
    //            targets: 4,
    //            className: 'center'
    //         },
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

  var temp = 0
  var x = document.getElementsByClassName("target_qty");
  console.log(x)
  for (var i = 0; i < x.length; i++) {
    temp += x[$i].value;
  }

  $('.value').val(temp);

})




function target_qty(a) {
  var par         = $(a).parents('td');
  var i_id        = $(par).find('.i_id').val();
  var qty         = $(par).find('.target_qty').val();
  var id          = $('.id').val();
  var datepicker  = $('.datepicker').val();
  var datepicker2 = $('.datepicker2').val();
  var value       = $('.value').val();
  $.ajax({
    url:'{{url('penjualan/rencanapenjualan/save_item')}}',
    data:{id,i_id,datepicker,datepicker2,value,qty},
    dataType:'json',
    success:function(){

    },
    error:function(){

    }
  })
}


</script>
@endsection()