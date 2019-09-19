<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DokumenController extends Controller
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

    public function master_menu(Request $request)
    {
        $now            = Carbon::now();
        // dd($indicator_list);
        
        return view('master.master', [
                        'now'                   => $now,
        ]);
    }

    public function dokumen_pendukung_list(Request $request)
    {
        //
    }

}
