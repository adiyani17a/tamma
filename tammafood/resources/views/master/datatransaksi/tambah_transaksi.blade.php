@extends('main')

@section('extra_styles')
  <style>
    .delete_akun{
      cursor: pointer;
      padding-top: 8px;
    }
  </style>
@endsection

@section('content')
            <!--BEGIN PAGE WRAPPER-->
            <div id="page-wrapper">
                <!--BEGIN TITLE & BREADCRUMB PAGE-->
                <div id="title-breadcrumb-option-demo" class="page-title-breadcrumb">
                    <div class="page-header pull-left" style="font-family: 'Raleway', sans-serif;">
                        <div class="page-title">Form Data Transaksi Keuangan</div>
                    </div>
                    <ol class="breadcrumb page-breadcrumb pull-right" style="font-family: 'Raleway', sans-serif;">
                        <li><i class="fa fa-home"></i>&nbsp;<a href="{{ url('/home') }}">Home</a>&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
                        <li><i></i>&nbsp;Master&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
                        <li class="active">Master Data Transaksi Keuangan</li><li><i class="fa fa-angle-right"></i>&nbsp;Form Data Transaksi Keuangan&nbsp;&nbsp;</i>&nbsp;&nbsp;</li>
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
                              <li class="active"><a href="#alert-tab" data-toggle="tab">Form Data Transaksi Keuangan</a></li>
                            <!-- <li><a href="#note-tab" data-toggle="tab">2</a></li>
                            <li><a href="#label-badge-tab-tab" data-toggle="tab">3</a></li> -->
                        </ul>
                        <div id="generalTabContent" class="tab-content responsive">
                          <div id="alert-tab" class="tab-pane fade in active">
                          <div class="row">
                           
                          <div class="col-md-12 col-sm-12 col-xs-12" style="margin-top:-10px;margin-bottom: 15px;"> 
                           <div class="col-md-5 col-sm-6 col-xs-8">
                             <h4>Form Data Transaksi Keuangan</h4>
                           </div>
                           <div class="col-md-7 col-sm-6 col-xs-4" align="right" style="margin-top:5px;margin-right: -25px;">
                             <a href="{{ url('master/datatransaksi/transaksi') }}" class="btn"><i class="fa fa-arrow-left"></i></a>
                           </div>
                          </div>
                         
                        <hr>
                         <div class="col-md-12 col-sm-12 col-xs-12">
                            <form method="post">
                              <div class="col-md-12 col-sm-12 col-xs-12 tamma-bg" style="margin-top:15px;margin-bottom: 15px; padding-bottom:5px;padding-top: 15px; ">

                                <div class="col-md-2 col-sm-3 col-xs-12">
                                    <label class="tebal">Nomor Transaksi</label>
                                </div>

                                <div class="col-md-10 col-sm-9 col-xs-12">
                                  <div class="form-group">
                                    <input type="text" class="form-control" name="nomor_transaksi" placeholder="Masukkan Nomor Transaksi">                                  
                                  </div>
                                </div>  

                                <div class="col-md-2 col-sm-3 col-xs-12">
                                    <label class="tebal">Nama Transaksi</label>
                                </div>

                                <div class="col-md-4 col-sm-9 col-xs-12">
                                  <div class="form-group">
                                    <input type="text" class="form-control" name="nama_transaksi" placeholder="Masukkan Nama Transaksi">                        
                                  </div>
                                </div>

                                <div class="col-md-2 col-sm-3 col-xs-12">
                                    <label class="tebal">Cash Type</label>
                                </div>

                                <div class="col-md-4 col-sm-9 col-xs-12">
                                  <div class="form-group">
                                    <select class="form-control" id="cashtype" name="Cash Type">                       
                                      <option value="OCF" >Operating Cash Flow</option>                                    
                                      <option value="FCF">Financing Cash Flow</option>                                    
                                      <option value="ICF">Investing Cash Flow</option>
                                    </select>                                  
                                  </div>
                                </div>

                                <div class="col-md-2 col-sm-3 col-xs-12">
                                    <label class="tebal">Keterangan</label>
                                </div>

                                <div class="col-md-6 col-sm-9 col-xs-12">
                                  <div class="form-group">
                                    <textarea class="form-control" id="Keterangan" name="Keterangan" placeholder="Tulis Keterangan" rows="5" style="resize: none;"></textarea>
                                  </div>
                                </div>
                              </div>

                              <div class="col-md-12 col-sm-12 col-xs-12 tamma-bg" style="margin-top:0px;margin-bottom: 20px;">

                                <div class="row">
                                  <div class="col-md-6">
                                    <div class="col-md-12 text-center" style="background: none; padding: 15px 5px 15px 5px; border-bottom: 1px solid #ccc">
                                      <strong>Debet</strong> <span class="pull-right add_akun" data-for="debet" style="cursor: pointer;"><i class="fa fa-plus"></i></span>
                                    </div>

                                    <div class="col-md-12 akun_row" id="debet_wrap" style="padding: 0px; padding-top: 10px;">

                                      <div id="row">

                                        <div class="col-md-6 col-sm-9 col-xs-12" style="padding: 0px;">
                                          <div class="form-group">
                                            <select class="form-control" id="cashtype" name="akun_debet[]">                       
                                              <option>Okee</option>
                                              <option>Hahhhh</option>
                                            </select>                                
                                          </div>
                                        </div>

                                        <div class="col-md-5 col-sm-9 col-xs-12" style="padding: 0px 5px;">
                                          <div class="form-group">
                                            <input type="text" class="form-control text-right currency debet_input" data-for="debet">                          
                                          </div>
                                        </div>
                                      </div>

                                    </div>

                                    <div class="col-md-12 text-center" style="background: none; padding: 10px 0px 0px 0px; border-top: 1px solid #ccc; border-bottom: 1px solid #ccc; margin-bottom: 10px;">
                                      <div class="col-md-6 col-sm-9 col-xs-12" style="padding: 0px;">
                                        <strong>Total</strong>
                                      </div>

                                      <div class="col-md-5 col-sm-9 col-xs-12" style="padding: 0px 5px;">
                                        <div class="form-group">
                                          <input type="text" class="form-control text-right currency" id="total_debet" style="border: 0px; background: white;" readonly>             
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                
                              </div>
                        </div>

                            
                        <div class="form-group row">
                          <div class="col-md-2 col-md-offset-10">
                            <input type="submit" name="tambah_data" value="Simpan Data" class="btn btn-danger">
                          </div>
                        </div>
                             
                          </form>                                  
                    </div>
                        </div>
                                
                                    </div>
                                         </div>
                            </div>

