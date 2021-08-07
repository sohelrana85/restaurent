<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::with('order_details','pay_status','delivery_status')->get();

        return view('admin.pages.order.manage-order', compact('orders'));
    }

    public function edit($id)
    {
        return $id;
    }

}
