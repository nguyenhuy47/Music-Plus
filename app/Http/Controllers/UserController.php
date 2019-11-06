<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileValidate;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function show()
    {
        $user = Auth::user();
        return view('profile.show', compact('user'));
    }

    public function update_avatar(ProfileValidate $request)
    {
        $user = Auth::user();
        $userAvatar = $user->avatar;
        if ($request->hasFile('avatar')) {
            $avatarName = $user->id . '_avatar' . time() . '.' . request()->avatar->getClientOriginalExtension();
            $request->avatar->storeAs('avatars', $avatarName);
            $user->avatar = $avatarName;
        } else {
            $user->avatar = $userAvatar;
        }
        $user->name = $request->name;
        $user->dob = $request->dob;
        $user->gender = $request->gender;

        $user->save();

        return redirect()->back()->with('success', 'Cập nhật thông tin cá nhân thành công.');

    }
}
