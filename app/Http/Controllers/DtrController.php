<?php
/**
 * Created by PhpStorm.
 * User: Lourence
 * Date: 12/2/2016
 * Time: 11:37 AM
 */

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\DtrDetails;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
class DtrController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }
    public function upload(Request $request) {
        //GET Request
        if($request->isMethod('get')){
            return view('dashboard.upload');
        }
        //POST Request
        if($request->isMethod('post')){
            if($request->hasFile('dtr_file')){
                $file = $request->file('dtr_file');
                ini_set('max_execution_time', 0);
                $dtr = file_get_contents($file);
                $data = explode(PHP_EOL,$dtr);
                for($i = 1; $i < count($data); $i++) {
                    try{
                        $employee = explode(',', $data[$i]);
                        $details = new DtrDetails();
                        $details->userid = array_key_exists(0, $employee) == true ? trim($employee[0], "\" ") : null;
                        $details->firstname = array_key_exists(1, $employee) == true ? trim($employee[1], "\" ") : null;
                        $details->lastname = array_key_exists(2, $employee) == true ? trim($employee[2], "\" ") : null;
                        $details->department = array_key_exists(3, $employee) == true ? trim($employee[3], "\" ") : null;

                        $details->datein = array_key_exists(4, $employee) == true ? trim($employee[4], "\" ") : null;

                        if(array_key_exists(4, $employee) == true){
                            $date = explode('/', $employee[4]);
                            $details->date_y = trim($date[0], "\" ");
                            $details->date_m = trim($date[1], "\" ");
                            $details->date_d = trim($date[2], "\" ");
                        }
                        $details->time = array_key_exists(5, $employee) == true ? trim($employee[5], "\" ") : null;

                        if(array_key_exists(5,$employee) == true){
                            $time = explode(':', $employee[5]);
                            $details->time_h = trim($time[0], "\" ");
                            $details->time_m = trim($time[1], "\" ");
                            $details->time_s = trim($time[2], "\" ");
                        }
                        $details->event = array_key_exists(6, $employee) == true ? trim($employee[6], "\" ") : null;
                        $details->terminal = array_key_exists(7, $employee) == true ? trim($employee[7], "\" ") : null;
                        $details->remark = array_key_exists(8, $employee) == true ? trim($employee[8], "\" ") : null;
                        $details->save();
                        /* FOR INSERTING DATA TO THE USERS TABLE ONLY. IF THE USERS TABLE HAS NO DATA, JUST UNCOMMENT THIS COMMENT.
                        $user = User::where('userid',$details->userid)->first();
                        if( !isset($user) and !count($user) > 0){
                            $user = new User();
                            $user->fname = $details->firstname;
                            $user->lname = $details->lastname;
                            $user->userid = $details->userid;
                            $user->username = $details->userid;
                            $user->password = Hash::make($details->userid);
                            $user->usertype = 0;
                            $user->save();
                        }
                        */
                    } catch (Exception $ex) {
                        return json_encode(array('status' => $ex->getMessage() . "At line :" .$ex->getLine()));
                        break;
                    }
                }
                return redirect('list');
            }
        }
    }
    public function dtr_list(Request $request){
        $lists = DB::table('dtr_file')
            ->where('userid','<>', NULL)
            ->orderBy('lastname', 'ASC')
            ->groupBy('userid')
            ->paginate(30);
        return view('dashboard.dtrlist')->with('lists',$lists);
    }
    public function search(Request $request){
        $search = null;
        ini_set('max_execution_time',1000);
        if($request->has('search')){
            Session::put('search', $request->input('search'));
            $search = Input::get('search');
        }
        if(Session::has('search')){
            $search = Session::get('search');
        }
        $dtr = DtrDetails::where('firstname', 'LIKE', '%'. $search .'%')
            ->orWhere('lastname', 'LIKE', '%'. $search . '%')
            ->orWhere('userid', '=', $search)
            ->orWhere('firstname', 'LIKE', '%' . $search . '%')
            ->orderBy('firstname','ASC')
            ->orderby('lastname', 'ASC')
            ->groupBy('userid')
            ->paginate(20);

        return view('dashboard.dtrlist')->with('lists', $dtr);
    }
}