<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;

class ShoppingController extends Controller
{
    //

    public function getProducuts(Request $request){
       
        $producuts = DB::table('producuts')->get();

        return view('shopping',['users'=>$producuts]);

    }


    public function ProductWithUserINFO($id){
      
        $users = DB::select('select * from producuts where id = ?',[$id]);
       
        return view('pinfo',['users'=>$users]);
              

    }


    public function test(){


        return view ('instamojo');
    }
}
