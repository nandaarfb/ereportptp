<?php

namespace App\Http\Controllers;

use App\Models\Indicator;
use App\Models\Indicator_Target;
use App\Models\Sub_Indicator;
use App\Models\Period;
use App\Models\Sub_Division;
use App\Models\Organisasi;
use App\Models\User;
use Illuminate\Http\Request;
use Carbon\Carbon;

class MasterController extends Controller
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
    
    public function indicator_list(Request $request)
    {
        // $indicator_list = array();
        $items = \DB::table('tm_indicator as t')
                    ->leftJoin('tm_sub_division as d', 'd.SUB_DIVISION_ID', '=' , 't.SUB_DIVISION_ID')
                    ->leftJoin('tm_period as p', 'p.PERIOD_ID', '=' , 't.PERIOD_ID')
                    ->select('d.SUB_DIVISION_NAME as SUB_DIVISION_NAME', 'p.PERIOD_NAME as PERIOD_NAME', 't.INDICATOR_NAME as INDICATOR_NAME', 't.FORMULA as FORMULA', 't.UNIT as UNIT');
        $indicator_list = $items->get();
        $now            = Carbon::now();
        // dd($indicator_list);
        
        return view('master.indicator.indicator_list', [
                        'now'                   => $now,
                        'indicator_list'        => $indicator_list,
        ]);
    }

    public function indicator_target_list(Request $request)
    {
        // $indicator_list = array();
        $items = \DB::table('tm_indicator_target as t')
                    ->leftJoin('tm_indicator as i', 'i.INDICATOR_ID', '=' , 't.INDICATOR_ID')
                    ->select('i.INDICATOR_NAME as INDICATOR_NAME', 't.INDICATOR_YEAR as INDICATOR_YEAR', 't.WEIGHT_UNIT as WEIGHT_UNIT', 't.WEIGHT as WEIGHT', 't.TARGET as TARGET', 't.TARGET_UNIT as TARGET_UNIT');
        $indicator_target_list = $items->get();
        $now            = Carbon::now();
        // dd($indicator_list);
        
        return view('master.indicator_target.indicator_target_list', [
                        'now'                   => $now,
                        'indicator_target_list'        => $indicator_target_list,
        ]);
    }

    public function sub_indicator_list(Request $request)
    {
        // $indicator_list = array();
        $sub_indicator_list = Sub_Indicator::all()->toArray();
        $now            = Carbon::now();
        // dd($sub_indicator_list);
        
        return view('master.sub_indicator.sub_indicator_list', [
                        'now'                   => $now,
                        'sub_indicator_list'        => $sub_indicator_list,
        ]);
    }
    
    public function organization_structure_list(Request $request)
    {
        $items = \DB::table('tx_organization_structure as os')
                    ->leftJoin('tm_branch_office as b', 'b.BRANCH_OFFICE_ID', '=' , 'os.BRANCH_OFFICE_ID')
                    ->leftJoin('tm_division as d', 'd.DIVISION_ID', '=' , 'os.DIVISION_ID')
                    ->leftJoin('tm_sub_division as sd', 'sd.SUB_DIVISION_ID', '=' , 'os.SUB_DIVISION_ID')
                    ->select('os.ORGANIZATION_STRUCTURE_ID', 'b.BRANCH_OFFICE_NAME', 
                             'os.DIVISION_ID', 'd.DIVISION_NAME',
                             'os.SUB_DIVISION_ID', 'sd.SUB_DIVISION_NAME', 
                             'os.ACTIVE');
        $organisasi_list = $items->get();
        $now            = Carbon::now();
        
        return view('master.organization_structure.organization_structure_list', [
                        'now'                   => $now,
                        'organization_structure_list'        => $organisasi_list,
        ]);
    }

    public function master_user_list(Request $request)
    {
        /// $indicator_list = array();
        $master_user_list = User::all()->toArray();
        $now            = Carbon::now();
        // dd($master_user_list);
        
        return view('master.master_user.master_user_list', [
                        'now'                   => $now,
                        'master_user_list'        => $master_user_list,
        ]);
    }

    public function form_indicator(Request $request)
    {
        $period_list         = Period::all()->toArray();
        $sub_division_list   = Sub_Division::all()->toArray();
        $sub_division   = '';
        $period         = '';
        $now            = Carbon::now();
        
        return view('master.indicator.form', [
                        'now'                   => $now,
                        'period'                => $period,
                        'period_list'                => $period_list,
                        'sub_division_list'     => $sub_division_list,
                        'sub_division'          => $sub_division,
        ]);
    }

    public function form_sub_indicator(Request $request)
    {
        $now            = Carbon::now();
        
        return view('master.sub_indicator.form', [
                        'now'                   => $now,
        ]);
    }

    public function form_indicator_target(Request $request)
    {
        $indicator_list      = Indicator::all()->toArray();
        $now            = Carbon::now();
        $indicator = '';
        // dd($indicator);
        
        return view('master.indicator_target.form', [
                        'now'                   => $now,
                        'indicator'             => $indicator,
                        'indicator_list'             => $indicator_list,
        ]);
    }

    public function form_organization_structure(Request $request)
    {
        $items = \DB::table('tx_organization_structure as os')
        ->leftJoin('tm_branch_office as b', 'b.BRANCH_OFFICE_ID', '=' , 'os.BRANCH_OFFICE_ID')
        ->select('os.ORGANIZATION_STRUCTURE_ID', 'b.BRANCH_OFFICE_NAME');
        $organisasi_list = $items->get();
        $now            = Carbon::now();
        $organisasi     = '';
        //  dd($organisasi_list);
        
        return view('master.organization_structure.form', [
                        'now'                   => $now,
                        'organisasi'            => $organisasi,
                        'organization_structure'             => $organisasi_list,
        ]);
    }

    public function form_master_user(Request $request)
    {
        $master_user_list      = User::all()->toArray();
        $now            = Carbon::now();
        $user = '';
        // dd($organisasi;
        
        return view('master.master_user.form', [
                        'now'                   => $now,
                        'user'             => $user,
                        'master_user_list'        => $master_user_list,
        ]);
    }

    public function save_indicator(Request $request)
    {
        $user_id            = Auth::user()->id;
        $sub_division_id    = $request->sub_division_id;
        $period_id          = $request->period_id;
        $indicator_name     = $request->indicator_name;
        $formula            = $request->formula;
        $unit               = $request->unit;
        $is_sarmut          = $request->is_sarmut;
        $is_kpi             = $request->is_kpi;
        $is_tkp             = $request->is_tkp;

        $item = new Indicator;
        if($is_sarmut == null){
            $item->IS_SASARAN_MUTU = $is_sarmut;
        }
        if($is_kpi == null){
            $item->IS_KPI = $is_kpi;
        }
        if($is_tkp == null){
            $item->IS_TINGKAT_KESEHATAN_PERUSAHAAN = $is_tkp;
        }
        $item->INDICATOR_NAME = $indicator_name;
        $item->SUB_DIVISION_ID = $sub_division_id;
        $item->PERIOD_ID = $period_id;
        $item->FORMULA = $formula;
        $item->UNIT = $unit;
        $item->save();

        return redirect('/master/indicator_list');
    }


    public function delete_indicator(Request $request)
    {
        // $user_id            = Auth::user()->id;
        $indicator_id       = $request->indicator_id;
        $sub_indicator_id   = $request->sub_indicator_id;
        self::delete_sub_indicator($sub_indicator_id);

        Indicator::where('INDICATOR_ID',$indicator_id)->delete();

        return redirect('/master/indicator_target_list');
    }

    public function save_sub_indicator(Request $request)
    {
        $sub_indicator_name     = $request->sub_indicator_name;
        $sub_unit               = $request->sub_unit;
        $indicator_id              = $request->indicator_id;

        $item = new Sub_Indicator;
        $item->SUB_INDICATOR_NAME = $sub_indicator_name;
        $item->UNIT = $sub_unit;
        $item->save();

        return redirect('/master/sub_indicator_list');
    }

    public function delete_sub_indicator(Request $request)
    {
        // $user_id            = Auth::user()->id;
        $sub_indicator_id       = $request->sub_indicator_id;

        Sub_Indicator::where('SUB_INDICATOR_ID',$sub_indicator_id)->delete();
    }

    public function save_indicator_target(Request $request)
    {
        // $user_id            = Auth::user()->id;
        $indicator_id       = $request->indicator_id[0];
        $indicator_year     = $request->indicator_year;
        $weight_unit        = $request->weight_unit;
        $weight             = $request->weight;
        $target             = $request->target;
        $target_unit        = $request->target_unit;

        $item = new Indicator_Target;
        $item->INDICATOR_ID = $indicator_id;
        $item->INDICATOR_YEAR = $indicator_year;
        $item->WEIGHT_UNIT = $weight_unit;
        $item->WEIGHT = $weight;
        $item->TARGET = $target;
        $item->TARGET_UNIT = $target_unit;
        $item->save();

        return redirect('/master/indicator_target_list');
    }

    public function delete_indicator_target(Request $request)
    {
        // $user_id            = Auth::user()->id;
        $indicator_target_id       = $request->indicator_target_id;

        Indicator_Target::where('INDICATOR_TARGET_ID',$indicator_target_id)->delete();

        return redirect('/master/indicator_target_list');
    }

    public function save_organization_structure(Request $request)
    {
        // $user_id            = Auth::user()->id;
        $branch_office       = $request->branch_office[0];
        $division            = $request->division;
        $sub_division        = $request->sub_division;
        $active              = $request->active;

        $item = new Organisasi;
        $item->BRANCH_OFFICE_NAME = $branch_office;
        $item->DIVISION_NAME = $division;
        $item->SUB_DIVISION_NAME = $sub_division;
        $item->ACTIVE = $active;
        $item->save();

        return redirect('/master/organization_structure_list');
    }

    public function delete_organization_structure(Request $request)
    {
        //
    }

    public function save_master_user(Request $request)
    {
        // $user_id            = Auth::user()->id;
        $id_jabatan    = $request->id_jabatan;
        $nipp          = $request->nipp;
        $kelas     = $request->kelas;
        $nama            = $request->nama;
        $tipe          = $request->tipe;
        $access             = $request->access;
        $status             = $request->status;
        $tgl_pensiun             = $request->tgl_pensiun;
        // $encpass             = $request->encpass;

        $item = new User;
        $item->ID_JABATAN  = $id_jabatan;
        $item->NIPP = $nipp;
        $item->KELAS = $kelas;
        $item->NAMA = $nama;
        $item->TIPE = $tipe;
        $item->ACCESS = $access;
        $item->STATUS = $active;
        $item->TGL_PENSIUN = $tgl_pensiun;
        // $item->ENCPASS = $encpass;
        $item->save();

        return redirect('/master/master_user');
    }

    public function delete_master_user(Request $request)
    {
        //
    }
}
