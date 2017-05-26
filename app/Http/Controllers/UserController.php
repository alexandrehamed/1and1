<?php

namespace App\Http\Controllers;


use App\User;
use Illuminate\Http\Request;
use App\Http\Requests;
use Auth;
use Image;

class UserController extends Controller
{
    //
    public function profile(){
        return view('profile', array('user' => Auth::user()) );
    }

    public function update_avatar(Request $request){

        // Handle the user upload of avatar
        if($request->hasFile('avatar')){
            $avatar = $request->file('avatar');
            $filename = time() . '.' . $avatar->getClientOriginalExtension();
            Image::make($avatar)->resize(300, 300)->save( public_path('/images/avatar/' . $filename ) );

            $user = Auth::user();
            $user->avatar = $filename;
            $user->save();
        }

        return view('profile', array('user' => Auth::user()) );

    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $this->validate($request,
            [
                'name' => 'required',
                'number' => 'required',
                'email' => 'required'
            ],
            [

                'name.required' => 'Un nom est requis. ',
                'number.required' => 'Un numero est requis. ',
                'email.required' => 'Un email est requis . '
            ]
        );

        Auth::user()->update([
            'name' => $request->name,
            'email' => $request->email,
            'number' => $request->number,
        ]);

        return view('profile', array('user' => Auth::user()) );
    }
}
