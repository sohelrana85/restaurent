<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Chefs;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChefsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $chefs = Chefs::all();
        return view('admin.pages.chefs.manage', compact('chefs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.chefs.add-chefs');
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
            'name'       => 'required|string|min:3',
            'speciality' => 'required|string',
            'image'      => 'required|image',
        ]);

        try {
            $extension = $request->image->extension();
            $filename = date('YmdHis.').$extension;

            $data = Chefs::create([
                'user_id'    => Auth::id(),
                'name'       => $request->name,
                'speciality' => $request->speciality,
                'image'      => $filename,
                'status'     => 'inactive',
            ]);
            if($data){
                $request->image->move(public_path('chefs_image/'), $filename);
            }

            session()->flash('type', 'success');
            session()->flash('message', 'The Chefs uploaded successfully');
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
        $chefs = Chefs::find($id);
        return view('admin.pages.chefs.update-chefs',compact('chefs'));
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
            'name'       => 'required|string|min:3',
            'speciality' => 'required|string',
            'status'      => 'required|in:active,inactive',
        ]);

        try {

            $chefs = Chefs::find($id);

            if($request->image && file_exists(public_path('chefs_image/'.$chefs->image))){
                unlink(public_path('chefs_image/'.$chefs->image));

                $extension = $request->image->extension();
                $filename = date('YmdHis.').$extension;
            }


            $chefs->user_id    = Auth::id();
            $chefs->name       = $request->name;
            $chefs->speciality = $request->speciality;
            $chefs->image      = $request->image ? $filename : $chefs->image;
            $chefs->status     = $request->status;
            $chefs->update();

            if($request->image){
                $request->image->move(public_path('chefs_image/'), $filename);
            }

            session()->flash('type', 'success');
            session()->flash('message', 'The Chefs Updated successfully');
            return redirect()->route('chefs.index');

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
        //
    }
}
