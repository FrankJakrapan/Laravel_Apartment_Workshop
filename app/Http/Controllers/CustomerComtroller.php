<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CustomerComtroller extends Controller
{
    public function index(){
        return view('customer');
    }
}