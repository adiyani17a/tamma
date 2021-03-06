<div class="modal fade" id="modal_detail" role="dialog">
  <div class="modal-dialog" style="width: 90%;margin: auto;">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header" style="background-color: #e77c38;">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title" style="color: white;">Detail Penerimaan Pembelian</h4>
      </div>

      <div class="modal-body">
        <div class="col-md-12 col-sm-12 col-xs-12 tamma-bg" style="margin-top:10px;padding-bottom: 10px;padding-top: 20px;margin-bottom: 15px;">

          <div class="col-md-2 col-sm-12 col-xs-12">
            <label class="tebal">Nota Return Pembelian</label>
          </div>

          <div class="col-md-4 col-sm-12 col-xs-12">
            <div class="form-group">
              <label id="lblNotaPembelian"></label>
            </div>  
          </div>
          
          <div class="col-md-2 col-sm-12 col-xs-12">
            <label class="tebal">Kode Penerimaan</label>
          </div>

          <div class="col-md-4 col-sm-12 col-xs-12">
            <div class="form-group">
              <label id="lblNotaPenerimaan"></label>
            </div>  
          </div>

          <div class="col-md-2 col-sm-12 col-xs-12">
            <label class="tebal">Tanggal Penerimaan</label>
          </div>

          <div class="col-md-4 col-sm-12 col-xs-12">
            <div class="form-group">
              <label id="lblTglPenerimaan"></label>
            </div>  
          </div>
          
          <div class="col-md-2 col-sm-12 col-xs-12">
            <label class="tebal">Staff</label>
          </div>

          <div class="col-md-4 col-sm-12 col-xs-12">
            <div class="form-group">
              <label id="lblStaff"></label>
            </div>
          </div>

          <div class="col-md-2 col-sm-12 col-xs-12">
            <label class="tebal">Supplier</label>
          </div>

          <div class="col-md-4 col-sm-12 col-xs-12">
            <div class="form-group">
              <label id="lblSupplier"></label>
            </div>
          </div>

          <div class="col-md-2 col-sm-12 col-xs-12">
            <label class="tebal">Total Pembelian Gross</label>
          </div>

          <div class="col-md-4 col-sm-12 col-xs-12">
            <div class="form-group">
              <label id="lblTotalBeliGross"></label>
            </div>
          </div>

          <div class="col-md-2 col-sm-12 col-xs-12">
            <label class="tebal">Total Disc</label>
          </div>

          <div class="col-md-4 col-sm-12 col-xs-12">
            <div class="form-group">
              <label id="lblTotalBeliDisc"></label>
            </div>
          </div>

          <div class="col-md-2 col-sm-12 col-xs-12">
            <label class="tebal">Pajak</label>
          </div>

          <div class="col-md-4 col-sm-12 col-xs-12">
            <div class="form-group">
              <label id="lblTotalBeliTax"></label>
            </div>
          </div>

          <div class="col-md-2 col-sm-12 col-xs-12">
            <label class="tebal">Total Pembelian Nett</label>
          </div>

          <div class="col-md-4 col-sm-12 col-xs-12">
            <div class="form-group">
              <label id="lblTotalBeliNett"></label>
            </div>
          </div>

          <div class="col-md-2 col-sm-12 col-xs-12">
            <label class="tebal">Total Terima</label>
          </div>

          <div class="col-md-4 col-sm-12 col-xs-12">
            <div class="form-group">
              <label id="lblTotalTerimaNett"></label>
            </div>
          </div>

        </div>
        
        <div class="table-responsive">
          <table id="tabel-detail" class="table tabelan table-bordered table-striped">
            <thead>
              <tr>
                <th style="text-align: center;" width="5%;">No</th>
                <th width="25%;">Kode | Barang</th>
                <th width="10%">Qty</th>
                <th width="10%">Qty Terima</th>
                <th width="5%">Satuan</th>
                <th width="15%">Harga</th>
                <th width="15%">Total</th>
                <th width="10%">Stok</th>
              </tr>
            </thead>
            <tbody id="div_item">

            </tbody>
          </table>
        </div>

      </div>
  
      <div class="modal-footer" style="border-top: none;">
        <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
      </div>
    </div>
    <!-- /Modal content-->
  </div>

  </div>
</div>