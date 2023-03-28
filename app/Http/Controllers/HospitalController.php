<?php

namespace App\Http\Controllers;

use App\Models\Hospital;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class HospitalController extends Controller
{
    public function index()
    {
        $hospitals = Hospital::all();
        return view('hospital.index', compact('hospitals'));
    }


    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'address' => 'required|string|max:255',
            'contact' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            Session::flash('message', $validator->errors()->first());
            Session::flash('class', 'danger');
            return redirect()->back()->withInput();
        }

        try {
            Hospital::create([
                'name' => $request->name,
                'address' => $request->address,
                'contact' => $request->contact,
            ]);
            Session::flash('message', 'Hospital Successfully Created');
            Session::flash('class', 'success');
        } catch (\Exception $e) {
            Session::flash('message', $e->getMessage());
            Session::flash('class', 'danger');
        }
        return redirect()->back();
    }

    public function update(Request $request)
    {
        $hospital = Hospital::find($request->id);
        $hospital->name = $request->name;
        $hospital->address = $request->address;
        $hospital->contact = $request->contact;
        $hospital->save();
        return $this->respondWithSuccess('Hospital successfully updated', $hospital);
    }

    public function destroy($id)
    {
        try {
            $hospital = Hospital::find($id);
            $hospital->delete();
            Session::flash('message', 'Hospital successfully deleted');
            Session::flash('class', 'success');
        } catch (\Exception $e) {
            Session::flash('message', $e->getMessage());
            Session::flash('class', 'danger');
        }
        return redirect()->back();
    }
}
