
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


Route::group(['middleware' => 'auth'], function () {

Route::get('/home', 'HomeController@home');

/*Master*/
Route::get('/master/datasuplier/suplier', 'MasterController@suplier')->name('suplier');
/* ari */


/*---------*/

Route::get('/master/datapegawai/pegawai', 'MasterController@pegawai');
Route::get('/master/datakeuangan/keuangan', 'MasterController@keuangan');
Route::get('/master/datatransaksi/transaksi', 'MasterController@transaksi');
Route::get('/master/datasuplier/tambah_suplier', 'MasterController@tambah_suplier');
Route::get('/master/datatransaksi/tambah_transaksi', 'MasterController@tambah_transaksi');
Route::get('/master/datapegawai/tambah_pegawai', 'MasterController@tambah_pegawai');
//purchesing
//rizky
//order pembelian
Route::get('/purchasing/orderpembelian/order', 'Pembelian\OrderPembelianController@order');
Route::get('/purchasing/orderpembelian/tambah_order', 'Pembelian\OrderPembelianController@tambah_order');
Route::get('/purchasing/orderpembelian/get-data-tabel-index', 'Pembelian\OrderPembelianController@getDataTabelIndex');
Route::get('/purchasing/orderpembelian/get-data-detail/{id}', 'Pembelian\OrderPembelianController@getDataDetail');
//rencana pembelian
Route::get('/purchasing/rencanapembelian/rencana', 'Pembelian\RencanaPembelianController@rencana');
Route::get('/purchasing/rencanapembelian/create', 'Pembelian\RencanaPembelianController@create');
Route::get('/purchasing/rencanapembelian/get-data-tabel-daftar', 'Pembelian\RencanaPembelianController@getDataTabelDaftar');
Route::get('/purchasing/rencanapembelian/get-supplier', 'Pembelian\RencanaPembelianController@getDataSupplier');
Route::get('/purchasing/rencanapembelian/autocomplete-barang', 'Pembelian\RencanaPembelianController@autocompleteBarang');
Route::post('/purchasing/rencanapembelian/simpan-plan', 'Pembelian\RencanaPembelianController@simpanPlan');
Route::get('/purchasing/rencanapembelian/get-detail-plan/{id}', 'Pembelian\RencanaPembelianController@getDetailPlan');
Route::get('/purchasing/rencanapembelian/confirm-plan/{id}', 'Pembelian\RencanaPembelianController@confirmPlan');
Route::post('/purchasing/rencanapembelian/confirm-plan-submit', 'Pembelian\RencanaPembelianController@submitConfirm');
//rizky

Route::get('/purchasing/returnpembelian/pembelian', 'Pembelian\PurchasingController@pembelian');
Route::get('/purchasing/belanjasuplier/suplier', 'Pembelian\PurchasingController@suplier');
Route::get('/purchasing/belanjalangsung/langsung', 'Pembelian\PurchasingController@langsung');
Route::get('/purchasing/belanjaproduk/produk', 'Pembelian\PurchasingController@produk');
Route::get('/purchasing/belanjaharian/belanja', 'Pembelian\PurchasingController@belanja');
Route::get('/purchasing/belanjaharian/tambah_belanja', 'Pembelian\PurchasingController@tambah_belanja');
Route::get('/purchasing/returnpembelian/tambah_pembelian', 'Pembelian\PurchasingController@tambah_pembelian');
Route::get('/purchasing/rencanabahanbaku/bahan', 'Pembelian\PurchasingController@bahan');
Route::get('/purchasing/belanjapasar/pasar', 'Pembelian\PurchasingController@pasar');


/*Inventory*/
Route::get('/inventory/POSretail/transfer', 'transferItemController@index');
Route::get('/inventory/POSgrosir/transfer', 'transferItemGrosirController@indexGrosir');
Route::get('/inventory/p_hasilproduksi/produksi', 'Inventory\PenerimaanBrgProdController@produksi');

Route::get('/inventory/b_digunakan/barang', 'Inventory\PemakaianBrgGdgController@barang');
Route::get('/inventory/b_digunakan/tambah_barang', 'Inventory\PemakaianBrgGdgController@tambah_barang');

Route::get('/inventory/stockopname/opname', 'Inventory\OpnameGdgController@opname');
Route::get('/inventory/stockopname/tambah_opname', 'Inventory\OpnameGdgController@tambah_opname');

Route::get('/inventory/p_returncustomer/cust', 'Inventory\InventoryController@cust');
Route::get('/inventory/p_hasilproduksi/cari_nota', 'Inventory\InventoryController@cari_nota_produksi'); 
Route::get('/inventory/p_returncustomer/cari_nota', 'Inventory\InventoryController@cari_nota_cust');
/*End Inventory*/

//rizky
Route::get('/inventory/p_hasilproduksi/get_data_sj', 'Inventory\PenerimaanBrgProdController@get_data_sj');
Route::get('/inventory/p_hasilproduksi/list_sj', 'Inventory\PenerimaanBrgProdController@list_sj');
Route::get('/inventory/p_hasilproduksi/terima_hasil_produksi/{id}/{id2}', 'Inventory\PenerimaanBrgProdController@terima_hasil_produksi');
Route::get('/inventory/p_hasilproduksi/edit_hasil_produksi/{id}/{id2}', 'Inventory\PenerimaanBrgProdController@edit_hasil_produksi');
Route::post('/inventory/p_hasilproduksi/simpan_update_data', 'Inventory\PenerimaanBrgProdController@simpan_update_data');
Route::post('/inventory/p_hasilproduksi/update_data', 'Inventory\PenerimaanBrgProdController@update_data');
Route::get('/inventory/p_hasilproduksi/get_tabel_data/{id}', 'Inventory\PenerimaanBrgProdController@get_tabel_data');
Route::get('/inventory/p_hasilproduksi/ubah_status_transaksi/{id}/{id2}', 'Inventory\PenerimaanBrgProdController@ubah_status_transaksi');
Route::get('/inventory/p_hasilproduksi/get_penerimaan_by_tgl/{tgl1}/{tgl2}/{akses}', 'Inventory\PenerimaanBrgProdController@get_penerimaan_by_tgl');
Route::get('/inventory/p_hasilproduksi/get_list_waiting_by_tgl/{tgl1}/{tgl2}', 'Inventory\PenerimaanBrgProdController@get_list_waiting_by_tgl');
//end rizky
/*Produksi*/
Route::get('/produksi/spk/spk', 'ProduksiController@spk');
Route::get('/produksi/bahanbaku/baku', 'ProduksiController@baku');
Route::get('/produksi/sdm/sdm', 'ProduksiController@sdm');
Route::get('/produksi/produksi/produksi2', 'ProduksiController@produksi2');
Route::get('/produksi/waste/waste', 'ProduksiController@waste');
Route::get('/produksi/o_produksi/tambah_produksi', 'ProduksiController@tambah_produksi');
//rizky
Route::get('/produksi/spk/spk', 'Produksi\spkProductionController@spk');
Route::get('/produksi/spk/ubah-status-spk/{id}', 'Produksi\spkProductionController@ubahStatusSpk');
Route::get('/produksi/spk/get_spk_by_tgl/{tgl1}/{tgl2}/{stat}', 'Produksi\spkProductionController@getSpkByTgl');
//rizky
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
Route::get('/produksi/suratjalan/index', 'Produksi\PengambilanItemController@SuratJalan');
Route::get('/produksi/suratjalan/create/delivery', 'Produksi\PengambilanItemController@tabelDelivery');
Route::get('/produksi/suratjalan/save', 'Produksi\PengambilanItemController@store');
Route::get('/produksi/pengambilanitem/kirim/tabel/{tgl1}/{tgl2}', 'Produksi\PengambilanItemController@tabelKirim');
Route::get('/produksi/pengambilanitem/cari/tabel/{tgl1}/{tgl2}', 'Produksi\PengambilanItemController@cariTabelKirim');
Route::get('/produksi/pengambilanitem/itemkirim/tabel/{id}', 'Produksi\PengambilanItemController@itemTabelKirim');
Route::get('/produksi/pengambilanitem/lihat/id', 'Produksi\PengambilanItemController@orderId');
//mas shomad
/* Monitoring */
Route::get('/produksi/monitoringprogress/monitoring', 'Produksi\MonitoringProgressController@monitoring');
Route::get('/produksi/monitoringprogress/tabel', 'Produksi\MonitoringProgressController@tabel');
Route::get('/produksi/monitoringprogress/plan/{id}', 'Produksi\MonitoringProgressController@plan');
// Route::get('/produksi/monitoringprogress/{tgl1}/{tgl2}','Produksi\MonitoringProgressController@search');
Route::get('/produksi/monitoringprogress/refresh','Produksi\MonitoringProgressController@refresh');
Route::get('/produksi/monitoringprogress/nota/{id}', 'Produksi\MonitoringProgressController@bukaNota');
Route::get('/produksi/monitoringprogress/nota/tabel/{id}', 'Produksi\MonitoringProgressController@nota');
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

	// rencana Penjualan
	Route::get('/penjualan/rencanapenjualan/rencana', 'rencana_penjualan@index');
	Route::get('/penjualan/rencanapenjualan/tambah_rencana', 'rencana_penjualan@tambah_rencana');
    Route::get('/penjualan/rencanapenjualan/datatable_rencana', 'rencana_penjualan@datatable_rencana')->name('datatable_rencana');
    Route::get('/penjualan/rencanapenjualan/datatable_rencana1', 'rencana_penjualan@datatable_rencana1')->name('datatable_rencana1');
	Route::get('/penjualan/rencanapenjualan/datatable_rencana2', 'rencana_penjualan@datatable_rencana2')->name('datatable_rencana2');
    Route::get('/penjualan/rencanapenjualan/save_item', 'rencana_penjualan@save_item');
    Route::get('/penjualan/rencanapenjualan/edit_rencana/{id}', 'rencana_penjualan@edit_rencana');
    Route::get('/penjualan/rencanapenjualan/hapus_rencana/{id}', 'rencana_penjualan@hapus_rencana');
	// 
    // monitoring penjualan
    Route::get('/penjualan/monitorprogress/progress', 'monitoring_penjualan@progress');
    Route::get('/penjualan/monitorprogress/datatable_progress', 'monitoring_penjualan@datatable_progress')->name('datatable_progress');
    Route::get('/penjualan/monitorprogress/datatable_progress1', 'monitoring_penjualan@datatable_progress1')->name('datatable_progress1');
    // 
Route::get('/penjualan/manajemenreturn/r_penjualan', 'PenjualanController@r_penjualan');
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
Route::get('/pembayaran/POSretail/pay-methode', 'Penjualan\POSRetailController@PayMethode');
Route::get('/penjualan/POSretail/setbarcode', 'Penjualan\POSRetailController@setBarcode');
//thoriq stock penjualan retail
Route::get('/penjualan/POSretail/stock/table-stock', 'Penjualan\stockController@tableStock');
//shomat update stock
// Route::get('/penjualan/POSretail/stock/update/{id}', 'Penjualan\stockController@update');
// Route::get('/penjualan/POSretail/stock/table-stock/{key}' , 'Penjualan\stockController@cariStock');
//POSGrosir
Route::get('/penjualan/POSgrosir/index', 'Penjualan\POSGrosirController@grosir');
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
Route::get('/penjualan/POSgrosir/grosir/autocompleteitem', 'Penjualan\POSGrosirController@autocompleteitem');
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
Route::get('/penjualan/POSretail/stock/table-stock', 'Penjualan\stockController@tableStock');
//shomat update stock
// Route::get('/penjualan/POSgrosir/stock/update/{id}', 'Penjualan\stockGrosirController@update');
// Route::get('/penjualan/POSgrosir/stock/table-stock/{key}', 'Penjualan\stockGrosirController@cariStock');
/*HRD*/
Route::get('/hrd/manajemenkpipegawai/kpi', 'HrdController@kpi');
Route::get('/hrd/payroll/payroll', 'HrdController@payroll');
Route::get('/hrd/payroll/tambah_payroll', 'HrdController@tambah_payroll');
Route::get('/hrd/payroll/table', 'HrdController@table');
Route::get('/hrd/recruitment/rekrut', 'HrdController@rekrut');
Route::get('/hrd/datajabatan/datajabatan', 'HrdController@datajabatan');
Route::get('/hrd/datajabatan/tambah_jabatan', 'HrdController@tambah_jabatan');
Route::get('/hrd/datajabatan/edit_jabatan', 'HrdController@edit_jabatan');
Route::get('/hrd/dataadministrasi/admin', 'HrdController@admin');
Route::get('/hrd/datalembur/lembur', 'HrdController@lembur');
Route::get('/hrd/scoreboard/score', 'HrdController@score');
Route::get('/hrd/training/training', 'HrdController@training');
/*Keuangan*/
Route::get('/keuangan/p_inputtransaksi/transaksi', 'Keuangan\KeuanganController@transaksi');
Route::get('/keuangan/l_hutangpiutang/hutang', 'Keuangan\KeuanganController@hutang');
Route::get('/keuangan/l_jurnal/jurnal', 'Keuangan\KeuanganController@jurnal');
Route::get('/keuangan/analisaprogress/analisa', 'Keuangan\KeuanganController@analisa');
Route::get('/keuangan/analisaocf/analisa2', 'Keuangan\KeuanganController@analisa2');
Route::get('/keuangan/analisaaset/analisa3', 'Keuangan\KeuanganController@analisa3');
Route::get('/keuangan/analisacashflow/analisa4', 'Keuangan\KeuanganController@analisa4');
Route::get('/keuangan/analisaindex/analisa5', 'Keuangan\KeuanganController@analisa5');
Route::get('/keuangan/analisarasio/analisa6', 'Keuangan\KeuanganController@analisa6');
Route::get('/keuangan/analisabottom/analisa7', 'Keuangan\KeuanganController@analisa7');
Route::get('/keuangan/analisaroe/analisa8', 'Keuangan\KeuanganController@analisa8');
Route::get('/keuangan/spk/create-id', 'Keuangan\spkFinancialController@spkCreateId');
Route::get('/keuangan/spk/data-produc-plan', 'Keuangan\spkFinancialController@productplan');
Route::get('/keuangan/spk/simpan-spk', 'Keuangan\spkFinancialController@simpanSpk');
// Route::get('/keuangan/spk/cari-data-plan', 'Keuangan\spkFinancialController@cariDataSpk');
// rizky
Route::get('/keuangan/p_hasilproduksi/pembatalanPenerimaan', 'Keuangan\KeuanganController@pembatalanPenerimaan');
Route::get('/keuangan/p_hasilproduksi/ubah_status_transaksi/{id}/{id2}', 'Keuangan\KeuanganController@ubahStatusTransaksi');
Route::get('/keuangan/p_hasilproduksi/get_penerimaan_by_tgl/{tgl1}/{tgl2}', 'Keuangan\KeuanganController@getPenerimaanByTgl');
Route::get('/keuangan/spk/spk', 'Keuangan\spkFinancialController@spk');
Route::get('/keuangan/spk/get-data-tabel-index', 'Keuangan\spkFinancialController@getDataTabelIndex');
Route::get('/keuangan/spk/get-data-tabel-spk/{tgl1}/{tgl2}/{tampil}', 'Keuangan\spkFinancialController@getDataTabelSpk');
Route::get('/keuangan/spk/ubah-status-spk/{id}', 'Keuangan\spkFinancialController@ubahStatusSpk');
Route::get('/keuangan/spk/get-data-spk-byid/{id}', 'Keuangan\spkFinancialController@getDataSpkById');
// end rizky
//mahmud
Route::get('/produksi/lihatadonan/tabel/{id}/{qty}', 'Keuangan\spkFinancialController@tabelFormula');
//endmahmud
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
Route::get('/produksi/spk/create-id/{x}', 'Produksi\spkProductionController@spkCreateId');
Route::get('/produksi/spk/data-produc-plan', 'Produksi\spkProductionController@productplan');
Route::get('/produksi/spk/simpan-spk', 'Produksi\spkProductionController@simpanSpk');
Route::get('/produksi/spk/cari-data-plan', 'Produksi\spkProductionController@cariDataSpk');
// spk Production Selesai

//Master Data Suplier

Route::get('master/datasuplier/suplier_proses', 'Master\SuplierController@suplier_proses');
Route::get('master/datasuplier/datatable_suplier', 'Master\SuplierController@datatable_suplier')->name('datatable_suplier');
Route::get('master/datasuplier/suplier_edit/{s_id}', 'Master\SuplierController@suplier_edit');
Route::get('master/datasuplier/suplier_edit_proses/{s_id}', 'Master\SuplierController@suplier_edit_proses');
Route::get('master/datasuplier/suplier_hapus', 'Master\SuplierController@suplier_hapus');


//-deny

//customer
Route::get('/master/datacust/cust', 'master\custController@cust')->name('cust');
Route::get('/master/datacust/tambah_cust', 'master\custController@tambah_cust')->name('tambah_cust');
Route::get('/master/datacust/simpan_cust', 'master\custController@simpan_cust')->name('simpan_cust');
Route::get('/master/datacust/hapus_cust', 'master\custController@hapus_cust')->name('hapus_cust');
Route::get('/master/datacust/edit_cust', 'master\custController@edit_cust')->name('edit_cust');
Route::get('/master/datacust/update_cust', 'master\custController@update_cust')->name('update_cust');
Route::get('/master/datacust/datatable_cust', 'master\custController@datatable_cust')->name('datatable_cust');

//barang
Route::get('/master/databarang/barang', 'master\barangController@barang')->name('barang');
Route::get('/master/databarang/tambah_barang', 'master\barangController@tambah_barang');
Route::get('/master/databarang/simpan_barang', 'master\barangController@simpan_barang')->name('simpan_barang');
Route::get('/master/databarang/hapus_barang', 'master\barangController@hapus_barang')->name('hapus_barang');
Route::get('/master/databarang/edit_barang', 'master\barangController@edit_barang')->name('edit_barang');
Route::get('/master/databarang/update_barang', 'master\barangController@update_barang')->name('update_barang');
Route::get('/master/databarang/datatable_barang', 'master\barangController@datatable_barang')->name('datatable_barang');
Route::get('/master/databarang/kode_barang', 'master\barangController@kode_barang')->name('kode_barang');
Route::get('/master/databarang/cari_group_barang', 'master\barangController@cari_group_barang')->name('cari_group_barang');

//bahan baku
Route::get('/master/databaku/baku', 'master\bahan_bakuController@baku')->name('baku');
Route::get('/master/databaku/tambah_baku', 'master\bahan_bakuController@tambah_baku')->name('tambah_baku');
Route::get('/master/databaku/simpan_baku', 'master\bahan_bakuController@simpan_baku')->name('simpan_baku');
Route::get('/master/databaku/hapus_baku', 'master\bahan_bakuController@hapus_baku')->name('hapus_baku');
Route::get('/master/databaku/edit_baku', 'master\bahan_bakuController@edit_baku')->name('edit_baku');
Route::get('/master/databaku/update_baku', 'master\bahan_bakuController@update_baku')->name('update_baku');
Route::get('/master/databaku/datatable_baku', 'master\bahan_bakuController@datatable_baku')->name('datatable_baku');

//jenis produksi 
Route::get('/master/datajenis/jenis', 'master\jenis_produksiController@jenis')->name('jenis');
Route::get('/master/datajenis/tambah_jenis', 'master\jenis_produksiController@tambah_jenis')->name('tambah_jenis');
Route::get('/master/datajenis/simpan_jenis', 'master\jenis_produksiController@simpan_jenis')->name('simpan_jenis');
Route::get('/master/datajenis/hapus_jenis', 'master\jenis_produksiController@hapus_jenis')->name('hapus_jenis');
Route::get('/master/datajenis/edit_jenis', 'master\jenis_produksiController@edit_jenis')->name('edit_jenis');
Route::get('/master/datajenis/update_jenis', 'master\jenis_produksiController@update_jenis')->name('update_jenis');
Route::get('/master/datajenis/datatable_jenis', 'master\jenis_produksiController@datatable_jenis')->name('datatable_jenis');

//satuan
Route::get('/master/datasatuan/satuan', 'master\satuanController@satuan')->name('satuan');
Route::get('/master/datasatuan/tambah_satuan', 'master\satuanController@tambah_satuan')->name('tambah_satuan');
Route::get('/master/datasatuan/simpan_satuan', 'master\satuanController@simpan_satuan')->name('simpan_satuan');
Route::get('/master/datasatuan/hapus_satuan', 'master\satuanController@hapus_satuan')->name('hapus_satuan');
Route::get('/master/datasatuan/edit_satuan', 'master\satuanController@edit_satuan')->name('edit_satuan');
Route::get('/master/datasatuan/update_satuan', 'master\satuanController@update_satuan')->name('update_satuan');
Route::get('/master/datasatuan/datatable_satuan', 'master\satuanController@datatable_satuan')->name('datatable_satuan');





//group
Route::get('/master/datagroup/group', 'master\groupController@group')->name('group');
Route::get('/master/datagroup/tambah_group', 'master\groupController@tambah_group')->name('tambah_group');
Route::get('/master/datagroup/simpan_group', 'master\groupController@simpan_group')->name('simpan_group');
Route::get('/master/datagroup/hapus_group', 'master\groupController@hapus_group')->name('hapus_group');
Route::get('/master/datagroup/edit_group', 'master\groupController@edit_group')->name('edit_group');
Route::get('/master/datagroup/update_group', 'master\groupController@update_group')->name('update_group');
Route::get('/master/datagroup/datatable_group', 'master\groupController@datatable_group')->name('datatable_group');

//-[]-belum-[]-//

//pegawai
Route::get('/master/datapegawai/pegawai', 'master\pegawaiController@pegawai')->name('pegawai');
Route::get('/master/datapegawai/tambah_pegawai', 'master\pegawaiController@tambah_pegawai')->name('tambah_pegawai');
Route::get('/master/datapegawai/simpan_pegawai', 'master\pegawaiController@simpan_pegawai')->name('simpan_pegawai');
Route::get('/master/datapegawai/hapus_pegawai', 'master\pegawaiController@hapus_pegawai')->name('hapus_pegawai');
Route::get('/master/datapegawai/edit_pegawai', 'master\pegawaiController@edit_pegawai')->name('edit_pegawai');
Route::get('/master/datapegawai/update_pegawai', 'master\pegawaiController@update_pegawai')->name('update_pegawai');
//end

}); // End Route Groub middleware auth


