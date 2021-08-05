<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'name' => ['required'],
            'password' => ['required']
        ]);

        if(Auth::attempt($request->only('name', 'password'))) {
            return response()->json(Auth::user(), 200);
        }

        throw ValidationException::withMessages([
            'errormsg' => '*ユーザー名またはパスワードが間違ってます。'
        ]);
    }

    public function logout()
    {
        Auth::logout();
    }
}
