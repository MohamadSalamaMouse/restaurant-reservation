<?php

namespace App\Http\Controllers;

use App\Models\Food;
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
    public  function FoodMenu(){
        return view('admin.FoodMenu');
    }
    public function food_store(Request $request){
        $data = [
            'title' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'description' => 'required|string',
            'price' => 'required|numeric',
        ];
        $request->validate($data);
        $food=new Food();
        $food->title=$request->title;
        $food->description=$request->description;
        $food->price=$request->price;
        if($request->file('image')){
            $file=$request->file('image');
            $imageName=date('YmdHi').$file->getClientOriginalName();
            $file->move('foodImage',$imageName);
            $food->image='foodImage/'.$imageName;
        }
        $food->save();
        return redirect()->back()->with('msg','food add successful');
    }
}
