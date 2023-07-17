<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public  function  index(){
        $users=User::all();
        return view('admin.users',compact('users'));
    }
    public function destroy($id){
        $user=User::findorfail($id);
        $user->delete();
        return redirect()->back();
    }
}
