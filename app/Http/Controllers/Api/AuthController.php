<?php

namespace App\Http\Controllers\Api;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class AuthController extends Controller
{
    public function getAccessToken(Request $request)
    {
        $this->validate($request, [
            'email'    => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return Auth::user();
        }

        return response()->json([
            'error' => true,
            'message' => 'Wrong credentials!'
        ])->setStatusCode(401);
    }

    public function passwordResetRequest(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email|exists:users,email',
        ]);

        $user = User::where('email', $request->email)->first();
        $user->reset_key = rand(10000, 99999);
        $user->save();

        Mail::raw("Your Password Reset Key is: {$user->reset_key} \n\n--\nLaravel Blog Team", function ($message) use ($user) {
            $message->from('no-reply@laravel-blog.com', 'Castro Team');
            $message->subject('Password Reset Key of Castro');
            $message->to($user->email);
        });

        return response()->json([
            'data' => [
                'message' => 'Password reset key sent to your email',
            ],
        ]);
    }

    public function changePassword(Request $request)
    {
        $this->validate($request, [
            'email'     => 'required|email|exists:users',
            'reset_key' => 'required',
            'password'  => 'required',
        ]);

        $user = User::where([
                ['reset_key', $request->reset_key],
                ['email', $request->email],
            ])->first();

        if (!$user) {
            return response()->json([
                'data' => [
                    'message' => 'Email and Reset Key does not match.'
                ]
            ], 422);
        }

        $user->reset_key = null;
        $user->password = bcrypt($request->password);
        $user->save();

        return response()->json([
            'data' => [
                'message' => 'Password changed successfully.'
            ]
        ]);
    }

}
