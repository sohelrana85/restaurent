<?php

namespace App\Http\Controllers;

use App\Models\Food;
use App\Models\Order;
use App\Models\OrderDelivery;
use App\Models\OrderDetails;
use App\Models\PaymentMethod;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    public function add_to_cart($id)
    {
        if(Auth::check()){
            $userID = Auth::id();
            $food = Food::find($id);

           \Cart::session($userID)->add(array(
                'id'         => $food->id,
                'name'       => $food->title,
                'price'      => $food->price,
                'quantity'   => 1,
                'attributes' => array(
                    'image' => $food->image
                ),
            ));


            $item = \Cart::getContent(); //get all food item
            // $item = \Cart::get($food->id); //get current food item

            return response()->json([
                'status'  => 'success',
                'message' => 'Food Added in Cart Successfully',
                'item'    => $item,
            ]);

        } else {
            return response()->json([
                'status'  => 'error',
                'message' => 'Login Required to Add an Item',
            ]);
        }
    }

    public function load_cart_item()
    {
        $userId = Auth::id();
        $cartItemCount = \Cart::session($userId)->getContent()->count();

        return view('frontend.reload.reload-cart-item', compact('cartItemCount'));
    }


    public function show_cart()
    {
        $userId = Auth::id();
        // $cartItemCount = \Cart::session($userId)->getContent()->count();
         $cartItemCount = \Cart::session($userId)->getContent()->sort();

        $foods = Food::where('status',1)->get();
        if($cartItemCount->count() == 0){
            return redirect()->back();
        } else{
            return view('frontend.pages.show-cart', compact('cartItemCount','foods'));
        }
    }


    public function update_qty(Request $request)
    {
        // return $request->all();
        $id = $request->id;
        $qty = $request->quantity;

        if($qty>0){
            $userId = auth()->user()->id; // or any string represents user identifier
            \Cart::session($userId)->update($id, array(
                'quantity' => array(
                    'relative' => false,
                    'value' => $qty
                ),
            ));
        }

        return redirect()->back();
    }


    public function remove_item($id)
    {
        $userId = auth()->user()->id; // or any string represents user identifier
        \Cart:: session($userId)->remove($id);

        return redirect()->back();
    }

    public function process_order()
    {
        $userId    = auth()->user()->id;                             // or any string represents user identifier
        $cartItems = \Cart::session($userId)->getContent()->sort();

        return view('frontend.pages.process-order', compact('cartItems'));
    }

    public function confirm_order(Request $request)
    {
        $request->validate([
            'name'           => 'required|string|min:4',
            'phone'          => 'required|digits:11',
            'address'        => 'required|string',
            'payment_method' => 'required|string'
        ]);

        $userId    = auth()->user()->id;                     // or any string represents user identifier
        $cartItems = \Cart::session($userId)->getContent();

        DB::beginTransaction();
        try {
            $order = Order::create([
                'order_no'         => date('YmdHis').Auth::id(),
                'user_id'          => Auth::id(),
                'name'             => $request->name,
                'phone'            => $request->phone,
                'shipping_address' => $request->address,
                'sub_total'        => (\Cart::getSubTotal()+(\Cart::getSubTotal()*.15))+60,
            ]);

            foreach ($cartItems as $item) {
                OrderDetails::create([
                    'order_id'  => $order->id,
                    'food_id'   => $item->id,
                    'food_name' => $item->name,
                    'price'     => $item->price,
                    'quantity'  => $item->quantity,
                ]);
            }

            PaymentMethod::create([
                'order_id'       => $order->id,
                'payment_method' => $request->payment_method,
            ]);

            OrderDelivery::create([
                'user_id'        => Auth::id(),
                'order_id'       => $order->id,
                'delivery_status' => 'Pending',
            ]);

            \Cart::session($userId)->clear();

            DB::commit();
            return redirect()->route('confirm.message');
        } catch (Exception $e) {
            DB::rollBack();
            return redirect()->back();
        }
    }

    public function confirm_message()
    {
        $userId    = auth()->user()->id;                     // or any string represents user identifier
        $cartItems = \Cart::session($userId)->getContent();

        return view('frontend.pages.confirm-message',compact('cartItems'));
    }
}
