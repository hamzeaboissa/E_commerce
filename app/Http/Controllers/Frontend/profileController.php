<?php

namespace App\Http\Controllers\frontend;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class profileController extends Controller
{
    public function index()
    {

        return view('frontend.profile.index');
    }
    public function updateUser(Request $request)
    {
        $request->validate([
            'username' => ['required', 'string'],
            'Phone' => ['required', 'digits:10'],
            'Pin_Code' => ['required', 'digits:6'],
            'address' => ['required', 'string', 'max:500'],
        ]);

        $user = User::findOrfail(Auth::user()->id);
        $user->update([
            'name' => $request->username,
        ]);
        $user->userDetail()->updateOrCreate(
            [
                'user_id' => $user->id,
            ],
            [
                'Phone' => $request->Phone,
                'Pin_Code' => $request->Pin_Code,
                'address' => $request->address,
            ]
        );
        return redirect()->back()->with('message', 'User Profile Updated');
    }
    public function Passwordcreate()
    {
        return view('frontend.profile.Change-Password');
    }

    public function changePassword(Request $request)
    {
        $request->validate([
            'current_password' => ['required', 'string', 'min:8'],
            'password' => ['required', 'string', 'min:8', 'confirmed']
        ]);

        $currentPasswordStatus = Hash::check($request->current_password, auth()->user()->password);
        if ($currentPasswordStatus) {

            User::findOrFail(Auth::user()->id)->update([
                'password' => Hash::make($request->password),
            ]);

            return redirect()->back()->with('message', 'Password Updated Successfully');
        } else {

            return redirect()->back()->with('message', 'Current Password does not match with Old Password');
        }
    }
}
