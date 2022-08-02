<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\User;
use \App\Models\Food;

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

}
