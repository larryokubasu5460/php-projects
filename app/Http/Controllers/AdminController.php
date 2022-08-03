<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\User;
use \App\Models\Food;
use \App\Models\Reservation;
use \App\Models\Chefs;

class AdminController extends Controller
{
    //

    public function user(){
        $data = User::all();
        return view("admin.user", compact("data"));
    }

    public function deleteuser($id){
        $data=User::find($id);
        $data->delete();
        return redirect()->back();
    }

    public function foodmenu()
    {
        $data = Food::all();
        return view('admin.foodmenu', compact("data"));
    }

    public function deletefood($id)
    {
        $data = Food::find($id);
        $data->delete();
        return redirect()->back();
    }

    public function reservation(Request $request)
    {
        $data = new Reservation();
        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;
        $data->guest = $request->guest;
        $data->date = $request->date;
        $data->time = $request->time;
        $data->message = $request->message;

        $data->save();

        return redirect()->back();
    }
    
    public function viewreservation(){
        $data = Reservation::all();
        return view("admin.reservations", compact("data"));
    }

    public function uploadchef(Request $request){
        $data = new Chefs();

        $img = $request->image;
        $imgname = time().'.'.$img->getClientOriginalExtension();
        $img->move('chefimages',$imgname);

        $data->image = $imgname;
        $data->name = $request->name;
        $data->specialty = $request->specialty;

        $data->save();

        return redirect()->back();
    }

    public function getChefs(){
        $data = Chefs::all();
        return view("admin.chefs", compact("data"));
    }

    public function deletechef($id)
    {
        $data = Chefs::find($id);
        $data->delete();
        return redirect()->back();
    }
}
