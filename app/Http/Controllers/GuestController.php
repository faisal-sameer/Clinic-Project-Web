<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class GuestController extends Controller
{
    protected function reservation()
    {
        return view('reservation');
    }

    protected function dashboardUser()
    {
        return view('dashboardUser');
    }

    protected function regester()
    {
        return view('regester');
    }

    protected function dashboardClinic()
    {

        $all = User::get();
        return view('dashboardClinic')->with('all', $all);
    }
}
