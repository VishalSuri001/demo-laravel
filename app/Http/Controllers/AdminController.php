<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AdminController extends Controller
{

    /**
     * Destroy an authenticated session.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

    public function profile()
    {
        $loggedUserId = Auth::user()->id;
        $userData = User::find($loggedUserId);
        return view('admin.user.profile', ['userData' => $userData]);
    }

    public function editProfile()
    {
        $loggedUserId = Auth::user()->id;
        $userData = User::find($loggedUserId);
        return view('admin.user.edit_profile', ['userData' => $userData]);
    }

    public function StoreProfile(Request $request){
        $id = Auth::user()->id;
        $data = User::find($id);

        $request->validate([
            'name' => 'required',
            'email'  => 'required|unique:App\Models\User,email,' . $data->id . ',id',
            'username'  => 'required|unique:App\Models\User,username,' . $data->id . ',id',
        ]);


        $data->name = $request->name;
        $data->email = $request->email;
        $data->username = $request->username;
        if ($request->file('profile_image')) {
           $file = $request->file('profile_image');

           $filename = date('YmdHi').$file->getClientOriginalName();
           $file->move(public_path('upload/admin/users/profile_images'),$filename);
           $data['profile_image'] = $filename;
        }
        $data->save();

        return redirect()->route('admin.profile');

    }// End Method

}
