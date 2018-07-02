
<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/*Route::get('/', function () {
    return redirect('login');
});*/
   Route::get('/', function () {
        return view('auth.login');
    })->name('index');


    Route::get('login', 'loginController@authenticate');
    Route::post('login', 'loginController@authenticate');

Route::get('not-allowed', 'mMemberController@notAllowed');
    Route::get('logout', 'mMemberController@logout');


Route::get('/home', 'HomeController@home');

/*Master*/
Route::get('/master/datasuplier/suplier', 'MasterController@suplier');
/* ari */
Route::get('/master/datacust/cust', 'MasterController@cust');
Route::get('/master/datacust/getdata', 'MasterController@getdata');
Route::get('/master/datacust/simpan_cust', 'MasterController@simpan_cust');

Route::get('/master/datacust/cust_edit/{id_cus_ut}', 'MasterController@cust_edit');
Route::get('/master/datacust/cust_edit/cust_edit_proses/{id_cus_ut}', 'MasterController@cust_edit_proses');
Route::get('/master/datacust/cust_delete/{id_cus_ut}', 'MasterController@cust_delete');
/*---------*/
Route::get('/master/databaku/baku', 'MasterController@baku');
Route::get('/master/databaku/tambah_baku', 'MasterController@tambah_baku');
Route::get('/master/datajenis/jenis', 'MasterController@jenis');
Route::get('/master/datajenis/tambah_jenis', 'MasterController@tambah_jenis');
Route::get('/master/datapegawai/pegawai', 'MasterController@pegawai');
Route::get('/master/datakeuangan/keuangan', 'MasterController@keuangan');
Route::get('/master/datatransaksi/transaksi', 'MasterController@transaksi');
Route::get('/master/datasuplier/tambah_suplier', 'MasterController@tambah_suplier');
Route::get('/master/datacust/tambah_cust', 'MasterController@tambah_cust');
Route::get('/master/datatransaksi/tambah_transaksi', 'MasterController@tambah_transaksi');
Route::get('/master/datapegawai/tambah_pegawai', 'MasterController@tambah_pegawai');

Route::get('/master/databarang/barang', 'MasterController@barang');
Route::get('/master/databarang/tambah_barang', 'MasterController@tambah_barang');

/*Purchasing*/
Route::get('/purchasing/orderpembelian/order', 'PurchasingController@order');
Route::get('/purchasing/orderpembelian/tambah_order', 'PurchasingController@tambah_order');
Route::get('/purchasing/rencanapembelian/rencana', 'PurchasingController@rencana');
Route::get('/purchasing/rencanapembelian/create', 'PurchasingController@create');
Route::get('/purchasing/returnpembelian/pembelian', 'PurchasingController@pembelian');
Route::get('/purchasing/belanjasuplier/suplier', 'PurchasingController@suplier');
Route::get('/purchasing/belanjalangsung/langsung', 'PurchasingController@langsung');
Route::get('/purchasing/belanjaproduk/produk', 'PurchasingController@produk');
Route::get('/purchasing/belanjaharian/belanja', 'PurchasingController@belanja');
Route::get('/purchasing/belanjaharian/tambah_belanja', 'PurchasingController@tambah_belanja');
Route::get('/purchasing/returnpembelian/tambah_pembelian', 'PurchasingController@tambah_pembelian');
Route::get('/purchasing/orderpembelian/tambah_order', 'PurchasingController@tambah_order');
Route::get('/purchasing/rencanabahanbaku/bahan', 'PurchasingController@bahan');
/* ricky */
Route::get('/purchasing/belanjapasar/pasar', 'PurchasingController@pasar');
/*----*/
/*Inventory*/
Route::get('/inventory/p_suplier/suplier', 'InventoryController@suplier');
Route::get('/inventory/p_hasilproduksi/produksi', 'InventoryController@produksi');
Route::get('/inventory/p_returncustomer/cust', 'InventoryController@cust');
Route::get('/inventory/b_digunakan/barang', 'InventoryController@barang');
Route::get('/inventory/stockopname/opname', 'InventoryController@opname');
Route::get('/inventory/p_suplier/cari_nota', 'InventoryController@cari_nota_sup');
Route::get('/inventory/p_hasilproduksi/cari_nota', 'InventoryController@cari_nota_produksi');
Route::get('/inventory/p_returncustomer/cari_nota', 'InventoryController@cari_nota_cust');
Route::get('/inventory/b_digunakan/tambah_barang', 'InventoryController@tambah_barang');
Route::get('/inventory/stockopname/tambah_opname', 'InventoryController@tambah_opname');
//10-05-18 rizky
Route::get('/inventory/POSretail/transfer', 'transferItemController@index');
Route::get('/inventory/POSgrosir/transfer', 'transferItemGrosirController@indexGrosir');
Route::get('/inventory/p_hasilproduksi/get_data_sj', 'InventoryController@get_data_sj');
Route::get('/inventory/p_hasilproduksi/list_sj', 'InventoryController@list_sj');
Route::get('/inventory/p_hasilproduksi/terima_hasil_produksi/{id}/{id2}', 'InventoryController@terima_hasil_produksi');
Route::get('/inventory/p_hasilproduksi/edit_hasil_produksi/{id}/{id2}', 'InventoryController@edit_hasil_produksi');
Route::post('/inventory/p_hasilproduksi/simpan_update_data', 'InventoryController@simpan_update_data');
Route::post('/inventory/p_hasilproduksi/update_data', 'InventoryController@update_data');
Route::get('/inventory/p_hasilproduksi/get_tabel_data/{id}', 'InventoryController@get_tabel_data');
Route::get('/inventory/p_hasilproduksi/ubah_status_transaksi/{id}/{id2}', 'InventoryController@ubah_status_transaksi');
Route::get('/inventory/p_hasilproduksi/get_penerimaan_by_tgl/{tgl1}/{tgl2}/{akses}', 'InventoryController@get_penerimaan_by_tgl');
Route::get('/inventory/p_hasilproduksi/get_list_waiting_by_tgl/{tgl1}/{tgl2}', 'InventoryController@get_list_waiting_by_tgl');
//end 10-05-18 rizky

