<?php

namespace App\Http\Controllers;

use App\Models\Oxygen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class OxygenController extends Controller
{
    public function index()
    {
        $oxygens = Oxygen::all();
        return view('oxygen.index', compact('oxygens'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'quantity' => 'required|max:255',
            'location' => 'required',
            'contact' => 'required',
        ]);

        if ($validator->fails()) {
            Session::flash('message', $validator->errors()->first());
            Session::flash('class', 'danger');
            return redirect()->back()->withInput();
        }

        try {
            Oxygen::create([
                'quantity' => $request->quantity,
                'location' => $request->location,
                'price' => $request->price,
                'contact' => $request->contact,
            ]);
            Session::flash('message', 'Oxygen successfully created');
            Session::flash('class', 'success');
        } catch (\Exception $e) {
            Session::flash('message', $e->getMessage());
            Session::flash('class', 'danger');
        }
        return redirect()->back();
    }

    public function update(Request $request)
    {
        $oxygen = Oxygen::find($request->id);
        $oxygen->quantity = $request->quantity;
        $oxygen->contact = $request->contact;
        $oxygen->location = $request->location;
        $oxygen->price = $request->price;
        $oxygen->save();
        return $this->respondWithSuccess('Doctor successfully updated', $oxygen);
    }

    public function destroy($id)
    {
        try {
            $oxygen = Oxygen::find($id);
            $oxygen->delete();
            Session::flash('message', 'Oxygen successfully deleted');
            Session::flash('class', 'success');
        } catch (\Exception $e) {
            Session::flash('message', $e->getMessage());
            Session::flash('class', 'danger');
        }
        return redirect()->back();
    }
}
