@extends('main')
@section('content')
  <!--BEGIN PAGE WRAPPER-->
  <div id="page-wrapper">
  <!--BEGIN TITLE & BREADCRUMB PAGE-->
  <div id="title-breadcrumb-option-demo" class="page-title-breadcrumb">
      <div class="page-header pull-left" style="font-family: 'Raleway', sans-serif;">
        <div class="page-title">Manajemen Produksi</div>
      </div>

      <ol class="breadcrumb page-breadcrumb pull-right" style="font-family: 'Raleway', sans-serif;">
        <li><i class="fa fa-home"></i>&nbsp;<a href="{{ url('/home') }}">Home</a>&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
        <li><i></i>&nbsp;Produksi&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
        <li class="active">Manajemen Produksi</li>
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
          <li class="active"><a href="#alert-tab" data-toggle="tab">Manajemen Produksi</a></li>
        </ul>
        <div id="generalTabContent" class="tab-content responsive">
          
          <div id="alert-tab" class="tab-pane fade in active">
           
              <div class="row" style="margin-top: -5px;">
                <div class="col-md-12 col-sm-12 col-xs-12">
                  <div class="table-responsive">
                    <table class="table tabelan table-hover table-bordered" width="100%" cellspacing="0" id="data1">
                      <thead>
                        <tr>
                          <th width="10%">Tanggal</th>
                          <th width="30%">No Spk</th>
                          <th>Item</th>
                          <th>Jumlah</th>
                          <th>Following Up</th>
                        </tr>
                      </thead>
                      <tbody>

                      </tbody>
                    </table> 
                    </div>                                       
                  </div>
                </div>
          </div>
          <!-- /div alert-tab -->
          <!-- div note-tab -->
          <div id="note-tab" class="tab-pane fade">
            <div class="row">
              <div class="panel-body">
                <!-- Isi Content -->
              </div>
            </div>
          </div><!--/div note-tab -->
          <!-- div label-badge-tab -->
          <div id="label-badge-tab" class="tab-pane fade">
            <div class="row">
              <div class="panel-body">
                <!-- Isi content -->
              </div>
            </div>
          </div><!-- /div label-badge-tab -->
        </div>

      </div>
    </div>
  </div>


@endsection
@section("extra_scripts")
<script type="text/javascript">           
$(document).ready(function() {
var extensions = {
     "sFilterInput": "form-control input-sm",
    "sLengthSelect": "form-control input-sm"
}
  // Used when bJQueryUI is false
  $.extend($.fn.dataTableExt.oStdClasses, extensions);
  // Used when bJQueryUI is true
  $.extend($.fn.dataTableExt.oJUIClasses, extensions);
});
var oTable = $('#data1').DataTable({
    processing: true,
    serverSide: true,
    ajax: {
        url : baseUrl + "/produksi/spk/tabelspk",
    },
    columns: [
    {data: 'spk_date', name: 'spk_date'},
    {data: 'spk_code', name: 'spk_code'},
    {data: 'i_name', name: 'i_name', orderable: false},
    {data: 'pp_qty', name: 'pp_qty', orderable: false, searchable: false},
    // {data: "action" },
  ],

});
$('.datepicker').datepicker({
  format: "mm",
  viewMode: "months",
  minViewMode: "months"
});

$('.datepicker2').datepicker({
  format:"dd-mm-yyyy"
});    
  </script>
@endsection()