/*Produksi*/
Route::get('/produksi/spk/spk', 'ProduksiController@spk');
Route::get('/produksi/bahanbaku/baku', 'ProduksiController@baku');
Route::get('/produksi/sdm/sdm', 'ProduksiController@sdm');
Route::get('/produksi/produksi/produksi2', 'ProduksiController@produksi2');
Route::get('/produksi/waste/waste', 'ProduksiController@waste');
Route::get('/produksi/o_produksi/tambah_produksi', 'ProduksiController@tambah_produksi');
//mahmud
Route::get('/produksi/o_produksi/index', 'Produksi\ManOutputProduksiController@OutputProduksi');
// Route::get('/produksi/o_produksi/settanggal/{tgl1}', 'Produksi\ManOutputProduksiController@setCreateProduct');
Route::get('/produksi/o_produksi/tabel', 'Produksi\ManOutputProduksiController@tabel');
Route::get('/produksi/o_produksi/store', 'Produksi\ManOutputProduksiController@store');
Route::get('/produksi/o_produksi/getdata/tabel', 'Produksi\ManOutputProduksiController@tabelDetail');
Route::get('/produksi/o_produksi/getdata/tabel/kirim', 'Produksi\ManOutputProduksiController@tabelDetailKirim');
Route::get('/produksi/o_produksi/getdata/{x}', 'Produksi\ManOutputProduksiController@detail');
Route::get('/produksi/o_produksi/getdata/kirim/{y}', 'Produksi\ManOutputProduksiController@detailKirim');
Route::get('/produksi/o_produksi/distroy/{id1}/{id2}', 'Produksi\ManOutputProduksiController@distroy');
Route::get('/produksi/o_produksi/sending/{id1}/{id2}', 'Produksi\ManOutputProduksiController@sending');
Route::get('/produksi/o_produksi/edit/{id1}/{id2}', 'Produksi\ManOutputProduksiController@edit');
Route::get('/produksi/o_produksi/lihat/tabelhasil', 'Produksi\ManOutputProduksiController@tabelHasil');
Route::get('/produksi/o_produksi/select2/spk/{tgl1}', 'Produksi\ManOutputProduksiController@setSpk');
Route::get('/produksi/o_produksi/select2/pilihspk/{x}', 'Produksi\ManOutputProduksiController@selectDataSpk');
Route::get('/produksi/o_produksi/save', 'Produksi\ManOutputProduksiController@editQty');
//Pembuatan Surat Jalan
Route::get('/produksi/suratjalan/index', 'Produksi\SuratJalanController@SuratJalan');
Route::get('/produksi/suratjalan/create/delivery', 'Produksi\SuratJalanController@tabelDelivery');
Route::get('/produksi/suratjalan/save', 'Produksi\SuratJalanController@store');
//mas shomad
/* Monitoring */
Route::get('/produksi/monitoringprogress/monitoring', 'Produksi\MonitoringProgressController@monitoring');
Route::get('/produksi/monitoringprogress/tabel', 'Produksi\MonitoringProgressController@tabel');
Route::get('/produksi/monitoringprogress/plan/{id}', 'Produksi\MonitoringProgressController@plan');
// Route::get('/produksi/monitoringprogress/{tgl1}/{tgl2}','Produksi\MonitoringProgressController@search');
Route::get('/produksi/monitoringprogress/refresh','Produksi\MonitoringProgressController@refresh');
Route::get('/produksi/monitoringprogress/nota/{id}', 'Produksi\MonitoringProgressController@nota');
Route::get('/produksi/monitoringprogress/save','Produksi\MonitoringProgressController@save');

