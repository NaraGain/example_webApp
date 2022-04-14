<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;

class roomController extends Controller
{
    public function index(){
        return view('layout.list');
    }

 

    public function store(Request $request,$id){

$room = Room::get();
        dd($room);
        return back();
    }
}
