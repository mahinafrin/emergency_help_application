<?php

namespace App\Http\Controllers;

use App\Models\Location;
use Illuminate\Http\Request;
use Flasher\Laravel\Facade\Flasher;

class HomeController extends Controller
{
    public function guestIndex()
    {
        return view('guest.home');
    }

    public function index()
    {
        return view('admin.dashboard');
    }
}
