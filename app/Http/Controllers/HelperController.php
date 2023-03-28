<?php

namespace App\Http\Controllers;

use App\Models\Helper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class HelperController extends Controller
{
    public function index()
    {
        $helpers = Helper::all();
        return view('helper.index', compact('helpers'));
    }


    public function fetch($id)
    {
        $healer = Helper::find($id);
        return $this->respondWithSuccess("healer fetched successfully", $healer);
    }


    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'group_name' => 'required',
            'contact' => 'required',
            'address' => 'required',
            'about_help' => 'required',
        ]);

        if ($validator->fails()) {
            Session::flash('message', $validator->errors()->first());
            Session::flash('class', 'danger');
            return redirect()->back()->withInput();
        }

        try {
            Helper::create([
                'group_name' => $request->group_name,
                'contact' => $request->contact,
                'address' => $request->address,
                'about_help' => $request->about_help,
            ]);
            Session::flash('message', 'Helper Successfully Created');
            Session::flash('class', 'success');
        } catch (\Exception $e) {
            Session::flash('message', $e->getMessage());
            Session::flash('class', 'danger');
        }
        return redirect()->back();
    }

    public function update(Request $request)
    {
        $helper = Helper::find($request->id);
        $helper->group_name = $request->group_name;
        $helper->contact = $request->contact;
        $helper->address = $request->address;
        $helper->about_help = $request->about_help;
        $helper->save();
        return redirect()->back();
    }

    public function destroy($id)
    {
        try {
            $helper = Helper::find($id);
            $helper->delete();
            Session::flash('message', 'Helper successfully deleted');
            Session::flash('class', 'success');
        } catch (\Exception $e) {
            Session::flash('message', $e->getMessage());
            Session::flash('class', 'danger');
        }
        return redirect()->back();
    }
}