/* Rencana Produksi */
Route::get('/produksi/rencanaproduksi/tabel', 'Produksi\RencanaProduksiController@tabel');
Route::get('/produksi/rencanaproduksi/produksi', 'Produksi\RencanaProduksiController@produksi');
Route::get('/produksi/rencanaproduksi/save', 'Produksi\RencanaProduksiController@save');
Route::get('/produksi/rencanaproduksi/hapus_rencana/{id}','Produksi\RencanaProduksiController@hapus_rencana');
Route::patch('/produksi/rencanaproduksi/produksi/edit_rencana', 'Produksi\RencanaProduksiController@edit_rencana');
Route::get('/produksi/rencanaproduksi/produksi/autocomplete', 'Produksi\RencanaProduksiController@autocomplete');
//finish mas shomad

/*Penjualan*/
Route::get('/penjualan/manajemenharga/harga', 'PenjualanController@harga');
Route::get('/penjualan/manajemenpromosi/promosi', 'PenjualanController@promosi');
Route::get('/penjualan/broadcastpromosi/promosi2', 'PenjualanController@promosi2');
Route::get('/penjualan/rencanapenjualan/rencana', 'PenjualanController@rencana');
Route::get('/penjualan/manajemenreturn/r_penjualan', 'PenjualanController@r_penjualan');
Route::get('/penjualan/monitorprogress/progress', 'PenjualanController@progress');
Route::get('/penjualan/rencanapenjualan/tambah_rencana', 'PenjualanController@tambah_rencana');
Route::get('/penjualan/monitoringorder/monitoring', 'PenjualanController@monitoringorder');
Route::get('/penjualan/mutasistok/mutasi', 'PenjualanController@mutasi');
Route::get('/penjualan/broadcastpromosi/tambah_promosi2', 'PenjualanController@tambah_promosi2');