//inven

//gudang
Route::get('/inventory/datagudang/gudang', 'inventory\stock_gudangController@gudang')->name('gudang');
Route::get('/inventory/datagudang/datatable_gudang', 'inventory\stock_gudangController@datatable_gudang')->name('datatable_gudang');
Route::get('/inventory/datagudang/cari_gudang', 'inventory\stock_gudangController@cari_gudang')->name('cari_gudang');



// Route::get('/inventory/p_suplier/suplier', 'Inventory\PenerimaanBrgSupController@suplier');

Route::get('/inventory/p_suplier/suplier', 'Inventory\penerimaanbarang_supController@suplier')->name('pensuplier');
Route::get('/inventory/p_suplier/create_suplier', 'Inventory\penerimaanbarang_supController@create_suplier');
Route::get('/inventory/p_suplier/save_pensuplier', 'Inventory\penerimaanbarang_supController@save_pensuplier')->name('save_pensuplier');
Route::get('/inventory/p_suplier/datatable_pensuplier', 'Inventory\penerimaanbarang_supController@datatable_pensuplier')->name('datatable_pensuplier');
Route::get('/inventory/p_suplier/edit_pensuplier', 'Inventory\penerimaanbarang_supController@edit_pensuplier')->name('edit_pensuplier');

Route::get('/inventory/p_suplier/cari_nota', 'Inventory\penerimaanbarang_supController@cari_nota_sup');

//end