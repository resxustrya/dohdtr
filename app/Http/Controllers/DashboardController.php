<?php
/**
 * Created by PhpStorm.
 * User: Lourence
 * Date: 11/17/2016
 * Time: 11:50 AM
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(Request $request) {
        return view('dashboard.index');
    }
}