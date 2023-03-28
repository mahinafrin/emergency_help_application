<?php

namespace App\Http\Controllers;

use App\Models\FireService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class FireServiceController extends Controller
{
    public function index()
    {
        $fireServices = FireService::all();
        return view('fire-service.index', compact('fireServices'));
    }


    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'contact' => 'required|string|min:10|max:11|unique:fire_services',
        ]);

        if ($validator->fails()) {
            Session::flash('message', $validator->errors()->first());
            Session::flash('class', 'danger');
            return redirect()->back()->withInput();
        }

        try {
            FireService::create([
                'name' => $request->name,
                'address' => $request->address,
                'contact' => $request->contact,
            ]);
            Session::flash('message', 'Fire Service Station Successfully Created');
            Session::flash('class', 'success');
        } catch (\Exception $e) {
            Session::flash('message', $e->getMessage());
            Session::flash('class', 'danger');
        }
        return redirect()->back();
    }

    public function update(Request $request)
    {
        $fireService = FireService::find($request->id);
        $fireService->name = $request->name;
        $fireService->address = $request->address;
        $fireService->contact = $request->contact;
        $fireService->save();
        return $this->respondWithSuccess('Fire Service successfully updated', $fireService);
    }

    public function destroy($id)
    {
        try {
            $fireService = FireService::find($id);
            $fireService->delete();
            Session::flash('message', 'FireService successfully deleted');
            Session::flash('class', 'success');
        } catch (\Exception $e) {
            Session::flash('message', $e->getMessage());
            Session::flash('class', 'danger');
        }
        return redirect()->back();
    }
}
