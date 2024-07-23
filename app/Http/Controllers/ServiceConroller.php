<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ServiceConroller extends Controller
{
    public function index(){
        return view('User.Service.Service');
    }
}
