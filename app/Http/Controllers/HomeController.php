<?php

namespace App\Http\Controllers;

use App\Models\Food;
use App\Models\Reservation;
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
    public function reservationStore(Request $request){
$request->validate([
    'name' => 'required',
    'email' => 'required',
    'phone' => 'required',
]);

     $reservation =new Reservation();
         $reservation->name=$request->name;
          $reservation-> email=$request->email;
          $reservation-> phone=$request->phone;
           $reservation->message=$request->message;
            $reservation->date=$request->date;
           $reservation->time=$request->time;
          $reservation->NumberOfGuests=$request->NumberOfGuests;
          $reservation->save();
         return redirect()->back()->with('msg','reservation add successful');


    }
}
