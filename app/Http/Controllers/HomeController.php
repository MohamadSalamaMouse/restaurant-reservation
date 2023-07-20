<?php

namespace App\Http\Controllers;

use App\Models\Food;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public  function index(){
        $foodData=Food::all();
        return view('home',compact('foodData'));
    }
    public function redirects(){
        $usertype = auth()->user()->usertype;

        if($usertype == '1'){
            return view('admin.adminhome');
        }else{
            $foodData=Food::all();
            return view('home',compact('foodData'));

        }
    }
}
