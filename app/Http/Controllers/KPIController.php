<?php

namespace App\Http\Controllers;

use App\Models\Indicator;
use App\Models\Indicator_Target;
use App\Models\Sub_Indicator;
use App\Models\Period;
use App\Models\Sub_Division;
use App\Models\Master_KPI;

use Illuminate\Http\Request;
use Carbon\Carbon;

class KPIController extends Controller
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
    
    public function kpi_list(Request $request)
    {
        // $indicator_list = array();
        $items = \DB::table('tm_kpi as t')
                    ->leftJoin('tx_organization_structure as o', 'o.ORGANIZATION_STRUCTURE_ID', '=' , 't.ORGANIZATION_STRUCTURE_ID')
                    ->leftJoin('tm_period as p', 'p.PERIOD_ID', '=' , 't.PERIOD_ID')
                    ->leftJoin('tm_sub_division as sd', 'sd.SUB_DIVISION_ID', '=' , 'o.SUB_DIVISION_ID')
                    ->leftJoin('tm_division as d', 'd.DIVISION_ID', '=' , 'sd.DIVISION_ID')
                    ->leftJoin('tm_branch_office as c', 'c.BRANCH_OFFICE_ID', '=' , 'd.BRANCH_OFFICE_ID')
                    ->leftJoin('tm_indicator as i', 'i.INDICATOR_ID', '=' , 't.INDICATOR_ID')
                    ->select('t.KPI_ID as KPI_ID', 'i.INDICATOR_NAME as INDICATOR_NAME', 'c.BRANCH_OFFICE_NAME as BRANCH_OFFICE_NAME', 'd.DIVISION_NAME as DIVISION_NAME', 'sd.SUB_DIVISION_NAME as SUB_DIVISION_NAME', 'p.PERIOD_NAME as PERIOD_NAME', 't.YEAR as YEAR', 't.ACTIVE as ACTIVE');
        $kpi_list = $items->get();
        $now            = Carbon::now();
        // dd($indicator_list);
        
        return view('kpi.tabel_kpi', [
                        'now'                   => $now,
                        'kpi_list'        => $kpi_list,
        ]);
    }
    
    public function txkpi_list(Request $request)
    {
        // $indicator_list = array();
        $items = \DB::table('tm_kpi as t')
                    ->leftJoin('tx_organization_structure as o', 'o.ORGANIZATION_STRUCTURE_ID', '=' , 't.ORGANIZATION_STRUCTURE_ID')
                    ->leftJoin('tm_period as p', 'p.PERIOD_ID', '=' , 't.PERIOD_ID')
                    ->leftJoin('tm_sub_division as sd', 'sd.SUB_DIVISION_ID', '=' , 'o.SUB_DIVISION_ID')
                    ->leftJoin('tm_division as d', 'd.DIVISION_ID', '=' , 'sd.DIVISION_ID')
                    ->leftJoin('tm_branch_office as c', 'c.BRANCH_OFFICE_ID', '=' , 'd.BRANCH_OFFICE_ID')
                    ->leftJoin('tm_indicator as i', 'i.INDICATOR_ID', '=' , 't.INDICATOR_ID')
                    ->select('t.KPI_ID as KPI_ID', 'i.INDICATOR_NAME as INDICATOR_NAME', 'c.BRANCH_OFFICE_NAME as BRANCH_OFFICE_NAME', 'd.DIVISION_NAME as DIVISION_NAME', 'sd.SUB_DIVISION_NAME as SUB_DIVISION_NAME', 'p.PERIOD_NAME as PERIOD_NAME', 't.YEAR as YEAR', 't.ACTIVE as ACTIVE');
        $kpi_list = $items->get();
        $now            = Carbon::now();
        // dd($indicator_list);
        
        return view('kpi.tabel_txkpi', [
                        'now'                   => $now,
                        'txkpi_list'        => $kpi_list,
        ]);
    }
    
    public function form_kpi(Request $request)
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
        
        return view('kpi.form', [
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

    public function form_edit_mstkpi(Request $request)
    {
        // dd($request->id);
        $itemselects = Master_KPI::where('KPI_ID', $request->id)->first();
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
        
        return view('kpi.formedit', [
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

    public function save_mst_kpi(Request $request)
    {
        $year    = $request->years[0];
        $organize_struct          = $request->organize_struct_list[0];
        $indicator     = $request->indicator_list[0];
        $period            = $request->period_list[0];

        $item = new Master_KPI;
        // if($is_kpi == null){
        //     $item->IS_kpi = $is_kpi;
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

        return redirect('/kpi');
    }

    public function edit_mst_kpi(Request $request)
    {
        $year    = $request->years[0];
        $organize_struct          = $request->organize_struct_list[0];
        $indicator     = $request->indicator_list[0];
        $period            = $request->period_list[0];

        $item = Master_KPI::where('KPI_ID', $request->id)->first();
        // if($is_kpi == null){
        //     $item->IS_kpi = $is_kpi;
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

        return redirect('/kpi');
    }

    public function delete_mst_kpi(Request $request)
    {
        Master_KPI::where('KPI_ID',$request->id)->delete();

        return redirect('/kpi');
    }

    public function form_input_kpi(Request $request)
    {
        $now            = Carbon::now();
        $items = \DB::table('tm_kpi as a')
                    ->leftJoin('tm_indicator as b', 'a.INDICATOR_ID', '=' , 'b.INDICATOR_ID')
                    ->leftJoin('tx_organization_structure as c', 'a.ORGANIZATION_STRUCTURE_ID', '=' , 'c.ORGANIZATION_STRUCTURE_ID')
                    ->leftJoin('tm_division as d', 'c.DIVISION_ID', '=' , 'd.DIVISION_ID')
                    ->leftJoin('tm_indicator_target as e', 'b.INDICATOR_ID', '=' , 'e.INDICATOR_ID')
                    ->select('a.KPI_ID as KPI_ID', 'b.INDICATOR_NAME as INDICATOR_NAME', 'b.UNIT as UNIT', 'e.TARGET as TARGET', 'd.DIVISION_NAME as DIVISION_NAME', 'b.FORMULA as FORMULA')
                    ->where('d.DIVISION_ID', '=', '1');
        $kpi_list1 = $items->get();
        $kpi_list = $kpi_list1->toArray();

        $sub_list = array();
        foreach ($kpi_list1 as $data) {
            $sub_ind = str_split($data->FORMULA, 1);
            // dd($sub_ind);
            $num_split = array();
            foreach ($sub_ind as $split){
                if(is_numeric($split)){
                    array_push($num_split, $split);
                }
            }
            // dd(count($num_split));
            $items1 = \DB::table('tm_sub_indicator as a')
                        ->whereIn('a.SUB_INDICATOR_ID',$num_split);
            $sub_in1 = $items1->get();
            $sub_in = $sub_in1->toArray();
            array_push($sub_list, $sub_in);
            unset($num_split);
        }

        return view('kpi.input_kpi', [
            'now'                   => $now,
            'kpi_list'     => $kpi_list,
            'kpi'          => '',
            'sub_in'     => $sub_list,
        ]);
    }
}
