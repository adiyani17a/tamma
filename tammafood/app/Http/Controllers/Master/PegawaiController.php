<?php

namespace App\Http\Controllers\Master;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use DB;
use App\Pegawai;
use Response;
use App\Http\Requests;
use Illuminate\Http\Request;
use DataTables;
use URL;
use Illuminate\Support\Facades\Input;
use Excel;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class PegawaiController extends Controller
{
    public function pegawai(){
        return view('master.datapegawai.pegawai');
    }

    public function pegawaiData(){
        $list = DB::table('m_pegawai')
                ->select('m_pegawai.*', 'm_tugas.c_section')
                ->join('m_tugas', 'm_pegawai.c_section_id', '=', 'm_tugas.c_id')
                ->get();
        $data = collect($list);
        return Datatables::of($data)           
                ->addColumn('action', function ($data) {
                         return  '<button id="edit" onclick="edit('.$data->c_id.')" class="btn btn-warning btn-sm" title="Edit"><i class="glyphicon glyphicon-pencil"></i></button>'.'
                                        <button id="delete" onclick="hapus('.$data->c_id.')" class="btn btn-danger btn-sm" title="Hapus"><i class="glyphicon glyphicon-trash"></i></button>';
                })
                ->addColumn('none', function ($data) {
                    return '-';
                })
                ->rawColumns(['action','confirmed'])
                ->make(true);
    }

    public function tambahPegawai(){
        $tanggal = date("ym");
        //select max dari c_id dari table m_pegawai
        $maxid = DB::Table('m_pegawai')->select('c_id')->max('c_id');
        //untuk +1 nilai yang ada,, jika kosong maka maxid = 1 , 
        if ($maxid <= 0 || $maxid <= '') {
          $maxid  = 1;
        }else{
          $maxid += 1;
        }
        $kode = str_pad($maxid, 2, '0', STR_PAD_LEFT);
        $id_pegawai = 'PG-' . $tanggal . '/' .  $kode;   
        return view('/master/datapegawai/tambah_pegawai', compact('id_pegawai'));
    }

    public function simpanPegawai(Request $request){
        $input = $request->all();
        $section = explode("-",$request->get('c_nik'));
        $input['c_section_id'] = ltrim($section[1], '0');
        // dd($input);exit;
        $data = Pegawai::create($input);
        return response()->json(['status'=>1]);
    }

    public function editPegawai($id){
        $data = DB::table('m_pegawai')->where('c_id', $id)->first();
        // dd($data);
        return view('master.datapegawai.edit_pegawai',['data' => $data]);
    }
    public function updatePegawai(Request $request, $id){
        $input = $request->except('_token', '_method');
        $data = Pegawai::where('c_id', $id)->update($input);
        // dd($data);
        return redirect('master/datapegawai/pegawai');
    }
    public function deletePegawai($id){
        $data = DB::table('m_pegawai')->where('c_id', $id)->delete();

        return redirect('master/datapegawai/pegawai');
    }
    public function importPegawai(){
		if(Input::hasFile('import_file')){
			$path = Input::file('import_file')->getRealPath();
			$data = Excel::load($path, function($reader) {
			})->get();
			if(!empty($data) && $data->count()){
				foreach ($data as $key => $value) {
					$insert[] = [
                        'c_code' => $value->c_code,
                        'c_nik' => $value->c_nik,
                        'c_name' => $value->c_name,
                        'c_year' => $value->c_year,
                        'c_section_id' => $value->c_section_id
                    ];
				}
				if(!empty($insert)){
					DB::table('m_pegawai')->insert($insert);
					dd('Insert Record successfully.');
				}
			}
		}
		return back();
    }
    public function getFile(){
        $file_path = storage_path('file/pegawai.xls');
        return Response::download($file_path);
    }
}
