<?php

namespace App\Http\Controllers;

use App\Models\Ambulance;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class AmbulanceController extends Controller
{
    public function index()
    {
        $ambulances = Ambulance::all();
        return view('ambulance.index', compact('ambulances'));
    }

    public function view($id)
    {
        $ambulance = Ambulance::find($id);
        return view('ambulance.view', compact('ambulance'));
    }
    public function fetch($id)
    {
        $ambulance = Ambulance::find($id);
        return $this->respondWithSuccess("ambulance fetched successfully", $ambulance);
    }


    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'driver_name' => 'required',
            'contact' => 'required',
            'address' => 'required',
            'ambulance_number' => 'required',
        ]);

        if ($validator->fails()) {
            Session::flash('message', $validator->errors()->first());
            Session::flash('class', 'danger');
            return redirect()->back()->withInput();
        }

        try {
            Ambulance::create([
                'driver_name' => $request->driver_name,
                'contact' => $request->contact,
                'address' => $request->address,
                'ambulance_number' => $request->ambulance_number,
            ]);
            Session::flash('message', 'Ambulance Successfully Created');
            Session::flash('class', 'success');
        } catch (\Exception $e) {
            Session::flash('message', $e->getMessage());
            Session::flash('class', 'danger');
        }
        return redirect()->back();
    }

    public function update(Request $request)
    {
        $ambulance = Ambulance::find($request->id);
        $ambulance->driver_name = $request->driver_name;
        $ambulance->contact = $request->contact;
        $ambulance->address = $request->address;
        $ambulance->ambulance_number = $request->ambulance_number;
        $ambulance->save();
        return redirect()->back();
    }

    public function destroy($id)
    {
        try {
            $ambulance = Ambulance::find($id);
            $ambulance->delete();
            Session::flash('message', 'Ambulance successfully deleted');
            Session::flash('class', 'success');
        } catch (\Exception $e) {
            Session::flash('message', $e->getMessage());
            Session::flash('class', 'danger');
        }
        return redirect()->back();
    }
}