<select style="width:90%;display: none;" id="akun_hidden">
  <option>Okee</option>
  <option>Hahhhh</option>
</select>
                            
@endsection
@section("extra_scripts")

  <script src="{{ asset("js/inputmask/inputmask.jquery.js") }}"></script>

  <script type="text/javascript">     
        $(document).ready(function(){

          $.fn.maskFunc = function(){
            $('.currency').inputmask("currency", {
                radixPoint: ",",
                groupSeparator: ".",
                digits: 2,
                autoGroup: true,
                prefix: '', //Space after $, this will not truncate the first character.
                rightAlign: false,
                oncleared: function () { self.Value(''); }
            });
          }

          $(this).maskFunc();

          $(".add_akun").click(function(evt){
            evt.preventDefault();
            btn = $(this);
            html = '<div id="debet_row">'+
                      '<div class="col-md-6 col-sm-9 col-xs-12" style="padding: 0px;">'+
                        '<div class="form-group">'+
                          '<select class="form-control" id="cashtype" name="akun_'+btn.data("for")+'[]">'                       
                            +$("#akun_hidden").html()+
                          '</select>'+                                
                        '</div>'+
                      '</div>'+

                      '<div class="col-md-5 col-sm-9 col-xs-12" style="padding: 0px 5px;">'+
                        '<div class="form-group">'+
                          '<input type="text" class="form-control text-right currency '+btn.data("for")+'_input" data-for="'+btn.data("for")+'">'+                          
                        '</div>'+
                      '</div>'+

                      '<div class="col-md-1">'+
                        '<i class="fa fa-eraser delete_akun" data-for="'+btn.data("for")+'"></i>'+
                      '</div>'+
                    '</div>';

            $("#"+btn.data("for")+"_wrap").append(html);
            $(this).maskFunc();
          })

          $(".akun_row").on("keyup", ".currency", function(event){
            event.preventDefault();
            ipt = $(this);

            throttle_total(ipt.data("for"));
          })

          $(".akun_row").on("click", ".delete_akun", function(event){
            event.preventDefault();
            ipt = $(this);

            $(this).parents("#"+ipt.data("for")+'_row').remove();
            throttle_total(ipt.data("for"));
          })

          function throttle_total(dataFor){
            tot = 0;

            $("."+dataFor+"_input").each(function(){
              val = $(this).val().split(',')[0].replace(/\./g,"");
              tot += parseInt(val);
            })

            // alert(tot);
            $("#total_debet").val(tot);
          }

        })
  </script>
@endsection                            
