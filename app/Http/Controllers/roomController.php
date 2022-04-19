<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\User;
use Illuminate\Http\Request;

class roomController extends Controller
{
    public function index(){


        $rooms = Room::get();
       
        
        return view('layout.list',[

          "room" => $rooms,
     
        ]);
    }


 
}
