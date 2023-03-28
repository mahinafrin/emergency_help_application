<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;


class DoctorController extends Controller
{
    public function index()
    {
        $doctors = User::role('doctor')->get();
        return view('doctor.index', compact('doctors'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'address' => 'required',
        ]);

        if ($validator->fails()) {
            Session::flash('message', $validator->errors()->first());
            Session::flash('class', 'danger');
            return redirect()->back()->withInput();
        }

        try {
            $doctor = new User();
            $doctor->name = $request->name;
            $doctor->email = $request->email;
            $doctor->phone = $request->phone;
            $doctor->password = Hash::make($request->password);
            $doctor->address = $request->address;
            $doctor->phone = $request->phone;
            $doctor->specialist = $request->specialist;
            $doctor->details = $request->details;
            if ($request->hasFile('image')) {
                $photo = $request->file('image');
                $imageName = "doctor_u_image_"  . Date('d_m_y_h_m_s') . '.' . $photo->extension();
                $doctor->image = $imageName;
                $photo->storeAs('Doctor_Image/', $imageName, 'public');
            }
            $doctor->save();
            $doctor->assignRole('doctor');
            Session::flash('message', 'Doctor successfully created');
            Session::flash('class', 'success');
        } catch (\Exception $e) {
            Session::flash('message', $e->getMessage());
            Session::flash('class', 'danger');
        }
        return redirect()->back();
    }


    public function view($id)
    {
        $doctor = User::find($id);
        return view('doctor.view', compact('doctor'));
    }
    public function fetch($id)
    {
        $doctor = User::find($id);
        return $this->respondWithSuccess("Doctor fetched successfully", $doctor);
    }

    public function update(Request $request)
    {
        $doctor = User::find($request->id);
        $doctor->name = $request->name;
        $doctor->email = $request->email;
        $doctor->phone = $request->phone;
        $doctor->password = Hash::make($request->password);
        $doctor->address = $request->address;
        $doctor->phone = $request->phone;
        $doctor->specialist = $request->specialist;
        $doctor->details = $request->details;
        if ($request->hasFile('image')) {
            $photo = $request->file('image');
            $imageName = "doctor_u_image_"  . Date('d_m_y_h_m_s') . '.' . $photo->extension();
            $doctor->image = $imageName;
            $photo->storeAs('Doctor_Image/', $imageName, 'public');
        }
        $doctor->save();
        Session::flash('message', 'Doctor successfully updated');
        Session::flash('class', 'success');
        return redirect()->back();
    }

    public function destroy($id)
    {
        try {
            $doctor = User::find($id);
            $doctor->delete();
            Session::flash('message', 'Doctor successfully deleted');
            Session::flash('class', 'success');
        } catch (\Exception $e) {
            Session::flash('message', $e->getMessage());
            Session::flash('class', 'danger');
        }
        return redirect()->back();
    }
}
