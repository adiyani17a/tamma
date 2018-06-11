@extends('main')
@section('content')
<!--BEGIN PAGE WRAPPER-->
<div id="page-wrapper">
    <!--BEGIN TITLE & BREADCRUMB PAGE-->
    <div id="title-breadcrumb-option-demo" class="page-title-breadcrumb">
        <div class="page-header pull-left" style="font-family: 'Raleway', sans-serif;">
            <div class="page-title">Form Master Data Suplier</div>
        </div>
        <ol class="breadcrumb page-breadcrumb pull-right" style="font-family: 'Raleway', sans-serif;">
            <li><i class="fa fa-home"></i>&nbsp;<a href="{{ url('/home') }}">Home</a>&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
            <li><i></i>&nbsp;Master&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
            <li class="active">Master Data Suplier</li><li><i class="fa fa-angle-right"></i>&nbsp;Form Master Data Suplier&nbsp;&nbsp;</i>&nbsp;&nbsp;</li>
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
                    <li class="active"><a href="#alert-tab" data-toggle="tab">Form Master Data Suplier</a></li>
                    <!-- <li><a href="#note-tab" data-toggle="tab">2</a></li>
                    <li><a href="#label-badge-tab-tab" data-toggle="tab">3</a></li> -->
                  </ul>
                  <div id="generalTabContent" class="tab-content responsive">
                    <div id="alert-tab" class="tab-pane fade in active">
                      <div class="row">
                    
                        <div class="col-md-12 col-sm-12 col-xs-12" style="margin-top: -10px;margin-bottom: 15px;">  
                           <div class="col-md-5 col-sm-6 col-xs-8" >
                             <h4>Form Master Data Suplier</h4>
                           </div>
                           <div class="col-md-7 col-sm-6 col-xs-4" align="right" style="margin-top:5px;margin-right: -25px;">
                             <a href="{{ url('master/datasuplier/suplier') }}" class="btn"><i class="fa fa-arrow-left"></i></a>
                           </div>
                        </div>
                   
                  
                        <div class="col-md-12 col-sm-12 col-xs-12">
                          <form id="form_suplier">
                            <div class="col-md-12 col-sm-12 col-xs-12 tamma-bg" style="margin-bottom: 20px; padding-top:30px;padding-bottom:20px;">
                              <div class="col-md-2 col-sm-3 col-xs-12">
                                
                                    <label class="tebal">Kode</label>
                                
                              </div>

                              <div class="col-md-4 col-sm-9 col-xs-12">
                                <div class="form-group">
                                  
                                      <input type="text" id="code" name="code" class="form-control input-sm" readonly="" value="{{ $data_header->d_pcsp_code }}">
                                  
                                </div>
                              </div>

                              <div class="col-md-2 col-sm-3 col-xs-12">
                                
                                    <label class="tebal">Suplier</label>
                                
                              </div>

                              <div class="col-md-4 col-sm-9 col-xs-12">
                                <div class="form-group">
                                  <div class="input-icon right">
                                    <i class="fa fa-user"></i>
                                    <input type="text" id="sup" name="sup" class="form-control input-sm" readonly="" value="{{ $data_header->d_pcsp_sup }}">                
                                  </div>
                                </div>
                              </div>
                             
                              <div class="col-md-2 col-sm-3 col-xs-12">
                                
                                    <label class="tebal">Date Confrom</label>
                                
                              </div>

                              <div class="col-md-4 col-sm-9 col-xs-12">
                                <div class="form-group">
                                  <div class="input-icon right">
                                    <i class="glyphicon glyphicon-envelope"></i>
                                    <input type="text" id="datecreated" name="datecreated" readonly="" value="{{ $data_header->d_pcsp_dateconfirm }}" class="form-control input-sm">                
                                  </div>
                                </div>
                              </div>

                              <div class="col-md-2 col-sm-3 col-xs-12">                                
                              </div>

                              <div class="col-md-4 col-sm-9 col-xs-12">
                              </div>

                               <div class="col-md-2 col-sm-3 col-xs-12">
                                
                                    <label class="tebal">Date Created</label>
                                
                              </div>

                              <div class="col-md-4 col-sm-9 col-xs-12">
                                <div class="form-group">
                                  
                                      <input type="text" id="dateconfrim" name="dateconfrim" readonly="" value="{{ $data_header->d_pcsp_datecreated }}" class="form-control input-sm" >
                                  
                                </div>
                              </div>

                              <div class="col-md-2 col-sm-3 col-xs-12">
                                
                                    <label class="tebal">Staff</label>
                                
                              </div>

                              <div class="col-md-4 col-sm-9 col-xs-12">
                                <div class="form-group">
                                  <div class="input-icon right">
                                      <i class="glyphicon glyphicon-user"></i>
                                      <input type="text" id="staff" name="staff" readonly="" value="{{ $data_header->d_pcsp_staff }}" class="form-control input-sm">
                                  </div>
                                </div>
                              </div>
                              
                            </div>


                            <div class="table-responsive">
                                <table class="table tabelan table-hover table-bordered" id="data">
                                  <thead>
                                    <tr>
                                      <th>Item</th>
                                      <th>Qty</th>
                                      <th width="5%">Confrim</th>
                                      <th width="10%">Aksi</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    @foreach ($data_seq as $element)
                                      <tr>
                                        <td>{{ $element->i_name }}</td>
                                        <td><input type="text" name="" value="{{ $element->d_pcspdt_qty }}"></td>
                                        <td><input type="text" name="" value="{{ $element->d_pcspdt_qtyconfirm }}"></td>
                                        <td>
                                        <button class="btn btn-danger btn-sm" title="Hapus"><i class="fa fa-trash-o"></i></button>
                                      </td>
                                      </tr>
                                    @endforeach
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


                            <div align="right">
                              <div class="form-group" align="right">
                                <button type="button" onclick="simpan()" class="btn btn-primary">Simpan Data</button>
                              </div>
                            </div>
                            
                          </form>
                        </div>                                       
                      </div>
                    </div>
                          
                  </div>
                </div>
            </div>
        </div>
    </div>
