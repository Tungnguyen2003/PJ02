<?php

namespace App\Http\Controllersl;

use Illuminate\Http\Request;
use Auth;
use App\Models\User;


class DashboardController extends Controller
{

    public function Dashboard()
    {
        if(Auth::user()->is_role == 1)
        {
            return view('admin.dashboard');
        }
        else if (Auth::user()->is_role == 0)
        {
            return view('user.dashboard');
        }
    }
}