//POSRetail
Route::get('/penjualan/POSretail/index', 'Penjualan\POSRetailController@retail');
Route::get('/penjualan/POSretail/retail/store', 'Penjualan\POSRetailController@store');
Route::get('/penjualan/POSretail/retail/autocomplete', 'Penjualan\POSRetailController@autocomplete');
Route::get('/penjualan/POSretail/retail/setnama/{id}', 'Penjualan\POSRetailController@setnama');
Route::get('/penjualan/POSretail/retail/sal_save_final', 'Penjualan\POSRetailController@sal_save_final');
Route::get('/penjualan/POSretail/retail/sal_save_draft', 'Penjualan\POSRetailController@sal_save_draft');
Route::get('/penjualan/POSretail/retail/sal_save_onprogres', 'Penjualan\POSRetailController@sal_save_onProgres');
Route::get('/penjualan/POSretail/retail/sal_save_finalupdate', 'Penjualan\POSRetailController@sal_save_finalUpdate');
Route::get('/penjualan/POSretail/retail/sal_save_onProgresUpdate', 'Penjualan\POSRetailController@sal_save_onProgresUpdate');
Route::get('/penjualan/POSretail/retail/sal_save_draftUpdate', 'Penjualan\POSRetailController@sal_save_draftUpdate');
Route::get('/penjualan/POSretail/retail/create', 'Penjualan\POSRetailController@create');
Route::get('/penjualan/POSretail/retail/create_sal', 'Penjualan\POSRetailController@create_sal');
Route::get('/penjualan/POSretail/retail/edit_sales/{id}', 'Penjualan\POSRetailController@edit_sales');
Route::get('/penjualan/POSretail/retail/distroy/{id}', 'Penjualan\POSRetailController@distroy');
Route::put('/penjualan/POSretail/retail/update/{id}', 'Penjualan\POSRetailController@update');
Route::get('/penjualan/POSretail/retail/autocompleteitem', 'Penjualan\POSRetailController@autocompleteitem');
Route::get('/penjualan/POSretail/retail/transfer-item', 'Penjualan\stockController@transferItem');
Route::get('/penjualan/POSretail/retail/item_save', 'Penjualan\POSRetailController@item_save');
Route::get('/penjualan/POSretail/getdata', 'Penjualan\POSRetailController@detail');
Route::get('/penjualan/POSretail/getdataReq', 'Penjualan\POSRetailController@detailReq');
Route::get('/penjualan/POSretail/retail/simpan-transfer', 'transferItemController@simpanTransfer');
Route::get('/penjualan/POSretail/get-tanggal/{tgl1}/{tgl2}/{tampil}', 'Penjualan\POSRetailController@getTanggal');
Route::get('/penjualan/POSretail/get-tanggaljual/{tgl1}/{tgl2}', 'Penjualan\POSRetailController@getTanggalJual');
Route::get('/penjualan/POSretail/print', 'Penjualan\POSRetailController@print');
Route::get('/pembayaran/POSretail/pay-methode', 'Penjualan\POSRetailController@PayMethode');
Route::get('/penjualan/POSretail/setbarcode', 'Penjualan\POSRetailController@setBarcode');
//thoriq stock penjualan retail
Route::get('/penjualan/POSretail/stock/table-stock', 'Penjualan\stockController@tableStock');
//shomat update stock
Route::get('/penjualan/POSretail/stock/update/{id}', 'Penjualan\stockController@update');
Route::get('/penjualan/POSretail/stock/table-stock/{key}' , 'Penjualan\stockController@cariStock');

//POSGrosir
Route::get('/penjualan/POSgrosir/index', 'Penjualan\POSGrosirController@grosir');

//ferdy
Route::get('/penjualan/POSgrosir/print/{id}', 'Penjualan\POSGrosirController@print');
Route::get('/penjualan/POSgrosir/suratjalan', 'Penjualan\POSGrosirController@suratjalan');
Route::get('/penjualan/POSgrosir/lpacking', 'Penjualan\POSGrosirController@lpacking');
//end ferdy
Route::get('/penjualan/POSgrosir/grosir/store', 'Penjualan\POSGrosirController@store');
Route::get('/penjualan/POSgrosir/grosir/autocomplete', 'Penjualan\POSGrosirController@autocomplete');
Route::get('/penjualan/POSgrosir/grosir/sal_save_final', 'Penjualan\POSGrosirController@sal_save_final');
Route::get('/penjualan/POSgrosir/grosir/sal_save_draft', 'Penjualan\POSGrosirController@sal_save_draft');
Route::get('/penjualan/POSgrosir/grosir/sal_save_onprogres', 'Penjualan\POSGrosirController@sal_save_onProgres');
Route::get('/penjualan/POSgrosir/grosir/sal_save_finalupdate', 'Penjualan\POSGrosirController@sal_save_finalUpdate');
Route::get('/penjualan/POSgrosir/grosir/sal_save_onProgresUpdate', 'Penjualan\POSGrosirController@sal_save_onProgresUpdate');
Route::get('/penjualan/POSgrosir/grosir/sal_save_draftUpdate', 'Penjualan\POSGrosirController@sal_save_draftUpdate');
Route::get('/penjualan/POSgrosir/grosir/create', 'Penjualan\POSGrosirController@create');
Route::get('/penjualan/POSgrosir/grosir/create_sal', 'Penjualan\POSGrosirController@create_sal');
Route::get('/penjualan/POSgrosir/grosir/edit_sales/{id}', 'Penjualan\POSGrosirController@edit_sales');
Route::get('/penjualan/POSgrosir/grosir/distroy/{id}', 'Penjualan\POSGrosirController@distroy');
Route::put('/penjualan/POSgrosir/grosir/update/{id}', 'Penjualan\POSGrosirController@update');
Route::get('/penjualan/POSgrosir/grosir/autocompleteitem/{id}', 'Penjualan\POSGrosirController@autocompleteitem');
Route::get('/penjualan/POSgrosir/grosir/item_save', 'Penjualan\POSGrosirController@item_save');
Route::get('/penjualan/POSgrosir/getdata', 'Penjualan\POSGrosirController@detail');
Route::get('/penjualan/POSgrosir/grosir/req_retail', 'Penjualan\POSGrosirController@req_retail');
Route::get('/penjualan/POSgrosir/get-tanggal/{tgl1}/{tgl2}/{tampil}', 'Penjualan\POSGrosirController@getTanggal');
Route::get('/penjualan/POSgrosir/get-tanggaljual/{tgl1}/{tgl2}', 'Penjualan\POSGrosirController@getTanggalJual');
Route::get('/pembayaran/POSgrosir/pay-methode', 'Penjualan\POSGrosirController@PayMethode');
Route::get('/penjualan/POSgrosir/setbarcode', 'Penjualan\POSGrosirController@setBarcode');
Route::get('/penjualan/POSgrosir/ubahstatus', 'Penjualan\POSGrosirController@statusMove');
Route::get('/penjualan/POSgrosir/showNote', 'Penjualan\POSGrosirController@showNote');
Route::get('/pembayaran/POSgrosir/changestatus', 'Penjualan\POSGrosirController@changeStatus');

