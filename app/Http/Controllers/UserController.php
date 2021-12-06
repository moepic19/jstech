<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    function index(){
        return view('dashboard.user.index');
    }
    function profile(){
        return view('dashboard.user.profile');
    }
    function setting(){
        return view('dashboard.user.setting');
    }
    function add(){
        return view('dashboard.user.add');
    }

    function updateInfo(Request $request){

    }

}
