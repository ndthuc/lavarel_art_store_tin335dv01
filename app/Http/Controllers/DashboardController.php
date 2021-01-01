<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request){

        return view('dashboard.index');
    }
    public function get_revenue(){

    }
    public function get_new_users(){

    }
    public function load_charts(){

    }
}
