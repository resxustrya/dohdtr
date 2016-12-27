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
use Illuminate\Support\Facades\Session;
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
        if($request->has('filter')){
            if($request->has('from') and $request->has('to')){
                $_from = explode('/', $request->input('from'));
                $_to = explode('/', $request->input('to'));
                $f_from = $_from[2].'-'.$_from[0].'-'.$_from[1];
                $f_to = $_to[2].'-'.$_to[0].'-'.$_to[1];
                Session::put('f_from',$f_from);
                Session::put('f_to',$f_to);
                if(count($_from) > 0 and count($_to) > 0){
                    $dtr = DB::table('dtr_file')
                        ->where('datein' ,'>=', $f_from)
                        ->where('datein', '<=', $f_to)
                        ->where('userid', '=', $request->user()->userid)
                        ->paginate(20);
                    if(isset($dtr) and count($dtr) > 0){
                        return view('personal.filter_attendance')->with('dtr',$dtr);
                    }
                }
            } else
                return view('personal.filter_attendance')->with('dtr',null);
        }
        if(Session::has('f_from') and Session::has('f_to')){
            $f_from = Session::get('f_from');
            $f_to = Session::get('f_to');
            if(count($f_from) > 0 and count($f_to) > 0){
                $dtr = DB::table('dtr_file')
                    ->where('datein' ,'>=', $f_from)
                    ->where('datein', '<=', $f_to)
                    ->where('userid', '=', $request->user()->userid)
                    ->paginate(20);
                if(isset($dtr) and count($dtr) > 0){
                    return view('personal.filter_attendance')->with('dtr',$dtr);
                }
            }
        }
    }
}