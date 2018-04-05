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
                        <div class="page-title">Form Entri Penjualan Retail</div>
                    </div>
                    <ol class="breadcrumb page-breadcrumb pull-right" style="font-family: 'Raleway', sans-serif;">
                        <li><i class="fa fa-home"></i>&nbsp;<a href="{{ url('/home') }}">Home</a>&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
                        <li><i></i>&nbsp;Penjualan&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
                        <li class="active">Form Entri Penjualan Retail</li>
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
                        <li class="active"><a href="#data-transfer" data-toggle="tab">List Transfer</a></li>
                            <li ><a href="#alert-tab" data-toggle="tab" onclick="penerimaan()">Penerimaan Transfer</a></li>                            
                          </ul>
                <div id="generalTabContent" class="tab-content responsive">
                        <div id="data-transfer" class="tab-pane fade in active">

                        </div>
                

                  <!-- div note-tab -->
                          <div id="alert-tab" class="tab-pane fade">
                            <div class="row">
                              <div class="panel-body">
                                    <div id="data-penerimaan" class="tab-pane fade in active">

                                    </div>  
                              </div>
                            </div>
                          </div>
                          <!-- End DIv note-tab -->

                         
                   
                 
        </div>
                   
                  
                 
        </div>
        <!-- End div generalTab -->
      </div>
    </div>
  </div>
  @include('transfer.modal-transfer')    
</div>  
@include('transfer.penerimaan.modal-penerimaan')    
@endsection
@section("extra_scripts")

    <script src="{{ asset ('assets/script/bootstrap-datepicker.js') }}"></script>

    <script type="text/javascript">

    datax();
    function datax(){
         $.ajax({
                    url         : baseUrl+'/transfer/data-transfer',
                    type        : 'get',
                    timeout     : 10000,                                        
                    success     : function(response){
                        $('#data-transfer').html(response);
                        }
                    });
     }


     function editTransfer($id){
            $.ajax({
                    url         : baseUrl+'/transfer/data-transfer/'+$id+'/edit',
                    type        : 'get',
                    timeout     : 10000,                                        
                    success     : function(response){
                        $('#Edit-data-transfer').html(response);
                         $('#myTransferEdit').modal('show');
                        }
            });
     }


     function hapusTransfer($id){
            $.ajax({
                    url         : baseUrl+'/transfer/data-transfer/hapus/'+$id,
                    type        : 'get',
                    timeout     : 10000,    
                    dataType    :'json',                                   
                    success     : function(response){
                     
                       if(response.status=='sukses'){                        
                          datax();
                       }
                      }
            });
     }

    penerimaan();
    function penerimaan(){
         $.ajax({
                    url         : baseUrl+'/transfer/penerimaan-transfer',
                    type        : 'get',
                    timeout     : 10000,                                        
                    success     : function(response){
                        $('#data-penerimaan').html(response);
                        }
                    });
     }
    function lihatPenerimaan($id){
         $.ajax({
                    url         : baseUrl+'/transfer/lihat-penerimaan/'+$id,
                    type        : 'get',
                    timeout     : 10000,                                        
                    success     : function(response){
                        $('#data-penerimaan-transfer').html(response);
                         $('#myTransfer').modal('show');
                        }
                    });
     }


      function simpaPenerimaan(){
         $.ajax({
                    url         : baseUrl+'/transfer/penerimaan/simpa-penerimaan',
                   type        : 'get',
                    timeout     : 10000,  
                    data: item+'&'+tableReq.$('input').serialize(),
                    dataType:'json',                                      
                    success     : function(response){
                          if(response.status=='sukses'){
                        location.reload();
                      }
                    }
                });
     }

 


    </script>
    
@endsection()