//thoriq stock penjualan grosir
Route::get('/penjualan/POSgrosir/stock/table-stock', 'Penjualan\stockGrosirController@tableStock');
//shomat update stock
Route::get('/penjualan/POSgrosir/stock/update/{id}', 'Penjualan\stockGrosirController@update');
Route::get('/penjualan/POSgrosir/stock/table-stock/{key}', 'Penjualan\stockGrosirController@cariStock');

/*HRD*/
Route::get('/hrd/manajemenkpipegawai/kpi', 'HrdController@kpi');
Route::get('/hrd/payroll/payroll', 'HrdController@payroll');
Route::get('/hrd/recruitment/rekrut', 'HrdController@rekrut');
Route::get('/hrd/datakaryawan/karyawan', 'HrdController@karyawan');
Route::get('/hrd/dataadministrasi/admin', 'HrdController@admin');
Route::get('/hrd/datalembur/lembur', 'HrdController@lembur');
Route::get('/hrd/scoreboard/score', 'HrdController@score');
Route::get('/hrd/training/training', 'HrdController@training');

/*Keuangan*/
Route::get('/keuangan/p_inputtransaksi/transaksi', 'KeuanganController@transaksi');
Route::get('/keuangan/l_hutangpiutang/hutang', 'KeuanganController@hutang');
Route::get('/keuangan/l_jurnal/jurnal', 'KeuanganController@jurnal');
Route::get('/keuangan/analisaprogress/analisa', 'KeuanganController@analisa');
Route::get('/keuangan/analisaocf/analisa2', 'KeuanganController@analisa2');
Route::get('/keuangan/analisaaset/analisa3', 'KeuanganController@analisa3');
Route::get('/keuangan/analisacashflow/analisa4', 'KeuanganController@analisa4');
Route::get('/keuangan/analisaindex/analisa5', 'KeuanganController@analisa5');
Route::get('/keuangan/analisarasio/analisa6', 'KeuanganController@analisa6');
Route::get('/keuangan/analisabottom/analisa7', 'KeuanganController@analisa7');
Route::get('/keuangan/analisaroe/analisa8', 'KeuanganController@analisa8');
Route::get('/keuangan/spk/spk', 'KeuanganController@spk');
// rizky
Route::get('/keuangan/p_hasilproduksi/pembatalanPenerimaan', 'KeuanganController@pembatalanPenerimaan');
Route::get('/keuangan/p_hasilproduksi/ubah_status_transaksi/{id}/{id2}', 'KeuanganController@ubahStatusTransaksi');
Route::get('/keuangan/p_hasilproduksi/get_penerimaan_by_tgl/{tgl1}/{tgl2}', 'KeuanganController@getPenerimaanByTgl');
// end 22/05/18
//thoriq
/*System*/
Route::get('/system/hakuser/user', 'aksesUserController@indexAksesUser');
Route::get('/system/hakuser/tambah_user', 'aksesUserController@tambah_user');
Route::get('/system/hakuser/tambah_user/simpan-user', 'aksesUserController@simpanUser');
Route::get('/system/hakakses/edit-user-akses/{id}/edit', 'aksesUserController@editUserAkses');
Route::get('/system/hakuser/perbarui-user/perbarui-user/{id}', 'aksesUserController@perbaruiUser');
Route::get('/system/hakakses/simpan-user-akses', 'aksesUserController@simpanUserAkses');

