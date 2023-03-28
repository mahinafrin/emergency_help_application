<?php

namespace App\Http\Controllers;

use App\Models\Food;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class FoodController extends Controller
{
    public function index()
    {
        $foods = Food::all();
        return view('food.index', compact('foods'));
    }

    public function view($id)
    {
        $food = Food::find($id);
        return view('food.view', compact('food'));
    }
    public function fetch($id)
    {
        $food = Food::find($id);
        return $this->respondWithSuccess("Food fetched successfully", $food);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'address' => 'required',
            'contact' => 'required',
            'cost' => 'required',
        ]);

        if ($validator->fails()) {
            Session::flash('message', $validator->errors()->first());
            Session::flash('class', 'danger');
            return redirect()->back()->withInput();
        }

        try {
            Food::create([
                'name' => $request->name,
                'price' => $request->cost,
                'address' => $request->address,
                'contact' => $request->contact,
            ]);
            Session::flash('message', 'Food successfully created');
            Session::flash('class', 'success');
        } catch (\Exception $e) {
            Session::flash('message', $e->getMessage());
            Session::flash('class', 'danger');
        }
        return redirect()->back();
    }

    public function update(Request $request)
    {
        $Food = Food::find($request->id);
        $Food->name = $request->name;
        $Food->address = $request->address;
        $Food->contact = $request->contact;
        $Food->price = $request->cost;
        $Food->save();
        Session::flash('message', 'Food successfully updated');
        Session::flash('class', 'success');
        return redirect()->back();
    }

    public function destroy($id)
    {
        try {
            $food = Food::find($id);
            $food->delete();
            Session::flash('message', 'Food successfully deleted');
            Session::flash('class', 'success');
        } catch (\Exception $e) {
            Session::flash('message', $e->getMessage());
            Session::flash('class', 'danger');
        }
        return redirect()->back();
    }
}
