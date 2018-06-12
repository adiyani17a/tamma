@extends('main')
@section('content')
            <!--BEGIN PAGE WRAPPER-->
            <div id="page-wrapper">
                <!--BEGIN TITLE & BREADCRUMB PAGE-->
                <div id="title-breadcrumb-option-demo" class="page-title-breadcrumb">
                    <div class="page-header pull-left" style="font-family: 'Raleway', sans-serif;">
                        <div class="page-title">Penerimaan Barang Suplier</div>
                    </div>
                    <ol class="breadcrumb page-breadcrumb pull-right" style="font-family: 'Raleway', sans-serif;">
                        <li><i class="fa fa-home"></i>&nbsp;<a href="{{ url('/home') }}">Home</a>&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
                        <li><i></i>&nbsp;Inventory&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
                        <li class="active">Penerimaan Barang Suplier</li>
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
                                  <li class="active"><a href="#alert-tab" data-toggle="tab">Penerimaan Barang Suplier</a></li>
                            <!-- <li><a href="#note-tab" data-toggle="tab">History Penerimaan Barang Suplier</a></li> -->
                            <!-- <li><a href="#label-badge-tab-tab" data-toggle="tab">3</a></li> -->
                                </ul>
                                <div id="generalTabContent" class="tab-content responsive">

                                  @include('inventory.p_suplier.modal')

                                    <div id="alert-tab" class="tab-pane fade in active">
                                      <div class="row">
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                          
                                          <div class="col-md-6 col-sm-12 col-xs-12" style="margin-bottom: 20px;">
                                            <div class="col-md-6 col-sm-12 col-xs-12">
                                              <label class="tebal">No Nota :</label>
                                            </div>
                                            <div class="col-md-6 col-sm-12 col-xs-12">
                                              <div class="input-group">
                                                <select class="form-control input-sm" id="cariId" name="CariId">
                                                  <option> - Pilih Nomor Nota</option>
                                                  @foreach ($nota as $element)
                                                    <option value="{{ $element->d_pcsp_code }}">{{ $element->d_pcsp_code }}</option>
                                                  @endforeach
                                                </select>
                                                <span class="input-group-btn">
                                                  <button class="btn btn-primary btn-sm" onclick="cari()"><i class="fa fa-search"></i> Search</button>
                                                </span>
                                              </div>
                                            </div>

                                          </div>

                                          <div class="table-responsive">
                                            <table class="table tabelan table-hover table-bordered" id="data">
                                              <thead>
                                                <tr>
                                                  <th width="5%">No</th>
                                                  <th>No PO</th>
                                                  <th>Suplier</th>
                                                  <th width="5%">Status</th>
                                                  <th width="10%">Aksi</th>
                                                </tr>
                                              </thead>
                                              <tbody>
                                                {{-- <tr>
                                                  <td>1</td>
                                                  <td>06022018/PO/001</td>
                                                  <td>Alpha</td>
                                                  <td><span class="label label-info">Tidak Lengkap</span></td>
                                                  <td>
                                                    <button class="btn btn-warning btn-sm" title="Edit"><i class="fa fa-pencil"></i></button>
                                                    <button class="btn btn-danger btn-sm" title="Hapus"><i class="fa fa-trash-o"></i></button>
                                                    <button class="btn-link" data-toggle="modal" data-target="#detail">Detail</button>
                                                  </td>
                                                </tr> --}}
                                              </tbody>
                                            </table>
                                          </div>

                                        </div>
                                        
                                      </div>
                                    </div>
                                     <!-- End div #alert-tab  -->

                                    <!-- div note-tab -->
                                    <!--/div note-tab -->

                                    <!-- div label-badge-tab -->
                                    <div id="label-badge-tab" class="tab-pane fade">
                                      <div class="row">
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                          <!-- Isi content -->
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
      
      function cari() {
        var cariId = $('#cariId').val();
          $.ajax({
               type: "get",
               url: baseUrl + '/inventory/p_suplier/create_suplier',
               data: {cariId},
               success: function(data){
                      $('#replace').html(data);                  
               },
               complete:function(){
                  window.location=(this.url);
               },
               error: function(){
                iziToast.warning({
                  icon: 'fa fa-times',
                  message: 'Terjadi Kesalahan!',
                });
               },
               async: false
             });  
      }

    </script>
@endsection