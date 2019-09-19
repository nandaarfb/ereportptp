<?php

namespace App\Http\Controllers;
use App\Models\Indicator;
use App\Models\Indicator_Target;
use App\Models\Sub_Indicator;
use App\Models\Period;
use App\Models\Sub_Division;
use App\Models\Report;

use Illuminate\Http\Request;

class ReportController extends Controller
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

    public function report_list(Request $request)
    {
        //
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
}
