<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function showCases(){
        return view('pages.cases');
    }
    public function showDashboard(){
        return view('pages.dashboard');
    }
    public function showLogin(){
        return view('pages.login');
    }
    public function showReqEdit(){
        return view('pages.requestEdit');
    }
    public function showReqDet(){
        return view('pages.requestDetail');
    }
    public function showMain(){
        return view('pages.main');
    }
}

