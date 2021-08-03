<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Food;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FoodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $foods = Food::all();
	            return view('admin.pages.foods.food-list', compact('foods'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.foods.add-food');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|unique:food|min:3',
            'desc'  => 'required|string',
            'price' => 'required|numeric',
            'image' => 'required|image',
            'status' => 'required|in:1,0',
        ]);

        try {
            $extension = $request->image->extension();
            $filename = date('YmdHis.').$extension;

            $data = Food::create([
                'user_id' => Auth::id(),
                'title'   => $request->title,
                'desc'    => $request->desc,
                'price'   => $request->price,
                'image'   => $filename,
                'status'   => $request->status,
            ]);
            if($data){
                $request->image->move(public_path('food_image/'), $filename);
            }

            session()->flash('type', 'success');
            session()->flash('message', 'The food uploaded successfully');
            return redirect()->back();

        } catch (Exception $e) {
            session()->flash('type', 'danger');
            session()->flash('message', $e->getMessage());
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $food = Food::find($id);
        return view('admin.pages.foods.update-food', compact('food'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function status_update($id)
    {
        $food = Food::find($id);

        $food->status = $food->status == 0 ? 1 : 0;
        $food->update();

        return response()->json([
            'message' => 'Published Status Updated'
        ], 200);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|min:3|unique:food,id,' .$id,
            'desc'  => 'required|string',
            'price' => 'required|numeric',
            'image' => 'required|image',
            'status' => 'required|in:1,0',
        ]);

        try {
            $food = Food::find($id);

            if(file_exists(public_path('food_image/'.$food->image))){
                unlink(public_path('food_image/'.$food->image));
            }
            $extension = $request->image->extension();
            $filename = date('YmdHis.').$extension;

            $food->user_id = Auth::id();
            $food->title   = $request->title;
            $food->desc    = $request->desc;
            $food->price   = $request->price;
            $food->image   = $filename;
            $food->status  = $request->status;
            $food->update();

            $request->image->move(public_path('food_image/'), $filename);

            session()->flash('type', 'success');
            session()->flash('message', 'The food Updated successfully');
            return redirect()->route('foods.index');

        } catch (Exception $e) {
            session()->flash('type', 'danger');
            session()->flash('message', $e->getMessage());
            return redirect()->back();
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $food = Food::find($id);
        if($food){
            $food->delete();
            session()->flash('type', 'success');
            session()->flash('message', 'The Food Item Delete successfully');
            return redirect()->back();
        }
    }
}
