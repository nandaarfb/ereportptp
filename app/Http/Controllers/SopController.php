<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sop;

class SopController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
        // $this->middleware('auth');
    // }s

    public function index(){
        // dd($data);
        $data = Sop::get();
        
        return view('sop.sop', compact('data'));
    }

    public function add_post(Request $request){
        $file = $request->file('file');
        $ext = $file->getClientOriginalExtension();
        $nama_file = time()."_".$file->getClientOriginalName();
        $tujuan_upload = 'sop';
        $file->move($tujuan_upload, $nama_file);
        $simpan = new Sop();
        $simpan->ORGANIZATION_STRUCTURE_ID = $request->organisasi_id;
        $simpan->FILE_NAME = $nama_file;
        $simpan->FILE_LOCATION = $tujuan_upload;
        $simpan->FILE_TYPE = $ext;
        $simpan->save();

        return redirect('sop_index');
    }

    public function download($id){
        return response()->download(public_path('sop/'.$id));
    }

    public function master_menu(Request $request)
    {
        $now            = Carbon::now();
        // dd($indicator_list);
        
        return view('master.master', [
                        'now'                   => $now,
        ]);
    }

    public function sop_list(Request $request)
    {
        //
    }

}
