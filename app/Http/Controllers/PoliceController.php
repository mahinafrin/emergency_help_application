<?php

namespace App\Http\Controllers;

use App\Models\Police;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class PoliceController extends Controller
{
    public function index()
    {
        $polices = Police::all();
        return view('police.index', compact('polices'));
    }


    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'contact' => 'required|string|min:10|max:11|unique:police',
        ]);

        if ($validator->fails()) {
            Session::flash('message', $validator->errors()->first());
            Session::flash('class', 'danger');
            return redirect()->back()->withInput();
        }

        try {
            Police::create([
                'name' => $request->name,
                'address' => $request->address,
                'contact' => $request->contact,
            ]);
            Session::flash('message', 'Police Station Successfully Created');
            Session::flash('class', 'success');
        } catch (\Exception $e) {
            Session::flash('message', $e->getMessage());
            Session::flash('class', 'danger');
        }
        return redirect()->back();
    }

    public function update(Request $request)
    {
        $police = Police::find($request->id);
        $police->name = $request->name;
        $police->address = $request->address;
        $police->contact = $request->contact;
        $police->save();
        return $this->respondWithSuccess('Police successfully updated', $police);
    }

    public function destroy($id)
    {
        try {
            $police = Police::find($id);
            $police->delete();
            Session::flash('message', 'Police successfully deleted');
            Session::flash('class', 'success');
        } catch (\Exception $e) {
            Session::flash('message', $e->getMessage());
            Session::flash('class', 'danger');
        }
        return redirect()->back();
    }
}
