<?php

namespace App\Http\Controllers;

use App\Models\Zh_user;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Password;

class RegisterController extends Controller
{
    public function index()
    {
        return view('register.index');
    }

    public function store(Request $request)
    {
        // dd($request);
        $validatedUserData = $request->validate([
            'name' => ['required', 'string', 'max:50'],
            'email' => ['required', 'string', 'max:100', 'email', 'unique:zh_users'],
            'password' => ['required', 'string', Password::min(8)->letters()->mixedCase()->numbers()->symbols(), 'confirmed'],
            'password_confirmation' => ['required',  'string', 'min:8'],

        ]);
        // dd($validatedUserData);

        $newUser = Zh_user::query()->create([
            'name' => $validatedUserData['name'],
            'email' => $validatedUserData['email'],
            'password' => bcrypt($validatedUserData['password']),
        ]);

        return redirect()->route('profile');
    }
}


// 'user_type',
//         'status',
//         'name',
//         'email',
//         'pass',
//         'phone',
//         'telegram',
//         'last_login',
//mM44!qaz