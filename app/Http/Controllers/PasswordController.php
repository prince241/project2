<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\ForgetPassword as MailForgetPassword;
use App\Models\User;
use Illuminate\Support\Facades\Mail;

class PasswordController extends Controller
{
    public function checker(Request $request)
    {
        $user = User::where('email', $request->email)->first();
        if (!$user) 
        {
            return response()->json(['success' => false, 'message' => 'email does not exist']);
        }
        $password = Self::generateRandomString(8);
        $user->password = bcrypt($password);
        $user->save();
        Mail::to($request->email)->send(new MailForgetPassword($password));
        return redirect()->back()->with(['success' => true, 'message' => 'password has been sent to your registered e-mail']);
    }

    static function generateRandomString($length = 8) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
}
