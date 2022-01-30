<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    //
    public function index()
    {
        return view('backend.profile.index');
    }

    public function update(Request $request)
    {
        $this->validate($request,[
            'name'  => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,'. Auth::id(),
            'avatar'=>'nullable|image'
        ]);

        // Get logged in user
        $user = Auth::user();

        $user->update([
            'name' => $request->name,
            'email'=>$request->email
        ]);

        // Upload image
        if($request->hasFile('avatar')){
            $user->addMedia($request->avatar)->toMediaCollection('avatar');
        }

        notify()->success('Profile Updated','success');
        return back();
    }

    public function changePassword()
    {
        return view('backend.profile.password');
    }

    public function updatePassword(Request $request)
    {
        $this->validate($request,[
            'current_password' => 'required',
            'password'         => 'required|confirmed'
        ]);
        $user = Auth::user();
        $hashPassword = $user->password;
        if(Hash::check($request->current_password, $hashPassword)){
            if (!Hash::check($request->password,$user->getAuthPassword())) {
                $user->update([
                    'password'=>Hash::make($request->password)
                ]);
                Auth::logout();
                notify()->success('Password Changed','Success');
                return redirect()->route('login');
            } else {
                notify()->warning('New password can not be same as old password','Warning');
            }
        }else{
            notify()->error('Current password not match','Error');
        }
        return back();
    }
}
