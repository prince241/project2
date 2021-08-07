<?php

namespace App\Http\Controllers;

use App\Models\Address;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdressController extends Controller
{
    public function edit()
    {
      $user = Auth::user();
      return view('checklist.checkout', ['user' => $user]);
    }

 
    public function update(Request $request)
    {
      $request->validate([
        'name' => 'required|max:255',
        'address' => 'required|max:255',
        'city' => 'required|max:255',
        'state' => 'required|max:255',
      ]);
  
      $address = [];
      $address['name'] = $request->name;
      $address['address'] = $request->address;
      $address['city'] = $request->city;
      $address['state'] = $request->state;
      $userAddress = Address::updateOrCreate(['user_id'=> Auth::user()->id], ['address'=> json_encode($address)]);
  
      return redirect()->back()->with('success', 'profile updated successfully');
    }
}
