<?php

namespace App\Http\Controllers;

use App\Models\Indicator;
use App\Models\Indicator_Target;
use App\Models\Sub_Indicator;
use App\Models\Period;
use App\Models\Sub_Division;
use App\Models\Master_Sarmut;

use Illuminate\Http\Request;
use Carbon\Carbon;

class SarmutController extends Controller
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
    
    public function sarmut_list(Request $request)
    {
        // $indicator_list = array();
        $items = \DB::table('tm_sasaran_mutu as t')
                    ->leftJoin('tx_organization_structure as o', 'o.ORGANIZATION_STRUCTURE_ID', '=' , 't.ORGANIZATION_STRUCTURE_ID')
                    ->leftJoin('tm_period as p', 'p.PERIOD_ID', '=' , 't.PERIOD_ID')
                    ->leftJoin('tm_sub_division as sd', 'sd.SUB_DIVISION_ID', '=' , 'o.SUB_DIVISION_ID')
                    ->leftJoin('tm_division as d', 'd.DIVISION_ID', '=' , 'sd.DIVISION_ID')
                    ->leftJoin('tm_branch_office as c', 'c.BRANCH_OFFICE_ID', '=' , 'd.BRANCH_OFFICE_ID')
                    ->leftJoin('tm_indicator as i', 'i.INDICATOR_ID', '=' , 't.INDICATOR_ID')
                    ->select('t.SASARAN_MUTU_ID as SASARAN_MUTU_ID', 'i.INDICATOR_NAME as INDICATOR_NAME', 'c.BRANCH_OFFICE_NAME as BRANCH_OFFICE_NAME', 'd.DIVISION_NAME as DIVISION_NAME', 'sd.SUB_DIVISION_NAME as SUB_DIVISION_NAME', 'p.PERIOD_NAME as PERIOD_NAME', 't.YEAR as YEAR', 't.ACTIVE as ACTIVE');
        $sarmut_list = $items->get();
        $now            = Carbon::now();
        // dd($indicator_list);
        
        return view('sarmut.tabel_sarmut', [
                        'now'                   => $now,
                        'sarmut_list'        => $sarmut_list,
        ]);
    }
    
    public function txsarmut_list(Request $request)
    {
        // $indicator_list = array();
        $items = \DB::table('tm_sasaran_mutu as t')
                    ->leftJoin('tx_organization_structure as o', 'o.ORGANIZATION_STRUCTURE_ID', '=' , 't.ORGANIZATION_STRUCTURE_ID')
                    ->leftJoin('tm_period as p', 'p.PERIOD_ID', '=' , 't.PERIOD_ID')
                    ->leftJoin('tm_sub_division as sd', 'sd.SUB_DIVISION_ID', '=' , 'o.SUB_DIVISION_ID')
                    ->leftJoin('tm_division as d', 'd.DIVISION_ID', '=' , 'sd.DIVISION_ID')
                    ->leftJoin('tm_branch_office as c', 'c.BRANCH_OFFICE_ID', '=' , 'd.BRANCH_OFFICE_ID')
                    ->leftJoin('tm_indicator as i', 'i.INDICATOR_ID', '=' , 't.INDICATOR_ID')
                    ->select('t.SASARAN_MUTU_ID as SASARAN_MUTU_ID', 'i.INDICATOR_NAME as INDICATOR_NAME', 'c.BRANCH_OFFICE_NAME as BRANCH_OFFICE_NAME', 'd.DIVISION_NAME as DIVISION_NAME', 'sd.SUB_DIVISION_NAME as SUB_DIVISION_NAME', 'p.PERIOD_NAME as PERIOD_NAME', 't.YEAR as YEAR', 't.ACTIVE as ACTIVE');
        $sarmut_list = $items->get();
        $now            = Carbon::now();
        // dd($indicator_list);
        
        return view('sarmut.tabel_txsarmut', [
                        'now'                   => $now,
                        'txsarmut_list'        => $sarmut_list,
        ]);
    }
    
    public function form_sarmut(Request $request)
    {
        $items = \DB::table('tx_organization_structure as o')
                    ->leftJoin('tm_sub_division as sd', 'sd.SUB_DIVISION_ID', '=' , 'o.SUB_DIVISION_ID')
                    ->leftJoin('tm_division as d', 'd.DIVISION_ID', '=' , 'sd.DIVISION_ID')
                    ->leftJoin('tm_branch_office as c', 'c.BRANCH_OFFICE_ID', '=' , 'd.BRANCH_OFFICE_ID')
                    ->select('o.ORGANIZATION_STRUCTURE_ID as ORGANIZATION_STRUCTURE_ID', 'c.BRANCH_OFFICE_NAME as BRANCH_OFFICE_NAME', 'd.DIVISION_NAME as DIVISION_NAME', 'sd.SUB_DIVISION_NAME as SUB_DIVISION_NAME');
        $organize_struct_list1 = $items->get();
        $organize_struct_list = $organize_struct_list1->toArray();
        $itemscabang = \DB::table('tm_branch_office')
                        ->SELECT('BRANCH_OFFICE_ID','BRANCH_OFFICE_NAME')
                        ->get();
        $cabanglist = $itemscabang->toArray();
        $period_list         = Period::all()->toArray();
        $indicator_list   = Indicator::all()->toArray();
        $years = array_combine(range(date("Y"), 1960), range(date("Y"), 1960));
        $period         = '';
        $indicator  = '';
        $year  = '';
        $organize_struct  = '';
        $now            = Carbon::now();
        
        return view('sarmut.form', [
                        'now'                   => $now,
                        'period'                => $period,
                        'period_list'                => $period_list,
                        'indicator_list'     => $indicator_list,
                        'indicator'          => $indicator,
                        'organize_struct_list'     => $organize_struct_list,
                        'cabanglist'     => $cabanglist,
                        'organize_struct'          => $organize_struct,
                        'years'          => $years,
                        'year'          => $year,
        ]);
    }

    public function form_edit_mstsarmut(Request $request)
    {
        // dd($request->id);
        $itemselects = Master_Sarmut::where('SASARAN_MUTU_ID', $request->id)->first();
        // dd($itemselects->INDICATOR_ID);
        $id = $request->id;
        $selectedyear = $itemselects->YEAR;
        $selectedos = $itemselects->ORGANIZATION_STRUCTURE_ID;
        $selectedperiod = $itemselects->PERIOD_ID;
        $selectedindicator = $itemselects->INDICATOR_ID;
        $items = \DB::table('tx_organization_structure as o')
                    ->leftJoin('tm_sub_division as sd', 'sd.SUB_DIVISION_ID', '=' , 'o.SUB_DIVISION_ID')
                    ->leftJoin('tm_division as d', 'd.DIVISION_ID', '=' , 'sd.DIVISION_ID')
                    ->leftJoin('tm_branch_office as c', 'c.BRANCH_OFFICE_ID', '=' , 'd.BRANCH_OFFICE_ID')
                    ->select('o.ORGANIZATION_STRUCTURE_ID as ORGANIZATION_STRUCTURE_ID', 'c.BRANCH_OFFICE_NAME as BRANCH_OFFICE_NAME', 'd.DIVISION_NAME as DIVISION_NAME', 'sd.SUB_DIVISION_NAME as SUB_DIVISION_NAME');
        $organize_struct_list1 = $items->get();
        $organize_struct_list = $organize_struct_list1->toArray();
        $period_list         = Period::all()->toArray();
        $indicator_list   = Indicator::all()->toArray();
        $years = array_combine(range(date("Y"), 1960), range(date("Y"), 1960));
        $period         = '';
        $indicator  = '';
        $year  = '';
        $organize_struct  = '';
        $now            = Carbon::now();
        
        return view('sarmut.formedit', [
                        'now'                   => $now,
                        'id'                => $id,
                        'period'                => $period,
                        'period_list'                => $period_list,
                        'indicator_list'     => $indicator_list,
                        'indicator'          => $indicator,
                        'organize_struct_list'     => $organize_struct_list,
                        'organize_struct'          => $organize_struct,
                        'years'          => $years,
                        'year'          => $year,
                        'selectedyear'  => $selectedyear,
                        'selectedos'  => $selectedos,
                        'selectedperiod'  => $selectedperiod,
                        'selectedindicator'  => $selectedindicator,
        ]);
    }

    public function save_mst_sarmut(Request $request)
    {
        $year    = $request->years[0];
        $organize_struct          = $request->organize_struct_list[0];
        $indicator     = $request->indicator_list[0];
        $period            = $request->period_list[0];

        $item = new Master_Sarmut;
        // if($is_sarmut == null){
        //     $item->IS_SASARAN_MUTU = $is_sarmut;
        // }
        // if($is_kpi == null){
        //     $item->IS_KPI = $is_kpi;
        // }
        // if($is_tkp == null){
        //     $item->IS_TINGKAT_KESEHATAN_PERUSAHAAN = $is_tkp;
        // }
        $item->INDICATOR_ID = $indicator;
        $item->ORGANIZATION_STRUCTURE_ID = $organize_struct;
        $item->PERIOD_ID = $period;
        $item->YEAR = $year;
        $item->save();

        return redirect('/sarmut');
    }

    public function edit_mst_sarmut(Request $request)
    {
        $year    = $request->years[0];
        $organize_struct          = $request->organize_struct_list[0];
        $indicator     = $request->indicator_list[0];
        $period            = $request->period_list[0];

        $item = Master_Sarmut::where('SASARAN_MUTU_ID', $request->id)->first();
        // if($is_sarmut == null){
        //     $item->IS_SASARAN_MUTU = $is_sarmut;
        // }
        // if($is_kpi == null){
        //     $item->IS_KPI = $is_kpi;
        // }
        // if($is_tkp == null){
        //     $item->IS_TINGKAT_KESEHATAN_PERUSAHAAN = $is_tkp;
        // }
        $item->INDICATOR_ID = $indicator;
        $item->ORGANIZATION_STRUCTURE_ID = $organize_struct;
        $item->PERIOD_ID = $period;
        $item->YEAR = $year;
        $item->save();

        return redirect('/sarmut');
    }

    public function delete_mst_sarmut(Request $request)
    {
        Master_Sarmut::where('SASARAN_MUTU_ID',$request->id)->delete();

        return redirect('/sarmut');
    }
}
