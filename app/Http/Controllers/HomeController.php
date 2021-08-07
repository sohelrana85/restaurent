<?php

namespace App\Http\Controllers;

use App\Models\Chefs;
use App\Models\Food;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        if(Auth::check()){
            $userId = auth()->user()->id; // or any string represents user identifier
            $cartItemCount = \Cart::session($userId)->getContent()->count();
            $foods = Food::where('status',1)->get();
            $chefs = Chefs::where('status','active')->get();
            return view('frontend.home',compact('foods','chefs','cartItemCount'));
        } else {
            $foods = Food::where('status',1)->get();
            $chefs = Chefs::where('status','active')->get();
            return view('frontend.home',compact('foods','chefs'));
        }
    }


    public function redirect_user()
    {
        if(auth()->user()->user_type == 1){
            return redirect()->route('dashboard');
        } else{
            return redirect()->route('home');
        }
    }

    public function login_page()
    {
        $foods = Food::where('status',1)->get();
        return view('frontend.pages.login', compact('foods'));
    }
}
