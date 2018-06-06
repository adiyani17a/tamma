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
                        <div class="page-title">Mutasi Stok & Retail</div>
                    </div>
                    <ol class="breadcrumb page-breadcrumb pull-right" style="font-family: 'Raleway', sans-serif;">
                        <li><i class="fa fa-home"></i>&nbsp;<a href="{{ url('/home') }}">Home</a>&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
                        <li><i></i>&nbsp;Penjualan&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
                        <li class="active">Mutasi Stok & Retail</li>
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
                                <li class="active"><a href="#grosir-retail" data-toggle="tab">Grosir to Retail</a></li>
                                <li><a href="#retail-grosir" data-toggle="tab">Retail to Grosir</a></li>
                                <!-- <li><a href="#label-badge-tab" data-toggle="tab">3</a></li> -->
                              </ul>
                              <div id="generalTabContent" class="tab-content responsive">
                                <!-- modal -->
                                @include('penjualan.mutasistok.tambah_retailgrosir')

                                @include('penjualan.mutasistok.tambah_grosirretail')
                                <!-- end modal -->
                                <!-- grosir-retail -->
                                @include('penjualan.mutasistok.grosir-retail')
                                <!-- end grosir-retail  -->

                                <!-- div retail-grosir -->
                                @include('penjualan.mutasistok.retail-grosir')
                                <!--/div retail-grosir -->

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
      $('#tglMutasiGrosir').datepicker({
        format:"dd-mm-yyyy",
        autoclose: true,
      }); 
$("#namaItem").autocomplete({
    source: baseUrl+'/penjualan/mutasistok/data-item',
    minLength: 1,
    select: function(event, ui) {           
    $('#namaItem').val(ui.item.label);        
    $('#rkode').val(ui.item.code);
    $('#rdetailnama').val(ui.item.name);        
    $('#rqty').val(ui.item.qty);
    $("input[name='rqty']").focus();
    }
  });


$('#namaItem').on('keypress', function (e) 
    {
         if(e.which === 13)
         {
          

         }
   });


      </script>
@endsection()