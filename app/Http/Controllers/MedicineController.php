<?php

namespace App\Http\Controllers;

use App\Models\Medicine;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class MedicineController extends Controller
{
    public function index()
    {
        $medicines = Medicine::all();
        return view('medicine.index', compact('medicines'));
    }



    public function view($id)
    {
        $medicine = Medicine::find($id);
        return view('medicine.view', compact('Medicine'));
    }


    public function fetch($id)
    {
        $medicine = Medicine::find($id);
        return $this->respondWithSuccess("Medicine fetched successfully", $medicine);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'address' => 'required',
            'contact' => 'required',
            'cost' => 'required',
            'pharmacy_name' => 'required',
        ]);

        if ($validator->fails()) {
            Session::flash('message', $validator->errors()->first());
            Session::flash('class', 'danger');
            return redirect()->back()->withInput();
        }

        try {
            Medicine::create([
                'name' => $request->name,
                'cost' => $request->cost,
                'address' => $request->address,
                'contact' => $request->contact,
                'pharmacy_name' => $request->pharmacy_name,
            ]);
            Session::flash('message', 'Medicine successfully created');
            Session::flash('class', 'success');
        } catch (\Exception $e) {
            Session::flash('message', $e->getMessage());
            Session::flash('class', 'danger');
        }
        return redirect()->back();
    }

    public function update(Request $request)
    {
        $medicine = Medicine::find($request->id);
        $medicine->name = $request->name;
        $medicine->address = $request->address;
        $medicine->contact = $request->contact;
        $medicine->cost = $request->cost;
        $medicine->pharmacy_name = $request->pharmacy_name;
        $medicine->save();
        Session::flash('message', 'Medicine successfully updated');
        Session::flash('class', 'success');
        return redirect()->back();
    }

    public function destroy($id)
    {
        try {
            $medicine = Medicine::find($id);
            $medicine->delete();
            Session::flash('message', 'Medicine successfully deleted');
            Session::flash('class', 'success');
        } catch (\Exception $e) {
            Session::flash('message', $e->getMessage());
            Session::flash('class', 'danger');
        }
        return redirect()->back();
    }
}
