<?php
/**
 * Created by PhpStorm.
 * User: Lourence
 * Date: 12/7/2016
 * Time: 8:46 AM
 */

namespace App\Http\Controllers;


use App\DtrDetails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class PersonalController extends Controller
{
    public function __construct()
    {
        $this->middleware('personal');
    }
    public function index(){
        return view('personal.index');
    }
    public function attendance(Request $request){
        $userid = $request->user()->userid;
        $dtr = DtrDetails::where('userid',$userid)
                        ->orderBy('datein','ASC')
                        ->orderBy('time','ASC')
                        ->paginate(20);
        return view('personal.attendance')->with('dtr',$dtr);
    }
    public function filter(Request $request) {
        $_from = explode('/', $request->input('from'));
        $_to = explode('/', $request->input('to'));
        if(count($_from) > 0 and count($_to) > 0){
            $filter = DB::table('dtr_file')
                ->where('date_y','>=', $_from[2])
                ->where('date_y', '<=', $_to[2])
                ->where('date_m', '>=', $_from[0])
                ->where('date_m', '<=', $_to[0])
                ->where('date_d', '>=', $_from[1])
                ->where('date_d', '<=', $_to[1])
                ->where('userid','=', $request->user()->id)
                ->orderBy('date_d', 'ASC')
                ->get();
            return $filter;
        }
        return view('personal.attendance');
    }
}