</div>
                            
@endsection

@section("extra_scripts")
<script type="text/javascript">     

  $(document).ready(function(){
    $('#data').DataTable({});

  function simpan()
  {
    var perusahaan  = $('input[name="perusahaan"]');
    var nama = $('input[name="nama"]');
    var no_hp = $('input[name="no_hp"]');
    var fax = $('input[name="fax"]');
    var limit = $('input[name="limit"]');
    var keterangan = $('input[name="keterangan"]');
    var alamat = $('input[name="alamat"]');
    var npwp = $('input[name="npwp"]');


    if(perusahaan.val()=='' || nama.val()=='' || no_hp.val()=='' || fax.val()=='' || limit.val()=='' || alamat.val()=='' || npwp.val()=='')
    {
      if(perusahaan.val()==''){
        toastr["error"]("Perusahan tidak boleh kosong", "Error");
        perusahaan.addClass('state-error');
      } else {
        perusahaan.removeClass('state-error');
      }

      if(nama.val()==''){
        toastr["error"]("Nama Suplier tidak boleh kosong", "Error");
        nama.addClass('state-error');
      } else {
        nama.removeClass('state-error');
      }

      if(no_hp.val()==''){
        toastr["error"]("Nomor HP tidak boleh kosong", "Error");
        no_hp.addClass('state-error');
      } else {
        no_hp.removeClass('state-error');
      }

      if(fax.val()==''){
        toastr["error"]("Fax tidak boleh kosong", "Error");
        fax.addClass('state-error');
      } else {
        fax.removeClass('state-error');
      }
      if(limit.val()==''){
        toastr["error"]("Limit tidak boleh kosong", "Error");
        limit.addClass('state-error');
      } else {
        limit.removeClass('state-error');
      }
      if(npwp.val()==''){
        toastr["error"]("NPWP tidak boleh kosong", "Error");
        npwp.addClass('state-error');
      } else {
        npwp.removeClass('state-error');
      }
      return false;
    }
    var form = $('#form_suplier').serialize();
    $.ajax({
           type: "get",
           url: baseUrl + '/master/datasuplier/suplier_proses',
           data: form,
           success: function(sembarang){
            toastr["success"]("Suplier Berhasil ditambahkan", "Sukses");
            if(sembarang.status=='sukses_bos')
            {
              window.location = ('{{route("suplier")}}');
            }
           },
           error: function(){
            toastr["error"]("Terjadi Kesalahan", "Error");
           },
           // async: false
         });
  }

</script>
@endsection                            
