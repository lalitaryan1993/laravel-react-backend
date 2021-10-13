<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminUserController extends Controller
{

    public function AdminLogout()
    {
        Auth::logout();
        return redirect()->route('login');
    }


    public function UserProfile()
    {
        $AuthUserId = Auth::user()->id;
        $user = User::find($AuthUserId);
        return view('backend.user.user_profile', compact('user'));
    }

    public function UserProfileEdit()
    {
        $AuthUserId = Auth::user()->id;
        $user = User::find($AuthUserId);
        return view('backend.user.user_profile_edit', compact('user'));
    }

    public function UserProfileStore(Request $request)
    {
        $validatedData = $request->validateWithBag('post', [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required'],
        ]);


        $AuthUserId = Auth::user()->id;
        $user = User::find($AuthUserId);
        $user->name = $request->name;
        $user->email = $request->email;

        if ($request->hasFile('profile_photo_path')) {
            $file = $request->file('profile_photo_path');
            @unlink(public_path('upload/user_images/' . $user->profile_photo_path));
            $imageName = date('YmdHi') . '.' . $file->getClientOriginalName();
            $file->move(public_path('upload/user_images'), $imageName);
            $user->profile_photo_path = $imageName;
        }
        $success =  $user->save();
        $successNotification = array(
            'message' => 'Profile updated successfully!',
            'alert-type' => 'success'
        );

        $failedNotification = array(
            'message' => 'Sorry something went wrong profile cannot be updated!',
            'alert-type' => 'danger'
        );


        if ($success) {
            return redirect()->route('user.profile')->with($successNotification);
        } else {
            return redirect()->route('user.profile.edit')->with($failedNotification);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function UserChangePassword()
    {
        $id = Auth::user()->id;
        $user = User::find($id);
        return view('backend.user.change_password', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function UserPasswordUpdate(Request $request)
    {
        $validatedData = $request->validate([
            'current_password' => ['required'],
            'password' => ['required', 'min:8', 'confirmed'],
        ]);

        $id = Auth::user()->id;
        $user = User::find($id);
        $current_password = $request->current_password;
        $new_password = $request->password;

        if (Hash::check($current_password, $user->password)) {
            $user->password = bcrypt($new_password);
            $success =  $user->save();
            $successNotification = array(
                'message' => 'Password updated successfully!',
                'alert-type' => 'success'
            );

            $failedNotification = array(
                'message' => 'Sorry something went wrong password cannot be updated!',
                'alert-type' => 'danger'
            );

            if ($success) {
                return redirect()->route('login')->with($successNotification);
                Auth::logout();
            } else {
                return redirect()->route('change.password')->with($failedNotification);
            }
        } else {
            $failedNotification = array(
                'message' => 'Sorry current password is not correct!',
                'alert-type' => 'danger'
            );
            return redirect()->route('change.password')->with($failedNotification);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}