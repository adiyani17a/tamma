@extends('main')
<style type="text/css" media="screen">
  .ul_progress li:before {
    content: "\2022";
    padding-right: 0.5em;

  }
</style>
@section('content')
            <!--BEGIN PAGE WRAPPER-->
            <div id="page-wrapper">
                <!--BEGIN TITLE & BREADCRUMB PAGE-->
                <div id="title-breadcrumb-option-demo" class="page-title-breadcrumb">
                    <div class="page-header pull-left" style="font-family: 'Raleway', sans-serif;">
                        <div class="page-title">Monitoring Progress Penjualan</div>
                    </div>
                    <ol class="breadcrumb page-breadcrumb pull-right" style="font-family: 'Raleway', sans-serif;">
                        <li><i class="fa fa-home"></i>&nbsp;<a href="{{ url('/home') }}">Home</a>&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
                        <li><i></i>&nbsp;Penjualan&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
                        <li class="active">Monitoring Progress Penjualan</li>
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
                                <li class="active"><a href="#alert-tab" data-toggle="tab">Monitoring Progress Penjualan</a></li>
                                <!-- <li><a href="#note-tab" data-toggle="tab">2</a></li>
                                <li><a href="#label-badge-tab" data-toggle="tab">3</a></li> -->
                              </ul>
                              <div id="generalTabContent" class="tab-content responsive">
                                
                                <div id="alert-tab" class="tab-pane fade in active">
                                 
                                  <div class="row">



                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                    
                                      <div class="col-md-2 col-sm-4 col-xs-12">
                                        <label class="tebal">Bulan</label>
                                      </div>
                                      <div>
                                        <div class="col-md-3 col-sm-8 col-xs-12">
                                          <div class="form-group">
                                            <input value="{{ carbon\carbon::now()->format('m-Y') }}" type="text" name="bulan" class="form-control input-sm datepicker bulan">
                                          </div>
                                        </div>
                                      </div>


                                      <div class="col-md-12 col-sm-12 col-xs-12">
                                        <div class="form-group" style="margin-top: 25px;">
                                          <h4 style="font-family: 'Raleway', sans-serif;">Analisis Penjualan</h4>
                                        </div>
                                      </div>
                                      
                                      <div class="progress_div">
                                        <table class="table tabelan table-hover table-bordered" width="100%" id="tabel_progress" cellspacing="0">
                                          <thead>
                                            <th class="wd-15p">No</th>
                                            <th class="wd-15p">Nama Barang</th>
                                            <th class="wd-15p">Target Penjualan</th>
                                            <th class="wd-15p">Penjualan Real</th>
                                            <th class="wd-15p">Sisa Target</th>
                                            <th class="wd-15p">Target Pendapatan</th>
                                            <th class="wd-15p">Pendapatan Real</th>
                                          </thead>
                                          <tbody>  
                                          </tbody>
                                          <tfoot>
                                              <tr>
                                                  <th colspan="6" style="text-align:right">Total:</th>
                                                  <th colspan="1"></th>
                                              </tr>
                                          </tfoot>
                                        </table>
                                      </div>
                                      

                                      <div class="col-md-12 col-sm-12 col-xs-12">
                                        <div class="form-group" style="margin-top: 25px;">
                                          <h4 style="font-family: 'Raleway', sans-serif;">Penjualan Tertinggi</h4>
                                        </div>
                                      </div>

                                      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top: -25px;">
                                        <hr>
                                      </div>



                                      <div class="table-responsive">
                                        <table class="table tabelan table-bordered">
                                          <thead>
                                            <tr>
                                              <th>No.</th>
                                              <th>Nama Barang</th>
                                              <th>Jumlah Penjualan</th>
                                              <th>Total Penjualan</th>
                                            </tr>
                                          </thead>
                                          <tbody>
                                            @foreach($high as $i => $val)
                                            <tr>
                                              <td align="center">{{ $i+1 }}</td>
                                              <td>{{ $val->i_name }}</td>
                                              <td>{{ $val->sd_qty }}</td>
                                              <td align="right">{{ 'Rp. ' . number_format($val->sd_price, 2, ",", ".") }}</td>
                                            </tr>
                                            @endforeach
                                          </tbody>

                                        </table>
                                      </div>

                                      <div class="col-md-12 col-sm-12 col-xs-12" style="margin-top:25px;">
                                        <div class="form-group">
                                          <h4 style="font-family: 'Raleway', sans-serif;">Penjualan Real Time</h4>
                                        </div>
                                      </div>
                                      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top: -25px;">
                                        <hr>
                                      </div>
                                      <div class="table-responsive">
                                        <table class="table tabelan table-bordered" id="data2">
                                          <thead>
                                            <tr>
                                              <th>Tanggal</th>
                                              <th>No Nota</th>
                                              <th>Nama Pelanggan</th>
                                              <th>No Hp</th>
                                              <th>Barang</th>
                                              <th>QTY</th>
                                              <th>Total Harga</th>
                                              <th>Kasir</th>
                                            </tr>
                                          </thead>
                                          <tbody>
                                            
                                          </tbody>
                                        </table>
                                      </div>

                                    </div>
                                  </div>
                                              
                                </div><!-- /div alert-tab -->


                               <!-- div note-tab -->
                                <div id="note-tab" class="tab-pane fade">
                                  <div class="row">
                                    <div class="panel-body">
                                      <!-- Isi Content -->we we we
                                    </div>
                                  </div>
                                </div><!--/div note-tab -->


                                <!-- div label-badge-tab -->
                                <div id="label-badge-tab" class="tab-pane fade">
                                  <div class="row">
                                    <div class="panel-body">
                                      <!-- Isi content -->we
                                    </div>
                                  </div>
                                </div><!-- /div label-badge-tab -->
                            </div>
                    
            </div>
          </div>

