            <div id="alert-tab" class="tab-pane fade in active">
              <div id="alert-tab" class="tab-pane fade in active">
                <div class="row">
                  <div class="col-md-12">
                    <div class="col-md-12 col-sm-12 col-xs-12 tamma-bg" style="padding-bottom: 25px;padding-top: 5px;">
                      <form id="save_sform">
                        <div class="col-md-9 col-sm-6 col-xs-12" style="margin-top: 15px;">
                          <label class="control-label tebal" for="nama" >Nama Customer</label>
                          <div class="input-group input-group-sm" style="width: 100%;">
                            <input type="text" id="nama" name="s_member" class="form-control" onkeyup="setnama()" value="{{$edit[0]->c_name}}">
                            <input type="hidden" id="id_cus" name="id_cus" class="form-control" value="{{$edit[0]->s_customer}}">
                            <input type="hidden" id="s_id" name="s_id" class="form-control" value="{{$edit[0]->s_id}}">
                            <span class="input-group-btn"><button  type="button" class="btn btn-info btn-sm btn_simpan" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus"></i></button></span>
                          </div>
                        </div>
                        
                        <div class="col-md-3 col-sm-6 col-xs-12" style="margin-top: 15px;">
                          <label for="tgl_faktur" class="control-label tebal">Tanggal Faktur</label>
                          <div class="input-group input-group-sm" style="width: 100%;">
                            <input id="tgl_faktur" type="text" name="s_date" class="form-control" readonly="readonly" value="{{ date('d-m-Y') }}">
                          </div>
                        </div>

                        <div class="col-md-9 col-sm-6 col-xs-12" style="margin-top: 15px;">
                          <label class="control-label tebal" for="alamat">Alamat Customer</label>
                          <div class="input-group input-group-sm" style="width: 100%;">
                            <input type="text" id="alamat2" name="sm_alamat" class="form-control" value="{{$edit[0]->c_address}}  {{$edit[0]->c_hp}}">  
                          </div>
                        </div>

                        <div class="col-md-3 col-sm-6 col-xs-12" style="margin-top: 15px;">
                          <label class="control-label tebal" for="no_faktur" >Nomor Faktur</label>
                          <div class="input-group input-group-sm" style="width: 100%;">
                            <input type="text" id="no_faktur" name="s_nota" class="form-control" readonly="true" value="{{$edit[0]->s_note}}">
                          </div>
                        </div>

                        <div class="col-md-3 col-md-offset-9 col-sm-12 col-xs-12" style="margin-top: 15px;">
                          <label class="control-label tebal" for="total_amount">Total Amount</label>
                          <div class="input-group input-group-sm" style="width: 100%;">
                            <input type="text" class="form-control" readonly="true" name="s_net"  id="amount">
                            <input type="hidden" name="s_staff" value="{{ Auth::user()->m_id}}" >
                          </div>
                        </div>     
                      </form>
                    </div>
                  </div>
    
                  <div class="col-md-12 col-sm-12 col-xs-12">      
                    <div style="padding-top: 10px;padding-bottom: 10px;">     
              
                      @include('penjualan.POSretail.item_edit')

                    </div>
                  </div>  
    
                  <form id="save_item">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                      <div class="col-md-3 col-md-offset-9 col-sm-6 col-sm-offset-6 col-xs-12 tamma-bg" style="margin-bottom: 20px; padding-bottom:5px;padding-top: 10px;">
                        <div class="col-md-12 col-sm-12 col-xs-12 ">
                
                          <div class="form-group">
                            <label class="control-label tebal" for="penjualan">Total Penjualan</label>
                            <div class="input-group input-group-sm " style="width: 100%;">
                              <input type="text" name="mapPenjualann" readonly="true" id="totalMapPenjualan"" class="form-control total" style="text-align: right;" value="Rp. {{ number_format( $edit[0]->s_gross ,2,',','.')}}"">
                            </div>
                          </div>

                          <div class="form-group">
                            <label class="control-label tebal" for="discount">Total Discount</label>
                            <div class="input-group input-group-sm" style="width: 100%;">
                              <input type="text" name="s_disc_value" readonly="true" id="Total_Discount" class="form-control" style="text-align: right;" value="Rp. {{ number_format( $edit[0]->s_disc_value ,2,',','.')}}">
                            </div>
                          </div>

                          <div class="form-group">
                            <label class="control-label tebal" for="penjualan">PPN</label>
                            <div class="input-group input-group-sm" style="width: 100%;">
                              <input type="text" type="hidden" name="s_pajak" readonly="true" class="form-control" style="text-align: right;" value="0">
                            </div>
                          </div>

                          <div class="form-group">
                            <label class="control-label tebal" for="discount">Total Amount</label>
                            <div class="input-group input-group-sm " style="width: 100%;">
                              <input type="text" name="s_net" readonly="true" id="total" class="form-control totalAmount" style="text-align: right;"  value="Rp. {{ number_format( $edit[0]->s_net ,2,',','.')}}">
                            </div>
                          </div>

                        </div>
                      </div>
                    </div>

                   <!-- Start Modal Proses -->
                    <div class="modal fade" id="proses" role="dialog">
                      <div class="modal-dialog">
                        <!-- Modal content-->
                        <div class="modal-content">
                          <div class="modal-header" style="background-color: #e77c38;">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title" style="color: white;">Proses Form Penjualan Retail</h4>
                          </div>

                          @include('penjualan.POSretail.pembayaran')
                            
                          <div class="modal-footer">
                            <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
                            <button class="btn btn-primary" type="button" onclick="sal_save_finalUpdate()">Proses</button>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- End Modal Proses -->

                    <div class="col-md-12 col-sm-12 col-xs-12" align="right" >
                      <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#proses">Submit</button>
                    </div>
                  </form>   
                </div>                                       
              </div>
            </div>