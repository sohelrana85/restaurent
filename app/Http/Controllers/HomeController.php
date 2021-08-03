<?php

namespace App\Http\Controllers;

use App\Models\Chefs;
use App\Models\Food;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $foods = Food::where('status',1)->get();
        $chefs = Chefs::where('status','active')->get();
        return view('frontend.home',compact('foods','chefs'));
    }


    public function redirect_user()
    {
        if(auth()->user()->user_type == 1){
            return redirect()->route('dashboard');
        } else{
            return redirect()->route('home');
        }
    }
}
