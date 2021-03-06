@extends('main')
@section('content')
<!--BEGIN PAGE WRAPPER-->
<div id="page-wrapper">
  <!--BEGIN TITLE & BREADCRUMB PAGE-->
  <div id="title-breadcrumb-option-demo" class="page-title-breadcrumb">
      <div class="page-header pull-left" style="font-family: 'Raleway', sans-serif;">
          <div class="page-title">Manajemen Surat</div>
      </div>
      <ol class="breadcrumb page-breadcrumb pull-right" style="font-family: 'Raleway', sans-serif;">
          <li><i class="fa fa-home"></i>&nbsp;<a href="{{ url('/home') }}">Home</a>&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
          <li><i></i>&nbsp;HRD&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
          <li class="active">Manajemen Surat</li>
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
            <li class="active"><a href="#main-tab" data-toggle="tab">Manajemen Surat</a></li>
            <!-- <li><a href="#note-tab" data-toggle="tab">2</a></li>
            <li><a href="#label-badge-tab" data-toggle="tab">3</a></li> -->
          </ul>
          <div id="generalTabContent" class="tab-content responsive">
            
            <div id="main-tab" class="tab-pane fade in active">
             
              <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                  <div class="col-md-8 col-sm-12 col-xs-12" style="padding-bottom: 10px;">
                    <div style="margin-left:-30px;">
                       <div class="col-md-2 col-sm-2 col-xs-12">
                        <label style="padding-top: 7px; font-size: 15px; margin-right:100px;">Periode</label>
                       </div>
                       <div class="col-md-6 col-sm-7 col-xs-12">
                        <div class="form-group" style="display: ">
                          <div class="input-daterange input-group">
                            <input id="tanggal" data-provide="datepicker" class="form-control input-sm" name="tanggal" type="text">
                            <span class="input-group-addon">-</span>
                            <input id="tanggal" data-provide="datepicker" class="input-sm form-control" name="tanggal" type="text">
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="col-md-3 col-sm-3 col-xs-12" align="center">
                      <button class="btn btn-warning btn-sm btn-flat" type="button">
                        <strong>
                          <i class="fa fa-search" aria-hidden="true"></i>
                        </strong>
                      </button>
                      <button class="btn btn-danger btn-sm btn-flat" type="button">
                        <strong>
                          <i class="fa fa-undo" aria-hidden="true"></i>
                        </strong>
                      </button>
                    </div>
                  </div>
                </div>
       
                <div class="col-md-12 col-sm-12 col-xs-12">
                  <div class="table-responsive">
                    <table class="table tabelan table-hover table-bordered data-table" width="100%" cellspacing="0">
                      <thead>
                          <tr>
                            <th class="wd-15p">No.Order</th>
                            <th class="wd-15p">Nama Supplier</th>
                            <th class="wd-20p">Data Baku</th>
                            <th class="wd-15p">Total Harga</th>
                          </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>1</td>
                          <td>Andi</td>
                          <td>Bla,Bla,Bla</td>
                          <td>Rp.5000</td>
                        </tr>
                        <tr>
                          <td>2</td>
                          <td>Bina</td>
                          <td>Ble,Ble,Ble</td>
                          <td>Rp.6000</td>
                        </tr>
                      </tbody>
                    
                    </table> 
                  </div>                                       
                </div>
              </div>
              
            </div>
            <!-- /div main-tab -->

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
            </div>
            <!-- /div label-badge-tab -->
          </div>

        </div>
      </div>
    </div>
  </div>
</div>

@endsection
@section("extra_scripts")
<script type="text/javascript">
  $('.datepicker').datepicker({
    format: "mm",
    viewMode: "months",
    minViewMode: "months"
  });
  $('.datepicker2').datepicker({
    format:"dd/mm/yyyy"
  });    
</script>
@endsection