<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class roomController extends Controller
{
    public function index(){
        return view('layout.list');
    }

 
}