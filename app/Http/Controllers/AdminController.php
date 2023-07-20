<?php

namespace App\Http\Controllers;

use App\Models\Food;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
        $foodData=Food::all();
        return view('admin.FoodMenu',compact('foodData'));
    }
    public function food_store(Request $request){
        $data = [
            'title' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
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

    public function food_destroy($id){
        $food=Food::findorfail($id);
       $title= $food->title;
      if(file_exists($food->image)){
          unlink($food->image);
      }
       $food->delete();
        return redirect()->back()->with('Delete','food '.$title.' delete successful ');
    }
    public function Food_edit($id){
        $food=Food::findorfail($id);
        return view('admin.FoodMenuEdit',compact('food'));
    }
    public function Food_update(Request $request,$id){
        $data = [
            'title' => 'required|string',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'description' => 'required|string',
            'price' => 'required|numeric',
        ];
        $request->validate($data);
        $food=Food::findorfail($id);

       $food->update($request->except('image','_token'));
        if($request->file('image')){
            $file=$request->file('image');
            $imageName=date('YmdHi').$id.$file->getClientOriginalName();
            $file->move('foodImage',$imageName);
            $food->image='foodImage/'.$imageName;
        }
        $food->save();
        return redirect()->back()->with('msg','food edit successful');

    }
}
