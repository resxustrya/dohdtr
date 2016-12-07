<?php
/**
 * Created by PhpStorm.
 * User: Lourence
 * Date: 12/7/2016
 * Time: 8:46 AM
 */

namespace App\Http\Controllers;


class PersonalController extends Controller
{
    public function __construct()
    {
        $this->middleware('personal');
    }
    public function index(){
        return view('personal.index');
    }
}