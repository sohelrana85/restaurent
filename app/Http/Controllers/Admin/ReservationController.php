<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Reservation;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ReservationController extends Controller
{
    public function index()
    {
        $data = Reservation::all();
        return view('admin.pages.reservation.manage', compact('data'));

    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'name'            => 'required|string|min:3',
            'phone'           => 'required|digits:11',
            'number_of_guest' => 'required|numeric',
            'date'            => 'required|date',
            'time'            => 'required|string',
        ]);

        if($validator->fails()){
            return response()->json(['error'=> $validator->errors()]);
        }

        try {
            Reservation::create([
                'name'            => $request->name,
                'email'           => $request->email,
                'phone'           => $request->phone,
                'number_of_guest' => $request->number_of_guest,
                'date'            => Carbon::parse($request->date)->format('Y-m-d'),
                'time'            => $request->time,
                'description'     => $request->description,
                'status'          => 'pending',
            ]);

            return response()->json([
                'type'=> 'success',
                'message'=> 'You Set a Reservation Successfully'
            ]);


        } catch (Exception $e) {

            return response()->json([
                'type'=> 'error',
                'message'=> $e->getMessage()
            ]);
        }
    }

    public function edit($id)
    {
        $data = Reservation::find($id);
        return view('admin.pages.reservation.reservation-edit', compact('data'));

    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name'            => 'required|string|min:3',
            'phone'           => 'required|digits:11',
            'number_of_guest' => 'required|numeric',
            'date'            => 'required|date',
            'time'            => 'required|string',
            'status'            => 'required|in:pending,confirm,rejected',
        ]);

        try {
            $item = Reservation::find($id);
                $item->name            = $request->name;
                $item->email           = $request->email;
                $item->phone           = $request->phone;
                $item->number_of_guest = $request->number_of_guest;
                $item->date            = Carbon::parse($request->date)->format('Y-m-d');
                $item->time            = $request->time;
                $item->description     = $request->description;
                $item->status          = $request->status;
                $item->update();

            session()->flash('type', 'success');
            session()->flash('message', 'A Reservation Updated Successfully');
            return redirect()->route('reservation.index');

        } catch (Exception $e) {

            session()->flash('type', 'danger');
            session()->flash('message', $e->getMessage());
            // session()->flash('message', 'Reservation Updated Failed');
            return redirect()->back();
        }

    }
}
