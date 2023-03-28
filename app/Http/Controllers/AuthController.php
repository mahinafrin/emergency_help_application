<?php

namespace App\Http\Controllers;

use App\Models\User;
use Flasher\Laravel\Facade\Flasher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{

    public function userLoginView()
    {
        return view('guest.auth.login');
    }


    public function userLogin(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            Session::flash('message', $validator->errors()->first());
            Session::flash('class', 'danger');
            return redirect()->back()->withInput();
        }

        $user = User::where('email', $request->email)->first();

        if ($user) {
            if (Hash::check($request->password, $user->password)) {
                Auth::login($user);
                Flasher::addSuccess('Login Successful');
                return redirect()->route('admin.dashboard');
            } else {
                Session::flash('message', 'Invalid email or password');
                Session::flash('class', 'danger');
                return redirect()->back();
            }
        } else {
            Session::flash('message', 'User not found');
            Session::flash('class', 'danger');
            return redirect()->back();
        }
    }

    public function userRegisterView()
    {
        return view('guest.auth.register');
    }

    function userRegister(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        if ($validator->fails()) {
            Session::flash('message', $validator->errors()->first());
            Session::flash('class', 'danger');
            return redirect()->back()->withInput();
        }
        try {
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);
            $user->assignRole('doctor');
            $this->getAndSetClientIp();
            Session::flash('message', 'User created successfully, Please login');
            Session::flash('class', 'success');
            return redirect()->route('user.login');
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
