<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Droploc;
    

class DroplocController extends Controller
{
    public function index(){

        return Droploc::all();
    }

    public function store(Request $request){

        $droploc = new Droploc();
        $droploc->name = $request->input('name');
        $droploc->address = $request->input('address');
        $droploc->city = $request->input('city');
        $droploc->state = $request->input('state');
        $droploc->hours = $request->input('hours');
        $droploc->latitude = $request->input('latitude',8,6);
        $droploc->longitude = $request->input('longitude',9,6);

        $droploc->save();

        return response()->json($droploc);



    }
}
