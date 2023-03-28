<?php

namespace App\Http\Controllers;

use App\Models\Blood;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class BloodController extends Controller
{
    public function index()
    {
        $bloods = Blood::all();
        return view('blood.index', compact('bloods'));
    }



    public function view($id)
    {
        $blood = Blood::find($id);
        return view('blood.view', compact('blood'));
    }
    public function fetch($id)
    {
        $blood = Blood::find($id);
        return $this->respondWithSuccess("blood fetched successfully", $blood);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'blood_group' => 'required',
            'donner_name' => 'required',
            'phone' => 'required',
            'address' => 'required',
        ]);

        if ($validator->fails()) {
            Session::flash('message', $validator->errors()->first());
            Session::flash('class', 'danger');
            return redirect()->back()->withInput();
        }

        try {
            Blood::create([
                'group_name' => $request->blood_group,
                'donner_name' => $request->donner_name,
                'phone' => $request->phone,
                'address' => $request->address,
            ]);
            Session::flash('message', 'Blood successfully created');
            Session::flash('class', 'success');
        } catch (\Exception $e) {
            Session::flash('message', $e->getMessage());
            Session::flash('class', 'danger');
        }
        return redirect()->back();
    }

    public function update(Request $request)
    {
        $blood = Blood::find($request->id);
        if ($request->blood_group != null) {
            $blood->group_name = $request->blood_group;
        } else {
            $blood->group_name = $blood->group_name;
        }
        $blood->donner_name = $request->donner_name;
        $blood->phone = $request->phone;
        $blood->address = $request->address;
        $blood->save();
        Session::flash('message', 'Blood successfully updated');
        Session::flash('class', 'success');
        return redirect()->back();
    }

    public function destroy($id)
    {
        try {
            $blood = Blood::find($id);
            $blood->delete();
            Session::flash('message', 'Blood successfully deleted');
            Session::flash('class', 'success');
        } catch (\Exception $e) {
            Session::flash('message', $e->getMessage());
            Session::flash('class', 'danger');
        }
        return redirect()->back();
    }
}
