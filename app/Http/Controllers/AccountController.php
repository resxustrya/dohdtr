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

class AccountController extends Controller
{
    public function index(Request $request) {
        if(Auth::attempt(array(
            'username' => $request->input('username'),
            'password' => $request->input('password')
        ))) {
            return redirect()->intended('dashboard');
        }
        return redirect('/')->with('error','Login Failed');
    }
    public function logout() {
        Session::flush();
        return redirect('/');
    }
}