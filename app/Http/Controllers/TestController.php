<?php
/**
 * Created by PhpStorm.
 * User: Lourence
 * Date: 12/13/2016
 * Time: 10:16 PM
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DtrDetails;
class TestController extends Controller
{
    public function upload(Request $request){
        ini_set('max_execution_time', 0);
        try{
            $line = $request->input('line');
            $employee = explode(',', $line);
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
            return json_encode(array('status' => 'ok'));
        }catch(Exception $ex){
            return json_encode(array('status' => $ex->getMessage()));
        }
        return json_encode(array('status' => 'error'));
    }
}