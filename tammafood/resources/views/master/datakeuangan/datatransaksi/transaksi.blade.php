@extends('main')
@section('content')
            <!--BEGIN PAGE WRAPPER-->
            <div id="page-wrapper">
                <!--BEGIN TITLE & BREADCRUMB PAGE-->
                <div id="title-breadcrumb-option-demo" class="page-title-breadcrumb">
                    <div class="page-header pull-left" style="font-family: 'Raleway', sans-serif;">
                        <div class="page-title">Master Data Transaksi Keuangan</div>
                    </div>
                    <ol class="breadcrumb page-breadcrumb pull-right" style="font-family: 'Raleway', sans-serif;">
                        <li><i class="fa fa-home"></i>&nbsp;<a href="{{ url('/home') }}">Home</a>&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
                        <li><i></i>&nbsp;Master&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
                        <li class="active">Master Data Transaksi Keuangan</li>
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
                              <li class="active"><a href="#alert-tab" data-toggle="tab">Master Data Transaksi Keuangan</a></li>
                            <!-- <li><a href="#note-tab" data-toggle="tab">2</a></li>
                            <li><a href="#label-badge-tab-tab" data-toggle="tab">3</a></li> -->
                        </ul>
                        <div id="generalTabContent" class="tab-content responsive" >
                            <div id="alert-tab" class="tab-pane fade in active">
                            <div class="row" style="margin-top: -20px;">





  <div class="col-md-12 col-sm-12 col-xs-12" align="right" style="margin-bottom: 10px;">

    <a href="{{ url('master/datatransaksi/tambah_transaksi') }}"><button type="button" class="btn btn-box-tool" title="Tambahkan Data Item">
                               <i class="fa fa-plus" aria-hidden="true">
                                   &nbsp;
                               </i>Tambah Data
                            </button></a>

  </div>
  <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="table-responsive">
      <table class="table tabelan table-hover table-bordered" width="100%" cellspacing="0" id="data">
                          <thead>
                            <tr>
                              <th class="wd-15p">Kode</th>
                              <th class="wd-15p">Nama Transaksi</th>
                              <th class="wd-15p">Nama Sub Transaksi</th>
                              <th class="wd-15p">Cashtype Transaksi</th>
                              <th class="wd-15p">Akun 1</th>
                              <th class="wd-15p">Akun 2</th>
                              <th class="wd-15p">Aksi</th>
                            </tr>
                          </thead>

                          <tbody>
                            <tr>
                              <td>1111</td>
                              <td>Penjualan Alpha</td>
                              <td></td>
                              <td>Operating Cash Flow</td>
                              <td>Akun BCA P</td>
                              <td>Laba Berjalan</td>
                             <td class="text-center">
                               <div class="">
                               <a href="{{ url('master/datatransaksi/edit_transaksi') }}" class="btn btn-warning btn-sm" title="Edit"><i class="glyphicon glyphicon-pencil"></i></a>
                               <a href="#" class="btn btn-danger btn-sm" title="Hapus" onclick="klik()"><i class="glyphicon glyphicon-trash"></i></a>
                              </div>
                              </td>
                            </tr>
                            <tr>
                              <td>1112</td>
                              <td>Penjualan Bravo</td>
                              <td></td>
                              <td>Operating Cash Flow</td>
                              <td>Akun BCA</td>
                              <td>Laba Berjalan</td>
                             <td class="text-center">
                               <div class="">
                               <a href="{{ url('master/datatransaksi/edit_transaksi') }}" class="btn btn-warning btn-sm" title="Edit"><i class="glyphicon glyphicon-pencil"></i></a>
                               <a href="#" class="btn btn-danger btn-sm" title="Hapus"><i class="glyphicon glyphicon-trash"></i></a>
                              </div>
                              </td>
                            </tr>
                            <tr>
                              <td>1113</td>
                              <td>Penjualan Charlie</td>
                              <td></td>
                              <td>Operating Cash Flow</td>
                              <td>Akun Pusat</td>
                              <td>Laba Berjalan</td>
                             <td class="text-center">
                               <div class="">
                               <a href="{{ url('master/datatransaksi/edit_transaksi') }}" class="btn btn-warning btn-sm" title="Edit"><i class="glyphicon glyphicon-pencil"></i></a>
                               <a href="#" class="btn btn-danger btn-sm" title="Hapus" onclick="klik()"><i class="glyphicon glyphicon-trash"></i></a>
                              </div>
                              </td>
                            </tr>
                          </tbody>


            </table>
    </div>
          </div>


                        </div>

                                    </div>
                                         </div>
                            </div>
@endsection
@section('extra_scripts')
<script type="text/javascript">
function klik(){
  swal({
  title: "Apa anda yakin?",
  text: "Data Yang Dihapus Tidak Dapat Dikembalikan",
  type: "warning",
  showCancelButton: true,
  confirmButtonClass: "btn-danger",
  confirmButtonText: "Yes, delete it!",
  cancelButtonText: "Cancel",
  closeOnConfirm: false,
  closeOnCancel: false
  },
  function(isConfirm) {
  if (isConfirm) {
  swal("Deleted!", "Your imaginary data has been delete.", "success");
  } else {
  swal("Cancelled", "Your imaginary data is safe :)", "error");
  }
  });
}
</script>
@endsection