@endsection
@section("extra_scripts")
<script type="text/javascript">

$('.datepicker').datepicker({
  format: "mm-yyyy",
  viewMode: "months",
  minViewMode: "months"
});
$('.datepicker2').datepicker({
  format:"dd-mm-yyyy"
});    


$(document).ready(function(){
  $('#tabel_progress').DataTable({
    processing: false,
    serverSide: false,
    "ordering": false,
    ajax: {
        url:'{{ route('datatable_progress') }}',
        data:{bulan: function() { return $('.bulan').val() }}
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
               targets: 3,
               className: 'center'
            },
            {
               targets: 4,
               className: 'center'
            },
            {
               targets: 5,
               className: 'right'
            },
            {
               targets: 6,
               className: 'right'
            },
          ],
    columns: [
      {data: 'DT_Row_Index', name: 'DT_Row_Index'},
      {data: 'i_name', name: 'i_name'},
      {data: 'rpd_target_qty', name: 'rpd_target_qty'},
      {data: 'sd_qty', name: 'sd_qty'},
      {data: 'sisa_target', name: 'sisa_target'},
      {data: 'target_pendapatan', name: 'target_pendapatan'},
      {data: 'pendapatan', name: 'pendapatan'},
    ],
  "footerCallback": function ( row, data, start, end, display ) {
        var api = this.api(), data;
        // Remove the formatting to get integer data for summation
        var intVal = function ( i ) {
            return typeof i === 'string' ?
                i.replace(/[^0-9\-]+/g,"")/100 :
                typeof i === 'number' ?
                    i : 0;
        };

        // Total over all pages
        total = api
            .column( 6 )
            .data()
            .reduce( function (a, b) {
                return intVal(a) + intVal(b);
            }, 0 );

        // Total over this page
        pageTotal = api
            .column( 6, { page: 'current'} )
            .data()
            .reduce( function (a, b) {
                return intVal(a) + intVal(b);
            }, 0 );

        // Update footer
        $( api.column( 6 ).footer() ).html(
            'Rp. '+accounting.formatMoney(pageTotal, "", 2, ".",',') +' ( Rp. '+ accounting.formatMoney(total, "", 2, ".",',') +' total)'
        );
    }
  });


  $('#data2').DataTable({
    processing: false,
    serverSide: false,
    ajax: {
        url:'{{ route('datatable_progress1') }}',
    },
    // columnDefs: [

    //         {
    //            targets: 0 ,
    //            className: 'center'
    //         },
    //         {
    //            targets: 2,
    //            className: 'center'
    //         },
    //         {
    //            targets: 3,
    //            className: 'center'
    //         },
    //         {
    //            targets: 4,
    //            className: 'center'
    //         },
    //         {
    //            targets: 5,
    //            className: 'right'
    //         },
    //         {
    //            targets: 6,
    //            className: 'right'
    //         },
    //       ],
    columns: [
      {data: 'tgl', name: 'tgl'},
      {data: 's_note', name: 's_note'},
      {data: 'c_name', name: 'c_name'},
      {data: 'c_hp', name: 'c_hp'},
      {data: 'barang', name: 'barang'},
      {data: 'qty', name: 'qty'},
      {data: 'total_harga', name: 'total_harga'},
      {data: 's_staff', name: 's_staff'},
    ],
    "ordering": false,
  });
})


$('.datepicker').change(function(){
  var table = $('#tabel_progress').DataTable();
  table.ajax.reload();
})

setInterval(function(){ 
  var table = $('#data2').DataTable();
  table.ajax.reload();
}, 5000);
</script>
@endsection()