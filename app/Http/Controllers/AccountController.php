<?php
/**
 * Created by PhpStorm.
 * User: Lourence
 * Date: 11/17/2016
 * Time: 11:04 AM
 */

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;

class AccountController extends Controller
{
    public function index(Request $request) {
        try{
            if(Auth::attempt(array(
                'username' => $request->input('username'),
                'password' => $request->input('password')
            ))) {
                if(Auth::user()->usertype == 1){
                    return redirect('dashboard');
                }
                if(Auth::user()->usertype == 0){
                    return redirect('personal/user');
                }
            }
        }catch(Exception $ex){
            return redirect()->intended();
        }
        return redirect('/')->with('error','Login Failed');
    }
    public function logout() {
        Session::flush();
        return redirect('/');
    }
    
}
