<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserProfileController extends Controller
{
    //
    public function store (Request $request){
        $id = auth()->user()->id;
        Profile::where('id', $id)->update([
            'name'=>request('name'),
            'email'=>request('email'),

        ]);
        return redirect()->back()->with('message','Profile Updated Successfully');
    }
}
