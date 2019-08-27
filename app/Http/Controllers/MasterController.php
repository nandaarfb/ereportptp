<?php

namespace App\Http\Controllers;

use App\Models\Indicator;
use App\Models\Indicator_Target;
use App\Models\Sub_Indicator;
use App\Models\Period;
use App\Models\Sub_Division;

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


    public function get_ajax($action,$id)
    {
        // dd($action);
        if ($action == "division") {
            $divisi = \DB::table('tm_division')
            ->SELECT('DIVISION_ID','DIVISION_NAME')
            ->WHERE('BRANCH_OFFICE_ID', '=', $id)
            ->get();
            return $divisi;
        }elseif ($action == "subdivision") {
            $subdivisi = \DB::table('tm_sub_division')
            ->SELECT('SUB_DIVISION_ID','SUB_DIVISION_NAME')
            ->WHERE('DIVISION_ID', '=', $id)
            ->get();
            
            return $subdivisi;

        }

        
    }

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
                    ->select('t.INDICATOR_ID as INDICATOR_ID', 'd.SUB_DIVISION_NAME as SUB_DIVISION_NAME', 'p.PERIOD_NAME as PERIOD_NAME', 't.INDICATOR_NAME as INDICATOR_NAME', 't.FORMULA as FORMULA', 't.UNIT as UNIT');
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
                    ->select('t.INDICATOR_TARGET_ID as INDICATOR_TARGET_ID', 'i.INDICATOR_NAME as INDICATOR_NAME', 't.INDICATOR_YEAR as INDICATOR_YEAR', 't.WEIGHT_UNIT as WEIGHT_UNIT', 't.WEIGHT as WEIGHT', 't.TARGET as TARGET', 't.TARGET_UNIT as TARGET_UNIT');
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
    
    public function form_indicator(Request $request)
    {
        $period_list         = Period::all()->toArray();
        $sub_division_list   = Sub_Division::all()->toArray();
        $sub_indicator_list  = Sub_Indicator::all()->toArray();
        $sub_division   = '';
        $period         = '';
        $sub_indicator  = '';
        $now            = Carbon::now();
        
        return view('master.indicator.form', [
                        'now'                   => $now,
                        'period'                => $period,
                        'period_list'                => $period_list,
                        'sub_division_list'     => $sub_division_list,
                        'sub_division'          => $sub_division,
                        'sub_indicator_list'     => $sub_indicator_list,
                        'sub_indicator'          => $sub_indicator,
        ]);
    }

    public function form_edit_indicator(Request $request)
    {
        $items = Indicator::where('INDICATOR_ID', $request->id)->first();
        $selectedperiod = $items->PERIOD_ID;
        $selectedsd = $items->SUB_DIVISION_ID;
        $itemsget = \DB::table('tm_indicator as t')
                    ->leftJoin('tm_sub_division as d', 'd.SUB_DIVISION_ID', '=' , 't.SUB_DIVISION_ID')
                    ->leftJoin('tm_period as p', 'p.PERIOD_ID', '=' , 't.PERIOD_ID')
                    ->select('t.INDICATOR_ID as INDICATOR_ID', 'd.SUB_DIVISION_NAME as SUB_DIVISION_NAME', 'p.PERIOD_NAME as PERIOD_NAME', 't.INDICATOR_NAME as INDICATOR_NAME', 't.FORMULA as FORMULA', 't.UNIT as UNIT')
                    ->where('t.INDICATOR_ID', '=', $request->id);
        $indicator = $itemsget->first();
        // dd($indicator);
        $indicator_name = $indicator->INDICATOR_NAME;
        $unit = $indicator->UNIT;
        $formula = $indicator->FORMULA;

        $period_list         = Period::all()->toArray();
        $sub_division_list   = Sub_Division::all()->toArray();
        $sub_indicator_list  = Sub_Indicator::all()->toArray();
        $sub_division   = '';
        $period         = '';
        $sub_indicator  = '';
        $now            = Carbon::now();
        
        return view('master.indicator.formedit', [
                        'id'    => $request->id,
                        'now'                   => $now,
                        'period'                => $period,
                        'period_list'                => $period_list,
                        'sub_division_list'     => $sub_division_list,
                        'sub_division'          => $sub_division,
                        'sub_indicator_list'     => $sub_indicator_list,
                        'sub_indicator'          => $sub_indicator,
                        'selectedperiod'          => $selectedperiod,
                        'selectedsd'          => $selectedsd,
                        'indicator_name'          => $indicator_name,
                        'unit'          => $unit,
                        'formula'          => $formula,
        ]);
    }

    public function form_sub_indicator(Request $request)
    {
        $now            = Carbon::now();
        
        return view('master.sub_indicator.form', [
                        'now'                   => $now,
        ]);
    }

    public function form_edit_sub_indicator(Request $request)
    {
        $items = Sub_Indicator::where('SUB_INDICATOR_ID', $request->id)->first();
        $sub_indicator_name = $items->SUB_INDICATOR_NAME;
        $unit = $items->UNIT;
        $now            = Carbon::now();
        
        return view('master.sub_indicator.formedit', [
                        'id'                    => $request->id,
                        'now'                   => $now,
                        'sub_indicator_name'    => $sub_indicator_name,
                        'unit'                  => $unit,
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

    public function form_edit_indicator_target(Request $request)
    {
        $items = Indicator_Target::where('INDICATOR_TARGET_ID', $request->id)->first();
        $selectedindicator = $items->INDICATOR_ID;
        $indicator_year = $items->INDICATOR_YEAR;
        $weight_unit = $items->WEIGHT_UNIT;
        $weight = $items->WEIGHT;
        $target_unit = $items->TARGET_UNIT;
        $target = $items->TARGET;
        $indicator_list      = Indicator::all()->toArray();
        $now            = Carbon::now();
        $indicator = '';
        // dd($indicator);
        
        return view('master.indicator_target.formedit', [
                        'id'    => $request->id,
                        'now'                   => $now,
                        'indicator'             => $indicator,
                        'indicator_list'             => $indicator_list,
                        'selectedindicator'             => $selectedindicator,
                        'indicator_year'             => $indicator_year,
                        'weight_unit'             => $weight_unit,
                        'weight'             => $weight,
                        'target_unit'             => $target_unit,
                        'target'             => $target,
        ]);
    }
    
    public function save_indicator(Request $request)
    {
        $sub_division_id    = $request->sub_division_list[0];
        $period_id          = $request->period_list[0];
        $indicator_name     = $request->indicator_name;
        $formula            = $request->formula;
        $unit               = $request->unit;
        $is_sarmut          = $request->is_sarmut;
        $is_kpi             = $request->is_kpi;
        $is_tkp             = $request->is_tkp;

        $item = new Indicator;
        
        $item->INDICATOR_NAME = $indicator_name;
        $item->SUB_DIVISION_ID = $sub_division_id;
        $item->PERIOD_ID = $period_id;
        $formula = rtrim(rtrim($formula, '+'), '-');
        $formula = rtrim(rtrim($formula, '*'), '/');
        $item->FORMULA = $formula;
        $item->UNIT = $unit;
        $item->save();

        return redirect('/master/indicator_list');
    }

    public function edit_indicator(Request $request)
    {
        $sub_division_id    = $request->sub_division_list[0];
        $period_id          = $request->period_list[0];
        $indicator_name     = $request->indicator_name;
        $formula            = $request->formula;
        $unit               = $request->unit;
        $is_sarmut          = $request->is_sarmut;
        $is_kpi             = $request->is_kpi;
        $is_tkp             = $request->is_tkp;

        $item = Indicator::where('INDICATOR_ID', $request->id)->first();
        
        $item->INDICATOR_NAME = $indicator_name;
        $item->SUB_DIVISION_ID = $sub_division_id;
        $item->PERIOD_ID = $period_id;
        $formula = rtrim(rtrim($formula, '+'), '-');
        $formula = rtrim(rtrim($formula, '*'), '/');
        $item->FORMULA = $formula;
        $item->UNIT = $unit;
        $item->save();

        return redirect('/master/indicator_list');
    }

    public function delete_indicator(Request $request)
    {
        Indicator::where('INDICATOR_ID',$request->id)->delete();

        return redirect('/master/indicator_list');
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

    public function edit_sub_indicator(Request $request)
    {
        $sub_indicator_name     = $request->sub_indicator_name;
        $sub_unit               = $request->sub_unit;
        $indicator_id              = $request->indicator_id;

        // dd($request->id);
        $item = Sub_Indicator::where('SUB_INDICATOR_ID', '=', $request->id)->first();
        $item->SUB_INDICATOR_NAME = $sub_indicator_name;
        $item->UNIT = $sub_unit;
        $item->save();

        return redirect('/master/sub_indicator_list');
    }

    public function delete_sub_indicator(Request $request)
    {
        Sub_Indicator::where('SUB_INDICATOR_ID',$request->id)->delete();

        return redirect('/master/sub_indicator_list');
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

    public function edit_indicator_target(Request $request)
    {
        // $user_id            = Auth::user()->id;
        $indicator_id       = $request->indicator_id[0];
        $indicator_year     = $request->indicator_year;
        $weight_unit        = $request->weight_unit;
        $weight             = $request->weight;
        $target             = $request->target;
        $target_unit        = $request->target_unit;

        $item = Indicator_Target::where('INDICATOR_TARGET_ID', '=', $request->id)->first();
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
        Indicator_Target::where('INDICATOR_TARGET_ID',$request->id)->delete();

        return redirect('/master/indicator_target_list');
    }
}