// hak akses group
Route::get('/system/hakakses/akses', 'groupAksesController@indexHakAkses');
Route::get('system/hakakses/hapus-akses-group/edit-Akses-Group/{id}/edit', 'groupAksesController@editAksesGroup');
Route::get('system/hakakses/perbarui_akses-group/perbarui-group/{id}', 'groupAksesController@perbaruiGroup');
Route::get('system/hakakses/hapus-akses-group/hapus-group/{id}', 'groupAksesController@hapusHakAkses');
Route::get('/system/hakakses/tambah-akses-group', 'groupAksesController@tambah_akses');
Route::get('/system/hakakses/tambah_akses-group/simpan-group', 'groupAksesController@simpanGroup');
Route::get('/system/hakakses/tambah_akses-group/simpan-group-detail', 'groupAksesController@simpanGroupDetail');

//nota Transfer
Route::get('transfer/no-nota', 'transferItemController@noNota');
//transfer retail

Route::get('transfer/data-transfer', 'transferItemController@dataTransfer');
Route::get('transfer/data-transfer/{id}/edit', 'transferItemController@editTransfer');
Route::get('transfer/data-transfer/hapus/{id}', 'transferItemController@HapusTransfer');
Route::get('transfer/penerimaan-transfer', 'transferItemController@dataPenerimaanTransfer');
Route::get('transfer/lihat-penerimaan/{id}', 'transferItemController@lihatPenerimaan');
Route::get('transfer/penerimaan/simpa-penerimaan', 'transferItemController@simpaPenerimaan');
//transfer selesai

//transfer grosir
Route::get('transfer/data-transfer-appr', 'transferItemGrosirController@dataTransferAppr');
Route::get('penjualan/POSgrosir/approve-transfer/{id}/edit', 'transferItemGrosirController@approveTransfer');
Route::get('penjualan/transfer/grosir/transfer-item', 'Penjualan\stockController@transferItemGrosir');
Route::get('penjualan/POSgrosir/approve-transfer/simpan-approve', 'transferItemGrosirController@simpanApprove');
Route::get('penjualan/transfer/grosir/data-transfer-grosir', 'transferItemGrosirController@dataTransferGrosir');
Route::get('penjualan/transfer/grosir/simpan-transfer-grosir', 'transferItemGrosirController@simpanTransferGrosir');
Route::get('penjualan/POSgrosir/edit-transfer-grosir/{id}/edit', 'transferItemGrosirController@EditTransferGrosir');
Route::get('penjualan/POSgrosir/update-transfer-grosir/{id}', 'transferItemGrosirController@updateTransferGrosir');
Route::get('penjualan/POSgrosir/hapus-transfer-grosir/hapus/{id}', 'transferItemGrosirController@HapusTransferGrosir');
Route::get('coba', 'transferItemController@data');

//transfer selesai

// Create spk Production
Route::get('/produksi/spk/spk', 'Produksi\spkProductionController@spk');
Route::get('/produksi/spk/tabelspk', 'Produksi\spkProductionController@tabelSpk');
Route::get('/produksi/spk/spk', 'Produksi\spkProductionController@spk');
Route::get('/produksi/spk/create-id', 'Produksi\spkProductionController@spkCreateId');
Route::get('/produksi/spk/data-produc-plan', 'Produksi\spkProductionController@productplan');
Route::get('/produksi/spk/simpan-spk', 'Produksi\spkProductionController@simpanSpk');
Route::get('/produksi/spk/cari-data-plan', 'Produksi\spkProductionController@cariDataSpk');
// spk Production Selesai

// Create spk financial
Route::get('/financial/spk/spk', 'Financial\spkFinancialController@spk');
Route::get('/financial/spk/create-id', 'Financial\spkFinancialController@spkCreateId');
Route::get('/financial/spk/data-produc-plan', 'Financial\spkFinancialController@productplan');
Route::get('/financial/spk/simpan-spk', 'Financial\spkFinancialController@simpanSpk');
Route::get('/financial/spk/cari-data-plan', 'Financial\spkFinancialController@cariDataSpk');
// spk Production Selesai


//thoriq
