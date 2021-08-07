<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
  public function edit()
  {
    $user = Auth::user();
    return view('profile.edit', ['user' => $user]);
  }

  public function update(Request $request)
  {
    $request->validate([
      'name' => 'required|max:255',
      'address' => 'required|max:255',
      'city' => 'required|max:255',
      'state' => 'required|max:255',
      'image' => 'nullable|mimes:jpg,png.jpeg|max:5048'
    ]);

    $user = User::find(Auth::user()->id);
    $user->name = $request->name;
    $user->address = $request->address;
    $user->city = $request->city;
    $user->state = $request->state;

    if ($request->image) {
      # code...
      $newImageName = time() . '.' . $request->image->extension();
      $request->image->move(public_path('profile'), $newImageName);
      $user->image = $newImageName;
    }
    $user->save();

    return redirect()->back()->with('success', 'profile updated successfully');
  }
  function updatePassword(Request $request)
  {

    $this->validate($request, [

      'oldpassword' => 'required|max:255',
      'newpassword' => 'required|max:255',
      'confirmpassword' => 'required|max:255|same:newpassword'
    ]);
    $hashedPassword = Auth::user()->password;

    if (\Hash::check($request->oldpassword, $hashedPassword)) {

      if (!\Hash::check($request->newpassword, $hashedPassword)) {

        // if (!\Hash::check($request->confirmpassword, $hashedconfirmPassword)) {

        $user = User::find(Auth::user()->id);
        $user->password = bcrypt($request->newpassword);
        User::where('id', Auth::user()->id)->update(array('password' =>  $user->password));

        session()->flash('success', 'password updated successfully');
        return redirect()->back();
      } else {
        // session()->flash('error', 'new password can not be the old password!');
        return redirect()->back()->withErrors('new password can not be the old password!');
      }
    } else {
      // session()->flash('error', 'old password doesnt matched ');
      return redirect()->back()->withErrors('old password doesnt matched ');
    }
  }
}
