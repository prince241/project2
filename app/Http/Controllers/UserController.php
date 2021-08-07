<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function register(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|max:255|email|unique:users,email',
            'password' => 'required|max:255',
            'password_repeat' => 'required|max:255|same:password',
            'date_of_birth' => 'required|date|before: -18 years',
        ]);
        $validated['password'] = bcrypt($validated['password']);
        $user = User::create($validated);
          $user->role_id = 2;
        $user->save();
       
        return redirect()->route('login')->with('success', 'registered successfully✔');
    }

    public function login(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|max:255|email',
            'password' => 'required|max:255',
        ]);
        if (Auth::attempt($validated)) {
            if(Auth::user()->role_id==2)
            {
                  return redirect()->route('web.product');
              }
            $user=Auth::user();
            return redirect()->route('home');
        }else {
            return redirect()->back()->withErrors('email or password wrong');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('home');
    }
}
